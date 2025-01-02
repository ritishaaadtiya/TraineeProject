<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot PAssword</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
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
            <form action="" method="post">
                <h3>Forgot Password</h3>
                <label for="">Email</label>
                <input type="text" name="email" id="email" placeholder="example@gmail.com">
                <div id="emailres"></div>
                <button class="button-primary" type="button">Submit</button>
            </form>
        </div>
    </div>

    <script src="{{asset('js/forgotpassword.js')}}"></script>
</body>

</html>