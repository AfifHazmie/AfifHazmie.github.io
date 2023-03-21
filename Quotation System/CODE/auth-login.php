<?php
// Initialize the session
session_start();


// Check if the user is already logged in, if yes then redirect him to index page
//if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  //header("location: index.php");

    //exit;

//}
// Include config file
require_once "layouts/config.php";

// Define variables and initialize with empty values
$useremail = $password =  "";
$useremail_err = $password_err =  "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["useremail"]))) {
        $useremail_err = "Please enter useremail.";
    } else {
        $useremail = trim($_POST["useremail"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($useremail_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, useremail, password, userphone, created_at, u_type FROM users WHERE useremail = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_useremail);
            
            // Set parameters
            $param_useremail = $useremail;
            
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    

                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $useremail, $hashed_password, $userphone, $created_at, $u_type );
                    
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["u_type"] = $u_type;
                            $_SESSION["useremail"] = $useremail;
                            $_SESSION["userphone"] = $userphone;
                            $_SESSION["created_at"] = $created_at;

                            // Redirect user to welcome page
                            if($_SESSION["u_type"] == 0){ //admin employer
                            header ('location: admin-employer.php');
                            }

                            else if($_SESSION["u_type"] == 1) {   //admin employee
                            header ('location: admin-employee.php');
                            }

                            else{
                            header ('location: customer.php');
                            }
                            

                            
                            
                        } else {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }

                
                } else {
                    // Display an error message if username doesn't exist
                    $useremail_err = "No account found with that email.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>
<?php include 'layouts/head-main.php'; ?>

<head>
    <title>Powerec | Login</title>
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
                                        <h5 class="text-primary"><?php echo $language["Welcome Back!"]; ?></h5>
                                        <p><?php echo $language["Sign in to request service"]; ?></p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="index.php" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/Powereclogo.jpeg" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="index.php" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/Powereclogo.jpeg" class="rounded-circle" height="70">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                                    <div class="mb-3 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                        <label for="useremail" class="form-label"><?php echo $language["Email"]; ?></label>
                                        <input type="text" class="form-control" id="useremail" placeholder="Enter email" name="useremail" >
                                        <span class="text-danger"><?php echo $useremail_err; ?></span>
                                    </div>

                                    <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                                

                                    <div class="mb-3 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                        <label class="form-label"><?php echo $language["Password"]; ?></label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" name="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" >
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                        <span class="text-danger"><?php echo $password_err; ?></span>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                        <label class="form-check-label" for="remember-check"><?php echo $language["Remember me"]; ?></label>
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit" value="Login"><?php echo $language["Log in"]; ?></button>
                                    </div>

                                    

                                    <div class="mt-4 text-center">
                                        <a href="auth-recoverpw.php" class="text-muted"><i class="mdi mdi-lock me-1"></i><?php echo $language["Forgot your password?"]; ?></a>
                                    </div>

                                    
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p><?php echo $language["Dont have an account?"]; ?><a href="auth-register.php" class="fw-medium text-primary"><?php echo $language["Register Now"]; ?></a> </p>

                            <p>© <script>
                                    document.write(new Date().getFullYear())
                                </script> Powerec. Crafted with <i class="mdi mdi-heart text-danger"></i> by SamVerse</p>
                                
                                <div class="dropdown d-inline-block">
                                <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php if ($lang == 'en') { ?>
                                        <img src="assets/images/flags/us.jpg" alt="Header Language" height="16">
                                    <?php } ?>
                                    <?php if ($lang == 'my') { ?>
                                        <img src="assets/images/flags/malaysia.jpg" alt="Header Language" height="16">
                                    <?php } ?>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">

                                    <!-- item-->
                                    <a href="?lang=en" class="dropdown-item notify-item language" data-lang="en">
                                        <img src="assets/images/flags/us.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">English</span>
                                    </a>
                                    <!-- item-->
                                    <a href="?lang=my" class="dropdown-item notify-item language" data-lang="my">
                                        <img src="assets/images/flags/malaysia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Malay</span>
                                    </a>
                                </div>
                            </div>

                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- App js -->
<script src="assets/js/app.js"></script>
</body>
</html>