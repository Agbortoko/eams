<?php
session_start();
require_once __DIR__ . "/../../vendor/autoload.php";
require_once basePath('includes/email_verification_message.php');
require_once __DIR__ . '/../../includes/db_connect.php';

if(!$_GET['token']) {
    session_destroy();
    redirect(baseUrl("auth/login.php"), ["error" => "invalidrequest"]);
}   
else {

      // Get logged user from the session
      $loggedUser = $_SESSION['loginID'];
      $loggedUserRole = $_SESSION['role'];
      $token = $_GET['token'];

      // Check user with token
      $query = "SELECT * FROM users WHERE token = '$token'";
      $result = mysqli_query($connection, $query);

      if(mysqli_num_rows($result) == 1) {

            // Set user as verified
            $query = "UPDATE users SET `email_verified_at` = now(), `token` = null WHERE id = $loggedUser";
            $result = mysqli_query($connection, $query);

            if($result) {

                // check if user is admin or student

                if($loggedUserRole == "student") {
                    redirect(baseUrl("student/index.php"), ["success" => "emailverificationsuccess"]);
                }
                elseif($loggedUserRole == "admin") {

                    redirect(baseUrl("admin/index.php"), ["success" => "emailverificationsuccess"]);
                }

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