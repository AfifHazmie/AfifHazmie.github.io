<?php 
include ('dbconnect.php');
include 'session.php';
include 'headeradmin.php'; 
include 'adminsession.php';

?>
<?php
$sql = "SELECT * FROM tb_vehicle WHERE v_id = '".intval($_GET["vehicle"])."'";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

?>

<!-- Bootstrap file input -->
<link rel="stylesheet" href="fileinput.min.css">

<div class="card">
        <div class="card-body">
            <div class="w3-container w3-content w3-padding-64">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h3 class=" font-size-18">Edit Vehicle Details</h3>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="adminvehiclelist.php">back</a></li>
                                    <li class="breadcrumb-item active">Modify</li>
                                </ol>
                            </div> 

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                    <form class="form-horizontal" method = "post" action="admineditvehicleprocess.php" enctype="multipart/form-data">
                       
                            <div class="card-body">
                                <div class="col-md-4">
                                    <input type="hidden" class="form-control" id="v_id" name="v_id" value="<?php echo $row["v_id"]; ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Car Image</label>
                                <div class="col-md-4">  
                                    <img src="img/<?php echo $row["v_image"];?>" width="350" height="230" style="border:solid 1px #000">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Car Model<span style="color:red">*</label>
                                <div class="col-md-7">
                                    <input required type="v_model" class="form-control" id="v_model" name="v_model" placeholder="Enter car model" value="<?php echo $row["v_model"]; ?>">
                                </div>
                            </div>
                                    
                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-md-2 col-form-label">Registration Number<span style="color:red">*</label>
                                <div class="col-md-7">
                                    <input required type="v_reg" class="form-control" id="v_reg" name="v_reg" placeholder="Enter car registration number" value="<?php echo $row["v_reg"]; ?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-md-2 col-form-label">Seat Number<span style="color:red">*</label>
                                <div class="col-md-7">
                                    <input required type="number" class="form-control" id="v_seat" name="v_seat" placeholder="Enter car seat number" value="<?php echo $row["v_seat"]; ?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-md-2 col-form-label">Type<span style="color:red">*</label>
                                <div class="col-md-7">
                                    <input type="v_type" class="form-control" id="v_type" name="v_type" placeholder="Enter car type (e.g. Sedan, SUV)" value="<?php echo $row["v_type"]; ?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-md-2 col-form-label">Price per day<span style="color:red">*</label>
                                <div class="col-md-7">
                                    <input required type="number" class="form-control" id="v_price" name="v_price" placeholder="Enter price per day" value="<?php echo $row["v_price"]; ?>">
                                </div>
                            </div>
                            <div class="mt-4 d-grid">
                                <button class="btn btn-primary waves-effect waves-light" type="submit" name="submit">Submit</button>
                            </div>
                        
            </form>
        </div>
    </div>
</div>
<br><br><br><br>
<?php include 'footer.php';?>