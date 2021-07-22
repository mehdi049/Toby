<?php

if(isset($_POST['url']) && $_POST['url'] == ''){
      
$name= validate_input($_POST['name']);
$company= validate_input($_POST['company']);
$email= validate_input($_POST['email']);
$phone= validate_input($_POST['phone']);
$cash= validate_input($_POST['cash']);
$netWorth= validate_input($_POST['networth']);
$investTimeframe= validate_input($_POST['investTimeframe']);
$city= validate_input($_POST['city']);
$interestedDev= validate_input($_POST['interestedInDeveloping']);
$comment= validate_input($_POST['comment']);
$lang= validate_input($_POST['lang']);


try {
              
      //Content
      $body.="<p><b>Full name:</b> ".$name."</p>";
      $body.="<p><b>Company name:</b> ".$company."</p>";
      $body.="<p><b>Email:</b> ".$email."</p>";
      $body.="<p><b>Phone number:</b> ".$phone."</p>";
      $body.="<p><b>Cash available for investment:</b> ".$cash."</p>";
      $body.="<p><b>Net Worth:</b> ".$netWorth."</p>";
      $body.="<p><b>Investment timeframe:</b> ".$investTimeframe."</p>";
      $body.="<p><b>City:</b> ".$city."</p>";
      $body.="<p><b>Interested in developing:</b> ".$interestedDev."</p>";
      $body.="<p><b>Comments:</b> ".$comment."</p>";

      $subject= 'Quik Car Wash franchise';
      
$to = 'quikcarwash@gmail.com';
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
} else {
      if($lang=="en")
     echo 'The message could not be sent.';
      else echo "ไม่สามารถส่งข้อความได้";
}
        
?>
