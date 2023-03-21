
<?php include 'layouts/session.php'; ?>
<?php include ('layouts/config.php'); ?>

<?php 

//GET ITEM NO TO BE DELETED
        if(isset($_GET['id']))
        {
        $item = $_GET['id'];
        }
//GET ITEM NO TO BE DELETED

//GET THE QUOTATION NUMBER OF THAT ITEM
        $sql = "SELECT * FROM quotation WHERE q_no";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);
//GET THE QUOTATION NUMBER OF THAT ITEM

//GET ITEM PRICE
        $sql1 = "SELECT * FROM item WHERE i_no = '$item' ";
        $result1 = mysqli_query($link, $sql1);
        $row1 = mysqli_fetch_array($result1);
        $delTotal = $row1['i_total'];
//GET ITEM PRICE 

//GET TOTAL ITEM PRICE 
        $sql2 = "SELECT * FROM quotation WHERE q_no = '$count' ";
        $result2 = mysqli_query($link, $sql2);
        $row2 = mysqli_fetch_array($result2);
        $prevTotal = $row2['q_total'];
//GET TOTAL ITEM PRICE 

//CALCULATE NEW TOTAL AFTER SUBTRACTION OF THAT ITEM 
        $newTotal =  $prevTotal - $delTotal;
//CALCULATE NEW TOTAL AFTER SUBTRACTION OF THAT ITEM 

//UPDATE TOTAL AT QUOTATION TABLE IN DATABASE
        $sql3 = "UPDATE quotation SET q_total = '$newTotal' WHERE q_no = '$count' ";
        mysqli_query($link, $sql3);
//UPDATE TOTAL AT QUOTATION TABLE IN DATABASE

//DELETE ITEM FROM DATABASE
        $sql4 = "DELETE FROM item WHERE i_no = '$item' ";
        mysqli_query($link, $sql4);
//DELETE ITEM FROM DATABASE

mysqli_close($link);
header ('Location: quotations-item-employer.php');
?>