<?php
require 'connectdb.php';
$data = file_get_contents('php://input');
$phpdata = json_decode($data, true);
$email = $phpdata['email'];
$psw = $phpdata['password'];
$confirm = $phpdata['confirmpsw'];
$isvalid = true;
$Invalid = [];
// check PAssword valdiation

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
    $Invalid['psw'] = "Please enter a valid password";
    $isvalid = false;
}
if($psw != $confirm){
   $Invalid['confirm'] = "password should be match!";
   $isvalid = false;
}

if($isvalid){
    header('Content-Type: application/json');
// Update password logic start here 
$query = "UPDATE user SET password = '$psw' where email = '$email'";
$result = mysqli_query($connect,$query);
if($result){
    echo json_encode(['status' =>'success','message' =>'password successfully reset']);
}else{
    echo json_encode(['status'=> 'error','message'=> 'something wrong! try again']);
}
}else{
    echo json_encode(['status' => 'error','Invalid' => $Invalid]);
}