<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use DB;
use Session;
use App\ValveInfo;
use App\Admin;
use App\UserData;
use App\AtomicPressure;
use Illuminate\Http\Request;
use Log;


class HomeController extends Controller
{
    public function index()
    {
        session()->forget('indexedeoa');
        session()->forget('mechnism');
        session()->forget('fdata');
        session()->forget('lsize');
        session()->forget('trueid');
        Session::put('current', 0);
    	return view("pages/home");
    }

    public function home()
    {
        session()->forget('indexedeoa');
        session()->forget('mechnism');
        session()->forget('fdata');
        session()->forget('lsize');
        session()->forget('trueid');
    	return view("pages/home");
    }
    public function metricCalc(){
        $response = array();
        $sess =  Session::get('current');
        $data = Input::all();
        if(!empty($data)){
            $r = $this->calc($data);
            $response = $r;

            if(isset($data['pagetype'])){
                Session::put('current',1);
                return redirect('/failed-valve');
            }
            Session::put('McData' , $data);

        }
        return view('first_page')->with('data', $response);
    }

    public function metricCalcTabbed(){
        $response = array();
        $sess =  Session::get('current');
        $data1 = Input::all();
        if($sess > 0 ){
            $data = Session::get('McData');
        }
        if(!empty($data)){
            Session::put('McData' , $data);
            $r = $this->calc($data);
            $response = $r;

            if(isset($data['pagetype'])){
                Session::put('current',1);
            }
        }
        return view('first_page')->with('data', $response);
    }

    public function secondScreen(Request $request){

        $dataArray = Input::all();

        Log::info('dataArray', $dataArray);
        if(!empty($dataArray['vtype'])){
            Log::info("1");
            $valveData2 = ValveInfo::where('failed_type','=', $dataArray['vtype'])->get();
            $retstr="";
            foreach($valveData2  as $data)
            {
                $retstr.="<option value='".$data->lable_size.",".$data->ProjectedEOA."'>".$data->lable_size."</option>";
            }
            echo $retstr; exit;
        }
        if(!empty(@$dataArray['valveType'])){
            Log::info("2");
            $r = $this->page_2_cal($dataArray);
            Session::put('SecondResult', $r);
            Session::put('FVData', $dataArray);
            Session::put('current',2);
            return redirect('/failed-valve-result');
        }
        $response = ValveInfo::orderBy('failed_type', 'ASC')->distinct()->pluck('failed_type','failed_type');
        Log::info('response', $response->toArray());
        $ArrayData = array();
        $i = 1;
        foreach ($response->toArray() as $key =>  $d){

            $s = ValveInfo::where('failed_type','=', $d)->get();

            foreach ($s->toArray() as $key1 => $value1) {
              if(isset($ArrayData[$i])){
                $ArrayData[$i][$value1['lable_size']] = $value1;
              }else{
                $ArrayData[$i] = array();
                $ArrayData[$i][$value1['lable_size']] = $value1;
              }
            }
            $i++;
        }
        Log::info('ArrayData for view ', $ArrayData);
        return view('second_page')->with('data',$response)->with('TestData', $ArrayData);
    }

    public function secondScreenTabbed(Request $request){


        $dataArray = Input::all();
        if(Session::get('FVData')){
            $dataArray = Session::get('FVData');
        }
        if(!empty($dataArray['vtype'])){
            $valveData2 = ValveInfo::where('failed_type','=', $dataArray['vtype'])->get();
            $retstr = "";
            $retstr.='<option value="">SELECT VALVE TYPE</option>';
            foreach($valveData2  as $data)
            {
                $retstr.="<option value='".$data->lable_size.",".$data->ProjectedEOA."'>".$data->lable_size."</option>";
            }
            //print_r($retstr); exit;
            echo $retstr; exit;
            //return $retstr;
        }
       /* if(!empty(@$dataArray['valveType'])){
            $r = $this->page_2_cal($dataArray);
            Session::put('SecondResult', $r);
            Session::put('FVData', $dataArray);
            Session::put('current',2);
         //   return redirect('/failed-valve-result');
        }*/
        $response = ValveInfo::orderBy('failed_type', 'ASC')->distinct()->pluck('failed_type','failed_type');
        return view('second_page')->with('data',$response)->with('dataArray',$dataArray);
    }

    public function calc($input){
        $response = array();
        $response['ResCode'] = 100 ;
        $response['ResMsg'] = "" ;
        if(isset($input['measurement_type'])){
            $response['Data'] = $input ;
            $height = $input['input_height'];
            $weight = $input['input_weight'];
            if($input['measurement_type'] =='METRIC' && ($height <= 250 && $height >= 100 ) && ($weight <= 300 && $weight >= 30 ))
            {
                $bsa = (($height * $weight)/3600);
                $numsqrt = sqrt($bsa);
                $fbsa = number_format($numsqrt,2);
                session()->put('bsa',$fbsa);
                $cal = pow(($height/100),2);
                $bmi = number_format(($weight/$cal),1);
                session()->put('bmi',$bmi);
                $response["height"] = $height;
                $response["weight"] = $weight;
                $response["bsa"] = $fbsa;
                $response["bmi"] = $bmi;
                $user = new Admin;
                $user->date = date("d-m-Y");
                $user->time = date("H:i:s");
                $user->height = $height;
                $user->weight = $weight;
                $user->save();
                $id = $user->id;
                session()->put('id',$id);
            }else if($input['measurement_type'] =='IMPERIAL' && ($height <= 99 && $height >= 39 ) && ($weight <= 661 && $weight >= 66 )){
                $bsa = (($height * $weight)/3600);
                $fbsa = number_format(sqrt($bsa),2);
                session()->put('bsa',$fbsa);
                $cal = pow(($height/100),2);
                $bmi = number_format(($weight/$cal),1);
                session()->put('bmi',$bmi);
                $response["height"] = $height;
                $response["weight"] = $weight;
                $response["bsa"] = $fbsa;
                $response["bmi"] = $bmi;
                $user = new Admin;
                $user->date = date("d-m-Y");
                $user->time = date("H:i:s");
                $user->height = $height;
                $user->weight = $weight;
                $user->save();
                $id = $user->id;
                session()->put('id',$id);
            }else if($input['measurement_type'] =='METRIC'){
                if($height > 250 || $height < 100 ){
                    $response['ResCode'] = 101;
                    $response['ResMsg'] .=  'Please enter height in cm, between 100-250cm<br>';
                }
                if($weight > 300 || $weight < 30 ){
                    $response['ResCode'] = 101;
                    $response['ResMsg'] .=  'Please enter weight in kg, between 30-300kg';
                }

            }else if($input['measurement_type'] =='IMPERIAL'){
                if($height > 250 || $height < 100 ){
                    $response['ResCode'] = 101;
                    $response['ResMsg'] .=  'Please enter height in inches, between 39-99 in<br>';
                }
                if($weight > 300 || $weight < 30 ){
                    $response['ResCode'] = 101;
                    $response['ResMsg'] .=  'Please enter weight in pounds, between 66-661 lb';
                }
            }
        }
        return $response;
    }


    public function secondResultScreen(){
        $response = Session::get('SecondResult');
        return view('second_result_page')->with('valvedata', $response);

    }

    public function thirdScreen(){
        $data = Input::all();
        $response = array();
        $atmPressureData = AtomicPressure::orderBy('valveType', 'ASC')->pluck('atm_pressure','valveType');


        if(!empty($data)){
            $trueid = session()->get('trueid');
            $mechanism = session()->get('mechanism');
            $indexedeoa = session()->get('indexedeoa');
            $thvtype = $data['thvType'];
            $fdata = session()->get('fdata');
            $id = session()->get('id');

            $userdata = Admin::find($id);
            // Make sure you've got the Page model
            if($userdata) {
            $userdata->thvType = $thvtype;
            $userdata->save();
            }
            $atmPressure = new AtomicPressure;
            $atm = $atmPressure->where('valveType',$fdata)->get();
            if($thvtype=="Sepian 3"){
                if($trueid>=17.5 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid>=19){
                    $evolutsize = "26";
                    if($trueid <=20 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=22){
                        $disc1 ="SAPIEN implantation in this condition was\n
                            associated with high risk of elevated\n
                            post procedural gradients.";
                            if($trueid <=19 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=21){
                                $disc2 = "BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.";
                            }else{
                                $disc2="";
                            }
                     }else{
                        $disc1="";
                            if($trueid <=19 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=21){
                                $disc2 = "BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.";
                            }else{
                                $disc2="";
                            }

                     }
                }else{
                    $evolutsize = "23";
                    if($trueid <=20 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=22){
                        $disc1 ="SAPIEN implantation in this condition was\n
                            associated with high risk of elevated\n
                            post procedural gradients.";
                            if($trueid <=19 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=21){
                                $disc2 = "BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.";
                            }else{
                                $disc2="";
                            }

                     }else{
                        $disc1="";
                            if($trueid <=19 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=21){
                                $disc2 = "BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.";
                            }else{
                                $disc2="";
                            }

                     }

                }
            }else if($thvtype=="Evolut"){
                if($trueid>=17.5 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid>=19){
                    $evolutsize = "26";
                    if($trueid <=20 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=22){
                            $disc1 ="High THV position, up to 4mm of depth,\n
                            is warranted in order to reduce the risk \n
                            of elevated post procedural gradients.";
                            if($trueid <=19 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=21){
                                $disc2 = "BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.";
                            }else{
                                $disc2="";
                            }
                     }else{
                        $disc1="";
                            if($trueid <=19 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=21){
                                $disc2 = "BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.";
                            }else{
                                $disc2="";
                            }
                     }
                }else{
                    $evolutsize = "23";
                    if($trueid <=20 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=22){
                            $disc1 ="High THV position, up to 4mm of depth,\n
                            is warranted in order to reduce the risk \n
                            of elevated post procedural gradients.";
                             if($trueid <=19 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=21){
                                $disc2 = "BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.";
                            }else{
                                $disc2="";
                            }

                     }else{
                        $disc1="";
                            if($trueid <=19 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=21){
                                $disc2 = "BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.";
                            }else{
                                $disc2="";
                            }
                     }

                }
            }
            Session::put('TVData', $data);
            Session::put('current',3);
            $response = array('data'=>$data,'evol'=>$evolutsize,'disc'=>$disc1,'disc2'=>$disc2,'atm'=>$atm->toArray());
        }
        return view('third_page',$response)->with('atmPressureData',$atmPressureData);

    }

    public function page_2_cal($input){
        $response =  array();
        $response["ResCode"] = 100;
        $vtype = $input['valveType'];
        $arr = $input['lableSize'];
        $fmechanism = $input['fmechanism'];
        $res = explode(",",$arr);
        $lableSize = $res[0];
        $peoa = $res[1];
        $id = session()->get('id');
        $userdata = Admin::find($id);
        // Make sure you've got the Page model
        if($userdata) {
            $userdata->failedValueType = $vtype;
            $userdata->lableSize = $lableSize;
            $userdata->failureMechanism = $fmechanism;
            $userdata->save();
        }
        $bsa = session()->get('bsa');
        $bmi = session()->get('bmi');
        $indexeoa = number_format(($peoa/$bsa),3);
        $response["ftype"] = $vtype;
        $response["mechanism"] = $fmechanism;
        $response["lsize"] = $lableSize;
        $response["ieoa"] = $indexeoa;
        $vData = ValveInfo::where('failed_type',$vtype)->where('lable_size',$lableSize)->first();
        session()->put('mechanism',$fmechanism);
        session()->put('indexedeoa',$indexeoa);
        session()->put('trueid', @$vData[0]['trueid']);
        session()->put('fdata',$vtype);
        session()->put('lsize',$lableSize);
        $response['valvedata'] = $vData->toArray();
        if($indexeoa < 0.65 && $bmi < 30 || $indexeoa < 0.6 && $bmi >= 30){
            //red
            $response["ResCode"] = 103;
            $response["Msg1"] = "Severe Prosthetic-Patient Mismatch.";
            $response["Msg2"] = "<h3 class='black-text' style='color:#ff090'>
                            Severe PPM of the surgical valve is associated with sub-optimal clinical outcomes after valve-in-valve.
                            </h3>";
            //return view("pages/failvaleresult1", array('data'=>$retdata,'valvedata'=>$vData));
        }elseif(0.85 >= $indexeoa && $indexeoa >= 0.65 && $bmi < 30 || 0.7 >= $indexeoa && $indexeoa >= 0.6 && $bmi >= 30 ){
            //orange
            $response["ResCode"] = 102;
            $response["Msg1"] = "Moderate Prosthetic-Patient Mismatch.";
            $response["Msg2"] = "";
            //return view("pages/failvaleresult2", array('data'=>$retdata,'valvedata'=>$vData));
        }elseif($indexeoa > 0.85 && $bmi < 30 || $indexeoa > 0.7 && $bmi >= 30 ){
            //green
            $response["ResCode"] = 101;
            $response["Msg1"]="NO/MILD Prosthetic-Patient Mismatch.";
            $response["Msg2"] = "";
            //return view("pages/failvaleresult3", array('data'=>$retdata,'valvedata'=>$vData));
        }
        return $response;
    }

    public function metricCalcOld()
    {
        $data =Input::all();
        if(!empty($data))
        {
            $type=$data['stype'];
            $height=$data['height'];
            $weight=$data['weight'];

            if($type=='METRIC')
            {
                if(($height <= 250 && $height >= 100 ) && ($weight <= 300 && $weight >= 30 ))
                {
                    $bsa = (($height * $weight)/3600);
                    $fbsa = number_format(sqrt($bsa),2);
                    session()->put('bsa',$fbsa);
                    $cal = pow(($height/100),2);
                    $bmi = number_format(($weight/$cal),2);
                    session()->put('bmi',$bmi);
                    $data = [
                        "height"=>$height,
                        "weight"=>$weight,
                        "bsa"=>$fbsa,
                        "bmi"=>$bmi,
                        "id"=>1,
                    ];
                            $user = new Admin;
                            $user->date = date("d-m-Y");
                            $user->time = date("H:i:s");
                            $user->height = $height;
                            $user->weight = $weight;
                            $user->save();
                            $id = $user->id;
                            session()->put('id',$id);
                            session()->put('check','1');
                    return view('pages/metric')->with('data',$data);
                }else{
                    $data = [
                        "errormsg"=>"<h2>
                         Please enter correct values
                            </h2>
                         <h3>
                            Please enter height in cm, between 100-250cm<br>
                            Please enter weight in kg, between 30-300kg
                         </h3>",
                        "height"=>$height,
                        "weight"=>$weight,
                        "type"=>$type,
                    ];

           //         print_r($data);exit;
                    return view('pages/metric2')->with('data',$data);
               }
            }elseif($type=="IMPERIAL"){
               // print_r($data);exit;
                if(($height <= 99 && $height >= 39 ) && ($weight <= 661 && $weight >= 66 ))
                {
                    $bsa = (($height * $weight)/3600);
                    $fbsa = number_format(sqrt($bsa),2);
                    session()->put('bsa',$fbsa);
                    $cal = pow(($height/100),2);
                    $bmi = number_format(($weight/$cal),2);
                    session()->put('bmi',$bmi);
                    $respnse = [
                        "height"=>$height,
                        "weight"=>$weight,
                        "bsa"=>$fbsa,
                        "bmi"=>$bmi,
                        "id"=>1,
                    ];
                            $user = new Admin;
                            $user->date = date("d-m-Y");
                            $user->time = date("H:i:s");
                            $user->height = $height;
                            $user->weight = $weight;
                            $user->save();
                            $id = $user->id;
                            session()->put('id',$id);
                            session()->put('check','1');
                    return view('pages/imperialresult')->with('data',$respnse);
                }else{
                    $respnse = [
                        "errormsg"=>'<h3 class="black-text">
                        Please enter correct values <br>
                        Please enter height in inches, between 39-99in<br>
                        Please enter weight in pounds, between 66-661lb
                        </h3>',
                        "height"=>$height,
                        "weight"=>$weight,
                          "type"=>$type,
                    ];
                   // print_r($type);exit;
                    return view('pages/metric2')->with('data',$respnse);
                }
            }
        }else{

            $data = [
                        "errormsg"=>'',
                        "height"=>'',
                        "weight"=>'',
                        "type"=>'METRIC',
                    ];
            return view("pages/metric2")->with('data',$data);
        }
    }


    public function failvalveInfo()
    {
    	$valveData = new ValveInfo;
    	$users = $valveData->get();
        $data = ValveInfo::orderBy('failed_type', 'ASC')->distinct()->get(['failed_type']);
    	return view("pages/failvalveinfo")->with('data',$data);
    }
    public function lableSize()
    {
    	$data = Input::all();
    	$fdata = $data['vtype'];
    	$valveData = new ValveInfo;
    	$users = $valveData->get()->where('failed_type',$fdata);
        $retstr="";
    	foreach($users as $data)
    	{
    		$retstr.="<option value='".$data->lable_size.",".$data->ProjectedEOA."'>".$data->lable_size."</option>";
    	}
    	echo $retstr; exit;
    }

    public function failvalveResult()
    {
        $data = Input::all();
        $vtype = $data['valveType'];
        $arr = $data['lableSize'];
        $fmechanism = $data['fmechanism'];
        $res = explode(",",$arr);
        $lableSize = $res[0];
        $peoa = $res[1];
        $id = session()->get('id');

        $userdata = Admin::find($id);
        // Make sure you've got the Page model
        if($userdata) {
        $userdata->failedValueType = $vtype;
        $userdata->lableSize = $lableSize;
        $userdata->failureMechanism = $fmechanism;
        $userdata->save();
        }
        $bsa = session()->get('bsa');
        $bmi = session()->get('bmi');
        $indexeoa = number_format(($peoa/$bsa),2);
        $retdata = [
            "ftype"=>$vtype,
            "mechanism"=>$fmechanism,
            "lsize"=>$lableSize,
            "ieoa"=>$indexeoa,
            "id"=>2,
        ];
        $valveData = new ValveInfo;
        $vData = $valveData->where('failed_type',$vtype)->where('lable_size',$lableSize)->get();
        session()->put('mechanism',$fmechanism);
        session()->put('indexedeoa',$indexeoa);
        session()->put('trueid', $vData[0]['trueid']);
        session()->put('fdata',$vtype);
        session()->put('lsize',$lableSize);
        if($indexeoa<0.65 && $bmi<30 || $indexeoa<0.6 && $bmi>=30){
            session()->put('check','2');
            return view("pages/failvaleresult1", array('data'=>$retdata,'valvedata'=>$vData));

        }elseif(0.85 >= $indexeoa && $indexeoa >= 0.65 && $bmi<30 || 0.7 >= $indexeoa && $indexeoa >= 0.6 && $bmi>=30 ){
            session()->put('check','2');
            return view("pages/failvaleresult2", array('data'=>$retdata,'valvedata'=>$vData));
        }elseif($indexeoa>0.85 && $bmi<30 || $indexeoa>0.7 && $bmi>=30 ){
            session()->put('check','2');
            return view("pages/failvaleresult3", array('data'=>$retdata,'valvedata'=>$vData));
        }
    }

    public function transcathrtrvalveinfo()
    {
    	return view("pages/thventry");
    }
    public function transcathrtrvalveresult()
    {

    	$data = Input::all();
    	$trueid = session()->get('trueid');
    	$mechanism = session()->get('mechanism');
    	$indexedeoa = session()->get('indexedeoa');
    	$thvtype = $data['thvType'];
    	$fdata = session()->get('fdata');
        $id = session()->get('id');

        $userdata = Admin::find($id);
        // Make sure you've got the Page model
        if($userdata) {
        $userdata->thvType = $thvtype;
        $userdata->save();
        }
    	$atmPressure = new AtomicPressure;
    	$atm = $atmPressure->where('valveType',$fdata)->get();
    	if($thvtype=="Sepian 3"){
	    	if($trueid>=17.5 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid>=19){
    			$evolutsize = "26";
    			if($trueid <=20 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=22){
    				$disc1 ="SAPIEN implantation in this condition was\n
                        associated with high risk of elevated\n
                        post procedural gradients.";
                        if($trueid <=19 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=21){
                        	$disc2 = "BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.";
                        }else{
                        	$disc2="";
                        }
                 }else{
                 	$disc1="";
                        if($trueid <=19 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=21){
                        	$disc2 = "BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.";
                        }else{
                        	$disc2="";
                        }

                 }
    		}else{
    			$evolutsize = "23";
    			if($trueid <=20 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=22){
    				$disc1 ="SAPIEN implantation in this condition was\n
                        associated with high risk of elevated\n
                        post procedural gradients.";
                        if($trueid <=19 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=21){
                        	$disc2 = "BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.";
                        }else{
                        	$disc2="";
                        }

                 }else{
                 	$disc1="";
                        if($trueid <=19 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=21){
                        	$disc2 = "BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.";
                        }else{
                        	$disc2="";
                        }

                 }

    		}
    	}else if($thvtype=="Evolut"){
	    	if($trueid>=17.5 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid>=19){
    			$evolutsize = "26";
    			if($trueid <=20 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=22){
    					$disc1 ="High THV position, up to 4mm of depth,\n
                        is warranted in order to reduce the risk \n
                        of elevated post procedural gradients.";
                        if($trueid <=19 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=21){
                        	$disc2 = "BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.";
                        }else{
                        	$disc2="";
                        }
                 }else{
                 	$disc1="";
                        if($trueid <=19 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=21){
                        	$disc2 = "BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.";
                        }else{
                        	$disc2="";
                        }
                 }
    		}else{
    			$evolutsize = "23";
    			if($trueid <=20 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=22){
    					$disc1 ="High THV position, up to 4mm of depth,\n
                        is warranted in order to reduce the risk \n
                        of elevated post procedural gradients.";
	                     if($trueid <=19 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=21){
                        	$disc2 = "BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.";
                        }else{
                        	$disc2="";
                        }

                 }else{
                 	$disc1="";
                        if($trueid <=19 && $mechanism == "Regurgitation" || $mechanism == "Stenosis/Mixed" && $trueid<=21){
                        	$disc2 = "BVF may effectively reduce the risk of elevated post procedural gradients, which may be important in this condition. The safety of this approach is being studied.";
                        }else{
                        	$disc2="";
                        }
                 }

    		}
    	}
		return view('pages/thvresults',array('data'=>$data,'evol'=>$evolutsize,'disc'=>$disc1,'disc2'=>$disc2,'atm'=>$atm));
    }


    // function to store web calculated data in db

    public function postFormdata(Request $request)
    {

        $response = array();
        $inputData = Input::all();
        $storedata = new Admin ;
        $storedata->date = date('d-m-Y');
        $storedata->time = date('H:i:s');
        $storedata->height = $inputData['ht'];
        $storedata->weight = $inputData['wt'];
        $storedata->failedValueType = $inputData['fvalveType'];
        $storedata->lableSize = $inputData['fvalveSize'];
        $storedata->failureMechanism = $inputData['failureMechanism'];
        $storedata->thvType = $inputData['thvType'];
        $storedata->userIP = $request->getClientIp();
        if($storedata->save())
        {
            $response['ResCode'] = 1;
            $response['ResMsg'] = "Data Saved succesfully";
        }
        return json_encode($response);
    }

}
