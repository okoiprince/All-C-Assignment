<?php
include("include/header.php");
?>
<h3 class="panel-title text-center">LOGIN </h3></div>
            <div class="panel-body">
                 <?php echo @$_SESSION['message']; session_unset(); ?>
                <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>" method="post">
                    <div class="form-group">
                        <input class="form-control text-left" type="text" name="courseCode" required="" placeholder="Course Code" autocomplete="on">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="text" name="courseTitle" required="" placeholder="Course Title">
                    </div>
                    <div class="form-group">
                        <select>
                            <option selected>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option> 
                        </select>
                        <input class="form-control" type="text" name="creditHour" required="" placeholder="Course Title">
                    </div>
                    <div class="form-group"><a class="text-muted" href="#" target="_blank">Forgot password click</a></div>
                    <div class="form-group text-right">
                        <button class="btn btn-primary btn-sm" name="login" type="submit">Submit </button>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
<?php
include("include/footer.php");
?>
