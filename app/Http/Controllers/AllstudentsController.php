<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use Illuminate\Support\Facades\Redirect;
use DB;
class AllstudentsController extends Controller
{
    public function allstudent(){
    	$students = student::orderBy('student_id')->get();
    	return view('admin.allstudent',compact('students'));
    }

    public function studentview($student_id){
    	/*$students = student::orderBy('student_id')->get();*/
    	$student=DB::table('student_tbl')
		->where('student_id',$student_id)
		->first();
    	return view('admin.studentview',compact('student'));
    }
    public function studentedit($student_id){
    	$student=DB::table('student_tbl')
		->where('student_id',$student_id)
		->first();
    	
      return view('admin.studentedit')->with('student',$student);
    	
    }
    public function updatestudent(Request $request,$student_id){
    	/*if($request->hasFile('student_image')){
			$image= $request->file('student_image');
			$img= time().'.'.$image->getClientOriginalExtension();
			$image->move('images/students/',$img);
			
		}*/

    	 $device = DB::table('student_tbl')
       ->where('student_id', $student_id)
       ->update([
           'student_name' => $request->student_name,
           'student_roll' => $request->student_roll,
           'student_fathername' => $request->student_fathername,
           'student_mothername' => $request->student_mothername,
           'student_email' => $request->student_email,
          'student_phone' => $request->student_phone,
          'student_address' => $request->student_address,
          'student_password' => $request->student_password,
          'student_department' => $request->student_department,
          'student_admissionyear' => $request->student_admissionyear,
          /*'student_image' => $img,*/

         

       ]);


       



    	
    	
     return Redirect::to('/allstudent');
    	
    }
}
