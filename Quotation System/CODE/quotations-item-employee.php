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

<!-- RESERVED SPACE FOR PHP VOCABULARY -->

        <!-- This is to retrieve the Quotation Number --> 
            <?php 
            $sql = "SELECT * FROM quotation ";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_array($result);
            $count = mysqli_num_rows($result); ?>
        <!-- This is to retrieve the Quotation Number -->

<!-- RESERVED SPACE FOR PHP VOCABULARY -->

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/vertical-menu-admin-employee.php'; ?>

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
                    <h4 class="mb-sm-0 font-size-18"><?php echo $language["Creating New Quotation"]; ?></h4></div></div></div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                            <h4 class="mb-sm-0 font-size-18"><?php echo $language["Item List"]; ?></h4><br><br> 
                              <!-- Registration Form -->
                              <form class="form-horizontal">
                                <fieldset>
                                  <table class="table table-hover">
                                    <!-- Table Header -->
                                    <thead>
                                      <tr>
                                        <th scope="col"></th>
                                        <th scope="col"><?php echo $language["Item Description"]; ?></th>
                                        <th scope="col"><?php echo $language["Price per Unit"]; ?></th>
                                        <th scope="col"><?php echo $language["Quantity"]; ?></th>
                                        <th scope="col"><?php echo $language["Total"]; ?></th>
                                        <th scope="col"><?php echo $language["Operation"]; ?></th>       
                                      </tr>
                                    </thead>
                                    <!-- Table Header -->

                            <!-- DISPLAY ALL ITEMS WITH THOSE QUOTATION NUMBERS THAT MATCHES THE CURRENT VALUE -->
                                        <?php if($count != 0)
                                        {
                                            $sql1 = "  SELECT * FROM item WHERE i_qno = '$count' ";
                                            $result1 = mysqli_query($link, $sql1);
                                            while ($row1 = mysqli_fetch_array($result1))
                                            {
                                            echo " <tr> ";
                                            echo " <td></td> ";
                                            echo " <td>".$row1['i_desc']."</td> ";
                                            echo " <td>".$row1['i_unitPrice']."</td> ";
                                            echo " <td>".$row1['i_qty']."</td> ";
                                            echo " <td> RM ".$row1['i_total']."</td> ";
                                            echo "<td>";
                                            echo "<a href = 'quotations-item-destroy-employee.php?id=".$row1['i_no']."' class = 'btn btn-danger'>Cancel</a>";
                                            echo "</td>";
                                            echo "</tr>";
                                            }
                                            mysqli_close($link);
                                        }
                                        else
                                        {

                                        } ?>

                            <!-- DISPLAY ALL ITEMS WITH THOSE QUOTATION NUMBERS THAT MATCHES THE CURRENT VALUE -->

                                    </tbody>
                                  </table>
                                </fieldset>
                              </form><br><br>
                              <!-- Registration Form -->
                          </div>
                      </div>
                  </div>
              </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- HERE IS WHERE ADMINS KEY IN ITEMS AND PRODUCTS AS WELL AS THEIR INDIVIDUAL PRICES -->
                                <!-- Container -->
                                <div class="container"><br><br>
                                    <form class="form-horizontal" method="POST" action="quotations-item-process-employee.php">
                                        <fieldset>
                                        <h4 class="mb-sm-0 font-size-18"><?php echo $language["Item Form"]; ?></h4><br><br>

                                        <!-- Get Item Description from admin  -->
                                        <div class="form-group">
                                        <label for="textArea" class="col-lg-2 control-label"><?php echo $language["Item Description"]; ?></label>
                                        <div class="col-lg-10">
                                        <textarea class="form-control" name="fidesc" rows="3" placeholder="Enter item and its description..."></textarea></div></div><br>
                                        <!-- Get Item Description from admin  -->

                                        <!-- Insert Price per Unit -->
                                        <div class="form-group">
                                        <label class="col-lg-2 control-label"><?php echo $language["Price per Unit"]; ?></label>
                                        <div class="col-lg-10">
                                        <input type="number" name="funit" class="form-control" placeholder="Enter item price per unit..." min="0.00" step="0.01" required></div></div><br>
                                        <!-- Insert Price per Unit -->

                                        <!-- Insert Quantity -->
                                        <div class="form-group">
                                        <label class="col-lg-2 control-label"><?php echo $language["Quantity"]; ?></label>
                                        <div class="col-lg-10">
                                        <input type="number" name="fqty" class="form-control" placeholder="Enter quantity of item..." min="1" required></div></div><br>
                                        <!-- Insert Quantity -->

                                        <!-- Buttons -->
                                        <div class="form-group">
                                            <div class="col-lg-10 col-lg-offset-2">
                                                <button type="reset" class="btn btn-warning"><?php echo $language["Clear"]; ?></button>
                                                <button type="submit" class="btn btn-primary"><?php echo $language["Save"]; ?></button>
                                                <a href="quotations-note-employee.php" class="btn btn-success"><?php echo $language["Done"]; ?></a>
                                            </div>
                                        </div>
                                        <!-- Buttons -->

                                        </fieldset>
                                    </form>
                                </div>

                                <!-- Container -->
                                <!-- HERE IS WHERE ADMINS KEY IN ITEMS AND PRODUCTS AS WELL AS THEIR INDIVIDUAL PRICES -->

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