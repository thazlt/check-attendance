<div class="tab-pane fade" id="v-pills-teachers" role="tabpanel" aria-labelledby="v-pills-teachers-tab">
    <header>
        <h2>
            <label for="nav-toggle">
                <span class="fa fa-bars"></span>
            </label> List of Teachers
        </h2>
        @include('include.searchBar')
        @include('include.nameTag')
    </header>
    <main>
        <div class="cards">
            @include('include.message')
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
                        <td>
                            @if ($teacher->status)
                                <form id="dt-{{ $teacher->userID }}" action="{{ url('admin/deactivateTeacher') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="userID" value="{{ $teacher->userID }}">
                                    <button class="btn btn-outline" type="submit"><i class="fa fa-lock"></i></button>
                                </form>
                            @else
                                <form id="dt-{{ $teacher->userID }}" action="{{ url('admin/activateTeacher') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="userID" value="{{ $teacher->userID }}">
                                    <button class="btn btn-outline" type="submit"><i class="fa fa-unlock"></i></button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
