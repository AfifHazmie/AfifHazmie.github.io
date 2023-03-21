<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Powerec | Services</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/config.php';?>
<?php include 'layouts/body.php'; ?>
   <?php include 'layouts/menu-admin-employee.php'; ?>
 <?php 

$request_id = $_GET["request_id"];

$r_comment="";

$sql="SELECT * FROM request
      LEFT JOIN users ON request.r_customerid = users.id 
      LEFT JOIN service ON request.r_serviceid = service.sv_id
      LEFT JOIN quotation ON request.request_id = quotation.q_no
      LEFT JOIN status ON request.r_servicestatus = status.status_desc
      WHERE request_id = $request_id";

$result=mysqli_query($link,$sql);
$sqlstatus = "SELECT * FROM status";

$resultstatus=mysqli_query($link,$sqlstatus);
$row=mysqli_fetch_array($result);
 ?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="container mt-6">
                        <br>
                        <!-- start page title -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h3><?php echo $language["Request Detail"]; ?></h3>
                                            <div class="page-title-right">
                                                <ol class="breadcrumb m-0">
                                                    <li class="breadcrumb-item"><a href="service-request-employee.php"><?php echo $language["back"]; ?></a></li>
                                                    <li class="breadcrumb-item active"><?php echo $language["Detail"]; ?></li>
                                                </ol>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        <!-- end page title -->
                          <br>
                          <form class="from-horizontal" method = "POST" action = "service-request-process-employee.php">
                            <table class="table table-hover">
                          <tr>
                            <td><?php echo $language["Request ID"]; ?></td>
                            <td><?php echo $request_id;?></td>
                          </tr>
                           <tr>
                            <td><?php echo $language["Customer ID"]; ?></td>
                            <td><?php echo $row['r_customerid'];?></td>
                          </tr>
                          <tr>
                            <td><?php echo $language["Customer Name"]; ?></td>
                            <td><?php echo $row['username'];?></td>
                          </tr>
                            <tr>
                            <td><?php echo $language["Customer Phone"]; ?></td>
                            <td><?php echo $row['userphone'];?></td>
                          </tr>
                            <tr>
                            <td><?php echo $language["Service Requested"]; ?></td>
                            <td><?php echo $row['sv_name'];?></td>
                          </tr>
                            <tr>
                            <td><?php echo $language["Customer Address"]; ?></td>
                            <td><?php echo $row['useraddress'];?></td>
                          </tr>

                          
                             <tr>
                              <td><?php echo $language["Update"]; ?></td>
                                    <td><?php echo "<select name = 'status_desc' class='form-control'>";
                                          while ($rowstatus = mysqli_fetch_array($resultstatus)) {
                                             if ($rowstatus['status_desc'] == ('Accepted') || $rowstatus['status_desc'] == ('Rejected')) {
                                                echo '<option value ="' . $rowstatus["status_desc"] . '">' . $rowstatus["status_desc"] . '</option>';
                                             }
                                          }
                                          echo "</select>"; ?>
                                    </td>
                                 </tr>
                                 <tr>
                                        <td for="example-text-input" class="col-md-2 col-form-label"><?php echo $language["Comment"]; ?></td>
                                            <td><input type="r_comment" class="form-control" id="r_comment" name="r_comment" placeholder="Insert Comment If Needed" value="<?php echo $r_comment; ?>"></td>
                                </tr>
                                 <tr>
                                    <td><input type="hidden" name="request_id" class="form-control" id="request_id" value="<?php echo $request_id; ?>">
                                    </td>
                                    <td><button type="submit" class="btn btn-primary"><?php echo $language["Approval"]; ?></button> </td>
                                 </tr>


                              </table>


                           </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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






?>