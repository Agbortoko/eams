<?php

require_once __DIR__ . '/config/mail.php';

$userEmail = 'user@eschosys.com';
$subject = 'This is an important Message';
$message = '<p style="font-family: Arial, sans-serif;">This Message is to verify if the emails are working well <span style="font-weight: 800"> This is a bold paragraph </span> </p>';


if (sendMail($userEmail, $subject, $message)) {
    echo 'Verification email sent successfully!';
} else {
    echo 'Failed to send verification email.';
}