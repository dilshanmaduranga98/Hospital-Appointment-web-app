<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Style.css?v=<?php echo time(); ?>">
    <title>WintanCare</title>
</head>
<body class="main_class">
    <?php include 'initial.php'; ?>

    <?php
        $host = 'localhost'; 
        $dbUsername = 'root'; 
        $dbPassword = ''; 
        $dbName = 'crud'; 


        $connection = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);


        if (!$connection) {
            die('Database connection failed: ' . mysqli_connect_error());
        }

        session_start();
        $username = $_SESSION['username'];


        $query = "SELECT COUNT(*) AS numAppointments 
                  FROM Appointment 
                  WHERE user_id = (SELECT User_ID FROM userregister WHERE user_name = '$username')";
        $result = mysqli_query($connection, $query);

        if ($row = mysqli_fetch_assoc($result)) {
            $numAppointments = $row['numAppointments'];
        }
    ?>



    <nav id="navbar">
        <li>
            <a class="logo" href="../HTML/Index.php"><ul class="ul_logo"><p class="logo_one">Wintan</p><p class="logo_two">Care</p></ul></a>
            
            <?php
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

    <div class="home_main_description">
        <h1>WintanCare</h1>
        <p>We always with you</p>

    </div>

    <div class="appoinment_count">
            <p>No of Appointment</p>
            <p class="number"><?php echo $numAppointments; ?></p>
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
</body>
</html>
