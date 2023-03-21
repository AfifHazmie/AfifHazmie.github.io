 <?php 


include("layouts/config.php");
include("layouts/session.php");


$request_id = $_POST['request_id'];

$sql = "DELETE FROM request WHERE request_id = '$request_id'";
    
if(!mysqli_query($link, $sql)) {
        echo "<script>
            alert('Request Delete Failed!');
            window.history.go(-1);
            </script>";
            exit();
    }

    echo "<script>
        alert('Request Delete Successfull!');
        window.history.go(-2);
        </script>";
    exit();




?>