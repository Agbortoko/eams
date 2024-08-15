<?php

require_once __DIR__ ."/../config/settings.php";
require_once __DIR__ . "/../config/mail.php";


if(!function_exists("siteName")) 
{ 
    function siteName() {
        return getConfig('site_name') ?? null;
    }
}


if(!function_exists("baseUrl")) 
{ 
    function baseUrl(string $path = null, array $query = null) {
        
        if($path !== null && $query !== null) {
            $build = http_build_query($query);
            return getConfig('base_url') . "/" . $path . "?" . $build;
        }
        elseif($path !== null) {
            return getConfig('base_url') . "/" . $path;
        }

        return getConfig('base_url');
    }
}


if(!function_exists("basePath")) 
{ 
    function basePath(string $path = null) {
        if($path !== null) {
            return getConfig('base_path') . "\\" . $path;
        }
        return getConfig('base_path');
    }
}


if(!function_exists("resourceUrl")) 
{ 
    function resourceUrl(string $path = null) {
        if($path !== null) {
            return baseUrl('resources' .  "/" . $path);
        }
        return baseUrl('resources');
    }
}

if(!function_exists("isDevelopment")) 
{ 
    function isDevelopment() {
        if(strtolower(getConfig('app_mode')) == "development") {
            return true;
        }
        return false;
    }
}

if(!function_exists("isProduction")) 
{ 
    function isProduction() {
        if(strtolower(getConfig('app_mode')) == "production") {
            return true;
        }
        return false;
    }
}


if(!function_exists("vite"))
{
    function vite(string $path) {
            if(file_exists(basePath("resources/dist/.vite/manifest.json"))) {

                $manifestPath = basePath("resources/dist/.vite/manifest.json");

                $manifest = json_decode(file_get_contents($manifestPath), true);
                if (isset($manifest["resources/js/app.js"])) {
                    if(strtolower($path) == "js") {
                        return "dist/" . $manifest["resources/js/app.js"]['file'];
                    }
                    elseif(strtolower($path) == "css") {
                        return "dist/". $manifest["resources/js/app.js"]['css'][0];
                    }
                }

            }else {
                return null;
            }
    }
}


if(!function_exists("redirect")) {
    function redirect(string $to, array $query = null) {
        if($query !== null) {
            $httpQuery = http_build_query($query);
            return header("Location: $to?$httpQuery");
        }
        return header("Location: $to");
    }
}


if(!function_exists("sendMail")) {
    function sendMail($to, $subject, $message) {
        if (function_exists('usePHPMailer')) {
            return usePHPMailer($to, $subject, $message);
        }
    }
}


if(!function_exists("mailTemplate")) {
    function mailTemplate($title, $greeting, $body) {
    
        $template =   <<<MESSAGE
               <!DOCTYPE html>
               <html lang="en">
               <head>
                   <meta charset="UTF-8">
                   <meta name="viewport" content="width=device-width, initial-scale=1.0">
                   <title>Message</title>
                   <style>
                       body {
                           font-family: Arial, sans-serif;
                           background-color: #f4f4f4;
                           margin: 0;
                           padding: 0;
                           color: #333;
                       }
                       .container {
                           width: 100%;
                           max-width: 600px;
                           margin: 100px auto 0 auto;
                           background-color: #ffffff;
                           padding: 20px;
                           border-radius: 8px;
                       }
                       .header {
                           background-color: #fcb215;
                           color: #ffffff;
                           padding: 10px;
                           text-align: center;
                           border-top-left-radius: 8px;
                           border-top-right-radius: 8px;
                       }
                       .body {
                           padding: 20px;
                           line-height: 1.6;
                       }
                       .footer {
                           background-color: #f4f4f4;
                           text-align: center;
                           padding: 10px;
                           border-bottom-left-radius: 8px;
                           border-bottom-right-radius: 8px;
                       }
                       .button {
                           display: inline-block;
                           margin: 0 auto;
                           padding: 10px 20px;
                           color: #ffffff;
                           background-color: #fcb215;
                           text-decoration: none;
                           border-radius: 5px;
                       }

                       .button:hover{
                           background-color: #d18f1c;
                        }
                   </style>
               </head>
               <body>
                   <div class="container">
                       <div class="header">
                           <h1>$title</h1>
                       </div>
                       <div class="body">
                           <p>$greeting</p>
                           <p>$body</p>
                       </div>
                       <div class="footer">
                           <p>&copy; 2024 Eshosys. All rights reserved.</p>
                       </div>
                   </div>
               </body>
               </html>
               MESSAGE;
       
       
           return $template;
       }


    if(!function_exists('toast')) {

        /**
         * Show Toastr Notifications
         *
         * @param string $key
         * @param string $value
         * @param string $message
         * @return null|string
         */
        function toast(string $key, string $value, string $message) {

           if(isset($_GET[$key]) && $_GET[$key] == $value){
              $notice = <<<NOTICE
                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            toastr.$key("$message");
                        });
                    </script>
              NOTICE;

              return $notice;
           }

           return null;
              
        }
    }


    if(!function_exists("generateToken")) {

        function generateToken() {
            return strtoupper(uniqid().time());
        }

    }
       
}