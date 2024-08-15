<?php 
session_start();
require_once __DIR__ . "/../../vendor/autoload.php";
require_once basePath('includes/forgot_password_message.php');
require_once basePath('includes/db_connect.php');


if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
   redirect(baseUrl("auth/forgot_password.php"), ["error" => "invalidrequest"]);
}
else {
    
    $email = $_POST['email'];

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) { 
            $user = mysqli_fetch_assoc($result); // Getting the users records as an associative array

            // Generate token and update email verification token field in database;
            $token = generateToken();

            $userID = $user['id'];

            $query = "UPDATE users SET `token` = '$token' WHERE id = $userID";
            $result = mysqli_query($connection, $query);

            if($result) {

                    // Send email verification mail
                    $email = $user['email'];
                    $subject = 'Verify your email address';
                    $title = "Password Reset";
                    $greeting = "Hello User";
                    $link = baseUrl('auth/reset_password.php', ["token" => $token]);
                    $body = forgot_password_message($link);

                    $message = mailTemplate($title, $greeting, $body);
                
                    if (sendMail($email, $subject, $message)) {

                        redirect(baseUrl("auth/forgot_password.php"), ["success" => "recoveryemailsent"]);

                    } else {
                        redirect(baseUrl("auth/forgot_password.php"), ["error" => "recoveryemailnotsent"]);
                    }
            }
            else {
                redirect(baseUrl("auth/forgot_password.php"), ["error" => "unexpectederror"]);
            }
    }
    else {
        redirect(baseUrl("auth/forgot_password.php"), ["error" => "emailaccountnotfound"]);
    }
}
