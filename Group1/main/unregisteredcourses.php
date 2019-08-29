<?php
include("header.php");
?>
<!-- style for Courses Available in the database  using inline style and bootstrap style-->
<?php
$user = $_SESSION['login'];

$sql = "SELECT * FROM available_courses2018 WHERE courseCode NOT IN (SELECT courseCode
FROM registered_courses2018 WHERE matricNumber = '$user')";
$value = $conn->my_query($sql);

if (mysqli_num_rows($value)>0) {
    // Course Registration form with Available courses
		echo"<form action=\"registered.php\" method=\"POST\" >";
		
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
			echo"<br> 
			</form>";
			
			
}
else {
    echo "<p class=\"text-center\">YOU HAVE REGISTERED ALL COURSES FOR THIS SEMESTER";
}

?>