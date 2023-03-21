<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include 'layouts/config.php';?>
<!--avoid admin accessing the page-->
<?php if( isset($_SESSION["u_type"]) && $_SESSION["u_type"] !=2 ){  
    header("Location: pages-404-admin-error.php");
    }
    ?>

    
<head>
    <title>Powerec | Give Feedback</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<!-- Bootstrap Rating css -->
    <link href="assets/libs/bootstrap-rating/bootstrap-rating.css" rel="stylesheet" type="text/css" />


<?php include 'layouts/body.php'; ?>

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
                            <h4 class="mb-sm-10 font-size-18"><?php echo $language["Feedback Page"]; ?></h4>
                                <br><br>
                          
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                                            <div class="row">
                                                <form action="functions/addFeedback.func.php" method="POST">

                                                    <div class="row mb-4">
                                                  <label for="inputtopic" class="col-md-2 col-form-label">
                                <h5 class="font-size-15"><?php echo $language["Select Topic"]; ?></h5></label>
                                                  <div class="col-md-7">
                                                    
                                                  <?php 
                                                    $sql = "SELECT * FROM feedback_topic";
                                                    $result = mysqli_query($link,$sql);
                                                    echo '<select name="topic" class="form-control" id="topic">';
                                                    while($row=mysqli_fetch_array($result))
                                                    {
                                                      echo "<option value='".$row['ft_id']."'>".$row['ft_name']."</option>";
                                                    }
                                                    echo "</select>";
                                                  ?>  
                                                </div>
                                            </div>

                                        <br><br>
                                        <div class="row mb-4">

                                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">
                                            <h5 class="font-size-15"><?php echo $language["Your Rating"]; ?></h5>
                                            </label>

                                            <div class="col-md-7">

                                            <div style="display:flex; justify-content:flex; width:24%; padding:0;">
                                            <div class="rating-star">
                                        <input type="hidden" class="rating" name="rating" data-filled="mdi mdi-star text-primary" data-empty="mdi mdi-star-outline text-primary" data-fractions="2" />

                                    </div>                                          
                                            </div>
                                            </div>                                                                      

                                            </div>
                                            <br><br>


                                        <div class="row mb-4">
                                        <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">
                                            <h5 class="font-size-15"><?php echo $language["Additional Remarks"]; ?></h5></label>
                                                <div class="col-md-7">
                                                <div class="form-group">
                                    <textarea class="form-control" rows="5" id="remarks" name="remarks" ></textarea>
                                                </div>
                                                <br><br>
                                                <div class="form-group">
                                                    <br><br>
                                                    <input type="hidden" value="<?php echo $_GET["id"]; ?>" name="quotation">
                                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light" id="saveReview"><?php echo $language["Submit"]; ?></button> 
                                        
                                        <a href="customer.php"><button type="button" class="btn btn-info btn-rounded waves-effect waves-light" id="cancelReview"><?php echo $language["Cancel"]; ?></button></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                    <!-- end col -->
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

<!-- Bootstrap rating js -->
<script src="assets/libs/bootstrap-rating/bootstrap-rating.min.js"></script>

<script src="assets/js/pages/rating-init.js"></script>

<script src="assets/js/app.js"></script>

</body>
</html>
