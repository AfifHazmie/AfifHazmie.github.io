<?php 
include ('dbconnect.php');
include 'session.php';
include 'headeradmin.php';
include 'adminsession.php';
?>

<!-- DataTables -->
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    
<body>
<div class="card mt-5">
<div class="card-body">
  <div class="container"><br>
        <a href="addvehicle.php"><button type="button" class="btn btn-primary">Add Vehicle</button></a><br><br>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Available Vehicles</h4>
                                    <table id="datatable" class="table table-hover">
                                            <thead>
                                                <tr>
                                                  <th>ID</th>
                                                    <th>Vehicle Model</th>
                                                    <th>Registration No.</th>
                                                    <th>Price per day</th>
                                                    <th>Operations</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $sql = "SELECT * FROM tb_vehicle";
                                                    $result = mysqli_query($con, $sql);
                                                    while($row = mysqli_fetch_array($result)) { ?>
                                                <tr>
                                                    <td><?php echo $row['v_id']; ?></td>
                                                    <td><?php echo $row['v_model']; ?></td>
                                                    <td><?php echo $row['v_reg']; ?></td>
                                                
                                                    <td>RM<?php echo $row['v_price']; ?></td>
                                                    <td> 
                                                        <a href="admineditvehicle.php?vehicle=<?php echo $row['v_id']?>" class ='btn btn-warning'>Edit</a> &nbsp 
                                                        <a href="admindeletevehicle.php?vehicle=<?php echo $row['v_id']?>" class ='btn btn-danger'>Delete</a> &nbsp
                                                    </td>
                                                </tr>  
                                           <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include 'footer.php';?>

<!-- Required datatable js -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>


<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<script src="assets/js/app.js"></script>
</div>
</body>
<br><br><br><br>