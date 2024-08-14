<?php

require_once __DIR__ ."/../vendor/autoload.php"; 
require_once __DIR__ . "/settings.php";


use PHPMailer\PHPMailer\PHPMailer;

function usePHPMailer($to, $subject, $message) {
   
    $mailConfig = [
        'host' => '127.0.0.1',    
        'port' => 1025,                     
        'username' => null, 
        'password' => null,    
        'encryption' => null,             
        'from_email' => getConfig('admin_email'),  
        'from_name' => getConfig('site_name'),    
    ];
    
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $mailConfig['host'];
    $mail->SMTPAuth = true;
    $mail->Username = $mailConfig['username'];
    $mail->Password = $mailConfig['password'];
    $mail->SMTPSecure = $mailConfig['encryption'];
    $mail->Port = $mailConfig['port'];

    $mail->setFrom($mailConfig['from_email'], $mailConfig['from_name']);
    $mail->addAddress($to);
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->isHTML(true);

    if (!$mail->send()) {
        return false;
    } else {
        return true;
    }
}
