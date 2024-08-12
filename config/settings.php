<?php

$siteConfig = [
    'site_name' => 'Eschosys Attendance Management System',
    'base_url' => 'http://localhost/attendance',     
    'admin_email' => 'info@localhost.com'
];


if(!function_exists("getConfig")) { 

    function getConfig($key) {
        global $siteConfig;
        return $siteConfig[$key] ?? null; 
    }
}