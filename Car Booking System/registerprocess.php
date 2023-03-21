<?php

//Connect to DB
include('dbconnect.php');

//Retrieve data from form 
$fic = $_POST['fic']; 
$fpwd = $_POST['fpwd']; 
$fname = $_POST['fname']; 
$fphone = $_POST['fphone']; 
$faddress = $_POST['faddress']; 
$fhashpwd = password_hash($fpwd, PASSWORD_DEFAULT);


if(isset($_POST['s']))
{
    $fpwd = $_POST['fpwd'] ;
    $cfpwd = $_POST['cfpwd'] ;

    if($fpwd != $cfpwd)//both pass not match
    {
        echo "<script>alert('Password not Match'); window.location.href='register.php'</script>";
        exit();

    }

    else
    {
    // SQL Insert (CREATE) operation
	$sql = "INSERT INTO tb_users (u_ic, u_pwd, u_name, u_phone, u_address, u_type)
		VALUES ('$fic','$fhashpwd','$fname', '$fphone', '$faddress', '2')";

	//Execute SQL
	mysqli_query($con, $sql);

	//Close connection
	mysqli_close($con);

	//Redirect or successful notification
	echo "<script>alert('Register Successfull'); window.location.href='login.php';</script>";
        exit();
     } 
}
?>
