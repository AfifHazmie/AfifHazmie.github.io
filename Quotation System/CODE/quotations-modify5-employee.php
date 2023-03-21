
<?php include 'layouts/session.php'; ?>
<?php include ('layouts/config.php'); ?>

<?php
$fbid = $_POST['fbid'];
$fstatus = $_POST['fstatus'];

// SQL UPDATE status
$sql = "UPDATE quotation SET q_status = '$fstatus' WHERE q_no = '$fbid'";
mysqli_query($link, $sql);
// SQL UPDATE status

mysqli_close($link);

if($fstatus == "Completed" )
{
	header ('Location: quotations-list-complete-employee.php');
}
else
{
	header ('Location: quotations-list-accept-employee.php');
}
?>

