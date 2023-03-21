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

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

</head>

<!-- PHP LOADING AREA ONLY. OTHER FORMATS NOT ALLOWED -->

    <!-- This instruction is for first time use only, since no data in table and will give error -->
        <?php 
        $sql = "SELECT * FROM quotation";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result); ?>
    <!-- This instruction is for first time use only, since no data in table and will give error -->

<!-- PHP LOADING AREA ONLY. OTHER FORMATS NOT ALLOWED -->

<?php include 'layouts/body.php'; ?>

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
                    <h4 class="mb-sm-0 font-size-18"><?php echo $language["History Section"]; ?></h4></div></div></div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Completed Quotations"]; ?></h4><br><br> 
                              <table id="datatable" class="table table-bordered dt-responsive">
                                <!-- Table Header -->
                                <thead class="table-light">
                                  <tr class=text-center>
                                    <th class="align-middle" scope="col"><?php echo $language["Quotation ID"]; ?></th>
                                    <th class="align-middle" scope="col"><?php echo $language["Customer Name"]; ?></th>
                                    <th class="align-middle" scope="col"><?php echo $language["Service"]; ?></th>
                                    <th class="align-middle" scope="col"><?php echo $language["Manage"]; ?></th>      
                                  </tr>
                                </thead>
                                <!-- Table Header -->


                        <!-- DISPLAY ALL ITEMS WITH THOSE QUOTATION NUMBERS THAT MATCHES THE CURRENT VALUE -->
                                <?php
                                if($count != 0)
                                {       
                                    $sql1 ="SELECT * FROM quotation
                                            LEFT JOIN service ON quotation.q_service = service.sv_id
                                            LEFT JOIN users ON quotation.q_cid = users.id
                                            LEFT JOIN status ON quotation.q_status = status.status_desc
                                            WHERE q_status = 'Completed' ";
                                    $result1 = mysqli_query($link, $sql1); ?>

                                    <?php while ($row1 = mysqli_fetch_array($result1))
                                    {
                                    ?>
                                    <tr class=text-center>
                                        <td><?php echo $row1['q_no']; ?></td>
                                        <td><?php echo $row1['username']; ?></td>
                                        <td><?php echo $row1['sv_name']; ?></td>
                                        <td>
                                            <a href="quotations-details-employee.php?id=<?php echo $row1["q_no"]; ?>" class="btn btn-light btn-rounded waves-effect waves-light"><?php echo "View"; ?></a>&nbsp
                                        </td>
                                    </tr>
                                    <?php
                                    } ?>

                                <?php
                                }
                                else
                                {
                                   
                                } ?>
                        <!-- DISPLAY ALL ITEMS WITH THOSE QUOTATION NUMBERS THAT MATCHES THE CURRENT VALUE -->

                              </table>
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

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<script src="assets/js/app.js"></script>

</body>

</html>