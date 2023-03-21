<?php 

session_start();
//avoid employee and employer accessing the page-->
if( isset($_SESSION["u_type"]) && $_SESSION["u_type"] !=2 ){  
    header("Location: pages-404-admin-error.php");
die('Only  logged in users can access this page!'); 
} 

include("../layouts/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

    extract($_POST);

    if(empty($useremail)) {
        $_SESSION["useremail_err"] = "Please Enter User Email";
        echo "<script>window.history.go(-1);</script>";
        exit();
    }

    if(empty($username)) {
        $_SESSION["username_err"] = "Please Enter User Name";
        echo "<script>window.history.go(-1);</script>";
        exit();
    }

    if(empty($useraddress)) {
        $_SESSION["useraddress_err"] = "Please Enter Your Address";
        echo "<script>window.history.go(-1);</script>";
        exit();
    }

    if(empty($userphone)) {
        $_SESSION["userphone_err"] = "Please Enter Phone Number";
        echo "<script>window.history.go(-1);</script>";
        exit();
    }

    $sql = "UPDATE users SET useremail = '$useremail', username='$username', useraddress='$useraddress', userphone='$userphone' 
    WHERE id = '$user_id'";

    if(!mysqli_query($link, $sql)) {
        echo "<script>
            alert('User Edit Failed!');
            window.history.go(-1);
            </script>";
            exit();
    }
    $_SESSION['username'] = $username;
    $_SESSION['useremail'] = $useremail;
    $_SESSION['useraddress'] = $useraddress;
    $_SESSION['userphone'] = $userphone;
    echo "<script>
        alert('Profile Edit Successfull!');
        window.location.href='../customer.php';
        </script>";
    exit();

}

?>