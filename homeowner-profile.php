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
                    <div class="col-xs-12">
                        <div class="media">
                            <div class="pull-left" href="#">
                                <img class="media-object img-circle img-thumbnail img-thumbnail-custom" src="<?echo $_SESSION["user_pic"]?>" alt="avatar" style="width: 125px;height:125px;">
                            </div>
                            <div id="profile" class="media-body" style="padding-left: 20px">


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

                    <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#personal">Personal</a></li>
                </ul>
            </div>
        </div>
        <!-- End of Tabs Container -->


        <!-- Content Container -->
        <div class="container">
            <div class="tab-content">

                <!-- Personal Tab -->
                <div id="personal" class="tab-pane fade in active">
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
                            <a href="index.php">
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
        <script src="js/homeownerHomePage.js"></script>
        <script src="js/homeownerDashPage.js"></script>
        <script src="js/countdown.js"></script>


    </body>

    </html>
