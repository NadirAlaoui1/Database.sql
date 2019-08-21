<?php
require ('config.php');
$conn = new mysqlie($servername, $username, $password, $dbname);

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
//validate
if (empty($author)) {
  $feedback['author'] = "Author may not be empty.";
}
if (empty($title)) {
    $feedback['title'] = "Title may not be empty.";
} 
if (empty($text)) {
    $feedback['text'] = "Text may not be empty.";
} 

// sql queries to select 
if ($select === "all"){
    $sql = "SELECT Title, Author, Note FROM NoteData";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Title: " . $row["Title"]. " - Name: " . $row["Author"]. "<br>";
    }
} else {
    echo "0 results";
}
} elseif ($select == TRUE) {
    $sql = "SELECT Title, Author, Note FROM NoteData WHERE Title = '$select'";
    $result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Title: " . $row["Title"]. " - Name: " . $row["Author"]. "<br> Note: " . $row["Note"]. "<br>";
    }
} else {
    echo "0 results";
}
}


} elseif (isset($_POST['update'])) {
    $sql="UPDATE notes
    SET content = '$update'
    WHERE Title = '$title'";
    if ($conn->query($sql) === TRUE) {
        return "Succesfully updated ".$title;
        } else {
        return "Error: " . $sql . "<br>" . $conn->error;
        }

        echo json_encode($feedback);


$conn->close();
?>