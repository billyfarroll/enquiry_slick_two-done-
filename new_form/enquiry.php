<?php
$blockwords="http,href,www";
if(!empty($_SERVER['REMOTE_ADDR'])&&!empty($_POST)){$_POST['REMOTE_ADDR']=$_SERVER['REMOTE_ADDR'];}if(!empty($blockwords)&&!empty($_POST)){$useBlocks=explode(",",$blockwords);foreach($useBlocks as $blockWord){foreach($_POST as $Name=>$Value){$Value=trim($Value);$Value=strtolower($Value);if(!empty($Value)&&strpos($Value,$blockWord)!==false){exit();}}}}
?>
<?php
$email_to = "billy@strawberrymarketing.com, billy.farroll@hotmail.com";
$name = $_POST["name"];
$email = $_POST["email"];
$tel = $_POST["tel"];
$msg = $_POST["msg"];

$email_from = "billy@strawberrymarketing.com"; // This email address has to be the same email on the server if using Fasthots server i.e. SlickFin server - billy@SlickFin.com you can't put the $email variable entered by user because its not authorised to send it.
$message = $_POST["message"];
$email_subject = "TEST";
$headers =   // Header for the email sent to whatever email address in entered in the email to variable. 
"From: $email .\n";   // Although the email is still being sent by one that's authorised by the server, we've changed in the email header display what email address to show in the message sent
"Reply-To: $email .\n"; // Put the $email variable in here, allows the user to reply straight to them
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";  // To have an unique HTML design for the amil, you need these two header variables stated because it allows HTML code to be used in the message variable 

$message = '<html><body>';
$message .= "<h1 style='color: #0d1237;'>Enquiry</h1>";
$message .= "<h2 style='color: #0d1237; font-size: 22px;'> Name: " . $name . "</h1>";
$message .= "<p style='font-weight: bold;'> Email Address: " . $email . "</p>";
$message .= "<p style='font-weight: bold;'> Telephone Number: " . $tel . "</p>"; 
$message .= "<p style='font-weight: bold;'> Message: " . $msg ."</p>";
$message .= "</body></html>";

ini_set("sendmail_from", $email_from);
$sent = mail($email_to, $email_subject, $message, $headers, "-f" .$email_from);
if ($sent)
{
header("Location: http://www.strawberryproofing.co.uk/new_form/thank_you.html");
} else {
echo "There has been an error sending your query. Please try later.";
}
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}
function show_error($myError)
{
?>

<?php
exit();
}
?>
