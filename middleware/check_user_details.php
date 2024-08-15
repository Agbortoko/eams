<?php 
require_once __DIR__ . '/../includes/db_connect.php';

if(isset($_SESSION['loginID']) && isset($_SESSION['role'])) {

    if($_SESSION['role'] == "student") {

        $loggedUser = $_SESSION['loginID'];

        // Check user
        $query = "SELECT * FROM users WHERE id = $loggedUser";
        $result = mysqli_query($connection, $query);
    
        if(mysqli_num_rows($result) == 1) {

            $user = mysqli_fetch_assoc($result);

            if($user['email_verified_at'] !== null) {

                // Check user's student details
                $query = "SELECT * FROM students WHERE user_id = $loggedUser";
                $result = mysqli_query($connection, $query);

                if(mysqli_num_rows($result) !== 1) {
                    redirect(baseUrl("auth/student_details.php"));
                }

            }
        }
    }
    elseif($_SESSION["role"] == "admin") {
        // TODO
    }

}