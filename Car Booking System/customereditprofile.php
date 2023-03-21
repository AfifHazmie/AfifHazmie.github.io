<?php 
include ('dbconnect.php');
include 'session.php';
include 'headercustomer.php'; 
include 'customersession.php';

$uic = $_SESSION ['uic'];
$sql = "SELECT * FROM tb_users WHERE u_ic = $uic";
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
                            <h3 class=" font-size-18">Edit My Profile</h3>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="customerviewprofile.php">back</a></li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div> 

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                    <form class="form-horizontal" method = "post" action="customereditprofileprocess.php" enctype="multipart/form-data">
                       
                            <div class="card-body">
                                <div class="col-md-4">
                                    <input type="hidden" class="form-control" name="u_ic" value="<?php echo $row["u_ic"]; ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Name</label>
                                <div class="col-md-7">
                                    <input required type="u_name" class="form-control" name="u_name" placeholder="Enter car model" value="<?php echo $row["u_name"];?>">
                                </div>
                            </div>                               
                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-md-2 col-form-label">Phone No.<span style="color:red">*</label>
                                <div class="col-md-7">
                                    <input required type="u_phone" class="form-control"  name="u_phone" placeholder="Enter new phone number" value="<?php echo $row["u_phone"]; ?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="example-email-input" class="col-md-2 col-form-label">Latest Address<span style="color:red">*</label>
                                <div class="col-md-7">
                                    <input required type="text" class="form-control" name="u_address" placeholder="Enter new address" value="<?php echo $row["u_address"]; ?>">
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