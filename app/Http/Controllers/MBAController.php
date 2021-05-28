<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
class MBAController extends Controller
{
    public function mba(){
    	$mba_students=student::where('student_department','5')->get();
        return view('admin.mba',compact('mba_students'));
    }
}
