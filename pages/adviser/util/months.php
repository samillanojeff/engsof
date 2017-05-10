<?php
	$months = array("August","September","October","November","December","January","February","March","April","May");
	
	if (!isset($_SESSION["SelectedMonth"])){
		$_SESSION["SelectedMonth"] = date("m");
	}
	$selected = "";
	$options = "";
	for($i=0;$i<count($months);$i++){
		$checkmonth = date('m',strtotime($months[$i]));
		echo date('m',strtotime($months[$i]));
		if($checkmonth == $_SESSION["SelectedMonth"]){
			$selected = "<option>".$months[$i]."</option>";
		}else{
			$options .= "<option>".$months[$i]."</option>";
		}
	}
	echo $selected.$options;
?>