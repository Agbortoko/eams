<?php 

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../includes/db_connect.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("admin/batch/add.php"), ["error" => "invalidrequest"]);
}
else {

     // Get submitted values
     $batchID = $_POST['id'];
    
     // Check for empty fields
     if(empty($batchID)) {
        redirect(baseUrl("admin/batch/index.php"), ["error" => "invalidrequest"]);
     }
     else {

           
            // Catch exceptions
            try {
                // Check if any student is assigned to a batch before deleting

                $query = "SELECT * FROM students WHERE batch_id = $batchID";
                $result = mysqli_query($connection, $query);

                if(mysqli_num_rows($result) == 0) {

                    // Delete Batch
                    $query = "DELETE FROM batches WHERE id = $batchID";
                    $result = mysqli_query($connection, $query);
            
                    if($result) {
                        redirect(baseUrl("admin/batch/index.php"), ["success" => "batch_deleted"]);
                    }else {
                        redirect(baseUrl("admin/batch/index.php"), ["error" => "batch_not_deleted"]);
                    }

                }
                else {
                    redirect(baseUrl("admin/batch/index.php"), ["error" => "cannot_delete_batch"]);
                }


                
            } catch (\Exception $e) {

                redirect(baseUrl("admin/batch/index.php"), ["error" => "exceptionerror"]);
              
            }
   
 
     }

}