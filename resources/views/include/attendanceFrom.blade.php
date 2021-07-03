<form id="{{ 'check-'.$scheduleID.'-'.$studentID }}" action="{{ url('/checkAttendance') }}" method="POST">
    @csrf
    @method('put')
    <input type="hidden" name="scheduleID" value="{{ $scheduleID }}">
    <input type="hidden" name="studentID" value="{{ $studentID }}">
    <input type="hidden" name="status" value="{{ $status }}">
</form>
<button class="btn btn-danger" type="submit" form="{{ 'check-'.$scheduleID.'-'.$studentID }}">A</button>
