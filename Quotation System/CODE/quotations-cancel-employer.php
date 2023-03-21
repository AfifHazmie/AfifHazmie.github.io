
<?php include 'layouts/session.php'; ?>
<?php include ('layouts/config.php'); ?>

<?php 

// GET THE QUOTATION NUMBER THAT WILL BE CANCELED
  if(isset($_GET['id']))
  {
    $qno = $_GET['id'];
  }
// GET THE QUOTATION NUMBER THAT WILL BE CANCELED

// SET STATUS INTO REJECTED
  $sql1 = " UPDATE quotation SET q_status = 'Discarded' WHERE q_no = '$qno' ";
  mysqli_query($link, $sql1);
// SET STATUS INTO REJECTED

// CONVERT ALL QUOTATIONS AND ITEMS THAT WILL BE DELETED INTO ZEROES
//  $sql2 = " UPDATE quotation SET q_no = 0 WHERE q_no = '$qno' ";
//  mysqli_query($link, $sql2);
// CONVERT ALL QUOTATIONS AND ITEMS THAT WILL BE DELETED INTO ZEROES



mysqli_close($link);
header ('Location: quotations-list-discard-employer.php');
?>