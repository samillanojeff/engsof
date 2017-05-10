<?php
	if (isset($_SESSION["filters"])){
		include "../../util/dbconn.php";
		$sql = "SELECT *,CONCAT(FirstName,' ',MiddleName,' ',LastName) AS StudentName FROM user WHERE isArchived=0 AND  UserType='Student'".$_SESSION["filters"];
		$result = $conn->query($sql);
		while($row = $result->fetch_assoc()){
			echo "<tr><td>".$row["StudentName"]."</td><td>".$row["Section"]."</td><td>".$row["BirthDate"]."</td><td>".$row["ContactNumber"]."</td><td>".$row["EmergencyContact"]."</td><td>".$row["Address"]."</td><td>".$row["Email"]."</td></tr>";
		}
		$conn->close();
	}
?>