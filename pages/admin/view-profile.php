<?php 
	include "/xampp/htdocs/ubhs-csms/util/session-set.php";
	include "../../util/dbconn.php";
	if(!isset($_SESSION["SearchUser"])){
		header ("location: accounts.php");
	}
	$sql = "SELECT * FROM user WHERE UserID=".$_SESSION["SearchUser"];
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
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
		<div class="sidebar">
			<div class="brand">
				<a href="index.php"><img src="/ubhs-csms/assets/img/ub-logo.png" class="img-responsive logo"></a>
			</div>
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li>
							<a href="index.php" class=""><i class="lnr lnr-home"></i> <span>Home</span></a>
						</li>
						<li><a href="subjects.php" class=""><i class="lnr lnr-book"></i>Subjects</a></li>
						<li>
							<a href="accounts.php" class="active"><i class="lnr lnr-users"></i> <span>Accounts</span></a>
						</li>
						<li>
							<a href="#" data-toggle="modal" data-target="#LogoutModal"><i class="lnr lnr-exit"></i><span>Logout</span></a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- MAIN -->
		<div class="main">
			<nav class="navbar navbar-default" style="background-color:#111111; border-bottom:3px solid #c10000">
				<div class="container-fluid">
					<div class="navbar-btn">
						<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-menu-circle"></i></button>
					</div>
					<div class="navbar-header">
						<div style="color: #fff;">
							<h4><strong class="hidden-xs">&nbsp&nbsp UB High School Class Standing Monitoring System ||</strong>UBHS-CSMS</h4>
							<p>&nbsp&nbsp <?php echo $_SESSION["UserType"];?></p>
						</div>
					</div>
				</div>
			</nav>
			<!-- MAIN CONTENT -->
			
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">View Profile</h3>
						</div>
					</div>
					<div class="panel">
						<div class="panel-body">
						<a href="accounts.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> &nbsp&nbsp Go Back</a>
						<br>
							<div class="profile-info col-md-6">
								<h4 class="heading">Personal Info</h4>
									<table class="table table-condensed">
										<tr> 
											<td class="text-right">First Name:</td>
											<td class="text-left"><?php echo $row["FirstName"]; ?></td>
										</tr>
										<tr> 
											<td class="text-right">Middle Name:</td>
											<td class="text-left"><?php echo $row["MiddleName"]; ?></td>
										</tr>
										<tr> 
											<td class="text-right">Last Name:</td>
											<td class="text-left"><?php echo $row["LastName"]; ?></td>
										</tr>
										<tr> 
											<td class="text-right">Birth Date:</td>
											<td class="text-left"><?php echo $row["BirthDate"]; ?></td>
										</tr>
									</table>
							</div>
							<div class="profile-info col-md-6">
								<h4 class="heading">Contact Info</h4>
									<table class="table table-condensed">
										<tr>
											<td class="text-right">Contact Number:</td>
											<td class="text-left"><?php echo $row["ContactNumber"]; ?></td>
										</tr>
										<tr> 
											<td class="text-right">Emergency Contact:</td>
											<td class="text-left"><?php echo $row["EmergencyContact"]; ?></td>
										</tr>
										<tr> 
											<td class="text-right">Email:</td>
											<td class="text-left"><?php echo $row["Email"]; ?></td>
										</tr>
										<tr> 
											<td class="text-right">Address:</td>
											<td class="text-left"><?php echo $row["Address"]; ?></td>
										</tr>
									</table>
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