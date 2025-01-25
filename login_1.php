<?php
session_start();
include 'includes_db.php';

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // TODO: Perform validation on input data
    
    // Check if the user exists in the database
    $sql = "SELECT * FROM 	registration WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['email'] = $email;
            header("Location: profile.php");
        } else {
            echo "Incorrect password!";
        }
    } else {
        echo "User not found!";
    }
}

mysqli_close($conn);
?>
