<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
class ECEController extends Controller
{
    public function ece(){
    	$ece_students=student::where('student_department','3')->get();
        return view('admin.ece',compact('ece_students'));
    }
}
