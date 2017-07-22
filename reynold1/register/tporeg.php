<?php
	include '../connection1.php';
session_start();
if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
{
	echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Please enter correct code!!', function (e) {
    window.location.href='../login.php';
});
	
    </SCRIPT>";
}
else
{
$name = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['name']);
$email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['email']);
$phone = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['phone']);
$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
$discipline4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['discipline4']);
$institute4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_SESSION['institute4']);

$sql="insert into masteruser(email,password,name,year,mobile,role,discipline,institute,status) values('$email','$password','$name','".date('Y')."','$phone','TPO','$discipline4','$institute4',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$allowedExts = array("pdf","doc","docx");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
{
	  mkdir("../uploads/$_POST[email]");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../uploads/$_POST[email]/" . $_FILES["file"]["name"]);
}

 /* // create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    //Create a new PHPMailer instance
    $mail = new PHPMailer();
    //Tell PHPMailer to use SMTP
    $mail->IsSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug  = 2;
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    //Set the hostname of the mail server
    $mail->Host       = "hostname";
    //Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Port       = 465;
    //Whether to use SMTP authentication
    $mail->SMTPAuth   = true;
    //Username to use for SMTP authentication
    $mail->Username   = "email";
    //Password to use for SMTP authentication
    $mail->Password   = "password";
    //Set who the message is to be sent from
    $mail->SetFrom($email_from);
    //Set an alternative reply-to address
    //$mail->AddReplyTo('replyto@example.com','First Last');
    //Set who the message is to be sent to
    $mail->AddAddress($email_from);
    //Set the subject line
    $mail->Subject = 'Request for Profile Check up';
    //Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
    $mail->MsgHTML($email_message);
    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';
    //Attach an image file
    $mail->AddAttachment($file);
    
    //Send the message, check for errors
    if(!$mail->Send()) {
      echo "<script>alert('Mailer Error: " . $mail->ErrorInfo."')</script>";
    } else {
      echo "<script>alert('Your request has been submitted. We will contact you soon.')</script>";
    }
*/

	if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('You have registered successfully.Please login', function (e) {
		window.location.href='../login.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured. Being redirected to form.', function (e) {
		window.location.href='tporegister.php';
		});</SCRIPT>";
	}

}
?>