<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include ('layouts/config.php'); ?>
<head>
    <title>Powerec | Quotation</title>
    <?php include 'layouts/head.php'; ?>
    <link href="assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- dropzone css -->
    <link href="assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />
    <?php include 'layouts/head-style.php'; ?>
</head>
<!-- PHP AREA WARNING -->

    <?php
    // Retrieve Quotation ID 
        if(isset($_GET['id']))
        {
        $qno = $_GET['id'];
        }
    // Retrieve Quotation ID 

    //Display all information regarding to the selected Quotation
        $sql = "SELECT * FROM quotation
                LEFT JOIN users ON quotation.q_cid = users.id
                LEFT JOIN service ON quotation.q_service = service.sv_id
                LEFT JOIN item ON quotation.q_no = item.i_qno
                WHERE q_no = '$qno' ";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_array($result);
    //Display all information regarding to the selected Quotation

    // Show Status
        $sql1 = " SELECT * FROM status WHERE status_desc = 'Accepted' OR status_desc = 'Completed' ";
        $result1 = mysqli_query($link, $sql1);
    // Show Status
    ?>

<!-- PHP AREA WARNING -->

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/vertical-menu-admin-employer.php'; ?>

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
                            <h4 class=" font-size-18"><?php echo $language["Quotation Section"]; ?></h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="quotations-list-accept-employer.php"><?php echo $language["Back"]; ?></a></li>
                                        <li class="breadcrumb-item active"><?php echo $language["View"]; ?></li>
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
                                <h4 class="card-title mb-4"><?php echo $language["Quotation Accepted/Completed Section"]; ?></h4>

                                <form class="form-horizontal" method="POST" action="quotations-modify5-employer.php">
                                  <fieldset>

                                    <table class="table table-hover">
                                        <tr>
                                                <td><?php echo $language["Quotation No."]; ?></td>
                                                <td><?php echo $row['q_no'];?></td>
                                            </tr>
                                        <tr>
                                                <td><?php echo $language["Customer ID"]; ?></td>
                                                <td><?php echo $row['q_cid'];?></td>
                                            </tr>
                                        <tr>
                                                <td><?php echo $language["Type of Service"]; ?></td>
                                                <td><?php echo $row['sv_name'];?></td>
                                            </tr>
                                        <tr>
                                                <td><?php echo $language["Date Created"]; ?></td>
                                                <td><?php echo $row['q_date'];?></td>
                                            </tr>
                                        <tr>
                                                <td><?php echo $language["Total Price"]; ?></td>
                                                <td>RM <?php echo $row['q_total'];?></td>
                                            </tr>
                                        <tr>
                                                <td><?php echo $language["Status"]; ?>/td>
                                                    <td>
                                                     <?php 
                                            echo '<select name="fstatus" class="form-control">';
                                            while ($row1 = mysqli_fetch_array($result1))
                                            {
                                                if ($row1['status_desc']) 
                                                {
                                                    echo "<option value = '".$row1['status_desc']."' > ".$row1['status_desc']." </option>";
                                                }
                                            }
                                            echo "</select>";
                                          ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <input type="hidden" name="fbid" class="form-control" id="fbid" value="<?php echo $row['q_no']; ?>">
                                                </td>
                                                <td>
                                                    <a onclick="return confirm('Are you sure you want to proceed?');" href="quotations-modify5-employer.php?id=<?php echo $row["q_no"]; ?>" ><button type="submit" class="btn btn-primary btn-rounded w-md waves-effect waves-light"><?php echo "Save"; ?></button></a>
                                                </td>
                                            </tr>
                                      </table>
                                  </fieldset>
                                </form><br><br>
                            </div>
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

<!-- bootstrap datepicker -->
<script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<!-- dropzone plugin -->
<script src="assets/libs/dropzone/min/dropzone.min.js"></script>

<script src="assets/js/app.js"></script>

</body>

</html>