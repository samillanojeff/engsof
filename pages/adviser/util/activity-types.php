<?php
	include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
	$sql = "SELECT * FROM activitytype WHERE isArchived=0 AND UserID='".$_SESSION["UserID"]."'";
	$result = $conn->query($sql);
									
	$_SESSION["ActivityCode"] = array();
	while($row = $result->fetch_assoc()){
		echo "<tr><td>".$row["ActivityCode"]."</td><td>".$row["ActivityDescription"]."</td><td><button type='button' class='btn btn-warning btn-xs' id='".$row["ActivityCode"]."' name='".$row["ActivityDescription"]."' onclick='getActType(this.id,this.name);'><i class='fa fa-edit'></i></button></td></tr>";
	}
	$conn->close();
?>