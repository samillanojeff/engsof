<?php
	if (isset($_SESSION["date-filter"])){
		$datefilter = "AND activity.ActivityDate ".$_SESSION["date-filter"];
	}else{
		$datefilter = "";
	}
		
	if (isset($_SESSION["ActType"])){
		$activityTypeFilter = $_SESSION["ActType"];
	}else{
		$activityTypeFilter = "";
	}
		
	if (isset($_SESSION["Subject"])){
		$subjectFilter = $_SESSION["Subject"];
	}else{
		$subjectFilter = "";
	}
	
	include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
	$sql = "SELECT DISTINCT activity.ActivityID, studentactivity.Score, activity.ActivityScore, activity.ActivityCode, activitytype.ActivityDescription, activity.ActivityDate, user.Section FROM user JOIN studentactivity ON user.UserID = studentactivity.StudentID JOIN activity ON studentactivity.ActivityID = activity.ActivityID JOIN activitytype ON activity.ActivityCode = activitytype.ActivityCode JOIN subject ON activity.SubjectCode = subject.SubjectCode WHERE user.Section = activity.Section AND activity.Section = '".$_SESSION["Section"]."' AND user.UserID ='".$_SESSION["UserID"]."' ".$datefilter.$activityTypeFilter.$subjectFilter." ORDER BY user.LastName, activity.ActivityDate DESC, activity.ActivityID";
	
	#echo $sql;/*
	$result = $conn->query($sql);
	$prevAct = "";
	if ($result->num_rows > 0){		
		while ($row = $result->fetch_assoc()){
			if ($prevAct != $row["ActivityID"]){
				echo "<tr><td>".$row["ActivityDate"]."</td><td>".$row["ActivityDescription"]."</td><td>".$row["Score"]."</td><td>".$row["ActivityScore"]."</td></tr>";
			}
			$prevAct = $row["ActivityID"];
		}
	}else{
		echo "<td colspan='4'><center>No Records.</center></td>";
	}
	#*/
	$conn->close();
	$_SESSION["sql"] = $sql;
?>