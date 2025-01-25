<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bakery_web";

$con = new mysqli($servername, $username, $password, $dbname);
$getEmail = $_POST['email'];
$getPassword = $_POST['pass'];
$getEmail = mysqli_real_escape_string($con, $getEmail);
$getPassword = mysqli_real_escape_string($con, $getPassword);
$hash = password_hash($getPassword, PASSWORD_ARGON2ID);

$getEmail = mysqli_real_escape_string($con, $getEmail);

$sql = "SELECT email,password FROM registration WHERE email = '$getEmail'";

$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result)>0)
{
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hash = $row['password'];
    // $valid = password_verify($getPassword, $hash);
    if($getPassword == $hash)
    {
        header('location: bakery.html');
        exit;
    }
    else
    {
        echo "Invalid";
    }
} else {
    echo "Invalid email.";
}

}
else
{
    echo "This email is not registered!";
}

$con->close();


?>