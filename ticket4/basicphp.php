<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Php Understanding</title>
</head>

<body>
    <?php
        /*Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem, temporibus voluptates debitis laborum saepe commodi accusamus, modi labore a culpa magnam. At ad hic fuga ea alias, animi iste ducimus! */
    $str1  = "ritisha";
    echo $str1; //Display or print statement
    echo  " My name is : " . $str1; # php keywords are not case senstive but varibles are not

    # Constant -- >
    define("name","Rit");
    echo " " . name;
    const str = "<br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem,";
    echo str;
    // Magic Constants
    echo __DIR__; # it return the path 
    echo __FILE__; # it return the path including the file name 
    echo __LINE__; # return current line number
    #USe of $$ --- > It allows you to use the value of one variable as the name of another variable.
    $color = "red";
    $$color = "dark-red";
    echo "color value is $color";
    echo "red value is $red";
    // control statements
    if ($name == "ritisha"){
        echo "True";
    }else{
        echo "false";
    }
    for($i=0;$i<10;$i++){
        echo $i;
    }
    // Working with Arrays and foreach 
    echo "<h2>Printing Arrays</h2>";
    $numlist = [1,2,3,4,5];
    array_push($numlist,"ritisha"); # TO push element at the end of the array
    $numlist[1] = "rit"; # to modify value of an array
    foreach ($numlist as $num){
        echo  "$num ";
    }
    echo var_dump($numlist). "<br>"; # to check the type of an array
    #Associative Arrays --> data stores in key value pair
    $studata = ["name" => "rit","roll" => 101];
    $studata += ["color" => "red", "year" => 1964]; # Add multiple item in Associative Arrays
    array_shift( array: $studata ); # remove first item from an array
    array_pop($studata); #remove last item from an array
    unset( $studata["color"] ); #remove the specific key value item
    array_splice( $studata,1,2); # remove multiple element with starting element and the how much element want to delelte
    foreach ($studata as $key => $val){
        echo "$key : $val <br>";
    }
    # Multidimention array
    $arr = [["ritisha",101,"SE"],
            ["xyz",102,"JSE"],
            ["Arsh",103,"CA"]];
    echo count($arr);
    # Print Array
    for($i=0;$i<count(value: $arr);$i++){
        for($j=0;$j<count(value: $arr);$j++){
            echo $arr[$i][$j]." ";
        }
        echo "<br>";
    }
    
    ?>

</body>

</html>