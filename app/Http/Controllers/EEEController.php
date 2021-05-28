<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
class EEEController extends Controller
{
   public function eee(){
    	$eee_students=student::where('student_department','2')->get();
        return view('admin.eee',compact('eee_students'));
    }
}
