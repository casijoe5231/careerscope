<?php
	include 'connection1.php';
session_start();
$mail=$_SESSION['admin'][0];

$name = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['name']);
$email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['email']);
$phone = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['phone']);
$discipline = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['discipline']);
$department = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['department']);
$email1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['email']);
$department = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['department']);
$pass = $_POST['pass'];

$sql1="insert into masteruser(email,password,name,mobile,role,discipline,institute,branch,date,status) values('$email','$pass','$name','$phone','Staff','$discipline','$_SESSION[institute]','$department','".date('d/m/Y')."',0)";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1)or die();

$sql2="insert into istaff(email,password,staff_name,is_admin,is_director,is_hod,is_principal,is_lecturer,is_mentor,is_tpo,is_subjteacher,is_testmgr,is_create_test,department,active_yn,created_date,modified_date,user_id,changepswd_status,estatus) values('$email','$pass','$name','0','0','0','0','1','0','0','0','0','0','$department','1','".date('d/m/Y')."','".date('d/m/Y')."','$mail',0,0)";
$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2)or die("query2 not executed");

$sql3="insert into areaofexpertise(id,email,expertise,status) values('','$email','none','3')";
$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3)or die("query3 not executed");

$sql4="insert into asubhod(s_name,email,contact,year) values('$name','$email','$phone','BE')";
$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4)or die("query4 not executed");

if(isset($_POST['Director']))
{
if(isset($_POST['director1']))
{
	$sql="update istaff set is_director='1' where email='$email'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query4 not executed");
}
}

if(isset($_POST['Principal']))
{
if(isset($_POST['principal1']))
{
	$sql="update istaff set is_principal='1' where email='$email'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query5 not executed");
}
}

if(isset($_POST['HOD']))
{
if(isset($_POST['hod1']))
{
	$sql="update istaff set is_hod='1' where email='$email'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query6 not executed");
}
}

if(isset($_POST['TPO']))
{
if(isset($_POST['tpo1']))
{
	$sql="update istaff set is_tpo='1' where email='$email'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query7 not executed");
}
}
echo 'hi staff';
if(isset($_POST['Mentor']))
{
if(isset($_POST['mentor1']))
{
	$sql="update istaff set is_mentor='1' where email='$email'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query8 not executed");
}
}


/*
if(isset($_POST['TestManager']))
{
if(isset($_POST['testmgr1']))
{
	$sql="update istaff set is_testmgr='1' where email='$email'";
	$res=mysql_query($sql)or die("query9 not executed");
}
}

if(isset($_POST['Lecturer']))
{
if(isset($_POST['lecturer1']))
{
	$sql="update istaff set is_lecturer='1' where email='$email'";
	$res=mysql_query($sql)or die("query10 not executed");
}
}*/

if(isset($_POST['SubjectTeacher']))
{
if(isset($_POST['subjteacher1']))
{
	$sql="update istaff set is_subjteacher='1' where email='$email'";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query11 not executed");
}
}


/*if($_POST['Director']==true)
{
if($_POST['director1']!='')
{
	$sql="update istaff set is_director='1' where email='$email'";
	$res=mysql_query($sql)or die("query not executed");
}
}

if($_POST['Principal']==true)
{
if($_POST['principal1']!='')
{
	$sql="update istaff set is_principal='1' where email='$email'";
	$res=mysql_query($sql)or die("query not executed");
}
}

if($_POST['HOD']==true)
{
if($_POST['hod1']!='')
{
	$sql="update istaff set is_hod='1' where email='$email'";
	$res=mysql_query($sql)or die("query not executed");
}
}

if($_POST['TPO']==true)
{
if($_POST['tpo1']!='')
{
	$sql="update istaff set is_tpo='1' where email='$email'";
	$res=mysql_query($sql)or die("query not executed");
}
}

if($_POST['Mentor']==true)
{
if($_POST['mentor1']!='')
{
	$sql="update istaff set is_mentor='1' where email='$email'";
	$res=mysql_query($sql)or die("query not executed");
}
}

if($_POST['Test Manager']==true)
{
if($_POST['testmgr1']!='')
{
	$sql="update istaff set is_testmgr='1' where email='$email'";
	$res=mysql_query($sql)or die("query not executed");
}
}

if($_POST['Lecturer']==true)
{
if($_POST['lecturer1']!='')
{
	$sql="update istaff set is_lecturer='1' where email='$email'";
	$res=mysql_query($sql)or die("query not executed");
}
}

if($_POST['Subject Teacher']==true)
{
if($_POST['subjteacher1']!='')
{
	$sql="update istaff set is_subjteacher='1' where email='$email'";
	$res=mysql_query($sql)or die("query not executed");
}
}*/
/*
function generatepw()
{
	$length = 9;
   $allowed = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%&*";
  $password='';
   for($i=0;$i<$length;$i++)
       $password .= substr($allowed,rand(0,strlen($allowed)-1),1);
   return $password;
}


$pswd=generatepw();
$_SESSION['pswd']=$pswd;

$sql="update masteruser set password='$_SESSION[pswd]' where email='$email'";
$res=mysql_query($sql)or die("query12 not executed");

$sql="update istaff set password='$_SESSION[pswd]' where email='$email'";
$res=mysql_query($sql)or die("query13 not executed");
*/
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


/*$To = $email; 
$Subject = 'Send Email'; 
$Message = 'Your password for the website is:'.$_SESSION['pswd'].'and your role is:'.if(isset($_POST['Director'])){echo $_POST['Director'];}.','.if(isset($_POST['Principal'])){echo $_POST['Principal'];}.','.if(isset($_POST['HOD'])){echo $_POST['HOD'];}.','.if(isset($_POST['TPO'])){echo $_POST['TPO'];}.','.if(isset($_POST['Lecturer'])){echo $_POST['Lecturer'];}.','.if(isset($_POST['TestManager'])){echo $_POST['TestManager'];}.','.if(isset($_POST['Mentor'])){echo $_POST['Mentor'];}.','.if(isset($_POST['SubjectTeacher'])){echo $_POST['SubjectTeacher'];}; 
$Headers = "From: priyankamalekar9@gmail.com \r\n" . 
"Reply-To: priyankamalekar9@gmail.com \r\n" . 
"Content-type: text/html; charset=UTF-8 \r\n"; 
  
mail($To, $Subject, $Message, $Headers); 
*/

	if($res)
	{
		echo "<html><head><script src='js/alertify.min.js'></script>
		<link rel='stylesheet' href='css/alertify.core.css' />
		<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('New staff added successfully', function (e) {
		window.location.href='adminindex.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='js/alertify.min.js'></script>
		<link rel='stylesheet' href='css/alertify.core.css' />
		<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured. Being redirected to form.', function (e) {
		window.location.href='adminindex.php';
		});</SCRIPT>";
	}

?>