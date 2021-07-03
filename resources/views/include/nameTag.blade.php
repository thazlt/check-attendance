<div class="user-wrapper">
    <img src="{{ asset('images/main.png') }}" width="60px" height="60px" alt="">
    <div>
        <h4>{{ Auth::user()->name }}</h4>
        <small>{{ !Auth::user()->userType? 'Admin' : 'Teacher' }}</small>
    </div>
</div>
