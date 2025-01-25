<?php
session_start();
include 'includes_db.php';

if (!isset($_SESSION['email'])) {
    header("Location: login_1.php");
    exit();
}

$email = $_SESSION['email'];

// Retrieve user data from the database
$sql = "SELECT * FROM registration WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>User Profile</h1>
    <p>Email: <?php echo $row['email']; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
