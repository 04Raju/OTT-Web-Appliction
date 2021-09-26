<?php
require "phpmailer/PHPMailerAutoload.php";

function mailer($to,$body){
//Setup
//    echo $to;
//    echo $body;
$mail = new PHPMailer;
 $mail->isSMTP();              
 //Send using SMTP
 
 $mail->SMTPDebug = 3;
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username = "Enter Email Id";
 $mail->Password = "Enter Password ";                              //SMTP password
 $mail->SMTPSecure = 'tls';     //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
 $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

 //Recipients
 $mail->setFrom('Enter Email Id');
 $mail->addAddress($to); 
 //$mail->addAddress('ehackers04@gmail.com');                 //Name is optional
// $mail->addReplyTo('ehackers04@gmail.com');
//  $mail->addCC('cc@example.com');
//  $mail->addBCC('bcc@example.com');

 //Attachments
//  $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

 //Content
 $mail->isHTML(true);                                  //Set email format to HTML
 $mail->Subject = 'Hello This TESTING MAIL';
  $mail->Body    = $body;
// $mail->Body    = '<h1>Hello World </h1>';
 $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if( $mail->send()){
    echo 'Message has been sent';
}
 else{
     echo "can't Send";
     echo $mail->ErrorInfo;
 }

}


$body= "<div style=' align-content: center;background:black;'> <h1>BVM - ENTERTAINMENT</h1><br><br>"
        . "<strong>Click On Verify Button To Activate Your Account</strong><br><br>"
        . "<a href='google.com'style='background-color:green; color:white; padding:10px;'>Verify</a>"
        
        . "</div>";

?>