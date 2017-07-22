<?php
if($_POST['signin']=="SIGN IN"){
if(!session_id())
 {
$db=($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost', 'root', '')) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
mysqli_select_db($GLOBALS["___mysqli_ston"], maindb);


$_POST['login']=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], strip_tags(trim($_POST['username'])));
$_POST['pass']=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], strip_tags(trim($_POST['password'])));

$q=mysqli_query($db, "SELECT active FROM registration WHERE pUserName='{$_POST['login']}' AND pPassword='{$_POST['pass']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$q1=mysqli_query($db, "SELECT * FROM admin WHERE username='{$_POST['login']}' AND password='{$_POST['pass']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

while($row = mysqli_fetch_array($q)){ 
    $active = $row["active"];

/*If there is a matching row*/
if(mysqli_num_rows($q) > 0 && $active=="1")
{   session_start();
	$_SESSION['login'] = $_POST['login'];
	$login='Welcome back '.$_SESSION['login'];

			$result = mysqli_query($db, "SELECT pRoleId, pUserName FROM registration WHERE pUserName='{$_POST['login']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		
			$result1= mysqli_fetch_assoc($result);
			$pRoleId =	$result1['pRoleId'];
			$username =	$result1['pUserName'];
			if($pRoleId =="Student"){
			
				$date=date("y-m-d");
				$sq=mysqli_query($db, "UPDATE registration SET date='$date' WHERE pUserName='{$_POST['login']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
				$sq2 = mysqli_query($db, "SELECT reminder_name, reminder_date FROM reminder_events WHERE username='{$_POST['login']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
			
				$sq3 = mysqli_query($db, "SELECT date FROM registration WHERE pUserName='{$_POST['login']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
				while($row = mysqli_fetch_array($sq3)){
					$date1= $row["date"];
				}
			
				while($row = mysqli_fetch_array($sq2)){ 
		  			$reminder_date = $row["reminder_date"];
          			$reminder_name = $row["reminder_name"];
		  			for($i=0; $i <= count($row);$i++){
					if(mysqli_num_rows($sq2) > 0  && $reminder_date == $date1){ 
							?><script type="text/javascript">alert('<?php echo $reminder_name; ?>');window.location="reminder_list.php";</script> <?php }
					} 
					 
				}
?>
		<script type="text/javascript">
				window.location="studenthome.php";
		</script>
<?php
		$_SESSION['username'] = $username;
		$_SESSION['pRoleId'] = $pRoleId;
				
}
else{ 	$_SESSION['username'] = $username; 
		$_SESSION['pRoleId'] = $pRoleId;
		
		$date=date("y-m-d");
				$sq=mysqli_query($db, "UPDATE registration SET date='$date' WHERE pUserName='{$_POST['login']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
				$sq2 = mysqli_query($db, "SELECT reminder_name, reminder_date FROM reminder_events WHERE username='{$_POST['login']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
			
				$sq3 = mysqli_query($db, "SELECT date FROM registration WHERE pUserName='{$_POST['login']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
				while($row = mysqli_fetch_array($sq3)){
					$date1= $row["date"];
				}
			
				while($row = mysqli_fetch_array($sq2)){ 
		  			$reminder_date = $row["reminder_date"];
          			$reminder_name = $row["reminder_name"];
		  			for($i=0; $i <= count($row);$i++){
					if(mysqli_num_rows($sq2) > 0  && $reminder_date == $date1){ 
							?><script type="text/javascript">alert('<?php echo $reminder_name; ?>');window.location="ireminder_list.php";</script> <?php }
					} 
					 
				}
		
		?>
			<script type="text/javascript">
				window.location="investorhome.php";
			</script>
		<?php 
	}
} else if(mysqli_num_rows($q) > 0 && $active=="0"){
?>
		<script type="text/javascript">
				alert("Your Account is been Deactivated. Please Contact Administrator.");
				window.location="index.php";
		</script>
<?php
 }
 
}

if(mysqli_num_rows($q1) > 0)
{
	session_start();
	$_SESSION['login'] = $_POST['login'];
	$login='Welcome back '.$_SESSION['login'];
?>
<script type="text/javascript">
		window.location="admin.php";
</script>
<?php

}
else{
	?><html>
		<head>
	<script type="text/javascript">
			alert("Login Failed");
			window.location="index.php";
			</script></head>
		</html>
			<?php 
}

((is_null($___mysqli_res = mysqli_close($db))) ? false : $___mysqli_res);

}
}
else {

$db=($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost', 'root', '')) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
mysqli_select_db($GLOBALS["___mysqli_ston"], maindb);

	$un = $_POST['username'];
	$pe = $_POST['email']; 
	$RoleID= $_POST['RoleID'];  	
	
	$q1=mysqli_query($GLOBALS["___mysqli_ston"], "insert into registration ( pEmail, pUserName,pInstitutionId,pRoleId,active) values('$pe','$un','Guest','$RoleID','1')")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
	$q2 = "SELECT * FROM registration WHERE pUserName = '$un'"; 
	$result=mysqli_query($GLOBALS["___mysqli_ston"], $q2);
		
    if($result){
	   $password_code=md5(uniqid(rand()));
       require("phpmailer/class.phpmailer.php");
		$mail = new PHPMailer();
		$mail->IsSMTP(); // send via SMTP
		$mail->SMTPDebug = 1;
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
		$mail->Username = "saniya179@gmail.com"; // SMTP username
		$mail->Password = "mansitrivedi"; // SMTP password
		$webmaster_email = "saniya179@gmail.com"; //Reply to this email ID
		$email=$pe; // Recipients email ID
		$mail->From = $webmaster_email;
		$mail->FromName = "Webmaster";
		$mail->AddAddress($email);
		$mail->AddReplyTo($webmaster_email,"Webmaster");
		$mail->WordWrap = 50; // set word wrap
		$mail->IsHTML(true); // send as HTML
		$mail->Subject = "Password";
		$mail->Body="Your Password is $password_code \r\n";

		if(!$mail->Send()){
			?><script type="text/javascript">alert("Cannot send Password to your e-mail address."); window.location="index.php";</script><?php
					$q1=mysqli_query($db, "delete from registration WHERE pUserName='$un'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));	
		}
		else{
			$sq=mysqli_query($db, "UPDATE registration SET pPassword='$password_code' WHERE pUserName='{$_POST['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
			$path = dirname( __FILE__ );
			$slash = '/'; strpos( $path, $slash ) ? '' : $slash = '\\';
			define( 'BASE_DIR', $path . $slash );
			$dirPath = BASE_DIR."\\".Upload."\\".$un; // folder path
			echo '<hr>';
			$rs = @mkdir( $dirPath, '0777' );
			?><script type="text/javascript">alert("Your Password Has Been Sent To Your Email Address."); window.location="index.php";</script><?php
		}
    }
    else {
    ?><script type="text/javascript">alert("Not found your email in our database."); window.location="index.php";</script><?php
    }
}
?>