<?php 
include 'session.php';
if(!session_id())
{
    session_start();
}

//Get booking ID
if (isset($_GET['id']))
{
    $bid = $_GET ['id']; 
}
include 'adminsession.php';
include 'headeradmin.php'; 
include ('dbconnect.php');

//Retrieve booking (JOIN)
$sql = "SELECT * FROM tb_booking
        LEFT JOIN tb_users ON tb_booking.b_customer = tb_users.u_ic
        LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_id
        LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
        WHERE b_status = '1'" ; 

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result); 
$sqlstatus = "SELECT * FROM tb_status" ;
$resultstatus = mysqli_query($con, $sqlstatus);
?>

<div class="card mt-5">
    <div class="card-body">
        <div class="w3-content w3-container w3-padding-64">
            <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h3 class=" font-size-18">Booking Detail</h3>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="adminlist.php">back</a></li>
                                    <li class="breadcrumb-item active">Approval</li>
                                </ol>
                            </div> 

                        </div>
                    </div>
                </div>
                <!-- end page title -->
            <div class="container" >
                <form class="form-horizontal" method="POST" action="adminapprovalprocess.php">
                    <fieldset>

                <table class="table table-hover">
                    <tr>
                        <td>Booking ID</td>
                        <td><?php echo $bid; ?></td>
                    </tr>

                     <tr>
                        <td>Vehicle</td>
                        <td><?php echo $row['v_model']; ?></td>
                    </tr>

                     <tr>
                        <td>Customer</td>
                        <td><?php echo $row['u_name']; ?></td>
                    </tr>

                     <tr>
                        <td>Contact</td>
                        <td><?php echo $row['u_phone']; ?></td>
                    </tr>

                     <tr>
                        <td>Pickup Date</td>
                        <td><?php echo $row['b_bdate']; ?></td>
                    </tr>
                    
                     <tr>
                        <td>Return Date</td>
                        <td><?php echo $row['b_rdate']; ?></td>
                    </tr>

                    <tr>
                        <td>Total Price</td>
                        <td><?php echo $row['b_total']; ?></td>
                    </tr>
                    <tr>
                        <td>Approval</td>
                        <td><?php

                            echo '<select name="fstatus" class="form-control">';
                              while($rowstatus=mysqli_fetch_array($resultstatus))
                              {
                                  if($rowstatus['s_id'] !='1')
                                  {
                                      echo "<option value='".$rowstatus['s_id']."'>".$rowstatus['s_desc']."</option>";
                                  }
                              }
                              echo "</select>";


                              ?>
                        </td>
                        <td>
                            <input type="hidden" name="fbid" class="form-control" id="fbid" value="<?php echo $row['b_id']; ?>">
                        </td>
                        <td>
                            <button type="submit" class="btn btn-primary">Approval</button>
                        </td>
                        
                    </tr>
                </table>
            </form>
        </div>
    </div>
    </div>
</div>

            
<?php include 'footer.php';?>