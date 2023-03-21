
<?php include 'layouts/session.php'; ?>
<?php include ('layouts/config.php'); ?>

<?php
$fbid = $_POST['fbid'];
$fstatus = $_POST['fstatus'];

// SQL UPDATE status
$sql = "UPDATE quotation SET q_status = '$fstatus' WHERE q_no = '$fbid'";
mysqli_query($link, $sql);
// SQL UPDATE status

// Set Quotation ID for Rejection
$_SESSION['reject'] = $fbid;
// Set Quotation ID Rejection

mysqli_close($link);

if($fstatus == "Rejected" )
{
	header ('Location: quotations-display-customer.php');
}
else
{
	header ('Location: quotations-display-customer.php');
}


?>

