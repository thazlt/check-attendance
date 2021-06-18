@extends('layouts.app')

@section('content')
<form action="{{ url('/admin/addstudent') }}" method="POST">
    @csrf

</form>
@endsection
