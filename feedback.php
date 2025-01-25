<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "bakery_web"; // 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form data variables
$name = $_POST['name'];
$subject = $_POST['subject'];
$email = $_POST['email'];

// Prepare SQL statement to insert data into the feedback table
$sql = "INSERT INTO feedback (name, subject, email) VALUES ('$name', '$subject', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Thanks For Your Feedback";
} else {
    echo "Error" . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
