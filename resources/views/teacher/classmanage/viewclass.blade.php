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
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>CLASS: {{ $class->name }}</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>LECTURER:
                                @foreach ($class->teachers as $teacher)
                                    <span>{{ $teacher->name }}</span>
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
                                           <th>
                                               {{ $schedule->date->toDateString('d-m-Y') }}
                                            </th>
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
