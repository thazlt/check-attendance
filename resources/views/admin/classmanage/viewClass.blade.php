@extends('layouts.app')

@section('content')
<div class="main-content" onload="viewClass">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="fa fa-bars"></span>
                </label> Check Attendance
            </h2>
            @include('include.searchBar')
            @include('include.nameTag')
        </header>

        <main>
            @include('include.message')
            <div class="cards">
                <form action="{{ url('/admin/addTeacher') }}" method='post'>
                    @csrf
                    <div class="form-group row">
                        <label for="teacherID" class="col-md-4 col-form-label text-md-right">{{ __('Add new Teacher') }}</label>
                        <input id="teacherID" type="text" class="form-control @error('teacherID') is-invalid @enderror" name="teacherID" required placeholder="Teacher ID">
                            @error('teacherID')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <input type="hidden" name="classID" value="{{ $class->classID }}">
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add') }}
                            </button>
                    </div>
                </form>
                <form action="{{ url('/admin/addStudentClass') }}" method='post'>
                    @csrf
                    <div class="form-group row">
                        <label for="studentID" class="col-md-4 col-form-label text-md-right">{{ __('Add new Student') }}</label>
                        <input id="studentID" type="text" class="form-control @error('studentID') is-invalid @enderror" name="studentID" required placeholder="Student ID">
                            @error('studentID')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add') }}
                            </button>
                    </div>
                    <input type="hidden" name="classID" value="{{ $class->classID }}">
                </form>
                <form action="{{ url('/admin/addSchedule') }}" method='post'>
                    @csrf
                    <div class="form-group row">
                        <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Add a Date') }}</label>
                        <input id="date" type="text" class="form-control @error('date') is-invalid @enderror" name="date" required placeholder="Date">
                            @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Add') }}
                            </button>
                    </div>
                    <input type="hidden" name="classID" value="{{ $class->classID }}">
                </form>
            </div>
            <div class="cards">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>CLASS: {{ $class->name }}</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>LECTURER:
                                @foreach ($class->teachers as $teacher)
                                    <span>{{ $teacher->name }}<button class="btn btn-outline" type="submit" form="rmt-{{ $class->classID.'-'.$teacher->userID }}"><i class="fa fa-trash"></i></button></span>
                                    <form id="rmt-{{ $class->classID.'-'.$teacher->userID }}" action="{{ url('admin/removeTeacher') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="classID" value="{{ $class->classID }}">
                                        <input type="hidden" name="userID" value="{{ $teacher->userID }}">
                                    </form>
                                @endforeach
                            </h5>
                        </div>
                    </div>
                    <div class="card-single">
                        <h5>V: PRESENT</h5>
                        <h5>L: Late</h5>
                        <h5>A: Absent</h5>
                        <h5>P: Absent with Permision</h5>
                    </div>
                </div>
            </div>
            <div class="cards">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <table class="content-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Last name</th>
                                        <th>First Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $num = 1;?>
                                    @foreach ($class->students as $student)
                                    <tr>
                                        <td>{{ $num }}</td>
                                        <td>{{ $student->studentID }}</td>
                                        <?php
                                        $name = explode(" ",$student->name);
                                        $firstName = $name[count($name) - 1];
                                        $lastName = substr($student->name, 0, strlen($student->name) - strlen($firstName));
                                        ?>
                                        <td>{{ $lastName }}</td>
                                        <td>{{ $firstName }}</td>
                                        </td>
                                        <td>
                                            <form id="rms-{{ $class->classID }}-{{ $student->studentID }}" action="{{ url('admin/removeStudentClass') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="classID" value="{{ $class->classID }}">
                                                <input type="hidden" name="studentID" value="{{ $student->studentID }}">
                                            </form>
                                            <button class="btn btn-outline" type="submit" form="rms-{{ $class->classID }}-{{ $student->studentID }}"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php $num++?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-sm-6" style="overflow-x:auto !important;">
                            <table class="content-table" id="check-table">
                                <thead>
                                    <tr>
                                        @foreach ($class->schedules->sortBy('date') as $schedule)
                                           <td>
                                               <form id="rmsc-{{ $class->classID }}-{{ $schedule->scheduleID }}" action="{{ url('admin/removeSchedule') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="classID" value="{{ $class->classID }}">
                                                    <input type="hidden" name="scheduleID" value="{{ $schedule->scheduleID }}">
                                                </form>
                                               {{ $schedule->date->toDateString('d-m-Y') }}
                                               <button class="btn btn-outline" type="submit" form="rmsc-{{ $class->classID }}-{{ $schedule->scheduleID }}"><i class="fa fa-trash"></i></button>
                                            </td>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($class->students as $student)
                                        <tr>
                                            @foreach ($student->schedules as $schedule)
                                                @if ($schedule->classID == $class->classID)
                                                    <td id="{{ 'check-'.$schedule->scheduleID.'-'.$student->studentID }}"></td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <script type="text/javascript" id="viewClass">


        async function  loadButtons(){
            console.log('loaded');
            //load checking buttons
            @foreach ($class->students as $student)
                @foreach ($student->schedules as $schedule)
                    @if ($schedule->classID == $class->classID)
                        await $.get('{{ url('/views/include/attendanceForm/'.$schedule->scheduleID.'/'.$student->studentID.'/'.$schedule->pivot->status) }}', function(data, status){
                            $("{{ '#check-'.$schedule->scheduleID.'-'.$student->studentID}}").html(data)
                        });
                    @endif
                @endforeach
            @endforeach
            loadForms();
            // setTimeout(() => {  loadForms(); console.log('ready'); }, 500);
        }



        function loadForms(){
            $(".attendanceForm").on('submit', async function(e){
            e.preventDefault();

            var form = $(this);
            var parent = form.parent();
            var url = form.attr('action');
            try{
                console.log('hi1');
                await $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: url,
                data: form.serialize(),
                success: function (response) {
                    //update button
                    //get parent
                    parent.html(response);
                    loadForms();

                }
            });
            }
            catch(err){
                console.log(err);
            }
        })
        }
        loadButtons();
    </script>
@endsection
