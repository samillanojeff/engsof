<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if ($_POST["Edit"]){
			EditActType();
		}elseif ($_POST["Archive"]){
			ArchiveActType();
		}
	}
	function ArchiveActType(){
		#if (isset($_POST["ActType[]"])){
			include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
			$selectedActTypes = "";
			foreach ($_POST["actType"] as  $selected){
				$selectedActTypes .= "'".$selected."',";
			}
			$selectedActTypes = substr($selectedActTypes,0,-1);
			
			$sql = "UPDATE activitytype SET isArchived = 1 WHERE ActivityCode IN (".$selectedActTypes.")";
			
			if ($conn->query($sql) === TRUE){
				$_SESSION["message"] = "<div class='alert alert-success alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
				<i class='fa fa-check-circle'></i> Activity type/s Successfully Archived
				</div>";
					header ("location: ../activity-types.php");
			}
			$conn->close();
		#}
	}
	
	function EditActType(){
			include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
			$sql = "UPDATE activitytype SET ActivityCode='".$_POST["NewActivityCode"]."' ,ActivityDescription='".$_POST["activityDescription"]."' WHERE ActivityCode='".$_POST["activityCode"]."'";
			#echo $sql;/*
			if ($conn->query($sql) === TRUE){
				$_SESSION["message"] = "<div class='alert alert-success alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
				<i class='fa fa-check-circle'></i> Subject/s Successfully Updated
				</div>";
					header ("location: ../activity-types.php");
			}
			#*/
			$conn->close();
	}
?>