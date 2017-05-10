<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if ($_POST["Edit"]){
			EditSubject();
		}elseif ($_POST["Archive"]){
			ArchiveSubject();
		}
	}
	function ArchiveSubject(){
		#if (isset($_POST["subject[]"])){
			include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
			$selectedSubjects = "";
			foreach ($_POST["subject"] as $selected){
				$selectedSubjects .= "'".$selected."',";
			}
			$selectedSubjects = substr($selectedSubjects,0,-1);
			
			$sql = "UPDATE subject SET isArchived = 1 WHERE SubjectCode IN (".$selectedSubjects.")";
			
			if ($conn->query($sql) === TRUE){
				$_SESSION["message"] = "<div class='alert alert-success alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
				<i class='fa fa-check-circle'></i> Subject/s Successfully Archived
				</div>";
				header ("location: ../subjects.php");
			}
			$conn->close();
		#}
	}
	
	function EditSubject(){
			include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
			$sql = "UPDATE subject SET SubjectCode='".$_POST["NewSubjectCode"]."' ,SubjectDescription='".$_POST["subjectDescription"]."' WHERE SubjectCode='".$_POST["subjectCode"]."'";
			#echo $sql;/*
			if ($conn->query($sql) === TRUE){
				$_SESSION["message"] = "<div class='alert alert-success alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
				<i class='fa fa-check-circle'></i> Subject/s Successfully Updated
				</div>";
			}else{
				$_SESSION["message"] = "<div class='alert alert-warning alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
				<i class='fa fa-times-circle'></i> Subject Code is already existing.
				</div>";
			}
			header ("location: ../subjects.php");
			#*/
			$conn->close();
	}
?>