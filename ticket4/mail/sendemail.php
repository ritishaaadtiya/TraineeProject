<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Email</title>
    <style>
           .maindiv{
            width: 400px;
           }
        *{
            margin: 0;
            padding: 0;
        }
        .container{
            height: 600px;
            width: 100%;
            display: flex;
    justify-content: center;
    align-items: center;
        }
        input[type=text], input[type=password],input[type = email] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
  }
  button{
   color: white;
    background-color: green;
    border: none;
    width: 100%;
    height: 30px;
    margin-bottom: 10px;
    font-weight: 600;
  
  }
    </style>
</head>
<body>
    <?php

// app password is - gyak pnbo dfgi gljb
     if($_SERVER['REQUEST_METHOD']=='POST'){
        $toemail = $_POST['email'];
        $username = $_POST['name'];
        $fromEmail = $_POST['from-email'];
        $subject = "Confirm Your Email Address to Get Started:)";
        $headers = "From: $fromEmail";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $htmlcontent = file_get_contents('mailcontent.html');
        $htmlcontent = str_replace('{{username}}', $username, $htmlcontent);
        
        if($htmlcontent == false){
            echo "not loaded";
            exit;
        }
       if(mail($toemail,$subject,$htmlcontent, $headers)){
        echo "Send Sucessfully";
       }else{
        echo "error";
       }
     }

    ?>
    <div class="container">
        <div class="maindiv">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        Your Name: <input type="text" name="name"><br>
        to-Email : <input type="email" name="email"><br>
        Your Email : <input type="email" name="from-email"><br>
       <button type="submit">Send</button>
    </form>
    </div>
    </div>
</body>
</html>