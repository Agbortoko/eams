<?php 

if(!isset($_SESSION['loginID'])) {
    redirect(baseUrl("auth/login.php"));
}