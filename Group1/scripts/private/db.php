<?php
//function redirect to another page
    function refresh($time=NULL) {
		if ($time !=NULL)
		{
			header("Refresh:{$time}");
			exit;
		}
	}
	
	function random ($min, $max) {
			$num[] = ("ref-". mt_rand($max, $min));
			
		return $num;
	}
	
    //function redirect to another page
    function redirect_to($location=NULL) {
		if ($location !=NULL)
		{
			header("Location:{$location}");
			exit;
		}
	}

    //function scan output validation messages
function output_message($message="") {
		if (!empty($message)) {
			return "<p>{$message} </p>";
		}
		else {
			return "";
		}

	}
?>