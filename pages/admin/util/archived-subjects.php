<?php
	include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
	$sql = "SELECT * FROM subject WHERE isArchived = 1";
	$result = $conn->query($sql);

	if ($result->num_rows > 0){		
		while($row = $result->fetch_assoc()){
			echo "<tr><td>".$row["SubjectCode"]."</td><td>".$row["SubjectDescription"]."</td><td><button type='button' class='btn btn-success btn-xs' id='".$row["SubjectCode"]."' onclick='getSubj(this.id);'><i class='fa fa-refresh'></i></button></td></tr>";
		}
	}else{
		echo "<tr><td colspan='3'><center>Nothing to show.</center></td></tr>";
	}
	$conn->close();
?>