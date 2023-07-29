<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Style.css?v=<?php echo time(); ?>">
    <title>AdvertiseMe</title>

    <script>
        function showDialog() {
            var dialogMessage = "Delete successfull!";

            var dialogBox = document.createElement("div");
            dialogBox.className = "dialog-box";

            var messageElement = document.createElement("p");
            messageElement.textContent = dialogMessage;

            dialogBox.appendChild(messageElement);

            document.body.appendChild(dialogBox);
        }

        function closeDialog() {
            var dialogBox = document.querySelector(".dialog-box");
            if (dialogBox) {
                dialogBox.parentNode.removeChild(dialogBox);
            }
        }
    </script>

    <style>
        .dialog-box {
            position: fixed;
            top: 8%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            background-color: #27b127;
            color: #fff;
            padding: 10px;
            border-radius:10px;
            display: flex;
            align-items:center;
            justify-content: center;
            flex-direction: column;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif ;
        }

        .dialog-box h2 {
            margin: 0;
        }

        .dialog-box p {
            margin: 10px 0;
        }

    </style>


</head>
<body class="main_class_users">

    <nav id="navbar">
        <li>
        <a class="logo" href="../HTML/Index.php"><ul class="ul_logo"><p class="logo_one">Wintan</p><p class="logo_two">Care</p></ul></a>
            
            <?php
                session_start();
                if (isset($_SESSION['username'])) {
                    echo '<a href="../HTML/Index.php"><ul class="ul">Home</ul></a>';
                    echo '<a href="../HTML/profile.php"><ul class="ul">Details</ul></a>';
                    echo '<a href="../HTML/Appointment.php" class="logout"><ul class="ul">Appointment</ul></a>';
                    echo '<a href="../HTML/UserProfile.php" class="logout"><ul class="ul">Profile</ul></a>';
                    echo '<a href="../HTML/Logout.php" class="logout"><ul class="ul">Logout</ul></a>';
                } else {
                    echo '<a href="../HTML/Login.php" class="login"><ul class="ul">Login</ul></a>';
                }
                ?>
        </li>
    </nav>

    <div class="heading_users">
        <p>Appointment details</p>
    </div>

    <div class="users_table_section">
        <?php
            $host = 'localhost'; 
            $dbUsername = 'root'; 
            $dbPassword = ''; 
            $dbName = 'crud'; 
            
            $connection = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
            
            if (!$connection) {
            die('Database connection failed: ' . mysqli_connect_error());
            }

            
            $username = $_SESSION['username'];


            $query = "SELECT * FROM Appointment WHERE user_id = (SELECT User_ID FROM userregister WHERE user_name = '$username')"; 
            $result = mysqli_query($connection, $query);

            function deleteUser($id) {
                global $connection; 
            
                $query = "DELETE FROM Appointment WHERE appointment_ID = $id";
                $result = mysqli_query($connection, $query);
            
                if ($result) {
                    return true;
                } else {
                    return false;
                }
            }
            
 
            if (isset($_POST['delete'])) {
                $userIdToDelete = $_POST['delete'];
                if (deleteUser($userIdToDelete)) {
                    $refreshInterval = 0.5; 
                    echo "<script>
                    showDialog();
                    </script>";
                    echo '<meta http-equiv="refresh" content="' . $refreshInterval . '">';
                    echo "<script>document.getElementById('row-$userIdToDelete').style.display = 'none';</script>";
                } else {
                    echo "Error deleting user.";
                    
                }
            }
        ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Patient name</th>
                <th>Doctor name</th>
                <th>Specialist</th>
                <th>Appointment time</th>
                <th>Mobile number</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr id="row-<?php echo $row['appointment_ID']; ?>">
                <td><?php echo $row['appointment_ID']; ?></td>
                <td><?php echo $row['patient_name']; ?></td>
                <td><?php echo $row['doctor_name']; ?></td>
                <td><?php echo $row['specialist']; ?></td>
                <td><?php echo $row['appointment_time']; ?></td>
                <td><?php echo $row['mobile_number']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td class="action_area_btn">
                    <form method="POST" action="">
                        <button type="submit" name="delete" value="<?php echo $row['appointment_ID']; ?>">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
    



    <script type="text/javascript">
        var lastScrollTop = 0;
        navbar = document.getElementById("navbar");
        window.addEventListener("scroll",function()
        {
            var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if(scrollTop > lastScrollTop)
            {
                navbar.style.top = "-80px";
            }else 
            {
                navbar.style.top="0";
            }

            lastScrollTop = scrollTop;
        })

    </script>

<script>
  function openPopup(userId) {
    var url = "update.php?userId=" + userId;
    var width = 550;
            var height = 700;
            var left = (window.innerWidth - width) / 2;
            var top = (window.innerHeight - height) / 2;
            var options = "width=" + width + ",height=" + height + ",top=" + top + ",left=" + left;
    window.open(url, "_blank", options);
  }
</script>
</body>
</html>