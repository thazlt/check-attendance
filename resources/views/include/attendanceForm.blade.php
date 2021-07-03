<form class="attendanceForm" id="{{ 'form-check-'.$scheduleID.'-'.$studentID }}" action="{{ url('/checkAttendance') }}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="scheduleID" value="{{ $scheduleID }}">
    <input type="hidden" name="studentID" value="{{ $studentID }}">
    <input type="hidden" name="status" value="
    @switch($status)
        @case('A')
            P
            @break
        @case('P')
            V
            @break
        @case('V')
            L
            @break
        @case('L')
            A
            @break
        @default

    @endswitch
    ">
</form>
@switch($status)
        @case('A')
            <button class="btn btn-danger" type="submit" form="{{ 'form-check-'.$scheduleID.'-'.$studentID }}">A</button>
            @break
        @case('P')
            <button class="btn btn-warning" type="submit" form="{{ 'form-check-'.$scheduleID.'-'.$studentID }}">P</button>
            @break
        @case('V')
            <button class="btn btn-success" type="submit" form="{{ 'form-check-'.$scheduleID.'-'.$studentID }}">V</button>
            @break
        @case('L')
            <button class="btn btn-info" type="submit" form="{{ 'form-check-'.$scheduleID.'-'.$studentID }}">L</button>
            @break
        @default

    @endswitch

