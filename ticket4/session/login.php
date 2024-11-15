<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $_SESSION['name'] = $_POST['name'];
   $_SESSION['logged_in'] = true;
   header(header: "Location: language.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session in Php</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        Name : <input type="text" name="name"><br>
        password : <input type="text" name="psw"><br>
        <button type="submit" >Submit</button>
    </form>
</body>
</html>