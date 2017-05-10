<?php
	if (!isset($_SESSION["SelectedGP"])){
		$_SESSION["SelectedGP"] = "";
	}
	$selected = "";
	$options = "";
	for($i=1;$i<=4;$i++){
		if($i == $_SESSION["SelectedGP"]){
			$selected = "<option>".$i."</option>";
		}else{
			$options .= "<option>".$i."</option>";
		}
	}
	echo $selected."<option>All</option>".$options;
?>