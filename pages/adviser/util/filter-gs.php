<?php
	
	$selected = "";
	$options = "";
	
	$gradeStatus = array("All"=>"*","Passed"=>1,"Failed"=>0);
	foreach($gradeStatus as $desc=>$value){
		if ($_SESSION["SelectedGS"] == $desc){
			$selected = "<option value=".$value.">".$desc."</option>";
		}else{
			$options .= "<option value=".$value.">".$desc."</option>";
		}
	}
	echo $selected.$options;
?>