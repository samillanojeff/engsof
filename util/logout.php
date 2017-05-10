<?php 
	session_start();
	session_destroy();
	/*unset($_SESSION["UserID"]);
	unset($_SESSION["UserName"]);
	unset($_SESSION["UserType"]);
	unset($_SESSION["MiddleName"]);
	unset($_SESSION["LastName"]);
	unset($_SESSION["Section"]);
	unset($_SESSION["BirthDate"]);
	unset($_SESSION["ContactNumber"]);
	unset($_SESSION["EmergencyContact"]);
	unset($_SESSION["Address"]);
	unset($_SESSION["Email"]);*/
	header("Location: ../login.php");
?>