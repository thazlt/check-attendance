@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Teacher List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->pull('status') }}
                        </div>
                    @endif
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>{{ $teacher->userID }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->phone }}</td>
                                <td>
                                    @if ($teacher->status)
                                        <form action="/admin/deactivateTeacher" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $teacher->userID }}" name="userID" >
                                            <button type="submit">Active</button>
                                        </form>
                                    @else
                                    <form action="/admin/activateTeacher" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $teacher->userID }}" name="userID" >
                                        <button type="submit">Disabled</button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
