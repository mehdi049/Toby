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
$city= validate_input($_POST['city']);
$interestedDev= validate_input($_POST['interestedInDeveloping']);
$comment= validate_input($_POST['comment']);
$lang= validate_input($_POST['lang']);

$mail = new PHPMailer(true);
try {
    //Server settings
    //$mail->SMTPDebug = 2;                                
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';                  
    $mail->SMTPAuth = true;                              
    $mail->Username = '';            
    $mail->Password = '';                        
    $mail->SMTPSecure = 'TLS';                         
    $mail->Port = 465;                                
    //Recipients
    $mail->setFrom('', $name);          
    $mail->addAddress('', 'Mehdi'); 

    //Content
    $body.="<p><b>Full name:</b> ".$name."</p> <br>";
    $body.="<p><b>Company name:</b> ".$company."</p> <br>";
    $body.="<p><b>Email:</b> ".$email."</p> <br>";
    $body.="<p><b>Phone number:</b> ".$phone."</p> <br>";
    $body.="<p><b>Cash available for investment:</b> ".$cash."</p> <br>";
    $body.="<p><b>Net Worth:</b> ".$netWorth."</p> <br>";
    $body.="<p><b>City:</b> ".$city."</p> <br>";
    $body.="<p><b>Interested in developing:</b> ".$interestedDev."</p> <br>";
    $body.="<p><b>Comments:</b> ".$comment."</p> <br>";

    $mail->isHTML(true);                                  
    $mail->Subject = 'Quick Car Wash application form';
    $mail->Body = $body;
    $mail->send();
    echo 'OK';
} catch (Exception $e) {
    echo 'Message could not be sent.';
}


function validate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
        
?>
