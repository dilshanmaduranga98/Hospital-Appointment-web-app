<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/register.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../CSS/navbar.css?v=<?php echo time(); ?>">
    <title>Register</title>
</head>
<body>

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
<div class="container">
       <div class="signup_main_container">
        <h1 class="signup_hedding">Signup</h1>
        <form action="RegisterDataAdd.php" method="POST" onsubmit="checkPasswords();">
                
                <label>
                    <input name ="user_name" type="text" placeholder="User name" required>
                </label>

                <label>
                    <input name="user_password" id="Upassword" type="text" placeholder="Password" required>
                </label>
                
                <label>
                    <input name="confirm_password" id="UCpassword" type="text" placeholder="Confirm password" required>
                </label>
                <p class="login_p">If you have ans account,<a href="../HTML/Login.php" class="login_a">Login</a></p>
                <button type="submit">Signup</button>
        </form>
    </div>
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