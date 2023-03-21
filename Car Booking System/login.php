<?php include 'headermain.php' ; ?>
<?php include 'footer.php';?>

<div class="card mt-5">
  <div class="card-body">
    <div class="w3-content w3-container w3-padding-64">
      <div class="container">
        <form class="form-horizontal" method="POST" action="loginprocess.php">
        <fieldset>

          <legend>Login Account</legend>

          <div class="form-group">
            <label for="inputIC" class="form-label mt-4">IC Number</label>
            <input type="text" name="fic" class="form-control" id="inputIC" placeholder="Please enter IC without dash (-)"required>
          </div>

          <div class="form-group">
            <label for="InputPassword" class="form-label mt-4">Password</label>
            <input type="password" name="fpwd" class="form-control" id="InputPassword1" onkeypress="return (event.charCode >= 0 && event.charCode == 47 || event.charCode >= 58 && event.charCode == 64) ? null : event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 65 && event.charCode <= 122" placeholder="Enter password" required>
          </div>

         <br>
          <div class="form group">
           <div class="col-lg-10 col-lg-offset-2">
           <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-warning">Clear</button>
          </fieldset> 
        </form>
      </div>
    </div>
  </div>
</div>