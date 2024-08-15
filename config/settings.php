<?php

if(!function_exists("getConfig"))
{ 
    function getConfig($key) {

        $siteConfig = [
            'site_name' => 'Eschosys AMS',
            'base_path' => dirname(__DIR__, 1),
            'base_url' => 'http://localhost/eams',     
            'admin_email' => 'info@eschosys.com',
            'app_mode' => 'production' // development or production
        ];

        return $siteConfig[$key] ?? null; 
    }
}



