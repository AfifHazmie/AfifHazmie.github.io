 <?php 


include("layouts/config.php");
include("layouts/session.php");
$sv_id = $_POST['sv_id'];
$sv_name = $_POST['sv_name'];
$sv_desc = $_POST['sv_desc'];


$sql = "UPDATE service SET sv_name = '$sv_name', sv_desc='$sv_desc' WHERE sv_id = '$sv_id'";   

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