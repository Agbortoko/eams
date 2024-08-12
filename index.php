<?php


require_once __DIR__ . '/config/mail.php';

$userEmail = 'user@eschosys.com';
$subject = 'This is an important Message';
$message = 'This Message is to verify if the emails are working well';


if (sendMail($userEmail, $subject, $message)) {
    echo 'Verification email sent successfully!';
} else {
    echo 'Failed to send verification email.';
}