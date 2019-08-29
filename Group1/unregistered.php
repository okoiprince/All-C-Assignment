<?php
include("include/header.php");
$user = $_SESSION['login'];
?>
<!-- Courses Available in the database  using inline style and bootstrap style-->
<div class="container-fluid col-md-12 col-sm-12" style="margin-top:5%">
	<div class="col-md-3 col-sm-3" style="margin-top:5%">
	<h3 class="panel-title text-center">Course Registration Form </h3>
            <div class="panel-body">
				<!-- COURSE REGISTRATION FORM -->
                <form class="form-horizontal" action="main/registeredcourses.php" method="post">
                    <div class="form-group">
                        <input class="form-control text-left" type="text" name="courseCode" required="" placeholder="Course Code" autocomplete="on">
                    </div>
					
					<div class="form-group">
						<label> SEMESTER
							<select name="semester">
                            <option selected>First Semester</option>
                            <option>Second Semester</option>  
                        </select>
						</label>
					</div>
                    					
					<div class="form-group">
						<label> LEVEL
							<select name="level">
                            <option selected>100</option>
                            <option>200</option>
                            <option>300</option>
                            <option>400</option>
                            <option>EXTRA YEAR</option>   
                        </select>
						</label>
					</div>
					
					<div class="form-group">
						<input class="form-control" type="text" name="ref" placeholder="REFERENCE-KEY">
					</div>
					
                    <div class="form-group text-right">
                        <button class="btn btn-primary btn-sm" name="reg" type="submit">Register course </button>
                    </div>
                </form>
				
            </div>
			<br/>
				
				<form class="form-horizontal" action="#" method="post">
					<p class="text">CHECK YOUR REFERENCE-KEY</p>
					<div class="form-group">
						<select name="level">
                            <option selected>100</option>
                            <option>200</option>
                            <option>300</option>
                            <option>400</option>
                            <option>EXTRA YEAR</option>  
						</select>
					</div>
					
					<div class="form-group text-right">
                        <button class="btn btn-info btn-sm" name="check" type="submit">REFERENCE KEY </button>
                    </div>
				</form>
				<?php
				if (isset($_POST['check'])) {
					
					if (!empty($_POST['level'])) {
						$level = $_POST['level'] ;
						$sql="SELECT * FROM duespayment2018 WHERE matricNumber = '$user'
						AND level = '$level'";
						
						$conn->displayuserkey ($sql);
					}
					
					
				}
				?>
        </div>


<div class="col-lg-6 col-md-6 col-sm-6 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
	<h2 class="text text-center"><caption>UNREGISTERED COURSES </caption></h2>
                   <div class="panel-group" id="accordion">
                        <div class="panel panel-default" data-scroll-reveal="enter from the bottom after 0.5s">
                            <div class="panel-heading" >
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="collapsed">
                                   YEAR ONE COURSES
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse" style="height: 0px;">
                                <div class="panel-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sagittis egestas mauris ut vehicula. Cras viverra ac orci ac aliquam. Nulla eget condimentum mauris, eget tincidunt est.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default" data-scroll-reveal="enter from the bottom after 0.7s">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="collapsed">
                                      YEAR TWO COURSES
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse" style="height: 0px;">
                                <div class="panel-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sagittis egestas mauris ut vehicula. Cras viverra ac orci ac aliquam. Nulla eget condimentum mauris, eget tincidunt est.</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default" data-scroll-reveal="enter from the bottom after 0.9s">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="collapsed">
                                        YEAR THREE COURSES
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse"  style="height: 0px;">
                                <div class="panel-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sagittis egestas mauris ut vehicula. Cras viverra ac orci ac aliquam. Nulla eget condimentum mauris, eget tincidunt est.</p>
                                </div>
                            </div>
                        </div>
						
						<div class="panel panel-default" data-scroll-reveal="enter from the bottom after 1.1s">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="collapsed">
                                      YEAR FOUR COURSES
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse" style="height: 0px;">
                                <div class="panel-body">
									<div class=" col-md-offset-2 ">
									<?php //get and display unregistered courses
									
									echo"<p class=\"text-center\">400 LEVEL UNREGISTERED COURSES </p>";


									$sql = "SELECT * FROM available_courses2018 WHERE courseCode NOT IN (SELECT courseCode
											FROM registered_courses2018 WHERE matricNumber = '$user' 
											ORDER BY courseCode DESC) "; //select all courses from the database
									$conn->unregisteredcourses($sql);
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



</div>
<?php
echo "<div style=\"margin-top:5% \">";
include("include/footer.php");
echo"</div>";
?>
