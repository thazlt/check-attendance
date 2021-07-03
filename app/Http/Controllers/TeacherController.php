<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\MyClass;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\TeacherClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $rq){
        $teacher = User::where('userID', Auth::user()->userID)->first();
        if($teacher->status == 0){
            $rq->session()->put('error', 'Your account is disabled. Contact admin for more info');
            Auth::logout();
            return redirect(url('/login'));
        }
        $classes = $teacher->my_classes;
        return view('teacher.index')->with([
            'teacher'=>$teacher,
            'classes'=>$classes
        ]);
    }

    public function viewClass(Request $rq){
        $class = MyClass::where('classID', $rq->id)->first();
        $errors = [];
        if(!$class->status){
            $errors[] = 'This class is deactivated';
        }
        if(!empty($errors)){
            session()->put('errorsmess', $errors);
        }
        return view('teacher.classmanage.viewclass')->with([
            'class'=>$class
        ]);
    }

    public function checkAttendance(Request $rq){
        //validate
        $scheduleID = $rq->scheduleID;
        $studentID = $rq->studentID;
        $status = $rq->status;
        $teacherID  = Auth::user()->userID;
        $errors = [];
        //check if class is locked
        $classID = Schedule::where('scheduleID', $scheduleID)->first()->classID;
        if(!MyClass::where('classID', $classID)->first()->status){
            $errors[]=['classError' => 'This class is deactivated'];
        }
        //check if teacher is in class
        if(!TeacherClass::where('classID', $classID)->where('teacherID', $teacherID)->first()){
            $errors[]=['teacherError' => 'This teacher is not allowed to check attendace in this class'];
        }
        //check if student is in class
        if(!StudentClass::where('studentID', $studentID)->where('classID', $classID)->first()){
            $errors[]=['studentError' => 'This student is not in this class'];
        }
        //update the status
        if(empty($errors)){
            Attendance::where('scheduleID', $scheduleID)->where('studentID', $studentID)->update(['status' => $status]);
            return view('include.attendanceForm')->with([
            'scheduleID' => $scheduleID,
            'studentID' => $studentID,
            'status' => $status,
        ]);
        }
        return 0;
    }

    public function attendanceForm(Request $rq){
        $scheduleID = $rq->scheduleID;
        $studentID = $rq->studentID;
        $status = $rq->status;
        return view('include.attendanceForm')->with([
            'scheduleID' => $scheduleID,
            'studentID' => $studentID,
            'status' => $status,
        ]);
    }
}
