<?php
include 'session.php';
if(!session_id())
{
    session_start();
}
include 'customersession.php';
include('dbconnect.php');

//Get booking ID
if (isset($_GET['id']))
{
    $bid = $_GET ['id']; 
}

// SQL DELETE booking into DB
$sql = "DELETE FROM tb_booking WHERE b_id='$bid' ";

//Execute SQL
$result = mysqli_query($con, $sql);

//Close connection
mysqli_close($con);

//Redirect or successful notification 
header('Location: customermanage.php'); 

?>