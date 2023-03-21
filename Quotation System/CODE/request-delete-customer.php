<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include 'layouts/config.php';?>

<!--avoid admin accessing the page-->
<?php if( isset($_SESSION["u_type"]) && $_SESSION["u_type"] !=2 ){  
    header("Location: pages-404-admin-error.php");
    }
?>
<head>
    <title>Powerec | Services</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>
<?php include 'layouts/body.php'; ?>
<?php include 'layouts/menu-customer.php'; ?>
<!------------retrieve data---------->
<?php 
$request_id = intval($_GET["request_id"]);
$sql = "SELECT * FROM request 
        LEFT JOIN service ON request.r_serviceid = service.sv_id
        WHERE request_id = '$request_id'" ;
$stmt=mysqli_query($link,$sql);
$row=mysqli_fetch_array($stmt);

?>
<!------------retrieve data----------->
          <div class="main-content">
            <div class="card">
              <div class="container mt-6">
                <br><br><br><br><br>
                   <h3>Request Details</h3><br>
                      <form class="from-horizontal" method = "POST" action = "request-delete-process-customer.php">
                        <table class="table table-hover">
                       <tr>
                        <td>Request ID</td>
                        <td><?php echo $row['request_id'];?></td>
                      </tr>
                      <tr>
                        <td>Service Name</td>
                        <td><?php echo $row['sv_name'];?></td>
                      </tr>
                        <tr>
                        <td>Service Price</td>
                        <td><?php echo $row['sv_price'];?></td>
                      </tr>
                        <tr>
                        <td>Service Description</td>
                        <td><?php echo $row['sv_desc'];?></td>
                      </tr>
              

                     <tr>
                        <td><input type="hidden" name="request_id" class="form-control" id="request_id" value="<?php echo $request_id; ?>">
                        </td>
                        <td><button type="submit" name="request_id" id="request_id" class="btn btn-danger"  value="<?php echo $request_id; ?>">Delete</button> </td>
                     </tr>


                  </table>


               </form>
            </div>
            </div>
           <?php include 'layouts/footer.php'; ?> 
         </div>
<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>






