<?php

function email_verification_message($link) {

    $message = "
        <p>Please click the link below to verify your email address</p>
        <p style='text-align:center'> <a href='$link' class='button'>Verify your email address</a> </p>
    ";

    return $message;
}