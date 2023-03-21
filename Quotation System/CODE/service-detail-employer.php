<?php 
include 'layouts/config.php'; 
include 'layouts/session.php'; 
include 'layouts/head-main.php'; 

//avoid customer and employee accessing the page
if( isset($_SESSION["u_type"]) && $_SESSION["u_type"] !=0 ){  
    header("Location: pages-404-customer-error.php");
die('Only  logged in users can access this page!'); 
}

$service_id = ($_GET["service"]);

$sql = "SELECT * FROM service WHERE sv_id = '$service_id'" ;
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

if(!$row) {
    echo "<script>alert('Service Not Found'); window.history.go(1-);</script>";
    exit(); 
}

?>

<head>
    <title>Powerec | Services</title>
    <?php include 'layouts/head.php'; ?>
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
                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Service Detail"]; ?></h4>

                            <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="service-employer.php">Back</a></li>
                                        <li class="breadcrumb-item active">Detail</li>
                                    </ol>
                                </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="product-detai-imgs">
                                            <div class="row">
                                                <div class="col-md-2 col-sm-3 col-4">
                                                    
                                                </div>
                                                <div class="col-md-7 offset-md-1 col-sm-9 col-8">
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="product-1" role="tabpanel" aria-labelledby="product-1-tab">
                                                            <div>
                                                                <?php $photo = $_GET["service"]; 
                                                                ?>
                                                                <img src="assets/images/product/<?php echo $photo; ?>.png" alt="" class="img-fluid mx-auto d-block">
                                                            </div>
                                                        </div>
                                         
                                                    </div>
                                                    

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="mt-4 mt-xl-3">
                                            <form action="service-proces-employer.php" method="POST"> 
                                            
                                                <h4 class="mt-1 mb-3"><?php echo $row["sv_name"]; ?></h4>

                                                <h5 class="mb-4">Price : <span class="text-muted me-2"><b>Starting from RM <?php echo $row["sv_price"]; ?></b></span> </h5>
                                                <p class="text-muted mb-4"><?php echo $row["sv_desc"]; ?></p>
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <div>
                                                          <!--   <p class="text-muted"><i class="bx bx-unlink font-size-16 align-middle text-primary me-1"></i> Wash</p>
                                                            <p class="text-muted"><i class="bx bx-shape-triangle font-size-16 align-middle text-primary me-1"></i> Part Replacement</p> -->
                                                            
                                                            <input type="hidden" name="service_id" value="<?php echo intval($_GET["service"]); ?>">

                                                           <button  type = "submit" class="btn btn-success waves-effect  mt-2 waves-light">
                                                                <i class="bx bx-cart me-2"></i> Request</a>
                                                            
                                                           
                                                        </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </form>

                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                               
                                <!-- end Specifications -->

                                

                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end row -->

                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div>
                            

                            
                            <!-- end row -->
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

<!-- App js -->
<script src="assets/js/app.js"></script>