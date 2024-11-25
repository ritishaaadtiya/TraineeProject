
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registeration Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--  ICons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <style>
      .error-msg {
        padding: 15px;
        font-size: 14px;
        color: red;
      }

      .loginlink {
        text-align: -webkit-center;
      }

      body {
        background-color: #f5f7fa;
      }

      /* Primary Button */
      .button-primary {
        margin-left: 4px;
        margin-top: 15px;
        width: 98%;
        background-color: #4a90e2;
        /* Use a bright color like blue */
        color: white;
        /* Contrast color */
        border: none;
        border-radius: 5px;
        padding: 9px 10px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;

        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* Subtle shadow */
      }

      .button-primary:hover {
        background-color: #357abd;
        /* Slightly darker shade on hover */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        /* Stronger shadow on hover */
      }

      h3 {
        font-size: x-large;
        text-align: center;
      }

      input {
        width: 330px;
        border: 2px solid #f0eded;
        display: block;
        padding: 9px 15px;
        /* border: none; */
        border-radius: 5px;
        margin: 5px;
      }

      label {
        font-weight: 600;
        font-size: 16px;
        margin-left: 5px;
      }

      .container {
        height: 500px;
        width: 100%;

        display: flex;
        justify-content: center;
        align-items: center;
      }

      .form {
        max-height: 470px;
        min-height: 430px;
        width: 410px;

        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #ffffff;
        /* White background or any light color */
        padding: 20px;
        border-radius: 8px;
        /* Rounded corners for a softer look */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        /* Light shadow for depth */
      }
      .icon {
        float: right;
        position: relative;
        right: 15px;
        bottom: 31px;
      }
    </style>
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
              name="username"
            />
            <i class="fa-solid fa-user icon"></i>
          </div>
          <div id="usernameres"></div>
          <label for="">Email</label>
          <div class="email">
            <input
              type="text"
              id="email"
              placeholder="example@gmail.com"
              name="email"
            />
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
            <input type="text" id="confirm-psw" name="re-psw" />
          </div>
          <div id="confirmres"></div>

          <button class="button-primary" type="button">Sign up</button>
          <p class="loginlink">
            already have an account ? <a href="./login.php">Login</a>
          </p>
        </form>
      </div>
    </div>




    <script src="script.js"></script>
</body>

</html>