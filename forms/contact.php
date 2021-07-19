<?php

$email= validate_input($_POST['email']);
$message= validate_input($_POST['message']);
$lang= validate_input($_POST['lang']);

try {
              
      //Content
      $body.="<p><b>Email:</b> ".$email."</p>";
      $body.="<p><b>Message:</b> ".$message."</p>";

      $subject= 'Inquiry for Quik Car Wash franchise';


$to = 'info@quikcarwash.com';
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

mail($to, $subject, $body, $headers);
echo 'OK';

} catch (Exception $e) {
    if($lang=="en")
     echo 'The message could not be sent.';
      else echo "ไม่สามารถส่งข้อความได้";
}


function validate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
        
?>
