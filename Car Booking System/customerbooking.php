<?php 
include 'session.php';

if(!session_id())
{
    session_start();
}
include 'customersession.php';
include 'headercustomer.php' ; 
include 'dbconnect.php' ;

//Retrieve vehicle list
$sql = "SELECT * FROM tb_vehicle" ; 
$result = mysqli_query($con, $sql); 
?>

<div class="card">
        <div class="card-body">
            <div class="w3-content w3-container w3-padding-64">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h3 class=" font-size-18">Booking Form</h3>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <form class="form-horizontal" method="POST" action="customerbookingprocess.php">
                        <fieldset>

                        <legend>Create new</legend>
                        <div class="form-group">
                          <label for="inputcar" class="col-lg-4 control-label">Select Vehicles</label>
                          <?php 
                            $sql = "SELECT * FROM tb_vehicle";
                            $result = mysqli_query($con,$sql);
                            echo '<select name="fcar" class="form-control" id="inputvehiclemodel">';
                            while($row=mysqli_fetch_array($result))
                            {
                                echo "<option value='".$row['v_id']."'>".$row['v_model']."</option>";
                            }
                            echo "</select>";
                          ?>  
                        </div>


                        <div class="form-group">
                            <label for="inputbookdate" class="form-label mt-4">Select Pickup Date</label>
                            <input type="date" name="fbdate" class="form-control" id="inputbookingdate" placeholder="Enter desired pickup date"required>
                        </div>


                        <div class="form-group">
                            <label for="inputreturndate" class="form-label mt-4">Select Return Date</label>
                            <input type="date" name="frdate" class="form-control" id="Inputreturndate" placeholder="Enter return vehicle date"required>
                        </div><br>

                        <div class="form group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="clear" class="btn btn-warning">Clear</button>
                          </div>
                        </div>
                        
                        </fieldset>
                    </form>
                </div>
        </div>
    </div>
</div>