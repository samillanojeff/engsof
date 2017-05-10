<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
			
		$sql = "UPDATE activitytype SET isArchived = 0 WHERE ActivityCode='".$_POST["activityCode"]."' AND UserID='".$_SESSION["UserID"]."'";
		
		#echo $sql;/*
		if ($conn->query($sql) === TRUE){
			$_SESSION["message"] = "<div class='alert alert-success alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
			<i class='fa fa-check-circle'></i> Activity Type Successfully Recovered
			</div>";
				header ("location: ../archived-activity-types.php");
		}
		#*/
		$conn->close();
	}
?>