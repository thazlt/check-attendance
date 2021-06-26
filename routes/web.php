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
    //view Students
    Route::get('/admin/viewStudents', [AdminController::class, 'viewStudents']);
    //view Teachers
    Route::get('/admin/viewTeachers', [AdminController::class, 'viewTeachers']);
    //add student page
    Route::get('/admin/addStudent', [AdminController::class, 'addStudent']);
    Route::post('/admin/addStudent', [AdminController::class, 'addStudentAdd']);
    //creat class page
    Route::get('/admin/createClass', [AdminController::class, 'createClass']);
    Route::post('/admin/createClass', [AdminController::class, 'createClassAdd']);
    //view class list
    Route::get('/admin/viewAllClasses', [AdminController::class, 'viewAllClasses']);
    //view 1 class
    Route::get('/admin/viewClass/{id}', [AdminController::class, 'viewClass']);
    //add teacher to class
    Route::get('/admin/addTeacher/{id}', [AdminController::class, 'addTeacher']);
    Route::post('/admin/addTeacherToClass', [AdminController::class, 'addTeacherToClass']);
    //remove teacher from class
    Route::post('/admin/removeTeacher', [AdminController::class, 'removeTeacher']);
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
});

Auth::routes();


