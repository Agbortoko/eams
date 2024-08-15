<?php 
session_start();
require_once __DIR__ . "/../../vendor/autoload.php";
require_once basePath('includes/db_connect.php');


if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
   redirect(baseUrl("auth/forgot_password.php"), ["error" => "invalidrequest"]);
}
else {
   
    $token = $_POST['token'];
    $email = $_POST['email'];
    $newPassword = $_POST['newPassword'];
    $passwordConfirmation = $_POST['passwordConfirmation'];

    $query = "SELECT * FROM users WHERE token = '$token'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) { 
            $user = mysqli_fetch_assoc($result); // Getting the users records as an associative array

            // Check password confirmation
            if($newPassword !== $passwordConfirmation) {
                redirect(baseUrl("auth/reset_password.php"), ["token" => $token, "error" => "confirmpassworderror"]);
            }else { 

                // reset password
                $userID = $user['id'];
                $hashNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                $query = "UPDATE users SET `password` = '$hashNewPassword' , `token` = null WHERE id = $userID";
                $result = mysqli_query($connection, $query);

                if($result) {
                     redirect(baseUrl("auth/login.php"), ["success" => "passwordresetsuccess"]);
                }
                else {
                    redirect(baseUrl("auth/reset_password.php"), ["token" => $token, "error" => "unexpectederror"]);
                }

            }
    }
    else {
        redirect(baseUrl("auth/login.php"), ["error" => "unexpectederror"]);
    }
}
