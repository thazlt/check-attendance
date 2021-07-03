<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//Guest routes
Auth::routes();

Route::get('/', function () {
    if(!isset(Auth::user()->userType)){
        return redirect('/login');
    }
    if(Auth::user()->userType == 0){
        return redirect('/admin');
    }
    if(Auth::user()->userType == 1){
        return redirect('/teacher');
    }
});

//Admin routes
Route::middleware(Admin::class)->group(function () {
    //home page
    Route::get('/admin', [AdminController::class, 'index']);
    //Add student to system
    Route::post('/admin/addStudent', [AdminController::class, 'addStudent']);
    //view class
    Route::get('/admin/viewClass/{id}', [AdminController::class, 'viewClass']);

    //Class Mangage
    Route::post('/admin/createClass', [AdminController::class, 'createClass']);

    //Teacher Mangage
    //add teacher to class
    Route::post('/admin/addTeacher', [AdminController::class, 'addTeacher']);
    //remove teacher from class
    Route::post('/admin/removeTeacher', [AdminController::class, 'removeTeacher']);

    //Student Manage
    //add student to class
    Route::post('/admin/addStudentClass', [AdminController::class, 'addStudentClass']);
    //remove student from class
    Route::post('/admin/removeStudentClass', [AdminController::class, 'removeStudentClass']);

    //Schedule Manage
    //add a learning date
    Route::post('/admin/addSchedule', [AdminController::class, 'addSchedule']);
    //reomve a learning date
    Route::post('/admin/removeSchedule', [AdminController::class, 'removeSchedule']);

    //Checking attendance
    Route::post('/admin/checkAttendance', [AdminController::class, 'checkAttendance']);

    //activate and deactivate class
    Route::post('/admin/deactivateClass',[AdminController::class, 'deactivateClass']);
    Route::post('/admin/activateClass',[AdminController::class, 'activateClass']);
    //activate and deactivate teacher
    Route::post('/admin/deactivateTeacher',[AdminController::class, 'deactivateTeacher']);
    Route::post('/admin/activateTeacher',[AdminController::class, 'activateTeacher']);
});
//Teacher routes
Route::middleware(['auth'])->group(function () {
    Route::get('/teacher', [TeacherController::class, 'index']);
    Route::put('/checkAttendance', [TeacherController::class, 'checkAttendance']);
    //get views
    Route::get('/views/include/attendanceForm/{scheduleID}/{studentID}/{status}', [TeacherController::class, 'attendanceForm']);
    //view class
    Route::get('/teacher/viewClass/{id}', [TeacherController::class, 'viewClass']);
});

Auth::routes();


