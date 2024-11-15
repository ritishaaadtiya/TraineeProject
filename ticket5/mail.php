<?php
$data = file_get_contents("php://input");
$phpdata = json_decode($data,true);
$email = $phpdata["email"];
$toemail = 'ritishaaadtiya28@gmail.com';
$username = "Ritisha Aadtiya";
$fromEmail = 'ritishaaadtiya28@gmail.com';
$subject = "Reset Your Password";
$headers = "From: $fromEmail";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$htmlcontent = file_get_contents('mailcontent.html');
$htmlcontent = str_replace('{{username}}', $username, $htmlcontent);
$htmlcontent = str_replace('{{link}}','http://localhost/ticket5/forgotpsw.php?email='. urlencode($email), $htmlcontent);

header('Content-Type:application/json');
if($htmlcontent == false){
    echo json_encode(['status' => 'error' , 'message' => 'Html not loaded']);
}
if(mail($toemail,$subject,$htmlcontent, $headers)){
    echo json_encode(['status' => 'success']);
}