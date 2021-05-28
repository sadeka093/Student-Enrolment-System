<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
class CSEController extends Controller
{
    public function cse(){
    	
  /*      $id_=$id;*/
        $cse_students=student::where('student_department','1')->get();
        return view('admin.cse',compact('cse_students'));
    
    	
    }
}
