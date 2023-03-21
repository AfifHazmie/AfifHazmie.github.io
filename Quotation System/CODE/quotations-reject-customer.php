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

    <!-- Quotation ID -->
        <?php
        $fbid = $_SESSION['reject'] ?>
    <!-- Quotation ID -->

<!-- Reserved place to write php formula -->

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/vertical-menu-customer.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18">Reject Quotation</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Reason</h4>

                                <form class="form-horizontal" method="POST" action="quotations-reject-customer-process.php">
                                    <fieldset>

                                        <!-- Get Reason for quotation Rejection admin  -->
                                        <div class="form-group">
                                            <label for="textArea" class="col-lg control-label">Describe your reason for rejecting the quotation</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" name="fidesc" rows="3" placeholder="Describe reason here..." required></textarea>
                                            </div>
                                        </div><br>
                                        <!-- Get Item Description from admin  -->

                                        <div class="row justify-content-end">
                                            <div class="col-lg">
                                                <a onclick="return confirm('Thank you for your corporation. We will address the matter soon.');"><button type="submit" class="btn btn-primary btn-rounded w-md">Submit</button></a>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
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