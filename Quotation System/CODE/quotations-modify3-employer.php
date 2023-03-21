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

    <!-- Get Quotation ID -->
    <?php 
     if(isset($_GET['id']))
    {
    $qno = $_GET['id'];

    $_SESSION['qno'] = $qno;
    }?>

    <!-- Get Quotation ID -->

    <!-- Display types of service -->
        <?php 
        $sql_service = "SELECT * FROM service ";
        $result_service = mysqli_query($link, $sql_service); ?>
    <!-- Display types of service -->

    <!-- Display types of service -->
        <?php 
        $sql1 = "   SELECT * FROM item WHERE i_qno = '$qno' ";
        $result1 = mysqli_query($link, $sql1); 
        $row1 = mysqli_fetch_array($result1);
        ?>
    <!-- Display types of service -->

<!-- Reserved place to write php formula -->


<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/vertical-menu-admin-employer.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">Modify Quotation #<?php echo $qno ?></h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="quotations-list-reject-employer.php"><?php echo $language["Back"]; ?></a></li>
                                        <li class="breadcrumb-item active"><?php echo $language["Manage"]; ?></li>
                                    </ol>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">


                                <h4 class="card-title mb-4">Modify Previous Service</h4>
                                <form class="form-horizontal" method="POST" action="quotations-modify3-process-employer.php">
                                    <fieldset>
                                    <!-- Get New Service -->
                                        <div class="row mb-6">
                                            <label for="fservice" class="col-form-label col-lg-3">Select new service</label>
                                            <div class="col-lg-6">
                                                <!-- Display types of service -->
                                                <?php 
                                                    echo '<select name="fservice" class="form-control">';
                                                    while ($row_service = mysqli_fetch_array($result_service))
                                                    {
                                                    echo "<option value = '".$row_service['sv_id']."' > ".$row_service['sv_name']." </option>";
                                                    } echo "</select>";
                                                ?><!-- Display types of service -->
                                            </div><br><br><br>
                                        </div>
                                    <!-- Get customer Service -->
                                        <div class="row justify-content-end">
                                            <div class="col-lg-9">
                                            <button type="submit" class="btn btn-primary">Modify Quotation</button>
                                            </div>
                                        </div>
                                    </fieldset> 
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>


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

</body>

</html>