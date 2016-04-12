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
</head>

<body>
    <!-- Header Area -->
    <div class="header">
        <div class="navbar-inner">
            <div class="logo">
                <a href="index.php">
                    <i class="fa fa-connectdevelop"></i>
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
                        <a class="dropdown-item active" value="Newest" onclick="setSortDesignerBrowse(event);">Newest</a>
                        <a class="dropdown-item" data-dropdown="Oldest" onclick="setSortDesignerBrowse(event);">Oldest</a>
                        <a class="dropdown-item" data-dropdown="Highest Prize" onclick="setSortDesignerBrowse(event);">Highest Prize</a>
                        <a class="dropdown-item" data-dropdown="Lowest Prize" onclick="setSortDesignerBrowse(event);">Lowest Prize</a>
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
                <div id="row">

                </div>
            </div>


        <!--          //TODO   Add a load more script   -->
            
            <div class="clear cnt-center hidden">
                <button class="btn btn-secondary">Load More</button>
            </div>

        </div>
    </div>    
    <!--End of Tab Content Container-->
    
    <!--Start of Footer-->
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
    <!--End of Footer-->
    
    <!-- JavaScript -->
    <script src="js/jquery-2.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/designerSort.js"></script>
    <script src="js/designerBrowsingPage.js"></script>
    <script src="js/countdown.js"></script>
</body>

</html>