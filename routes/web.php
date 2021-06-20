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
    //add student page
    Route::get('/admin/addStudent', [AdminController::class, 'addStudent']);
    Route::post('/admin/addStudent', [AdminController::class, 'addStudentAdd']);
    //creat class page
    Route::get('/admin/createClass', [AdminController::class, 'createClass']);
    Route::post('/admin/createClass', [AdminController::class, 'createClassAdd']);
    //view class list
    Route::get('/admin/viewAllClasses', [AdminController::class, 'viewAllClasses']);
});
//Teacher routes
Route::middleware(['auth'])->group(function () {
    Route::get('/teacher', [TeacherController::class, 'index']);
});

Auth::routes();


