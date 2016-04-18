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
        <title>Designer Profile</title>
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
                        <li class="browse"><a href="designer-browse.php"><i class="icon-home icon-white"></i> Browse</a></li>
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

        <!-- Content Container -->
        <div class="container">
            <div class="col-sm-2 col-md-2">
                NOTIFICATIONS
            </div>
            <div class="col-sm-8 col-md-8 col-md-offset-2">
                <div class="list-item list-item-checkbox">
                    <div class="title">
                        Contests I've Submitted To
                    </div>
                    <ul>
                        <li>
                            <label>Has an update <input type="checkbox" class="ios-switch" /></label>
                        </li>
                        <li>
                            <label>Prize increased <input type="checkbox" class="ios-switch" /></label>
                        </li>
                        <li>
                            <label>Is extended<input type="checkbox" class="ios-switch" /></label>
                        </li>
                                                <li>
                            <label>Is almost over (1-3 days left?)<input type="checkbox" class="ios-switch" /></label>
                        </li>
                        <li>
                            <label>End/Has a winner declared<input type="checkbox" class="ios-switch" /></label>
                        </li>
                    </ul>
                    
                    <div class="title">
                        Contests I've Favourited
                    </div>
                    <ul>
                        <li>
                            <label>Has an update <input type="checkbox" class="ios-switch" /></label>
                        </li>
                        <li>
                            <label>Prize increased <input type="checkbox" class="ios-switch" /></label>
                        </li>
                        <li>
                            <label>Is extended<input type="checkbox" class="ios-switch" /></label>
                        </li>
                        <li>
                            <label>Becomes guarantted<input type="checkbox" class="ios-switch" /></label>
                        </li>
                        <li>
                            <label>Is almost over (1-3 days left?)<input type="checkbox" class="ios-switch" /></label>
                        </li>
                        <li>
                            <label>End/Has a winner declared<input type="checkbox" class="ios-switch" /></label>
                        </li>
                    </ul>
                    
                    <div class="title">
                        My Design
                    </div>
                    <ul>
                        <li>
                            <label>Is liked<input type="checkbox" class="ios-switch" /></label>
                        </li>
                        <li>
                            <label>Is favourited<input type="checkbox" class="ios-switch" /></label>
                        </li>
                        <li>
                            <label>Receives a comment<input type="checkbox" class="ios-switch" /></label>
                        </li>

                    </ul>
                </div>
                <div class="list-item list-item-checkbox">
                    <div class="title">
                        Contests I've Submitted To
                    </div>
                    <ul>
                        <li>
                            <input type="checkbox" id="c1" name="cc" />
                            <label for="c1"><span></span>Check Box 1</label>
                        </li>
                        <li>
                            <input type="checkbox" id="c2" name="cc" />
                            <label for="c2"><span></span>Check Box 2</label>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End of Content Container -->


        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-1 col-md-1">
                        <div class="logo">
                            <a href="#">
                                <img src="img/footer-logo.svg" width="50">
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
        <script src="js/libs/jQuery/jquery-2.2.1.min.js"></script>
        <script src="js/libs/bootstrap/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/designerHomePage.js"></script>
        <script src="js/switch.js"></script>
    </body>

    </html>
