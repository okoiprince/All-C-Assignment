<?php
include_once('./scripts/private/function.php');
include_once('./scripts/private/db.php');
if (!isset($_SESSION['login']))
{
    redirect_to("index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css"> <!--BOOTSTRAP FONTS -->
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="assets/css/untitled.css"><!--Custom css file-->
</head>
<!--Body contains all screen todo buttons, text and tables -->
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="home.php"><i class="glyphicon glyphicon-phone"></i>Course Registration System</a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="home.php">Home</a></li>
                    <li role="presentation"><a href="registered.php">Registered Courses</a></li>
                    <li role="presentation"><a href="result.php">Check Result</a></li>
                    <li role="presentation"><a href="profile.php">Profile</a></li>
                    <li role="presentation"><a href="main/logout.php" class="text-center">Log out </a></li>
                    <li role="presentation" style="color:white; pointer-events:none; cursor:default"><a><?php echo $_SESSION['login']; ?>  </a></li>
                </ul>
            </div>
        </div>
    </nav>