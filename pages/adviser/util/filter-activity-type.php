<?php
	include "../../util/dbconn.php";
	$sql = "SELECT DISTINCT ActivityDescription FROM activitytype NATURAL JOIN user WHERE user.Section ='".$_SESSION["Section"]."' AND isArchived=0";
	$result = $conn->query($sql);
	
	#echo $sql;/*
	if (!isset($_SESSION["SelectedActivityType"])){
		$_SESSION["SelectedActivityType"] = "";
	}
	
	$selected = "";
	$options = "";
	while($row = $result->fetch_assoc()){
		if ($row["ActivityDescription"] == $_SESSION["SelectedActivityType"]){
			$selected = "<option>".$row["ActivityDescription"]."</option>";
		}else{
			$options .= "<option>".$row["ActivityDescription"]."</option>";
		}
	}
	
	echo $selected."<option>All</option>".$options;
	#*/
	$conn->close();
?>