<?php

$dbConfig = [
    'host' => 'localhost',
    'username' => 'root',     
    'password' => '',     
    'database' => '',   
];


function dbConnect()
{
    global $dbConfig;

    // Create a connection using MySQLi (Procedural)
    $connection = mysqli_connect(
        $dbConfig['host'],
        $dbConfig['username'],
        $dbConfig['password'],
        $dbConfig['database']
    );

    // Check the connection
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $connection;
}