<?php 

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../includes/db_connect.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("student/profile.php"), ["error" => "invalidrequest"]);
}
else {

     // Get submitted values
     $userID = $_POST['userID'];
     $email = $_POST['email'];

     // Invalid request if the id is not submitted
     if(empty($userID)) {
        redirect(baseUrl("student/profile.php"), ["error" => "invalidrequest"]);
     }
    else {

        // Check for empty fields
        if(empty($email)) {
           redirect(baseUrl("student/profile.php"), ["error" => "emptyfield"]);
        }
        else {
   
               // Escape all special characters
               $email = mysqli_real_escape_string($connection, $email);
               
               
               // Catch exceptions
               try {
   
                   // Update Student User Account
                   $query = "UPDATE users SET email = '$email', email_verified_at = NULL WHERE id = $userID";
                   $result = mysqli_query($connection, $query);
           
                   if($result) {
                       redirect(baseUrl("student/profile.php"), ["success" => "user_account_updated"]);
                   }else {
                       redirect(baseUrl("student/profile.php"), ["error" => "user_account_not_updated"]);
                   }
   
                   
               } catch (\Exception $e) {
   
                   redirect(baseUrl("student/profile.php"), ["error" => "exceptionerror"]);
                 
               }
      
    
        }

    }

}