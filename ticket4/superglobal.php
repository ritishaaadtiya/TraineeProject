<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Global veriables</title>
</head>
<body>
    <?php
    # Super Global methods
    // echo $_SERVER['PHP_SELF']."<br>";
    // echo $_SERVER['SERVER_NAME']."<br>";
    echo "name is : ". $_POST['name'];
    ?>
    <form action="" method="post">
        <input type="text" name="name">
        <button type="submit">submit</button>
    </form>
</body>
</html>