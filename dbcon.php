<?php
$servername = "localhost";
$username = "root";
$password = "root";
// root


// Establishing the connection
$conn = new mysqli($servername, $username, $password);

// Checking the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>