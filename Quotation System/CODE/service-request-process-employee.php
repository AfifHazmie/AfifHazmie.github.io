 <?php 


include("layouts/config.php");
include("layouts/session.php");

$request_id = $_POST['request_id'];
$status_desc = $_POST['status_desc'];
$r_comment = $_POST['r_comment'];


$sql = "UPDATE request  SET r_servicestatus ='$status_desc', r_comment = '$r_comment' WHERE request_id = '$request_id'";
	
if(!mysqli_query($link, $sql)) {
        echo "<script>
            alert('User Edit Failed!');
            window.history.go(-1);
            </script>";
            exit();
    }

    echo "<script>
        alert('Request Edit Successfull!');
        window.history.go(-2);
        </script>";
    exit();




?>