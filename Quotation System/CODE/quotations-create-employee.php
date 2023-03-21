<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include ('layouts/config.php'); ?>
<head>
    <title>Powerec | Quotation</title>
    <?php include 'layouts/head.php'; ?>
    <link href="assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- dropzone css -->
    <link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>

<!-- Reserved place to write php formula -->

    <!-- Display types of service -->
        <?php 
        $sql_service = "SELECT * FROM service ";
        $result_service = mysqli_query($link, $sql_service); ?>
    <!-- Display types of service -->

<!-- Reserved place to write php formula -->

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/vertical-menu-admin-employee.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">


                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18"><i class="mdi mdi-bullseye-arrow me-3"></i><?php echo $language["Creating New Quotation"]; ?></h4>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4"><?php echo $language["New Quotation"]; ?></h4>

                                <form class="form-horizontal" method="POST" action="quotations-create-process-employee.php">
                                    <fieldset>
                                        
                                    <!-- This is where to get customer Name -->
                                        <div class="row mb-4">
                                            <label for="inputid" class="col-form-label col-lg-2"><?php echo $language["Customer ID"]; ?></label>
                                            <div class="col-lg-4">
                                                <?php 
                                                    $sql = "SELECT DISTINCT id FROM users
                                                            LEFT JOIN request ON users.id = request.r_customerid
                                                            WHERE id = r_customerid AND r_servicestatus = 'Accepted'
                                                            ORDER BY id ";
                                                    $result = mysqli_query($link,$sql);
                                                    echo '<select name="fcid" class="form-control" id="fcid" required>';
                                                    echo "<option value=''>No data selected</option>";
                                                    while($row=mysqli_fetch_array($result))
                                                    {
                                                        echo "<option value='".$row['id']."'>".$row['id']."</option>";
                                                    }
                                                    echo "</select>";
                                                  ?> 
                                            </div>
                                        </div>
                                    <!-- This is where to get customer Name -->


                                    <!-- Get customer Service -->
                                    <div class="row mb-4">
                                        <label for="fservice" class="col-form-label col-lg-2"><?php echo $language["Select Service"]; ?></label>
                                        <div class="col-lg-4">

                                            <!-- Display types of service -->
                                            <?php 
                                                echo '<select name="fservice" class="form-control" required>';
                                                echo "<option value=''>No data selected</option>";
                                                while ($row_service = mysqli_fetch_array($result_service))
                                                {
                                                    echo "<option value = '".$row_service['sv_id']."' > ".$row_service['sv_name']." </option>";
                                                } echo "</select>";
                                            ?><!-- Display types of service -->

                                        </div><br><br>
                                    </div>
                                    <!-- Get customer Service -->

                                    <!-- Get count -->
                                    <?php $count = mysqli_num_rows($result); ?>
                                    <input type="hidden" name="fcount" class="form-control" id="fcount" value="<?php echo $count; ?>">
                                    <!-- Get count -->

                                <div class="row justify-content-end">
                                    <div class="col-lg-10">
                                        <a onclick="return alert('Warning. Creating new quotation. Do not press Back button');"><button type="submit" class="btn btn-primary"><?php echo $language["Create"]; ?></button></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        </fieldset>
                    </form>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- bootstrap datepicker -->
<script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<!-- dropzone plugin -->
<script src="assets/libs/dropzone/min/dropzone.min.js"></script>

<script src="assets/js/app.js"></script>
