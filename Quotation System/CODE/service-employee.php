<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Powerec | Services</title>
    <?php include 'layouts/head.php'; ?>
    <!-- ION Slider -->
    <link href="assets/libs/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet" type="text/css" />
    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>
<?php include("layouts/config.php");?>
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
                            <h4 class="mb-sm-0 font-size-18"><i class="mdi mdi-bullseye-arrow me-3"></i><?php echo $language["Services"]; ?></h4>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-14">
                        <div class="mt-4 d-grid">
                            <a href = "service-add-employee.php" class="btn btn-primary btn-sm waves-effect waves-light" type="submit"><?php echo $language["Add service"]; ?></a>
                            <br>            
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'layouts/footer.php'; ?>
        </div>
    <!-- end main content-->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-editable table-nowrap align-middle table-edits">
                                        <thead>
                                            <tr>
                                                <th><?php echo $language["Service ID"]; ?></th>
                                                <th><?php echo $language["Service Name"]; ?></th>
                                                <th><?php echo $language["Service Description"]; ?></th>
                                                <th><?php echo $language["Edit"]; ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-id="1">
                                                <?php 
                                                    
                                                    $sql = "SELECT * FROM service";
                                                    $result = mysqli_query($link, $sql);
                                                    while($row = mysqli_fetch_assoc($result)) {
                                                
                                                echo "<tr>";
                                                echo "<td class ='align-middle'>".$row['sv_id']."</td>";
                                                echo "<td class ='align-middle'>".$row['sv_name']."</td>";
                                                
                                                echo "<td class ='align-middle'>".$row['sv_desc']."</td>";
                                                echo "<td>"; 
                                                echo "<a href='service-update-employee.php?service=".$row['sv_id']."' class ='btn btn-outline-secondary btn-sm edit' title ='Edit'><i class='fas fa-pencil-alt'></i></a> &nbsp"; 
                                                echo "<a href='service-delete-employee.php?service=".$row['sv_id']."' class ='btn btn-outline-danger btn-sm edit' title ='Delete'><i class='bx bx-trash-alt'></i></a> &nbsp";    
                                                ?>
                                                
                                                    
                                                </td>
                                            </tr>
                                          
                                           <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>


        </div> <!-- container-fluid -->        
</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- Ion Range Slider-->
<script src="assets/libs/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="assets/libs/table-edits/build/table-edits.min.js"></script>
<!-- init js -->
<script src="assets/js/pages/product-filter-range.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>