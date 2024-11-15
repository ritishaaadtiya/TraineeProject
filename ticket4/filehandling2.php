<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    # Open a file for write only. Erases the contents of the file or creates a new file if it doesn't exist. File pointer starts at the beginning of the file
     function write_mode($filename){
      $file = fopen($filename,"w");
      $txt = "hello";
      fwrite($file,$txt);
      fclose($file);
     }
    //  write_mode("writefile.txt");
    //  readfile("writefile.txt");
    # append doesn't remove the content it append to the file
    function append_mode($filename){
        $file = fopen($filename,"a");
        $txt = "You can append data to a file by using the 'a' mode. The 'a' mode appends text to the end of the file.";
        fwrite($file,$txt);
        fclose($file);
    }
    append_mode("append.txt");
    readfile('append.txt');
    # To delete the file
    // unlink("append.txt"); 

    ?>
</body>
</html>