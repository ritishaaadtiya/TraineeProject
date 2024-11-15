<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 7</title>
</head>
<body>
    <!-- Reverse the number using recursive method -->
     <?php
      echo "<h2>Reverse the number using recursive method</h2>";
      function reverse($num,$rev = 0){
        if ($num == 0){
            return $rev;
        }
        $last_digit = $num%10;
        $rev = $rev*10 + $last_digit;
        return reverse((int)($num/10),$rev);
      }
      $num = 12345;
      $res = reverse($num);
      echo "before reverse number is : $num and after reversed number is : $res";
     ?>

</body>
</html>