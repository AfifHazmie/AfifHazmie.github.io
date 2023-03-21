<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.php" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/Powerecwhite.png" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/PowerecIcon.png" height="40">
                    </span>
                </a>

                <a href="index.php" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/Powerecwhite.png" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/PowerecIcon.png" height="40">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

<!-- ========== Language Start ========== -->
        <div class="d-flex">

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
<!-- ========== Language End ========== -->

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="assets/images/users/profilepic.jpg" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php echo ucfirst($_SESSION["username"]); ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">

                    <!-- item-->
                    <a class="dropdown-item" href="edit-profile-employee.php"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile"><?php echo $language["Edit Profile"]; ?></span></a>
        
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout"><?php echo $language["Logout"]; ?></span></a>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>
        </div>
    </div>
</header>

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">
    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?php echo $language["Menu"]; ?></li>
                <li>
                    <a href="admin-employee.php" key="t-dashboards"><i class="bx bxs-home"></i>
                        <span key="t-Dashboard"><?php echo $language["Dashboard"]; ?></span>
                    </a>
                </li>

                <li class="menu-title" key="t-services"><?php echo $language["Service"]; ?></li>

                <li>
                    <a href="service-employee.php" class="waves-effect">
                        <i class="bx bx-wrench"></i>
                        <span key="t-Service"><?php echo $language["Services Available"]; ?></span>
                </a>
                </li>

                <li>
                    <a href="service-request-employee.php" class="waves-effect">
                        <i class="bx bxs-detail"></i>
                        <span key="t-Service"><?php echo $language["Requested Service"]; ?></span>
                    </a>
                </li>
                

                <li>
                    <a href="javascript: void(0);" class="has-arrow" key="t-horizontal"><i class="bx bxs-file"></i>
                        <span key="t-Quotation"><?php echo $language["Quotation"]; ?></span>
                    </a>

                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="quotations-create-employee.php" key="t-level-1-1"><?php echo $language["New"]; ?></a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2"><?php echo $language["Manage"]; ?></a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li>
                                    <a href="quotations-list-employee.php" key="t-level-2-1"><?php echo $language["Pending"]; ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="quotations-list-accept-employee.php" key="t-level-2-2"><?php echo $language["Accepted"]; ?>
                                    
                                    </a>
                                </li>
                                <li>
                                    <a href="quotations-list-reject-employee.php" key="t-level-2-3"><?php echo $language["Rejected"]; ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2"><?php echo $language["History"]; ?></a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li>
                                    <a href="quotations-list-complete-employee.php" key="t-level-2-1"><?php echo $language["Completed"]; ?>  
                                    </a>
                                </li>
                                <li>
                                    <a href="quotations-list-discard-employee.php" key="t-level-2-4"><?php echo $language["Discarded"]; ?>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="menu-title" key="t-Feedback"><?php echo $language["Completed Quote"]; ?></li>

                <li>
                    <a href="feedbacklist-employee.php" key="feedback"><i class="bx bx-comment-dots"></i>
                        <span key="t-Feedback"><?php echo $language["View Feedback"]; ?></span>
                    </a>
                </li>

                <li class="menu-title" key="t-user"><?php echo $language["User"]; ?></li>

                <li>
                    <a href="manageUser-employee.php" key="manageuser"><i class="bx bxs-user-detail"></i>
                        <span key="t-User"><?php echo $language["Manage User"]; ?></span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->               