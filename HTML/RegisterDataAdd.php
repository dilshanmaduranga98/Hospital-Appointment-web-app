<?php
$host = 'localhost'; 
$dbUsername = 'root'; 
$dbPassword = ''; 
$dbName = 'crud'; 

$connection = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

if (!$connection) {
  die('Database connection failed: ' . mysqli_connect_error());
}

$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];
$confirm_password = $_POST['confirm_password'];

if ($user_password === $confirm_password) {
    $hashedPassword = password_hash($user_password, PASSWORD_DEFAULT);

    $query = "INSERT INTO userregister (user_name, user_password, confirm_password)
              VALUES ('$user_name', '$hashedPassword', '$confirm_password')";

    if (mysqli_query($connection, $query)) {
      header("Location: Login.php");
      exit();
    } else {
      echo 'Error inserting data: ' . mysqli_error($connection);
    }
} else {
    header("Location: Error.php");
    exit();
}

mysqli_close($connection);
?>
