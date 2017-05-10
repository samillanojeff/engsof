<?php include "/xampp/htdocs/ubhs-csms/util/session-set.php";
	$sidebar = $_SESSION["sidebar"];
	
	if (!isset($_SESSION["formtype"])){
		$_SESSION["formtype"] = "My Students";
	}else{
		if($_SESSION["formtype"] != "My Students"){
			unset ($_SESSION["filters"]);
			unset ($_SESSION["SelectedSection"]);
			unset ($_SESSION["SelectedSubject"]);
			$_SESSION["formtype"] = "My Students";
		}
	}
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
						<li><a href="<?php echo $sidebar[0]?>"><i class="lnr lnr-home"></i> <span>Home</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="active"><i class="<?php echo $sidebar[5];?>"></i> <span><?php echo $sidebar[4];?></span><i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapsed">
								<ul class="nav">
									<li><a href="#" class="active">My Students</a></li>
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
							<h3 class="panel-title">My Students</h3>
						</div>
					</div>
					<div class="panel">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-3">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-search"></i></span>
										<input type="text" class="form-control input-sm" placeholder="Student Name..." id="myInput" onkeyup="myFunction()"/>
									</div>
								</div>
								<form action="util/filters.php">
								<div class="col-md-6">
									<span class="panel-subtitle">Section:</span>
									<select name="Section" class="input-sm" onchange="this.form.submit();">
										<?php include "util/filter-section.php";?>
									</select>
								</div>
								</form>
							</div>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
									<table class="table table-striped table-hover table-bordered table-condensed">
										<thead>
											<tr style="background-color:maroon;color:#fff;">
												<th>Student Name</th>
												<th>Section</th>
												<th>Birth Date</th>
												<th>Contact Number</th>
												<th>Emergency Contact</th>
												<th>Address</th>
												<th>Email</th>
											</tr>
										</thead>
										<tbody id="myTable">
											<?php include "util/my-students.php"; ?>
										</tbody>
									</table>
								</div>
								<div class='col-md-12 text-center'>
									<ul class='pagination pagination-lg pager' id='myPager'></ul>
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