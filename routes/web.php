<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TutionController;
use App\Http\Controllers\AllstudentsController;
use App\Http\Controllers\AddstudentsController;
use App\Http\Controllers\CSEController;
use App\Http\Controllers\EEEController;
use App\Http\Controllers\ECEController;
use App\Http\Controllers\BBAController;
use App\Http\Controllers\MBAController;
use App\Http\Controllers\TeacherController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//logout
Route::get('/logout', [AdminController::class, 'logout']);

Route::get('/', function () {
    return view('student_login');
});

Route::get('/backend', function () {
    return view('admin.admin_login');
});


Route::post('/adminlogin', [AdminController::class, 'login_dashboard']);
Route::get('/admin_dashboard', [AdminController::class, 'admin_dashboard']);
Route::get('/viewprofile', [AdminController::class, 'viewprofile']);
Route::get('/setting', [AdminController::class, 'setting']);

//add student
Route::get('/addstudent', [AddstudentsController::class, 'addstudent']);
Route::post('/savestudent', [AddstudentsController::class, 'savestudent']);
Route::post('/deletestudent/{student_id}', [AddstudentsController::class, 'deletestudent'])->name('admin.deletestudent');

Route::get('/allstudent', [AllstudentsController::class, 'allstudent']);
Route::get('/studentview/{student_id}', [AllstudentsController::class, 'studentview']);

Route::get('/studentedit/{student_id}', [AllstudentsController::class, 'studentedit']);
Route::post('/updatestudent/{student_id}', [AllstudentsController::class, 'updatestudent'])->name('admin.updatestudent');;

Route::get('/tutionfee', [TutionController::class, 'tution']);
Route::get('/cse', [CSEController::class, 'cse']);
Route::get('/eee', [EEEController::class, 'eee']);
Route::get('/ece', [ECEController::class, 'ece']);
Route::get('/bba', [BBAController::class, 'bba']);
Route::get('/mba', [MBAController::class, 'mba']);

Route::get('/allteacher', [TeacherController::class, 'allteacher']);
Route::get('/addteacher', [TeacherController::class, 'addteacher']);
Route::post('/saveteacher', [TeacherController::class, 'saveteacher']);
Route::post('/deleteteacher/{teachers_id}', [TeacherController::class, 'deleteteacher'])->name('admin.deleteteacher');
/*Route::get('/teacherview/{teachers_id}', [TeacherController::class, 'teacherview']);*/