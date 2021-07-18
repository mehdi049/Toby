<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '/PHPMailer/src/Exception.php';
require '/PHPMailer/src/PHPMailer.php';
require '/PHPMailer/src/SMTP.php';

$email= validate_input($_POST['email']);
$message= validate_input($_POST['message']);
$lang= validate_input($_POST['lang']);

$mail = new PHPMailer(true);
try {
              
      //Content
      $body.="<p><b>Email:</b> ".$email."</p> <br>";
      $body.="<p><b>Message:</b> ".$message."</p> <br>";

      $subject= 'Inquiry for Quik Car Wash franchise';

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
