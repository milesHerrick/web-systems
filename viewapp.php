<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/global.php"/>
    <link rel="stylesheet" href="css/newstyle.css"/>
    <link rel="shortcut icon" type="image/png" href="images/carfavicon.png"/>
    <script defer src="js/permissions.js"></script>
    <!-- Add ability to sort by date -->
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
            <div class="input">
                <form action="" method = "GET">
                    <input type="date" name="date">
                    <input type="submit" name="submit">
                </form>
                <form class="bottom" action="" method = "POST">
                    <div><label for="time">Enter ID to Delete</label></div>
                    <div><input type="text" name="Id">
                    <input type="submit" name="submit"></div>
                </form>
            </div>
            <?php
                require_once('sql_conn.php');
                

                if(isset($_GET['submit'])){
                    $date = $_GET['date'];
                    $query = "SELECT Id, name, email, phone, date, time, year, make, model, vin, description FROM appointments WHERE date = '$date'";

                    // Get a response from the database by sending the connection
                    // and the query
                    $response = @mysqli_query($dbc, $query);

                    // If the query executed properly proceed
                    if($response){
                        echo '<table align="left" cellspacing="5" cellpadding="8" head="Flight Info" border = "1" style="border-collapse:collapse">
                            <tr style="background-color:beige">
                                <th colspan="11" >Appointments</th>
                            </tr>
                            <tr>
                                <td align="left"><b>ID</b></td>
                                <td align="left"><b>Name</b></td>
                                <td align="left"><b>Email</b></td>
                                <td align="left"><b>Phone</b></td>
                                <td align="left"><b>Date</b></td>
                                <td align="left"><b>Time</b></td>
                                <td align="left"><b>Year</b></td>
                                <td align="left"><b>Make</b></td>
                                <td align="left"><b>Model</b></td>
                                <td align="left"><b>Vin</b></td>
                                <td align="left"><b>Description</b></td>
                            </tr>';

                        //If a submit request has been entered, enter the data into the table
                        while($row = mysqli_fetch_array($response)){

                            echo '<tr><td align="left">' . 
                            $row['Id'] . '</td><td align="left">' .
                            $row['name'] . '</td><td align="left">' .
                            $row['email'] . '</td><td align="left">' . 
                            $row['phone'] . '</td><td align="left">' .
                            $row['date'] . '</td><td align="left">' .
                            $row['time'] . '</td><td align="left">' .
                            $row['year'] . '</td><td align="left">' .
                            $row['make'] . '</td><td align="left">' .
                            $row['model'] . '</td><td align="left">' .
                            $row['vin'] . '</td><td align="left">' .
                            $row['description'] . '</td>';
                            
                            echo '</tr>';
                        } 
                        echo '</table>';
                        
                        } else {
                            echo "Couldn't issue database query<br />";                            
                            echo mysqli_error($dbc);      
                        }
                        
                    }

                    if(isset($_POST['submit'])){
                        $Id =  $_POST['Id'];            
                        //Take the submitted ID
                        if(empty($Id) || !preg_match ("/^[0-9]*$/", $Id)){
                            $ErrMsg = "Invalid input. Please enter a date and time to delete.";  
                            echo $ErrMsg;  
                        }
                        else{
                            
                            $sql = "DELETE FROM appointments WHERE Id = '$Id'";
                            if(!mysqli_query($dbc, $sql)){
                                echo "ERROR: Hush! Sorry $sql. " 
                                . mysqli_errzor($dbc);
                            } 
                        }
                    }
                    mysqli_close($dbc);
                ?>

                  
        </div>
    </div>

    <div class="footer">
        <p><b>Copyright &copy; 2021 Hallis Auto Repair</b></p>
        <p><b>Phone:</b> 715-695-2727</p>
        <p><a href="https://tinyurl.com/2f4u9wfb" target="_blank"><b>Address:</b> 203 5th Ave S, Strum, WI 54770</a></p>
    </div>
    
</body>
</html>