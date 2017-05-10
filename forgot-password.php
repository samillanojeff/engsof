<?php session_start(); 
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
							<h2 class="name">Account Recovery</h2>
						</div>
						<?php
							if (isset($_SESSION["message"])){
								echo $_SESSION["message"];
								unset($_SESSION["message"]);
							}
						?>
						<form class="form-auth-small" action="util/check-forgot-password.php" method="POST">
							<div class="input-group">  
								<span class="input-group-addon"><i class="fa fa-user"></i></span>
								<input name="idnum" class="form-control" placeholder="ID Number" type="text" required/>
							</div>
							<br/>
							<div class="input-group">  
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<input name="email" class="form-control" placeholder="Email" type="text" required/>
							</div>
							<div class="demo-button">
								<button type="submit" class="btn btn-danger btn-lg btn-block">Submit</button>
							</div>
							<div class="bottom">
								<span><i class="fa fa-key"></i> <a href="login.php">Login</a></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>
