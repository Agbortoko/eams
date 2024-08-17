<?php 

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../includes/db_connect.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("admin/batch/index.php"), ["error" => "invalidrequest"]);
}
else {

     // Get submitted values
     $id = $_POST['id'];
     $title = $_POST['title'];
     $description = $_POST['description'];
    
     // Check for empty fields
     if(empty($title) || empty($description) || empty($id)) {
        redirect(baseUrl("admin/batch/edit.php"), ["error" => "emptyfield", "batch_id" => $id]);
     }
     else {

            // Escape all special characters
            $title = mysqli_real_escape_string($connection, $title);
            $description = mysqli_real_escape_string($connection, $description);
        

            
            // Catch exceptions
            try {

                // Update Batch
                $query = "UPDATE batches SET title = '$title', description = '$description' WHERE id = $id";
                $result = mysqli_query($connection, $query);
        
                if($result) {
                    redirect(baseUrl("admin/batch/edit.php"), ["success" => "batch_updated", "batch_id" => $id]);
                }else {
                    redirect(baseUrl("admin/batch/edit.php"), ["error" => "batch_not_updated", "batch_id" => $id]);
                }

                
            } catch (\Exception $e) {

                redirect(baseUrl("admin/batch/edit.php"), ["error" => "exceptionerror", "batch_id" => $id]);
              
            }
   
 
     }

}