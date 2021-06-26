
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <title>Login</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div>
        <div class="jumbotron text-center" id="login" style="background: url({{ asset('pics/simple.jpg') }}) no-repeat center fixed">
            <div class="container text-center">
                <div class="title">
                    <h1>Welcome to Web Attendance Checking</h1>
                    <p>Where you can do bla bla stuffs</p>
                </div>
            </div>
            <div class="container text-center">
                <div class="login">
                    <img src="pics/user.svg" class="avatar" alt="">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session()->pull('error') }}
                        </div>
                        @endif
                        <p>Email</p>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <p>Password</p>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <!-- <input type="submit" name="" value="Login"> -->
                        <button type="submit" class="button_active">
                            {{ __('Login') }}
                        </button>
                        <br>
                        <a href="test/teacher.html">Forgot your password?</a><br>
                    </form>

                </div>
            </div>

            <div class="overlay"></div>
        </div>
        <!-- End of Jumbotron -->
    </div>
</body>

</html>
