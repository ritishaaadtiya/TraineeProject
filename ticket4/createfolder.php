<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Folder</title>
</head>
<body>
    <?php

     $createFolder = 'folder/';
     if (isset($_GET['submit'])){
        if(!file_exists($createFolder)){
            mkdir(($createFolder),0777);
            echo "folder created Succesfuly";
         }
         else{
            echo "folder already exist";
         }
     }

    ?>
    <h3>Create Folder</h3>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="get">
        <button type="submit" name="submit">Click here to create Folder</button>
    </form>

</body>
</html>
