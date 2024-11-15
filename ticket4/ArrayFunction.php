<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Functions</title>
</head>
<body>
    <?php
    # Array Functions 
    $numArr = [1,2,3,4];
    array_push(($numArr),"rit",20); # Add one or more element at the end of an array
    $value = array_pop($numArr);# Remove the last element of an array and whatever the val is remove it return the value
    echo "pop value is $value <br>";
    $value = array_shift($numArr); # remove first element of an array and return it
    array_unshift($numArr,"bank",101); # add one or more value at the biggning of an array
    echo count($numArr) . "<br>"; # Count number of element in Array
    $sliced = array_slice(($numArr),0,length: 4); # Extract the part of an array
    # This function takes two or more arrays and returns the elements that are present in the first array but not in the other arrays.
    $diff = array_diff($numArr, $sliced);
    foreach ($diff as $val) {
     echo $val ." ";
    }
    echo "<br>";
    $mergeArr = array_merge($numArr,$sliced);# merege two or more arrays into one
    $arrRev = array_reverse($numArr);# reverse the array
    $isExist = in_array("rit",$numArr);# Check if value exist in array or not
    echo "$isExist <br>"; 
    $KeyvalArr = ["name"=>"rit","surname"=>"aadtiya","id"=>101];
    $val = array_values($KeyvalArr);# Print the value in assosiate array
    $keys = array_keys($KeyvalArr);# Return all keys of an array
    foreach ($keys as $key) {
        echo "". $key ." ";
    }
    echo "<br>";
    foreach ($val as  $value) {
        echo "". $value ." ";
    }
    echo "<br>";
    foreach($arrRev as $rev){
        echo $rev ." ";
    }
    echo("<br>");
    foreach ($mergeArr as $key) {
        echo $key." ";
    }
    echo "<br>";
    foreach($sliced as $s){
        echo $s." ";;
    }
    echo "<br>";
    foreach ($numArr as $arr){
       echo $arr." ";
    }
    echo "<br>";
    # anonymous Function - > without name and for more shorter -->without name and arrow function 
    # Normal Function
    function greet(){
        echo "Hello Wordl! <br>";
    }
    greet(); # function Calling
    # Anonymous Function
    $greetfunc = function(){
        echo "hello World!";
    };
    echo $greetfunc() . "<br>";
    $arr = [2,1,4,5];
    $mapSqr = array_map(fn($n): float|int=>$n**2,array: $arr);
    foreach($mapSqr as $sqr){
        echo $sqr;
    }
    echo "<br>";
    $filterEven = array_filter(array: $arr,callback: fn($n): bool=>$n%2==0,); 
    foreach($filterEven as $n){
        echo $n." ";
    }
    echo "<br>";
    $sum = array_reduce($arr,fn($s = 0,$n) => $s+=$n);
    echo $sum . "<br>";
    ?>
</body>
</html>