<?php
session_start();

$host = 'localhost'; 
$dbUsername = 'root'; 
$dbPassword = ''; 
$dbName = 'crud'; 

$connection = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

if (!$connection) {
  die('Database connection failed: ' . mysqli_connect_error());
}

function sanitize($data) {
  global $connection;
  return mysqli_real_escape_string($connection, trim($data));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = sanitize($_POST['user_name']);
  $password = sanitize($_POST['user_password']);

  $query = "SELECT * FROM userregister WHERE user_name='$username'";

  $result = mysqli_query($connection, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hashedPassword = $row['user_password'];

    if (password_verify($password, $hashedPassword)) {
      $_SESSION['username'] = $username;
      header("Location: Index.php");
      exit();
    } else {
      echo "Invalid username or password.";
    }
  } else {
    header("Location: Error.php");
  }
}

mysqli_close($connection);
?>
