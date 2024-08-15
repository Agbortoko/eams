<?php

function forgot_password_message($link) {

    $message = "
        <p>Please click the link below to reset your account password</p>
        <p style='text-align:center'> <a href='$link' class='button'>Reset Password</a> </p>
    ";

    return $message;
}