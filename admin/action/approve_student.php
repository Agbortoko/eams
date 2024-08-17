<?php 

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../includes/db_connect.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("admin/batch/index.php"), ["error" => "invalidrequest"]);
}
else {

     // Get submitted values
     $batch = $_POST['batch'];
     $student = $_POST['student'];
    
     // Check for empty fields
     if(empty($batch) || empty($student)) {
        redirect(baseUrl("admin/batch/index.php"), ["error" => "invalidrequest"]);
     }
     else {

            
            // Catch exceptions
            try {

                // Update student
                $query = "UPDATE students SET batch_id = $batch, is_approved = 1 WHERE id = $student";
                $result = mysqli_query($connection, $query);
        
                if($result) {
                    redirect(baseUrl("admin/approve.php"), ["success" => "student_approved"]);
                }else {
                    redirect(baseUrl("admin/approve_student.php"), ["error" => "student_not_approved", "student_id" => $student]);
                }

                
            } catch (\Exception $e) {

                redirect(baseUrl("admin/approve_student.php"), ["error" => "exceptionerror", "student_id" => $student]);
              
            }
   
 
     }

}