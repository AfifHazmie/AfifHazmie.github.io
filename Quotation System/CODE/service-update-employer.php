<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Powerec | Services</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/config.php';?>
<?php include 'layouts/body.php'; ?>
<?php include 'layouts/menu-admin-employee.php'; ?>
<?php 
$sv_name = $sv_price =  $sv_desc =  "";
$sv_id = intval($_GET["service"]);
$sql = "SELECT * FROM service WHERE sv_id = '$sv_id'";
$stmt=mysqli_query($link,$sql);

?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h2 class=" font-size-18"><?php echo $language["Add service"]; ?></h2>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="service-employer.php"><?php echo $language["back"]; ?></a></li>
                                        <li class="breadcrumb-item active"><?php echo $language["Edit"]; ?></li>
                                    </ol>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

            <form class="from-horizontal" method = "POST" action = "service-update-process-employee.php">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label"><?php echo $language["Service ID"]; ?></label>
                                        <div class="col-md-10">
                                            <?php echo $sv_id;?> 
                                            <input type="hidden" class="form-control" id="sv_id" name="sv_id" placeholder="Update Service Name" value="<?php echo $sv_id; ?>">
                                        </div>
                                    <div class="mb-3 row">
                                        <label for="example-text-input" class="col-md-2 col-form-label"><?php echo $language["Service Name"]; ?></label>
                                        <div class="col-md-10">
                                            <input type="sv_name" class="form-control" id="sv_name" name="sv_name" placeholder="Update Service Name" value="<?php echo $sv_name; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3 row">
                                        <label for="example-email-input" class="col-md-2 col-form-label"><?php echo $language["Service Description"]; ?></label>
                                        <div class="col-md-10">
                                            <input type="sv_desc" class="form-control" id="sv_desc" name="sv_desc" placeholder="Update Service Description" value="<?php echo $sv_desc; ?>">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                        <div class="mt-4 d-grid">
                            <button class="btn btn-primary waves-effect waves-light" type="submit"><?php echo $language["Update"]; ?></button>
                        </div>
            </form>
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






