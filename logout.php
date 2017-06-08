<?php

require_once("CustomSessionHandler.php");

session_name("zero");
	session_start();
if(!empty($_SESSION["loggedin"] )) {
    $_SESSION["loggedin"] = false;

    header("Location:index.php");
    exit;
}else{
    header("Location:index.php");
    exit;
}
?>