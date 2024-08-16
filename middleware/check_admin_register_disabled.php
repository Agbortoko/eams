<?php 
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/db_connect.php';

    $query = "SELECT value FROM settings WHERE name = 'admin_registration'";
    $result = mysqli_query($connection, $query);

    if(mysqli_num_rows($result) == 1) {
        $setting = mysqli_fetch_assoc($result);
        $adminRegistration = $setting["value"];

        // Redirect to home page if admin registration is blocked
        if($adminRegistration == 0) {
            redirect(baseUrl());
        }
    }
