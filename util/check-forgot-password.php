<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		require_once "dbconn.php";
		$sql = "SELECT UserID,Email FROM user WHERE UserID=".$_POST["idnum"]." AND Email='".$_POST["email"]."'";
		$result = $conn->query($sql);
	
		if ($result->num_rows > 0){
			$row = $result->fetch_assoc();
			if($row["UserID"] == $_POST["idnum"] && $row["Email"] == $_POST["email"]){
				$row = $result->fetch_assoc();
				
				include "forgot-password-email.php";
			}
		}
		else{
			$_SESSION["message"] = "<div class='alert alert-danger alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			<i class='fa fa-times-circle'></i>&nbsp&nbspAuthentication Failed, Try Again.</div>";
			header ("location: ../forgot-password.php");
		}
		$conn->close();
	}
?>