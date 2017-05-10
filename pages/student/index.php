<?php include "/xampp/htdocs/ubhs-csms/util/session-set.php";
	$sidebar = $_SESSION["sidebar"];

	$_SESSION["formtype"] = "Home";
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
									<li><?php echo"<a href='".$sidebar[1]."' class=''>Class Standing</a>"?></li>
									<li><?php echo"<a href='".$sidebar[2]."' class=''>Attendance</a>"?></li>
									<li><?php echo"<a href='".$sidebar[3]."' class=''>Grades</a>"?></li>
								</ul>
							</div>
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
							<h3 class="panel-title">Today's Records</h3>
							<p class="panel-subtitle"><?php date_default_timezone_set("Asia/Manila"); echo date("F j, Y");?></p>
						</div>
					</div>
					<div class="panel">
						<div class="panel-heading">
						<form action="util/filters.php" method="POST">
							<span class="panel-subtitle">ActivityType:</span>
							<select name="ActType" class="input-sm" onchange="this.form.submit();">
								<?php include "util/filter-activity-type.php"; ?>
							</select>	
							<span class="panel-subtitle">&nbsp&nbsp&nbsp Subject:</span>
							<select name="Subject" class="input-sm" onchange="this.form.submit();">
								<?php include "util/filter-subject.php"; ?>
							</select>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
							<a href="class-standing.php" class="btn btn-primary btn-sm"> Go to Class Standing</a>
							<a href="attendance.php" class="btn btn-primary btn-sm"> Go to Attendance</a>
						</div>
						</form>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-condensed table-hover table-striped table-bordered">
									<thead>
										<tr style="background-color:maroon;color:#fff;">
											<td>Date</td>
											<td>Activities</td>
											<td>/Items</td>
											<td>Score</td>
										</tr>
									</thead>
									<tbody>
										<?php 
											include "util/class-standing.php";
										?>
									</tbody>
								</table>
							</div>
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