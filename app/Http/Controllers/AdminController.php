<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Models\MyClass;
use App\Models\Student;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(Admin::class);
    }
    //home page
    public function index(){
        return view('admin.index');
    }

    //Add student page
    public function addStudent(){
        return view('admin.studentmanage.addstudent');
    }

    public function addStudentAdd(Request $rq){
        //validate
        $rq->validate([
            'name'=>'required',
            'dob' => 'required|date',
            'email' => 'required|unique:students|string|max:255',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
        //save to database
        $student = new Student();
        $student->name = $rq->name;
        $student->dob = $rq->dob;
        $student->email = $rq->email;
        $student->phone = $rq->phone;
        $status = $student->save();
        //create message
        if ($status) {
            $rq->session()->put('status', 'Add student successfully');
        }
        else{
            $rq->session()->put('status', 'An error has occured');
        }

        return redirect('/admin');
    }
    //create classes
    public function createClass(){
        return view('admin.classmanage.createClass');
    }

    public function createClassAdd(Request $rq){
        //validate
        $rq->validate([
            'name'=>'required',
            'begin' => 'required|date|after_or_equal:'.date('d-m-Y'),
            'end' => 'required|date|after_or_equal:begin',
        ]);
        //save to database
        $class = new MyClass();
        $class->name = $rq->name;
        $class->begin = $rq->begin;
        $class->end = $rq->end;
        $status = $class->save();
        //create message
        if ($status) {
            $rq->session()->put('status', 'Create class successfully');
        }
        else{
            $rq->session()->put('status', 'An error has occured');
        }
        return redirect('/admin');
    }
    public function viewAllClasses(){
        $classes = MyClass::all();
        return view('admin.classmanage.viewAllClasses')->with([
            'classes'=>$classes,
        ]);
    }
}
