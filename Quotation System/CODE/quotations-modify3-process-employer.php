
<?php include 'layouts/session.php'; ?>
<?php include ('layouts/config.php'); ?>

<?php
        $qno = $_SESSION['qno'];
        $fservice = $_POST['fservice'];

        // SET NEW SERVICE
        $sql = "UPDATE  quotation SET q_service = '$fservice' WHERE q_no = '$qno' ";
        var_dump($sql);
        mysqli_query($link, $sql);
        // SET NEW SERVICE

        // RESET STATUS
        $sql1 = "UPDATE  quotation SET q_status = 'Pending' WHERE q_no = '$qno' ";
        var_dump($sql1);
        mysqli_query($link, $sql1);
        // RESET STATUS

        mysqli_close($link);
        header ('Location: quotations-modify2-employer.php');
?>