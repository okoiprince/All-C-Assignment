<?php
include("include/header.php");
$user= $_SESSION['login'];
?>
<!-- Courses Available in the database  using inline style and bootstrap style-->
<div class="container-fluid col-md-12" style="margin-top:5%">
	<div class="row set-row-pad" >
           <div class="col-lg-4 col-md-4 col-sm-4 " data-scroll-reveal="enter from the bottom after 0.2s" >
                 <img src="assets/img/header1.jpg" class="img-thumbnail" />
                 
                 <div data-scroll-reveal="enter from the bottom after 0.4s">

                    <h2 ><strong>Our Location </strong></h2>
        <hr />
                    <div ">
                        <h4>234/80 -Calabar , Cross River State,</h4>
                        <h4>Nigeria.</h4>
                        <h4><strong>Call:</strong>  + 234-703-807-7555 </h4>
                        <h4><strong>Email: </strong>info@unibank.com</h4>
                    </div>


                </div>
           </div>
    

<div class="col-lg-6 col-md-6 col-sm-6 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
	<h2 class="text text-center"><caption>REGISTERED COURSES </caption></h2>
                   <div class="panel-group" id="accordion">
                        <div class="panel panel-default" data-scroll-reveal="enter from the bottom after 0.5s">
                            <div class="panel-heading" >
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="collapsed">
                                   YEAR ONE REGISTERED COURSES
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse" style="height: 0px;">
                                <div class="panel-body">
                                    <!-- 100 LEVEL REGISTERED COURSES ARE DISPLAYED -->
                                    <div class=" col-md-offset-1 ">
                                    <?php
                                    //output registered courses
                                    echo"<p class=\"text-center\">FIRST SEMESTER </p>";
									//SQL statement Select all tuples from the registration table for courses
									$sql = "SELECT * FROM registered_courses2018 WHERE matricNumber LIKE '$user'
									AND (courseCode LIKE 'csc1%1' OR courseCode LIKE 'csc1%0') ORDER BY courseCode DESC";
                                    $conn->displayregisteredcourses($sql);
									
									echo"<p class=\"text-center\">SECOND SEMESTER </p>";
									//SQL statement Select all tuples from the registration table for courses
									$sql = "SELECT * FROM registered_courses2018 WHERE matricNumber = '$user'
									AND (courseCode LIKE 'csc1%2' OR courseCode LIKE 'csc1%0') ORDER BY courseCode DESC";
                                    $conn->displayregisteredcourses($sql);
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default" data-scroll-reveal="enter from the bottom after 0.7s">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="collapsed">
                                      YEAR TWO REGISTERED COURSES
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse" style="height: 0px;">
                                <div class="panel-body">
                                    <!-- 200 LEVEL REGISTERED COURSES ARE DISPLAYED -->
                                    <div class=" col-md-offset-1 ">
                                    <?php
                                    //output registered courses
                                    echo"<p class=\"text-center\">FIRST SEMESTER </p>";
									//SQL statement Select all tuples from the registration table for courses
									$sql = "SELECT * FROM registered_courses2018 WHERE matricNumber LIKE '$user'
									AND (courseCode LIKE 'csc2%1' OR courseCode LIKE 'csc2%0') ORDER BY courseCode DESC";
                                    $conn->displayregisteredcourses($sql);
									
									echo"<p class=\"text-center\">SECOND SEMESTER </p>";
									//SQL statement Select all tuples from the registration table for courses
									$sql = "SELECT * FROM registered_courses2018 WHERE matricNumber = '$user'
									AND (courseCode LIKE 'csc2%2' OR courseCode LIKE 'csc2%0') ORDER BY courseCode DESC";
                                    $conn->displayregisteredcourses($sql);
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default" data-scroll-reveal="enter from the bottom after 0.9s">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="collapsed">
                                          YEAR THREE REGISTERED COURSES
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse"  style="height: 0px;">
                                <div class="panel-body">
                                    <!-- 300 LEVEL REGISTERED COURSES ARE DISPLAYED -->
                                    <div class=" col-md-offset-1 ">
                                    <?php
                                    //output registered courses
                                    echo"<p class=\"text-center\">FIRST SEMESTER </p>";
									//SQL statement Select all tuples from the registration table for courses
									$sql = "SELECT * FROM registered_courses2018 WHERE matricNumber LIKE '$user'
									AND (courseCode LIKE 'csc3%1' OR courseCode LIKE 'csc3%0') ORDER BY courseCode DESC";
                                    $conn->displayregisteredcourses($sql);
									
									echo"<p class=\"text-center\">SECOND SEMESTER </p>";
									//SQL statement Select all tuples from the registration table for courses
									$sql = "SELECT * FROM registered_courses2018 WHERE matricNumber = '$user'
									AND (courseCode LIKE 'csc3%2' OR courseCode LIKE 'csc3%0') ORDER BY courseCode DESC";
                                    $conn->displayregisteredcourses($sql);
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
						
						<div class="panel panel-default" data-scroll-reveal="enter from the bottom after 1.1s">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="collapsed">
                                      YEAR FOUR REGISTERED COURSES
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse" style="height: 0px;">
                                <div class="panel-body">
                                    <!-- 400 LEVEL REGISTERED COURSES ARE DISPLAYED -->
                                    <div class=" col-md-offset-1 ">
                                    <?php
                                    //output registered courses
                                    echo"<p class=\"text-center\">FIRST SEMESTER </p>";
									//SQL statement Select all tuples from the registration table for courses
									$sql = "SELECT * FROM registered_courses2018 WHERE matricNumber LIKE '$user'
									AND (courseCode LIKE 'csc4%1' OR courseCode LIKE 'csc4%0') ORDER BY courseCode DESC";
                                    $conn->displayregisteredcourses($sql);
									
									echo"<p class=\"text-center\">SECOND SEMESTER </p>";
									//SQL statement Select all tuples from the registration table for courses
									$sql = "SELECT * FROM registered_courses2018 WHERE matricNumber = '$user'
									AND (courseCode LIKE 'csc4%2' OR courseCode LIKE 'csc4%0') ORDER BY courseCode DESC";
                                    $conn->displayregisteredcourses($sql);
                                    ?>
                                    </div>
									
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="alert alert-info" data-scroll-reveal="enter from the bottom after 1.1s" >
                       <span style="font-size:40px;">
                          <strong> 2500 + </strong> 
                           <hr />
                           Courses Available
                       </span>
                   </div>
</div>
</div></div>     

<?php
echo "<div style=\"margin-top:5% \">";
include("include/footer.php");
echo"</div>";
?>