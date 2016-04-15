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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

</head>

<body>
    <!--
<div class="page-transition"></div>

<div class="container">
  
  <div class="formHolder signup">
    <h3>Sign Up</h3>
    
    <div class="form-group">
        <input type="text" class="form-control simplebox" id="login" placeholder="E-mail or Login">
    </div>
      
    <div class="form-group">
        <input type="password" class="form-control simplebox" id="password" placeholder="Password">
    </div>
    
    <div class="form-group">
        <input type="password" class="form-control simplebox" id="password" placeholder="Confirm Password">
    </div>
    
    <button type="submit" id="signupButton" class="btn btn-sm btn-default simplebutton newAccButton">Sign Up</button><button type="submit" class="btn btn-sm btn-link loginButton" id="showLogin">Already have an account?</button>
    
  </div>
  <div class="formHolder login">
    
      <h3>Login</h3>
      
      <div class="form-group">
        <input type="text" class="form-control simplebox" id="login" placeholder="E-mail or Login">
      </div>
      
      <div class="form-group">
        <input type="password" class="form-control simplebox" id="password" placeholder="Password">
      </div>
      
      <button type="submit" id="loginButton" class="btn btn-sm btn-default simplebutton loginButton">Login</button><button type="submit" class="btn btn-sm btn-link newAccButton" id="showSignUp">Don't have an account?</button>
    
  </div>
  
  <div class="formHolder signUp">
    
  </div>
  
</div>
    
-->

    <!--    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>-->

    <div class="container">
        <div class="frame">
            <div class="form-logo">
                <a href="index.php"><img src="img/footer-logo.svg" width="50"></a>
            </div>
            <div class="nav-custom">
                <ul>
                    <li class="signin-active sign"><a class="btns">Log in</a></li>
                    <li class="sign signup-inactive"><a class="btns">Sign up </a></li>
                </ul>
            </div>
            <div>
                <form class="form-signin">

                    <input class="user-info" type="text" name="username" placeholder="Username or E-mail" required="required" />
                    <input class="user-info" type="password" name="password" placeholder="Password" required="required" />
                    <input class="login-btn" type="submit" name="notify" value="Log in">

                    <div class="social row">
                        <div class="container or">
                            <h6><span>Log in via</span></h6>
                        </div>
                        <div class="col-md-4"><a href="api/login-with.php?provider=Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
                        <div class="col-md-4"><a href="api/login-with.php?provider=LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a></div>
                        <div class="col-md-4"><a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
                    </div>

                </form>

                <form id="userCreate" class="form-signup" action="#" method="post">
                    <group class="inline-radio">
                        <div><input type="radio" value="homeowner" name="member" checked><label>Homeowner</label></div>
                        <div><input type="radio" value="designer" name="member" ><label>Designer</label></div>
                    </group>
                    <input class="user-info" type="text" placeholder="Name" name="name" required="required">
                    <input class="user-info" type="email" placeholder="E-mail" name="email" required="required">
                    <input class="user-info" type="password" placeholder="Password" name="password" required="required">
                    <input class="signup-btn" type="submit" name="notify" value="Sign up">

                    <div class="social row">
                        <div class="container or">
                            <h6><span>Log in via</span></h6>
                        </div>
                        <div class="col-md-4"><a onclick="submitResponse(this.href);return false;" href="api/create-with.php?provider=Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></div>
                        <div class="col-md-4"><a onclick="submitResponse(this.href);return false;" href="api/create-with.php?provider=LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a></div>
                        <div class="col-md-4"><a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
                    </div>
                    

                </form>
            </div>
        </div>
    </div>
    <script src="js/jquery-2.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/login.js"></script>
    <script src="js/style.js"></script>
</body>