<?php
include 'session.php';
if(!session_id())
{
    session_start();
}

include('dbconnect.php');

//Retrieve data from form
$fbid = $_POST ['fbid'];
$fstatus = $_POST['fstatus']; 


$sql = "UPDATE tb_booking SET b_status ='$fstatus' WHERE b_id = '$fbid'" ;


$result = mysqli_query($con, $sql);
mysqli_close($con);


header('location: adminmanage.php') ;  
?>
