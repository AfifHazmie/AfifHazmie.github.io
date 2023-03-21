<?php 
include ('dbconnect.php');
include 'session.php';
include 'headeradmin.php'; 
include 'adminsession.php';

$v_id = $_GET["vehicle"];
$sql = "SELECT * FROM tb_vehicle WHERE v_id = '$v_id' ";
$result=mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

?>

             
<div class="card mt-5">
    <div class="card-body">
        <div class="w3-content w3-container w3-padding-64">

            <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h3 class=" font-size-18">Confirmation on delete vehicle</h3>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="adminvehiclelist.php">back</a></li>
                                    <li class="breadcrumb-item active">Delete page</li>
                                </ol>
                            </div> 

                        </div>
                    </div>
                </div>
                <!-- end page title -->

            <div class="container" >
                <form class="form-horizontal" method="POST" action="admindeletevehicleprocess.php">
                    <fieldset>

                <table class="table table-hover">
                    <tr>
                        <td>Car Image</td>
                        <td><img src="img/<?php echo $row["v_image"];?>" width="500" height="100%" style="border:solid 1px #000"></td>
                    </tr>

                     <tr>
                        <td>Vehicle</td>
                        <td><?php echo $row['v_model']; ?></td>
                    </tr>

                     <tr>
                        <td>Registration No.</td>
                        <td><?php echo $row["v_reg"]; ?></td>
                    </tr>

                     <tr>
                        <td>Seat No.</td>
                        <td><?php echo $row["v_seat"]; ?></td>
                    </tr>

                     <tr>
                        <td>Vehicle type</td>
                        <td><?php echo $row["v_type"]; ?></td>
                    </tr>
                    
                     <tr>
                        <td>Price Per day</td>
                        <td><?php echo $row["v_price"]; ?></td>
                    </tr> 
                    <tr>
                        <td>Confirmation action</td>
                        <td>
                            <input type="hidden" name="v_id" class="form-control" value="<?php echo $v_id; ?>">
                            <button onclick="return confirm('Confirm action?');" type="submit" class="btn btn-danger" value="<?php echo $v_id; ?>">Delete</button>
                        </td>
                    </tr>


                </table>
            </form>
        </div>
    </div>
    </div>
</div>

<br><br><br><br>
<?php include 'footer.php';?>