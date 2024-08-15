<?php 

if(!isset($_SESSION['loginID']) && !isset($_SESSION['role'])) {
    redirect(baseUrl("auth/login.php"));
}