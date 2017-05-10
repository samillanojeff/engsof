<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		include ("/xampp/htdocs/ubhs-csms/util/dbconn.php");
		$sql="UPDATE user SET ContactNumber='".$_POST["ContactNo"]."' ,EmergencyContact='".$_POST["EmergencyContactNo"]."' ,Address='".$_POST["Address"]."' ,Email='".$_POST["Email"]."' WHERE UserID='".$_SESSION["UserID"]."'";
		
		#echo $sql;/*
		if ($conn->query($sql) === TRUE){
			$_SESSION["message"] = "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='fa fa-check-circle'></i>&nbsp&nbsp Profile Successfully Updated.</div>";
			if ($_SESSION["UserType"] == "Secretary"){
				header ("location: ../pages/admin/index.php");
			}else{
				header ("location: ../user-profile.php");
			}
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		#*/
	}
?>