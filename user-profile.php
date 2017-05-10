<?php
	include "/xampp/htdocs/ubhs-csms/util/session-set.php";
	$sidebar = $_SESSION["sidebar"];
	
	include "util/dbconn.php";
	$sql = "SELECT * FROM user WHERE UserID='".$_SESSION["UserID"]."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$_SESSION["UserName"] = $row["FirstName"];
	$FirstName = $row["FirstName"];
	$MiddleName = $row["MiddleName"];
	$LastName = $row["LastName"];
	$BirthDate = $row["BirthDate"];
	$ContactNumber = $row["ContactNumber"];
	$EmergencyContact = $row["EmergencyContact"];
	$Address = $row["Address"];
	$Email = $row["Email"];
	
	$conn->close();
?>
<!doctype html>
<html lang="en">
<head>
	<?php include"/xampp/htdocs/ubhs-csms/html/head.html"; ?>
</head>
<body>
	<?php include"/xampp/htdocs/ubhs-csms/html/logout-modal.html"; ?>
	
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- SIDEBAR -->
		<?php echo $_SESSION["sidebar-user-profile"]?>
		<!-- MAIN -->
		<div class="main">
			<?php include("/xampp/htdocs/ubhs-csms/html/navbar.html"); ?>
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">My Profile</h3>
						</div>
					</div>
					<form action="/ubhs-csms/util/edit-profile.php" method="post">
					<div class="panel">
						<div class="panel-body">
						<?php
							if (isset($_SESSION["message"])){
								echo $_SESSION["message"];
								unset ($_SESSION["message"]);
							}
						?>
						<br>
							<div class="profile-info col-md-6">
								<h4 class="heading">Personal Info</h4>
									<table class="table table-condensed">
										<tr> 
											<td class="text-right">First Name</td>
											<td class="text-left"><?php echo $FirstName?></td>
										</tr>
										<tr> 
											<td class="text-right">Middle Name</td>
											<td class="text-left"><?php echo $MiddleName;?></td>
										</tr>
										<tr> 
											<td class="text-right">Last Name</td>
											<td class="text-left"><?php echo $LastName;?></td>
										</tr>
										<tr> 
											<td class="text-right">BirthDate</td>
											<td class="text-left"><?php echo $BirthDate?></td>
										</tr>
									</table>
							</div>
							<div class="profile-info col-md-6">
								<h4 class="heading">Contact Info</h4>
									<table class="table table-condensed">
										<tr>
											<td class="text-right">Contact Number</td>
											<td class="text-left"><input type="text" class="profile-fields" name="ContactNo" value="<?php echo $ContactNumber;?>" onchange=""/></td>
										</tr>
										<tr> 
											<td class="text-right">Emergency Contact</td>
											<td class="text-left"><?php echo $EmergencyContact;?></td>
										</tr>
										<tr> 
											<td class="text-right">Email</td>
											<td class="text-left"><input type="text" class="profile-fields" name="Email" value="<?php echo $Email;?>" /></td>
										</tr>
										<tr> 
											<td class="text-right">Address</td>
											<td class="text-left"><textarea class="profile-fields" name="Address" cols="40" rows="5"><?php echo $Address;?></textarea></td>
										</tr>
									</table>
							</div>
							<div class="row text-right">
							<a href="/ubhs-csms/change-password.php" class="btn btn-primary"><i class="fa fa-pencil"></i>&nbsp&nbsp&nbspChange Password</a>
							<button type="submit" class="btn btn-success" id="saveChanges"><i class="fa fa-save"></i>&nbsp&nbsp Save Changes</button>
						</div>
								</form>
						</div>
					</div>
				</div>
			</div>
			<?php include"/xampp/htdocs/ubhs-csms/html/footer.html"; ?>
		</div>
		<!-- END MAIN -->
	</div>
	<!-- END WRAPPER -->
</body>
</html>