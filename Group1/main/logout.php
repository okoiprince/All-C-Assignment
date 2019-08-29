<?php
include_once('../scripts/private/function.php');
include_once('../scripts/private/db.php');

if(isset($_SESSION['login']))
{
    session_unset();
    session_destroy();
    redirect_to("../index.php");
}
?>