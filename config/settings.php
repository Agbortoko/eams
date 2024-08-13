<?php

$siteConfig = [
    'site_name' => 'Eschosys AMS',
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



