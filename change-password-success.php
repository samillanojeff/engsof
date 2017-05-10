<?php include "util/session-set.php";
	unset($_SESSION["UserID"]);
?>
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
							<h2 class="name">Password Changed Successfully!</h2>
						</div>
						<a href="util/logout.php" style="text-decoration:none"><button class="btn btn-danger btn-lg btn-block">Login</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>