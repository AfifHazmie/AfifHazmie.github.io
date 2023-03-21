
<?php include 'layouts/session.php'; ?>
<?php include ('layouts/config.php'); ?>

<?php 

        // Get Data
        $fcount = $_POST['count'];
        $fcid = $_POST['fcid'];
        $fservice = $_POST['fservice'];
        // Get Data

        if($fcount == 0)
        {
                $sql = "INSERT INTO quotation (q_cid, q_service, q_total, q_status) #Initial state for a new quotation
                        VALUES ('$fcid','$fservice','0.00','Pending')";
                var_dump($sql);
                mysqli_query($link, $sql);
                mysqli_close($link);
                header ('Location: quotations-item-employer.php');               
        }
        else
        {
                echo "<script>alert('Quotation not created. No available accepted request to quote! Returning to create new quotation page.'); window.location.href='quotations-create-employer.php';</script>";
        exit();
        }

?>