<?php include "/xampp/htdocs/ubhs-csms/util/session-set.php";
	$sidebar = $_SESSION["sidebar"];
	if (!isset($_SESSION["formtype"])){
		$_SESSION["formtype"] = "Grades";
	}else{
		if($_SESSION["formtype"] != "Grades"){
			unset ($_SESSION["filters"]);
			unset ($_SESSION["SelectedSection"]);
			unset ($_SESSION["SelectedSubject"]);
			$_SESSION["formtype"] = "Grades";
		}
	}
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
									<li><?php echo"<a href='".$sidebar[6]."' class=''>My Students</a>"?></li>
									<li><?php echo"<a href='".$sidebar[1]."' class=''>Class Standing</a>"?></li>
									<li><?php echo"<a href='".$sidebar[2]."' class=''>Attendance</a>"?></li>
									<li><a href="#" class='active'>Grades</a></li>
								</ul>
							</div>
						</li>
						<li><a href="activity-types.php" class=""><i class="lnr lnr-pencil"></i> <span>Activity Types</span></a></li>
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
					<form action="util/filters.php">
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Grades</h3>
							<span class="panel-subtitle">Section:</span>
							<select name="Section" class="input-sm" onchange="this.form.submit();">
								<?php include "util/filter-section.php"; ?>
							</select>
							<span class="panel-subtitle">&nbsp&nbsp&nbsp Subject:</span>
							<select name="Subject" class="input-sm" onchange="this.form.submit();">
								<?php include "util/filter-subject.php"; ?>
							</select>
							<span class="panel-subtitle">&nbsp&nbsp&nbsp Schoolyear:</span>
							<select class="input-sm">
								<option>2016-2017</option>
							</select>
						</div>
					</div>
					<div class="panel">
						<div class="panel-body">
						<div class="row">
						<?php
						if (isset($_SESSION["SelectedSection"]) && isset($_SESSION["SelectedSubject"]) && $_SESSION["SelectedSubject"] != "-Choose-"){
					?>
							<div class="col-md-3">
								<span>Search</span>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-search"></i></span>
									<input type="text" class="form-control input-sm" placeholder="Student Name..." id="myInput" onkeyup="myFunction()"/>
								</div>
							</div>
							<!--
							<div class="col-md-2">
								<span>Grade Status:</span>
								<select name="GradeStatus" class="form-control input-sm" onchange="this.form.submit();">
									<?php #include "util/filter-gs.php"; ?>
								</select>
							</div>-->
								<span>&nbsp </span>
							<div class="col-md-9 text-right">
								<form action="util/edit-save-toggle.php" method="POST">
								<?php 
									if(isset($_SESSION["Edit"])){
										echo "
										<button type='submit' name='CancelEdit' class='btn btn-default'>
											<i class='fa fa-times'></i>
										</button>
										<button id='btnSave' type='submit' name='Save' class='btn btn-success'>
											<i class='fa fa-check'></i>
										</button>";
									}else{
										echo"
										<button type='submit' name='Edit' class='btn btn-warning'>
											<i class='fa fa-edit'></i>
										</button>
										<a href='../../reports/Report.php' class='btn btn-success' target=_blank><i class='lnr lnr-printer'></i></a>";
									}
								?>
							</div>
						</div>
						<?php } ?>
					<br/>
					<div class="row">
						<?php
							if(isset($_SESSION["message"])){
								echo $_SESSION["message"];
								unset($_SESSION["message"]);
							}
						?>
					</div>
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-condensed">
								<thead>
									<tr style="background-color:maroon;color:#fff;">
										<th>Student Name</th>
										<th>First Grading</th>
										<th>Second Grading</th>
										<th>Third Grading</th>
										<th>Fourth Grading</th>
										<th>Final Grade</th>
									</tr>
								</the 	ad>
								<tbody id="myTable">
									<?php include "util/grades.php";?>
								</tbody>
							</table>
						</div>
						<div class="col-md-12 text-center">
							<ul class="pagination pagination-lg pager" id="myPager"></ul>
						</div>
						</div>
					</div>			
				</div>
			</div>
			<!-- END MAIN CONTENT -->
			<?php include"/xampp/htdocs/ubhs-csms/html/footer.html"; ?>
		</div>
		<!-- END MAIN -->
	</div>
	<!-- END WRAPPER -->
</body>
</html>