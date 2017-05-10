<?php
	include "../../util/dbconn.php";
	
	if (isset($_SESSION["filters"])){
		$sql = "SELECT * FROM user LEFT JOIN attendance ON user.UserID=attendance.StudentID NATURAL JOIN subject WHERE ".$_SESSION["filters"]." ORDER BY user.LastName,user.UserID, attendance.AttendanceDate DESC";
		$_SESSION["attendance"][0] = $sql;
		$_SESSION["attendance"][1] = AttendanceCount();
		$result = $conn->query($sql);
		$prevStud = "";
		$Dates = "<th>Student</th>"; $i = AttendanceCount();
		$Attendance = "<tr>";
		#echo $sql;/*
		while ($row = $result->fetch_assoc()){
			if($row["UserID"] != $prevStud){
				$Attendance .= "</tr><tr><td>".$row["LastName"].", ".$row["FirstName"]."</td>";
			}
			$Attendance .= "<td>".$row["AttendanceDescription"][0]."</td>";
			if($i > 0){
				$Dates .= "<th>".$row["AttendanceDate"]."</th>";
			}
			$prevStud = $row["UserID"];
			$i--;
		}
		$Attendance .= "</tr>";
		$Attendance = substr($Attendance,9,strlen($Attendance));
			
		echo "
		<div class='table-responsive'>
			<table class='table table-bordered table-condensed table-hover'>
				<thead>
					<tr style='background-color:lightgray;color:#000;'>
						".$Dates."
					</tr>
				</thead>
				<tbody id='myTable'>
					".$Attendance."
				</tbody>
			</table>
			<div class='col-md-12 text-center'>
			  <ul class='pagination pagination-lg pager' id='myPager'></ul>
			 </div>
		</div>";
		#*/
	}
	$conn->close();
	
	function AttendanceCount(){
		include "../../util/dbconn.php";
		$sql = "SELECT ((COUNT(DISTINCT AttendanceID))/(COUNT(DISTINCT StudentID))) AS aID FROM user LEFT JOIN attendance ON user.UserID=attendance.StudentID NATURAL JOIN subject WHERE ".$_SESSION["filters"]." ORDER BY user.LastName,user.UserID, attendance.AttendanceDate DESC";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		return $row["aID"];
	}
?>