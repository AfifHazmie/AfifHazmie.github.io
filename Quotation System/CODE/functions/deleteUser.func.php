<?php 

session_start();
//avoid customer and employee accessing the page-->
if( isset($_SESSION["u_type"]) && $_SESSION["u_type"] !=0 ){  
    header("Location: pages-404-customer-error.php");
die('Only  logged in users can access this page!'); 
} 

include("../layouts/config.php");



$user_id = intval($_GET["id"]);

$sql = "DELETE FROM users WHERE id = '$user_id'";

if(!mysqli_query($link, $sql)) {
	 echo "<script>alert('Delete User Failed'); window.history.go(-1);</script>";
     exit();
}

echo "<script>alert('Delete User Successfully'); window.history.go(-1);</script>";
exit();

?>