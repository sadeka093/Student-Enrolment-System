<?php

namespace App\Http\Controllers;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
Session_start();

class AddstudentsController extends Controller
{
	public function deletestudent($student_id)
	{
		DB::table('student_tbl')
		->where('student_id',$student_id)
		->delete();
		/*$data =student::find($student_id);
		if(!is_null($data))
		{
			$data->delete();
		}*/
/*		session()->flash('success','product deleted!!');*/
		/*Session::put('success','A new Student has added successfully !!');*/
		return Redirect::to('/allstudent');

    // $device= \DB::table('products')->where('id',$id)->delete();
	}
	public function addstudent()
	{
		return view('admin.addstudent');
	}

	public function savestudent(Request $request)
	{
		$student = new student();

		$student->student_name = $request->student_name;
		$student->student_roll = $request->student_roll;
		$student->student_fathername = $request->student_fathername;
		$student->student_mothername = $request->student_mothername;
		$student->student_email = $request->student_email;
		$student->student_phone = $request->student_phone;
		$student->student_address = $request->student_address;
		$student->student_password = $request->student_password;
		$student->student_department = $request->student_department;
		$student->student_admissionyear = $request->student_admissionyear;
		


		if($request->hasFile('student_image')){
			$image= $request->file('student_image');
			$img= time().'.'.$image->getClientOriginalExtension();
			$image->move('images/students/',$img);
			$student->student_image=$img;
		}
		$student->save();
		/*session()->flash('success','A new categorry has added successfully !!');*/
		Session::put('success','A new Student has added successfully !!');
		return Redirect::to('/addstudent');



	}
	public function studentprofile()
	{
		$student_id=Session::get('student_id');
		$student_profile=DB::table('student_tbl')
		->select('*')
		->where('student_id',$student_id)
		->first();
		
	/*	echo "</pre>";
		print_r($student_profile);
		echo"</pre>";*/
	
			return view('student.student_view',compact('student_profile'));
	}
} 
