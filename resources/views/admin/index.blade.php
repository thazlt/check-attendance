@extends('layouts.app')
//blabla
@section('content')
<div class="main-content">
    <div class="align-items-start">
        <div class="tab-content" id="v-pills-tabContent">
            @include('admin.include.hometab')
            @include('admin.include.studenttab')
            @include('admin.include.teachertab')
            @include('admin.include.classtab')
        </div>
    </div>
</div>
@endsection
