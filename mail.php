<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

require_once 'mail.config.php';

$MAIL_CONFIG = $CONFIG['mail'];

function sendMail($to, $subject, $text) {
  global $MAIL_CONFIG;

  $mail = new PHPMailer;
  if($MAIL_CONFIG['isSMTP']) {
    $mail->isSMTP(); 
  }

  if($MAIL_CONFIG['debug']) {
    $mail->SMTPDebug = 2; 
  } else {
    $mail->SMTPDebug = 0; 
  }

  $mail->Host = $MAIL_CONFIG['host']; 
  $mail->Port = $MAIL_CONFIG['port'];
  $mail->SMTPSecure = 'tls'; // ssl is depracated
  $mail->SMTPAuth = true;
  $mail->Username = $MAIL_CONFIG['email'];
  $mail->Password = $MAIL_CONFIG['password'];
  $mail->setFrom($MAIL_CONFIG['email'], $MAIL_CONFIG['email']);
  $mail->addAddress($to, $to);
  $mail->Subject = $subject;
  $mail->msgHTML($text); // remove if you do not want to send HTML email
  
  if(!$mail->send()) {
    if($MAIL_CONFIG['debug']) {
      echo '<pre>';
      echo $mail->ErrorInfo;
      echo '</pre>';
    }
    return false;
  }

  return true;
}


