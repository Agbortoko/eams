<?php 
require_once __DIR__ . '/../../vendor/autoload.php';
require_once basePath('includes/db_connect.php');

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("auth/register_admin.php"), ["error" => "invalidrequest"]);
}
else {

     // Get submitted values
     $email = $_POST['email'];
     $password = $_POST['password'];
     $passwordConfirmation = $_POST['passwordConfirmation'];
    
     // Check for empty fields
     if(empty($email) || empty($password)) {
        redirect(baseUrl("auth/register_admin.php"), ["error" => "emptyfield"]);
     }
     else {

        // Password Confirmation

        if($password !== $passwordConfirmation) {
            redirect(baseUrl("auth/register_admin.php"), ["error" => "confirmpassworderror"]);
        }
        else {

            // Validate email
            if(filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                redirect(baseUrl("auth/register_admin.php"), ["error" => "invalidemail"]);
            }
            else {
    
                // Hash user password
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                // Escape all special characters
                $escapedEmail = mysqli_real_escape_string($connection, $email);

                $isAdmin = true;
                
                // Catch exceptions
                try {
    
                     // Create User
                        $query = "INSERT INTO users(email, password, is_admin) VALUES('$escapedEmail', '$hashedPassword', $isAdmin)";
                        $result = mysqli_query($connection, $query);
                
                        if($result) {
                            redirect(baseUrl("auth/login.php"), ["success" => "user_registered"]);
                        }else {
                            redirect(baseUrl("auth/register_admin.php"), ["error" => "user_not_registered"]);
                        }
                    
                } catch (\Exception $e) {
    
                    // Duplicate email entry
                    if($e->getCode() == 1062) {
                        redirect(baseUrl("auth/register_admin.php"), ["error" => "emailalreadyexist"]);
                    }
                    else {
                        redirect(baseUrl("auth/register_admin.php"), ["error" => "exceptionerror"]);
                    }
    
                    //dump($e->getMessage());
                }
            }

        }

     }

}