 <?php 

if(!session_id())
{
    session_start();
}
include("layouts/config.php");
include("layouts/session.php");

$request_id = $_POST['request_id'];
$r_servicestatus = $_POST['r_servicestatus'];

	$sql = "UPDATE request  SET r_servicestatus ='$r_servicestatus' WHERE request_id ='$request_id'";
	
$result = mysqli_query($link, $sql);
mysqli_close($link);


header('Location: service-request-employer.php')
?>