<?php
	session_start();
	include "../../../util/dbconn.php";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST["Add"])){			
			/*$sql1 = "SELECT * FROM subject WHERE SubjectDescription ='".$_SESSION["SelectedSubject"]."'";
			$result = $conn->query($sql1);
			$row = $result->fetch_assoc();
			
			$sql = "INSERT INTO activity VALUES(NULL,'".$row["SubjectCode"]."','".$_SESSION["SelectedSection"]."','".$_POST["DateAdd"]."','".$_POST["ActivityTypeAdd"]."',".$_POST["ScoreAdd"].");";
			
			$sql1 = "SELECT UserID FROM user WHERE Section = '".$_SESSION["SelectedSection"]."'";
			$result = $conn->query($sql1);
			while($row = $result->fetch_assoc()){
				$sql .="INSERT INTO studentactivity VALUES(NULL,".$row["UserID"].",LAST_INSERT_ID(),NULL);";
			}
			#echo $sql;/*
			if ($conn->multi_query($sql) === TRUE){
				$_SESSION["message"] = "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='fa fa-check-circle'></i> New Activity Added</div>";
			}
			#*/
			$_SESSION["Add"] = $_POST["Add"];
			unset($_SESSION["Save"]);
		}elseif(isset($_POST["Edit"])){		
			$_SESSION["Edit"] = $_POST["Edit"];
			unset($_SESSION["Save"]);
		}elseif(isset($_POST["Save"])){
			$_SESSION["Save"] = $_POST["Save"];
			if ($_SESSION["formtype"] == "Class Record"){
				$sql = "";
				$sql2 = "";
				
				foreach($_POST["ScoreID"] as $index => $sID){
					$sql .= "UPDATE studentactivity SET Score=".$_POST["Score"][$index]." WHERE ScoreID=$sID;";
				}
				if($conn->multi_query($sql) === TRUE){			
					$_SESSION["message"] = "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='fa fa-check-circle'></i> Changes Saved Successfully</div>";
				}else{	
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				
			}elseif($_SESSION["formtype"] == "Attendance"){
				$sql = "";
				$sql2 = "";
				
				foreach($_POST["ScoreID"] as $index => $sID){
					$sql .= "UPDATE studentactivity SET Score=".$_POST["Score"][$index]." WHERE ScoreID=$sID;";
				}
				if($conn->multi_query($sql) === TRUE){			
					$_SESSION["message"] = "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button><i class='fa fa-check-circle'></i> Changes Saved Successfully</div>";
				}else{	
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
				
			}elseif($_SESSION["formtype"] == "Grades"){
				
			}
			unset($_SESSION["Edit"]);
		}else{
			unset($_SESSION["Edit"]);
		}
		
		if ($_SESSION["formtype"] == "Class Record"){
			header("location: ../class-standing.php");
		}elseif($_SESSION["formtype"] == "Attendance"){
			header("location: ../attendance.php");
		}elseif($_SESSION["formtype"] == "Grades"){
			header("location: ../grades.php");
		}
		
		$conn->close();
	}
?>