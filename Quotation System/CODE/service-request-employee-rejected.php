<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Powerec | Services</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
    
    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    
    
    
    
</head>

<?php include 'layouts/config.php';?>
<?php include 'layouts/body.php'; ?>
<!-- include database-->
<?php  

$sql = "SELECT * FROM request
        LEFT JOIN users ON request.r_customerid = users.id 
        LEFT JOIN service ON request.r_serviceid = service.sv_id
        LEFT JOIN quotation ON request.request_id = quotation.q_no
        LEFT JOIN status ON request.r_servicestatus = status.status_desc
        WHERE r_servicestatus = 'Rejected'";



$stmt = mysqli_query($link, $sql);


?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu-admin-employee.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18"><i class="mdi mdi-bullseye-arrow me-3"></i><?php echo $language["Incoming Request"]; ?></h4>
                             
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-10">
                        <div class="mt-10">
                                <a href = "service-request-employee.php"type="button" class="btn btn-primary btn-lg waves-effect waves-light"><?php echo $language["Pending"]; ?></a>
                                <a href = "service-request-employee-accepted.php"type="button" class="btn btn-primary btn-lg waves-effect waves-light"><?php echo $language["Accepted"]; ?></a>
                                <a href = "service-request-employee-rejected.php"type="button" class="btn btn-primary btn-lg waves-effect waves-light"><?php echo $language["Rejected"]; ?></a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                            <h5 class="mb-sm-0 font-size-18"><?php echo $language["Rejected Request"]; ?></h5><br><br> 
                                <form class="form-horizontal">
                                    <fieldset>
                                    <table id="datatable" class="table table-bordered dt-responsive">
                                        <thead>
                                            <tr class=text-center>
                                                <th class="align-middle" scope="col"><?php echo $language["Customer Name"]; ?></th>
                                                <th class="align-middle" scope="col"><?php echo $language["Customer ID"]; ?></th>
                                                <th class="align-middle" scope="col"><?php echo $language["Customer Phone"]; ?></th>
                                                <th class="align-middle" scope="col"><?php echo $language["Service Requested"]; ?></th>
                                                <th class="align-middle" scope="col"><?php echo $language["Address"]; ?></th>
                                                <th class="align-middle" scope="col"><?php echo $language["Status"]; ?></th>
                                                <th class="align-middle" scope="col"><?php echo $language["Update"]; ?></th>
                                            </tr>
                                        </thead>
                                                <?php 
                                            while ($row=mysqli_fetch_assoc($stmt)){

                                            echo "<tr>";
                                            echo "<td class ='align-middle'>".$row['username']."</td>";
                                            echo "<td class ='align-middle'>".$row['r_customerid']."</td>";
                                            echo "<td class ='align-middle'>".$row['userphone']."</td>";
                                            echo "<td class ='align-middle'>".$row['sv_name']."</td>";
                                            echo "<td class ='align-middle'>".$row['useraddress']."</td>";
                                            echo "<td class ='align-middle'>".$row['r_servicestatus']."</td>";
                                            echo "<td>"; 
                                            echo "<a href='service-request-update-employee.php?request_id=".$row['request_id']."' class ='btn btn-outline-primary btn-sm edit'><i class ='dripicons-document-edit'></i></a> &nbsp";
                                        
                                                                                        
                                            }
                                            ?>        
                                    </table>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
                 
            </div>
        </div>
    </div>           
    <!-- end main content-->
<?php include 'layouts/footer.php'; ?>
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>
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