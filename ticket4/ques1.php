<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 1</title>
</head>
<body>
    <?php
    # Sum of Digits
    $number = 12345;
    $sum = 0;
    while ($number > 0){
        $last_digit = $number%10;
        $sum += $last_digit;
        $number /= 10;
    }
    echo "<h2>Sum of digit is $sum </h2>";
    ?>
</body>
</html>