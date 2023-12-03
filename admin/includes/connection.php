<?php
// PRODUCTION
$hostname = "localhost";
$username = "u442267587_biahs";
$database = "u442267587_biahs";
$password = "Biahs123!@#123";

// DEVELOPMENT
// $hostname = "localhost";
// $username = "root";
// $database = "biahs";
// $password = "";

// Validate Connection
$connection = new mysqli($hostname, $username, $password, $database);
if ($connection->connect_error) {
    die("Error 404: " . $connection->connect_error);
}
