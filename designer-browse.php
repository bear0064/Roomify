<?php
session_start();
include ('api/authCheck.php');
include('api/designerCheck.php');
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Designer Browse</title>

        <!-- CSS -->
        <link rel="stylesheet" href="css/bootstrap-grid.css">
        <!-- Bootstrap Styling -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="css/styles.css" rel="stylesheet">
        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,900' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <!-- Header Area -->
        <!--
        <div class="header">
            <div class="navbar-inner">
                <div class="logo">
                    <a href="index.php">
                        <img src="img/footer-logo.svg" width="50">
                    </a>
                </div>
                <div class="inner-header">
                    <ul class="nav">
                        <li class="divider-vertical"></li>
                        <li><a href="designer-dashboard.php"><i class="icon-home icon-white"></i> Dashboard</a></li>
                        <li class="browse active"><a href="designer-browse.php"><i class="icon-home icon-white"></i> Browse</a></li>
                    </ul>
                    <ul class="comments">
                        <li><a href="#"><i class="fa fa-comments-o"></i></a></li>
                        <li><a href="#"><i class="fa fa-bell-o"></i></a></li>
                    </ul>
                </div>
                <div class="pull-right">
                    <ul class="nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?echo $_SESSION["user_pic"]?>" class="avatar img-circle img-thumbnail img-thumbnail-custom" alt="avatar"><i class="fa fa-chevron-down"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                <a class="dropdown-item" href="designer-profile.php">Profile</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="api/logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>
-->
        <header>
            <nav class="navbar">

                <!-- Brand -->
                <div class="navbar-brand logo">
                    <a href="index.php">
                        <img src="img/footer-logo.svg" width="50">
                    </a>
                </div>

                <!-- Links -->
                <ul class="nav navbar-nav">
                    <li class="nav-item primary-link">
                        <a class="nav-link" href="designer-dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item primary-link">
                        <a class="nav-link active" href="designer-browse.php">Browse</a>
                    </li>
                    <li class="nav-item dropdown pull-xs-right profile-pic">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                            src="<? echo $_SESSION["user_pic"] ?>"
                            class="avatar img-circle img-thumbnail img-thumbnail-custom" alt="avatar"><i
                            class="fa fa-chevron-down"></i></a>
                        <div class="dropdown-menu dropdown-profile" aria-labelledby="dropdownMenu">
                            <a class="dropdown-item" href="designer-profile.php">Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="api/logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                        </div>
                    </li>
                    <li class="primary-nav-icon nav-item pull-xs-right">
                        <a href="#" class="nav-link" data-toggle="dropdown"><i class="fa fa-bell-o"></i></a>
                        <div class="dropdown-menu dropdown-notif">
                            <div class="dropdown-menu-header">Notifications <span class="label label-pill label-danger">0</span></div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">You have 0 notifications</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">View all</a>
                        </div>
                    </li>
                    <li class="primary-nav-icon nav-item pull-xs-right">
                        <a href="#" class="nav-link" data-toggle="dropdown"><i class="fa fa-envelope-o"></i></a>
                        <div class="dropdown-menu dropdown-inbox">
                            <div class="dropdown-menu-header">Inbox <span class="label label-pill label-danger">0</span></div>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">You have 0 messages</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">View all</a>
                        </div>
                    </li>
                    <!--TODO SWITCH VIEW BUTTON-->
                    <?php if($_SESSION['user_type'] == 1)
                    { echo "<li class='primary-nav-icon nav-item pull-xs-right'>
                        <a class='nav-link' data-userType='homeowner' onclick='changeUserType(this.dataset);'>
                            <img class='person-icon' src='img/person-icon.svg' width='23'>Switch User Type
                        </a>
                    </li>";
                    }
                    ?>
                </ul>
            </nav>
        </header>
        <!-- End of Header Area -->

        <!-- Tabs Container -->
        <div class="tabs">
            <div class="container">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#active">Active Contests</a></li>
                </ul>
            </div>
        </div>
        <!-- End of Tabs Container -->

        <!-- Tab Content Container -->
        <div class="container">
            <div class="tab-content">

                <!-- Sort Dropdown -->
                <div class="dropdown-category cnt-right">
                    <div class="btn-group">
                        <button type="button" id="dropDownName" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Newest
                            <span class="caret"></span>
                        </button>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                            <a class="dropdown-item active" value="Newest" onclick="sortActive(event);">Newest</a>
                            <a class="dropdown-item" data-dropdown="Oldest" onclick="sortActive(event);">Oldest</a>
                            <a class="dropdown-item" data-dropdown="Highest Prize" onclick="sortActive(event);">Highest Prize</a>
                            <a class="dropdown-item" data-dropdown="Lowest Prize" onclick="sortActive(event);">Lowest Prize</a>
                        </div>

                    </div>
                </div>

                <!-- Active Tab w No Active Contests -->
                <!--
            <div id="active" class="tab-pane fade in active cnt-center">
                <p>You have no active contests.</p>
                <p>Browse contests <a href="#browse.php">here</a></p>
            </div>
-->

                <!-- Active Tab w Active Contests -->
                <div id="active" class="tab-pane fade in active">
                    <div id="activerow" class="row">

                    </div>
                    <div class="cnt-center">
                        <button class="btn btn-secondary">Load More</button>
                    </div>

                </div>
            </div>
        </div>
        <!--End of Tab Content Container-->

        <!--Start of Footer-->
        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="img/footer-logo.svg" width="50">
                    </div>
                    <div class="col-md-6 footer-nav">
                        <ul>
                            <li><a href="#0">Contact Us</a></li>
                            <li><a href="#0">Team</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!--End of Footer-->

        <!-- JavaScript -->
        <script src="js/libs/jQuery/jquery-2.2.1.min.js"></script>
        <script src="js/libs/bootstrap/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/designerSort.js"></script>
        <script src="js/designerBrowsingPage.js"></script>
        <script src="js/countdown.js"></script>
    </body>

    </html>