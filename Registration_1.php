<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bakery_web";

session_start();
include 'includes_db.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['signupName'];
    $phone = $_POST['signupPhone'];
    $email = $_POST['signupEmail'];
    $address = $_POST['signupAddress'];
    $password = $_POST['signupPassword'];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO registration (name, phone, email, address, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $phone, $email, $address, $password);

    if ($stmt->execute()) {
        header('location: log.html');
        exit;
    } else {
        echo "<script>  alert('Error: '. $stmt->error);</script>";
    }

    $stmt->close();
}

// Close connection
$conn->close();
?>
