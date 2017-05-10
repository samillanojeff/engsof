<?php include "/xampp/htdocs/ubhs-csms/util/session-set.php";
	$sidebar = $_SESSION["sidebar"];
?>
<!doctype html>
<html lang="en">
<head>
	<?php include "/xampp/htdocs/ubhs-csms/html/head.html"; ?>
</head>
<body>
	<?php 
		include "/xampp/htdocs/ubhs-csms/html/logout-modal.html"; 
	?>	
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- SIDEBAR -->
		<div class="sidebar">
			<div class="brand">
				<a href="<?php echo $sidebar[0]?>"><img src="/ubhs-csms/assets/img/ub-logo.png" class="img-responsive logo"></a>
			</div>
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="<?php echo $sidebar[0]?>" class="active"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="<?php echo $sidebar[5];?>"></i> <span><?php echo $sidebar[4];?></span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse">
								<ul class="nav">
									<li><?php echo"<a href='".$sidebar[6]."' class=''>My Students</a>"?></li>
									<li><?php echo"<a href='".$sidebar[1]."' class=''>Class Standing</a>"?></li>
									<li><?php echo"<a href='".$sidebar[2]."' class=''>Attendance</a>"?></li>
									<li><?php echo"<a href='".$sidebar[3]."' class=''>Grades</a>"?></li>
								</ul>
							</div>
							<li><a href="activity-types.php" class=""><i class="lnr lnr-pencil"></i> <span>Activity Types</span></a></li>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<?php include("/xampp/htdocs/ubhs-csms/html/navbar.html"); ?>
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Today's Records</h3>
							<p class="panel-subtitle"><?php date_default_timezone_set("Asia/Manila"); echo date("F j, Y");?>&nbsp&nbsp&nbsp S.Y. 2016-2017</p>
						</div>
					</div>
					<div class="panel">
						<div class="panel-body">
							<div class="table-responsive">
									<table class="table table-striped table-hover table-bordered table-condensed">
										<thead>
											<tr>
												<th>Activities &nbsp&nbsp&nbsp
													<a href="class-standing.php" class="btn btn-primary btn-xs "> View All</a>
												</th> 
												<th>Attendance &nbsp&nbsp&nbsp
													<a href="attendance.php" class="btn btn-primary btn-xs"> View All</a>
												</th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php include"/xampp/htdocs/ubhs-csms/html/footer.html"; ?>
			</div>				
		</div>
		<!-- END MAIN -->
	</div>
	<!-- END WRAPPER -->
</body>
</html>