<?php 

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../includes/db_connect.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("admin/profile.php"), ["error" => "invalidrequest"]);
}
else {

     // Get submitted values
     $adminID = $_POST['adminID'];
     $firstName = $_POST['firstName'];
     $lastName = $_POST['lastName'];


     // Invalid request if the id is not submitted
     if(empty($adminID)) {
        redirect(baseUrl("admin/profile.php"), ["error" => "invalidrequest"]);
     }
    else {

        // Check for empty fields
        if(empty($firstName) || empty($lastName)) {
           redirect(baseUrl("admin/profile.php"), ["error" => "emptyfield"]);
        }
        else {
   
               // Escape all special characters
                $firstName = mysqli_real_escape_string($connection, $firstName);
                $lastName = mysqli_real_escape_string($connection, $lastName);
               
               
               // Catch exceptions
               try {
   
                   // Update Student Information
                   $query = "UPDATE admins SET first_name = '$firstName', last_name = '$lastName' WHERE id = $adminID";
                   $result = mysqli_query($connection, $query);
           
                   if($result) {
                        session_start();
                        $_SESSION['fullName'] = ucwords($firstName . " " . $lastName);
                       redirect(baseUrl("admin/profile.php"), ["success" => "admin_info_updated"]);
                   }else {
                       redirect(baseUrl("admin/profile.php"), ["error" => "admin_info_not_updated"]);
                   }
   
                   
               } catch (\Exception $e) {
   
                   redirect(baseUrl("admin/profile.php"), ["error" => "exceptionerror"]);
        
               }
      
    
        }

    }

}