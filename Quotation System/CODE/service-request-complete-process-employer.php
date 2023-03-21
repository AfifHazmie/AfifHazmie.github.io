 <?php 


include("layouts/config.php");
include("layouts/session.php");
$request_id = $_POST['request_id'];
$status_desc = $_POST['status_desc'];


$sql = "UPDATE request SET r_servicestatus ='$status_desc' WHERE request_id = '$request_id'";   

if(!mysqli_query($link, $sql)) {
        echo "<script>
            alert('Service Update Failed!');
            window.history.go(-1);
            </script>";
            exit();
    }

    echo "<script>
        alert('Service Update Successfull!');
        window.history.go(-2);
        </script>";
    exit();




?>