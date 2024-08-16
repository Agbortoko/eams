<?php 

if(isset($_SESSION['loginID']) && isset($_SESSION['role'])) {
    if($_SESSION['role'] !== "admin") {
        redirect(baseUrl());
    }
}