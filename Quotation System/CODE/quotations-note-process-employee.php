        
<?php include 'layouts/session.php'; ?>
<?php include ('layouts/config.php'); ?>


<?php 
// INSERT NOTES IF THIS WAS THE MAIN QUOTATION
        $fid = $_POST['fid'];
        $fnote = $_POST['fnote'];
        $sql1 = "REPLACE INTO note (note_qid, note_desc)
                 VALUES ('$fid','$fnote')";
        var_dump($sql1);
        mysqli_query($link, $sql1);
// INSERT NOTES IF THIS WAS THE MAIN QUOTATION

// INSERT NEW NOTES IF THE CURRENT NOTES HAS BEEN ALTERED
        $sql2 = "UPDATE note SET note_desc = '$fnote' WHERE note_qid = '$fid' " ;
        var_dump($sql2);
        mysqli_query($link, $sql2);
// INSERT NEW NOTES IF THE CURRENT NOTES HAS BEEN ALTERED
mysqli_close($link);
header ('Location: quotations-receipt-employee.php');
?>