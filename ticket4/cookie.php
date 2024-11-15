
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie</title>
</head>
<body>
<?php
$name = "";
$email = "";
$password = "";

if(isset($_COOKIE['name'])&& isset( $_COOKIE['email'])&& isset( $_COOKIE['psw'])) {
    $name = $_COOKIE['name'];
    $email = $_COOKIE['email'];
    $password = $_COOKIE['psw'];
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['psw'];
    setcookie('name',$name);
    setcookie('email',$email);
    setcookie('psw',$password);
}
?>
    <h2>Cookie</h2>
    <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        Name : <input type="text" name="name" value="<?php echo $name ?>"><br>
        Email : <input type="email" name="email" value="<?php echo $email ?>"><br>
        Password : <input type="text" name="psw" value="<?php echo $password ?>"><br>
        <button type="submit">login</button>
    </form>
</body>
</html>