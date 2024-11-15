<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 8</title>
</head>

<body>
    <!-- Write a function to reverse string  -->
    <?php
    echo "<h2>Write a function to reverse string </h2>";
     function revStr($str){
        $start = 0;
        $end = strlen($str)-1;
        while ($start < $end){
            $temp = $str[$start];
            $str[$start] = $str[$end];
            $str[$end] = $temp;
            $start++;
            $end--;
        }
        return $str;
     }
     echo  "befor reversed : ritisha <br> after reversed : ".revStr("ritisha");
    ?>
</body>

</html>