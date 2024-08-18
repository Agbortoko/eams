<?php 

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../includes/db_connect.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("admin/students.php"), ["error" => "invalidrequest"]);
}
else {

     // Get submitted values
     $userID = $_POST['userID'];
     $studentID = $_POST['studentID'];
     $email = $_POST['email'];

     // Invalid request if the id is not submitted
     if(empty($userID) || empty($studentID)) {
        redirect(baseUrl("admin/students.php"), ["error" => "invalidrequest"]);
     }
    else {

        // Check for empty fields
        if(empty($email)) {
           redirect(baseUrl("admin/student/edit.php"), ["error" => "emptyfield", "student_id" => $studentID]);
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
                       redirect(baseUrl("admin/student/edit.php"), ["success" => "user_account_updated", "student_id" => $studentID]);
                   }else {
                       redirect(baseUrl("admin/student/edit.php"), ["error" => "user_account_not_updated", "student_id" => $studentID]);
                   }
   
                   
               } catch (\Exception $e) {
   
                   redirect(baseUrl("admin/student/edit.php"), ["error" => "exceptionerror", "student_id" => $studentID]);
                 
               }
      
    
        }

    }

}