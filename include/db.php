<?php

$hostname = "localhost:3306";
$username = "u442267587_biahs";
$database = "u442267587_biahs";
$password = "Biahs123!@#123";

// Development
// $hostname = "localhost";
// $username = "root";
// $database = "sewa_hospital";
// $password = "";

// Validate Connection
$connection = new mysqli($hostname, $username, $password, $database);
if ($connection->connect_error) {
    die("Error 404: " . $connection->connect_error);
}