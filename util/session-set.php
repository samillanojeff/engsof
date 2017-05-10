<?php
	session_start();
	if(!isset($_SESSION["UserID"])){
		header("location: /ubhs-csms/login.php");
	}
?>