<?php
//avoid customer accessing the page
if( isset($_SESSION['u_type']) && $_SESSION['u_type'] !=1 ){  
    echo "<script>alert('Only admin can access this page!'); window.location.href='login.php';</script>"; 
die('Only  logged in users can access this page!'); 
} 
?>