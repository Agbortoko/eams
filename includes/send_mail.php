<?php

require_once __DIR__ . "/../config/mail.php";

function sendMail($to, $subject, $message, $headers = '') {
    if (function_exists('usePHPMailer')) {
        return usePHPMailer($to, $subject, $message, $headers);
    }
}
