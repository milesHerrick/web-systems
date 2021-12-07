<?php 
  header('Content-Type: text/css');
  session_start();
?>

body {
  background-color: #faf0e6;
  font-family: Arial, Helvetica, sans-serif !important;
}

.navbar{
  position: relative;
  width: 100%;
  top: 0%;
  left: 0%;
  padding: 0;
  margin: 0;
  list-style-type: none;
  background-color: #e3b39b;
}

.navbar li{
  float: left;
}

.navright{
  position: relative;
  width: 100%;
  top: 0%;
  right: 0%;
  padding: 0;
  margin: 0;
  list-style-type: none;
  background-color: white;
}

.navright li{
  float: right;
}

.header{
  position: fixed;
  width: 100%;
  top: 0%;
  left: 0%;
  box-shadow: 0px 0px 0px 2px black;
  background-color: #e3b39b;
}

.logo{
  font-weight: bold;
  color: red;
  font-family: Arial, Helvetica, sans-serif;
  text-align: center;
  background-color: white;
}

.logo {
  margin: 0px;
}

.space {
  background-color: #e3b39b;
  height: 3.9em;
}

.star {
  align-items: flex-end;
  padding: 2px !important;
  height: 100%;
  width: 6.25em;
  background-color: white !important;
}

li a{
  font-family: Arial, Helvetica, sans-serif;
  display: block;
  font-weight: bold;
  color: black;
  padding: 20px 20px 20px 20px;
  text-align: center;
  text-decoration: none;
  font-size: larger;
  background-color: #e3b39b;
}

li a:hover{
  background-color: rgb(189, 187, 187);
}

.overlay {
  display: flex;
  flex-direction: column;
}

.dropdown {
  float: left;
  overflow: hidden;
}
  
.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  font-size: larger;
  color: black;
  padding: 20px 20px 20px 20px;
  font-weight: bold;
  margin: 0;
  background-color: #e3b39b;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: #f8c7af;
}
  
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  border: 1px solid black;
}
  
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  display: block;
  text-align: left;
  border-top: 1px solid black;
}
  
.dropdown-content a:hover {
    background-color: #f8c7af;
}
  
.dropdown:hover .dropdown-content {
  display: block;
}

.footer{
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #e3b39b;
  border-top: 1px solid black;
  display: flex;
  justify-content: space-around;
  font-size: large;
  color: black;
  font-family: 'Times New Roman', Times, serif;
}

img {
  border-radius: 5px;
  box-shadow: 2px 2px 2px 2px rgb(189, 187, 187);
}

input{
  box-shadow: 2px 2px 2px 2px rgb(189, 187, 187);
}

textarea{
  box-shadow: 2px 2px 2px 2px rgb(189, 187, 187);

}
/* unvisited link */
a:link {
  color: black;
}

a:visited {
  color: black;
}

a:hover {
  color: #faf0e6;;
}

a:active {
  color: black;
}

@media(max-width: 1047px){
  .textcontainer{
    flex-direction: column;
  }
  
  .prereviews {
    flex-direction: column;
  }

  .header{
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
  }
  .navbar{
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    font-size: .65em;
  }
  .li a{
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: small;
  }
  .navbar li{
    display: flex;
    justify-content: center;
  }
  .navright li{
    float: none;
    text-align: center;
    justify-content: center;
    align-items: center;
  }
  .navright{
    display: flex;
    justify-content: center;
  }
  .space{
    height: 0px;
  }
  .textcontainer{
    width: 90%;
    margin-left: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
  .textbox{
      width: 100%;
      height: 55%;
      margin-left: 0;
  }
  .flexbox{
    height: 110vh;
  }
}
#logout{
  display: none;
}


<?php
if($_SESSION['user_level'] == 'user') {
?>
.loginpage{
  display: none;
}
.signuppage{
  display: none;
}
#logout{
  display: initial;
}
.viewapp{
  display: none;
}
<?php
}
?>

<?php
if($_SESSION['user_level'] == 'admin') {
?>
.loginpage{
  display: none;
}
.signuppage{
  display: none;
}
#logout{
  display: initial;
}
.viewapp{
  display: initial;
}
<?php
}
?>

<?php
if($_SESSION['user_level'] == 'none') {
?>
.loginpage{
  display: initial;
}
.signuppage{
  display: initial;
}
#logout{
  display: none;
}
.viewapp{
  display: none;
}
<?php
}
?>

