<?php

$hostname = "localhost:3306";
$username = "drneerajbora_drneerajbora";
$database = "drneerajbora_biahs";
$password = "Darthvader@order66";

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