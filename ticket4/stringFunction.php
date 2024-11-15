<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    # String Function
    $str = "Lorem ipsum dolor sit amet consectetur adipisicing.";
    echo "String length is : ".strlen($str)."<br>"; # return String length
    echo "Convert String to uppercase : ".strtoupper($str)."<br>";# convert string to uppercase
    echo "Convert string to lowercase : ".strtolower($str)."<br>";
    #convert string to lowercase
    $subpart = substr($str,0,5);
    echo "part of string is : $subpart <br>"; # return part of string 
    echo "the element is found at the index : ".strpos($str,"r")."<br>"; #return the index of the first occurance where the element is found
    echo "replace lorem with korem and the string become : ".str_replace("Lorem","korem",$str)."<br>"; # replace all the accurance of string with replacement string
    $str = "       lorem   "; 
    echo trim($str)."<br>"; # remove all the white space (leftend and right end) from an string
    $str = "a,b,c,rit";
    $strtoarr =  explode(",",$str); # it split a string to array
    echo "split string to array by comma :"; 
    print_r( $strtoarr);
    echo "<br>";
    echo "array to string" . implode(",",$strtoarr);# join array element to single string
    echo "<br>";
    $name = "rit";
    $roll = 101;
    echo sprintf("My name is %s and roll no is %d",$name,$roll)."<br>"; # return formatted string
    echo "convert the first character to uppercase".ucfirst($str)."<br>";
    $str = "Lorem ipsum dolor sit amet.";
    echo "convert the first character of of each word into uppercase :  ".ucwords($str)."<br>"; #convert each character of word into uppercase
    echo "reversed string is : ".strrev($str)."<br>"; # reverse the string
    echo strcmp($str, $name)."<br>"; # comapare two string if string is equal it return 0 and not so it return -1;
    echo str_repeat($name,3)."<br>"; # repeat number of times
    echo preg_match("/isum/",$str)."<br>";# it return 1 if found and no then -1
    ?>
    
</body>
</html>