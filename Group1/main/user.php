<?php
include_once('../scripts/private/function.php');
include_once('../scripts/private/db.php');

 $matricNo = $_POST['matricNo'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $othernames = $_POST['othernames'];
    $dept = $_POST['dept'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $password =$_POST['password'];
    $con_pwd =$_POST['con_pwd'];
    $terms = $_POST['terms'];

if (isset($_POST['signup']))
{
    
    if (empty($matricNo) || empty($lname) || empty($fname) || empty($othernames) || empty($dept)
        || empty($gender) || empty($phone) || empty($password) || empty($terms))
    {
        echo " Please signup and fill all fields ";
        redirect_to("../index.php");
    }
    
    else if ($password !== $con_pwd){
         $_SESSION['message']="Password dose not match<br> Please Signup and Confirm password..! ";
         redirect_to("../index.php");
    }
    
    else if (isset($matricNo) && isset($lname) && isset($fname) && isset($othernames) && isset($dept)
        && isset($gender) && isset($phone) && isset($password) && isset($terms))
    {
        $conn->register($matricNo, $lname, $fname, $othernames, $dept, $gender, $phone, $password, 1);
    } 
    
    
}
if (isset($_POST['login']))
{
    if (!empty($matricNo) && !empty($password))
    {
        if (isset($matricNo) && isset($password))
        {
            $conn->login($matricNo, $password);
        }
        else {
           $_SESSION['message'] = "Matric Number or Username not set";
        }
    }
    else {
        $_SESSION['message']="Please fill all fields";
    }
}
?>