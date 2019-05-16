<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use DB;
use Mail;
use Session;
use App\ValveInfo;
use App\AtomicPressure;
use App\User;
use App\Admin;
use Validator;
use Illuminate\Http\Request;
use Newsletter;

class UserController extends Controller
{

	/* Start code to Subscribe User data */
public function mailchimp(){

	Newsletter::subscribe('test@discworld.com', ['firstName'=>'Rince', 'lastName'=>'Wind'], 'subscribers');
}


	public function usersubscribe(Request $request)
	{
		$response = array();
		$inputData = $request->input();
		$storedata = new User ;
		$code = rand(1000,9999);
		$rules= [
			'name'=>'required',
		    'email'=>'required|email',
		];
		$customMessages = [
		    'name.required' => 'Name field must be required',
		    'email.required' => 'Email field must be required',
    	];
		$validator = Validator::make($inputData, $rules, $customMessages);
		if($validator->fails()){
			$response['ResCode'] = 0;
			$response['ResMsg'] = $validator->errors();
		}else{

			$storedata->name = $inputData['name'];

        	$storedata->email = strtolower($inputData['email']);
        	$storedata->otpcode = $code;
        	$data = $storedata->where('email','=',$storedata->email)->get();
        	$foundData = count($data);	//check data if already exist in table

			if($foundData == 0)
			{
				//if data data not exist in table
				$storedata->save();//store data in table .
				$id = $storedata->id; // store inserted id.
				/* Email Sending Code */
					$data = array(
						'name' => $inputData['name'],
						'email' => $inputData['email'],
						'otp'=> $code,
					);

					Mail::send('email/sendEmail', ['userData' => $data], function ($message) use($inputData){
						$message->to($inputData['email'], $inputData['name'])
								->subject('VIVID Calculator – Verification code');
		 				$message->from('vivid@mg.prpl.io','VIVID');
					});

						if( count(Mail::failures()) > 0 ) {
						   echo "There was one or more failures. They were: <br />";
						} else {
							$response['ResCode'] = 1;
							$response['ResMsg'] = 'Email Sent. Check your inbox.';
							$response['id'] = $id;
						}					/*End  Email Sending Code */
						$n = explode(' ', $inputData['name']);
					if(@$inputData['approved'] == true){
						$response['mailchimp'] = Newsletter::subscribe($inputData['email'], ['firstName'=>@$n[0], 'lastName'=>@$n[1]], 'subscribers');
					}else if(@$inputData['approved'] ==false){
						$response['mailchimp'] = Newsletter::subscribe($inputData['email'], ['firstName'=>@$n[0], 'lastName'=>@$n[1]], 'non-subscribers');
					}
			}else{
				$old_id = $data[0]['id'];
				//$name = $data[0]['name'];
				 $name = $inputData['name'];
				$email = $data[0]['email'];
				$user = User::find($old_id);
        		$user->otpcode = $code;
        		$user->save();
				$data = array(
					'name' =>$name,
					'email'=>$email,
					'otp'=>$code,
				);
					Mail::send('email/sendEmail', ['userData' => $data], function ($message) use($inputData){
						$message->to($inputData['email'], $inputData['name'])
								->subject('VIVID Calculator – Verification code');
		 				$message->from('no-reply@valveinvalve.org','VIVID');
					});

						if( count(Mail::failures()) > 0 ) {
						   echo "There was one or more failures. They were: <br />";
						} else {
							$response['ResCode'] = 1;
							$response['ResMsg'] = 'Email Sent. Check your inbox.';
							$response['id'] = $old_id;
						}
						$n = explode(' ', $inputData['name']);
					if(@$inputData['approved'] == true){
						$response['mailchimp'] = Newsletter::subscribe($inputData['email'], ['firstName'=>@$n[0], 'lastName'=>@$n[1]], 'subscribers');
					}else if(@$inputData['approved'] ==false){
						$response['mailchimp'] = Newsletter::subscribe($inputData['email'], ['firstName'=>@$n[0], 'lastName'=>@$n[1]], 'non-subscribers');
					}
				}
		}
		return response()->json($response);
	}

	public function verifyOtpcode(Request $request)
	{
		$response = array();
		$inputData = $request->input();
		$recieve_otp = $inputData['otp'];
		$id = $inputData['id'];
		$user = User::find($id);
		if($user['otpcode']==$recieve_otp)
		{
			$user = User::findOrFail($id);
			$user->otpcode ='';
    		$user->save();
			$response['ResCode']=1;
			$response['ResMsg']='Otp matched succesfully';
		}else{
			$response['ResCode']=0;
			$response['ResMsg']='Otp does not match Please resend otp';
		}
		return json_encode($response);
	}
	public function resendOtpcode(Request $request)
	{
		$response = array();
		$inputData = $request->input();
		$id = $inputData['id'];
		$otp = rand(1000,9999);
		$user = User::find($id);
        $user->otpcode = $otp;
		if($user->save())
		{
			$data = array(
				'name' => $user['name'],
				'email' => $user['email'],
				'otp'=> $otp,
			);

				Mail::send('email/sendEmail', ['userData' => $data], function ($message) use($user){
				$message->to($user['email'], $user['name'])
						->subject('VIVID Calculator – Verification code');
 				$message->from('vivid@mg.prpl.io','VIVID');
			});

				if( count(Mail::failures()) > 0 ) {
//				   echo "There was one or more failures. They were: <br />";
				   $response['ResCode'] = 0;
					$response['ResMsg'] = 'Email Sent failure. Please try later.';
				} else {
					$response['ResCode'] = 1;
					$response['ResMsg'] = 'Email Sent. Check your inbox.';
					$response['id'] = $id;
				}
				/*End  Email Sending Code */
		}
		return json_encode($response);
	}

	public function getdata()
	{
		$data=Input::all();
		$email =$data['email'];
		$userdata = User::where('email', $email)->get()->toArray();
                    return json_encode($userdata);
	}



	/* Api code to store input data  in db  selected by user*/

	public function insert_data(Request $request)
	{
		$response = array();
		$inputData = $request->input();
		$storedata = new Admin ;
		$rules= [
			// 'user_id'=>'required',
			'input_height'=>'required',
		    'input_weight'=>'required',
		    'ddlValveType'=>'required',
		    'ddlLableSize'=>'required',
		    'MechanismFailure'=>'required',
		    'thvtype'=>'required',
		];
		$customMessages = [
			// 'user_id.required' =>'User Id must be required',
		    'input_height.required' => 'Height field must be required',
		    'input_height.required' => 'Weight field must be required',
		    'ddlValveType.required' => 'Valve Type field must be required',
		    'ddlLableSize.required' => 'Lable Size field must be required',
		    'MechanismFailure.required' => 'Mechanism Failure field must be required',
		    'thvtype.required' => 'THV Type field must be required',
    	];
		$validator = Validator::make($inputData, $rules, $customMessages);
		if($validator->fails()){
			$response['ResCode'] = 0;
			$response['ResMsg'] = $validator->errors();
		} else {
			$storedata->date = date('d-m-Y');
			$storedata->time = date('H:i:s');
			$storedata->userid = $inputData['user_id'];
			$storedata->height = $inputData['input_height'];
        	$storedata->weight = $inputData['input_weight'];
        	$storedata->failedValueType = $inputData['ddlValveType'];
        	$storedata->lableSize = $inputData['ddlLableSize'];
        	$storedata->failureMechanism = $inputData['MechanismFailure'];
        	$storedata->thvType = $inputData['thvtype'];
        	$storedata->userIP = $request->getClientIp();
			$storedata->save();
        	$id = $storedata->id;
        	if(!empty($id))
        	{
				$response['ResCode'] = 1;
				$response['ResMsg'] = "Data Saved succesfully";
				$response['id'] = $id;
        	}

		}
		return json_encode($response);
	}
	/* Close code to Insert input data in db */


}
