<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include_once ("layouts/config.php");?>
<!--avoid customer and employee accessing the page-->

<?php if( isset($_SESSION["u_type"]) && $_SESSION["u_type"] !=0 ){  
    header("Location: pages-404-customer-error.php");
die('Only  logged in users can access this page!'); 
} 
?>

<?php $sql="SELECT * FROM feedback
LEFT JOIN feedback_topic ON feedback.f_topic=feedback_topic.ft_id
LEFT JOIN quotation ON feedback.f_qno=quotation.q_no";

$result=mysqli_query($link,$sql);

?>
<head>
    <title>Powerec | Feedback List</title>
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

    <?php include 'layouts/menu-admin-employer.php'; ?>

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
                            <h4 class="mb-sm-0 font-size-18"><i class="mdi mdi-bullseye-arrow me-3"></i><?php echo $language["Feedback List"]; ?></h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title"><?php echo $language["See Feedback Records"]; ?></h4>



                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th><?php echo $language["Feedback ID"]; ?></th>
                                            <th><?php echo $language["Customer ID"]; ?></th>
                                            <th><?php echo $language["Quotation No."]; ?></th>
                                            <th><?php echo $language["Topic"]; ?></th>
                                            <th><?php echo $language["Rating"]; ?></th>
                                            <th><?php echo $language["Comment"]; ?></th>
                                            <th><?php echo $language["Created at"]; ?></th>

                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                          while($row=mysqli_fetch_assoc($result))
                                          {
                                            ?>
                                             <tr>
                                                 <td>#FB<?php echo $row['f_id']; ?></td>
                                                 <td>#C<?php echo $row['f_customerid']; ?></td>
                                                 <td>#Q<?php echo $row['q_no'];?></td>
                                                 <td><?php echo $row['ft_name'];?></td>
                                                 <td><span class="badge bg-success font-size-12"><i class="mdi mdi-star me-1"></i><?php echo $row['f_rating']; ?></span></td>
                                                 <td><?php echo $row['f_comment']; ?></td>
                                                 <td><?php echo $row['f_created_at'];?></td>
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