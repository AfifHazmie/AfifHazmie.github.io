<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include_once ("layouts/config.php");?>

<!--avoid customer and employee accessing the page-->
<?php if( isset($_SESSION["u_type"]) && $_SESSION["u_type"] !=1 ){  
    header("Location: pages-404-customer-error.php");
die('Only  logged in users can access this page!'); 
} 

?>
<?php $sql="SELECT * FROM users
LEFT JOIN u_type_desc ON users.u_type = u_type_desc.u_type_desc_id";
$result=mysqli_query($link,$sql);
?>

<head>
    <title>Powerec | User List</title>
    <?php include 'layouts/head.php'; ?>

    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18"><i class="mdi mdi-bullseye-arrow me-3"></i><?php echo $language["User List"]; ?></h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title"><?php echo $language["View and Search for Users"]; ?></h4>
                                    <div style="display:flex; justify-content:flex-end; width:98%; padding:0;">
                                         <a href="auth-add-employee-employee.php"><button style='margin-right:16px' type="button" class="btn btn-success btn-rounded waves-effect waves-light" id="adduser" ><i class="mdi mdi-18px mdi-account-plus"></i><?php echo $language["Add Employee"]; ?></button></a>
                                    </div>
                                <br>
                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                                <th><?php echo $language["Name"]; ?></th>
                                                <th><?php echo $language["Email"]; ?></th>
                                                <th><?php echo $language["Phone Number"]; ?></th>
                                                <th><?php echo $language["Address"]; ?></th>
                                        </tr>
                                    </thead>


                                    <tbody>
    
                    <?php while($row=mysqli_fetch_array($result))
                    {
                        ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['useremail']; ?></td>
                            <td><?php echo $row['userphone']; ?></td>
                            <td><?php echo $row['useraddress']; ?></td>
                            <td><?php echo $row['u_type_desc_name']; ?></td>
                        </tr>
                    <?php } ?>  
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
    </div> <!-- end row -->

              

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