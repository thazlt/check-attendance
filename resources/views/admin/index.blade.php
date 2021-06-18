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
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in! '. Auth::user()->name) }}
                    @if (Route::has('register'))
                        <br>
                        <a href="{{ route('register') }}">Register new Teacher</a>
                    @endif
                    <br>
                    <a href="{{ url('/admin/addStudent') }}">Add a Student</a>
                    <br>
                    <a href="{{ url('/admin/createClass') }}">Create a class</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
