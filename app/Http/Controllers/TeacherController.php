<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index(){
        $teacher = User::where('userID', Auth::user()->userID)->first();
        $classes = $teacher->my_classes;
        return view('teacher.index')->with([
            'teacher'=>$teacher,
            'classes'=>$classes
        ]);
    }
}
