<?php
	session_start();
	$_SESSION["SelectedSection"] = $_GET["Section"];
	$_SESSION["SelectedSubject"] = $_GET["Subject"];
	
	$sectionfilter = "user.Section='".$_SESSION["SelectedSection"]."'";
	$subjectfilter = "subject.SubjectDescription='".$_SESSION["SelectedSubject"]."'";
	
	$_SESSION["filters"] = $sectionfilter." AND ".$subjectfilter." ";
	
	if($_SESSION["formtype"] == "Class Record"){
		$_SESSION["SelectedGP"] = $_GET["GradingPeriod"];
		$_SESSION["StartDate"] = $_GET["StartDate"];
		$_SESSION["EndDate"] = $_GET["EndDate"];
		$date = "activity.ActivityDate";
			
		$_SESSION["SelectedActivityType"] = $_GET["ActivityType"];
		if ($_GET["ActivityType"] == "All"){
			$activityTypefilter = "";
		}else{
			$activityTypefilter = " AND activitytype.ActivityDescription = '".$_SESSION["SelectedActivityType"]."'";
		}
		
		if($_GET["GradingPeriod"] == "1"){
			$_SESSION["StartDate"] = "2016-08-01";
			$_SESSION["EndDate"] = "2016-10-15";
		}elseif($_GET["GradingPeriod"] == "2"){
			$_SESSION["StartDate"] = "2016-10-16";
			$_SESSION["EndDate"] = "2016-12-31";
		}elseif($_GET["GradingPeriod"] == "3"){
			$_SESSION["StartDate"] = "2017-01-01";
			$_SESSION["EndDate"] = "2017-03-15";
		}elseif($_GET["GradingPeriod"] == "4"){
			$_SESSION["StartDate"] = "2017-03-16";
			$_SESSION["EndDate"] = "2017-05-28";
		}
		
		$datefilter = $date." BETWEEN '".$_SESSION["StartDate"]."' AND '".$_SESSION["EndDate"]."'";
		$_SESSION["filters"] .= " AND ".$datefilter.$activityTypefilter;
		header("location: ../class-standing.php");
	}elseif ($_SESSION["formtype"] == "Attendance"){
		$_SESSION["SelectedMonth"] = date("m",strtotime($_GET["Month"]));
		if ($_SESSION["SelectedMonth"] == date("m")){			
			$_SESSION["filters"] .= "AND month(attendance.AttendanceDate) = month(CURRENT_DATE) AND (date(attendance.AttendanceDate) < date(CURRENT_DATE) OR date(attendance.AttendanceDate) = date(CURRENT_DATE)) ";
		}else{
			$_SESSION["filters"] .= "AND month(attendance.AttendanceDate) =".date("m",strtotime($_GET["Month"]));
		}
		header("location: ../attendance.php");
	}
	elseif($_SESSION["formtype"] == "My Students"){
		$_SESSION["filters"] = " AND ".$sectionfilter;
		header ("location: ../my-students.php");
	}
	elseif($_SESSION["formtype"] == "Grades"){
		header ("location: ../grades.php");
	}
?>