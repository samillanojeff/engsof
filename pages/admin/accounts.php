<?php 
	include "/xampp/htdocs/ubhs-csms/util/session-set.php";
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
							<h3 class="panel-title">User Accounts</h3>
						</div>
						<div class="panel-body">
								<div class="row">
									<div class="col-md-4">
										<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
										<div class="input-group">
											<input type="text" name="searchUser" class="form-control" placeholder="Search..."> 
											<span class="input-group-btn"><button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button></span>
										</div>
										</form>
										<br>
									</div>
								</div>
							<?php
								if (isset($_SESSION["message"])){
									echo $_SESSION["message"];
									unset($_SESSION["message"]);
								}
							?>
							<div class="table-responsive">
								<table class="table table-condensed table-hover table-striped table-bordered">
									<thead>
										<tr style="background-color:maroon;color:#fff;">
											<td><input class="input-group-checkbox toggleBtn" id="checkAll" type="checkbox"/>Last Name</td>
											<td>First Name</td>
											<td>Middle Name</td>
											<td>User ID</td>
											<td>User Type</td>
											<td>Action</td>
										<tr>
									</thead>
									<tbody id="myTable">
										<form action="util/view-or-archive-account.php">
										<?php include "util/accounts.php"; ?>
										<?php include "html/archive-account-modal.html"; ?>
										</form>
										<form action="util/set-default-password.php" method="POST">
											<?php include "html/recover-account-modal.html";?>
										</form> 
									</tbody>
								</table>
							</div>
							<div class="demo-button">
								<button type="button" id="btnArchive" disabled="disabled" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#ArchiveUserModal"><i class="fa fa-archive"></i>&nbsp&nbsp Archive</button>		
							</div>
							<div class="col-md-12 text-center">
								<ul class="pagination pagination-lg pager" id="myPager"></ul>
							</div>
							<script>
								$("#checkAll").click(function () {
									$('input:checkbox').not(this).prop('checked', this.checked);
								});
								
								$(document).ready(function(){
									$('.toggleBtn').click(function () {
									//check if checkbox is checked
										if ($('input:checkbox').is(':checked')) {
											$('#btnArchive').removeAttr('disabled'); //enable input

										} else {
											$('#btnArchive').attr('disabled', true); //disable input
										}
									});
								});
								
							</script>
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