<?php

$siteConfig = [
    'site_name' => 'Eschosys Attendance Management System',
    'base_url' => 'http://localhost/eams',     
    'admin_email' => 'info@localhost.com'
];


if(!function_exists("getConfig"))
{ 
    function getConfig($key) {
        global $siteConfig;
        return $siteConfig[$key] ?? null; 
    }
}


if(!function_exists("baseUrl")) 
{ 
    function baseUrl(string $path = null) {
        if($path !== null) {
            return getConfig('base_url') . "/" . $path;
        }
        return getConfig('base_url');
    }
}

