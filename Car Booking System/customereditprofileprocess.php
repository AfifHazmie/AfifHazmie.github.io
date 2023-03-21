<?php 
include ('dbconnect.php');
include 'session.php';
include 'headercustomer.php'; 
include 'customersession.php';

$u_ic = $_POST['u_ic'];
$u_name = $_POST['u_name'];
$u_phone = $_POST['u_phone'];
$u_address = $_POST['u_address'];

$sql = "UPDATE tb_users
		SET u_name = '$u_name', u_address ='$u_address ', u_phone='$u_phone' WHERE u_ic='$u_ic'";
    
if(!mysqli_query($con, $sql)) {
        echo "<script>
            alert('Profile update failed!');
            window.history.go(-2);
            </script>";
            exit();
    }

    echo "<script>
        alert('Profile update successfull!');
        window.history.go(-2);
        </script>";
    exit();

include 'footer.php';?>