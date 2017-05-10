<?php
	if (isset($_SESSION["date-filter"])){
		$datefilter = "AND attendance.AttendanceDate ".$_SESSION["date-filter"];
	}else{
		$datefilter = "AND attendance.AttendanceDate BETWEEN '2016-08-01' AND '".date("Y-m-d")."'";
	}
	
	include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
	
	$sql = "SELECT * FROM attendance JOIN user ON attendance.StudentID = user.UserID WHERE user.UserID ='".$_SESSION["UserID"]."' ".$datefilter." ORDER BY attendance.AttendanceDate DESC, attendance.SubjectCode";
	
	#echo $sql;/*
	$result = $conn->query($sql);
	$prevDate = "";
	$table = "<tr>";
	if ($result->num_rows > 0){		
		while ($row = $result->fetch_assoc()){
			if($row["AttendanceDate"] != $prevDate){
				$table .= "</tr><tr><td>".$row["AttendanceDate"]."</td>";
			}
			$table .= "<td>".$row["AttendanceDescription"]."</td>";
			$prevDate = $row["AttendanceDate"];
		}
		$table .= "</tr>";
		echo $table;
	}else{
		echo "<td colspan='9'><center>No Records.</center></td>";
	}
	#*/
	$conn->close();
	$_SESSION["sql"] = $sql;
?>