<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Powerec | Services</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/config.php';?>
<?php include 'layouts/body.php'; ?>
<?php include 'layouts/menu-admin-employer.php'; ?>
<?php 
$sv_id = intval($_GET["service"]);
$sql = "SELECT * FROM service WHERE sv_id = '$sv_id'" ;
$stmt=mysqli_query($link,$sql);
$row=mysqli_fetch_array($stmt);

?>
<div id="layout-wrapper">
  <div class="main-content">
    <div class="container mt-6">
      <div class="card">
        <div class="card-body">
          <br><br><br><br><br>
            <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h3 class=" font-size-18"><?php echo $language["Service Detail"]; ?></h3>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="service-employer.php"><?php echo $language["back"]; ?></a></li>
                                        <li class="breadcrumb-item active"><?php echo $language["Service Detail"]; ?></li>
                                    </ol>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <br>
                    <form class="from-horizontal" method = "POST" action = "service-delete-process-employer.php">
                      <table class="table table-hover">
                     <tr>
                      <td><?php echo $language["Service ID"]; ?></td>
                      <td><?php echo $row['sv_id'];?></td>
                    </tr>
                    <tr>
                      <td><?php echo $language["Service Name"]; ?></td>
                      <td><?php echo $row['sv_name'];?></td>
                    </tr>
                    <tr>
                      <td><?php echo $language["Service Description"]; ?></td>
                      <td><?php echo $row['sv_desc'];?></td>
                    </tr>
            
                   <tr>
                      <td><input type="hidden" name="sv_id" class="form-control" id="sv_id" value="<?php echo $sv_id; ?>">
                      </td>
                      <td><button type="submit" name="sv_id" id="sv_id" class="btn btn-danger"  value="<?php echo $sv_id; ?>"><?php echo $language["Delete"]; ?></button> </td>
                   </tr>


                </table>


             </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include 'layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- Ion Range Slider-->
<script src="assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="assets/libs/table-edits/build/table-edits.min.js"></script>
<!-- init js -->
<script src="assets/js/pages/product-filter-range.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>






