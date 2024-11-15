<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File uploading</title>
</head>
<body>

    <h2>Upload a file</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="file" id="file"><br><br>
    <button type="submit" name="submit">Upload</button>
    </form>
    <?php

    if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $file_dir = "upload/";
            $target_file = $file_dir.basename($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'],$target_file);
            echo "file uploaded successfully:)<br>";
            // File downloading link
            echo "cilick to download <a href = 'filedownload.php?file=".basename($target_file)."'>download file </a>";
          
    }
    ?>
</body>
</html>