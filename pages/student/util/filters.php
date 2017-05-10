<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		$location = "";
		
		if ($_SESSION["formtype"] == "Home"){
			$_SESSION["SelectedActType"] = $_POST["ActType"];
			$_SESSION["date-filter"] = " =CURRENT_DATE ";
			$_SESSION["SelectedSubject"] = $_POST["Subject"];
			
			if ($_POST["ActType"] != "All"){
				$_SESSION["ActType"] = "AND activitytype.ActivityDescription ='".$_POST["ActType"]."' ";
			}else{
				$_SESSION["ActType"] = "";
			}
			if ($_POST["Subject"] != "All"){
				$_SESSION["Subject"] = "AND subject.SubjectDescription ='".$_POST["Subject"]."' ";
			}else{
				$_SESSION["Subject"] = "";
			}
			$location = "location: ../index.php";
		}else{
			$_SESSION["StartDate"] = $_POST["StartDate"];
			$_SESSION["EndDate"] = $_POST["EndDate"];
			$_SESSION["SelectedGP"] = $_POST["GradingPeriod"];
		}
		
		if ($_SESSION["formtype"] == "Attendance"){
			$_SESSION["date-filter"] = " BETWEEN '".$_SESSION["StartDate"]."' AND '".$_SESSION["EndDate"]."'";
			$location = "location: ../attendance.php";
		}
		if ($_SESSION["formtype"] == "Class Standing"){
			$_SESSION["SelectedActType"] = $_POST["ActType"];
			$_SESSION["SelectedSubject"] = $_POST["Subject"];
			$location = "../class-standing.php";
			$_SESSION["date-filter"] = " BETWEEN '".$_SESSION["StartDate"]."' AND '".$_SESSION["EndDate"]."'";
			
			if ($_POST["Subject"] != "All"){
				$_SESSION["Subject"] = "AND subject.SubjectDescription ='".$_POST["Subject"]."' ";
			}else{
				$_SESSION["Subject"] = "";
			}
			if ($_POST["ActType"] != "All"){
				$_SESSION["ActType"] = "AND activitytype.ActivityDescription ='".$_POST["ActType"]."' ";
			}else{
				$_SESSION["ActType"] = "";
			}
			$location = "location: ../class-standing.php";
		}
		
		if ($_POST["GradingPeriod"] == "All"){
			/*if (date("Y-m-d",$_POST["StartDate"]) >= date("Y-m-d","2016-04-02") && date("Y-m-d",$_POST["EndDateDate"]) <= date("Y-m-d")){
			}else{
				$_SESSION["StartDate"] = "2016-04-02";
				$_SESSION["EndDate"] = date("Y-m-d");
				$_SESSION["date-filter"] = " BETWEEN '".$_SESSION["StartDate"]."' AND '".$_SESSION["EndDate"]."'";
			}*/
		}elseif($_POST["GradingPeriod"] == "1"){
			$_SESSION["StartDate"] = "2016-08-01";
			$_SESSION["EndDate"] = "2016-10-15";
			$_SESSION["date-filter"] = " BETWEEN '".$_SESSION["StartDate"]."' AND '".$_SESSION["EndDate"]."'";
		}elseif($_POST["GradingPeriod"] == "2"){
			$_SESSION["StartDate"] = "2016-10-16";
			$_SESSION["EndDate"] = "2016-12-31";
			$_SESSION["date-filter"] = " BETWEEN '".$_SESSION["StartDate"]."' AND '".$_SESSION["EndDate"]."'";
		}elseif($_POST["GradingPeriod"] == "3"){
			$_SESSION["StartDate"] = "2017-01-01";
			$_SESSION["EndDate"] = "2017-03-15";
			$_SESSION["date-filter"] = " BETWEEN '".$_SESSION["StartDate"]."' AND '".$_SESSION["EndDate"]."'";
		}elseif($_POST["GradingPeriod"] == "4"){
			$_SESSION["StartDate"] = "2017-03-16";
			$_SESSION["EndDate"] = "2017-05-28";
			$_SESSION["date-filter"] = " BETWEEN '".$_SESSION["StartDate"]."' AND '".$_SESSION["EndDate"]."'";
		}
		unset ($_SESSION["formtype"]);
		header ($location);
	}
?>