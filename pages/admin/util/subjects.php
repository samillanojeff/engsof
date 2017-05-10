<?php
	include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
	$sql = "SELECT * FROM subject WHERE isArchived = 0";
	$result = $conn->query($sql);
									
	while($row = $result->fetch_assoc()){
		echo "<tr><td>".$row["SubjectCode"]."</td><td>".$row["SubjectDescription"]."</td><td><button type='button' class='btn btn-warning btn-xs'  id='".$row["SubjectCode"]."' name='".$row["SubjectDescription"]."' onclick='getName(this.id,this.name);'><i class='fa fa-edit' ></i></button></td></tr>";
	}
	$conn->close();
?>