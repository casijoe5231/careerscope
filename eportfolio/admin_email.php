<?php 

include("database.php");
require("phpmailer/class.phpmailer.php");

		$mail = new PHPMailer();
		$mail->IsSMTP(); // send via SMTP
		$mail->SMTPDebug = 1;
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
		$mail->Username = "eportfoliomanagement1@gmail.com"; // SMTP username
		$mail->Password = "eportfolio"; // SMTP password
		$webmaster_email = "eportfoliomanagement1@gmail.com"; //Reply to this email ID
		
		$sql = "SELECT email FROM subcription" ;
		$result = mysqli_query($GLOBALS["___mysqli_ston"], $sql); 
		
		while ($row = mysqli_fetch_array($result)) {
		
				$mail->From = $webmaster_email;
				$mail->FromName = "ePortfolio Webmaster";
				$mail->AddAddress($row['email']);
				$mail->AddReplyTo($webmaster_email,"ePortfolio Webmaster");
				$mail->WordWrap = 50; // set word wrap
				$mail->IsHTML(true); // send as HTML
				$mail->Subject =$_POST ['subject'];
				$mail->Body=$_POST['elm4'];
		}
		if(!$mail->Send()){
			?><script type="text/javascript">
				alert("Cannot send e-Mail to specified e-mail address."); 
				window.location="ad_email.php";
			  </script><?php
		}
		else{
			?><script type="text/javascript">
				alert(" Your e-Mail to specified address has been Sent."); 
				window.location="ad_email.php";
			</script><?php
		}
	
		
?>