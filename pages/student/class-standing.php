<?php include "/xampp/htdocs/ubhs-csms/util/session-set.php";
	$sidebar = $_SESSION["sidebar"];
	
	if (!isset($_SESSION["formtype"])){
		$_SESSION["formtype"] = "Class Standing";
		unset($_SESSION["filters"]);
	}
?>
<!doctype html>
<html lang="en">
<head>
	<?php include"/xampp/htdocs/ubhs-csms/html/head.html"; ?>
</head>
<body>
	<?php include"/xampp/htdocs/ubhs-csms/html/logout-modal.html";?>
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
						<li><a href="<?php echo $sidebar[0]?>" class=""><i class="lnr lnr-home"></i> <span>Home</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="active"><i class="<?php echo $sidebar[5];?>"></i> <span><?php echo $sidebar[4];?></span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="active">
								<ul class="nav">
									<li><?php echo"<a href='".$sidebar[1]."' class='active'>Class Standing</a>"?></li>
									<li><?php echo"<a href='".$sidebar[2]."' class=''>Attendance</a>"?></li>
									<li><?php echo"<a href='".$sidebar[3]."' class=''>Grades</a>"?></li>
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
							<h3 class="panel-title">Class Standing</h3>
							<form action="util/filters.php" name="cs" method="POST">
							<span class="panel-subtitle">Subject:</span>
							<select class="input-sm" name="Subject" onchange="this.form.submit();">
								<?php include "util/filter-subject.php";?>
							</select>
							<span class="panel-subtitle">&nbsp&nbsp&nbsp Grading Period:</span>
							<select class="input-sm" name="GradingPeriod" onchange="this.form.submit();">
								<?php include "util/filter-gp.php";?>
							</select>
							<span class="panel-subtitle">&nbsp&nbsp&nbsp Schoolyear:</span>
							<select class="input-sm">
								<option>2016-2017 (Current)</option>
							</select>
						</div>
					</div>
					<div class="panel">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-2">
									<span>Show Records From:</span>
									<input class="form-control input-sm" type="date" name="StartDate" 
										value="<?php if (isset($_SESSION["StartDate"])){echo $_SESSION["StartDate"];}else{echo "2016-08-01";}?>" onchange="this.form.submit();">
								</div>
							<div class="col-md-2">
								<span>To:</span>
								<input class="form-control input-sm" type="date" name="EndDate" 
								value="<?php if (isset($_SESSION["EndDate"])){echo $_SESSION["EndDate"];}else{echo date("Y-m-d");}?>" onchange="this.form.submit();" />
							</div>
							<div class="col-md-2">
								<span>Activity Type:</span>
								<select class="form-control input-sm" name="ActType" onchange="this.form.submit();">
									<?php include "util/filter-activity-type.php";?>
								</select>
							</div>
							</form>
								<div class=" col-md-6 text-right">
								<a href="../../reports/Report.php" class="btn btn-success btn-sm" target=_blank title="Generate Report"><i class="lnr lnr-printer"></i> &nbsp&nbsp Print</a>
							</div>
							</div>
						</div>
						<div class="panel-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr style="background-color:maroon;color:#fff;">
										<th>Date</th>
										<th>Activity</th>
										<th>Score</th>
										<th>/Items</th>
									</tr>
								</thead>
								<tbody id="myTable">
									<?php include "util/class-standing.php";?>
								<tbody>
							</table>
						</div>
						<div class="col-md-12 text-center">
							<ul class="pagination pagination-lg pager" id="myPager"></ul>
						</div>
					</div>		
				</div>
			</div>
		</div>
			<?php include"/xampp/htdocs/ubhs-csms/html/footer.html"; ?>
		</div>
	</div>
	</body>
</html>