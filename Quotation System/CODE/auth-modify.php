<?php
session_start();
// Include config file
require_once "layouts/config.php";

//avoid customer and employee accessing the page-->
if( isset($_SESSION["u_type"]) && $_SESSION["u_type"] !=0 ){  
    header("Location: pages-404-customer-error.php");
die('Only  logged in users can access this page!'); 
} 

//Retrieve booking based on ID
$sql = "SELECT * FROM users WHERE id = '".intval($_GET["id"])."'";
$result = mysqli_query ($link,$sql);
$row = mysqli_fetch_array($result);

?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Powerec | Modify User</title>
    <?php include 'layouts/head.php'; ?>
    <?php include 'layouts/head-style.php'; ?>
</head>

<body>

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary"><?php echo $language["Edit User Info"]; ?></h5>
                                        <p><?php echo $language["Change details"]; ?></p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="index.php">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/Powereclogo.jpeg" alt="" class="rounded-circle" height="70">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="needs-validation" action="functions/editEmployee.func.php" method="post">

                                    <div class="mb-3 <?php echo (!empty($useremail_err)) ? 'has-error' : ''; ?>">
                                        <label for="useremail" class="form-label"><?php echo $language["Email"]; ?></label>
                                        <input type="email" class="form-control" id="useremail" name="useremail" placeholder="Enter email" value="<?php echo $row["useremail"]; ?>">
                                        <?php if(isset($_SESSION["useremail_err"])) { ?>
                                        <span class="text-danger"><?php echo $_SESSION["useremail_err"]; ?></span>
                                        <?php unset($_SESSION["useremail_err"]); } ?>
                                    </div>

                                    <div class="mb-3 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                        <label for="username" class="form-label"><?php echo $language["Fullname"]; ?></label>
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your full name" value="<?php echo $row["username"]; ?>">
                                        <?php if(isset($_SESSION["username_err"])) { ?>
                                        <span class="text-danger"><?php echo $_SESSION["username_err"]; ?></span>
                                        <?php unset($_SESSION["username_err"]); } ?>
                                    </div>

                                    <div class="mb-3">
                                        <label for="useraddress" class="form-label"><?php echo $language["(Optional) Address"]; ?></label>
                                        <input type="text" class="form-control" id="useraddress" name="useraddress" row='4' placeholder="Enter home or office address" value="<?php echo $row["useraddress"]; ?>"></input>
                                    </div>

                                    <div class="mb-3 <?php echo (!empty($userphone_err)) ? 'has-error' : ''; ?>">
                                        <label for="userphone" class="form-label"><?php echo $language["Phone Number"]; ?></label>
                                        <input type="number" class="form-control" id="userphone" name="userphone" placeholder="Enter phone number" value="<?php echo $row["userphone"]; ?>">
                                        
                                        <?php if(isset($_SESSION["userphone_err"])) { ?>
                                        <span class="text-danger"><?php echo $_SESSION["userphone_err"]; ?></span>
                                        <?php unset($_SESSION["userphone_err"]); } ?>
                                    </div>

                                    <div class="mt-4 d-grid">
                                        <input type="hidden" name="user_id" value="<?php echo intval($_GET["id"]); ?>">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit"><?php echo $language["Confirm Edit"]; ?></button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <div>
                            <p><a href="manageUser-employer.php" class="fw-medium text-primary"><?php echo $language["Return to user list"]; ?></a></p>
                            © <script>
                                    document.write(new Date().getFullYear())
                                </script> Powerec. Crafted with <i class="mdi mdi-heart text-danger"></i> by SamVerse</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <?php include 'layouts/vendor-scripts.php'; ?>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>