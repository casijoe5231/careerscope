<?php

$username = $_POST['username'];

$db=($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost', 'root', '')) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
mysqli_select_db($db, maindb);

$sql = mysqli_query($db, "SELECT pEmail,pMiddleName FROM registration WHERE pUserName ='{$_POST['username']}'")or die(mysqli_error($GLOBALS["___mysqli_ston"])); 

while($row = mysqli_fetch_assoc($sql)){ 
	$pEmail = $row["pEmail"];
	$mn = $row["pMiddleName"];
	
	if(mysqli_num_rows($sql) > 0){
     	$password_code=md5(uniqid(rand()));
		
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
		$email=$pEmail; // Recipients email ID
		$name=$mn; // Recipient's name
		$mail->From = $webmaster_email;
		$mail->FromName = "ePortfolio Webmaster";
		$mail->AddAddress($email,$name);
		$mail->AddReplyTo($webmaster_email,"ePortfolio Webmaster");
		$mail->WordWrap = 50; // set word wrap
		$mail->IsHTML(true); // send as HTML
		$mail->Subject = "Registration Conformation";
		$mail->Body="Your New Password is $password_code \r\n";

		if(!$mail->Send()){
			?><script type="text/javascript">alert("Cannot send New Password to your e-mail address."); window.location="index.php";</script><?php
		}
		else{
			$sq=mysqli_query($db, "UPDATE registration SET pPassword='$password_code' WHERE pUserName='{$_POST['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
			?><script type="text/javascript">alert("Your New Password Has Been Sent To Your Email Address."); window.location="index.php";</script><?php
		}
    }
    else {
    ?><script type="text/javascript">alert("Not found your email in our database."); window.location="index.php";</script><?php
    }
     
}
?>