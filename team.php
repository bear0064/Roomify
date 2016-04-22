<?php
session_start();
?>
    <!DOCTYPE html>
    <html lang="">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Roomify</title>
        <!-- Bootstrap Grid -->
        <link rel="stylesheet" href="css/bootstrap-grid.css">
        <!-- Bootstrap Styling -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,900' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <header class="cd-header">
            <div class="cd-logo">
                <a href="index.php"><img src="img/cd-logo.svg" width="110"></a>
            </div>


            <nav>
                <ul class="cd-secondary-nav">
                    <li class="nav-item pull-xs-right signin-btn btn">
                        <a id="loginButtonDiv" href="login.php">
                            <img class="person-icon" src="img/person-icon.svg" width="23">Log in
                        </a>
                    </li>

                </ul>
            </nav>

            <a class="cd-primary-nav-trigger" href="#0">
                <button class="hamburger hamburger--squeeze" type="button" data-toggle="collapse" data-target="#responsiveMenu">
                    <span class="hamburger-box">
                <span class="hamburger-inner"></span>
                    </span>
                </button>
            </a>
        </header>

        <nav>
            <ul class="cd-primary-nav">
                <li class="cd-label">Account</li>
                <li><a href="#0">Sign in</a></li>

                <li class="cd-label">Menu</li>
                <li><a href="#0">What is Roomify?</a></li>
                <li><a href="#0">Homeowners</a></li>
                <li><a href="#0">Designers</a></li>

                <li class="cd-label">Company</li>

                <li><a href="#0">Contact Us</a></li>
                <li><a href="#0">Team</a></li>
            </ul>
            <div class="primary-nav-fade"></div>
        </nav>

<section id="section5">
    <div class="container">
        <div class="row">
            <div class="team-title">
                <div class="row">Team</div>
                <div class="row team">ten23mb</div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 teamBox">
                <div class="card designerCard text-xs-center">
                    <div class="card-block">
                        <img class="media-object img-circle img-thumbnail img-thumbnail-custom" src="img/kb.jpg" style="width: 125px; height:125px; margin:0 auto; margin-top:-50px" width="100%" alt="Card image cap">
                    </div>
                    <div class='card-block designerInfo'>
                        <div class="row">Kari Ball</div>
                        <div class="row">User Interface Designer</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 teamBox">
                <div class="card designerCard text-xs-center">
                    <div class="card-block">
                        <img class='media-object img-circle img-thumbnail img-thumbnail-custom' src="img/my.jpg" style="width: 125px; height:125px; margin:0 auto; margin-top:-50px" width="100%" alt="Card image cap">
                    </div>
                    <div class='card-block designerInfo'>
                        <div class="row">Matt Young</div>
                        <div class="row">Full-Stack Developer</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 teamBox">
                <div class="card designerCard text-xs-center">
                    <div class="card-block">
                        <img class='media-object img-circle img-thumbnail img-thumbnail-custom' src="img/sc.jpg" style="width: 125px; height:125px; margin:0 auto; margin-top:-50px" width="100%" alt="Card image cap">
                    </div>
                    <div class='card-block designerInfo'>
                        <div class="row">Sara Carpinone</div>
                        <div class="row">Front-End Developer</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-offset-2 teamBox">
                <div class="card designerCard text-xs-center">
                    <div class="card-block">
                        <img class='media-object img-circle img-thumbnail img-thumbnail-custom' src="img/imgPlaceHolder.png" style="width: 125px; height:125px; margin:0 auto; margin-top:-50px" width="100%" alt="Card image cap">
                    </div>
                    <div class='card-block designerInfo'>
                        <div class="row">Caleb Bear</div>
                        <div class="row">Back-End Developer</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 teamBox">
                <div class="card designerCard text-xs-center">
                    <div class="card-block">
                        <img class='media-object img-circle img-thumbnail img-thumbnail-custom' src="img/imgPlaceHolder.png" style="width: 125px; height:125px; margin:0 auto; margin-top:-50px" width="100%" alt="Card image cap">
                    </div>
                    <div class='card-block designerInfo'>
                        <div class="row">Doan Khanh</div>
                        <div class="row">Front-End Developer</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


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

        <script type="text/javascript">
            // Look for .hamburger
            var hamburger = document.querySelector(".hamburger");
            // On click
            hamburger.addEventListener("click", function () {
                // Toggle class "is-active"
                hamburger.classList.toggle("is-active");
                // Do something else, like open/close menu
            });
        </script>
        <script src="js/jquery-2.2.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/style.js"></script>
        <script src="js/main.js"></script>
        <script src="js/login.js"></script>

    </body>

    </html>