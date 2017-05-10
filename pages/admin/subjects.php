<?php
	include "/xampp/htdocs/ubhs-csms/util/session-set.php";
?>
<!doctype html>
<html lang="en">
<head>
	<?php include("/xampp/htdocs/ubhs-csms/html/head.html"); ?>
</head>
<body>
	<?php include "/xampp/htdocs/ubhs-csms/html/logout-modal.html";?>
	<?php include "/xampp/htdocs/ubhs-csms/pages/admin/html/add-subject-modal.html";?>
	
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
						<li><a href="subjects.php" class="active"><i class="lnr lnr-book"></i>Subjects</a></li>
						<li>
							<a href="accounts.php"><i class="lnr lnr-users"></i> <span>Accounts</span></a>
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
					<div class="navbar-header" >
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
							<span class="sr-only">Toggle Navigation</span>
							<i class="lnr lnr-chevron-down"></i>
						</button>
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
							<h3 class="panel-title">Subjects</h3>
							<span class="panel-subtitle">Schoolyear 2016-2017 (Current)</span>
						</div>
						<div class="panel-body">
							<?php 
								if (isset($_SESSION["message"])){
									echo $_SESSION["message"];
									unset ($_SESSION["message"]);
								}
							?>
							
							<div class="table-responsive">
								<table class="table table-condensed table-hover table-striped table-bordered">
									<thead>
										<tr style="background-color:maroon;color:#fff;">
											<td>Subject Code</td>
											<td>Subject Description</td>
											<td>Action</td>
										</tr>
									</thead>
									<tbody>
										<form action="util/edit-or-archive-subject.php" method="POST">
											<?php include "util/subjects.php";?>
											<?php include "html/edit-subject-modal.html";?>
											<?php include "html/archive-subject-modal.html";?>
										</form>
									</tbody>
								</table>
							</div>
							<div class="demo-button">
								<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#AddSubject"><i class="fa fa-plus"></i>&nbsp&nbsp Add</button>	
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("/xampp/htdocs/ubhs-csms/html/footer.html"); ?>
		</div>
		<!-- END MAIN -->
	</div>
	<!-- END WRAPPER -->
</body>
</html>