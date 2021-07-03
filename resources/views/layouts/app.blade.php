<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="{{ asset('images/main.png') }}" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>

    <body>
        @if (Auth::user()->userType == 0)
            @include("layouts.include.left-bar-admin")
        @else
            @include("layouts.include.left-bar-teacher")
        @endif
        @yield('content')
        <script type="text/javascript">
            window.onload = function() {
                var url = document.URL;
                var array = url.split('#');
                if (array[1]) {
                    document.querySelector('#' + array[1]).className += ' show active';
                    document.querySelector('#' + array[1] + '-tab').setAttribute('aria-selected', 'true');
                    document.querySelector('#' + array[1] + '-tab').className +=' active';
                } else {
                    document.querySelector('#v-pills-dashboard').className += ' show active';
                    document.querySelector('#v-pills-dashboard-tab').setAttribute('aria-selected', 'true');
                    document.querySelector('#v-pills-dashboard-tab').className +=' active';
                }
                document.querySelectorAll('.nav-link').forEach(function(item, index) {
                    var isActive = (item.className.indexOf('active') > -1);
                    if (item.id == localStorage.selectedTabName) {
                        if (!isActive) {
                            //item.className += ' active';
                        }
                        item.setAttribute('aria-selected', 'true');
                    } else {
                        item.setAttribute('aria-selected', 'false');
                        if (isActive) {
                            //item.className = item.className.replace('active', '');
                        }
                    }
                });

            };
        </script>
    </body>
    <?php session()->pull('messages')?>
    <?php session()->pull('errorsmess')?>
</html>
