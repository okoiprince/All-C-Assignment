<?php 
include_once('config.php');
include_once('db.php');

class Main
{
    private $connect;
    //constructor to access private function
    function __construct() 
    {
        $this->open_connection();
        session_start();
        }
        
    //open server connection
    function open_connection() 
    {
        $this->connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        
        if(!isset($this->connect))
        {
            echo"CONNECTION FAIL, DATABASE NOT RESPONDING";
        } //end_if
        
        }//end connection fn
        
        //Executes query 
	function my_query($sql) {

		$result = mysqli_query($this->connect,$sql);

		if (!isset($result))
		{
			echo "Query execution failed".mysqli_connect_error();
		}
		else{
			return $result;
		}
        
        
        //checks and add slashes if information is ready to go to mysql
	function mysql_slashes($value) {
	
//eliminates slashes and backslashes

				$value = trim($value);
				$value = stripslashes($value);
				$value = htmlspecialchars($value);
 	
		return $value;

	}
	
	} //end query fn
    
        //user registration for new user
    function register($matricNo, $lname, $fname, $othernames, $dept, $gender, $phone, $password, $status)
    {
		//Sql query to database
            $sql = "INSERT INTO users(matricNumber, lastName, firstName, otherNames, department,
            gender, phone, password, status)
            VALUES('$matricNo', '$lname', '$fname', '$othernames', '$dept', '$gender', '$phone', '$password', '$status')";
            
            $value=$this->my_query($sql);
            if($value)
            {
				$sql = "SELECT * FROM users WHERE matricNumber = '$matricNo' AND password = '$password'";
				$value = $this->my_query($sql);
				if (mysqli_num_rows($value)>0)
				{
					$_SESSION['login'] = $matricNo; //set user session
				}
                $_SESSION['message'] ="registered successfully";
                redirect_to("../home.php");
            }
            else{
			$_SESSION['message'] = "Registration FAILED!\n *This Matric Number is already registered *";
			redirect_to("../index.php");
		}
     } // end register fn
   
   //Begin function user login
   function login($matricNo="", $password="")
   {
	//Sql query to database
	$sql = "SELECT * FROM users WHERE matricNumber='$matricNo' AND password = '$password'";
	
	$value = $this->my_query($sql);
	if (mysqli_num_rows($value) > 0) //check query
	{
		$_SESSION['login'] = $matricNo; //set user session
		redirect_to("../home.php");
	}
	elseif (mysqli_num_rows($value)<1) {
		
		$_SESSION['message']=" Invalid Username or Password ";
		redirect_to("../index.php");
	}
	
   }
   

   //Begin function for first semester available courses
   function firstsemester($sql="") {
	
	echo"<p class=\"text-center\">FIRST SEMESTER </p>";
	
	$value = $this->my_query($sql);
	
	if ($result=mysqli_num_rows($value) > 0)
	{
		// Course Registration form with Available courses
		echo"<form action=\"registered.php\" method=\"POST\" >";
		
		echo"<table border='1px'>";
		echo "<thead><tr><th> Course Code </th> <th> Course Title </th> <th> Credit Hour </th></tr></thead>";
            
            //fetch courses from the database
		while($row = mysqli_fetch_array($value))
		{
            //variable holds the user available courses for each tuple in the database
			$courseCode = $row['courseCode'];
			$courseTitle = $row['courseTitle'];
			$creditHour = $row['creditHour'];	
				
			echo"<tbody><tr><td>  ". $courseCode ." </td><td>". $courseTitle ."</td><td>" .$creditHour."</td>";
			echo "</tr></tbody>";
		}
			echo"</table>";
			//Text field and button
			echo"<br>";
	}
	else {
	echo"NO COURSES AVAILABLE YET FOR FIRST SEMESTER";
		
	}
   }
   
   //Begin function for first semester available courses
   function secondsemester($sql="") {
   echo"<p class=\"text-center\">SECOND SEMESTER </p>";
	
	$value = $this->my_query($sql);
	
	if ($result=mysqli_num_rows($value) > 0)
	{
		// Course Registration form with Available courses
		echo"<form action=\"registered.php\" method=\"POST\" >";
		
		echo"<table border='1px'>";
		echo "<thead><tr><th> Course Code </th> <th> Course Title </th> <th> Credit Hour </th></tr></thead>";
            
            //fetch courses from the database
		while($row = mysqli_fetch_array($value))
		{
            //variable holds the user available courses for each tuple in the database
			$courseCode = $row['courseCode'];
			$courseTitle = $row['courseTitle'];
			$creditHour = $row['creditHour'];			
				
			echo"<tbody><tr><td>  ". $courseCode ." </td><td>". $courseTitle ."</td><td>" .$creditHour."</td>";
			echo "</tr></tbody>";
		}
			echo"</table>";
			//Text field and button
			echo"<br>";
	}
	else {
	echo"NO COURSES AVAILABLE YET FOR SECOND SEMESTER";
		
	}
        
   }
   
   //Begin function for unregistered courses
   function unregisteredcourses($sql="") {
	
	$value = $this->my_query($sql);
	
	if (mysqli_num_rows($value)>0) {
    // Course Registration form with Available courses
		//echo"<form action=\"registered.php\" method=\"POST\" >";
		
		echo"<table border='1px' style=\"width:90%; margin-left:5%;\">";
		echo "<thead><tr><th> Course Code </th> <th> Course Title </th> <th> Credit Hour </th></tr></thead>";
            
            //fetch courses from the database
		while($row = mysqli_fetch_array($value))
		{
            //variable holds the user available courses for each tuple in the database
			$courseCode = $row['courseCode'];
			$courseTitle = $row['courseTitle'];
			$creditHour = $row['creditHour'];
							
			echo"<tbody><tr><td>". $courseCode ." </td><td>". $courseTitle ."</td><td>" .$creditHour."</td>";
			echo "</tr></tbody>";
			}
			
			echo"</table>";
			//Text field and button
			//echo"<br> 
			//</form>";
			}
			else {
				echo "<p class=\"text-center\">YOU HAVE REGISTERED ALL COURSES FOR THIS SEMESTER";
				}
	}

	
	//Begin function to display registered courses
	function displayregisteredcourses($sql="") {
		
		$value = $this->my_query($sql);
                        
                        if (mysqli_num_rows($value) > 0)
                        {
                            // FORM TO DELETE COURSE
                            //echo"<form action=\"registered.php\" method=\"POST\" >";
                            
                            echo"<table border='1px' style=\"width:90%; margin-left:5%;\">";
                            echo "<thead><tr><th>Course Code </th> <th> Course Title </th> <th> Credit Hour </th>
                            <th>  Date Registered </th> <th> Status </th></tr></thead>";
                            
                            while($rows = mysqli_fetch_array($value))
                            {
                                $regID= $rows['regID'];
                                $fullName = $rows['fullName'];
                                $courseCode = $rows['courseCode'];
                                $courseTitle = $rows['courseTitle'];
                                $creditHour = $rows['creditHour'];
                                $timestamp = $rows['registered_at'];
                                $status = $rows['status'];
                                
                                echo "<tbody>";
                                echo "<tr><td>". $courseCode.
                                "</td><td>". $courseTitle."</td><td>".$creditHour.
                                "</td><td>" . $timestamp. "</td>";
								if ($status == "unpaid") {
									echo "<td class=\"text-danger\">". $status ."</td>";
								} elseif($status=="paid") {
									echo "<td class=\"text-success\">". $status ."</td>";
								}
                                echo"</tbody>";
                                
                            }
                            echo"</table>";
                            //form button Delete form text field
                            /* echo "<br>
			<input class=\"col-md-3 col-md-offset-3\" type=\"text\" name=\"deletebytext\" placeholder=\"DELETE BY COURSE CODE \">
			<button  class = \" col-md-offset-7 btn btn-md btn-primary\" type = \"submit\" name=\"delete\" > Delete Course </button>
			*/
                            echo "<br>";
			//echo "</form>";
                        }
                        else {
                            echo "<p class='text-center' >NO REGISTERED COURSE FOR THIS USER<br>
                            PLEASE CLICK THE LINK TO REGISTER YOUR COURSES <a href=\"courses.php\">link </a></p>";
                        }
	}
	
	//Begin function to display User key for any semester
	function displayuserkey ($sql="") {
		$value = $this->my_query($sql);
		
		if(mysqli_num_rows($value)>0) {
			while ($rows = mysqli_fetch_array($value)) {
				$userkey = $rows['userkey'];
				$semester = $rows['semester'];
				$level = $rows['level'];
				
				if($level == "400") {
					echo"REGISTER 400LEVEL COURSES WITH THIS DUES PAYMENT KEY";
					if($semester=="First Semester") {
						echo "<p class=\"text\">First Semester Key: <b class=\"text-info\">". $userkey. "</b></p>";
						
					} elseif ($semester =="Second Semester") {
						echo "<p class=\"text\">Second Semester Key: <b class=\"text-info\">". $userkey. "</b></p>";
					}
				}
				elseif($level == "300") {
					echo"REGISTER 300LEVEL COURSES WITH THIS DUES PAYMENT KEY";
					if($semester=="First Semester") {
						echo "<p class=\"text\">First Semester Key: <b class=\"text-info\">". $userkey. "</b></p>";
						
					} elseif ($semester =="Second Semester") {
						echo "<p class=\"text\">Second Semester Key: <b class=\"text-info\">". $userkey. "</b></p>";
					}
				}
				elseif($level == "200") {
					echo"REGISTER 200LEVEL COURSES WITH THIS DUES PAYMENT KEY";
					if($semester=="First Semester") {
						echo "<p class=\"text\">First Semester Key: <b class=\"text-info\">". $userkey. "</b></p>";
						
					} elseif ($semester =="Second Semester") {
						echo "<p class=\"text-center\">Second Semester Key: <b class=\"text-info\">". $userkey. "</b></p>";
					}
				}
				elseif($level == "100") {
					echo"REGISTER 100LEVEL COURSES WITH THIS DUES PAYMENT KEY";
					if($semester=="First Semester") {
						echo "<p class=\"text\">First Semester Key: <b class=\"text-info\">". $userkey. "</b></p>";
						
					} elseif ($semester =="Second Semester") {
						echo "<p class=\"text\">Second Semester Key: <b class=\"text-info\">". $userkey. "</b></p>";
					}
				}
				elseif($level == "EXTRA YEAR") {
					echo"REGISTER EXTRA YEAR COURSES WITH THIS DUES PAYMENT KEY";
					if($semester=="First Semester") {
						echo "<p class=\"text\">First Semester Key: <b class=\"text-info\">". $userkey. "</b></p>";
						
					} elseif ($semester =="Second Semester") {
						echo "<p class=\"text\">Second Semester Key: <b class=\"text-info\">". $userkey. "</b></p>";
					}
				}
				else {
					echo "Please Pay Your Departmental Dues Before Registering Courses";
				}
			}
		} else {
			echo "Please Pay Your Departmental Dues Before Registering Courses";
		}
	} //end function
	
	//get student details 
	function profile ($user="") {
		$sql = "SELECT * FROM 'user' WHERE matricNumber = '$user'";
		$value = $this->my_query($sql);
		
		if(mysqli_num_rows($value) > 0) {
			while($rows = mysqli_fetch_array($value)) {
				$lname = $rows['lastName'];
				$fname = $rows['firstName'];
				$oname = $rows['otherNames'];
				$dept = $rows['department'];
				$gender = $rows['gender'];
				$phone = $rows['phone'];
				
			}
		}
	}
   
}//end class

$conn = new Main();
?>