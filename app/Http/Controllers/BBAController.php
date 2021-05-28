<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
class BBAController extends Controller
{
     public function bba(){
     	 $bba_students=student::where('student_department','4')->get();
        return view('admin.bba',compact('bba_students'));
    	}
}
