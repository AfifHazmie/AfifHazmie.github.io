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

<!-- DEDICATED AREA FOR PHP ALGORITHM -->

    <!-- Extract information of all qotation with id of this customer -->
        <?php 
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM quotation
                LEFT JOIN service ON quotation.q_no = service.sv_id
                LEFT JOIN users ON quotation.q_cid = users.id
                WHERE id = '$id' AND q_status = 'Pending' ";
        $result = mysqli_query($link, $sql); ?>
    <!-- Extract information of all qotation with id of this customer -->

<!-- DEDICATED AREA FOR PHP ALGORITHM -->

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/vertical-menu-customer.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">

                <!-- start page title -->
                    <div class="row">
                    <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><?php echo $language["Quotation Management Section"]; ?></h4></div></div></div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4"><?php echo $language["Pending List"]; ?></h4>
                                  <!-- Registration Form -->
                                  <form class="form-horizontal">
                                    <fieldset>
                                      <table id="datatable" class="table table-bordered dt-responsive">
                                        <!-- Table Header -->
                                        <thead class="table-light">
                                          <tr class=text-center>
                                            <th class="text-center" scope="col"><?php echo $language["Quotation No."]; ?></th>
                                            <th class="text-center" scope="col"><?php echo $language["Customer ID"]; ?></th>
                                            <th class="text-center" scope="col"><?php echo $language["Service"]; ?></th>
                                            <th class="text-center" scope="col"><?php echo $language["Date Created"]; ?></th>
                                            <th class="text-center" scope="col"><?php echo $language["Action"]; ?></th>        
                                          </tr>
                                        </thead>
                                        <!-- Table Header -->


                                <!-- DISPLAY ALL ITEMS WITH THOSE QUOTATION NUMBERS THAT MATCHES THE CURRENT VALUE -->
                                        <?php
                                        while ($row = mysqli_fetch_array($result))
                                        { ?>
                                            <tr class=text-center>
                                                <td><?php echo $row['q_no']; ?></td>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['sv_name']; ?></td>
                                                <td><?php echo $row['q_date']; ?></td>
                                                <td>
                                                    <a href="quotations-display-process-customer.php?id=<?php echo $row["q_no"]; ?>" class="btn btn-primary waves-effect waves-light"><?php echo "Approval"; ?></a>&nbsp

                                                    <a href="quotations-details-customer.php?id=<?php echo $row["q_no"]; ?>" class="btn btn-light waves-effect waves-light"><?php echo "View"; ?></a>&nbsp
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        mysqli_close($link);
                                        ?>
                                <!-- DISPLAY ALL ITEMS WITH THOSE QUOTATION NUMBERS THAT MATCHES THE CURRENT VALUE -->
                                      </table>
                                    </fieldset>
                                </form><br><br>
                                  <!-- Registration Form -->
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