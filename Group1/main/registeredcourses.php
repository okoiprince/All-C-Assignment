<?php
include_once('../scripts/private/function.php');
include_once('../scripts/private/db.php');
?>
<?php
//Define user matric number
$user = $_SESSION['login'];

if (isset($_SESSION['status'])) {
session_unset($_SESSION['status']);
}
$status = $_SESSION['status'];



if (isset($_POST['reg'])) //check if button is clicked
{
    //gets the selected course code
    if (!empty( $_POST['courseCode']) && !empty($_POST['semester']))
    {
		
            $course = $_POST['courseCode'];
            $ref = $_POST['ref'];
            $semester = $_POST['semester'];
            $level = $_POST['level'];
            $status = "unpaid" ;
            
            if (!empty($_POST['ref']))
            {
				session_unset( $status);
				session_destroy($status);
				
				$status = 'paid';
				
            $sql = "SELECT * FROM duespayment2018 WHERE matricNumber = '$user' AND userkey = '$ref'";
					$value =  $conn->my_query($sql);
                    
			}    
					
            
    
     //Select all from the registered course table
    $sql = "SELECT * FROM registered_courses2018 WHERE matricNumber = '$user' AND courseCode = '$course'";
    $value =  $conn->my_query($sql);
		
    if (mysqli_num_rows($value)>0)
    {
        $_SESSION['message'] = "You have already registered for this Course ". $course ;
    }
    else{
    $sql= "SELECT * FROM available_courses2018 WHERE courseCode='$course'";
    
    $value = $conn->my_query($sql);
    
    if ($result = mysqli_num_rows($value) < 1) //check if course is 
    {
        die("Course Registration Failed course not found");
    }
    else{
        while (@$row = mysqli_fetch_array($value)) {
            $courseCode = $row['courseCode'];
            $courseTitle = $row['courseTitle'];
            $creditHour = $row['creditHour'];
            $timestamp = date("Y/m/d");
            
            //Statement collect data from the User table
            $sql = "SELECT matricNumber, department, lastName, firstName, otherNames
            FROM users WHERE matricNumber = '$user'";
            
            $value = $conn->my_query($sql); //execute query
            if (mysqli_num_rows($value)>0)
            {
                while(@$row = mysqli_fetch_array($value))
                {
                    $matricNo = $row['matricNumber'];
                    $department = $row['department'];
                    $lastName = $row['lastName'];
                    $firstName = $row['firstName'];
                    $otherNames = $row['otherNames'];
                    $fullName = "$lastName $firstName $otherNames";
					
                
                    //SQL statement insert course details into the registration table
            
                    $sql = "INSERT INTO registered_courses2018( matricNumber, fullName, courseCode, courseTitle,
                    creditHour, department, level, semester, userkey, registered_at, status)
                    VALUES('$matricNo', '$fullName', '$courseCode', '$courseTitle', '$creditHour', '$department',
                    '$level', '$semester','$ref', '$timestamp', '$status')";
                    //Execute the insert sql statement
                    $value = $conn->my_query($sql);
                   if ($value = true)
                   {
                    
                    redirect_to("../registered.php");
                    refresh("0");
                    }
                }
            }
            
        }
    }
	}
    
    }
    }
    
    /*
    //register course by entering alternative text option
    elseif (isset($_POST['register'])) {
        
        $course = $_POST['register'];
        
    //Select all from the registered courses table
    $sql = "SELECT * FROM registered_courses2018 WHERE matricNumber = '$user' AND courseCode = '$course'";
    $value =  $conn->my_query($sql);
    if (mysqli_num_rows($value)>0)
    {
        $_SESSION['message'] = "You have already registered for this Course ". $course ;
        echo $_SESSION['message'];

    }
    else{
    $sql= "SELECT courseCode, courseTitle, creditHour FROM available_courses2018 WHERE courseCode='$course'";
    
    $value = $conn->my_query($sql);
    
    if ($result = mysqli_num_rows($value) < 1) //check if course is 
    {
        die("Course Registration Failed course not found");
    }
    else{
        while (@$row = mysqli_fetch_array($value)) {
            $courseCode = $row['courseCode'];
            $courseTitle = $row['courseTitle'];
            $creditHour = $row['creditHour'];
            
            $timestamp = date("Y/m/d");
            
            //Statement collect data from the User table
            $sql = "SELECT matricNumber, department, lastName, firstName, otherNames
            FROM users WHERE matricNumber = '$user'";
            
            $value = $conn->my_query($sql); //execute query
            if (mysqli_num_rows($value)>0)
            {
                while(@$row = mysqli_fetch_array($value))
                {
                    $matricNo = $row['matricNumber'];
                    $department = $row['department'];
                    $lastName = $row['lastName'];
                    $firstName = $row['firstName'];
                    $otherNames = $row['otherNames'];
                    $fullName = "$lastName $firstName $otherNames";
                    $status = "REGISTERED";
                    
                    //SQL statement insert course details into the registration table
            
                    $sql = "INSERT INTO registered_courses( matricNumber, fullName, courseCode, courseTitle,
                    creditHour, department, level, semester, userkey, registered_at, status)
                    SELECT matricNumber,('$matricNo', '$fullName', '$courseCode', '$courseTitle', '$creditHour', '$department',
                    '$level', '$ref', '$timestamp', '$status')";
                    //Execute the insert sql statement
                    $value= $conn->my_query($sql);
                    refresh("0");
                    
                }
            }
            
        }
    }
    }
    }*/
                        
                        
                            
?>

<?php
/*
if (isset($_POST['delete'])) {
    
    if (isset($_POST['course']))
    {
        $courseCode = $_POST['course'];
        
        if ($courseCode==true){
            //Delete the selected course from the registration table
            $sql = "DELETE FROM registered_courses WHERE courseCode = '$courseCode' AND matricNumber='$user' ";
            $value = $conn->my_query($sql);
            
            if ($value==true) {
                echo "<p>$courseCode have been unregistered Successfully!</p>";
                refresh("2");
            }
                else {
                    echo "<p class=\"text text-danger\">Problem Occured $courseCode cannot be unregistered</p>";
                }
        } //end  if 
        else {
            echo"<p class=\"text text-danger\"> Fields cannot be empty </p>";
        }
    } //end if (isset($_POST['course']))
    
    elseif(isset($_POST['deletebytext'])) {
        //Delete course by entering course code
        
        $courseCode = $_POST['deletebytext'];
        
        if ($courseCode==true) {
            //Delete the selected course from the registration table
            $sql = "DELETE FROM registered_courses WHERE courseCode = '$courseCode' AND matricNumber='$user' ";
            $value = $conn->my_query($sql);
            
            if ($value==true) {
                echo "<p>$courseCode have been unregistered Successfully!</p>";
                refresh("2");
            }
        }
        else{
            echo"<p class=\"text text-danger\"> Fields cannot be empty </p>";
        }
    }
    
    else{
        echo "<p class=\"text text-danger\">Incorrect inputs please choose an option </p>";
    }
} */

    ?>