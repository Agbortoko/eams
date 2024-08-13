<?php

require __DIR__ .'/../config/settings.php';

if(!function_exists("siteName")) 
{ 
    function siteName() {
        return getConfig('site_name') ?? null;
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
