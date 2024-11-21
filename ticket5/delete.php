<?php
require "connectdb.php";
header('Content-Type: application/json');
$data = file_get_contents("php://input");
$phpdata = json_decode($data, true);
$id = $phpdata['id'];
$id = intval($id);
$query = "DELETE FROM user WHERE id = '$id'";
$result = mysqli_query($connect,$query);
if($result){
    echo json_encode(['status'=>'success','message'=> 'User deleted successfully']);
}
else{
    echo json_encode(['status'=>'error','message'=> 'Error deleting user']);
}