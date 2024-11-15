<?php
require './connectdb.php';
$data = file_get_contents('php://input');
$phpdata = json_decode($data,true);
$email = $phpdata['email'];
$psw = $phpdata['password'];
$isvalid = true;
$Invalid  = [];
foreach($phpdata as $key => $value){
    if($value == ""){
     $Invalid[$key] = "Please fill the valueeeeeeeeeeeeeeeeee";
     $isvalid = false;
    }
}
# Email Validation
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
   $Invalid['email'] = "Invalid email format";
   $isvalid = false;
}
# Password Validation
function check_password($chararray){
    $hasDigit = false;
    $hasUppercase = false;
    $hasLowercase = false;
    $hasSpecialChar = false;
    $specialChars = "!@#$%^&*()_+-=[]{}|;:'\",.<>?/`~";
    foreach ($chararray as $char) {
        // Check if the character is a digit
        if ($char >= "0" && $char <= "9") {
          $hasDigit = true;
        }
        // Check if the character is an uppercase letter
        else if ($char >= "A" && $char <= "Z") {
          $hasUppercase = true;
        }
        // Check if the character is a lowercase letter
        else if ($char >= "a" && $char <= "z") {
          $hasLowercase = true;
        }
        // Check if the character is a special character
        else if (strpos($specialChars, $char)) {
          $hasSpecialChar = true;
        }
      }

      // Return true if all conditions are met
      return $hasDigit && $hasUppercase && $hasLowercase && $hasSpecialChar;
   
}
$validpass = check_password(str_split($psw));
if(!$validpass){
    $Invalid['psw'] = "Invalid password";
    $isvalid = false;
}
header('Content-Type: application/json');
// Convert data to json
if($isvalid){
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$psw'";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result)<1){
        $Invalid['psw'] = "Invalid email or password";
        $isvalid = false;
        echo json_encode(['status'=>'error','Invalid'=>$Invalid]);
    }else{
  
    echo json_encode(['status'=> 'success', 'message'=> "successfully login"]);
    }
}
else{
   echo  json_encode(['status' => 'error','Invalid' => $Invalid]);
}