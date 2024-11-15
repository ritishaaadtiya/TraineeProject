<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 5</title>
</head>
<body>
     <!-- Write a function to check the number is amstrong or not using Call By Reference -->
    <?php
    echo "<h2>Write a function to check the number is amstrong or not</h2>";
    function Amstrong(&$num){
        $num1 = $num;
        $len = strlen((string)$num);
        $ams = 0;
        while ($num > 0){
            $last_digit = $num%10;
            $ams += $last_digit**$len;
            (int)$num /=10;
        }
        if($ams == $num1){
            return true;
        }
        else{
            return false;
        }
    }
    $num = 1634;
    $res = Amstrong($num);
    echo "Number is : ". ($res ? 'Amstrong' : 'not Amstrong'). "<br>";
   
    ?>

</body>
</html