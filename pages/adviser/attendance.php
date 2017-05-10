<?php include "/xampp/htdocs/ubhs-csms/util/session-set.php";
	$sidebar = $_SESSION["sidebar"];
	
	if (!isset($_SESSION["formtype"])){
		$_SESSION["formtype"] = "Attendance";
	}elseif($_SESSION["formtype"] != "Attendance"){
		unset ($_SESSION["SelectedMonth"]);
		unset ($_SESSION["filters"]);
		unset ($_SESSION["SelectedSection"]);
		unset ($_SESSION["SelectedSubject"]);
		$_SESSION["formtype"] = "Attendance";
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
									<li><a href="#" class='active'>Attendance</a></li>
									<li><?php echo"<a href='".$sidebar[3]."' class=''>Grades</a>"?></li>
								</ul>
							</div>
						</li>
						<li><a href="activity-types.php" class=""><i class="lnr lnr-pencil"></i> <span>Activity Types</span></a></li>
					</ul>
				</nav>
			</div>
			</div>
		<div class="main">
			<?php include("/xampp/htdocs/ubhs-csms/html/navbar.html"); ?>
			<div class="main-content">
				<div class="container-fluid">
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Attendance</h3>
							<form action="util/filters.php">
							<span class="panel-subtitle">Section:</span>
							<select name="Section" class="input-sm" onchange="this.form.submit();">
								<?php include "util/filter-section.php";?>
							</select>
							<span class="panel-subtitle">&nbsp&nbsp&nbsp Subject:</span>
							<select name="Subject" class="input-sm" onchange="this.form.submit();">
								<?php include "util/filter-subject.php";?>
							</select>
							<span class="panel-subtitle">&nbsp&nbsp&nbsp Schoolyear:</span>
							<select class="input-sm">
								<option>2016-2017 (Current)</option>
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
						<div class="col-md-2">
							<span>Month:</span>
							<select class="form-control" name="Month" onchange="this.form.submit();">
								<?php include "util/months.php"; ?>
							</select>
						</div>
							</form>
						<div class="col-md-7 text-right">
						<span>&nbsp </span>
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
										<button type='submit' name='Add' class='btn btn-primary'>
											<i class='fa fa-plus'></i>
										</button>
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
					<?php include "util/attendance.php";?>	
						</form>
					</div>
					</div>
				</div>
			</div>
			<?php include"/xampp/htdocs/ubhs-csms/html/footer.html"; ?>
		</div>
	</div>
</body>
</html>