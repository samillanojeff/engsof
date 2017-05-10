<?php
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require_once "/xampp/htdocs/ubhs-csms/util/dbconn.php";
		$sql = "SELECT * FROM user WHERE (LastName LIKE '%".$_POST["searchUser"]."%' OR FirstName LIKE '%".$_POST["searchUser"]."%' OR UserID ='".$_POST["searchUser"]."') AND isArchived = 0 ORDER BY LastName";
		$accounts = "";
		$result = $conn->query($sql);
		if ($result->num_rows > 0){
			while ($row = $result->fetch_assoc()){
				$accounts .= "
				<tr>
					<td><input type='checkbox' name='users[]' class='toggleBtn' value='".$row["UserID"]."'/>".$row["LastName"]."</td>
					<td>".$row["FirstName"]."</td>
					<td>".$row["MiddleName"]."</td>
					<td>".$row["UserID"]."</td>
					<td>".$row["UserType"]."</td>
					<td>
						<button type='button' class='btn btn-success' id='".$row["UserID"]."' name='".$row["LastName"].", ".$row["FirstName"]."' onclick='getName(this.id,this.name);' title='Set Default Password'>
							<i class='fa fa-key'></i>
						</button>
						&nbsp<button type='submit' name='SearchUser' value='".$row["UserID"]."' class='btn btn-primary' title='View Profile'>
							<i class='fa fa-eye'></i>
						</button>
					</td>
				</tr>";
			}
			echo $accounts;
		}else{
			echo "<tr><td colspan='6' class='text-center'>No Results.</td></tr>";
		}
		$conn->close();
	}
?>