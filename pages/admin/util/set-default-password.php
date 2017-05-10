<?php
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require_once "/xampp/htdocs/ubhs-csms/util/dbconn.php";
		$sql = "UPDATE user SET Password = UPPER(REPLACE(LastName,' ','')) WHERE UserID ='".$_POST["UserID"]."'";
		
		#echo $sql;/*
		if ($conn->query($sql) === TRUE){
			$_SESSION["message"] =  "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='fa fa-check-circle'></i>&nbsp&nbsp Account's password successfully set to default.</div>";
			header ("location: ../accounts.php");
		}else{
			echo"<tr><td colspan='7' class='text-center'>No Results.</td></tr>";
		}
		#*/
		$conn->close();
	}
?>