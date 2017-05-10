<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
		$sql = "INSERT INTO activitytype(UserID,ActivityCode,ActivityDescription) VALUES('".$_SESSION["UserID"]."','".$_POST["activityCode"]."','".$_POST["activityDescription"]."')";
		#echo $sql;/*	
		if ($conn->query($sql) === TRUE){
			$_SESSION["message"] = "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='fa fa-check-circle'></i> Activity Type Successfully Added</div>";
			header ("location: ../activity-types.php");
		}else{
			#echo "Error: " . $sql . "<br>" . $conn->error;
			$_SESSION["message"] = "<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='fa fa-warning'></i> The activity type you are trying to add is already existing.</div>";
			header ("location: ../activity-types.php");
		}
		$conn->close();
		#*/
	}
?>