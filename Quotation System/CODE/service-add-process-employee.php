 <?php 


include("layouts/config.php");
include("layouts/session.php");

$sv_name = $_POST['sv_name'];
$sv_desc = $_POST['sv_desc'];
$picture = $_POST['photo'];


$sql = "INSERT INTO service (sv_name, sv_desc, picture) VALUES ('$sv_name', '$sv_desc', '$picture')";
    
if(!mysqli_query($link, $sql)) {
        echo "<script>
            alert('User Edit Failed!');
            
            </script>";
            exit();
    }

    echo "<script>
        alert('User Edit Successfull!');
        
        </script>";
    exit();




?>