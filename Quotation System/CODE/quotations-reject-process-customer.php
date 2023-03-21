
<?php include 'layouts/session.php'; ?>
<?php include ('layouts/config.php'); ?>

<?php
$fbid = $_POST['fbid'];
$fstatus = $_POST['fstatus'];

// SQL UPDATE status
$sql = "UPDATE quotation SET q_status = '$fstatus' WHERE q_no = '$fbid'";
mysqli_query($link, $sql);
// SQL UPDATE status

// Set Session for Rejection
$_SESSION['reject'] = $fbid;
// Set Session for Rejection

mysqli_close($link);

if($fstatus == "Rejected" )
{
	header ('Location: quotations-reject-customer.php');
}
else
{
	header ('Location: quotations-display-customer.php');
}


?>

