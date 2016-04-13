<?php
session_start();
include ('api/authCheck.php');
include('api/homeownerCheck.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homeowner Profile</title>

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
                    <li><a href="homeowner-dashboard.php"><i class="icon-home icon-white"></i> Dashboard</a></li>
                    <li class="browse"><a href="homeowner-browse.php"><i class="icon-home icon-white"></i> Browse</a></li>
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

    <!-- Profile Info Container -->
    <div class="profile">
        <div class="container" style="padding-top: 50px">
            <div class="row">
                <div class="col-xs-8">
                    <div class="media">
                        <div class="pull-left" href="#">
                            <img class="media-object img-circle img-thumbnail img-thumbnail-custom" src="<?echo $_SESSION["user_pic"]?>" alt="avatar" style="width: 125px;height:125px;">
                        </div>
                        <div id="profile" class="media-body" style="padding-left: 20px">


                        </div>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="row">
                        <div class="col-xs-3 mail-like">
                            <a href="#" class="item-right"><i class="fa fa-envelope-o"></i></a>
                            <div class="clear"></div>
                        </div>
                        <ul class="pager col-xs-7 item-right">
                            <li><a href="#">Edit Profile</a></li>
                        </ul>
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
                <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#personal">Personal</a></li>
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
    <p>You have no active contests.</p>
    <p>Click <a href="#">here</a> to get started!</p>
</div>
-->

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
                    </div>
                </div>
            </div>
            
                <div class="row">
                    <!-- CHANGE - removed col-sm-6 from cards -->
                    <div class="col-md-6">
                        <div class="card">
                            <a href="homeowner-contest.php">
                                <div class="card-block">
                                <h5 class="card-title">Make my bathroom modern</h5>
                                <h6 class="card-subtitle text-muted">Bathroom</h6>
                            </div>
                            
                            <div class="submittedBadge hidden">
                                <span>Submitted</span>
                            </div>
                            
                            <img class="card-img" src="images/slider/1.png" alt="Card image">
                            
                            <div class="card-block card-block-footer">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <span>Days Remaining</span><br>
                                        <span class="prize">3 Days</span>
                                    </div>
                                    <div class="col-xs-4 text-xs-right">
                                        <span>Prize</span><br>
                                        <span class="prize">$400</span>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <a href="#">
                                <div class="card-block">
                                <h5 class="card-title">Make my bathroom modern</h5>
                                <h6 class="card-subtitle text-muted">Bathroom</h6>
                            </div>
                            
                            <div class="submittedBadge hidden">
                                <span>Submitted</span>
                            </div>
                            
                            <img class="card-img" src="images/slider/1.png" alt="Card image">
                            
                            <div class="card-block card-block-footer">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <span>Days Remaining</span><br>
                                        <span class="prize">3 Days</span>
                                    </div>
                                    <div class="col-xs-4 text-xs-right">
                                        <span>Prize</span><br>
                                        <span class="prize">$400</span>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Completed Tab w No Completed Contests -->
            <div id="completed" class="tab-pane fade cnt-center empty">
                <p>You have no completed contests.</p>
            </div>

            <!-- Personal Tab -->
            <div id="personal" class="tab-pane fade">
                <form>
                    <!-- Personal Info -->
                    <div class="row personalInfo">
                        <div class="col-md-4">
                            <h6>PERSONAL INFORMATION</h6>
                        </div>
                        <div class="col-md-8">
                            <fieldset class="form-group personalForm">
                                <label for="firstNameInput">First Name</label>
                                <input type="text" class="form-control" id="firstNameInput" placeholder="">
                            </fieldset>
                            <fieldset class="form-group personalForm">
                                <label for="lastNameInput">Last Name</label>
                                <input type="text" class="form-control" id="lastNameInput" placeholder="">
                            </fieldset>
                            <div class="row personalForm">
                                <fieldset class="form-group col-sm-6">
                                    <label for="addressInput">Address</label>
                                    <input type="text" class="form-control" id="addressInput" placeholder="">
                                </fieldset>
                                <fieldset class="form-group col-sm-6">
                                    <label for="address2Input">Address 2</label>
                                    <input type="text" class="form-control" id="address2Input" placeholder="">
                                </fieldset>
                            </div>
                            <div class="row personalForm">
                                <fieldset class="form-group col-sm-6">
                                    <label for="cityInput">City</label>
                                    <input type="text" class="form-control" id="cityInput" placeholder="">
                                </fieldset>
                                <fieldset class="form-group col-sm-6">
                                    <label for="stateInput">State / Province</label>
                                    <input type="text" class="form-control" id="stateInput" placeholder="">
                                </fieldset>
                            </div>
                            <div class="row personalForm">
                                <fieldset class="form-group col-sm-6">
                                    <label for="zipInput">Zip / Postal Code</label>
                                    <input type="text" class="form-control" id="zipInput" placeholder="">
                                </fieldset>
                                <fieldset class="form-group col-sm-6">
                                    <label for="countryInput">Country</label>
                                    <input type="text" class="form-control" id="countryInput" placeholder="">
                                </fieldset>
                            </div>
                            <fieldset class="form-group personalForm">
                                <label for="phoneNumber">Phone Number</label>
                                <div class="input-group">
                                    <div class="input-group-addon">+1</div>
                                    <input type="text" class="form-control" id="phoneNumber" placeholder="">
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <hr>
                    <!-- End of Personal Info -->

                    <!-- Languages -->
                    <div class="row languages">
                        <div class="col-md-4">
                            <h6>LANGUAGES</h6>
                            <p class="text-muted">Please select all languages you are proficient with.</p>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="" checked> English
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value=""> French
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value=""> Italian
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value=""> Spanish
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value=""> Portuguese
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value=""> Japanese
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value=""> Russian
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value=""> German
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <!-- End of Languages -->

                    <!-- Email -->
                    <div class="row email">
                        <div class="col-md-4">
                            <h6>EMAIL</h6>
                        </div>
                        <div class="col-md-8">
                            <fieldset class="form-group">
                                <label for="emailInput">Email</label>
                                <input type="text" class="form-control" id="emailInput" placeholder="">
                            </fieldset>
                        </div>
                    </div>
                    <hr>
                    <!-- End of Email -->

                    <!-- Password -->
                    <div class="row password">
                        <div class="col-md-4">
                            <h6>PASSWORD</h6>
                        </div>
                        <div class="col-md-8">
                            <p><a href="#">Change current password</a></p>
                        </div>
                    </div>
                    <!-- End of Password -->

                    <!-- Save Button -->
                    <div class="row save">
                        <div class="pull-xs-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    <!-- End of Save Button -->
                </form>
            </div>
            <!-- End of Personal Tab -->


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
    <script src="js/designerHome.js"></script>


</body>

</html>