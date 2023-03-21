<?php 
include 'session.php';
if(!session_id())
{
    session_start();
}
include 'adminsession.php';
include 'headeradmin.php'; 
include 'footer.php';
include ('dbconnect.php');

//Retrieve booking (JOIN)
$sql = "SELECT * FROM tb_booking
        LEFT JOIN tb_users ON tb_booking.b_customer = tb_users.u_ic
        LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_id
        LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
        WHERE b_status != '1'" ; 

$result = mysqli_query($con, $sql);

?>
<!-- DataTables -->
<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />

<div class="card mt-5">
  <div class="card-body">
    <div class="container" >

<!--Navigation Bar between pending and accepted/rejected -->
        <div class="row">
            <div class="col-10">
                <div class="mt-10">
                    <a href = "adminmanage.php" type="button" class="btn btn-primary">Pending</a>
                    <a href = "adminmanageothers.php"type="button" class="btn btn-primary">Accepted/Rejected</a>
                </div>
            </div>
        </div>
<!-- End of navigation bar -->
<body>
  <div class="card mt-5">
    <div class="container"><br>
        <h3>Accepted/Rejected Booking List</h3><br>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Table List</h4>
                                    <table id="datatable" class="table table-hover">
                                            <thead>
                                                <tr>
                                                  <th scope="col">Booking ID</th>
                                                  <th scope="col">Customer</th>
                                                  <th scope="col">Contact</th>
                                                  <th scope="col">Vehicle</th>
                                                  <th scope="col">Pickup Date</th>
                                                  <th scope="col">Return Date</th>
                                                  <th scope="col">Total</th>
                                                  <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                  while($row = mysqli_fetch_array($result))
                                                  {
                                                      echo "<tr>";
                                                      echo "<td>".$row['b_id']."</td>";
                                                      echo "<td>".$row['u_name']."</td>";
                                                      echo "<td>".$row['u_phone']."</td>";
                                                      echo "<td>".$row['v_model']."</td>";
                                                      echo "<td>".$row['b_bdate']."</td>";
                                                      echo "<td>".$row['b_rdate']."</td>";
                                                      echo "<td>".$row['b_total']."</td>";
                                                      echo "<td>".$row['s_desc']."</td>";
                                                      echo "<td>";
                                                      echo "</tr>";
                                                  }
                                              ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
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
</div>
</div>
</div>