<?php 
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../includes/db_connect.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("auth/admin_details.php"), ["error" => "invalidrequest"]);
}
else {

     // Get submitted values
     $firstName = $_POST['firstName'];
     $lastName = $_POST['lastName'];
     $userID = $_SESSION['loginID'];
    
     // Check for empty fields
     if(empty($firstName) || empty($lastName)) {
        redirect(baseUrl("auth/admin_details.php"), ["error" => "emptyfield"]);
     }
     else {

            // Escape all special characters
            $firstName = mysqli_real_escape_string($connection, $firstName);
            $lastName = mysqli_real_escape_string($connection, $lastName);
            
            // Catch exceptions
            try {

                 // Create User
                    $query = "INSERT INTO admins (user_id, first_name, last_name) VALUES($userID,'$firstName','$lastName')";
                    $result = mysqli_query($connection, $query);
            
                    if($result) {
                        redirect(baseUrl("admin"), ["success" => "admin_details_saved"]);
                    }else {
                        redirect(baseUrl("auth/admin_details.php"), ["error" => "admin_details_save_failed"]);
                    }
                
            } catch (\Exception $e) {

                redirect(baseUrl("auth/admin_details.php"), ["error" => "exceptionerror"]);
            }
   
 
     }

}