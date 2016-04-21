<?php
session_start();
include('api/authCheck.php');
include('api/designerCheck.php');
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
        <link href="css/modal.css" rel="stylesheet">
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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img
                            src="<? echo $_SESSION["user_pic"] ?>"
                            class="avatar img-circle img-thumbnail img-thumbnail-custom"
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
                        <a class="nav-link active" href="designer-dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item primary-link">
                        <a class="nav-link" href="designer-browse.php">Browse</a>
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
                    <li class="primary-nav-icon nav-item pull-xs-right">
                        <a class="nav-link" href="">
                            <img class="person-icon" src="img/person-icon.svg" width="23">Switch User Type
                        </a>
                    </li>
                </ul>
            </nav>
        </header>
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

                <!--            <div id="contestOutput">-->


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
                <!--        <div id="submissions" class="tab-pane empty fade cnt-center">-->
                <!--            <p>There are no submissions to this contest yet.</p>-->
                <!--        </div>-->

                <!--            actual submissions  -->
                <div id="submissions" class="tab-pane fade">
                    <div class="container">
                        <div id="outputSubmissions" class='row'>

                        </div>
                    </div>

                    <!-- End of Submissions Tab -->

                    <!-- output div ends here-->
                    <!--            </div>-->

                </div>

            </div>
        </div>
        <!-- End of Contest Tabs Content -->



        <!-- Submission Modal -->

        <div class="modal fade" id="submissionModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header myHeader">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="">&times;</button>
                        <h5 class="modal-title">Submit to Contest</h5>
                    </div>
                    <div class="col-sm-12" style="padding: 0.9375rem;">
                        <!-- Drop Zone -->
                        <div id="imageUploadBox" class="col-sm-5 uploadWrapper">
                            <div class="upload-drop-zone" id="dropZone">
                                Just drag and drop files here
                            </div>

                            <!-- Standard Form -->
                            <form action="" method="post" enctype="multipart/form-data" id="uploadForm">
                                <div class="form-inline">
                                    <div class="form-group inputWrapper">
                                        <input type="file" name="files[]" class="fileInput" onchange="subBtnActivate();" id="uploadFiles">OR BROWSE
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary hidden" id="uploadSubmit">Upload files
                                    </button>
                                </div>
                            </form>
                        </div>

                        <div id="imagePreview" class="col-sm-5 hidden">
                            <img class="img-thumbnail myThumb nopadding" src="img/imgPlaceHolder.png">
                            <div>
                                <h6 id="imgName" class="b3header"><i class="fa fa-times pull-right"></i></h6>
                                <p class="progBar"></p>
                            </div>
                        </div>

<<<<<<< Updated upstream
                        <div class="col-sm-7" style="padding-right: 0;">
                            <textarea id="submissionDesc" rows="8" class="form-control" placeholder="Describe your mood board here."></textarea>
                            <div class="divider col-sm-12 nopadding">
                                <hr>
                            </div>
                            <h6 class="b3header">Budget Used <span id="budgetVal" class="pull-xs-right">$500</span></h6>
                            <input type="range" id="budgetSlider" class="" value="500" min="200" max="15000" step="50" oninput="showBudgetValue(this.value);">
=======
                        <div class="modal-footer myFooter" id="submissionFooter">
                            <button id="cancelBtn" type="button" class="btn btn-default pull-xs-left" data-dismiss="modal" onclick="clearModal();">
                                Cancel
                            </button>
                            <span id="modalError" class="center"></span>
                            <button id="submitBtn" type="button" class="btn btn-primary pull-xs-right" onclick="finalizeSubmit();">
                                Submit
                            </button>
>>>>>>> Stashed changes
                        </div>

                    </div>

                    <div class="modal-footer myFooter" id="submissionFooter">
                        <button id="cancelBtn" type="button" class="btn btn-default pull-xs-left" onclick="clearModal();">
                            Cancel
                        </button>
                        <span id="modalError" class="center"></span>
                        <button id="submitBtn" type="button" class="btn btn-primary pull-xs-right" onclick="finalizeSubmit();">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!-- End of Submission Modal -->


        <!-- Submission View Pop-Up -->

        <div class="modal fade" id="submissionView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="row">
                        <div class="col-sm-8 nopadding">
                            <img id="submissionImage" src="" style="max-width:100%;" />
                        </div>
                        <div class="col-sm-4">
                            <p id="submissionText" style="margin-top"></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <!-- End of Submission View Pop-Up -->

        <!-- Footer -->
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
            <!-- End of Footer -->

            <!-- JavaScript -->
            <script src="js/libs/jQuery/jquery-2.2.1.min.js"></script>
            <script src="js/libs/bootstrap/bootstrap.min.js"></script>
            <script src="js/main.js"></script>
            <script src="js/displayContest.js"></script>
            <script type="text/javascript" src="js/libs/flickity/flickity.pkgd.min.js"></script>
            <script src="js/countdown.js"></script>
            <script src="js/submitModal.js"></script>
    </body>

    </html>