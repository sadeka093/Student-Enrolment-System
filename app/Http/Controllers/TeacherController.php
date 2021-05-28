<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Teacher;
use DB;
use Session;
Session_start();
class TeacherController extends Controller
{
	public function allteacher(){
		$teachers = Teacher::orderBy('teachers_id')->get();
		return view('admin.allteacher',compact('teachers'));

	}
	public function addteacher()
	{
		return view('admin.addteacher');
	}
	public function saveteacher(Request $request)
	{
		$teacher = new Teacher();

		$teacher->teachers_name = $request->teachers_name;
		$teacher->teachers_phone = $request->teachers_phone;
		$teacher->teachers_address = $request->teachers_address;
		$teacher->teachers_department = $request->teachers_department;
		if($request->hasFile('teachers_image')){
			$image= $request->file('teachers_image');
			$img= time().'.'.$image->getClientOriginalExtension();
			$image->move('images/teachers/',$img);
			$teacher->teachers_image=$img;
		}
		$teacher->save();
		/*session()->flash('success','A new categorry has added successfully !!');*/
		Session::put('success','A new Teacher has added successfully !!');
		return Redirect::to('/addteacher');



	}

		public function deleteteacher($teachers_id)
	{
		DB::table('teachers_tbl')
		->where('teachers_id',$teachers_id)
		->delete();
		/*$data =student::find($student_id);
		if(!is_null($data))
		{
			$data->delete();
		}*/
/*		session()->flash('success','product deleted!!');*/
		/*Session::put('success','A new Student has added successfully !!');*/
		return Redirect::to('/allteacher');

    // $device= \DB::table('products')->where('id',$id)->delete();
	}

	public function teacherview($teachers_id){
    	/*$students = student::orderBy('student_id')->get();*/
    	$teacher=DB::table('teachers_tbl')
		->where('teachers_id',$teachers_id)
		->first();
    	return view('admin.teacherview',compact('teacher'));
    }
}
