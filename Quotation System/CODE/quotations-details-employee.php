<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>

<?php
//This Line is to increment quotation number by 1 for every quotation created                                      
include ('layouts/config.php');
?>

<head>
    <title>Powerec | Quotation</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>

<!-- AREA FOR PHP WRITING ONLY -->

    <!-- Get Quotation number to display at receipt -->
        <?php 
        if(isset($_GET['id']))
        {
        $qno = $_GET['id'];
        } ?>
    <!-- Get Quotation number to display at receipt -->

    <!-- Get details of all data related to the above Quotation number -->
        <?php
        $sql1 ="SELECT * FROM quotation 
                LEFT JOIN users ON quotation.q_cid = users.id
                LEFT JOIN service ON quotation.q_service = service.sv_id
                WHERE q_no = '$qno' ";
        $result1 = mysqli_query($link, $sql1);
        $row1 = mysqli_fetch_array($result1); ?>
    <!-- Get details of all data related to the above Quotation number -->

    <!-- Display list of Items inside the specified Quotation -->
        <?php 
        $sql2 ="SELECT * FROM item WHERE i_qno = '$qno' ";
        $result2 = mysqli_query($link, $sql2); ?>
    <!-- Display list of Items inside the specified Quotation -->

    <!-- Display notes -->
        <?php
        $sql3 = "SELECT * FROM note WHERE note_qid = '$qno' ";
        $result3 = mysqli_query($link, $sql3);
        $row3 = mysqli_fetch_array($result3) ?>
    <!-- Display notes -->

<!-- AREA FOR PHP WRITING ONLY -->

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
                        
                            <h4 class=" font-size-18"><?php echo $language["Quotation"]; ?></h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="quotations-list-employee.php"><?php echo $language["Back"]; ?></a></li>
                                        <li class="breadcrumb-item active"><?php echo $language["View"]; ?></li>
                                    </ol>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

            <form class="form-horizontal" method="POST">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-title">
                                    <h4 class="float-end font-size-16">Quotation #<?php echo $qno;?></h4>
                                    <div class="mb-4">
                                        <img src="assets/images/Powerec.png" alt="logo" height="20" />
                                    </div>
                                </div>
                                <hr>


                                    <div class="row">
                                        <!-- Company's Address -->
                                        <div class="col-sm-9">
                                        <address><strong>Company Address:</strong><br>
                                        No. 60 & 60A,<br>
                                        Jalan Sena 1,<br>
                                        81750, Masai,<br>
                                        Terengganu</address></div>
                                        <!-- Company's Address --> 

                                        <!-- Customer's Address --> 
                                        <div class="col-sm-3 text-end"><address>
                                        <strong>Customer Address:</strong><br>
                                        <div class="col"><?php echo $row1['useraddress'] ?></div></address></div>
                                        <!-- Customer's Address -->
                                    </div>      

                                <!-- Customer Name -->
                                    <div class="row">
                                    <div class="col-sm-6">
                                    <address><strong>Customer Name:</strong><br>
                                    <?php echo $row1['username'];?><br>
                                    </address></div></div>
                                <!-- Customer Name -->

                                <!-- Service Name -->
                                    <div class="row">
                                    <div class="col-sm-6">
                                    <strong class="font-size-15 fw-bold">Quotation for:</strong>
                                    <?php echo $row1['sv_name'] ;?> <strong>Service</strong></div>
                                <!-- Order Date -->
                                    <div class="col-sm-6 text-end" >
                                    <strong class="font-size-15 fw-bold">Date:</strong>
                                    <?php echo $row1['q_date'];?></div>
                                <!-- Order Date -->
                                </div><br>
                                <!-- Service Name -->

                                <h4 class="mb-sm-0 font-size-18">Item List</h4><br><br>
                                  <!-- Registration Form -->
                                  <form class="form-horizontal">
                                    <fieldset>
                                      <table class="table table-hover table-bordered">

                                        <!-- Table Header -->
                                            <thead>
                                                <tr class="table-light">
                                                    <th scope="col"> Item Description</th>
                                                    <th scope="col" class="text-center"> Price per Unit</th>
                                                    <th scope="col" class="text-center"> Quantity</th>
                                                    <th class="text-center"> Item Total</th>
                                                </tr>
                                            </thead>
                                        <!-- Table Header -->

                                        <!-- List down all Items -->
                                            <?php
                                            while ($row2 = mysqli_fetch_array($result2))
                                            { ?>
                                                <tr>
                                                <td class=text-left border-0><?php echo $row2['i_desc']; ?></td>
                                                <td class=text-center border-0><?php echo $row2['i_unitPrice']; ?></td>
                                                <td class=text-center border-0><?php echo $row2['i_qty']; ?></td>
                                                <td class=text-center border-0> RM <?php echo $row2['i_total']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            mysqli_close($link); ?>
                                        <!-- List down all Items -->
                                        
                                        <!-- Total Price of all Items -->
                                            <tbody> 
                                                <tr>
                                                    <td colspan="2"></td>
                                                    <td class="text-center"><strong>Total</strong></td>
                                                    <td class="border-0 text-center"><h4>RM <?php echo $row1['q_total']; ?></h4></td>
                                                </tr>
                                            </tbody>
                                        <!-- Total Price of all Items -->

                                      </table>
                                    </fieldset>
                                  </form><br><br>
                                  <!-- Registration Form -->

                                <!-- Final Notes Here -->
                                    <div class="row-sm-2">
                                        <div class="col-sm-6">
                                            <address><strong>Final Notes:</strong><br>
                                            <?php echo $row3['note_desc']; ?><br>
                                            </address>
                                        </div>
                                    </div>
                                <!-- Final Notes Here -->

                                <div class="d-print-none">
                                    <div class="float-end">
                                        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light me-1"><i class="fa fa-print"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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

<script src="assets/js/app.js"></script>

</body>

</html>