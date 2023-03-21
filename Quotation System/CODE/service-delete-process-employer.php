 <?php 


include("layouts/config.php");
include("layouts/session.php");

$sv_id = $_POST['sv_id'];

$sql = "DELETE FROM service WHERE sv_id = '$sv_id'";
    
if(!mysqli_query($link, $sql)) {
        echo "<script>
            alert('Service Delete Failed!');
            window.history.go(-1);
            </script>";
            exit();
    }

    echo "<script>
        alert('Service Delete Successfull!');
        window.history.go(-2);
        </script>";
    exit();




?>