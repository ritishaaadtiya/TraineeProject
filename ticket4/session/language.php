<?php
session_start();
if(!isset($_SESSION["logged_in"])){
    header("location:login.php");
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $_SESSION['language'] = $_POST['language'];
    header("location:greet.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="" method="post">
    Select language : <select name="language" id="" required>
        <option value="english">English</option>
        <option value="hindi">Hindi</option>
        <option value="spanish">Spanish</option>
    </select>
    <button type="submit">Save language</button>
   </form> 
</body>
</html>