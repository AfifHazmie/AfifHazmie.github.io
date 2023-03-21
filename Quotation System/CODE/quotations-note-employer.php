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

    <!-- Display Quotation ID -->
        <?php 
        $sql_qid = "SELECT * FROM quotation";
        $result_qid = mysqli_query($link, $sql_qid);
        $row_qid = mysqli_fetch_array($result_qid);
        $count = mysqli_num_rows($result_qid); ?>
    <!-- Display Quotation ID -->

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
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Quotation Notes"]; ?></h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4"><?php echo $language["Final Notes"]; ?></h4>

                                <form class="form-horizontal" method="POST" action="quotations-note-process-employer.php">
                                    <fieldset>

                                        <!-- Get Final Notes from Employer  -->
                                        <div class="form-group">
                                            <label for="textArea" class="col-lg-2 control-label"><?php echo $language["Notes"]; ?></label>
                                            <div class="col-lg-10">
                                            <textarea class="form-control" name="fnote" rows="3" placeholder="Enter any final notes for the quotation..."></textarea>
                                            </div>
                                        </div><br>
                                        <!-- Get Final Notes from Employer  -->

                                    <!-- This is where to get quotation ID -->
                                        <div class="row mb-4">
                                            <div class="col-lg-8">
                                                <input type="hidden" name="fid" class="form-control" id="fbid" value="<?php echo $count; ?>">
                                            </div>
                                        </div>
                                    <!-- This is where to get quotation ID -->

                                <div class="row justify-content-end">
                                    <div class="col-lg">
                                        <a onclick="return confirm('Quotation will be completed. Continue?');"><button type="submit" class="btn btn-success btn-rounded w-md"><?php echo $language["Done"]; ?></button></a>
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

</body>

</html>