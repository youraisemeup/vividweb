<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Session;
use App\AdminLogin;
use Illuminate\Support\Facades\Input;
use Validator;
use App\ValveInfo;
use Auth;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/login');
    }

    public function adminlogin()
    {
        $data = Input::all();
        /*print_r($data); exit;*/
        $rules =[
                'username'=>'required|exists:admin_logins',
                'password'=>'required',
        ];
        $validator = Validator::make($data,$rules);
        if($validator->fails())
        {
            return view('admin/login')->withErrors($validator);
        }else{
            $admindata = new Admin;
            $admindata->username=$data['username'];
            $admindata->password=$data['password'];
            $admin = AdminLogin::where([
                'username' => $admindata->username,
                'password' => md5($admindata->password)
            ])->first();
            if($admin)
            {
                session()->put('admin', $admin);
                    return redirect('/get-data');

            }else{
                $msg['password']="Wrong password, please try later";
                return view('admin/login')->withErrors($msg);
            }
        }
    }

    public function adminlogout(Request $request)
    {
        $request->session()->forget('admin');
        return redirect('/index');
    }


    public function getuserdata()
    {

        if(!session()->has('admin'))
        {
            return redirect('/index');
        }
         $userdata = new Admin;
            $users = $userdata->select('admins.id as id', 'admins.Date', 'admins.time', 'users.email', 'admins.height', 'admins.weight', 'admins.failedValueType', 'admins.lableSize', 'admins.failureMechanism', 'admins.thvType', 'admins.userIP')
            ->leftJoin('users','users.id','=','admins.userid')
           /* ->where('admins.userid','!=','0')*/
            ->orderByDesc('admins.created_at')->get();
            //echo json_encode($users);
            return view("admin/index")->with('user',$users);

    }
    public function graphdata(Request $request)
    {
        if(!session()->has('admin'))
        {
            return redirect('/index');
        }

        $userdata = new Admin;
            $ftype = $userdata->groupBy('failedValueType')/*->whereNotNull('userid')*/->count('id');
            $lsize = $userdata->groupBy('lableSize')/*->whereNotNull('userid')*/->count('id');
            $fmach = $userdata->groupBy('failureMechanism')/*->whereNotNull('userid')*/->count('id');
            $ttype = $userdata->groupBy('thvType')/*->whereNotNull('userid')*/->count('id');
            $data=[
                'ftype'=>$ftype,
                'lsize'=>$lsize,
                'fmach'=>$fmach,
                'ttype'=>$ttype,
            ];
        return view("admin/g-data")->with('data',$data);
    }

    public function searchdata(Request $request)
    {
        if(!session()->has('admin'))
        {
            return redirect('/index');
        }
            $dt1 = $request->input('dt1');
            $dt2 = $request->input('dt2');
            $data = Admin::select('admins.Date', 'admins.time', 'users.email', 'admins.height', 'admins.weight', 'admins.failedValueType', 'admins.lableSize', 'admins.failureMechanism', 'admins.thvType', 'admins.userIP')
            ->leftJoin('users','users.id','=','admins.userid')
           /* ->where('admins.userid','!=','0')*/
            ->where('Date', '>=',$dt1)->where('Date', '<=', $dt2)->orderBy('Date', 'desc')->get();
            $jsondata = json_encode($data);
            echo $jsondata; exit;

    }

    public function searchgraphdata(Request $request)
    {
       if(!session()->has('admin'))
        {
            return redirect('/index');
        }
            $dt1 = $request->input('dt1');
            $dt2 = $request->input('dt2');
            $userdata = new Admin;
            $ftype = $userdata->where('Date', '>=',$dt1)->where('Date', '<=', $dt2)/*->whereNotNull('userid')*/->groupBy('failedValueType')->count('id');
            $lsize = $userdata->where('Date', '>=',$dt1)->where('Date', '<=', $dt2)/*->whereNotNull('userid')*/->groupBy('lableSize')->count('id');
            $fmach = $userdata->where('Date', '>=',$dt1)->where('Date', '<=', $dt2)/*->whereNotNull('userid')*/->groupBy('failureMechanism')->count('id');
            $ttype = $userdata->where('Date', '>=',$dt1)->where('Date', '<=', $dt2)/*->whereNotNull('userid')*/->groupBy('thvType')->count('id');
            $data=[
                'ftype'=>$ftype,
                'lsize'=>$lsize,
                'fmach'=>$fmach,
                'ttype'=>$ttype,
            ];
            $jsondata = json_encode($data);
            echo $jsondata; exit;
    }

    public function exportuserdata(Request $request)
    {
        if(!session()->has('admin'))
        {
            return redirect('/index');
        }
            $dt1 = $request->input('dt1');
            $dt2 = $request->input('dt2');
            if(!empty($dt1) && !empty($dt2))
            {
                $userdata = new Admin;
                $data = $userdata->select('admins.Date', 'admins.time', 'users.email', 'admins.height', 'admins.weight', 'admins.failedValueType', 'admins.lableSize', 'admins.failureMechanism', 'admins.thvType', 'admins.userIP')
                ->leftJoin('users','users.id','=','admins.userid')
            /*    ->where('admins.userid','!=','0')*/
                ->where('Date','>=',$dt1)->where('Date','<=', $dt2)->orderBy('Date', 'desc')->get();
                $jsondata = json_encode($data);
                echo $jsondata; exit;
            }else{
                $userdata = new Admin;
                $data = $userdata->select('admins.Date', 'admins.time', 'users.email', 'admins.height', 'admins.weight', 'admins.failedValueType', 'admins.lableSize', 'admins.failureMechanism', 'admins.thvType', 'admins.userIP')
                ->leftJoin('users','users.id','=','admins.userid')
               /* ->where('admins.userid','!=','0')*/->orderBy('Date', 'desc')->get();
                $jsondata = json_encode($data);
                echo $jsondata; exit;
            }


    }
    public function deletedata(Request $request)
    {
        if(!session()->has('admin'))
        {
            return redirect('/index');
        }
        $user_id_array = $request->input('id');
        $user = Admin::whereIn('id', $user_id_array);
        if($user->delete())
        {
            echo 'Data Deleted';
        }

    }
    public function getValvedata(Request $request)
    {
        $dt1 = $request->input('dt1');
        $dt2 = $request->input('dt2');
         if($dt1 == null && $dt2 == null)
        {
            $get_info = Admin::select('failedValueType', DB::raw('count(*) as total'))
            	/*	->whereNotNull('userid')*/
                     ->groupBy('failedValueType')
                     ->get();

            $array = $get_info->toArray();
            echo json_encode($array); exit;
            /*print_r(); exit;
            return $array; exit; */
        } else {

            $get_info = Admin::select('failedValueType', DB::raw('count(*) as total'))
                     ->whereBetween(DB::raw('date'), array($dt1, $dt2))
                     /*->whereNotNull('userid')*/
                     ->groupBy('failedValueType')
                     ->get();

            $array = $get_info->toArray();
            echo json_encode($array); exit;

        }

    }
    public function getLablesizedata(Request $request)
    {


        $dt1 = $request->input('dt1');
        $dt2 = $request->input('dt2');
        if($dt1 == null && $dt2 == null)
        {
            //echo "not has Date"; exit;
           $get_info = Admin::select('lableSize',DB::raw('count(*) as total'))
           			/*->whereNotNull('userid')*/
                     ->groupBy('lableSize')
                     ->get();

            $get_label = ValveInfo::select('lable_size')->groupBy('lable_size')->get();
            $subArray = $get_info->toArray();
            //print_r($arrayTwo);
            $masterArray = $get_label->toArray();
            $tmp = array();
            foreach($subArray as  $v){
               $tmp[$v['lableSize']] = $v['total'];
            }
            $dataArray = array();
            foreach($masterArray as  $v){
               if(isset($tmp[$v['lable_size']])){
                   $dataArray[] = array('lableSize'=>$v['lable_size'] , 'total'=>$tmp[$v['lable_size']]);
               }else{
                   $dataArray[] = array('lableSize'=>$v['lable_size'] , 'total'=>0);
               }
            }
            echo json_encode($dataArray);
            exit;
        }else{
            //echo "has Date"; exit;
            $get_info = Admin::select('lableSize',DB::raw('count(*) as total'))
                ->whereBetween(DB::raw('date'), array($dt1, $dt2))
               /* ->whereNotNull('userid')*/
                ->groupBy('lableSize')
                 ->get();
            $get_label = ValveInfo::select('lable_size')->groupBy('lable_size')->get();
            $subArray = $get_info->toArray();
            //print_r($arrayTwo);
            $masterArray = $get_label->toArray();
            $tmp = array();
            foreach($subArray as  $v){
               $tmp[$v['lableSize']] = $v['total'];
            }
            $dataArray = array();
            foreach($masterArray as  $v){
               if(isset($tmp[$v['lable_size']])){
                   $dataArray[] = array('lableSize'=>$v['lable_size'] , 'total'=>$tmp[$v['lable_size']]);
               }else{
                   $dataArray[] = array('lableSize'=>$v['lable_size'] , 'total'=>0);
               }
            }
            echo json_encode($dataArray);
            exit;
        }

    }
    public function getfmechanismdata(Request $request)
    {
        $dt1 = $request->input('dt1');
        $dt2 = $request->input('dt2');
         if($dt1 == null && $dt2 == null)
        {
           $get_info = Admin::select('failureMechanism', DB::raw('count(*) as total'))
           			/*->whereNotNull('userid')*/
                     ->groupBy('failureMechanism')
                     ->get();

            $array = $get_info->toArray();
            echo json_encode($array); exit;
        } else {
               $get_info = Admin::select('failureMechanism', DB::raw('count(*) as total'))
                         ->whereBetween(DB::raw('date'), array($dt1, $dt2))
                         /*->whereNotNull('userid')*/
                         ->groupBy('failureMechanism')
                         ->get();

                $array = $get_info->toArray();
                echo json_encode($array); exit;

        }
    }

     public function getthvdata(Request $request)
    {

        $dt1 = $request->input('dt1');
        $dt2 = $request->input('dt2');
         if($dt1 == null && $dt2 == null)
        {

           $get_info = Admin::select('thvType', DB::raw('count(*) as total'))
           			 /*->whereNotNull('userid')*/
                     ->groupBy('thvType')
                     ->get();

            $array = $get_info->toArray();
            echo json_encode($array); exit;
        } else {
            $get_info = Admin::select('thvType', DB::raw('count(*) as total'))
                     ->whereBetween(DB::raw('date'), array($dt1, $dt2))
                    /* ->whereNotNull('userid')*/
                     ->groupBy('thvType')
                     ->get();

            $array = $get_info->toArray();
            echo json_encode($array); exit;
        }
    }

}
