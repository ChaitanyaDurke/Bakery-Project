<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Welcome to the website!</h1>
    <?php include 'includes_db.php'; ?>
    <a href="register.php">Register</a> | <a href="login.php">Login</a>
</body>
</html>