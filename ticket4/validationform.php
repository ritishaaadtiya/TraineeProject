<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <?php
    $name = "";
    $nameerr = "";
    $email = "";
    $emailerr = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(empty($_POST['name'])){
            $nameerr = "feild is required";
        }else{
            $name = input($_POST['name']);
        }
    if(empty($_POST['email'])){
        $emailerr = 'field is required';
    }
        else{
            $email = input($_POST['email']);
        }
         
    }
    function input($data){
        $data = trim($data);
        $data = stripslashes($data);
        return $data;  
    }
    ?>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    Name : <input type="text" name="name" id="">
    <span class="error">* <?php echo $nameerr ?></span><br><br>
    Email : <input type="text" name="email" id="">
    <span class = "error">* <?php echo $emailerr ?></span><br><br>
    <button type="submit">submit</button>
    </form>
    <h3>Your Input</h3>
<?php
echo " $name <br> ";
echo "$email ";
?>
</body>
</html>