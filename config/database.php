<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "";

$connection = mysqli_connect($hostname, $username, $password, $database);

if(!$connection) {
    die("Error Connecting to Database: " . mysqli_connect_error());
}