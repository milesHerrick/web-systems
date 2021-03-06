<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/signup.css"/>
    <link rel="stylesheet" href="css/global.php"/>
    <link rel="shortcut icon" type="image/png" href="images/carfavicon.png"/>
    <script defer src="js/permissions.js"></script>
</head>
<body>
    <?php session_start() ?>
    <div class="header">
        <ul class="navbar">
            <!-- <p class="logo">Hallis</p>
            <p class="logo">&starf;Auto&starf;</p>
            <p class="logo">Repair</p> -->
            <li><a href="home.html">Home</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="appointments.php">Appointments</a></li>
            <li>
                <div class="dropdown">
                    <button class="dropbtn">Advice 
                    <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="tires.html">Tires</a>
                        <a href="brakes.html">Brakes</a>
                        <a href="oil.html">Oil Change</a>
                    </div>
              </div>
            </li>
            <li><a href="reviews.php">Reviews</a></li>
            <li><a href="ask.html">Ask</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            <li class="viewapp" id="viewapp"><a href="viewapp.php">View Apps</a></li>
            <li class="signuppage" id="signuppage"><a href="signup.php">Sign Up</a></li>
            <li class="loginpage" id="loginpage"><a href="login.php">Sign In</a></li>
            <li id="logout"><a>Sign Out</a></li>
            <li class="space"></li>
        </ul>
        <ul class="navright">
            <li class="star">
                <p class="logo">Hallis</p>
                <p class="logo">&starf;Auto&starf;</p>
                <p class="logo">Repair</p>
            </li>
        </ul>
    </div>

    <div class="flexbox">
        <div class="container">
            <div id=image>
                <img src="images/signupimage.jpg" alt="The Old Shop">
            </div>
            <div class="input">
                <h1>Sign Up</h1>
                <form action="" method="post">
                    <input type="email" id="email" name="email" placeholder="Email">
                    <input type="text" id="password" name="password" placeholder="Password">
                    <input type="submit" name="Submit">
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <p><b>Copyright &copy; 2021 Hallis Auto Repair</b></p>
        <p><b>Phone:</b> 715-695-2727</p>
        <p><a href="https://tinyurl.com/2f4u9wfb" target="_blank"><b>Address:</b> 203 5th Ave S, Strum, WI 54770</a></p>
    </div>

    <?php
        require_once('sql_conn.php');
        //If a submit request has been entered, enter the data into the table
        if(isset($_POST['submit'])){
            // Check connection
            if($dbc === false){

                die("ERROR: Could not connect. " 
                    . mysqli_connect_error());
            }
            
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $result = $dbc->query("SELECT email FROM accounts WHERE email = '$email'");
            if($result->num_rows != 0) {
                echo '<script>alert("There is already an account with that email.")</script>';
            }
            else if (empty ($email) || empty($password)){   
                echo '<script>alert("There was an issue with your submission. Please make sure both fields are filled out.")</script>';
                //echo '<script>alert($stars)</script>';  
            }else{
                //Inserts the data into the table
                $sql = "INSERT INTO accounts (email, password)  VALUES ('$email', '$password')";
                
                if(mysqli_query($dbc, $sql)){
                    echo '<script>alert("Your account has been created.")</script>'; 
                } else{
                    echo '<script>alert("There was an issue with your submission. Could not perform query.")</script>';
                }
            }
            
            // Close connection
            mysqli_close($dbc);

        }


    ?>
</body>
</html>