<?php
include 'session.php';
if(!session_id())
{
    session_start();
}
//Connect to database
include ('dbconnect.php');
include 'adminsession.php';
?>

<!-- Bootstrap file input -->
<link rel="stylesheet" href="fileinput.min.css">

<?php 
$v_model = $_POST['v_model'];
$v_price = $_POST['v_price'];
$v_seat = $_POST['v_seat'];
$v_reg = $_POST['v_reg'];
$v_type = $_POST['v_type'];
$v_image = $_FILES["v_image"]["name"];  

move_uploaded_file($_FILES["v_image"]["tmp_name"],"img/".$_FILES["v_image"]["name"]);

$sql = "INSERT INTO tb_vehicle (v_reg, v_type, v_model, v_seat, v_price, v_image ) 
        VALUES ('$v_reg',  '$v_type', '$v_model',  '$v_seat ','$v_price','$v_image')";

//Check if Car is added successfully or failed
if(!mysqli_query($con, $sql)) {
        echo "<script>
            alert('Car adding process failed!');
            window.location.href = 'adminvehiclelist.php';
            </script>";
            exit();
    }

    echo "<script>
        alert('Car adding successfull!');
        window.location.href = 'adminvehiclelist.php';
        </script>";
    exit();

include 'footer.php';
?>