<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | SDT Car Booking System</title>
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
    <a href="admin.php" class="w3-bar-item w3-button">HOME</a>
    <a href="adminlist.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-list"></i> Booking</a>
    <a href="adminmanage.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> Manage</a>
    <a href="adminvehiclelist.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-car"></i> Vehicle Warehouse</a>
    <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red"><i class="fa fa-gear"> Logout</i></a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="adminlist.php" class="w3-bar-item w3-button" onclick="toggleFunction()">Booking</a>
    <a href="adminmanage.php" class="w3-bar-item w3-button" onclick="toggleFunction()">Manage</a>
    <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
  </div>
</div>