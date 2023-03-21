<!DOCTYPE html>
<html lang="en">
<head>
<title>Customer | SDT Car Booking System</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="csstheme/bootstrap.min.css">
<script src="https://bootswatch.com/_vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.min.js"></script>

<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>

<!-- Navbar (sit on top) -->
<div class="w3-top">
  <div class="w3-bar" id="myNavbar">
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
      <i class="fa fa-bars"></i>
    </a>
    <a href="customer.php" class="w3-bar-item w3-button">HOME</a>
    <a href="customervehiclelist.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-car"></i> Vehicle List</a>
    <a href="customerbooking.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-list"></i> Booking</a>
    <a href="customermanage.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-wrench"></i> Manage</a>
    <a href="login.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red"><i class="fa fa-gear"> Logout</i></a>
    <a href="customerviewprofile.php" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-red"><i class="fa fa-user"> View Profile</i></a>
    

  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
    <a href="customervehiclelist.php" class="w3-bar-item w3-button" onclick="toggleFunction()">Vehicle</a>
    <a href="customerbooking.php" class="w3-bar-item w3-button" onclick="toggleFunction()">Booking</a>
    <a href="customermanage.php" class="w3-bar-item w3-button" onclick="toggleFunction()">Manage</a>
    <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
  </div>
</div>