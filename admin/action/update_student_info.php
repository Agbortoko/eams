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
     $firstName = $_POST['firstName'];
     $lastName = $_POST['lastName'];
     $school = $_POST['school'];
     $department = $_POST['department'];
     $dateOfBirth = $_POST['dateOfBirth'];
     $batch = $_POST['batch'];

     // Invalid request if the id is not submitted
     if(empty($studentID)) {
        redirect(baseUrl("admin/students.php"), ["error" => "invalidrequest"]);
     }
    else {

        // Check for empty fields
        if(empty($firstName) || empty($lastName) || empty($school) || empty($department) || empty($dateOfBirth) || empty($batch)) {
           redirect(baseUrl("admin/student/edit.php"), ["error" => "emptyfield", "student_id" => $studentID]);
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

                   $student = [];
                   // Check if already existing batch already has an attendance
                   // A student with existing attendance batch cannot be modified
                   $sQuery = "SELECT  * FROM students WHERE id = $studentID";
                   $sResult = mysqli_query($connection, $sQuery);

                   if(mysqli_num_rows($sResult) == 1) {
                        $student = mysqli_fetch_assoc($sResult);
                   }
                   $studentBatchID = $student['batch_id'];

                   $aQuery = "SELECT * FROM attendance WHERE student_id = $studentID AND batch_id = $studentBatchID";
                   $aResult = mysqli_query($connection, $aQuery);

                   // If there is an existing record in the attendance database and
                   // the admin tries to change the batch to a different batch
                   if(mysqli_num_rows($aResult) > 0 && $studentBatchID !== $batch) {

                    redirect(baseUrl("admin/student/edit.php"), ["error" => "student_attendance_exists", "student_id" => $studentID]);

                   }else {


                       // Update Student Information
                       $query = "UPDATE students SET first_name = '$firstName', last_name = '$lastName', school = '$school', department = '$department', date_of_birth = '$dateOfBirth', batch_id = $batch WHERE id = $studentID";
                       $result = mysqli_query($connection, $query);
               
                       if($result) {
                           redirect(baseUrl("admin/student/edit.php"), ["success" => "student_info_updated", "student_id" => $studentID]);
                       }else {
                           redirect(baseUrl("admin/student/edit.php"), ["error" => "student_info_not_updated", "student_id" => $studentID]);
                       }

                   }

   
   
                   
               } catch (\Exception $e) {
   
                   redirect(baseUrl("admin/student/edit.php"), ["error" => "exceptionerror", "student_id" => $studentID]);
                 
               }
      
    
        }

    }

}