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
</head>
<?php

?>
<body>
    <div class="container">
        <div class="form">
            <form action="">
                <h3>Sign in</h3>
                <label for="">Email</label>
                
                <input type="text" id="email" placeholder="example@gmail.com" name="email">
                <div id="emailres"></div>
                <label for="">Password</label>
                <input type="password" id="psw" name="psw">
                <i id="eye-icon" class="fas fa-eye-slash"></i>
                <div id="pswres"></div>
                <a class="ancor"  href="./forgotmail.php">Forgot password ?</a>
                <button class="button-primary" type="button">Sign in</button>
                <p class="loginlink">Don't have an account ? <a href="{{route('registerForm')}}">Sign up</a></p>
            </form>
        </div>
    </div>

    <script src="{{asset('js/login.js')}}"></script>
</body>
</html>