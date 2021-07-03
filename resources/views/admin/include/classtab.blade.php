<div class="tab-pane fade" id="v-pills-class" role="tabpanel" aria-labelledby="v-pills-class-tab">
    <header>
        <h2>
            <label for="nav-toggle">
                <span class="fa fa-bars"></span>
            </label>List of Classes
        </h2>
        @include('include.searchBar')
        @include('include.nameTag')
    </header>
    <main>
        @include('include.message')
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
                        <th>Number of Students</th>
                        <th>Begin</th>
                        <th>End</th>
                        <th>Teachers</th>
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
                            <td>{{ $class->students->count() }}</td>
                            <td>{{ $class->begin->toDateString() }}</td>
                            <td>{{ $class->end->toDateString() }}</td>
                            <td>
                                @foreach ($class->teachers as $teacher)
                                {{ $teacher->name.", " }}
                            @endforeach
                            </td>
                            <td>
                                @if ($class->status)
                                    <form id="dc-{{ $class->classID }}" action="{{ url('admin/deactivateClass') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="classID" value="{{ $class->classID }}">
                                        <button class="btn btn-outline" type="submit"><i class="fa fa-lock"></i></button>
                                    </form>
                                @else
                                    <form id="dc-{{ $class->classID }}" action="{{ url('admin/activateClass') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="classID" value="{{ $class->classID }}">
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
