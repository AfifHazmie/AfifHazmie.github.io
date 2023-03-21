<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Orders | Skote - Admin & Dashboard Template</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/config.php';?>
<?php include 'layouts/body.php'; ?>
<?php include 'layouts/menu-customer.php'; ?>
<?php 
$request_id = intval($_GET["request_id"]);
$sql = "SELECT * FROM request 
        LEFT JOIN service ON request.r_serviceid = service.sv_id
        WHERE request_id = '$request_id'" ;
$stmt=mysqli_query($link,$sql);
$row=mysqli_fetch_array($stmt);

?>

<div id="layout-wrapper">
    <div class="main-content">
    <div class="container mt-6">
<div class="card">
<div class="card-body">
<div class="container mt-6">
<br><br><br><br><br>
  <h3>Request Details</h3>
                          <div class="row">
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="service-request-customer.php">Request</a></li>
                                    <li class="breadcrumb-item active">Request Detail</li>
                                </ol>
                            </div>
                          </div><br>
  <form class="from-horizontal" method = "POST" action = "request-delete-process.php">
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
</div>
</div>
</div>
</div>
<?php include 'layouts/footer.php'; ?>
<?php include 'layouts/right-sidebar.php'; ?>
<?php include 'layouts/vendor-scripts.php'; ?>
<script src="assets/js/app.js"></script>

