<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="css/appointments.css"/>
    <link rel="stylesheet" href="css/global.php"/>
    <link rel="shortcut icon" type="image/png" href="images/carfavicon.png"/>
    <script defer src="js/permissions.js"></script>
</head>
<body>
    <?php session_start() ?>
    <div class="header">
        
        <ul class="navbar">
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

    <div class = flexbox>
        <div id=image>
            <img src="images/hoist.jpg" alt="Full Car Hoist">
        </div>
        <div class = container>
            <h1>Schedule an Appointment</h1>
            <form method="post">
                <h3>Personal Information</h3>
                <input type="text" id="name" name="name" placeholder="Name">
                <input type="email" id="email" name="email" placeholder="Email">
                <input type="tel" id="phone" name="phone" placeholder="Phone Number">
                <h3>Vehicle Details</h3>
                <input type="text" id="year" name="year" placeholder="Year">
                <input type="text" id="make" name="make" placeholder="Make">
                <input type="text" id="model" name="model" placeholder="Model">
                <input type="text" id="vin" name="vin" placeholder="VIN">
                <h3>Appointment Type</h3>
                <select name="apttype" id="apttype">
                    <option value="oilchange">Oil Change</option>
                    <option value="breakjob">Break Job</option>
                    <option value="tirechange">Tire Change</option>
                    <option value="diagnostic">Diagnostic Appointment</option>
                    <option value="alignment">Tire Alignment</option>
                </select>
                <h3>Select Time and Date</h3>
                <input type="date" id="date" name="date" value="2021-12-07"  require>
                <input list="time" require>
                <datalist id="time" name="time">
                    <option value="9:00 A.M.">
                    <option value="10:00 A.M.">
                    <option value="11:00 A.M.">
                    <option value="12:00 P.M.">
                    <option value="1:00 P.M.">
                    <option value="2:00 P.M.">
                    <option value="3:00 P.M.">
                    <option value="4:00 P.M.">
                </datalist>
                <h3>Requests/Comments</h3>
                <textarea id="textbox" name="textbox" rows="5" cols="50" placeholder="Type any Requests or Comments here"></textarea>
                <input type="submit" id=submit name="submit">
            
            </form> 
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
            //Grab the three inputted values
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $year = $_POST['year'];
            $make = $_POST['make'];
            $model = $_POST['model'];
            $vin = $_POST['vin'];
            $type = $_POST['apttype'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $comment = $_POST['textbox'];

            //$sql = "SELECT date FROM appointments WHERE date = $date";

            
            $result = $dbc->query("SELECT date FROM appointments WHERE date = $date");
            if($result->num_rows != 0) {
                echo '<script>alert("That date is already booked.")</script>';
            } else if (!preg_match ("/^[0-9]*$/", $year) || empty ($name) || empty($email) || empty($phone) || empty($year) ||
            empty($make) || empty($model) || empty($vin) || empty($type) || empty($date) || empty($time) ||
            !preg_match ("/^[a-zA-z]*$/", $name)){   
                echo '<script>alert("There was an issue with your submission. Please make sure all fields are filled out.")</script>';
                //echo '<script>alert($stars)</script>';  
            }else{
                //Inserts the data into the table
                $sql = "INSERT INTO appointments (name, email, phone, year, make, model, vin, type, date, time, description)  VALUES ('$name', 
                    '$email', '$phone', '$year', '$make', '$model', '$vin', '$type', '$date', '$time', '$comment')";
                
                if(mysqli_query($dbc, $sql)){
                    echo '<script>alert("Your review was successfully submitted.")</script>'; 
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