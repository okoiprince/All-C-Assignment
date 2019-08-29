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
    <div class="container">
        <div class="panel">
            <div class="panel-title text-center"> <h3><b>FORGOT PASSWORD</b></h3></div>
            <p class="text-info text-center">Please fill this form to get your username and password</p>
                <form action="#" method="post" class="form panel-body">
                    <div class="form-group">
                        <label>
                            <input type="text" class="form-control" id="form-control" name="matricNo" required= "" placeholder="Matric Number">
                        </label>
                    </div>
                    <p>
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
                    </div> </p>
                    
                    <div class="form-group">
                        <label>
                            <input type="text" class="form-control" id="form-control" name="phone" required="" placeholder="Mobile Contact">
                        </label>
                    </div>
                    
                    <div class="form-group">
                        <input type="submit" name="send" value="Submit" class="col-xs-12 col-md-12 btn btn-lg btn-primary" id="submit">
                    </div>
                </form>
        </div>
    </div>
</body>
</html>

<?php
include_once('./scripts/private/function.php');
include_once('./scripts/private/db.php');

if(isset($_POST['send']))
{
    if(!empty($_POST['matricNo']) && !empty($_POST['lname']) && !empty($_POST['fname'])
       && !empty($_POST['othernames']) && !empty($_POST['phone']))
    {
        $matricNumber = $_POST['matricNo'];
        $lastName = $_POST['lname'];
        $firstName = $_POST['fname'];
        $otherNames = $_POST['othernames'];
        $phone = $_POST['phone'];
        
        $sql = "SELECT matricNumber, password FROM users
        WHERE matricNumber = '$matricNumber' AND lastName = '$lastName' AND firstName = '$firstName'
        AND othernames = '$otherNames' AND phone = '$phone'";
        
        $value = $conn->my_query($sql);
        
        if (mysqli_num_rows($value) > 0)
        {
            echo"<p class=\"text text-center\"> YOUR USERNAME AND PASSWORD IS:</p>";
            while ($row= mysqli_fetch_assoc($value))
            {
                $matricNumber = $row['matricNumber'];
                $password = $row['password'];
                
                echo "<p class=\"text text-center\">Username: <b class=\"text-primary\">"
                .$matricNumber. "</b></p>";
                echo "<p class=\"text text-center\">Password: <b class=\"text-primary\">"
                .$password. "</b> </p>";
            }
        }
        else {
            echo"<p class=\"text text-center text-danger\">Details are incorrect, please register</p>";
        }
    }
    else {
        echo "<p class=\"text text-center text-danger\">Please fill all fields </p>";
    }
}
?>