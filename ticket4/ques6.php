<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 6</title>
</head>
<body>
<?php
# Write a Function to Print Fabonacci series between range using Default Argument Values Function
echo "<h2> Print Fabonacci series between range
</h2>";

function Fabonacci($range = 100){
    $a = 0;
    $b = 1;
    while ($a < $range){
        echo $a." ";
        $c = $a + $b;
        $a = $b;
        $b = $c;
    }
}
Fabonacci();
echo "<br>";
Fabonacci(20);
?>

</body>
</html>