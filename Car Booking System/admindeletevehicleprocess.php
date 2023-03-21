<?php
include 'session.php';
if(!session_id())
{
    session_start();
}
include 'adminsession.php';
include('dbconnect.php');

//Get vehicle ID
$v_id = $_POST['v_id']; 

// SQL DELETE vehicle from list
$sql = "DELETE FROM tb_vehicle WHERE v_id='$v_id' ";

//Check sql statement 
if(!mysqli_query($con, $sql)) {
        echo "<script>
            alert('Delete Failed!');
            window.history.go(-1);
            </script>";
    }
    echo "<script>
        alert('Delete Successfull!');
        window.location.href='adminvehiclelist.php;
        </script>";

//close connection
mysqli_close($con);
?>

