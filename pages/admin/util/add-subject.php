<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
		$sql = "INSERT INTO subject(SubjectCode,SubjectDescription) VALUES('".$_POST["subjectCode"]."','".$_POST["subjectDescription"]."')";
		
		if ($conn->query($sql) === TRUE){
			$_SESSION["message"] = "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='fa fa-check-circle'></i> Subject Successfully Added</div>";
			header ("location: ../subjects.php");
		}
		else{
			#echo "Error: " . $sql . "<br>" . $conn->error;
			$_SESSION["message"] = "<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='fa fa-warning'></i> The subject you are trying to add is already existing.</div>";
			header ("location: ../subjects.php");
		}
		$conn->close();
	}
?>