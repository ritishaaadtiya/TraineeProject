<?php
require 'connectdb.php';
$data = file_get_contents('php://input');
$phpdata = json_decode($data,true);
$email = $phpdata['email'];
$isvalid = true;
$Invalid = [];
if($email == ""){
    $Invalid['email'] = 'Please Fill the value';
    $isvalid = false;
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $Invalid['email'] = 'Invalid email';
    $isvalid = false;
}


header('Content-Type:application/json');
if($isvalid){

    // Check if the email is valid or not
    $query = "SELECT email from user where email = '$email'";
    $res = mysqli_query($connect,$query);
    if(mysqli_num_rows($res)>0){
        $Invalid['email'] = $email;
        echo json_encode(['status'=>'success','Invalid'=> $Invalid]);
    }else{
       
        $Invalid['email'] = 'Email not exist';
        echo json_encode(['status'=>'error','Invalid'=> $Invalid]);
    }
   
}else{
    echo json_encode(['status'=>'error','Invalid'=> $Invalid]);
}