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
                    <h5>Welcome, {{ $teacher->name }} !!!</h5>
                    <h4>Class list:</h4>
                    @foreach ($classes as $class)
                        <a href="#">{{ $class->name }}</a><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
