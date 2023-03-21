<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'vtektmx1g1n3');
define('DB_PASSWORD', 'Powerec123');
define('DB_NAME', 'qms');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$gmailid = 'adminsupport@powerec.ltd'; // YOUR gmail email
$gmailpassword = 'Powerec123'; // YOUR gmail password
$gmailusername = 'Powerec Admin'; // YOUR gmail User name

?>