@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="align-items-start">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
                <header>
                    <h2>
                        <label for="nav-toggle">
                            <span class="fa fa-bars"></span>
                        </label> Home
                    </h2>
                    <div class="search-wrapper">
                        <span class="fa fa-search"></span>
                        <input type="search" placeholder="Search here">
                    </div>
                    <div class="user-wrapper">
                        <img src="../pics/user.svg" width="30px" height="30px" alt="">
                        <div>
                            <h4>Vinny Ng</h4>
                            <small>Admin</small>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="cards">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Class ID</th>
                                    <th>Class Name</th>
                                    <th>Total Number of Students</th>
                                    <th>Teachers</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $num = 1?>
                                    @foreach ($classes as $class)
                                        <td>{{ $num }}</td>
                                        <td>{{ $class->classID }}</td>
                                        <td>{{ $class->name }}</td>
                                        <td>40</td>
                                        <td>
                                            @foreach ($class->teachers as $teacher)
                                                {{ $teacher->name.", " }}
                                            @endforeach
                                        </td>
                                        <td><button class="btn btn-outline" onclick="location.href='checkatt.html';"><i class="fa fa-pencil"></i></button>
                                            <button class="btn btn-outline"><i class="fa fa-trash"></i></button></td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </main>
            </div>
            <div class="tab-pane fade" id="v-pills-students" role="tabpanel" aria-labelledby="v-pills-students-tab">
                <header>
                    <h2>
                        <label for="nav-toggle">
                            <span class="fa fa-bars"></span>
                        </label> List of Students
                    </h2>
                    <div class="search-wrapper">
                        <span class="fa fa-search"></span>
                        <input type="search" placeholder="Search here">
                    </div>
                    <div class="user-wrapper">
                        <img src="../pics/user.svg" width="30px" height="30px" alt="">
                        <div>
                            <h4>Vinny Ng</h4>
                            <small>Admin</small>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="cards">
                        <form method="POST" action="{{ url('/admin/addStudent') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Student Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required placeholder="Student Name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                                <div class="col-md-6">
                                    <input id="dob" type="text" class="form-control @error('dob') is-invalid @enderror" name="dob" required placeholder="dd-mm-yyyy">

                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required placeholder="Email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required placeholder="Phone number">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>Mail</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1;?>
                                @foreach ($students as $student)
                                    <tr>
                                    <td>{{ $num++ }}</td>
                                    <td>{{ $student->studentID }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->phone }}</td>
                                    <td><button class="btn btn-outline" onclick="location.href='checkatt.html';"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-outline"><i class="fa fa-trash"></i></button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </main>
            </div>
            <div class="tab-pane fade" id="v-pills-teachers" role="tabpanel" aria-labelledby="v-pills-teachers-tab">
                <header>
                    <h2>
                        <label for="nav-toggle">
                            <span class="fa fa-bars"></span>
                        </label> List of Teachers
                    </h2>
                    <div class="search-wrapper">
                        <span class="fa fa-search"></span>
                        <input type="search" placeholder="Search here">
                    </div>
                    <div class="user-wrapper">
                        <img src="../pics/user.svg" width="30px" height="30px" alt="">
                        <div>
                            <h4>Vinny Ng</h4>
                            <small>Admin</small>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="cards">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Teacher ID</th>
                                    <th>Teacher Name</th>
                                    <th>Mail</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1;?>
                                @foreach ($teachers as $teacher)
                                <tr>
                                    <td>{{ $num }}</td>
                                    <td>{{ $teacher->userID }}</td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->phone }}</td>
                                    <td><button class="btn btn-outline" onclick="location.href='checkatt.html';"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-outline"><i class="fa fa-trash"></i>
                                        <button class="btn btn-outline"><i class="fa fa-lock"></i></button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
            <div class="tab-pane fade" id="v-pills-class" role="tabpanel" aria-labelledby="v-pills-class-tab">
                <header>
                    <h2>
                        <label for="nav-toggle">
                            <span class="fa fa-bars"></span>
                        </label>List of Classes
                    </h2>
                    <div class="search-wrapper">
                        <span class="fa fa-search"></span>
                        <input type="search" placeholder="Search here">
                    </div>
                    <div class="user-wrapper">
                        <img src="../pics/user.svg" width="30px" height="30px" alt="">
                        <div>
                            <h4>Vinny Ng</h4>
                            <small>Admin</small>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="cards">
                        <form method="POST" action="{{ url('/admin/createClass') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Class Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required placeholder="Class Name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="begin" class="col-md-4 col-form-label text-md-right">{{ __('Begin date') }}</label>

                                <div class="col-md-6">
                                    <input id="begin" type="text" class="form-control @error('begin') is-invalid @enderror" name="begin" required placeholder="dd-mm-yyyy">

                                    @error('begin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>

                                <div class="col-md-6">
                                    <input id="end" type="text" class="form-control @error('end') is-invalid @enderror" name="end" required placeholder="dd-mm-yyyy">

                                    @error('end')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Class ID</th>
                                    <th>Class Name</th>
                                    <th>Begin</th>
                                    <th>End</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1;?>
                                @foreach ($classes as $class)
                                    <tr>
                                        <td>{{ $num }}</td>
                                        <td>{{ $class->classID }}</td>
                                        <td>{{ $class->name }}</td>
                                        <td>{{ $class->begin }}</td>
                                        <td>{{ $class->end }}</td>
                                        <td><button class="btn btn-outline" onclick="location.href='checkatt.html';"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-outline"><i class="fa fa-trash"></i></button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
            <div class="tab-pane fade" id="v-pills-history" role="tabpanel" aria-labelledby="v-pills-history-tab">
                <header>
                    <h2>
                        <label for="nav-toggle">
                            <span class="fa fa-bars"></span>
                        </label> History
                    </h2>
                    <div class="search-wrapper">
                        <span class="fa fa-search"></span>
                        <input type="search" placeholder="Search here">
                    </div>
                    <div class="user-wrapper">
                        <img src="../pics/user.svg" width="30px" height="30px" alt="">
                        <div>
                            <h4>Vinny Ng</h4>
                            <small>Admin</small>
                        </div>
                    </div>
                </header>
            </div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <header>
                    <h2>
                        <label for="nav-toggle">
                            <span class="fa fa-bars"></span>
                        </label> Setting
                    </h2>
                    <div class="search-wrapper">
                        <span class="fa fa-search"></span>
                        <input type="search" placeholder="Search here">
                    </div>
                    <div class="user-wrapper">
                        <img src="../pics/user.svg" width="30px" height="30px" alt="">
                        <div>
                            <h4>Vinny Ng</h4>
                            <small>Admin</small>
                        </div>
                    </div>
                </header>
            </div>
        </div>
    </div>
</div>
@endsection
