<?php
session_start();
include ('api/authCheck.php');
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
    <link rel="stylesheet" href="css/bootstrap.css">    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
                    <li><a href="homeowner-dashboard.php"><i class="icon-home icon-white"></i> Dashboard</a></li>
                    <li class="browse active"><a href="homeowner-browse.php"><i class="icon-home icon-white"></i> Browse</a></li>
                </ul>
                <ul class="comments">
                    <li><a href="#"><i class="fa fa-comments-o"></i></a></li>
                    <li><a href="#"><i class="fa fa-bell-o"></i></a></li>
                </ul>
            </div>
            <div class="pull-right">
                <ul class="nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?echo $_SESSION["user_pic"]?>" class="avatar img-circle img-thumbnail" alt="avatar"><i class="fa fa-chevron-down"></i></a>
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
    <!-- End of Header Area -->

    <!-- Tabs Container -->
    <div class="tabs">
        <div class="container">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#allDesigners">All Designers</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#yourDesigners">Your Designers</a></li>
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
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Newest <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                        <a class="dropdown-item" href="#">Oldest</a>
                        <a class="dropdown-item active" href="#">Newest</a>
                    </div>
                </div>
            </div>

            <!-- All Designers Tab -->
            <div id="allDesigners" class="tab-pane fade in active">
                <div class="row">
                    <!--CHANGE - removed col-sm-6 from cards -->
                    <div class="col-md-6">
                        <div class="card designerCard">
                            <img class="card-img-top" src="images/1.png" width="100%" alt="Card image cap">
                            <div class="card-block">
                                <h6 class="card-title pull-xs-left"><a href="homeowner-view-designerProfile.html">Natalia S</a></h6>
                                <div class="pull-xs-right">
                                    <a href="#" class="link-like"><span class="number-like">21</span><i class="fa fa-heart-o"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card designerCard">
                            <img class="card-img-top" src="images/1.png" width="100%" alt="Card image cap">
                            <div class="card-block">
                                <h6 class="card-title pull-xs-left">Designer 2</h6>
                                <div class="pull-xs-right">
                                    <a href="#" class="link-like"><span class="number-like">12</span><i class="fa fa-heart-o"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card designerCard">
                            <img class="card-img-top" src="images/1.png" width="100%" alt="Card image cap">
                            <div class="card-block">
                                <h6 class="card-title pull-xs-left">Designer 3</h6>
                                <div class="pull-xs-right">
                                    <a href="#" class="link-like"><span class="number-like">17</span><i class="fa fa-heart-o"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card designerCard">
                            <img class="card-img-top" src="images/1.png" width="100%" alt="Card image cap">
                            <div class="card-block">
                                <h6 class="card-title pull-xs-left">Designer 4</h6>
                                <div class="pull-xs-right">
                                    <a href="#" class="link-like"><span class="number-like">8</span><i class="fa fa-heart-o"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card designerCard">
                            <img class="card-img-top" src="images/1.png" width="100%" alt="Card image cap">
                            <div class="card-block">
                                <h6 class="card-title pull-xs-left">Designer 5</h6>
                                <div class="pull-xs-right">
                                    <a href="#" class="link-like"><span class="number-like">19</span><i class="fa fa-heart-o"></i></a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card designerCard">
                            <img class="card-img-top" src="images/1.png" width="100%" alt="Card image cap">
                            <div class="card-block">
                                <h6 class="card-title pull-xs-left">Designer 6</h6>
                                <div class="pull-xs-right">
                                    <a href="#" class="link-like"><span class="number-like">10</span><i class="fa fa-heart-o"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--CHANGE - added Load More Button -->
                <div class="cnt-center">
                    <button class="btn btn-secondary">Load More</button>
                </div>
            </div>
            
            <!-- Your Designers Tab w No Favourite Designers --> 
            <div id="yourDesigners" class="tab-pane fade cnt-center">
                <p>You have no favourite designers.</p>
                <p>Browse designers <a href="homeowner-browse.php">here</a></p>
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
</body>

</html>