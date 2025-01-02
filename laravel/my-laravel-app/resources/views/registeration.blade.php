<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registeration Page</title>
  <!-- CSRF token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <!--  ICons -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <!-- Add css -->
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">

</head>

<body>
  <div class="container">
    <div class="form">
      <form action="">
        <h3>Sign Up</h3>
        <label for="">Username</label>
        <div class="user">
          <input
            type="text"
            id="username"
            placeholder="Enter your name"
            name="username" />
          <i class="fa-solid fa-user icon"></i>
        </div>
        <div id="usernameres"></div>
        <label for="">Email</label>
        <div class="email">
          <input
            type="text"
            id="email"
            placeholder="example@gmail.com"
            name="email" />
          <i class="fa-solid fa-envelope icon"></i>
        </div>
        <div id="emailres"></div>

        <label for="">Password</label>
        <div class="pass">
          <input type="text" id="psw" name="psw" />
          <i class="fa-solid fa-lock icon"></i>
        </div>
        <div id="pswres"></div>
        <label for="">Confirm Password</label>
        <div class="confrimpas">
          <input type="text" id="confirm_psw" name="confirm_psw" />
        </div>
        <div id="confirm_pswres"></div>

        <button class="button-primary" type="button">Sign up</button>
        <p class="loginlink">
          already have an account ? <a href="{{route('loginForm')}}">Login</a>
        </p>
      </form>
    </div>
  </div>




  <script src="{{ asset('js/Signuptest.js') }}"></script>
</body>

</html>