<?php

error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");  // Look for errors and report errors - if there are any

$name = $_POST["name"];  // Declare variables - inputted from HTML form 
$email = $_POST["email"];
$tel = $_POST["tel"];
$msg = $_POST["msg"];


require("PHPMailer/src/PHPMailer.php"); // Call files required for the phpmailer code from our folder directory
require("PHPMailer/src/Exception.php");
require("PHPMailer/src/SMTP.php");
$mail = new PHPMailer\PHPMailer\PHPMailer(true);
$mail->isSMTP(); // Simple mail transfer protocol
$mail->SMTPDebug = 0; // 1 - 4 use 2 - most useful response - But if working fin, I recommend using 0 
$mail->SMTPAuth = true; // enable the SMTP authentication
$mail->Host = 'smtp.live.com'; // SMTP server and backup server  
$mail->Username = 'billy.farroll@hotmail.com';
$mail->Password = 'Spoons121';
$mail->SMTPSecure = 'tls'; // enable encryption - accepts TLS also  
$mail->Port = 587; // port to connect - SSL 465 TLS TLS 587 - likely port numbers - 25, 465 or 587
$mail->setFrom('billy.farroll@hotmail.com', 'Billy Farroll'); // This is where the email will come from 
$mail->addAddress('billy.farroll@hotmail.com','Billy Farroll'); // This is where the email will be sent to
$mail->addReplyTo("$email","$name"); 
$mail->isHTML(true);
$mail->Subject = 'Enquiry'; // Body content of the email BELOW
$mail->Body = "<center>
<h2>New Enquiry!</h2>
<hr/> 
<strong>Their Name:</strong> $name<br/>
<strong>Email Address:</strong> $email<br/>
<strong>Telephone No.</strong> $tel<br/>
<strong>Their Message:</strong> $msg
</center>"; 
if (!$mail->send()){ // Send the message 
	
	echo 'Message Failed';
	
	
	} else {
		
	
		header("Location: http://strawberryletting.co.uk/new_form/thank_you.html"); // Take me to Thank you page 
		
	}
	
		
?>



