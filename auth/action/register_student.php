<?php 

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../includes/db_connect.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("auth/register.php"), ["error" => "invalidrequest"]);
}
else {

     // Get submitted values
     $email = $_POST['email'];
     $password = $_POST['password'];
    
     // Check for empty fields
     if(empty($email) || empty($password)) {
        redirect(baseUrl("auth/register.php"), ["error" => "emptyfield"]);
     }
     else {

        // Validate email
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
            redirect(baseUrl("auth/register.php"), ["error" => "invalidemail"]);
        }
        else {

            // Hash user password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // Escape all special characters
            $escapedEmail = mysqli_real_escape_string($connection, $email);
            
            // Catch exceptions
            try {

                 // Create User
                    $query = "INSERT INTO users(email, password) VALUES('$escapedEmail', '$hashedPassword')";
                    $result = mysqli_query($connection, $query);
            
                    if($result) {
                        redirect(baseUrl("auth/login.php"), ["success" => "user_registered"]);
                    }else {
                        redirect(baseUrl("auth/register.php"), ["error" => "user_not_registered"]);
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