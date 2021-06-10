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

//Admin routes
Route::middleware(Admin::class)->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
});
//Teacher routes
Route::middleware(['auth'])->group(function () {

});
//Guest routes

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    echo("blabla");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
