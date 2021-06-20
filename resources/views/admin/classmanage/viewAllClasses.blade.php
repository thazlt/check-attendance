@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Class list') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ $rq->session()->pull('status') }}
                        </div>
                    @endif
                    @foreach ($classes as $class)
                        <a href="#">{{ $class->name }}</a><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
