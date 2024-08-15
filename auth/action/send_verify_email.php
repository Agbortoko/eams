<?php 
session_start();
require_once __DIR__ . "/../../vendor/autoload.php";
require_once basePath('includes/email_verification_message.php');
require_once __DIR__ . '/../../includes/db_connect.php';


if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
   redirect(baseUrl("auth/email_verification.php"), ["error" => "invalidrequest"]);
}
else {
    // Get logged user from the session
    $loggedUser = $_SESSION['loginID'];

    $query = "SELECT * FROM users WHERE id = $loggedUser";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) { 
            $user = mysqli_fetch_assoc($result); // Getting the users records as an associative array

            // Generate token and update email verification token field in database;
            $token = generateToken();

            $query = "UPDATE users SET `token` = '$token' WHERE id = $loggedUser";
            $result = mysqli_query($connection, $query);

            if($result) {

                    // Send email verification mail
                    $email = $user['email'];
                    $subject = 'Verify your email address';
                    $title = "Email Verification";
                    $greeting = "Hello User";
                    $link = baseUrl('auth/action/verify_email.php', ["token" => $token]);
                    $body = email_verification_message($link);

                    $message = mailTemplate($title, $greeting, $body);
                
                    if (sendMail($email, $subject, $message)) {

                        redirect(baseUrl("auth/email_verification.php"), ["success" => "emailverificationsent"]);

                    } else {
                        redirect(baseUrl("auth/email_verification.php"), ["error" => "emailverificationnotsent"]);
                    }
            }
            else {
                redirect(baseUrl("auth/email_verification.php"), ["error" => "unexpectederror"]);
            }
    }
    else {
        redirect(baseUrl("auth/email_verification.php"), ["error" => "unexpectederror"]);
    }
}
