<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Models\Student;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(Admin::class);
    }
    public function index(){
        return view('admin.index');
    }
    public function addStudent(){
        return view('admin.addstudent');
    }
    public function addStudentAdd(Request $rq){
        $rq->validate([
            'name'=>'required',
            'dob' => 'required|date',
            'email' => 'required|unique:students|string|max:255',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
        $student = new Student();
        $student->name = $rq->name;
        $student->dob = $rq->dob;
        $student->email = $rq->email;
        $student->phone = $rq->phone;
        $student->save();
        $rq->session()->put('status', 'Add student successfully');
        return redirect('/admin');
    }
}
