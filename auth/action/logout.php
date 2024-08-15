<?php 

require __DIR__ . '/../../vendor/autoload.php';


// Check valid request
if(strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    redirect(baseUrl("index.php"), ["error" => "invalidrequest"]);
}
else {

    session_start();
    
    unset($_SESSION['loginID']);
    session_unset();
    session_reset();
    session_destroy();

    redirect(baseUrl("auth/login.php"), ["success" => "logoutsuccess"]);
}