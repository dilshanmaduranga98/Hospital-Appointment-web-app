<?php
$host = 'localhost'; 
$dbUsername = 'root'; 
$dbPassword = ''; 
$dbName = 'crud'; 

$connection = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

if (!$connection) {
  die('Database connection failed: ' . mysqli_connect_error());
}

$user_id = $_POST['User_ID'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$dob = $_POST['dob'];
$street1 = $_POST['street1'];
$street2 = $_POST['street2'];
$city = $_POST['city'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];


$query = "UPDATE user SET 
          first_name = '$first_name',
          last_name = '$last_name',
          dob = '$dob',
          street1 = '$street1',
          street2 = '$street2',
          city = '$city',
          mobile_number = '$mobile',
          email = '$email'
          WHERE User_ID = '$user_id'";

if (mysqli_query($connection, $query)) {
  echo "<script>window.opener.location.reload();</script>";
  echo "<script>window.close();</script>";
  exit();
} else {
  echo 'Error updating data: ' . mysqli_error($connection);
}

mysqli_close($connection);
?>
