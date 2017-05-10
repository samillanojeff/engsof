<?php
	session_start();
	if(isset($_GET["SearchUser"])){
		$_SESSION["SearchUser"] = $_GET["SearchUser"];
		header ("location: ../view-profile.php");
	}elseif(isset($_GET["Archive"])){
		include "../../../util/dbconn.php";
		$selectedUsers = "";
			foreach ($_GET["users"] as $selected){
				$selectedUsers .= "'".$selected."',";
				echo $selected;
			}
			$selectedUsers = substr($selectedUsers,0,-1);
		
		
		$sql = "UPDATE user SET isArchived = 1 WHERE UserID IN(".$selectedUsers.")";
		echo $sql;
		if($conn->query($sql) === TRUE){
			$_SESSION["message"] = "<div class='alert alert-success alert-dismissible' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
			<i class='fa fa-check-circle'></i> User Account/s Successfully Archived
			</div>";
			header ("location: ../accounts.php");
		}else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
?>