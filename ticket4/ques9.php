<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qestion 9</title>
</head>
<body>
     <!-- write function to swap and perfroming variable length function -->
      <?php
      echo "<h2>Function to Swap</h2>";
      function swap($a,$b){
        echo "before swaping a is $a and b is $b"; 
        $temp = $a;
        $a = $b;
        $b = $temp;
        echo "after swaping a is $a and b is $b";
      }
      swap(12,14);
      echo "<br>Sum of number <br>";
      function sum(...$num){
        $len = count($num);
        $sum = 0;
        for ($i=0; $i < $len; $i++) { 
            $sum += $num[$i];
        }
        return $sum;
      }
      echo "sum is : ".sum(1,2,3,4,5);
      ?>
</body>
</html>