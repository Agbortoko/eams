<?php

$to = "someone@example.com";
$subject = "Password Reset";
$message = "If you want to modify your password click the link below!";
$headers = "From: info@localhost";


$sendMail = mail($to, $subject, $message, $headers);

if($sendMail) {
    echo "Mail Sent Successfully";
}
else {
    echo "Mail Not Sent Successfully!";
}

