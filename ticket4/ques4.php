<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question 4</title>
</head>
<body>
    <?php
    # Write a Function to display Table of Number using Call By value
    echo '<h2>Table of Number</h2>';
    function displayTable($number){
        for ($i=1; $i < 11; $i++) { 
            $tb = $i*$number;
            echo "$number * $i = $tb <br>";
        }
    }
    displayTable(4);
    ?>
</body>
</html>