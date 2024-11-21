<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .error-msg {
            padding: 15px;
            font-size: 14px;
            color : red;

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
    <?php
    require "./connectdb.php";
    $data = [];
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $query = "SELECT * FROM user WHERE id = '$id'";
        $result = mysqli_query($connect, $query);
        if(!$result){
            die("Query failed: " . mysqli_error($connect));
        }else if(mysqli_num_rows($result)>0){
           $data = mysqli_fetch_assoc($result);
        }
    
        
    } 
   
    ?>
    <div class="container">
        <div class="form">
            <form action="">
                <h3>Update user</h3>
                <?php if(!empty($data)) : ?>
                <input type="hidden" name="" id="userid" value="<?php echo htmlspecialchars($id); ?>">
                <label for="">Username</label>
                <input type="text" id="username" placeholder="Enter your name" name="username" value="<?php echo htmlspecialchars($data['username']); ?>">
                <div id="usernameres"></div>
                <label for="">Email</label>
                <input type="text" id="email" placeholder="example@gmail.com" name="email" value="<?php echo htmlspecialchars($data['email']); ?>">
                <div id="emailres"></div>
                <label for="">Password</label>
                <input type="text" id="psw" name="psw" value="<?php echo htmlspecialchars($data['password']); ?>">
                <div id="pswres"></div>
                <?php endif; ?>
                <button class="button-primary" type="button">Update user</button>
               
            </form>
        </div>
    </div>

    <script>
    $(document).ready(function () {
    $(".button-primary").click(function () {
    let id = $("#userid").val();
    let username = $("#username").val().trim();
    let email = $("#email").val().trim();
    let psw = $("#psw").val().trim();
   
    let Isvalid = true;

    $(".error-msg").remove();
    $("input").each(function () {
      if ($(this).val() == "") {
        let id = $(this).next().attr("id");
        $(`#${id}`).html(
          "<span class = 'error-msg'  style = 'color :red;'>Please fill the values!</span>"
        );
        Isvalid = false;
      }
    });

    function validatePassword(password) {
      let hasDigit = false;
      let hasUppercase = false;
      let hasLowercase = false;
      let hasSpecialChar = false;
      const specialChars = "!@#$%^&*()_+-=[]{}|;:'\",.<>?/`~";

      // Iterate through each character in the password
      for (const char of password) {
        // Check if the character is a digit
        if (char >= "0" && char <= "9") {
          hasDigit = true;
        }
        // Check if the character is an uppercase letter
        else if (char >= "A" && char <= "Z") {
          hasUppercase = true;
        }
        // Check if the character is a lowercase letter
        else if (char >= "a" && char <= "z") {
          hasLowercase = true;
        }
        // Check if the character is a special character
        else if (specialChars.includes(char)) {
          hasSpecialChar = true;
        }
      }

      // Return true if all conditions are met
      return hasDigit && hasUppercase && hasLowercase && hasSpecialChar;
    }
    let emailPattern = /^[^\s@]+@[^\s@]+\.(com|org)$/;
    let validEmail = emailPattern.test(email);

    let validpass = validatePassword(psw);
  
    if (!validEmail && email != "") {
      $("#emailres").html(
        "<span class = 'error-msg'  style = 'color :red;'>Invalid Email Format</span>"
      );
    }
    let userpattern = /^\d/;

    let validuser = userpattern.test(username);

    if (validuser == true || (username != "" && username.length < 4)) {
      $("#usernameres").html(
        "<span class = 'error-msg'  style = 'color :red;'>Username should not start with a number! and atleast 5 character</span>"
      );
      Isvalid = false;
    }
    if ((!validpass || psw.length < 8) && psw != "") {
      $("#pswres").html(
        "<span class = 'error-msg' style = 'color :red;'>Invalid password!</span>"
      );
      Isvalid = false;
    } 
    if(Isvalid){
        $(".error-msg").remove();
      //   Send Data to Server using ajax == If client-side validation passes, proceed with AJAX request
      $.ajax({
        url: "edit.php",
        type: "POST",
        contentType: "application/json",
        data: JSON.stringify({
          id :id,
          username: username,
          email: email,
          password: psw,
         
        }),
        success: function (response) {
          if (response.status == "error") {
            // Display error messages for invalid fields
            const arr = response.Invalid;
          console.log(response.message);
            for (let key in arr) {
              $("#" + key + "res").html(
                "<span class ='error-msg'>" + arr[key] + "</span>"
              );
            }
          } else {
                  alert(response.message);
                  window.location.href = "dashboard.php";
          }
        },

        error: function (xhr) {
          alert(xhr.responseText);
        },
      });
    }
});
    });

    </script>
</body>
</html>