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
        <hr/>
                    <div ">
                        <h4>234/80 -Calabar , Cross River State,</h4>
                        <h4>Nigeria.</h4>
                        <h4><strong>Call:</strong>  + 234-703-807-7555 </h4>
                        <h4><strong>Email: </strong>info@unibank.com</h4>
                    </div>


                </div>
           </div>
    

<div class="col-lg-6 col-md-6 col-sm-6 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
	<h2 class="text text-center"><caption>STUDENT PROFILE </caption></h2>
                   <div class="panel-group" id="accordion">
                        <div class="panel panel-default" data-scroll-reveal="enter from the bottom after 0.5s">
                          
                        </div>
                        
                   </div>
                   <?php
                   $conn->profile($user);
                   ?>
                   
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