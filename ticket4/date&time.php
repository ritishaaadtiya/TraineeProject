<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date and Time</title>
</head>
<body>
    <h2>Date & Time </h2>
    <?php
    // to get a date
    echo date("d-m-y")."<br>";
    echo date("l")."<br>";
    # To get a time
    date_default_timezone_set("Asia/Kolkata"); 
    echo date("h:i:s a"); # h for hours,i for minutes,s for second,a for am and pm

    ?>
</body>
</html>