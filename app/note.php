<?php
require ('config.php');
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
$title = $_GET['title'];
$note = $_POST['note'];
print_r($title);
?>

