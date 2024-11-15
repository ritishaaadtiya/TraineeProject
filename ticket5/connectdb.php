<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$connect = mysqli_connect($servername, $username, $password, $dbname);
if(!$connect){
 die("error");
}
# data base created!
// $query = "CREATE DATABASE mydb";
// if (mysqli_query($connect, $query)){
//    echo "Database created";
// }else{
//     die("". mysqli_error($connect));
// }

# create Table

// $query = "CREATE TABLE user (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(20) NOT NULL,
//     email VARCHAR(30) NOT NULL,
//     password VARCHAR(30) NOT NULL
// );";
// if (mysqli_query($connect, $query)){
//     echo "Table created!";
// }else{
//     die("". mysqli_error($connect));
// }


