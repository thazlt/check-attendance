<div class="user-wrapper">
    <img src="../pics/user.svg" width="30px" height="30px" alt="">
    <div>
        <h4>{{ Auth::user()->name }}</h4>
        <small>{{ !Auth::user()->role? 'Admin' : 'Teacher' }}</small>
    </div>
</div>
