<?php
session_Start();

if (isset($_SESSION["name"]) && isset($_SESSION['language'])) {
    $name = $_SESSION["name"];
    $language = $_SESSION["language"];
} else {
    header("login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greet session</title>
</head>

<body>
   <h1>Good morning, <br> hello <?php echo $name; ?> </h1>
   <h4>You have Selected <?php echo $language; ?></h4>
   <a href="logout.php">logout</a>
</body>

</html>