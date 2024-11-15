<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php File Handling</title>
</head>
<body>
    <h3>File Handling</h3>
    <?php
    # This function reads the file
    function read_file($filename) {
        echo "<b>Reads the file</b> <br>";
        readfile($filename);
    }
    // read_file("readfile.txt");
    # Read file through the fopen to get more features
    # fopen first parameter name of file and mode
    function read_fileWithFopen($filename) {
        $file = fopen($filename,"r");
        echo fread($file,length: filesize($filename));
        fclose($file);
    }
    // read_fileWithFopen("readfile.txt");# with read mode
    # reads single line of file
    echo "<b>Reads single line</b> <br>";
    echo fgets(fopen("readfile.txt","r"))."<br>"; # reads single line
    # feof -- > end of the line
    function feof_func($file){
        echo "<b>after each end of line it will break run till the end of the file</b><br>";
        $f = fopen($file,"r");
        while (!feof($f)){
            echo fgets($f)."<br> Newline";
        }
        fclose($f);
    }
    feof_func("readfile.txt");
    # fgetc --> read file character by character
    $f = fopen("readfile.txt","r");
    while(!feof($f)){
    echo fgetc($f) . "<br>";
    }
    fclose($f);
    ?>
</body>
</html>