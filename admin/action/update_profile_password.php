<?php 

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../includes/db_connect.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("admin/profile.php"), ["error" => "invalidrequest"]);
}
else {

     // Get submitted values
     $userID = $_POST['userID'];
     $oldPassword = $_POST['oldPassword'];
     $newPassword = $_POST['newPassword'];
     $passwordConfirmation = $_POST['passwordConfirmation'];

     // Invalid request if the id is not submitted
     if(empty($userID)) {
        redirect(baseUrl("admin/profile.php"), ["error" => "invalidrequest"]);
     }
    else {

        // Check for empty fields
        if(empty($oldPassword) || empty($newPassword) || empty($passwordConfirmation)) {
           redirect(baseUrl("admin/profile.php"), ["error" => "emptyfield"]);
        }
        else {
   
               if($newPassword !== $passwordConfirmation) {
                    redirect(baseUrl("admin/profile.php"), ["error" => "confirmpassworderror"]);
                }else { 

                    // Check if old password matches what's in the database
                    $query = "SELECT password FROM users WHERE id = $userID";
                    $result = mysqli_query($connection, $query);

                    if(mysqli_num_rows($result) !== 1) {

                        redirect(baseUrl("admin/profile.php"), ["error" => "invalidrequest"]);

                    }else {

                        $adminInfo = mysqli_fetch_assoc($result);

                        // verify if old password and db password match

                        if(password_verify($oldPassword, $adminInfo['password'])) {

                            $hashNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        
                             // Catch exceptions
                            try {
                
                                $query = "UPDATE users SET `password` = '$hashNewPassword' WHERE id = $userID";
                                $result = mysqli_query($connection, $query);
            
                                if($result) {
                                    redirect(baseUrl("admin/profile.php"), ["success" => "password_reset_success"]);
                                }
                                else {
                                    redirect(baseUrl("admin/profile.php"), ["error" => "password_reset_failed"]);
                                }
                
                                
                            } catch (\Exception $e) {
                
                                redirect(baseUrl("admin/profile.php"), ["error" => "exceptionerror"]);
                                
                            }


                        }else {
                            redirect(baseUrl("admin/profile.php"), ["error" => "invalidoldpassword"]);
                        }


                    }


                   
                }
               
        }

    }

}