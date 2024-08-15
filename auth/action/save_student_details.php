<?php 
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../includes/db_connect.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("auth/register.php"), ["error" => "invalidrequest"]);
}
else {

     // Get submitted values
     $firstName = $_POST['firstName'];
     $lastName = $_POST['lastName'];
     $school = $_POST['school'];
     $department = $_POST['department'];
     $dateOfBirth = $_POST['dateOfBirth'];
    
     // Check for empty fields
     if(empty($firstName) || empty($lastName) || empty($school) || empty($department) || empty($dateOfBirth)) {
        redirect(baseUrl("auth/student_details.php"), ["error" => "emptyfield"]);
     }
     else {

            // Escape all special characters
            $firstName = mysqli_real_escape_string($connection, $firstName);
            $lastName = mysqli_real_escape_string($connection, $lastName);
            $school = mysqli_real_escape_string($connection, $school);
            $department = mysqli_real_escape_string($connection, $department);
            $dateOfBirth = mysqli_real_escape_string($connection, $dateOfBirth);
            $userID = $_SESSION['loginID'];
            
            // Catch exceptions
            try {

                 // Create User
                    $query = "INSERT INTO students(user_id, first_name, last_name, school, department, date_of_birth) VALUES($userID,'$firstName', '$lastName', '$school', '$department', '$dateOfBirth')";
                    $result = mysqli_query($connection, $query);
            
                    if($result) {
                        redirect(baseUrl("student"), ["success" => "student_details_saved"]);
                    }else {
                        redirect(baseUrl("auth/student_details.php"), ["error" => "student_details_save_failed"]);
                    }
                
            } catch (\Exception $e) {

                redirect(baseUrl("auth/student_details.php"), ["error" => "exceptionerror"]);
                //dump($e->getMessage());
            }
   
 
     }

}