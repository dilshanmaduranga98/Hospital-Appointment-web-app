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

$username = $_SESSION['username'];

$query = "SELECT User_ID FROM userregister WHERE user_name = '$username'";
$result = mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
  $user_id = $row['User_ID'];

$patient_name = $_POST['patient_name'];
$doctor_name = $_POST['doctor_name'];
$specialist = $_POST['specialist'];
$appointment_time = $_POST['appointment_time'];
$mobile_number = $_POST['mobile_number'];
$email = $_POST['email'];



$query = "INSERT INTO appointment (User_ID, appointment_ID, patient_name, doctor_name, specialist, appointment_time, mobile_number, email)
VALUES ('$user_id', NULL, '$patient_name', '$doctor_name', '$specialist', '$appointment_time', '$mobile_number', '$email')";

    if (mysqli_query($connection, $query)) {
      header("Location: profile.php");
      exit();
    } else {
      echo 'Error create appointment! : ' . mysqli_error($connection);
    }

} else {
  echo "User not found.";
}
mysqli_close($connection);
?>
