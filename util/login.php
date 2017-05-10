<?php
	session_start();
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		include "dbconn.php"; 
		$sql = "SELECT * FROM user WHERE UserID = '".$_POST["idnum"]."' AND Password = '".$_POST["password"]."'";
		$result = $conn->query($sql);
		#echo $sql;/*
		$row = $result->fetch_assoc();
		if ($_POST["idnum"] == $row["UserID"] && $_POST["password"] == $row["Password"]){
			$_SESSION["UserID"] = $row["UserID"];
			$_SESSION["UserType"] = $row["UserType"];
			$_SESSION["UserName"] = $row["FirstName"];
			$_SESSION["FullName"] = $row["LastName"].", ".$row["FirstName"]." ".$row["MiddleName"];
			$_SESSION["Section"] = $row["Section"];
			if($row["UserType"] == "Student"){
				$_SESSION["sidebar"] = array("/ubhs-csms/pages/student/","/ubhs-csms/pages/student/class-standing.php","/ubhs-csms/pages/student/attendance.php","/ubhs-csms/pages/student/grades.php","View","lnr lnr-eye");
				$_SESSION["sidebar-user-profile"] = "<div class='sidebar'><div class='brand'><a href='#'><img src='assets/img/ub-logo.png' class='img-responsive logo'></a></div><div class='sidebar-scroll'><nav><ul class='nav'><li><a href='pages/student/index.php' class=''><i class='lnr lnr-home'></i> <span>Home</span></a></li><li><a href='#subPages' data-toggle='collapse' class='collapsed'><i class='lnr lnr-eye'></i> <span>View</span> <i class='icon-submenu lnr lnr-chevron-left'></i></a><div id='subPages' class='collapse '><ul class='nav'><li><a href='pages/student/class-standing.php' class=''>Class Standing</a></li><li><a href='pages/student/attendance.php' class=''>Attendance</a></li><li><a href='pages/student/grades.php' class=''>Grades</a></li></ul></div></li></ul></nav></div></div>";
				header("Location: ../pages/student/");
			}elseif($row["UserType"] == "Adviser"){
				$_SESSION["sidebar"] = array("/ubhs-csms/pages/adviser/","/ubhs-csms/pages/adviser/class-standing.php","/ubhs-csms/pages/adviser/attendance.php","/ubhs-csms/pages/adviser/grades.php","Manage Class Record","lnr lnr-file-empty","/ubhs-csms/pages/adviser/my-students.php");
				$_SESSION["sidebar-user-profile"] = "<div class='sidebar'><div class='brand'><a href='#'><img src='assets/img/ub-logo.png' class='img-responsive logo'></a></div><div class='sidebar-scroll'><nav><ul class='nav'><li><a href='pages/adviser/' class=''><i class='lnr lnr-home'></i> <span>Home</span></a></li><li><a href='#subPages' data-toggle='collapse' class='collapsed'><i class='lnr lnr-file-empty'></i> <span>Manage Class Record</span> <i class='icon-submenu lnr lnr-chevron-left'></i></a><div id='subPages' class='collapse '><ul class='nav'><li><a href='pages/adviser/my-students.php' class=''>My Students</a></li><li><a href='pages/adviser/class-standing.php' class=''>Class Standing</a></li><li><a href='pages/adviser/attendance.php' class=''>Attendance</a></li><li><a href='pages/adviser/grades' class=''>Grades</a></li></ul></div></li><li><a href='pages/adviser/activity-types.php' class=''><i class='lnr lnr-pencil'></i> <span>Activity Types</span></a></li><li></ul></nav></div></div>";
				
				$sql = "SELECT DISTINCT ActivityCode FROM activitytype WHERE UserID=".$_POST["idnum"];
				$result = $conn->query($sql);
				
				while($row = $result->fetch_assoc()){
					$_SESSION["ActivityCodes"][] = $row["ActivityCode"];
				}
				
				header("Location: ../pages/adviser/");
			}elseif($row["UserType"] == "Secretary"){
				header("location: ../pages/admin/");
			}
		}else{
			$_SESSION["message"] = "<div class='alert alert-danger alert-dismissible' role='alert'>
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				<i class='fa fa-times-circle'></i>&nbsp&nbspAuthentication Failed, Try Again.</div>";
			header ("location: ../login.php");
		}
		$conn->close();
		#*/
	}
?>