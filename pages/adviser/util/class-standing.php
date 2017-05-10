<?php
	
	function dbconn(){
		include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
		return $conn;
	}
	function actCount(){
		$conn = dbconn();
		$sql = "SELECT COUNT(DISTINCT activity.ActivityID) as aID FROM user JOIN studentactivity ON user.UserID = studentactivity.StudentID JOIN activity ON studentactivity.ActivityID = activity.ActivityID JOIN subject ON activity.SubjectCode = subject.SubjectCode JOIN activitytype ON activity.ActivityCode = activitytype.ActivityCode WHERE user.Section = activity.Section AND activitytype.isArchived=0 AND activitytype.UserID = ".$_SESSION["UserID"]." AND ".$_SESSION["filters"]." ORDER BY user.LastName, user.UserID, activity.ActivityDate DESC, activity.ActivityID";
		#echo $sql;
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		return $row["aID"];
	}
	function GetActivityCodes($actCode){
		$selected = "";
		$options = "";
		
		for($i=0;$i<count($_SESSION["ActivityCodes"])/2;$i++){
			if($_SESSION["ActivityCodes"][$i] == $actCode){
				$selected = "<option>".$_SESSION["ActivityCodes"][$i]."</option>";
			}else{				
				$options .= "<option>".$_SESSION["ActivityCodes"][$i]."</option>";
			}
		}
		
		return $selected.$options;
	}
	function EditCS($result){
		$Dates = "<th>Date</th>"; $i = actCount();
		$ScoreDetails = "<th>Details</th>";
		$Scores = "<tr>";
		$prevStud = "";
		$actID = "";
		$info = array();
		
		while ($row = $result->fetch_assoc()){
			if($row["StudentID"] != $prevStud){
				$Scores .= "</tr><tr><td>".$row["LastName"].", ".$row["FirstName"]."</td>";
			}
			$Scores .= "<td><input type='text' style='display:none;' name='ScoreID[]' size=2 value='".$row["ScoreID"]."'/><input type='text' name='Score[]' size=2 value='".$row["Score"]."'/></td>";
			
			if ($i > 0){
				#$Dates .= "<th><input name='ActivityID[]' style='display:none;' class='input-sm' type='text' value='".$row["ActivityID"]."'/><input name='ActivityDate[]' class='input-sm' type='date' value='".$row["ActivityDate"]."'/></th>";
				#$ScoreDetails .= "<th><select name='ActivityCode[]' style='color:#000'>".GetActivityCodes($row["ActivityCode"])."</select>/<input name='ActivityScore[]' type='text' style='color:#000' size=2 value='".$row["ActivityScore"]."'/></th>";
				$Dates .= "<th>".$row["ActivityDate"]."</th>";
				$ScoreDetails .= "<th>".$row["ActivityCode"]."/".$row["ActivityScore"]."</th>";
			}
			$prevStud = $row["StudentID"];
			$i--;
		}
		$Scores .= "</tr>";
		return array($Dates,$ScoreDetails,$Scores);
	}
	function ViewCS($result){
		$Dates = "<th>Date</th>"; $i = actCount();
		$ScoreDetails = "<th>Details</th>";
		$Scores = "<tr>";
		$prevStud = "";
		while ($row = $result->fetch_assoc()){
			if($row["StudentID"] != $prevStud){
				$Scores .= "</tr><tr><td class='col-md-3'>".$row["LastName"].", ".$row["FirstName"]."</td>";
			}
			$Scores .= "<td>".$row["Score"]."</td>";
			if ($i > 0){
				$Dates .= "<th>".$row["ActivityDate"]."</th>";
				$ScoreDetails .= "<th>".$row["ActivityCode"]."/".$row["ActivityScore"]."</th>";
			}
			$prevStud = $row["StudentID"];
			$i--;
		}
		$Scores .= "</tr>";
		
		return array($Dates,$ScoreDetails,$Scores);
	}
	if(isset($_SESSION["filters"])){
		$conn = dbconn();
		$sql = "SELECT * FROM user JOIN studentactivity ON user.UserID = studentactivity.StudentID JOIN activity ON studentactivity.ActivityID = activity.ActivityID JOIN subject ON activity.SubjectCode = subject.SubjectCode JOIN activitytype ON activity.ActivityCode = activitytype.ActivityCode WHERE user.Section = activity.Section AND activitytype.isArchived=0 AND activitytype.UserID = ".$_SESSION["UserID"]." AND ".$_SESSION["filters"]." ORDER BY user.LastName, user.UserID, activity.ActivityDate DESC, activity.ActivityID";
		$_SESSION["class_standing"][0] = $sql;
		$_SESSION["class_standing"][1] = actCount();
		#echo $sql;/*
		$result = $conn->query($sql);
		
		if(isset($_SESSION["Edit"])){
			$info = EditCS($result);
		}elseif(isset($_SESSION["Add"])){
			$info = ViewCS($result);
		}elseif(isset($_SESSION["Save"])){
			$info = ViewCS($result);
		}else{
			$info = ViewCS($result);			
		}
		$Dates = $info[0];
		$ScoreDetails = $info[1];
		$Scores = $info[2];
		
		echo "
		<div class='table-responsive'>
			<table class='table table-bordered table-condensed table-hover'>
				<thead>
					<tr style='background-color:lightgray;color:#000;'>
						".$Dates."
					</tr>
					<tr style='background-color:maroon;color:#fff;'>
						".$ScoreDetails."
					</tr>
				</thead>
				<tbody id='myTable'>
					".$Scores."
				</tbody>
			</table>
			<div class='col-md-12 text-center'>
			  <ul class='pagination pagination-lg pager' id='myPager'></ul>
			 </div>
		</div>";
		#*/
	}
?>