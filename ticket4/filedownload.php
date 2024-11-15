<?php
$file = $_GET['file'];
$file_path = 'upload/'. $file;
if (file_exists($file_path)) {
    header('content-type:application');
    header('Content-Disposition: attachment; filename= "' . basename($file_path) . '"');
    header('Content-Length: ' . filesize($file_path));
    readfile($file_path); # reads the content of the file at $file_path and sends it directly to the browser's output.
    exit();
}else{
    echo'file not exist!';
}