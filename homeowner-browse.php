<?php
session_start();
include('api/authCheck.php');
include('api/homeownerCheck.php');
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homeowner Browse</title>

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
                <li><a href="homeowner-dashboard.php"><i class="icon-home icon-white"></i> Dashboard</a></li>
                <li class="browse active"><a href="homeowner-browse.php"><i class="icon-home icon-white"></i> Browse</a>
                </li>
            </ul>
            <ul class="comments">
                <li><a href="#"><i class="fa fa-comments-o"></i></a></li>
                <li><a href="#"><i class="fa fa-bell-o"></i></a></li>
            </ul>
        </div>
        <div class="pull-right">
            <ul class="nav">


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                            src="<? echo $_SESSION["user_pic"] ?>"
                            class="avatar img-circle img-thumbnail img-thumbnail-custom" alt="avatar"><i
                            class="fa fa-chevron-down"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                        <a class="dropdown-item" href="homeowner-profile.php">Profile</a>
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
        <!-- End of Header Area -->

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
                        <a class="nav-link" href="homeowner-dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item primary-link">
                        <a class="nav-link active" href="homeowner-browse.php">Browse</a>
                    </li>
                    <li class="nav-item dropdown pull-xs-right profile-pic">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                            src="<? echo $_SESSION["user_pic"] ?>"
                            class="avatar img-circle img-thumbnail img-thumbnail-custom" alt="avatar"><i
                            class="fa fa-chevron-down"></i></a>
                        <div class="dropdown-menu dropdown-profile" aria-labelledby="dropdownMenu">
                            <a class="dropdown-item" href="homeowner-profile.php">Profile</a>
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
                        <a class='nav-link' data-userType='designer' onclick='changeUserType(this.dataset);'>
                            <img class='person-icon' src='img/person-icon.svg' width='23'>Switch User Type
                        </a>
                    </li>";
                    }
                    ?>
                </ul>
            </nav>
        </header>

        <!-- Tabs Container -->
        <div class="tabs">
            <div class="container">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#allDesigners">All Designers</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#yourDesigners">Your Designers</a></li>
                </ul>
            </div>
        </div>
        <!-- End of Tabs Container -->

        <!-- Tab Content Container -->
        <div class="container">
            <div class="tab-content">
                <!-- Sort Dropdown - to be implemented later -->
                <!-- <div class="dropdown-category cnt-right">
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    Newest <span class="caret"></span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                    <a class="dropdown-item" href="#">Oldest</a>
                    <a class="dropdown-item active" href="#">Newest</a>
                </div>
            </div>
        </div> -->


                <!-- All Designers Tab -->
                <div id="allDesigners" class="tab-pane fade in active">
                    <div id="allDes" class="row"></div>
                    <div class="cnt-center hidden">
                        <button class="btn btn-secondary">Load More</button>
                    </div>
                </div>

                <!-- Your Designers Tab w No Favourite Designers -->
                <div id="yourDesigners" class="tab-pane empty fade cnt-center">
                    <div id="favDes" class="row">
                        <p>You do not have any favourite designers</p>
                        <p>Browse designers <a href="homeowner-browse.php">here</a></p>
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
        <script src="js/homeownerBrowsingPage.js"></script>
    </body>

    </html>