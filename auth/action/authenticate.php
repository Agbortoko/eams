<?php 

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../includes/db_connect.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("auth/login.php"), ["error" => "invalidrequest"]);
}
else {

     // Get submitted values
     $email = $_POST['email'];
     $password = $_POST['password'];
    
     // Check for empty fields
     if(empty($email) || empty($password)) {
        redirect(baseUrl("auth/login.php"), ["error" => "emptyfield"]);
     }
     else {

        // Validate email
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            redirect(baseUrl("auth/login.php"), ["error" => "invalidemail"]);
        }
        else {

            // Hash user password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // Escape all special characters
            $escapedEmail = mysqli_real_escape_string($connection, $email);
            
            // Catch exceptions
            try {

                    // Check User with email
                    $query = "SELECT * FROM users WHERE email = '$email'";
                    $result = mysqli_query($connection, $query);
            
                    // Check if you received 1 result from the database
                    if(mysqli_num_rows($result) == 1) {

                        $user = mysqli_fetch_assoc($result); // Getting the users records as an associative array
                        $hashedPassword = $user['password']; // Get the user's hashed password

                         // Verify Password
                        if(password_verify($password, $hashedPassword)) {

                            // Start the session and save some user details in the session
                            session_start();
                            $_SESSION['loginID'] = $user['id'];
                            $_SESSION['role'] = ($user['is_admin'] == 0) ? "student" : "admin";

                            // Check role and redirect to dashboard

                            if($user['is_admin'] == 0) {
                                redirect(baseUrl("student"), ["success" => "loginsuccess"]);
                            }
                            elseif($user['is_admin'] == 1) {
                                redirect(baseUrl("admin"), ["success" => "loginsuccess"]);
                            }

                        }
                        else {
                            redirect(baseUrl("auth/login.php"), ["error" => "invalidcredentials"]);
                        }
            
                    }else {
                        redirect(baseUrl("auth/login.php"), ["error" => "invalidcredentials"]);
                    }
                
            } catch (\Exception $e) {

                // Duplicate email entry
                if($e->getCode() == 1062) {
                    redirect(baseUrl("auth/register.php"), ["error" => "emailalreadyexist"]);
                }
                else {
                    redirect(baseUrl("auth/register.php"), ["error" => "exceptionerror"]);
                }

                //dump($e->getMessage());
            }
        }
 
 
     }

}