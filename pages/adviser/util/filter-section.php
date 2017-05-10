<?php
	include "../../util/dbconn.php";
	$sql = "SELECT * FROM advisersubject WHERE AdviserID='".$_SESSION["UserID"]."'";
	$result = $conn->query($sql);
							
	if (!isset($_SESSION["SelectedSection"])){
		$_SESSION["SelectedSection"] = "";
	}
	$selected = "";
	$options = "";
	$prevSection = "";
	
	while ($row = $result->fetch_assoc()){
		if ($row["Section"] != $prevSection){
			if ($row["Section"] == $_SESSION["SelectedSection"]){
				$selected = "<option>".$row["Section"]."</option>";
				$fSec[] = $row["Section"];
			}else{
				$options .= "<option>".$row["Section"]."</option>";
				$fSec[] = $row["Section"];
			}
		}
		$prevSection = $row["Section"];
	}
	echo $selected."<option>-Choose-</option>".$options;
?>