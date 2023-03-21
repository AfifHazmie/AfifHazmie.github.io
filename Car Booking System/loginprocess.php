<?php
session_start();

//Connect to DB
include('dbconnect.php');

//Retrieve data from form 
$fic = $_POST['fic']; 
$fpwd = $_POST['fpwd']; 


//Get SQL User Data Based on login information(Retrieve operation)
$sql = "SELECT * FROM tb_users WHERE u_ic = '$fic'";

//Execute SQL
$result = mysqli_query($con, $sql);   //execute SQL statement
$row = mysqli_fetch_array($result);   //Retrieve result
$count = mysqli_num_rows($result); //Count result found

//Check Login
if($count == 1) //result found
{ //user found
     if(password_verify($fpwd, $row['u_pwd'])){
     $_SESSION["u_ic"] = true;
     $_SESSION['uic'] = $fic;
     $_SESSION['u_name'] = $row['u_name'];
     $_SESSION['u_type'] = $row['u_type'];
     

     //if admin
     if($_SESSION['u_type'] == 1){ 
     header ('location: admin.php');
     }

     //if customer
     else if($_SESSION['u_type'] == 2){   
     header ('location: customer.php');
     }

}
else //wrong password
{
   echo "<script>alert('Wrong password. Please try again!'); window.history.go(-1);</script>";
        exit();
}
}
else //result not found
{
	echo "<script>alert('No user found'); window.history.go(-1);</script>";
        exit();
}

//Close connection
mysqli_close($con);

?>