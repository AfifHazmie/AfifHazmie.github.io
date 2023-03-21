<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php include ('layouts/config.php'); ?>
<!--avoid customer accessing the page-->
<?php if( isset($_SESSION["u_type"]) && $_SESSION["u_type"] !=0 ){  
    header("Location: pages-404-customer-error.php");
die('Only  logged in users can access this page!'); 
} 
?>
<head>
    <title>Powerec | Welcome, <?php echo $_SESSION["username"];?>!</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>


<!--Start of chart-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<!--End chart-->
</head>
<?php include 'layouts/body.php'; ?>



<!--Retrieve data request status-->
<?php 
$sql = "SELECT count(r_servicestatus) AS numberstatus FROM request 
        WHERE r_servicestatus = 'Pending' ";

$stmt = mysqli_query($link,$sql);
$row = mysqli_fetch_assoc($stmt)
?>

<?php 
    $sql1 = "SELECT count(r_servicestatus) AS numberstatus1 FROM request 
            WHERE r_servicestatus = 'Accepted' ";

    $stmt1 = mysqli_query($link,$sql1);
    $row1 = mysqli_fetch_assoc($stmt1)
    ?>

<?php 
    $sql2 = "SELECT count(r_servicestatus) AS numberstatus2 FROM request 
            WHERE r_servicestatus = 'Rejected' ";

    $stmt2 = mysqli_query($link,$sql2);
    $row2 = mysqli_fetch_assoc($stmt2)
    ?>

<?php 
        $sql3 = "SELECT * FROM quotation  WHERE q_status = 'Pending' ";
        $result3 = mysqli_query($link, $sql3);
        $row3 = mysqli_fetch_array($result3);
        $count3 = mysqli_num_rows($result3);

        //Convert TimeDate to Month Section
        $date = date("d M , y", strtotime($row3['q_date'])) ; 
        //End of convertion TimeDate to Month

?>
<!--End of Retrieve request status-->

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
                                            <p><?php echo $language["Powerec Admin Dashboard"]; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="assets/images/profile-img.png"  class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <img src="assets/images/users/profilepic.jpg" class="img-thumbnail rounded-circle">
                                        </div>
                                        <h5 class="font-size-12 text-truncate"><?php echo $_SESSION['username'];?></h5>
                                    </div>

                                    <div class="col-sm-8">
                                        <div class="pt-4">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h5 class="font-size-15"><?php echo $language["Staff since"]; ?></h5>
                                                    <p class="text-muted mb-0"><?php echo $_SESSION["created_at"]; ?></p>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mt-4">
                                        <a href="edit-profile-employer.php" class="btn btn-primary waves-effect waves-light btn-sm"><?php echo $language["Edit Profile"]; ?><i class="mdi mdi-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" >
                            <div class="card-body">
                                <h4 class="card-title mb-4"><i class="fas fa-chart-pie mr-1"></i><?php echo $language["Total Request"]; ?></h4>
                                    <div class="chart-container pie-chart">
                                        <canvas id="doughnut_chart" style="height: 250px; width: 150%;"></canvas>
                                    </div>
                                </div>
                             </div>
                        </div>
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mini-stats-wid bg-warning text-white-50">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2 text-white"><i class="mdi mdi-alert-outline me-1"></i><?php echo $language["Pending"]; ?></h6>
                                                <p class="mb-2 text-white"><?php echo $row["numberstatus"];?></p>
                                                
                                            </div>
                                                <a href='service-request-employer.php' class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-hourglass"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid bg-success text-white-50">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2 text-white"><i class="mdi mdi-check-all me-1"></i><?php echo $language["Accepted"]; ?></h6>
                                                <p class="mb-2 text-white"><?php echo $row1["numberstatus1"];?></p>
                                                
                                                </div>

                                                 <a href='service-request-employer-accepted.php' class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-list-check font-size-24"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mini-stats-wid bg-danger text-white-50">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <h6 class="mb-2 text-white"><i class="mdi mdi-block-helper me-1"></i><?php echo $language["Rejected"]; ?></h6>
                                                <p class="mb-2 text-white"><?php echo $row2["numberstatus2"];?></p>
                                            </div>
                                            <a href='service-request-employer-rejected.php' class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                <span class="avatar-title rounded-circle bg-primary">
                                                    <i class="bx bx-x font-size-24"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex flex-wrap">
                                    <h4 class="card-title mb-4"><i class="bx bx-bar-chart-alt-2"></i><?php echo $language["Quotation Statistic"]; ?></h4>
                                </div>
                                <div class="chart-container bar-chart">
                                    <canvas id="bar_chart" style="height: 510px; width: 150%;"></canvas>
                                </div>      
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4"><?php echo $language["Latest Quotation"]; ?></h4>
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="align-middle"><?php echo $language["Quotation ID"]; ?></th>
                                                <th class="align-middle"><?php echo $language["Customer Name"]; ?></th>
                                                <th class="align-middle"><?php echo $language["Service"]; ?></th>
                                                <th class="align-middle"><?php echo $language["Date Created"]; ?></th>
                                                <th class="align-middle"><?php echo $language["Status"]; ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <td>
                                                 <?php
                                                    if($count3 != 0)
                                                    {       
                                                        $sql3 ="SELECT * FROM quotation
                                                                LEFT JOIN service ON quotation.q_no = service.sv_id
                                                                LEFT JOIN users ON quotation.q_cid = users.id
                                                                LEFT JOIN status ON quotation.q_status = status.status_desc
                                                                WHERE q_status = 'Pending' ";
                                                        $result3 = mysqli_query($link, $sql3);
                                                        while ($row3 = mysqli_fetch_array($result3))
                                                        {
                                                        echo " <tr> ";
                                                        echo " <td>" .$row3['q_no']."</td> ";
                                                        echo " <td>" .$row3['username']."</td> ";
                                                        echo " <td>" .$row3['sv_name']."</td> ";
                                                        echo " <td>" .$date."</td> ";
                                                        echo " <td>" .$row3['status_desc']."</div></td>";
                                                        echo " </tr>";
                                                        }
                                                        mysqli_close($link);
                                                    }
                                                    else
                                                    {
                                                        echo "-----";
                                                    }  ?>
                            
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

?>
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




<!-- Function for request table data-->
<script>
$(document).ready(function(){
    makechart();
    function makechart()
    {
        $.ajax({
            url:"dataChart_request.php",
            method:"POST",
            data:{action:'fetch'},
            dataType:"JSON",
            success:function(data)
            {
                var r_servicestatus = [];
                var total = [];
                var color = [];

                for(var count = 0; count < data.length; count++)
                {
                    r_servicestatus.push(data[count].r_servicestatus);
                    total.push(data[count].total);
                    color.push(data[count].color);
                }

                var chart_data = {
                    labels:r_servicestatus,
                    datasets:[
                        {
                            label:'Request Status',
                            backgroundColor:color,
                            color:'#fff',
                            data:total
                        }
                    ]
                };
                var options = {
                    responsive:true,
                    scales:{
                        yAxes:[{
                            ticks:{
                                min:0
                            }
                        }]
                    }
                };

                var group_chart1 = $('#doughnut_chart');

                var graph1 = new Chart(group_chart1, {
                    type:"doughnut",
                    data:chart_data
                });

                


            }
        })
    }

});

</script>
<!-- End of function for request table data-->


<!-- Start function for quotation table data-->
<script>
    
$(document).ready(function(){
    makechart();
    function makechart()
    {
        $.ajax({
            url:"dataChart_quotation.php",
            method:"POST",
            data:{action:'fetch'},
            dataType:"JSON",
            success:function(data)
            {
                var q_status = [];
                var total = [];
                var color = [];

                for(var count = 0; count < data.length; count++)
                {
                    q_status.push(data[count].q_status);
                    total.push(data[count].total);
                    color.push(data[count].color);
                }

                var chart_data = {
                    labels:q_status,
                    datasets:[
                        {
                            label:'Total',
                            backgroundColor:color,
                            color:'#fff',
                            data:total
                        }
                    ]
                };
                var options = {
                    responsive:true,
                    scales:{
                        yAxes:[{
                            ticks:{
                                min:0
                            }
                        }]
                    }
                };

                var group_chart2 = $('#bar_chart');

                var graph2 = new Chart(group_chart2, {
                    type:'bar',
                    data:chart_data,
                    options:options
                });

            }
        })
    }

});

</script>

<!-- End function for quotation table data-->