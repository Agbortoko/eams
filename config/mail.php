<?php

use PHPMailer\PHPMailer\PHPMailer;
// Mail Configuration Settings
require __DIR__ . "/settings.php";

$mailConfig = [
    'host' => '127.0.0.1',    
    'port' => 1025,                     
    'username' => '', 
    'password' => '',    
    'encryption' => '',             
    'from_email' => getConfig('admin_email'),  
    'from_name' => getConfig('site_name'),    
];

// Function to send an email
function sendMail($to, $subject, $message, $headers = '') {
    // Fallback to PHP mail() function (less reliable, but simpler)
    if (function_exists('usePHPMailer')) {
        return usePHPMailer($to, $subject, $message, $headers);
    }
}


function usePHPMailer($to, $subject, $message, $headers) {
    global $mailConfig;

    require './vendor/autoload.php';  // Include PHPMailer library

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
