<?php 
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../includes/db_connect.php';

// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("admin/settings.php"), ["error" => "invalidrequest"]);
}
else {

     // Get submitted values
     $siteName = $_POST['siteName'];
     $adminEmail = $_POST['adminEmail'];
     $baseUrl = $_POST['baseUrl'];
     $adminRegistration = $_POST['adminRegistration'];
     $appMode = $_POST['appMode'];
    
     // Check for empty fields
     if(empty($siteName) || empty($adminEmail) || empty($baseUrl) || empty($adminRegistration) || empty($appMode)) {
        redirect(baseUrl("admin/settings.php"), ["error" => "emptyfield"]);
     }
     else {

            // Escape all special characters
            $siteName = mysqli_real_escape_string($connection, $siteName);
            $adminEmail = mysqli_real_escape_string($connection, $adminEmail);
            $baseUrl = mysqli_real_escape_string($connection, $baseUrl);

            if($adminRegistration == "activated") {
                $isActive = 1;
            }
            else{
                $isActive = 0;
            }
          

            $config = [
                'site_name' => $siteName,
                'app_mode' => $appMode,
                'admin_email' => $adminEmail,
                'base_url' => $baseUrl,     
                'admin_registration' => $isActive
            ];
            
            // Catch exceptions
            try {

                foreach($config as $key => $value) {

                       // Update table
                       $query = "UPDATE settings SET `value` = '$value' WHERE `name` = '$key'";
                       $result = mysqli_query($connection, $query);
               
                       if($result) {
                           redirect(baseUrl("admin/settings.php"), ["success" => "settings_saved"]);
                       }else {
                           redirect(baseUrl("admin/settings.php"), ["error" => "settings_not_saved"]);
                       }

                }

                
            } catch (\Exception $e) {

               // redirect(baseUrl("admin/settings.php"), ["error" => "exceptionerror"]);
                dump($e->getMessage());
                exit;
            }
   
 
     }

}