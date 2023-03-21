<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

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

<?php include 'layouts/config.php';?>
<?php include 'layouts/body.php'; ?>
<!-- include database-->
<?php  
$customer_id = intval($_SESSION["id"]);
$sql = "SELECT * FROM request
        LEFT JOIN users ON request.r_customerid = users.id 
        LEFT JOIN service ON request.r_serviceid = service.sv_id
        LEFT JOIN status ON request.r_servicestatus = status.status_desc
        WHERE r_customerid = $customer_id AND r_servicestatus = 'Pending'";

$sql1 = "SELECT * FROM request
        LEFT JOIN users ON request.r_customerid = users.id 
        LEFT JOIN service ON request.r_serviceid = service.sv_id
        LEFT JOIN status ON request.r_servicestatus = status.status_desc
        WHERE r_customerid = $customer_id AND r_servicestatus = 'Rejected'";
        
$sql2 = "SELECT * FROM request
        LEFT JOIN users ON request.r_customerid = users.id 
        LEFT JOIN service ON request.r_serviceid = service.sv_id
        LEFT JOIN status ON request.r_servicestatus = status.status_desc
        WHERE r_customerid = $customer_id AND (r_servicestatus = 'Completed' OR r_servicestatus = 'Accepted')";

$stmt = mysqli_query($link, $sql);
$stmt1 = mysqli_query($link, $sql1);
$stmt2 = mysqli_query($link, $sql2);
?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu-customer.php'; ?>

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
                    <h4 class="mb-sm-0 font-size-18">Your Request</h4></div></div></div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Pending Requests"]; ?></h4><br><br> 
                                <form class="form-horizontal">
                                    <fieldset>
                                    <table id="datatable" class="table table-bordered dt-responsive">
                                        <thead>
                                            <tr class=text-center>
                                                <th class="align-middle" scope="col"><?php echo $language["Service Requested"]; ?></th>
                                                <th class="align-middle" scope="col"><?php echo $language["Request Status"]; ?></th>
                                                <th class="align-middle" scope="col"><?php echo $language["Delete Request"]; ?></th>
                                            </tr>
                                        </thead>
                                                <?php 
                                                while ($row=mysqli_fetch_assoc($stmt))
                                                    { ?>
                                                        <tr class=text-center>
                                                        <td class ='align-middle'><?php echo $row['sv_name']; ?></td>
                                                        <td class ='align-middle'><?php echo $row['r_servicestatus']; ?></td>
                                                        <td>
                                                        <a href="request-delete.php?request_id=<?php echo $row['request_id'];?>" class='bx bx-trash-alt'></a> &nbsp
                                                        </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                ?>          
                                    </table>
                                </fieldset>
                            </form>
                                </div>
                                <!-- Table for Requested Service -->

                            </div>
                        </div>
                    </div>
                </div>
            
            
            
            
            
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                <h4 class="mb-sm-0 font-size-18"><?php echo $language["Rejected Request"]; ?></h4><br><br> 
                                
                                
                                    <form class="form-horizontal">
                                        <fieldset>
                                        <table id="datatable" class="table table-bordered dt-responsive">
                                            <thead>
                                                <tr class=text-center>
                                                    <th class="align-middle" scope="col"><?php echo $language["Service Requested"]; ?></th>
                                                    <th class="align-middle" scope="col"><?php echo $language["Request Status"]; ?></th>
                                                    <th class="align-middle" scope="col"><?php echo $language["Comment"]; ?></th>
                                                    <th class="align-middle" scope="col"><?php echo $language["Delete Request"]; ?></th>
                                                </tr>
                                            </thead>
                                                    <?php 
                                                    while ($row1=mysqli_fetch_assoc($stmt1))
                                                        { ?>
                                                            <tr class=text-center>
                                                            <td class ='align-middle'><?php echo $row1['sv_name']; ?></td>
                                                            <td class ='align-middle'><?php echo $row1['r_servicestatus']; ?></td>
                                                            <td class ='align-middle'><?php echo $row1['r_comment']; ?></td>
                                                            <td>
                                                            <a href="request-delete.php?request_id=<?php echo $row1['request_id'];?>" class='bx bx-trash-alt'></a> &nbsp
                                                            </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                    ?>          
                                        </table>
                                    </fieldset>
                                </form>
                                    </div>
                                    <!-- Table for Requested Service -->

                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Accepted and Completed Request"]; ?></h4><br><br> 
                                <form class="form-horizontal">
                                    <fieldset>
                                    <table id="datatable" class="table table-bordered dt-responsive">
                                        <thead>
                                            <tr class=text-center>
                                                <th class="align-middle" scope="col"><?php echo $language["Service Requested"]; ?></th>
                                                <th class="align-middle" scope="col"><?php echo $language["Request Status"]; ?></th>
                                            </tr>
                                        </thead>
                                                <?php 
                                                while ($row2=mysqli_fetch_assoc($stmt2))
                                                    { ?>
                                                        <tr class=text-center>
                                                        <td class ='align-middle'><?php echo $row2['sv_name']; ?></td>
                                                        <td class ='align-middle'><?php echo $row2['r_servicestatus']; ?></td>
                                                    
                                                        </tr>
                                                    <?php
                                                    }
                                                ?>          
                                    </table>
                                </fieldset>
                            </form>
                                </div>
                                <!-- Table for Requested Service -->

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