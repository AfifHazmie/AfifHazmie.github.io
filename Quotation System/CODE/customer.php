<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include ('layouts/config.php'); ?>
<!--avoid admin accessing the page-->
<?php if( isset($_SESSION["u_type"]) && $_SESSION["u_type"] !=2 ){  
    header("Location: pages-404-admin-error.php");
die('Only  logged in users can access this page!'); 
} 
?>
<head>
    <title>Powerec | Welcome, <?php echo $_SESSION["username"];?>!</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>
<?php include 'layouts/body.php'; ?>



<!-- Retrieve data section -->
<?php  
$customer_id = intval($_SESSION["id"]);
$sql = "SELECT * FROM request
        LEFT JOIN users ON request.r_customerid = users.id 
        LEFT JOIN service ON request.r_serviceid = service.sv_id
        LEFT JOIN status ON request.r_servicestatus = status.status_desc
        WHERE r_customerid = $customer_id AND r_servicestatus = 'Pending'";


$stmt = mysqli_query($link, $sql);

?>

<?php 
    $sql1 = "SELECT count(r_servicestatus) AS totalrequest1 FROM request" ;

    $stmt1 = mysqli_query($link,$sql1);
    $row1 = mysqli_fetch_assoc($stmt1)
    ?>

<?php  
$sql2 = "SELECT count(q_no) AS quotesuccess FROM quotation WHERE q_status = 'Accepted' ";

$stmt2 = mysqli_query($link, $sql2);
$row2 = mysqli_fetch_assoc($stmt2)
?>

<?php  
$customer_id = intval($_SESSION["id"]);
$sql3 = "SELECT count(r_servicestatus) AS totalrequest2 FROM request
        LEFT JOIN users ON request.r_customerid = users.id 
        LEFT JOIN service ON request.r_serviceid = service.sv_id
        WHERE r_customerid = $customer_id";


$stmt3 = mysqli_query($link, $sql3);
$row3 = mysqli_fetch_assoc($stmt3)
?>



<!--End of Retrieve data section-->


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
                            <h4 class="mb-sm-0 font-size-18"><i class="mdi mdi-bullseye-arrow me-3"></i><?php echo $language["Dashboard"]; ?></h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-4">
                        <div class="card overflow-hidden border border-primary">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-3">
                                            <h5 class="text-primary"><?php echo $language["Welcome Back!"]; ?></h5>
                                            <p><?php echo $language["Powerec Customer Dashboard"]; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row mt-4">
                                    <div class="col-4">
                                        <div class="social-source text-center mt-3">
                                            <h6 class="mt-0 mb-4"><?php echo $language['Customer'];?></h6>
                                            <p class="card-text-muted mb-0"><?php echo $_SESSION['username'];?></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="social-source text-center mt-3">
                                            <h6 class="mt-0 mb-4"><?php echo $language["Email"]; ?></h6>
                                            <p class="card-text-muted mb-0"><?php echo $_SESSION['useremail'];?></p>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="social-source text-center mt-3">
                                            <h6 class="mt-0 mb-4"><?php echo $language["Phone No"]; ?></h6>
                                            <p class="card-text-muted mb-0"><?php echo $_SESSION["userphone"]; ?></p>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <div class="social-source text-center mt-3">
                                            <h6 class="mt-0 mb-4"><?php echo $language["Total requested by you"]; ?></h6>
                                            <p class="card-text-muted mb-0"><?php echo $row3["totalrequest2"];?></p>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="social-source text-center mt-3">
                                            <h6 class="mt-0 mb-4"><?php echo $language["Account From"]; ?></h6>
                                            <p class="card-text-muted mb-0"><?php echo $_SESSION["created_at"]; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="mt-4 col-10">
                                        <a href="edit-profile-customer.php" class="btn btn-primary waves-effect waves-light btn-sm"><?php echo $language["Edit Profile"]; ?><i class="mdi mdi-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mini-stats-wid bg-info text-white-50">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mt-0 mb-4 text-white"><i class="mdi mdi-check-all me-3"></i><?php echo $language["Total service Requested by customers"]; ?></h6>
                                                <h5 class="mt-0 mb-4 text-white align-self-center"><?php echo $row1["totalrequest1"];?></h5>
                                                </div>

                                                 <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-list-check font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card mini-stats-wid bg-success text-white-50">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mt-0 mb-4 text-white"><i class="mdi mdi-check-all me-3"></i> <?php echo $language["Total Quotation Success"]; ?></h6>
                                                <h5 class="mt-0 mb-4 text-white align-self-center"><?php echo $row2["quotesuccess"];?></h5>
                                                </div>

                                                 <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-list-check font-size-24"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card border border-primary">
                                <div class="card-body">
                                    <div class="d-sm-flex flex-wrap">
                                    <h4 class="card-title mb-4"><?php echo $language["Gallery"]; ?></h4>
                                </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class=""><img src="assets/images/banner.jpeg" class="img-fluid" alt="Responsive image">
                                                </div>  
                                            </div>
                                            <div class="col-sm-4">
                                                <div class=""><img src="assets/images/services.jpg" class="img-fluid" alt="Responsive image"></div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class=""><img src="assets/images/shop.jpg" class="img-fluid" alt="Responsive image"></div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class = "row" >
                <div class="card border border-primary">
                    <div class="card-body">
                        <div class="col-sm-4">                           
                                <h4 class="card-title mb-4"><?php echo $language["Location in Google map"]; ?></h4>
                                
                                    <iframe src="https://www.google.com/maps/embed?pb=!4v1643421635291!6m8!1m7!1srEbP0vyVWNL8l3hq6GSDlA!2m2!1d1.491454649868126!2d103.8683248228986!3f322.18248220725803!4f-22.819044558069095!5f0.7820865974627469" width="1200" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                
                            </div>
                        </div>
                    </div>
                    </div>

                <!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4"><?php echo $language["Latest Requested Service"]; ?></h4>
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="align-middle"><?php echo $language["Service"]; ?></th>
                                                <th class="align-middle"></th>
                                                <th class="align-middle"></th>
                                                <th class="align-middle"></th>
                                                <th class="align-middle"><?php echo $language["Service status"]; ?></th>
                                                <th class="align-middle"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td>
                                                <th style="width: 20px;" class="align-middle">
                                                <?php 
                                                while ($row=mysqli_fetch_assoc($stmt)){

                                                echo "<tr>";
                                                echo "<td>" .$row['sv_name']."</td>";
                                                echo "<td>";
                                                echo "<td>";
                                                echo "<td>";
                                                echo "<td>" .$row['r_servicestatus']."</td>";
                                                echo "<td>";
                                                }
                                                ?>   
                                                </th> 
                                            </td>
                                                
                                                
                                        </tbody>
                                    </table>
                                </div>
                                <!-- end table-responsive -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>