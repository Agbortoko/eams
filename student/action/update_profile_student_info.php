<?php 

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../includes/db_connect.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("student/profile.php"), ["error" => "invalidrequest"]);
}
else {

     // Get submitted values
     $studentID = $_POST['studentID'];
     $firstName = $_POST['firstName'];
     $lastName = $_POST['lastName'];
     $school = $_POST['school'];
     $department = $_POST['department'];
     $dateOfBirth = $_POST['dateOfBirth'];

     // Invalid request if the id is not submitted
     if(empty($studentID)) {
        redirect(baseUrl("student/profile.php"), ["error" => "invalidrequest"]);
     }
    else {

        // Check for empty fields
        if(empty($firstName) || empty($lastName) || empty($school) || empty($department) || empty($dateOfBirth)) {
           redirect(baseUrl("student/profile.php"), ["error" => "emptyfield"]);
        }
        else {
   
               // Escape all special characters
                $firstName = mysqli_real_escape_string($connection, $firstName);
                $lastName = mysqli_real_escape_string($connection, $lastName);
                $school = mysqli_real_escape_string($connection, $school);
                $department = mysqli_real_escape_string($connection, $department);
                $dateOfBirth = mysqli_real_escape_string($connection, $dateOfBirth);
               
               
               // Catch exceptions
               try {
   
                   // Update Student Information
                   $query = "UPDATE students SET first_name = '$firstName', last_name = '$lastName', school = '$school', department = '$department', date_of_birth = '$dateOfBirth' WHERE id = $studentID";
                   $result = mysqli_query($connection, $query);
           
                   if($result) {
                        session_start();
                        $_SESSION['fullName'] = ucwords($firstName . " " . $lastName);
                       redirect(baseUrl("student/profile.php"), ["success" => "student_info_updated"]);
                   }else {
                       redirect(baseUrl("student/profile.php"), ["error" => "student_info_not_updated"]);
                   }
   
                   
               } catch (\Exception $e) {
   
                   redirect(baseUrl("student/profile.php"), ["error" => "exceptionerror"]);
                 
               }
      
    
        }

    }

}