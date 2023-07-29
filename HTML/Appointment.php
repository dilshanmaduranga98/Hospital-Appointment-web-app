<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Style.css?v=<?php echo time(); ?>">
    <title>AdvertiseMe</title>
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
        <p class="form_heading">Appointment</p>
        <form action="AppointmentDataAdd.php" method="POST">

            <div class="personal_details">
                <h6>Patient & Doctor details</h6>

               <div class="personal_div">
                <label>
                    <p>Patient name</p>
                    <input name="patient_name" type="text" placeholder="Patient name" required>
                </label> 
                
                <label>
                    <p>Doctor Name</p>
                    <select name="doctor_name" id="doctor_name">
                    <option value="" disabled selected>Select a Doctor</option>
                        <option value="Dr.Benjamin Anderson">Dr.Benjamin Anderson</option>
                        <option value="Dr.Sophia Patel">Dr.Sophia Patel</option>
                        <option value="Dr.Samuel Johnson">Dr.Samuel Johnson</option>
                        <option value="Dr.Emily Lee">Dr.Emily Lee</option>
                        <option value="Dr.Jacob Ramirez">Dr.Jacob Ramirez</option>
                        <option value="Dr.Ava Mitchell">Dr.Ava Mitchell</option>
                        <option value="Dr.Daniel Wright">Dr.Daniel Wright</option>
                        <option value="Dr.Olivia Evans">Dr.Olivia Evans</option>
                        <option value="Dr.Ethan Thompson">Dr.Ethan Thompson</option>
                        <option value="Dr.Mia Roberts">Dr.Mia Roberts</option>
                    </select>
                </label> 

                <label>
                    <p>Specialist</p>
                    <select name="specialist" id="specialist">
                    <option value="" disabled selected>Select a Specialist area</option>
                        <option value="Cardiologist">Cardiologist </option>
                        <option value="Dermatologist">Dermatologist </option>
                        <option value="Gastroenterologist">Gastroenterologist </option>
                        <option value="Neurologist">Neurologist  </option>
                        <option value="Orthopedic Surgeon ">Orthopedic Surgeon </option>
                        <option value="Pediatrician">Pediatrician </option>
                        <option value="Psychiatrist">Psychiatrist </option>
                        <option value="Obstetrician/Gynecologist">Obstetrician/Gynecologist </option>
                        <option value="Ophthalmologist">Ophthalmologist </option>
                        <option value="Oncologist">Oncologist </option>
                    </select>
                </label> 

                <label>
                    <p>Time</p>
                    <input  name="appointment_time"  type="time">
                </label> 
               </div>

            </div>

            <div class="contact_details">
                <h6>Patient Contact details</h6>

                <div class="contact_div">
                    <label>
                        <p>Mobile Number</p>
                        <input name="mobile_number" type="text"  placeholder="Mobile number" required>
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
               <button type="submit">Appoint</button>
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