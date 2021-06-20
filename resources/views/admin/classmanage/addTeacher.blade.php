@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Teacher to Class '.$class->name) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/admin/addTeacherToClass') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="teacherID" class="col-md-4 col-form-label text-md-right">{{ __('Teacher\'s ID') }}</label>

                            <div class="col-md-6">
                                <input id="teacherID" type="text" class="form-control @error('teacherID') is-invalid @enderror" name="teacherID" required>

                                @error('teacherID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="classID" value="{{ $class->classID }}">
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
