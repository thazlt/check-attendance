<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
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
}
