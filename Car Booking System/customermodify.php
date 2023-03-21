<?php 
include 'session.php';

if(!session_id())
{
    session_start();
}
include 'customersession.php';
include 'headercustomer.php' ; 
include 'dbconnect.php' ; 

//Get booking ID
if (isset($_GET['id']))
{
    $bid = $_GET ['id']; 
}

//Retrieve booking ID 
$sql = "SELECT * FROM tb_booking WHERE b_id = '$bid'" ;
$result = mysqli_query($con, $sql) ;  
$row = mysqli_fetch_array($result) ; 

?>

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
body, html {
  height: 100%;
  color: #777;
  line-height: 1.8;
}

/* Create a Parallax Effect */
.bgimg-1, .bgimg-2, .bgimg-3 {
  background-attachment: fixed;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

/* First image (Logo. Full height) */
.bgimg-1 {
  background-image: url('img/indeximg/customerbookingbg.jpg');
  min-height: 100%;
}

.w3-wide {letter-spacing: 10px;}
.w3-hover-opacity {cursor: pointer;}

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 1600px) {
  .bgimg-1, .bgimg-2, .bgimg-3 {
    background-attachment: scroll;
    min-height: 400px;
  }
}
</style>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container w3-opacity-min">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity"><span class="w3-hide-small">CHOOSE</span> NEW VEHICLE</span>
  </div>
</div>


<div class="card">
        <div class="card-body">
            <div class="w3-content w3-container w3-padding-64">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h3 class=" font-size-18">Modify Booking</h3>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="customermanage.php">back</a></li>
                                    <li class="breadcrumb-item active">Modify</li>
                                </ol>
                            </div> 

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="container">
                    <div class="row">
                        <form class="form-horizontal" method="POST" action="customermodifyprocess.php">
                            <fieldset>
                            <div class="form-group">
                            <label for="inputcar" class="col-lg-2 control-label">Booking ID: <?php echo $bid;?></label>

                            <label for="inputCar" class="col-sm-4 
                            col-form-label">Select Vehicle</label>
                            <?php 
                                $sqlv = "SELECT * FROM tb_vehicle";
                                $resultv = mysqli_query($con, $sqlv);

                                echo '<select name="fcar" class="form-control" id="inputVehicleModel">';
                                while($rowv = mysqli_fetch_array($resultv))
                                {
                                    if($rowv['v_reg'] ==$row['b_vehicle'])
                                    {
                                        echo "<option selected ='selected' value ='".$rowv['v_reg']."'>".$rowv['v_model']."</option>";
                                    } 
                                    else
                                    {
                                        echo "<option value = '".$rowv['v_reg']."'>".$rowv['v_model']."</option>";
                                    }
                                }
                                echo "</select>";
                            ?>
                        </div>


                        <div class="form-group">
                        <label for="inputName" class="form-label mt-4">Select Pickup Date</label>
                        <?php 
                        echo '<input type="date" name="fbdate" class="form-control" id="inputbookingdate" value ="'.$row['b_bdate'].'">';
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="InputPassword" class="form-label mt-4">Select Return Date</label>
                             <input type="date" name="frdate" class="form-control" id="inputreturndate" value="<?php echo $row['b_rdate']; ?>"required>
                            </div>

                            <input type="hidden" name="fbid" class="form-control" id="fbid" value="<?php echo $row['b_id']; ?>">
                           <br>
                          <div class="form group">
                              <div class="col-lg-10 col-lg-offset-2">
                            <button  onclick="return confirm('Confirm action?');" type="submit" class="btn btn-primary">Modify</button>
                            <button onclick="return confirm('Confirm action?');" type="info" class="btn btn-warning">Clear</button>
                        </form>

                   
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>