<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 3</title>
</head>
<body>
    <?php
    # Check the given number is prime or not
    $Isprime = true;
    $num = 8;
    for ($i=2; $i < $num; $i++) { 
        if($num%$i == 0){
            $Isprime = false;
            echo "<h2>$num is not Prime</h2>";
            break;
        }
    }
    if($Isprime){
        echo "<h2>$num is prime</h2>";
    }
    ?>
</body>
</html>