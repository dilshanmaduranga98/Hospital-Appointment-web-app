<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Style.css?v=<?php echo time(); ?>">
    <title>WintanCare</title>
</head>
<body class="main_class_form">
    <?php include 'initial.php'; ?>
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

    <div class="form_section">
        <p class="form_heading">Register</p>
        <form action="AddData.php" method="POST">

            <div class="personal_details">
                <h6>Personal details</h6>

               <div class="personal_div">
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
                    <input placeholder="DOB" name="dob" min="1985-01-01" type="date">
                </label> 
               </div>

            </div>

            <div class="location_details">
                <h6>Location details</h6>

                <div class="location_div">
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
    
                </div>
            </div>

            <div class="contact_details">
                <h6>Contact details</h6>

                <div class="contact_div">
                    <label>
                        <p>Mobile Number</p>
                        <input name="mobile" type="text"  placeholder="Mobile number" required>
                    </label>
                    
                    <label>
                        <span class="reqired">
                            <label class="essential">*</label>
                            <p>E-mail address</p>
                        </span>
                        <input name="email" type="email" placeholder="E-mail" required>
                    </label>
                </div>
                <p class="essential">*An email address can use only one time.</p>

            </div>

            <div class="form_buttons">
               <button type="submit">Register</button>
            </div>
        </form>
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