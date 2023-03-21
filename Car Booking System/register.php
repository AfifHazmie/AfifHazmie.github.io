<?php include 'headermain.php' ; ?>
<?php include 'footer.php';?>


<div class="card mt-5">
  <div class="card-body">
    <div class="w3-content w3-container w3-padding-64">
        <div class="container">

          <form class="form-horizontal" method="POST" action="registerprocess.php">
          <fieldset>

            <legend>Registration Form</legend>

            <div class="form-group row">
              <label for="inputIC" class="col-sm-2 col-form-label">IC Number</label>
                <input type="text" name="fic" class="form-control" id="inputIC" placeholder="Please enter IC without dash (-)"required>
            </div>


            <div class="form-group">
              <label for="inputName" class="form-label mt-4">Name</label>
              <input type="text" name="fname" class="form-control" id="inputname" placeholder="Please enter your fullname"required>
            </div>


            <div class="form-group">
              <label for="InputPassword" class="form-label mt-4">Password</label>
              <input type="password" name="fpwd" class="form-control" id="InputPassword1" onkeypress="return (event.charCode >= 0 && event.charCode == 47 || event.charCode >= 58 && event.charCode == 64) ? null : event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 65 && event.charCode <= 122" placeholder="Create a strong password"required>
            </div>

            <div class="form-group">
              <label for="InputPassword" class="form-label mt-4">Confirm Password</label>
              <input type="password" name="cfpwd" class="form-control" id="InputPassword2" onkeypress="return (event.charCode >= 0 && event.charCode == 47 || event.charCode >= 58 && event.charCode == 64) ? null : event.charCode >= 48 && event.charCode <= 57 || event.charCode >= 65 && event.charCode <= 122" placeholder="Create a strong password"required>
            </div>

            <div class="form-group">
              <label for="exampleSelect1" class="form-label mt-4">Phone Number</label>
              <input type="text" name="fphone" class="form-control" id="inputphone" placeholder="Enter contact number">

            </div>

            <div class="form-group">
              <label for="exampleTextarea" class="form-label mt-4">Address</label>
              <textarea class="form-control" name="faddress"  id="textArea" rows="3"> </textarea>
              <span class="help-block">Please provide detail address</span>
            </div>
           
          <div class="form group">
              <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" name="s" class="btn btn-primary">Submit</button>
            <button type="info" class="btn btn-warning">Clear</button>

          </fieldset>    
          </form>
        </div>
      </div>
  </div>
</div>

