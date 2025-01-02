<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        .btn {
            display: flex;
        }

        .ancor {
            text-decoration: none;
            float: right;
            /* margin-left: 34px; */
            position: relative;
            /* right: -53px; */
            right: 6px;
            font-size: 14.4px;

        }

        .error-msg {
            padding: 15px;
            font-size: 14px;
            color: red;

        }

        .loginlink {
            text-align: -webkit-center;
        }

        body {
            background-color: #F5F7FA;
        }

        /* Primary Button */
        .button-primary {
            margin-left: 4px;
            margin-top: 15px;
            width: 98%;
            background-color: #4A90E2;
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
            background-color: #357ABD;
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
    </style>
</head>

<body>



    <div class="container">
        <div class="form">
            <form action="" method="">
                @csrf
                <h3>Reset Password</h3>
                <p>Hello, <strong>{{$user}}</strong><br>To reset the password fill the below details</p>

                <input type="hidden" name="email" id="email" value="{{$email}}">
                <input type="hidden" name="token" id="token" value="{{$token}}">
                <label for="">Password</label>
                <input type="text" id="psw" name="psw" placeholder="Enter your password">
                <div id="pswres"></div>
                <label for="">Confirm Password</label>
                <input type="text" id="confirm" name="confirm" placeholder="re-enter your password">
                <div id="confirmres"></div>
                <div class="btn">
                    <button class="button-primary" type="button">Cancel</button>
                    <button class="button-primary" id="button-primary" type="button">Reset Password</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{asset('js/resetpassword.js')}}"></script>
</body>

</html>