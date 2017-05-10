<?php
	include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
	$sql = "SELECT * FROM activitytype WHERE isArchived = 1 AND UserID='".$_SESSION["UserID"]."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo "<tr><td>".$row["ActivityCode"]."</td><td>".$row["ActivityDescription"]."</td><td><button type='button' class='btn btn-success btn-xs' id='".$row["ActivityCode"]."' onclick='getSubj(this.id);'><i class='fa fa-refresh'></i></button></td></tr>";
		}
	}else{
		echo "<tr><td colspan=3><center>Nothing to show.</center></td></tr>";
	}	
	$conn->close();
?>