<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>
                <img src="{{ asset("images/main.png") }}" style="width: 60px">
                <span>ACW</span>
            </h2>
        </div>

        <div class="sidebar-menu">
            <ul class="nav nav-pills flex-column" id="myTab" role="tablist" aria-orientation="vertical">
                <li class="nav-item">
                    <a
                    @if (url()->current() != url('/teacher'))
                        href = {{ url('/teacher#v-pills-dashboard') }}
                    @else
                    id="v-pills-dashboard-tab" class="nav-link" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="false"
                    @endif
                    ><span class="fa fa-th-large"></span>
                    <span>Home</span></a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="signout"onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <span class="fa fa-sign-out"></span>
                        <span>Sign out</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
