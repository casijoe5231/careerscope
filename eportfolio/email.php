<?php
$msg= $_POST ['comment'];

require("phpmailer/class.phpmailer.php");
		$mail = new PHPMailer();
		$mail->IsSMTP(); // send via SMTP
		$mail->SMTPDebug = 1;
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
		$mail->Username = "az8108305@gmail.com"; // SMTP username
		$mail->Password = "energydept"; // SMTP password
		$email=$_POST ['email']; // Recipients email ID
		$mail->FromName = $_POST ['name'];
		$mail->AddAddress($email);
		$mail->AddReplyTo($_POST ['name']);
		$mail->WordWrap = 50; // set word wrap
		$mail->IsHTML(true); // send as HTML
		$mail->Subject =$_POST ['subject'];
		$mail->Body=$msg;

		if(!$mail->Send()){
			?><script type="text/javascript">alert("Sorry for inconviniance. But feedback Could not be send ."); 
			window.location="feedback.php";</script><?php
		}
		else{
			?><script type="text/javascript">alert(" Thank you for your feeback."); 
			window.location="feedback.php";</script><?php
		}
?>