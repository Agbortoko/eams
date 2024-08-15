<?php 
require_once __DIR__ . '/../includes/db_connect.php';

if(isset($_SESSION['loginID']) && isset($_SESSION['role'])) {

    $loggedUser = $_SESSION['loginID'];

    $query = "SELECT email_verified_at FROM users WHERE id = '$loggedUser'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if($user['email_verified_at'] == null) {
            redirect(baseUrl("auth/email_verification.php"));
        }
    }
}