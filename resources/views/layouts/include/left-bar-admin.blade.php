<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>
                <img src="{{ asset("images/main.png") }}" style="width: 50px">
                <span>ACW</span>
            </h2>
        </div>

        <div class="sidebar-menu">
            <ul class="nav nav-pills flex-column" id="myTab" role="tablist" aria-orientation="vertical">
                @if (!Auth::user()->userType)
                    <li class="nav-item">
                        <a
                        @if (url()->current() != url('/admin'))
                            href = {{ url('/admin#v-pills-dashboard') }}
                        @else
                        id="v-pills-dashboard-tab" class="nav-link" data-bs-toggle="pill" data-bs-target="#v-pills-dashboard" role="tab" aria-controls="v-pills-dashboard" aria-selected="false"
                        @endif
                        ><span class="fa fa-th-large"></span>
                        <span>Home</span></a>
                    </li>
                    <li>
                        <a
                        @if (url()->current() != url('/admin'))
                            href = {{ url('/admin#v-pills-students') }}
                        @else
                        class="nav-link" id="v-pills-students-tab" data-bs-toggle="pill" data-bs-target="#v-pills-students" role="tab" aria-controls="v-pills-students" aria-selected="false"
                        @endif
                        ><span class="fa fa-graduation-cap"></span>
                        <span>Students</span></a>
                    </li>
                    <li>
                        <a
                        @if (url()->current() != url('/admin'))
                            href = {{ url('/admin#v-pills-teachers') }}
                        @else
                        class="nav-link" id="v-pills-teachers-tab" data-bs-toggle="pill" data-bs-target="#v-pills-teachers" role="tab" aria-controls="v-pills-teachers" aria-selected="false"
                        @endif
                        ><span class="fa fa-list"></span>
                            <span>Teachers</span></a>
                    </li>
                    <li>
                        <a
                        @if (url()->current() != url('/admin'))
                            href = {{ url('/admin#v-pills-class') }}
                        @else
                        class="nav-link" id="v-pills-class-tab" data-bs-toggle="pill" data-bs-target="#v-pills-class" role="tab" aria-controls="v-pills-class" aria-selected="false"
                        @endif
                        ><span class="fa fa-table"></span>
                        <span>Classes</span></a>
                    </li>
                    <li>
                        <a
                        @if (url()->current() != url('/admin'))
                            href = {{ url('/admin#v-pills-history') }}
                        @else
                        class="nav-link" id="v-pills-history-tab" data-bs-toggle="pill" data-bs-target="#v-pills-history" role="tab" aria-controls="v-pills-history" aria-selected="false"
                        @endif
                        ><span class="fa fa-history"></span>
                        <span>History</span></a>
                    </li>
                    <li>
                        <a
                        @if (url()->current() != url('/admin'))
                            href = {{ url('/admin#v-pills-settings') }}
                        @else
                        class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"
                        @endif
                        ><span class="fa fa-cog"></span>
                        <span>Setting</span></a>
                    </li>
                @else
                @endif

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
