<div class="tab-pane fade" id="v-pills-dashboard" role="tabpanel" aria-labelledby="v-pills-dashboard-tab">
    <header>
        <h2>
            <label for="nav-toggle">
                <span class="fa fa-bars"></span>
            </label> Home
        </h2>
        @include('include.searchBar')
        @include('include.nameTag')
    </header>
    <main>
        @include('include.message')
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
                    <?php $num = 1?>
                    @foreach ($classes as $class)
                    <tr>
                        <td>{{ $num }}</td>
                        <td>{{ $class->classID }}</td>
                        <td>{{ $class->name }}</td>
                        <td>{{ $class->students->count() }}</td>
                        <td>
                            @foreach ($class->teachers as $teacher)
                                {{ $teacher->name.", " }}
                            @endforeach
                        </td>
                        <td>
                            <button class="btn btn-outline" onclick="location.href='{{ url('/admin/viewClass/'.$class->classID) }}';"><i class="fa fa-pencil"></i></button>
                            @if ($teacher->status)
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
