<?php
require './connectdb.php';




$data = file_get_contents("php://input");
$phpdata = json_decode($data,true);
$id = $phpdata["id"];
$username = $phpdata["username"];
$email = $phpdata["email"];
$psw = $phpdata["password"];
$isvalid = true;
$Invalid = [];

// Server Side Validations
#validate username
$invaliduser = is_numeric(substr($username, 0,1)); 
if(strlen(string: $username)<4 || $invaliduser){
    $Invalid['username'] = "please enter a valid username";
   $isvalid = false;
}
if($email == ""){
   $Invalid['email'] = "Please Fill the values";
   $isvalid = false;
}
$invalidemail = filter_var($email, FILTER_VALIDATE_EMAIL);
if(!$invalidemail){
    $Invalid['email'] = "Please enter a valid email";
    $isvalid = false;
}
if ($psw == ""){
   $Invalid['psw'] = 'please fill the values';
   $isvalid = false;
}
# Function to check vaid password
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


header('Content-Type: application/json');
if($isvalid){
    $checkemailquery = "SELECT id,email FROM user WHERE email = '$email' AND id != '$id'";
    $checkemail = mysqli_query($connect,$checkemailquery);
    if(mysqli_num_rows($checkemail)>0){
      $Invalid['email'] = "Email already exist!";
       echo json_encode(['status'=>'error','Invalid' => $Invalid]);
       
    }else{
    $query = "UPDATE user SET username = '$username',email = '$email',password='$psw' where id='$id'"; 
    $result = mysqli_query($connect, $query);
    if($result){
        echo json_encode(['status'=>'success','message' =>'User updated successfully']);
    }else{
        echo json_encode(['status'=>'error','message' =>'Error updating user']);
    }
  }
}else{
 echo json_encode(['status'=>'error','Invalid'=>$Invalid]);   
}
