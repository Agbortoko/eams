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
     $newPassword = $_POST['newPassword'];
     $passwordConfirmation = $_POST['passwordConfirmation'];

     // Invalid request if the id is not submitted
     if(empty($userID) || empty($studentID)) {
        redirect(baseUrl("admin/students.php"), ["error" => "invalidrequest"]);
     }
    else {

        // Check for empty fields
        if(empty($newPassword) || empty($passwordConfirmation)) {
           redirect(baseUrl("admin/student/edit.php"), ["error" => "emptyfield", "student_id" => $studentID]);
        }
        else {
   
               if($newPassword !== $passwordConfirmation) {
                    redirect(baseUrl("admin/student/edit.php"), ["error" => "confirmpassworderror", "student_id" => $studentID]);
                }else { 

                    $hashNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                     // Catch exceptions
                    try {
        
                        $query = "UPDATE users SET `password` = '$hashNewPassword' WHERE id = $userID";
                        $result = mysqli_query($connection, $query);
    
                        if($result) {
                            redirect(baseUrl("admin/student/edit.php"), ["success" => "password_reset_success", "student_id" => $studentID]);
                        }
                        else {
                            redirect(baseUrl("admin/student/edit.php"), ["error" => "password_reset_failed", "student_id" => $studentID]);
                        }
        
                        
                    } catch (\Exception $e) {
        
                        redirect(baseUrl("admin/student/edit.php"), ["error" => "exceptionerror", "student_id" => $studentID]);
                        
                    }

                   
                }
               
        }

    }

}