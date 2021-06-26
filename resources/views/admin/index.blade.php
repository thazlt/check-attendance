@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->pull('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in! '. Auth::user()->name) }}
                    @if (Route::has('register'))
                        <h4>Teacher Management</h4>
                        <a href="{{ route('register') }}">Register new Teacher</a><br>
                        <a href="{{ url('/admin/viewTeachers') }}">Teachers list</a><br>
                    @endif
                    <br>
                    <h4>Student Management</h4>
                    <a href="{{ url('/admin/addStudent') }}">Add a Student</a><br>
                    <a href="{{ url('/admin/viewStudents') }}">Student list</a><br>
                    <br>
                    <h4>Class Management</h4>
                    <a href="{{ url('/admin/createClass') }}">Create a class</a><br>
                    <a href="{{ url('/admin/viewAllClasses') }}">Class list</a><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
