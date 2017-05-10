<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
		$sql = "SELECT Activity.ActivityDate FROM activity WHERE ActivityDate BETWEEN '".$_POST["StartDate"]."' AND '".$_POST["EndDate"]."' ORDER BY ActivityDate";
		$result = $conn->query($sql);
		echo "<th>Date</th>";
		while($row = $result->fetch_assoc()){
			echo "<th><div>".$row['ActivityDate']."</div></span></th>";
		}
		$conn->close();
	}
?> 