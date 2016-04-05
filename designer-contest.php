<?php
session_start();
include('api/authCheck.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Designer Contest</title>

    <!-- CSS -->
    <!--    <link rel="stylesheet" href="css/bootstrap-grid.css">-->
    <!-- Bootstrap Styling -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="js/libs/flickity/flickity.css" rel="stylesheet">
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
                <li><a href="designer-dashboard.php"><i class="icon-home icon-white"></i> Dashboard</a></li>
                <li class="browse"><a href="designer-browse.php">Browse</a></li>
            </ul>
            <ul class="comments">
                <li>
                    <a href="#"><i class="fa fa-comments-o"></i></a></li>
                <li><a href="#"><i class="fa fa-bell-o"></i></a></li>
            </ul>
        </div>
        <div class="pull-right">
            <ul class="nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?echo $_SESSION["user_pic"]?>"
                                                                                    class="avatar img-circle img-thumbnail"
                                                                                    alt="avatar"><i
                            class="fa fa-chevron-down"></i></a>
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

<!-- Tabs container -->
<div class="tabs">
    <div class="container link-breadcrumb">
        <div class="row">
            <div class="col-xs-9 back">
                <i class="fa fa-chevron-left"></i>
                <a href="designer-browse.php">All Contests</a>
            </div>
            <ul id="designerSubmit" class="pager col-xs-3">
<!--                <li><a href="#">Submit</a></li>-->
            </ul>
        </div>
        <div class="clear"></div>
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#brief">Contest Brief</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#submissions">Submissions</a></li>
        </ul>
    </div>
</div>
<!-- End of Tabs Container -->

<!-- Contest Tabs Content -->
<div class="contestContent">
    <div class="tab-content">

        <!-- Contest Brief Tab -->

        <div id="brief" class="tab-pane fade in active">

            <!-- Brief Title -->
            <div id="contBrief">
            <!-- End of Brief Title -->
            </div>
            <!-- Slide Container -->
            <div id="imageSlider" class="tab-content slider">

            </div>
            <!-- End of Slider Container -->

            <!-- Brief Description -->
            <div class="row">
                <div class="col-md-6">
                    <div id="contestInfo" class="info">

                    </div>
                </div>
                <div class="col-md-3 col-md-offset-3">
                    <div id="sideInfo" class="info">

                    </div>
                </div>
            </div>
            <!-- End of Brief Description -->

        </div>
        <!-- End of Contest Brief Tab -->


        <!-- Contest Submissions Tab -->

        <!-- no submissions yet -->
        <!-- <div id="submissions" class="tab-pane empty fade cnt-center">
            <p>There are no submissions to this contest yet.</p>
        </div> -->

        <!-- actual submissions -->
        <div id="submissions" class="tab-pane fade">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card submissionCard">
                            <a href="#">
                                <img class="card-img-top" src="images/1.png" width="100%" alt="Card image cap">
                                <div class="card-block">
                                    <p class="card-text">Description of designers work will go here. For example, explanations for the choices they made, how they think their design will benefit the room, etc...</p>
                                    <div class="card-fade"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End of Submissions Tab -->
    </div>
</div>
<!-- End of Contest Tabs Content -->

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-1 col-md-1">
                <div class="logo">
                    <a href="#">
                        <i class="fa fa-connectdevelop"></i>
                    </a>
                </div>
            </div>
            <div class="col-sm-2 col-md-2">
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
            <div class="col-sm-2 col-md-2">
                <div class="title-link">
                    About Us
                </div>
                <ul>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Sign In</a></li>
                </ul>
            </div>
            <div class="col-sm-2 col-md-2">
                <div class="title-link">
                    Social
                </div>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                </ul>
            </div>
            <div class="col-sm-5 col-md-5 contact">
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
<script src="js/jquery-2.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/viewOneContest.js"></script>
<script type="text/javascript" src="js/libs/flickity/flickity.pkgd.min.js"></script>
<script src="js/countdown.js"></script>
</body>

</html>