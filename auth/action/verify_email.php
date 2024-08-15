<?php
session_start();
require_once __DIR__ . "/../../vendor/autoload.php";
require_once basePath('includes/email_verification_message.php');
require __DIR__ . '/../../includes/db_connect.php';

if(!$_GET['token']) {
    session_destroy();
    redirect(baseUrl("auth/login.php"), ["error" => "invalidrequest"]);
}   
else {

      // Get logged user from the session
      $loggedUser = $_SESSION['loginID'];
      $token = $_GET['token'];

      // Check user with token
      $query = "SELECT * FROM users WHERE email_verification_token = '$token'";
      $result = mysqli_query($connection, $query);

      if(mysqli_num_rows($result) == 1) {

            // Set user as verified
            $query = "UPDATE users SET `email_verified_at` = now(), `email_verification_token` = null WHERE id = $loggedUser";
            $result = mysqli_query($connection, $query);

            if($result) {
                redirect(baseUrl("student/index.php"), ["success" => "emailverificationsuccess"]);
            }
            else {
                redirect(baseUrl("auth/email_verification.php"), ["error" => "emailverificationfailed"]);
            }
      } 
      else {
            session_destroy();
            redirect(baseUrl("auth/login.php"), ["error" => "invalidrequest"]);
      }
}