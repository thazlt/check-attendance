<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Models\MyClass;
use App\Models\Student;
use App\Models\TeacherClass;
use App\Models\User;
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
        $classes = MyClass::all();
        $students = Student::all();
        $teachers = User::all()->where('userType', 1);
        return view('admin.index')->with([
            'classes' => $classes,
            'students' => $students,
            'teachers'=>$teachers,
        ]);
    }

    public function addStudent(Request $rq){
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

        return redirect('/admin#v-pills-students');
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

    public function viewClass(Request $rq){
        $class = MyClass::where('classID', $rq->id)->first();
        return view('admin.classmanage.viewClass')->with([
            'class'=>$class
        ]);
    }
    public function addTeacher(Request $rq){
        $class = MyClass::where('classID', $rq->id)->first();
        return view('admin.classmanage.addTeacher')->with([
            'class'=>$class
        ]);
    }
    public function addTeacherToClass(Request $rq){
        //validate
        //get teacher's id in the class
        $class = MyClass::where('classID', $rq->classID)->first();
        $invalidID = [];
        foreach($class->teachers as $teacher){
            $invalidID[] = $teacher->userID;
        }
        $rq->validate([
            'teacherID'=>['required', 'exists:users,userID', 'not_in:'.implode(',', $invalidID)],
        ]);
        $teacher_class = new TeacherClass();
        $teacher_class->teacherID = $rq->teacherID;
        $teacher_class->classID = $rq->classID;
        if($teacher_class->save()){
            $rq->session()->put('status', 'Add teacher successfully');
        }
        else{
            $rq->session()->put('error', 'An error has occured');
        }
        return redirect(url('/admin/viewClass/'.$rq->classID));
    }

    public function removeTeacher(Request $rq){
        $classID = $rq->get('classID');
        $userID = $rq->get('userID');
        //$teacher_class = TeacherClass::select()->where('classID', $classID)->where('teacherID',$userID)->first()->delete();
        $teacher_class = TeacherClass::where('classID', $classID)->where('teacherID',$userID)->delete();
        $rq->session()->put('status', 'Remove succesfully');
        return redirect("/admin/viewClass/".$classID);
    }

    public function deactivateClass(Request $rq){
        $rq->validate(
            ['classID' => 'exists:my_classes,classID',]
        );
        $class = MyClass::where('classID','=',$rq->get('classID'))->first();
        $class->status = false;
        $class->save();
        $rq->session()->put('status','Class '. $class->name . ' deactivated');
        return redirect(url('/admin/viewClass/'.$rq->classID));
    }
    public function activateClass(Request $rq){
        $rq->validate(
            ['classID' => 'exists:my_classes,classID',]
        );
        $class = MyClass::where('classID','=',$rq->get('classID'))->first();
        $class->status = true;
        $class->save();
        $rq->session()->put('status','Class '. $class->name . ' activated');
        return redirect(url('/admin/viewClass/'.$rq->classID));
    }

    //activate and deactivate teacher
    public function deactivateTeacher(Request $rq){
        $rq->validate(
            ['userID' => 'exists:users,userID',]
        );
        $user = User::where('userID','=',$rq->get('userID'))->first();
        $user->status = false;
        $user->save();
        $rq->session()->put('status','Teacher '. $user->name . ' deactivated');
        return redirect(url('/admin/viewTeachers'));
    }
    public function activateTeacher(Request $rq){
        $rq->validate(
            ['userID' => 'exists:users,userID',]
        );
        $user = User::where('userID','=',$rq->get('userID'))->first();
        $user->status = true;
        $user->save();
        $rq->session()->put('status','Teacher '. $user->name . ' activated');
        return redirect(url('/admin/viewTeachers'));
    }
}
