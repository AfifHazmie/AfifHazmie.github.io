<!DOCTYPE html>
<html lang="en">
<head>
    <title>SDT Car Booking System</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="csstheme/bootstrap.min.css">
</head>


<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <a href="index.php" class="w3-bar-item w3-button">HOME</a>
    <a href="#about" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> ABOUT</a>
    <a href="#portfolio" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> VEHICLE</a>
    <a href="register.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> REGISTER</a>
    <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red"><i class="fa fa-search"> Login</i></a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="#about" class="w3-bar-item w3-button" onclick="toggleFunction()">ABOUT</a>
    <a href="#portfolio" class="w3-bar-item w3-button" onclick="toggleFunction()">VEHICLE</a>
    <a href="register.php" class="w3-bar-item w3-button" onclick="toggleFunction()">REGISTER</a>
    <a href="login.php" class="w3-bar-item w3-button">Login</a>
  </div>
</div>