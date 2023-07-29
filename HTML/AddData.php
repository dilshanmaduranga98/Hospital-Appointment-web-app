<?php
$host = 'localhost'; 
$dbUsername = 'root'; 
$dbPassword = ''; 
$dbName = 'crud'; 

$connection = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

if (!$connection) {
  die('Database connection failed: ' . mysqli_connect_error());
}


$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$street1 = $_POST['street1'];
$street2 = $_POST['street2'];
$city = $_POST['city'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];


$query = "INSERT INTO user(first_name, last_name, dob, street1, street2, city, mobile_number, email)
          VALUES ('$first_name', '$last_name', '$dob', '$street1', '$street2', '$city', '$mobile', '$email')";

if (mysqli_query($connection, $query)) {
  header("Location: profile.php");
  exit();
} else {
  echo 'Error inserting data: ' . mysqli_error($connection);
}


mysqli_close($connection);
?>
