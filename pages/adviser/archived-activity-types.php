<?php include "/xampp/htdocs/ubhs-csms/util/session-set.php";$sidebar = $_SESSION["sidebar"];?>
<!doctype html>
<html lang="en">
<head>
	<?php include"/xampp/htdocs/ubhs-csms/html/head.html"; ?>
</head>
<body>
	<?php include"/xampp/htdocs/ubhs-csms/html/logout-modal.html"; ?>
	<?php include"html/add-activity-type-modal.html"; ?>
	
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="sidebar">
			<div class="brand">
				<a href="index.php"><img src="/ubhs-csms/assets/img/ub-logo.png" class="img-responsive logo"></a>
			</div>
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="<?php echo $sidebar[0]?>" class=""><i class="lnr lnr-home"></i> <span>Home</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="<?php echo $sidebar[5];?>"></i> <span><?php echo $sidebar[4];?></span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse">
								<ul class="nav">
									<li><?php echo"<a href='".$sidebar[1]."' class=''>Class Standing</a>"?></li>
									<li><?php echo"<a href='".$sidebar[2]."' class=''>Attendance</a>"?></li>
									<li><?php echo"<a href='".$sidebar[3]."' class=''>Grades</a>"?></li>
								</ul>
							</div>
							<li><a href="activity-types.php" class="active"><i class="lnr lnr-pencil"></i> <span>Activity Types</span></a></li>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- MAIN -->
		<div class="main">
			<?php include("/xampp/htdocs/ubhs-csms/html/navbar.html"); ?>
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Archived Activity Types</h3>
						</div>
						<div class="panel-body">
							<?php 
								if (isset($_SESSION["message"])){
									echo $_SESSION["message"];
									unset ($_SESSION["message"]);
								}
							?>
							<div class="demo-button">
								<a href="activity-types.php" class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i>&nbsp&nbsp Go Back</a>
							</div><br>
							<div class="table-responsive">
								<table class="table table-condensed table-hover table-striped table-bordered">
									<thead>
										<tr style="background-color:maroon;color:#fff;">
											<td>Activity Code</td>
											<td>Activity Description</td>
											<td>Recover</td>
										</tr>
									</thead>
									<tbody>
											<?php include "util/archived-activity-types.php";?>
											<?php include "html/recover-activity-type-modal.html";?>
									</tbody>
								</table>
							</div>
						</div></div>
				</div>
			</div>
			<?php include"/xampp/htdocs/ubhs-csms/html/footer.html"; ?>
		</div>
		<!-- END MAIN -->
	</div>
	<!-- END WRAPPER -->
</body>
</html>