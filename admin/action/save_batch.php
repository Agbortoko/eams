<?php 

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../includes/db_connect.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("admin/batch/add.php"), ["error" => "invalidrequest"]);
}
else {

     // Get submitted values
     $title = $_POST['title'];
     $description = $_POST['description'];
    
     // Check for empty fields
     if(empty($title) || empty($description)) {
        redirect(baseUrl("admin/batch/add.php"), ["error" => "emptyfield"]);
     }
     else {

            // Escape all special characters
            $title = mysqli_real_escape_string($connection, $title);
            $description = mysqli_real_escape_string($connection, $description);
        

            
            // Catch exceptions
            try {

                // Save Batch
                $query = "INSERT INTO batches(title, description) VALUES('$title', '$description')";
                $result = mysqli_query($connection, $query);
        
                if($result) {
                    redirect(baseUrl("admin/batch/index.php"), ["success" => "batch_created"]);
                }else {
                    redirect(baseUrl("admin/batch/add.php"), ["error" => "batch_not_created"]);
                }

                
            } catch (\Exception $e) {

                redirect(baseUrl("admin/batch/add.php"), ["error" => "exceptionerror"]);
              
            }
   
 
     }

}