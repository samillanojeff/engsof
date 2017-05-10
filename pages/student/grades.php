<?php include "/xampp/htdocs/ubhs-csms/util/session-set.php";
	$sidebar = $_SESSION["sidebar"];
	$_SESSION["formtype"] = "Grades";
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
		<div class="sidebar">
			<div class="brand">
				<a href="<?php echo $sidebar[0]?>"><img src="/ubhs-csms/assets/img/ub-logo.png" class="img-responsive logo"></a>
			</div>
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><?php echo"<a href='".$sidebar[0]."' class=''><i class='lnr lnr-home'></i> <span>Home</span></a>"?></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="active"><i class="<?php echo $sidebar[5];?>"></i> <span><?php echo $sidebar[4];?></span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="active">
								<ul class="nav">
									<li><?php echo"<a href='".$sidebar[1]."' class=''>Class Standing</a>"?></li></li>
									<li><?php echo"<a href='".$sidebar[2]."' class=''>Attendance</a>"?></li>
									<li><a href="#" class='active'>Grades</a></li>
								</ul>
							</div>
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
							<h3 class="panel-title">Grades</h3>
							<span class="panel-subtitle">Section: AAA</span>
							<span class="panel-subtitle">&nbsp&nbsp&nbsp Schoolyear:</span>
							<select class="input-sm">
								<option>2016-2017 (Current)</option>
							</select>
						</div>
						
					</div>
					<div class="panel">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 text-right">
									<a href="../../reports/Report.php" class="btn btn-success btn-sm" target=_blank title="Generate Report"><i class="lnr lnr-printer"></i> &nbsp&nbsp Print</a>
								</div>
							</div>
							<br>
							<div class="table-responsive">
								<table class="table table-bordered table-hover">
										<thead>
											<tr style="background-color:maroon;color:#fff;">
												<th>Subject/Course</th>
												<th>First Grading</th>
												<th>Second Grading</th>
												<th>Third Grading</th>
												<th>Fourth Grading</th>
												<th>Final Grade</th>
											</tr>
										</thead>
										<tbody id="myTable">
											<?php include "util/grades.php";?>
										</tbody>
									</table>	
							</div>
						</div>	
					</div>
				</div>
			</div>
			<?php include"/xampp/htdocs/ubhs-csms/html/footer.html"; ?>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
	</div>
	<!-- END WRAPPER -->
</body>
</html>