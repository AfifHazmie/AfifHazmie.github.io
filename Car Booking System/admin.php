<?php 
include 'session.php';
if(!session_id())
{
    session_start();
}
include 'adminsession.php';
include 'headeradmin.php'; 
include ('dbconnect.php');

//Retrieve booking (JOIN)
$sql = "SELECT * FROM tb_booking
        LEFT JOIN tb_users ON tb_booking.b_customer = tb_users.u_ic
        LEFT JOIN tb_vehicle ON tb_booking.b_vehicle = tb_vehicle.v_id
        LEFT JOIN tb_status ON tb_booking.b_status = tb_status.s_id
        WHERE b_status = '1' " ; 

$result = mysqli_query($con, $sql);


//Count the number of status for approved booking
$sql1 = "SELECT count(b_status) AS status1 FROM tb_booking 
         WHERE b_status = '2' ";
$stmt1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_assoc($stmt1);


//Count the number of status for pending booking
$sql2 = "SELECT count(b_status) AS status2 FROM tb_booking 
         WHERE b_status = '1' ";
$stmt2 = mysqli_query($con,$sql2);
$row2 = mysqli_fetch_assoc($stmt2);


//Count the number of status for rejected booking
$sql3 = "SELECT count(b_status) AS status3 FROM tb_booking 
         WHERE b_status = '3' ";
$stmt3 = mysqli_query($con,$sql3);
$row3 = mysqli_fetch_assoc($stmt3);


//Count the number vehicle available
$sql4 = "SELECT count(v_id) AS totalvehicle FROM tb_vehicle";
$stmt4 = mysqli_query($con,$sql4);
$row4 = mysqli_fetch_assoc($stmt4);


//Count total user available in the system
$sql5 = "SELECT count(u_ic) AS totaluser FROM tb_users";
$stmt5 = mysqli_query($con,$sql5);
$row5 = mysqli_fetch_assoc($stmt5);

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
  background-image: url('img/indeximg/adminbg.jpg');
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

h4 {
  text-align: center;
}

</style>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container w3-opacity-min">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity"><span class="w3-hide-small">ADMIN's</span> PAGE</span>
  </div>
</div>

<div class="main-content">

<div class="w3-row w3-center w3-dark-grey w3-padding-16">
  <div class="w3-third w3-section">
    <span class="w3-xlarge"><?php echo $row1["status1"];?></span><br>
    Approved
  </div>
  <div class="w3-third w3-section">
    <span class="w3-xlarge"><?php echo $row2["status2"];?></span><br>
    Pending
  </div>
  <div class="w3-third w3-section">
    <span class="w3-xlarge"><?php echo $row3["status3"];?></span><br>
    Rejected
  </div>
</div>

<div class="row">
  <div class="card">
    <div class="card-body">
        <div class="w3-content w3-container">
          <div class="card text-white bg-info mb-3" style="max-width: 70rem;">
            <div class="card-header">Total Vehicle Available</div>
              <div class="card-body">
                <h4 class="card-title"><?php echo $row4["totalvehicle"];?></h4>
                
              </div>
          </div>

          <div class="card text-white bg-primary mb-3" style="max-width: 70rem;">
            <div class="card-header text-align-middle">Total User</div>
              <div class="card-body">
                <h4 class="card-title"><?php echo $row5["totaluser"];?></h4>
                
              </div>
          </div>

        </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="container" >
        <br><h3>New Booking List</h3><br>
        <table class="table table-hover">
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
                echo "</td>";
                echo "</tr>";
            }
        ?>

      </tbody>
    </table>
    </div>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<?php include 'footer.php';?>