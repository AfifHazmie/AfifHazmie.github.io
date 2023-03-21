        
<?php include 'layouts/session.php'; ?>
<?php include ('layouts/config.php'); ?>


<?php 

// GET QUOTATION NUMBER

        $sql = "SELECT * FROM quotation";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
    
// GET QUOTATION NUMBER


// LABEL ALL ITEM AS THE CURRENT QUOTATION NUMBER
        $fidesc = $_POST['fidesc'];
        $funit = $_POST['funit'];
        $fqty = $_POST['fqty'];
        $ftotal = $funit*$fqty;
        $sql1 = "INSERT INTO item (i_qno, i_desc, i_unitPrice, i_qty, i_total)
                 VALUES ('$count','$fidesc', '$funit', '$fqty', '$ftotal')";
        var_dump($sql1);
        $result1 = mysqli_query($link, $sql1);
// LABEL ALL ITEM AS THE CURRENT QUOTATION NUMBER

// CALCULATE SUM
        $sql2 = "SELECT SUM(i_total) AS totalSum  FROM item WHERE i_qno = '$count' ";
        $result2 = mysqli_query($link, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $newTotal = $row2['totalSum'];
// CALCULATE SUM

// UPDATE TABLE
        $sql3 = "UPDATE quotation SET q_total = ROUND('$newTotal', 3)  WHERE q_no = '$count' ";
        mysqli_query($link, $sql3);
// UPDATE TABLE


mysqli_close($link);
header ('Location: quotations-item-employee.php');
?>