<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    public $table='student_tbl';
    	/* protected $fillable = ['student_name','student_roll','student_fathername','student_mothername','student_email','student_phone','student_address','student_image','student_password','student_department','student_admissionyear',];*/
     
}
