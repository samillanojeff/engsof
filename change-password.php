<?php
	include "/xampp/htdocs/ubhs-csms/util/session-set.php";
?>
<!doctype html>
<html lang="en">
<head>
	<?php include"/xampp/htdocs/ubhs-csms/html/head.html";?>
	<script src="assets/js/password.js"></script>
</head>
<body>
<!doctype html>
<html lang="en" class="fullscreen-bg">

<?php include"/xampp/htdocs/ubhs-csms/html/head.html";?>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box lockscreen clearfix">
					<div class="content">
						<div class="user text-center">
							<div class="logo text-center"><img src="assets/img/ub-logo.png" alt="UB Logo"></div>
							<h2 class="name">Change Password</h2>
						</div>
						<?php
								if (isset($_SESSION["message"])){
									echo $_SESSION["message"];
									unset ($_SESSION["message"]);
								}
							?>
						<form class="form-auth-small" action="util/change-password.php" method="POST">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key"></i></span>
									<input type="password" class="form-control" name="currentpass" id="currentpass" placeholder="Current Password" size="30" onchange="CheckCurrentPass()" required/>
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input class="form-control" type="password" name="NewPass" id="NewPass" placeholder="New Password" onkeyup="CheckPasswordStrength(this.value)" required/>
									<span class="input-group-addon" id="password_strength"></span>
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-repeat"></i></span>
									<input class="form-control" type="password" name="ConfirmPass" id="ConfirmPass" onkeyup="CheckPass();" placeholder="Re-enter Password" required/>
									<span id="confirmMessage" class="confirmMessage input-group-addon"></span>
								</div>
								<center>
									<button type="submit" class="btn btn-danger btn-lg btn-block">Save</button>
								</center>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
<script src="assets/js/password.js"></script>
</html>