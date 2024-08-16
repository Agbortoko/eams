<?php

require_once __DIR__ . '/../includes/db_connect.php';

if (isset($_SESSION['loginID']) && isset($_SESSION['role'])) {

    $loggedUser = $_SESSION['loginID'];

    // Check user
    $query = "SELECT * FROM users WHERE id = $loggedUser";
    $result = mysqli_query($connection, $query);

    if($_SESSION['role'] == "admin") {

        if(mysqli_num_rows($result) == 1) {

            $user = mysqli_fetch_assoc($result);

            if($user['email_verified_at'] !== null) {

                // Check user's student details
                $query = "SELECT * FROM admins WHERE user_id = $loggedUser";
                $result = mysqli_query($connection, $query);

                if(mysqli_num_rows($result) !== 1) {
                    redirect(baseUrl("auth/admin_details.php"));
                }
            }
        }
    }
}
