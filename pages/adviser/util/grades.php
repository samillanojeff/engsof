<?php
	include "../../util/dbconn.php";
	
	if(isset($_SESSION["filters"])){ 
		$sql = "SELECT user.UserID, CONCAT(user.FirstName,' ',user.MiddleName,' ',user.LastName) AS StudentName,grades.*,subject.* FROM user LEFT JOIN grades ON user.UserID = grades.StudentID NATURAL JOIN subject WHERE ".$_SESSION["filters"]." ORDER BY StudentName,UserID, GradingPeriod, subject.SubjectCode";
		$_SESSION["sql"] = $sql;
		$result = $conn->query($sql);
		#echo $sql;/*
		$table = "<tr>";
		$prevStud = "";
		while ($row = $result->fetch_assoc()){
			if($row["UserID"] != $prevStud){
				$table .= "</tr><tr><td>".$row["StudentName"]."</td>";
			}
			$table .= "<td>".$row["StudentGrade"]."</td>";
			if($row["GradingPeriod"] == 4){
				if ($row["StudentGrade"] >= 75){
					$table .= "<td><span class='text-right label label-success'>PASSED</span></td>";
				}else{
					$table .= "<td><span class='text-right label label-danger'>FAILED</span></td>";
				}
			}
			$prevStud = $row["UserID"];
		}
		$table .= "</tr>";
		echo substr($table,0,strlen($table));
		#*/
	}
	$conn->close();
?>