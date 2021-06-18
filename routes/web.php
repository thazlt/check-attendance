<?php

use App\Http\Controllers\AdminController;
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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin routes
Route::middleware(Admin::class)->group(function () {
    //home page
    Route::get('/admin', [AdminController::class, 'index']);
    //add student page
    Route::get('/admin/addStudent', [AdminController::class, 'addStudent']);
    Route::post('/admin/addStudent', [AdminController::class, 'addStudentAdd']);
});
//Teacher routes
Route::middleware(['auth'])->group(function () {

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
