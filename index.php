<?php
session_start();
?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewRaum – Make your House a Home</title>
    <!-- Bootstrap Grid -->
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <!-- Bootstrap Styling -->
    <link rel="stylesheet" href="css/bootstrap.css">

<body>
    <nav class="navbar navbar-full bg-faded">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="#">Logo</a>
            <!-- Links -->
            <ul class="nav navbar-nav pull-xs-right">
                <?php
                if(isset($_SESSION['user_id']) && isset($_SESSION['user_token'])) {
                    echo '
                    <li class="nav-item"><a class="nav-link" href="api/logout.php">Logout</a></li>
                         ';
                }
                if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_token'])) {
                    echo '
                    <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#signupModal">Sign up</a></li>
                    ';
                }
                ?>

            </ul>
        </div>
    </nav>

    <!-- Login Modal -->
    <div id="loginModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="message">Don't have an account?
                <span>
                    <a href="#" data-toggle="modal" data-target="#signupModal" data-dismiss="modal">Sign up</a>
                </span>
            </div>

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title modal-title-custom">Login</h4>
                </div>
                <div class="modal-body">
                    <!-- Login Form -->
                    <form>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail3">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Username or E-mail">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword3">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                        </div>
                        <div class="checkbox form-group">
                            <label>
                                <input type="checkbox"> <span class="remember-me">Remember me</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary sign-in-btn">Sign in</button>
                        </div>
                    </form>
                </div>
                <!--
                <div class="group">
                    <div class="item line"></div>
                    <div class="item text">or</div>
                    <div class="item line"></div>
                </div>
-->
                <div class="modal-footer modal-footer-custom">
                    <div class="row">
                        <div class="circle"><img src="img/or.svg" width="60"></div>
                    </div>
                    <div class="row social-media">
                        <div class="col-sm-4">
                            <a class="facebook" href="api/login-with.php?provider=Facebook">f</a>
                        </div>
                        <div class="col-sm-4">
                            <a class="linkedin" href="api/login-with.php?provider=LinkedIn">in</a>
                        </div>
                        <div class="col-sm-4">
                            <a class="twitter" href="#">t</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign up Modal -->
    <div id="signupModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="message">Already have an account?
                <span>
                    <a href="#" data-toggle="modal" data-target="#loginModal" data-dismiss="modal">Login</a>
                </span>
            </div>

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title modal-title-custom">Sign up</h4>
                </div>
                <div class="modal-body">
                    <!-- Sign up Form -->
                    <form>
                        <div class="form-group">
                            <label class="sr-only" for="">Username</label>
                            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputEmail3">E-mail</label>
                            <input type="email" class="form-control" id="exampleInputEmail3" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="exampleInputPassword3">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary sign-in-btn">Sign in</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer modal-footer-custom">
                    <div class="row">
                        <div class="circle"><img src="img/or.svg" width="60"></div>
                    </div>
                    <div class="row social-media">
                        <div class="col-sm-4">
                            <a class="facebook" href="api/create-with.php?provider=Facebook">f</a>
                        </div>
                        <div class="col-sm-4">
                            <a class="linkedin" href="api/create-with.php?provider=LinkedIn">in</a>
                        </div>
                        <div class="col-sm-4">
                            <a class="twitter" href="#">t</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <script src="js/jquery-2.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>