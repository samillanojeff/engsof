<?php
	include "../../util/dbconn.php";
	
	$sql = "SELECT * FROM advisersubject NATURAL JOIN subject WHERE AdviserID='".$_SESSION["UserID"]."' AND Section='".$_SESSION["SelectedSection"]."'";
	$result = $conn->query($sql);
	
	$selected = "";
	$options = "";
	#echo $sql;/*
	while ($row = $result->fetch_assoc()){
		if ($row["SubjectDescription"] == $_SESSION["SelectedSubject"]){
			$selected = "<option>".$row["SubjectDescription"]."</option>";
		}else{
			$options .= "<option>".$row["SubjectDescription"]."</option>";
		}
	}
	echo $selected."<option>-Choose-</option>".$options;
	#*/
	$conn->close();
?>