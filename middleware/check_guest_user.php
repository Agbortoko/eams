<?php 

if(isset($_SESSION['loginID'])) {
    redirect(baseUrl("student"));
}