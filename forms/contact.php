<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/PHPMailer/src/Exception.php';
require '/PHPMailer/src/PHPMailer.php';
require '/PHPMailer/src/SMTP.php';

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

$mail = new PHPMailer(true);
try {
              
      //Content
      $body.="<p><b>Full name:</b> ".$name."</p> <br>";
      $body.="<p><b>Company name:</b> ".$company."</p> <br>";
      $body.="<p><b>Email:</b> ".$email."</p> <br>";
      $body.="<p><b>Phone number:</b> ".$phone."</p> <br>";
      $body.="<p><b>Cash available for investment:</b> ".$cash."</p> <br>";
      $body.="<p><b>Net Worth:</b> ".$netWorth."</p> <br>";
      $body.="<p><b>Investment timeframe:</b> ".$investTimeframe."</p> <br>";
      $body.="<p><b>City:</b> ".$city."</p> <br>";
      $body.="<p><b>Interested in developing:</b> ".$interestedDev."</p> <br>";
      $body.="<p><b>Comments:</b> ".$comment."</p> <br>";

      $subject= 'Quik Car Wash franchise';

    /*  
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';                  
    $mail->SMTPAuth = true;                              
    $mail->Username = '';            
    $mail->Password = '';                        
    $mail->SMTPSecure = 'TLS';                         
    $mail->Port = 465;            
    $mail->setFrom($email, $name);          
    $mail->addAddress('', 'name'); 
    $mail->isHTML(true);                                  
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->send();
    */


$to = 'info@quikcarwash.com';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: <".$email.">" . "\r\n";

mail($to, $subject, $body, implode("\r\n", $headers));
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
