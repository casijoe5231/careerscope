<?php

if($_POST['Submit']== "I agree,Create my account"){
session_start();

$db=($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost', 'root', 'dbitsdt')) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
mysqli_select_db($db, maindb);

$fn = $_SESSION['fname'];
$mn = $_SESSION['mname'];
$ln = $_SESSION['lname'];
$add = $_SESSION['Address1'];
$mb = $_SESSION['mbnumber'];
$pc = $_SESSION['PermCity'];
$ps = $_SESSION['PermState'];
$pzc = $_SESSION['PermZipCode'];
$pe = $_SESSION['ppEmail'];
$iID = $_SESSION['insitutionID'];
$rID = $_SESSION['roleID'];
$un = $_POST['uname'];
$pw = $_POST['Password'];  


$query = "Select pUserName from registration where pUserName = '$user' ";
$row = mysqli_fetch_assoc(mysqli_query($GLOBALS["___mysqli_ston"], $query)); 


if($_SESSION["captcha"]==$_POST["captcha"]&& $row['pUserName']!=$un)
{
	$confirm_code=md5(uniqid(rand())); // Random confirmation code
		$q1=mysqli_query($GLOBALS["___mysqli_ston"], "insert into registration (pFirstName ,pMiddleName, pLastName ,ppermAddress1 ,pMobilenumber ,ppermCity ,ppermState ,ppermZipCode ,pEmail, 	pInstitutionId ,pRoleId ,pUserName, pPassword, code) values('$fn','$mn','$ln','$add','$mb','$pc','$ps','$pzc','$pe','$iID','$rID','$un','$pw','$confirm_code')")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		$q2 = "SELECT * FROM registration WHERE pUserName = '$un'"; 
		$result=mysqli_query($GLOBALS["___mysqli_ston"], $q2);
		$active=1;

    /*if($result){

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
		$email=$pe; // Recipients email ID
		$name=$mn; // Recipient's name
		$mail->From = $webmaster_email;
		$mail->FromName = "ePortfolio Webmaster";
		$mail->AddAddress($email,$name);
		$mail->AddReplyTo($webmaster_email,"ePortfolio Webmaster");
		$mail->WordWrap = 50; // set word wrap
		$mail->IsHTML(true); // send as HTML
		$mail->Subject = "e-PORTFOIO email address verification";
		$mail->Body="<b>Thank you for using e-Portfolio. </b><br/><br/>
		To complete the registration process, you need to confirm your email address ($email) by clicking the link below:<br/>
		Your Comfirmation link is <br/><br/><a href='http://localhost/eportfolio/index.php?passkey=$confirm_code&active=$active'>
		http://localhost/eportfolio/index.php?passkey=$confirm_code&active=$active</a><br/><br/>
		If you did not register for e-Portfolio, then someone probably mis-typed their email address. 
		You can ignore this message, and we apologize for the inconvenience.<br/><br/>
		If you have any problems verifying your email address, please email eportfoliomanagement1@gmail.com.
        <br/><br/>
		<b><i>The e-PORTFOLIO Team</b></i>";

		if(!$mail->Send()){
			echo "Cannot send Confirmation link to your e-mail address" . $mail->ErrorInfo;
			$q2 = mysql_query("Delete FROM registration WHERE pUserName = '$un'")or die(mysql_error());
		
			
		}
		else{?>
			<script type="text/javascript">
			alert("Your Confirmation link Has Been Sent To Your Email Address. For First Time Login Click on link that has been mailed to your specified email. ");
			window.location="index.php"; 
		</script>
		<?Php
			$path = dirname( __FILE__ );
			$slash = '/'; strpos( $path, $slash ) ? '' : $slash = '\\';
			define( 'BASE_DIR', $path . $slash );
			$dirPath = BASE_DIR."\\".Upload."\\".$un; // folder path
			echo '<hr>';
			$rs = @mkdir( $dirPath, '0777' );
			@handleError();
		}
    }
    else { echo "Not found your email in our database<br/>"; $q2 = mysql_query("Delete FROM registration WHERE pUserName = '$un'")or die(mysql_error());}
     
function handleError() {
trigger_error('MY ERROR');
}*/
?>
<script>
window.location="index.php";
</script>
<?php
}							
else{
?>
<script type="text/javascript">
	alert("Captcha Invalid or Username is invalid");
	window.location="register.php";
</script>

<?Php
}		
?>
<?php

}
else{
?>
<script type="text/javascript">
		window.location="register.php";
</script>
<?php
}
?>