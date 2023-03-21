<?php

include 'session.php';
if(!session_id())
{
    session_start();
}


include ('headercustomer.php') ;
//connect to database
include ('dbconnect.php') ; 
include 'customersession.php';


//To detect the right customer
$uic = $_SESSION ['uic']; 

//Retrieve vehicle list
$sql = "SELECT * FROM tb_vehicle" ; 
$result = mysqli_query($con, $sql);
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
    <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity"><span class="w3-hide-small">Vehicle's</span> List</span>
  </div>
</div>


    <div class="main-content">
        <div class="page-content">
            <div class="card">
                <div class="card-body">
                    

                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Vehicle Available</h4>

                                <div class="row">
                                <?php 
                                while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="mt-4 text-center">

                                                    <div class="row">
                                                        <img class="img-thumbnail" src="img/<?php echo $row['v_image']; ?>">
                                                    </div>

                                                    <div class="row">
                                                        <h5 class="mb-3 text-truncate text-dark"><?php echo $row["v_model"]; ?></h5><br>
                                                    </div>
                                                    <div class="row">
                                                        <h5 class="mb-3 text-truncate text-dark"><?php echo $row["v_reg"]; ?></h5>
                                                    </div>
                                                    <div class="row">
                                                        <h5 class="mb-3 text-truncate text-dark"><?php echo $row["v_seat"]; ?> seats</h5><br>
                                                    </div>
                                                    <div class="row">
                                                        <h5 class="mb-3 text-truncate text-dark">RM<?php echo $row["v_price"]; ?>/day</h5><br>
                                                    </div>
                                                    <div class="row">
                                                        <h5 class="mb-3 text-truncate text-dark"><?php echo $row["v_type"]; ?></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div> 
        </div>
    </div>