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

	public function admin_dashboard()
	{
		 return view('admin.dashboard');
	}

    //logout
    public function logout()
    {
       Session::put('admin_name',null);
       Session::put('admin_id',null);

       return Redirect::to('/backend');
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
}
