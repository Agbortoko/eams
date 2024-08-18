<?php 

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../includes/db_connect.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("admin/students.php"), ["error" => "invalidrequest"]);
}
else {

     // Get submitted values
     $studentID = $_POST['studentID'];
     $userID = $_POST['userID'];
    
     // Check for empty fields
     if(empty($studentID) || empty($userID)) {
        redirect(baseUrl("admin/students.php"), ["error" => "invalidrequest"]);
     }
     else {

           
            // Catch exceptions
            try {
                    // Delete Student
                    $deleteStudentQuery = "DELETE FROM students WHERE id = $studentID";
                    $deleteStudent = mysqli_query($connection, $deleteStudentQuery);

                    // Delete Student User Account Query
                    $deleteUserQuery = "DELETE FROM users WHERE id = $userID";
                    $deleteUserAccount = mysqli_query($connection, $deleteUserQuery);
            
                    if($deleteStudent && $deleteUserAccount) {
                        redirect(baseUrl("admin/students.php"), ["success" => "student_deleted"]);
                    }else {
                        redirect(baseUrl("admin/students.php"), ["error" => "student_not_deleted"]);
                    }

    
            } catch (\Exception $e) {

                redirect(baseUrl("admin/students.php"), ["error" => "exceptionerror"]);
              
            }
   
 
     }

}