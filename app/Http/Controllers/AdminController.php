<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
Session_start();
class AdminController extends Controller
{ 

  public function viewprofile()
  {
   return view('admin.view');
 }

 public function setting()
 {
   return view('admin.settings');
 }
 public function student_setting()
 {
  $student_id=Session::get('student_id');
  $student_description_view=DB::table('student_tbl')
    ->where('student_id',$student_id)
    ->first();
      return view('student.student_setting',compact('student_description_view'));
      

 }

 public function admin_dashboard()
 {
   return view('admin.dashboard');
 }
 public function student_dashboard()
 {
  return view('student.dashboard');
}

    //logout
public function logout()
{
 Session::put('admin_name',null);
 Session::put('admin_id',null);

 return Redirect::to('/backend');
}
public function student_logout()
{
 Session::put('student_name',null);
 Session::put('student_id',null);

 return Redirect::to('/');
}

public function login_dashboard(Request $request)
{
  /* return view ('admin.dashboard');*/
  $email=$request->admin_email;
  $password=md5($request->admin_password);
  $result=DB::table('admin_tbl')
  ->where('admin_email',$email)
  ->where('admin_password',$password)
  ->first();
     /*echo "</pre>";
     print_r($result);*/

     if($result)
     {
     	Session::put('admin_email',$result->admin_email);
     	Session::put('admin_id',$result->admin_id);
     	return Redirect::to('/admin_dashboard');
     }
     else{
     	Session::put('exception','Email or Password Invalid');
     	return Redirect::to('/backend');
     }

   }
   public function student_login_dashboard(Request $request)
   {
    /* return view ('admin.dashboard');*/
    $email=$request->student_email;
    $password=($request->student_password);
    $result=DB::table('student_tbl')
    ->where('student_email',$email)
    ->where('student_password',$password)
    ->first();
     /*echo "</pre>";
     print_r($result);*/

     if($result)
     {
      Session::put('student_email',$result->student_email);
      Session::put('student_id',$result->student_id);
      return Redirect::to('/student_dashboard');
    }
    else{
      Session::put('exception','Email or Password Invalid');
      return Redirect::to('/');
    }

  }
}
