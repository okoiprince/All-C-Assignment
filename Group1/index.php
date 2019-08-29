<?php
include_once('./scripts/private/function.php');
include_once('./scripts/private/db.php');
if (isset($_SESSION['login']))
{
    session_unset();
    session_destroy();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" type="text/css" href="styles/elements.css"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    
    <script src="scripts/js/my_js.js"></script>
</head>

<body id="body">
    
    <!--NAVBAR CONTROL-->
    <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header"><a class="navbar-brand navbar-link" href="#"><i class="glyphicon glyphicon-phone"></i>Course Registration System</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li role="presentation"><a class="text-warning bg-primary"  id="signup-btn" onclick="div_show();">Register </a></li>
                        <li role="presentation" class="text-warning bg-default">&nbsp</li>
                        <li role="presentation"><a class="text-warning bg-primary" href="#">Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    
    <div class="container col-md-offset-4 col-md-4" id="container-form">
        <div class="panel panel-default">
            <div class="panel-heading">
                
                
<div class="container">   <!--SIGNUP  FORM FOR USERS -->
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div id="signup_form">
                <div id="popup_form">
                    <input type="button" id="close" onclick ="div_hide();" value="x">
                    <div class="signup-panel panel panel-default">
                        <div class="panel-heading">
                            <h2 class="panel-title">Signup</h2>
                        </div>

<form action="main/user.php"  method="POST" class="form panel-body" id="form_sig"  >
    <div class="form-group">
        <label>
            <input type="text" class="form-control" id="form-control" name="matricNo" required= "" placeholder="Matric Number">
        </label>
    </div>
    <div class="form-group">
        <label>
            <input type="text" class="form-control" id="form-control" name="lname" required="" placeholder="Last name">
        </label>
    </div>
    <div class="form-group">
        <label>
            <input type="text" class="form-control" id="form-control" name="fname" required="" placeholder="First name">
        </label>
    </div>
    <div class="form-group">
        <label>
            <input type="text" class="form-control" id="form-control" name="othernames" required="" placeholder="Other names">
        </label>
    </div>
    
    <div class="form-group">
        <select name="dept">
            <option>computer science</option>
        </select>
    </div>
    <div class="form-group">
        <p style="color: grey;">Gender
        <div class="radio">
            <label>
                <input type="radio" id="form-control" name="gender" required="" value="Male">Male
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" id="form-control" name="gender" value="Female">Female
            </label>
        </div></p>
    </div>
    <div class="form-group">
        <label>
            <input type="text" class="form-control" id="form-control" name="phone" required="" placeholder="Mobile Contact">
        </label>
    </div>
    <div class="form-group">
        <label>
            <input type="password" class="form-control" id="form-control" name="password" required=""
                   placeholder="Password" minlength="6">
        </label>
    </div>
    <div class="form-group">
        <label>
    <input type="password" class="form-control" id="form-control" name="con_pwd" required=""
           placeholder="Confirm Password" minlength="6" >
        </label>
    </div>
    <div class="checkbox">
        <label>
            <h5 style="color:red"> <input type="checkbox" name="terms" required="" value="1">Agree to Terms and Conditions.</h5>
        </label>
    </div>
    <div class="form-group">
        <input type="submit" name="signup" value="signup" class="col-xs-12 col-md-12 btn btn-lg btn-danger" id="submit">
    </div>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!--END USER SIGNUP FORM -->

               <!--print validation message-->
               <?php if(isset($_SESSION['message'])){echo"<p>".$_SESSION['message']. "</p>"; session_unset();} ?>
                
                <h3 class="panel-title text-center">LOGIN </h3></div>
            <div class="panel-body">
                <form class="form-horizontal" action="main/user.php" method="post">
                    <div class="form-group">
                        <input class="form-control text-left" type="text" name="matricNo" required="" placeholder="Matric Number" autocomplete="on">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" required="" placeholder="Password" minlength="6">
                    </div>
                    <div class="form-group"><a class="text-muted" href="forgot.php" target="_blank">Forgot password click</a></div>
                    <div class="form-group text-right">
                        <button class="btn btn-primary btn-sm" name="login" type="submit">Submit </button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>