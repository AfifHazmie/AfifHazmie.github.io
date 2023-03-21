<?php
include 'session.php';

if(!session_id())
{
	session_start();
}
// Connect to DB
include ('dbconnect.php');

//Retrieve data from form
$fuic = $_SESSION['uic'];
$fcar = $_POST['fcar'];
$fbdate = $_POST['fbdate'];
$frdate = $_POST['frdate'];

//Calculate the total rent
$pickup = date('Y-m-d H:i:s',strtotime($fbdate)); 
$return = date('Y-m-d H:i:s',strtotime($frdate)); 
$daydiff = abs(strtotime($frdate) - strtotime($fbdate));
$numday = $daydiff/(60*60*24);

//Get Vehicle Price
$sqlprice = "SELECT v_price FROM tb_vehicle WHERE v_id ='$fcar'";
$resultprice = mysqli_query($con, $sqlprice);
$rowprice = mysqli_fetch_array($resultprice);

//Calculate total price
$totalprice = $numday*($rowprice['v_price']);



if(strtotime($frdate) > strtotime($fbdate)){
// SQL Insert(CREATE) operation
$sql = "INSERT INTO tb_booking (b_customer, b_vehicle, b_bdate, b_rdate, b_total, b_status)
		VALUES ('$fuic','$fcar','$fbdate','$frdate','$totalprice', '1')";

// Check SQL execution
		var_dump($sql);

//Redirect or successful notification 
if(!mysqli_query($con, $sql)) {
        echo "<script>
            alert('Booking process failed!');
            window.location.href = 'customermanage.php';
            </script>";
            exit();
    }

    echo "<script>
        alert('Booking successfull!');
        window.location.href = 'customermanage.php';
        </script>";
    exit();
}
else{
        echo "<script>alert('Booking Date is incorrect!'); window.history.go(-1);</script>";
        exit();
}

?>
