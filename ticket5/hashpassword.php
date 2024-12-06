<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HAsh password</title>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $password = $_POST['password'];
        $newpass = $_POST['pass'];
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);
        if (password_verify($newpass, $hashpassword)) {
            echo "Password is correct";
        } else {
            echo "Password is incorrect this is hashed password $hashpassword this  password is normal $newpass";
        }
    }
    ?>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <label for="">password</label>
        <input type="text" name="password" id="">
        <input type="text" name="pass" id="">
        <button type="submit">Submit</button>
    </form>
</body>

</html>