<?php
require ('config.php');
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
$Title = $_GET['Title'];
$Text = $_POST['Text'];
$Author = $_POST['Author'];

$sql = "INSERT INTO NoteData (Title, Text, Author)
VALUES ('$Title', '$Text', '$Author')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

