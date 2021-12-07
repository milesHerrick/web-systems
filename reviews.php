<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="css/reviews.css"/>
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
    <div class="flexbox">
        <div id=image>
            <img src="images/newshop.jpg" alt="The New Shop">
        </div>
        <h2>Write a Review</h2>
            <form method="post" action="">
                <div class="rating">
                    <label>
                    <input type="radio" name="stars" value="1" />
                        <span class="icon">&starf;</span>
                    </label>
                    <label>
                    <input type="radio" name="stars" value="2" />
                        <span class="icon">&starf;</span>
                        <span class="icon">&starf;</span>
                    </label>
                    <label>
                    <input type="radio" name="stars" value="3" />
                        <span class="icon">&starf;</span>
                        <span class="icon">&starf;</span>
                        <span class="icon">&starf;</span>   
                    </label>
                    <label>
                    <input type="radio" name="stars" value="4" />
                        <span class="icon">&starf;</span>
                        <span class="icon">&starf;</span>
                        <span class="icon">&starf;</span>
                        <span class="icon">&starf;</span>
                    </label>
                    <label>
                    <input type="radio" name="stars" value="5" />
                        <span class="icon">&starf;</span>
                        <span class="icon">&starf;</span>
                        <span class="icon">&starf;</span>
                        <span class="icon">&starf;</span>
                        <span class="icon">&starf;</span>
                    </label>
                </div>
                <textarea name ="review" class="review" placeholder="Enter a review..." rows="4"></textarea>
                <input type="submit" class="submitbtn" value="Submit" name="submit">
            </form>
        

        
        <div class="prereviews">

            <span class="preicon">&starf;&starf;&starf;&starf;&starf;<br>
                <p class="reviewtext">"They are very nice, their prices are fair and they do excellent work."</p>
            </span>
            <span class="preicon">&starf;&starf;&starf;&starf;&starf;<br>
                <p class="reviewtext">"Great people to deal with, fair pricing! would recommend them to anyone!"</p>
            </span>
            
        </div>

            <form action="" method = "GET">
                <input type="hidden"> 
            </form>
      

        <?php
        require_once('sql_conn.php');
        //If a submit request has been entered, enter the data into the table
        if(isset($_POST['submit'])){
            // Check connection
            if($dbc === false){

                die("ERROR: Could not connect. " 
                    . mysqli_connect_error());
            }
            error_reporting(E_ERROR | E_PARSE);
            //Grab the three inputted values
            $review = $_REQUEST['review'];
            //Get their lengths for checking valid input
            $origin_length = strlen ($origin); 
            $destination_length = strlen ($destination);  
            $duration_length = strlen ($duration); 

            if(!empty($_POST['stars'])) {
                $stars = $_POST['stars'];
            }
            
            //Checks for valid input
            if (!preg_match ("/^[0-9]*$/", $stars) || empty ($stars) || empty($review) ||
            !preg_match ("/^[a-zA-z]*$/", $review)){   
                echo '<script>alert("There was an issue with your submission. Please make sure both fields are filled out.")</script>'
                . $review;
                //echo '<script>alert($stars)</script>';  
            }else{
                //Inserts the data into the table
                $sql = "INSERT INTO review (description, stars)  VALUES ('$review', 
                    '$stars')";
                
                if(mysqli_query($dbc, $sql)){
                    echo '<script>alert("Your review was successfully submitted.")</script>'; 
                } else{
                    echo '<script>alert("There was an issue with your submission. Could not perform query.")</script>';
                }
            }
        
            
            // Close connection
        }


            
            $query = "SELECT * FROM review";
            $response = @mysqli_query($dbc, $query);
            if($response){
                echo '<div class="tab">
                <table align="left" cellspacing="5" cellpadding="8" head="Flight Info" border = "1" style="border-collapse:collapse">
                <tr style="background-color:#e3b39b">
                    <th colspan="11" >reviews</th>
                </tr>
                <tr>
                    <td align="left"><b>description</b></td>
                    <td align="left"><b>stars</b></td>
                </tr>'; 
                $lengths = mysqli_fetch_lengths($response);
                while($row = mysqli_fetch_array($response)){
                    echo
                    '<tr> 
                        <td>'. $row['description'] . '</td>
                        <td align="left">' . $row['stars'] . '</td>'.
                    '</tr>';
                } 
                echo '</table>
                </div>';
            }
    ?>
    
    </div>
        
    
    <div class="footer">
        <p><b>Copyright &copy; 2021 Hallis Auto Repair</b></p>
        <p><b>Phone:</b> 715-695-2727</p>
        <p><a href="https://tinyurl.com/2f4u9wfb" target="_blank"><b>Address:</b> 203 5th Ave S, Strum, WI 54770</a></p>
    </div>

    
</body>
</html>