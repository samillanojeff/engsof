<?php include "/xampp/htdocs/ubhs-csms/util/session-set.php";
	$sidebar = $_SESSION["sidebar"];
	$_SESSION["formtype"] = "Attendance";
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
						<li><a href="<?php echo $sidebar[0]?>" class=""><i class="lnr lnr-home"></i> <span>Home</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="active"><i class="<?php echo $sidebar[5];?>"></i> <span><?php echo $sidebar[4];?></span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="active">
								<ul class="nav">
									<li><?php echo"<a href='".$sidebar[1]."' class=''>Class Standing</a>"?></li>
									<li><?php echo"<a href='".$sidebar[2]."' class='active'>Attendance</a>"?></li>
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
					<form action="util/filters.php" method="POST"> 
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Attendance</h3>
							<span class="panel-subtitle">Grading Period:</span>
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
								<div class="col-md-8 text-right">
									<a href="../../reports/Report.php" class="btn btn-success btn-sm" target=_blank title="Generate Report"><i class="lnr lnr-printer"></i> &nbsp&nbsp Print</a>
								</div>						
							</div>
						</div>
					</form>
						<div class="panel-body">
						<div class="table-responsive">
							<table class="table">
								<thead style="background-color:maroon;color:#fff;">
									<th>Date</th>
									<th>AP</th>
									<th>Comp. Ed.</th>
									<th>English</th>
									<th>Filipino</th>
									<th>MAPEH</th>
									<th>Math</th> 
									<th>Science</th>
									<th>TLE</th>
								</thead>
								<tbody id="myTable">
									<?php include "util/attendance.php";?>
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
	</body>
</html>