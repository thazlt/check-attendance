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
                        <form action="{{ url('/admin/removeTeacher') }}" method="post">
                            @csrf
                            <input type="hidden" name="classID" value="{{ $class->classID }}">
                            <input type="hidden" name="userID" value="{{ $teacher->userID }}">
                            <button type="submit">Remove</button>
                        </form>
                    @endforeach
                    @if ($class->status == 1)
                        <a href="{{ url('/admin/addTeacher/'.$class->classID) }}">Add another teacher</a><br>
                        <form action="{{ url('/admin/deactivateClass') }}" method="post">
                            @csrf
                            <input type="hidden" name="classID" value="{{ $class->classID }}">
                            <button type="submit">Deactivate Class</button>
                        </form>
                    @else
                    <form action="{{ url('/admin/activateClass') }}" method="post">
                        @csrf
                        <input type="hidden" name="classID" value="{{ $class->classID }}">
                        <button type="submit">Activate Class</button>
                    </form>
                    @endif
                    <h4>Status: {{ $class->status == 1 ? "Active" : "Disabled" }}</h4>
                    <h4>Time Table</h4>
                    <table>
                        <tr>
                            <th>Students</th>
                            <th>Name</th>
                            @foreach ($class->schedules() as $schedule)
                                <th>{{ $schedule->date }}</th>
                            @endforeach
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
