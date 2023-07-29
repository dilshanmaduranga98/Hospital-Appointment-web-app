<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Style.css?v=<?php echo time(); ?>">
    <title>Update</title>
</head>
<body class="Update_main_class_form">
<?php
$host = 'localhost'; 
$dbUsername = 'root'; 
$dbPassword = ''; 
$dbName = 'crud'; 

$connection = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

if (!$connection) {
  die('Database connection failed: ' . mysqli_connect_error());
}


$user_id = $_GET['userId'];


mysqli_close($connection);
?>

    <div class="Update_form_section">
        <form action="UpdateData.php" method="POST">

            <div class="Update_personal_details">
               <div class="Update_personal_div">
                <h1>User Update</h1>
                    <label>
                        <p>User ID</p>
                        <input name="User_ID" type="text" value="<?php echo $user_id;?>"/>
                    </label> 

                    <label>
                        <p>First name</p>
                        <input name="first_name" type="text" placeholder="First name" required>
                    </label> 
                    
                    <label>
                        <p>Last name</p>
                        <input name="last_name" type="text" placeholder="Last name" required>
                    </label> 

                    <label>
                        <p>Date of birth</p>
                        <input placeholder="DOB" name="dob" type="date" min="1985-01-01">
                    </label>

                    <label>
                        <p>Street 1</p>
                        <input name="street1" type="text" placeholder="Street 1">
                    </label>
                    
                    <label>
                        <p>Street 2</p>
                        <input name="street2" type="text" placeholder="Street 2">
                    </label>
    
                    <label>
                        <p>City</p>
                        <input name="city" type="text" placeholder="City">
                    </label>

                    <label>
                        <p>Mobile Number</p>
                        <input name="mobile" type="text"  placeholder="Mobile number" required>
                    </label>
                    
                    <label>
                        <p>E-mail address</p>
                        <input name="email" type="email" placeholder="E-mail" required>
                    </label>
                </div>
            </div>

            <div class="Update_form_buttons">
               <button type="submit">Update</button>
            </div>
        </form>
    </div>

</body>
</html>