<?php

// Establish database connection
$servername = "localhost";
$username = "root";
$password = "Nijin.9202";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>