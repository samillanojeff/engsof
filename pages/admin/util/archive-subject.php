<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		include "/xampp/htdocs/ubhs-csms/util/dbconn.php";
		$sql = "UPDATE subject SET isArchived = 0 WHERE SubjectCode = 'MATH1'";
			
		if ($conn->query($sql) === TRUE){
			echo "<div class='alert alert-success alert-dismissible' role='alert'>
					<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
					<i class='fa fa-check-circle'></i> Subject Successfully Archived
				</div>";
		}
		$conn->close();
	}
?>