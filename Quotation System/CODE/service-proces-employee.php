<?php 

session_start();
include("layouts/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {


	extract($_POST);

	$customer_id = intval($_SESSION["id"]);

	$sql = "INSERT INTO request (r_customerid, r_serviceid,r_servicestatus) VALUES ('$customer_id', '$service_id','Pending')";
	
$result = mysqli_query($link, $sql);
if ( false===$result ) {
  printf("error: %s\n", mysqli_error($link));
}
else {
  echo 'done.';

}
}
header('Location: service-request-employee.php')
?>