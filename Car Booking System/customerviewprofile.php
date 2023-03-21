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

             
<div class="card mt-5">
    <div class="card-body">
        <div class="w3-content w3-container w3-padding-64">

            <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h3 class=" font-size-18">Profile Page</h3>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

            <div class="container" >
                <form class="form-horizontal" method="POST" action="customereditprofile.php">
                    <fieldset>

                <table class="table table-hover">
                    <tr>
                        <td>Name</td>
                        <td><?php echo $row["u_name"];?></td>
                    </tr>

                     <tr>
                        <td>IC No.</td>
                        <td><?php echo $row['u_ic']; ?></td>
                    </tr>

                     <tr>
                        <td>Phone No.</td>
                        <td><?php echo $row["u_phone"]; ?></td>
                    </tr>

                     <tr>
                        <td>Latest Address</td>
                        <td><?php echo $row["u_address"]; ?></td>
                    </tr>
                    <tr>
                        <td>Action</td>
                        <td>
                            <input type="hidden" name="u_ic" class="form-control" value="<?php echo $u_ic; ?>">
                            <button onclick="return confirm('Confirm action?');" type="submit" class="btn btn-primary" value="<?php echo $u_ic; ?>">Edit</button>
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