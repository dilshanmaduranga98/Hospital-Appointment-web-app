<?php
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'crud';


$connection = mysqli_connect($host, $dbUsername, $dbPassword);


if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}

$createDatabaseQuery = "CREATE DATABASE IF NOT EXISTS $dbName";
mysqli_query($connection, $createDatabaseQuery);


mysqli_select_db($connection, $dbName);


$createTableQueryRegister = "CREATE TABLE IF NOT EXISTS userregister(
    User_ID INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(100),
    user_password VARCHAR(100),
    confirm_password VARCHAR(100),
    email VARCHAR(100)
)";

mysqli_query($connection, $createTableQueryRegister);

$createTableQueryAppointment = "CREATE TABLE IF NOT EXISTS appointment (
    appointment_ID INT PRIMARY KEY AUTO_INCREMENT,
    User_ID INT,
    patient_name VARCHAR(100),
    doctor_name VARCHAR(100),
    specialist VARCHAR(100),
    appointment_time TIME,
    mobile_number VARCHAR(20),
    email VARCHAR(100),
    FOREIGN KEY (User_ID) REFERENCES userregister(User_ID)
)";

mysqli_query($connection, $createTableQueryAppointment);



mysqli_close($connection);
?>
