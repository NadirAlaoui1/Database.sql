<?php
$servername = "localhost";
$username = "admin";
$password = "P4OBZMFY4j98";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>

