<?php

require_once __DIR__ . "/../vendor/autoload.php";

$userEmail = 'user@eschosys.com';
$subject = 'This is an important Message';

$title = "Important Message";
$greeting = "Hello User";
$body = "Please verify your email address";
$message = mailTemplate($title, $greeting, $body);

if (sendMail($userEmail, $subject, $message)) {
    echo 'Test email sent successfully!';
} else {
    echo 'Failed to send test email.';
}