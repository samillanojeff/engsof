<?php
	include "../../util/dbconn.php";
	
	$sql = "SELECT * FROM grades NATURAL JOIN subject WHERE StudentID='".$_SESSION["UserID"]."' AND SchoolYear='2016-2017' ORDER BY SubjectCode,GradingPeriod";
	$result = $conn->query($sql);
	
	$prevSubj = "";
	$table = "<tr>";
	#echo $sql;/*
	while ($row = $result->fetch_assoc()){
		if($row["SubjectCode"] != $prevSubj){
			$table .= "</tr><tr><td>".$row["SubjectDescription"]."</td>";
		}
		$table .= "<td>".$row["StudentGrade"]."</td>";
		if($row["GradingPeriod"] == "4"){
			if($row["StudentGrade"] >= 75){
				$table .= "<td><span class='text-right label label-success'>PASSED</span></td>";
			}else{
				$table .= "<td><span class='text-right label label-danger'>FAILED</span></td>";
			}
		}
		$prevSubj = $row["SubjectCode"];
	}
	$table .= "</tr>";
	echo substr($table,9,strlen($table));
	$conn->close();
	$_SESSION["sql"] = $sql;
	#*/
?>