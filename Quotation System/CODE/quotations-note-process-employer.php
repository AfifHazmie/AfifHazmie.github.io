        
<?php include 'layouts/session.php'; ?>
<?php include ('layouts/config.php'); ?>


<?php 
// INSERT NOTES
        $fid = $_POST['fid'];
        $fnote = $_POST['fnote'];

        $sql1 = "REPLACE INTO note (note_qid, note_desc)
                 VALUES ('$fid','$fnote')";
        var_dump($sql1);
        mysqli_query($link, $sql1);
// INSERT NOTES
mysqli_close($link);
header ('Location: quotations-receipt-employer.php');
?>