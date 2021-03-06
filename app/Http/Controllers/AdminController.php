<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use App\Models\Attendance;
use App\Models\MyClass;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\StudentClass;
use App\Models\TeacherClass;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $rq->session()->put('messages', ['Add student successfully']);
        }
        else{
            $rq->session()->put('errorsmess', ['An error has occured']);
        }
        return redirect('/admin#v-pills-students');
    }
    //create classes
    public function createClass(Request $rq){
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
            $rq->session()->put('messages', ['Create class successfully']);
        }
        else{
            $rq->session()->put('errorsmess', ['An error has occured']);
        }
        return redirect('/admin#v-pills-class');
    }
    //Class Manage
    public function viewClass(Request $rq){
        $class = MyClass::where('classID', $rq->id)->first();
        return view('admin.classmanage.viewClass')->with([
            'class'=>$class
        ]);
    }

    public function addTeacher(Request $rq){
        //validate
        //get teacher's id in the class
        var_dump($rq->classID);
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
            $rq->session()->put('messages', ['Add teacher successfully']);
        }
        else{
            $rq->session()->put('errorsmess', ['An error has occured']);
        }
        return redirect(url('/admin/viewClass/'.$rq->classID));
    }

    public function removeTeacher(Request $rq){
        $classID = $rq->get('classID');
        $userID = $rq->get('userID');
        $teacher_class = TeacherClass::where('classID', $classID)->where('teacherID',$userID)->delete();
        $rq->session()->put('messages', ['Remove succesfully']);
        return redirect("/admin/viewClass/".$classID);
    }

    public function addStudentClass(Request $rq){
        //validate
        //get student's id in the class
        $class = MyClass::where('classID', $rq->classID)->first();
        $invalidID = [];
        foreach($class->students as $student){
            $invalidID[] = $student->studentID;
        }
        $rq->validate([
            'studentID'=>['required', 'exists:students,studentID', 'not_in:'.implode(',', $invalidID)],
        ]);
        //check if student is active
        $active = Student::where('studentID', $rq->studentID)->first()->status;
        if(!$active){
            $rq->session()->put('errorsmess', ['The student is deactivated']);
            return redirect(url('/admin/viewClass/'.$rq->classID));
        }
        //add to class
        $student_class = new StudentClass();
        $student_class->studentID = $rq->studentID;
        $student_class->classID = $rq->classID;
        if($student_class->save()){
            $rq->session()->put('messages', ['Add student successfully']);
        }
        else{
            $rq->session()->put('errorsmess', ['An error has occured']);
        }
        //add absent attendance
        //get class's schedules
        $schedules = $class->schedules;
        foreach ($schedules as $schedule) {
            $attendance = new Attendance();
            $attendance->studentID = $rq->studentID;
            $attendance->scheduleID = $schedule->scheduleID;
            $attendance->status = "A";
            $attendance->save();
        }
        return redirect(url('/admin/viewClass/'.$rq->classID));
    }

    public function removeStudentClass(Request $rq){
        $classID = $rq->get('classID');
        $studentID = $rq->get('studentID');
        $student_class = StudentClass::where('classID', $classID)->where('studentID',$studentID)->delete();
        $rq->session()->put('messages', ['Remove succesfully']);
        //delete all attendance
        $class = MyClass::where('classID', $classID)->first();
        $schedules = $class->schedules;
        foreach ($schedules as $schedule) {
            $attendance = Attendance::where('studentID', $studentID)->where('scheduleID', $schedule->scheduleID)->delete();
        }
        return redirect("/admin/viewClass/".$classID);
    }

    public function addSchedule(Request $rq){
        //validate
        //schedules between begin and end date, not existed
        $class = MyClass::where('classID', $rq->classID)->first();
        $invalid = [];
        foreach($class->schedules as $schedule){
            $invalid[] = date('d-m-Y', strtotime($schedule->date->toDateString()));
        }
        $rq->validate([
            'date'=>['required', 'not_in:'.implode(',', $invalid), 'after_or_equal:'.date('d-m-Y', strtotime($class->begin->toDateString())), 'before_or_equal:'.date('d-m-Y', strtotime($class->end->toDateString()))],
        ]);
        //add to schedules
        $schedule = new Schedule();
        $schedule->classID = $rq->classID;
        $schedule->date = $rq->date;
        if($schedule->save()){
            $rq->session()->put('status', 'Schedule updated');
        }
        else{
            $rq->session()->put('status', 'An error has occured');
        }
        //add attendance to students
        $students = $class->students;
        foreach($students as $student){
            $attendance = new Attendance();
            $attendance->studentID = $student->studentID;
            $attendance->scheduleID = $schedule->scheduleID;
            $attendance->status = "A";
            $attendance->save();
        }
        return redirect(url('/admin/viewClass/'.$rq->classID));
    }

    public function removeSchedule(Request $rq){
        $scheduleID = $rq->get('scheduleID');
        Schedule::where('scheduleID', $scheduleID)->delete();
        $rq->session()->put('status', 'Remove succesfully');
        $class = MyClass::where('classID', $rq->classID)->first();
        $students = $class->students;
        //delete all attendance
        $students = $class->students;
        foreach ($students as $student) {
            $attendance = Attendance::where('studentID', $student->studentID)->where('scheduleID', $scheduleID)->delete();
        }
        return redirect("/admin/viewClass/".$rq->classID);
    }

    //check attendance
    public function checkAttendance(Request $rq){
        //validate
        $scheduleID = $rq->scheduleID;
        $studentID = $rq->studentID;
        $status = $rq->status;
        $errors = [];
        // //check if class is locked
        // $classID = Schedule::where('scheduleID', $scheduleID)->first()->classID;
        // if(!MyClass::where('classID', $classID)->first()->status){
        //     $errors[]=['classError' => 'This class is deactivated'];
        // }
        // //check if student is in class
        // if(!StudentClass::where('studentID', $studentID)->where('classID', $classID)->first()){
        //     $errors[]=['studentError' => 'This student is not in this class'];
        // }
        //update the status
        if(empty($errors)){
            Attendance::where('scheduleID', $scheduleID)->where('studentID', $studentID)->update(['status' => $status]);
            return view('include.attendanceForm')->with([
            'scheduleID' => $scheduleID,
            'studentID' => $studentID,
            'status' => $status,
        ]);
        }
        abort(403);
    }

    public function deactivateClass(Request $rq){
        $rq->validate(
            ['classID' => 'exists:my_classes,classID',]
        );
        $class = MyClass::where('classID','=',$rq->get('classID'))->first();
        $class->status = false;
        $class->save();
        $rq->session()->put('messages',['Class '. $class->name . ' deactivated']);
        return redirect(url('/admin#v-pills-class'));
    }
    public function activateClass(Request $rq){
        $rq->validate(
            ['classID' => 'exists:my_classes,classID',]
        );
        $class = MyClass::where('classID','=',$rq->get('classID'))->first();
        $class->status = true;
        $class->save();
        $rq->session()->put('messages',['Class '. $class->name . ' activated']);
        return redirect(url('/admin#v-pills-class'));
    }

    //activate and deactivate teacher
    public function deactivateTeacher(Request $rq){
        $rq->validate(
            ['userID' => 'exists:users,userID',]
        );
        $user = User::where('userID','=',$rq->userID)->first();
        $user->status = false;
        $user->save();
        $rq->session()->put('messages',['Teacher '. $user->name . ' deactivated']);
        return redirect(url('/admin#v-pills-teachers'));
    }
    public function activateTeacher(Request $rq){
        $rq->validate(
            ['userID' => 'exists:users,userID',]
        );
        $user = User::where('userID','=',$rq->get('userID'))->first();
        $user->status = true;
        $user->save();
        $rq->session()->put('messages',['Teacher '. $user->name . ' activated']);
        return redirect(url('/admin#v-pills-teachers'));
    }

    //activate and deactivate student
    public function deactivateStudent(Request $rq){
        $rq->validate(
            ['studentID' => 'exists:students,studentID',]
        );
        $student = Student::where('studentID','=',$rq->studentID)->first();
        $student->status = false;
        $student->save();
        $rq->session()->put('messages',['Student '. $student->name . ' deactivated']);
        return redirect(url('/admin#v-pills-students'));
    }
    public function activateStudent(Request $rq){
        $rq->validate(
            ['studentID' => 'exists:students,studentID',]
        );
        $student = Student::where('studentID','=',$rq->get('studentID'))->first();
        $student->status = true;
        $student->save();
        $rq->session()->put('messages',['Student '. $student->name . ' activated']);
        return redirect(url('/admin#v-pills-students'));
    }
}
