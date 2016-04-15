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
    <title>Designer viewing Homeowner Profile</title>


    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <!-- Bootstrap Styling -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="css/styles.css" rel="stylesheet">
</head>

<body>
<!-- Header Area -->
<div class="header">
    <div class="navbar-inner">
        <div class="logo">
            <a href="#">
                <i class="fa fa-connectdevelop"></i>
            </a>
        </div>
        <div class="inner-header">
            <ul class="nav">
                <li class="divider-vertical"></li>
                <li><a href="designer-dashboard.php">Dashboard</a></li>
                <li class="browse"><a href="designer-browse.php">Browse</a></li>
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
<!-- End of Header Area -->

<!-- Profile Info Container -->
<div class="profile">
    <div class="container" style="padding-top: 50px">
        <div class="row">
            <div class="col-xs-8">
                <div id="homeownerProfile" class="media">

                </div>
            </div>
            <div class="col-xs-3">
                <div class="row">
                    <div class="col-xs-offset-6 col-xs-6 mail-like">
                        <a href="#" class="item-right"><i class="fa fa-envelope-o"></i></a>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Profile Info Container -->

<!-- Tabs Container -->
<div class="tabs">
    <div class="container">
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#active">Active</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#completed">Completed</a></li>
        </ul>
    </div>
</div>
<!-- End of Tabs Container -->

<!-- Content Container -->
<div class="container">
    <div class="tab-content">

            <!-- Sort Dropdown -->
            <div class="dropdown-category cnt-right">
                <div class="btn-group">
                    <button type="button" id="dropDownName" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Newest <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                        <a class="dropdown-item active" value="Newest" onclick="sortActive(event);">Newest</a>
                        <a class="dropdown-item" data-dropdown="Oldest" onclick="sortActive(event);">Oldest</a>
                        <a class="dropdown-item" data-dropdown="Highest Prize" onclick="sortActive(event);">Highest Prize</a>
                        <a class="dropdown-item" data-dropdown="Lowest Prize" onclick="sortActive(event);">Lowest Prize</a>
                    </div>
                </div>
            </div>
            <!-- End of Sort Dropdown-->

            <!-- Cards -->
            <div id="active" class="tab-pane fade in active">
                <div id="activerow" class="row">


                </div>
                <!-- End of Cards -->
            </div>
            <!-- End of Active Tab w Active Contests -->


            <!-- Completed Tab w No Completed Contests -->
            <div id="completed" class="tab-pane empty fade cnt-center">
                <div id="completedrow" class="row">

                </div>
            </div>
            <!-- End of Completed Tab w No Completed Contests -->

        </div>

    </div>
</div>
    <!-- End of Content Container -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-1">
                    <div class="logo">
                        <a href="#">
                            <i class="fa fa-connectdevelop"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="title-link">
                        Links
                    </div>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Security</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <div class="title-link">
                        About Us
                    </div>
                    <ul>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Sign In</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <div class="title-link">
                        Social
                    </div>
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                    </ul>
                </div>
                <div class="col-md-5 contact">
                    <p>info@newraum.com</p>
                    <p>1.123.456.7890</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 col-md-offset-1 copyright">
                    &copy;2016 NewRaum
                </div>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- JavaScript -->
    <script src="js/libs/jQuery/jquery-2.2.1.min.js"></script>
    <script src="js/libs/bootstrap/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/displayHomeownerProfile.js"></script>

</body>

</html>