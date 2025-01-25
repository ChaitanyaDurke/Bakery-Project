<?php
session_start();
include 'includes_db.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}

// Handle order form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $order_details = $_POST['order_details'];
    $user_email = $_SESSION['email'];
    
    // TODO: Perform validation on input data
    
    // Insert order data into the database
    $sql = "INSERT INTO orders (user_email, order_details) VALUES ('$user_email', '$order_details')";
    if (mysqli_query($conn, $sql)) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
