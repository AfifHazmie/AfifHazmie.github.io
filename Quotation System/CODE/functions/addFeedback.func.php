<?php 

session_start();
include("../layouts/config.php");


if($_SERVER["REQUEST_METHOD"] == "POST") {
    extract($_POST);

    $customer_id = intval($_SESSION["id"]);

    if(empty($rating)) {
        echo "<script>alert('Please Select A Rating!'); window.history.go(-1);</script>";
        exit();
    }

    

    $sql = "INSERT INTO feedback (f_customerid, f_qno, f_rating, f_comment, f_topic) VALUES ('$customer_id', '$quotation','$rating', '$remarks', '$topic')";

    if(!mysqli_query($link, $sql)) {
        echo "<script>alert('Add Feedback Failed!'); window.history.go(-1);</script>";
        exit();
    } else {
        echo "<script>alert('Add Feedback Successfully!'); window.location.href='../quotations-display-complete-customer.php?id=$quotation';</script>";
        exit();
    }
}

?>

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>