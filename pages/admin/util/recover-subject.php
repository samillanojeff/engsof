<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
			
		$sql = "UPDATE subject SET isArchived = 0 WHERE SubjectCode='".$_POST["subjectCode"]."'";
		
		#echo $sql;/*
		if ($conn->query($sql) === TRUE){
			$_SESSION["message"] = "<div class='alert alert-success alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
			<i class='fa fa-check-circle'></i> Subject Successfully Recovered
			</div>";
				header ("location: ../archived-subjects.php");
		}
		#*/
		$conn->close();
	}
?>