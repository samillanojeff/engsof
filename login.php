<?php
	session_start();
	if(isset($_SESSION["PreviousPage"])){
		if (!isset($_SESSION["log-out"])){
			header ("location: localhost".$_SESSION["PreviousPage"]);
		}
	}
?>
<!doctype html>
<html lang="en" class="fullscreen-bg">
<head>
	<?php include"/xampp/htdocs/ubhs-csms/html/head.html";?>
</head>
<body>
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box">
					<div class="left">
						<div class="content">
							<div class="logo text-center"><img src="assets/img/ub-logo.png" alt="UB Logo"></div>
							<?php 
								if (isset($_SESSION["message"])){
									echo $_SESSION["message"];
									unset ($_SESSION["message"]);
								}
							?>
							<form class="form-auth-small" action="util/login.php" method="POST">
								<div class="input-group">  
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input name="idnum" class="form-control" placeholder="ID Number" type="text" title="ID Number" required/>
								</div>
								<br/>
								<div class="input-group">  
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input name="password" class="form-control" placeholder="Password" type="password" title="Password" required/>
								</div>
								<button type="submit" class="btn btn-danger btn-lg btn-block">Login</button>
								<div class="bottom">
									<span><i class="fa fa-lock"></i> <a href="forgot-password.php">Forgot password?</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="content text" style="background-color:rgba(132,132,132,0.9);">
							<h1 class="heading">University of Baguio High School - Class Standing Monitoring System</h1>
							<p><b><font color="maroon">UBHS-CSMS</font><b></p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>