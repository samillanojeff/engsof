<?php
	if (!isset($_SESSION["SelectedSubject"])){
		$_SESSION["SelectedSubject"] = "";
	}
	include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
	$sql = "SELECT * FROM subject WHERE isArchived = 0";
	$result = $conn->query($sql);
	$selected = "";
	$options = "";
	#echo $sql; /*
	while($row = $result->fetch_assoc()){
		if ($row["SubjectDescription"] == $_SESSION["SelectedSubject"]){
			$selected = "<option>".$row["SubjectDescription"]."</option>";
		}else{
			$options .= "<option>".$row["SubjectDescription"]."</option>";
		}
	}
	echo $selected."<option>All</option>".$options;
	#*/
	$conn->close();
?>