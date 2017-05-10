<?php
require '../PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                     // Set mailer to use SMTP
$mail->SMTPDebug = 1;
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'jeffsamillano18@gmail.com';                 // SMTP username
$mail->Password = 'blizzard544';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to
#$mail->Port = 465; 

$mail->setFrom('jeffsamillano18@gmail.com', 'UBHS-CSMS Account Recovery');
$mail->addAddress($_POST["email"]);     // Add a recipient // Name is optional

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Account Recovery';

$pass = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890";
$randompass = substr(str_shuffle($pass),0,rand(8,16));
$mail->Body    = 'Your new password is '.$randompass;

if(!$mail->send()){
	$_SESSION["message"] = "<div class='alert alert-danger alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><i class='fa fa-times-circle'></i>&nbsp&nbsp Message could not be sent</div>";
} else {
	$sql = "UPDATE user SET Password='".$randompass."' WHERE UserID =".$_POST["idnum"];
	if($conn->query($sql) === TRUE){
		$_SESSION["message"] = "<div class='alert alert-success alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><i class='fa fa-check-circle'></i>&nbsp&nbsp Your new password has been sent to <span style='color:#000'>".$_POST["email"]."</span></div>";
	}
}
	header ("location: ../forgot-password.php");
?>