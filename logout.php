<?php
include '.env.php';
session_start();
if(isset($_SESSION['access_token'])){
	session_destroy();
}
   	header("Location: ".$myDomain);
	die();