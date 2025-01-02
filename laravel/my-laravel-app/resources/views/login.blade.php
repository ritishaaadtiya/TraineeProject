<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Eye ICon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

</head>


<body>
    <div class="container">
        <div class="form">
            <form action="">

                <h3>Sign in</h3>
                <label for="">Email</label>

                <input type="text" id="email" autocomplete="email" placeholder="example@gmail.com" name="email" value="{{$email??''}}">
                <div id="emailres"></div>
                <label for="">Password</label>
                <input type="password" id="psw" name="password" autocomplete="current-password" value="{{$password??''}}">
                <i id="eye-icon" class="fas fa-eye-slash"></i>
                <div id="pswres"></div>
                <input type="checkbox" name="remember" class="checkbox">
                <p class="text"> Remember Me</p>
                <a class="ancor" href="{{route('forgot.password')}}">Forgot password ?</a>
                <button class="button-primary" type="button">Sign in</button>
                <p class="loginlink">Don't have an account ? <a href="{{route('registerForm')}}">Sign up</a></p>
                @if(session('error'))
                <div style="font-size: 16px; text-align:center;" class="error-msg ">
                    {{ session('error') }}
                </div>
                @endif
            </form>
        </div>
    </div>

    <script src="{{asset('js/login.js')}}"></script>
</body>

</html>