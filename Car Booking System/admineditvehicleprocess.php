<link rel="stylesheet" href="assets/css/fileinput.min.css">
<?php 
include ('dbconnect.php');
include 'session.php';
include 'headeradmin.php'; 
include 'adminsession.php';

$v_id = $_POST['v_id'];

$v_model = $_POST['v_model'];

$v_price = $_POST['v_price'];

$v_seat = $_POST['v_seat'];

$v_reg = $_POST['v_reg'];

$v_type = $_POST['v_type'];


$sql = "UPDATE tb_vehicle 
		SET v_reg = '$v_reg', v_type = '$v_type', v_model = '$v_model', v_seat ='$v_seat ', v_price='$v_price' WHERE v_id='$v_id'";
    
if(!mysqli_query($con, $sql)) {
        echo "<script>
            alert('Vehicle update failed!');
        
            </script>";
            exit();
    }

    echo "<script>
        alert('Vehicle update successfull!');
        window.history.go(-2);
        </script>";
    exit();

include 'footer.php';?>