<?php
	if (!isset($_SESSION["SelectedActType"])){
		$_SESSION["SelectedActType"] = "";
	}
	
	include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
	$sql = "SELECT * FROM activitytype NATURAL JOIN user WHERE user.Section = '".$_SESSION["Section"]."' AND isArchived = 0";
	$result = $conn->query($sql);
	$selected = "";
	$options = "";
	while($row = $result->fetch_assoc()){
		if ($row["ActivityDescription"] == $_SESSION["SelectedActType"]){
			$selected = "<option>".$row["ActivityDescription"]."</option>";
		}else{
			$options .= "<option>".$row["ActivityDescription"]."</option>";
		}
	}
	echo $selected."<option>All</option>".$options;
	$conn->close();
?>