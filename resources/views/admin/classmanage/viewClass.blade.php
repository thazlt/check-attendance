@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __($class->name) }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->pull('status') }}
                        </div>
                    @endif
                    <h4>Teachers:</h4>
                    @foreach ($class->teachers as $teacher)
                        <p>{{ $teacher->name }}</p>
                    @endforeach
                    <a href="{{ url('/admin/addTeacher/'.$class->classID) }}">Add another teacher</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
