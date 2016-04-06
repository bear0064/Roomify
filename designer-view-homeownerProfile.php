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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="images/avatar.jpg" class="avatar img-circle img-thumbnail img-thumbnail-custom" alt="avatar"><i class="fa fa-chevron-down"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                            <a class="dropdown-item" href="designer-profile.php">Profile</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Logout</a>
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
                <div class="media">
                    <div class="pull-left" href="#">
                        <img class="media-object img-circle img-thumbnail img-thumbnail-custom" src="images/128.jpg" alt="avatar" style="width: 125px;height:125px;">
                    </div>
                    <div class="media-body" style="padding-left: 20px">
                        <br>
                        <p><span class="name">Mike Z</span></p>
                        <p>
                            English
                            <br> America
                        </p>
                    </div>
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

            <!-- Active Tab w No Active Contests -->
            <!--
<div id="active" class="tab-pane fade in active cnt-center">
    <p>This homeowner has no active contests.</p>
</div>
-->
            <!-- End of Active Tab w No Active Contests -->

            <!-- Active Tab w Active Contests -->
            <div id="active" class="tab-pane fade in active">
            
            <!-- Sort Dropdown -->
            <div class="dropdown-category cnt-right">
                <div class="btn-group">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Newest <span class="caret"></span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                        <a class="dropdown-item" href="#">Oldest</a>
                        <a class="dropdown-item active" href="#">Newest</a>
                        <a class="dropdown-item" href="#">Highest Prize</a>
                        <a class="dropdown-item" href="#">Lowest Prize</a>
                        <a class="dropdown-item" href="#">Most Time Left</a>
                        <a class="dropdown-item" href="#">Least Time Left</a>
                    </div>
                </div>
            </div>
            <!-- End of Sort Dropdown-->
             
            <!-- Cards -->
            <div class="row">
                    <div class="col-sm-6 col-md-6">
                        <div class="card">
                            <a href="designer-contest.php">
                                <div class="image-wrapper overlay-fade-in">
                                    <img class="card-img-top" src="images/slider/1.png" width="100%" alt="Card image cap">
                                    <div class="image-overlay-content">
                                        <h2><i class="fa fa-star-o"></i><i class="fa fa-check-circle-o"></i></h2>
                                        <div class="specs pull-xs-right">
                                            <p class="">2 designs</p>
                                            <p class="">3 days 14 hours</p>
                                        </div>
                                        <h6 class="pull-xs-left">
                                            <span class="label">Bedroom</span>
                                            <span class="label">Bathroom</span>
                                        </h6>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <h6 class="card-title pull-xs-right prize">$600</h6>
                                    <h5 class="card-title pull-xs-left">Brighten up this space</h5>
                                </div>
                                <div class="card-block">
                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <div class="card-fade"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="card">
                            <a href="#">
                                <div class="image-wrapper overlay-fade-in">
                                    <img class="card-img-top" src="images/1.png" width="100%" alt="Card image cap">
                                    <div class="image-overlay-content">
                                        <h2><i class="fa fa-star-o"></i><i class="fa fa-check-circle-o"></i></h2>
                                        <div class="specs pull-xs-right">
                                            <p class="">2 designs</p>
                                            <p class="">3 days 14 hours</p>
                                        </div>
                                        <h6 class="pull-xs-left">
                                            <span class="label">Bedroom</span>
                                            <span class="label">Bathroom</span>
                                        </h6>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <h6 class="card-title pull-xs-right prize">$600</h6>
                                    <h5 class="card-title pull-xs-left">Card title</h5>
                                </div>
                                <div class="card-block">
                                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <div class="card-fade"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End of Cards -->
            
            </div>
            <!-- End of Active Tab w Active Contests -->
            

            <!-- Completed Tab w No Completed Contests -->
            <div id="completed" class="tab-pane empty fade cnt-center">
                <p>This homeowner has no completed contests.</p>
            </div>
            <!-- End of Completed Tab w No Completed Contests -->

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
    <script src="js/jquery-2.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>