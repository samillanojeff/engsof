<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		require_once "dbconn.php";
			$sql = "SELECT Password FROM user WHERE UserID='".$_SESSION["UserID"]."'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			if ($_POST["currentpass"] == $row["Password"]){
				if ($_POST["NewPass"] != $row["Password"]){
					$sql = "UPDATE user SET user.Password='".$_POST["NewPass"]."' WHERE user.UserID='".$_SESSION["UserID"]."'";
					#echo $sql;/*
					
					if($conn->query($sql) === TRUE){
						header ("location: ../change-password-success.php");
					}else{	
						echo "Error: ".$sql."<br>".$conn->error;
					}
					#*/
				}else{
					$_SESSION["message"] = "<div class='alert alert-warning alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='fa fa-warning'></i> Your new password must not be the same as your current password.</div>";
					header ("location: ../change-password.php");
				}
			}else{
				$_SESSION["message"] = "<div class='alert alert-danger alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						<i class='fa fa-times-circle'></i>&nbsp&nbspAuthentication Failed, Try Again.</div>";
				header ("location: ../change-password.php");
			}
		$conn->close();
		unset($_POST["currentpass"]);
	}
?>