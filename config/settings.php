<?php

$siteConfig = [
    'site_name' => 'Eschosys AMS',
    'base_path' => dirname(__DIR__, 1),
    'base_url' => 'http://localhost/eams',     
    'admin_email' => 'info@localhost.com',
    'app_mode' => 'production'
];

if(!function_exists("getConfig"))
{ 
    function getConfig($key) {
        global $siteConfig;
        return $siteConfig[$key] ?? null; 
    }
}



