<?php
require ('config.php');
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
$Title = filter_var($_GET['Title'], FILTER_SANITIZE_STRING);
$Text = filter_var($_POST['Text'], FILTER_SANITIZE_STRING);
$Author = filter_var($_POST['Author'], FILTER_SANITIZE_STRING);



$sql = "INSERT INTO NoteData (Title, Text, Author)
VALUES ('$Title', '$Text', '$Author')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

