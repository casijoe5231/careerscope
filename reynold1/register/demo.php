<?php
if($_POST['enroll']=='Yes')
{
if(isset($_POST['type']))
{
if(empty($_SESSION['6_letters_code'] ) ||
	  strcasecmp($_SESSION['6_letters_code'], $_POST['6_letters_code']) != 0)
{
	echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Please enter correct code!!', function (e) {
    window.location.href='./index.php';
});
	
    </SCRIPT>";
}
else
{
$name = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['name']);
$email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['email']);
$date = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['date']);
$gender = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['gender']);
$phone = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['phone']);
$country = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['country']);
$address = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['address']);
$nationality = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['nationality']);
$enroll = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['enroll']);
$year = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['year']);
$type = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['type']);
$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
$_SESSION['type']=mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['type']);
$_SESSION['email']=$email;

$sql1="insert into masteruser(email,password,name,enroll,year,gender,mobile,dob,country,address,nationality,candidaturetype) values('$_SESSION[email]','".md5($password)."','$name','$enroll','$year','$gender','$phone','$date','$country','$address','$nationality','$type')";
mysqli_query($GLOBALS["___mysqli_ston"], $sql1)or die("query not executed");
?>
<form action="register_user1.php" onsubmit="return validateAll()"  method="post" enctype="multipart/form-data">
			<fieldset  id="fieldset"style="border-radius:5px;" >
			<table cellpadding="12" border="0" width="auto">
				<legend>Additional Details:</legend>

<?php
	if($_SESSION['type']=="Staff")
	{
		?>
				<tr><td><label><span style='color:red;'>*</span><strong>Institute Name:</strong></label></td>
				<td><select name="institute1" id="input-institute1" temp="Please select the institute" onblur="validator(this)">
				<option value="Select">Select</option>
                <option value="Don Bosco Institute of Technology">Don Bosco Institute of Technology</option>
                </select>
				<label ><span id="institute1" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Staff id:</strong></label></td>
				<td><input  type="text" class="text2" name="sid" id="input-sid" autofocus temp="Please enter your staff id" onblur="validate(this);" />
				<label><span id="sid" style="color:#C00;"></span></label>
				</td></tr>
		
				<tr><td><label><span style='color:red;'>*</span><strong>Department:</strong></label></td>
				<td><select name="department" id="input-department" temp="Please select the department" onblur="validator1(this)">
                <option value="Select">Select</option>
				<option value="Engineering">Engineering</option>
                <option value="Pharmacy">Pharmacy</option>
                </select>
				<label ><span id="department" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Branch:</strong></label></td>
				<td><select name="branch1" id="input-branch1" temp="Please select the branch" onblur="validator2(this)">
                <option value="Select">Select</option>
				<option value="Computer">Computer</option>
                <option value="IT">IT</option>
                <option value="Mechanical">Mechanical</option>
                <option value="EXTC">EXTC</option>
                </select>
				<label ><span id="branch1" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Experience:</strong></label></td>
				<td><select name="experience1" id="input-experience1" temp="Please select experience" onblur="validator3(this)">
                <option value="Select">Select</option>
				<option value="less than 1yr">less than 1yr</option>
                <option value="1-2yrs">1-2yrs</option>
                <option value="2-3yrs">2-3yrs</option>
				<option value="3-4yrs">3-4yrs</option>
				<option value="4-5yrs">4-5yrs</option>
				<option value=">5yrs">>5yrs</option>
                </select>
				<label ><span id="experience1" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Type of experience:</strong></label></td>
				<td><select name="expertype1" id="input-expertype1" temp="Please select type of experience" onblur="validator4(this)">
                <option value="Select">Select</option>
				<option value="Full time">Full time</option>
                <option value="Part time">Part time</option>
                <option value="Internship">Internship</option>
                </select>
				<label ><span id="expertype1" style="color:#C00;"></span></label>
                </td></tr>
				
				
				
				<tr><td><label><span style='color:red;'>*</span><strong>Attachments:</strong></label><br>(submit institute ID for verification)</td>
				<td><input type="file" name="file" id="input-file" style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf,.doc,.docx format supported)
				<label><span id="file" style="color:#C00;"></span></label></td></tr>
				    
<?php	
	}
	if($_SESSION['type']=="Alumni")
	{
		?>
				<tr><td><label><span style='color:red;'>*</span><strong>Qualification:</strong></label></td>
				<td><select name="qualification1" id="input-qualification" temp="Please select qualification" onblur="validator5(this)">
                <option value="Select">Select</option>
				<option value="BE">BE/BTech</option>
                <option value="BPharma">BPharma</option>
				<option value="ME">ME/MTech</option>
				<option value="MPharma">MPharma</option>
				<option value="MS">MS</option>
                </select>
				<label ><span id="qualification1" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Institute Name:</strong></label></td>
				<td><select name="institute2" id="input-institute" temp="Please select the institute" onblur="validator(this)">
                <option value="Select">Select</option>
				<option value="Don Bosco Institute of Technology">Don Bosco Institute of Technology</option>
                </select>
				<label ><span id="institute2" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Experience:</strong></label></td>
				<td><select name="experience2" id="input-experience" temp="Please select experience" onblur="validator3(this)">
				<option value="Select">Select</option>
				<option value="Fresher">Fresher</option>
                <option value="less than 1yr">less than 1yr</option>
                <option value="1-2yrs">1-2yrs</option>
                <option value="2-3yrs">2-3yrs</option>
				<option value="3-4yrs">3-4yrs</option>
				<option value="4-5yrs">4-5yrs</option>
				<option value=">5yrs">>5yrs</option>
                </select>
				<label ><span id="experience2" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Type of experience:</strong></label></td>
				<td><select name="expertype2" id="input-expertype" temp="Please select type of experience" onblur="validator4(this)">
				<option value="Select">Select</option>
				<option value="None">None</option>
                <option value="Full time">Full time</option>
                <option value="Part time">Part time</option>
                <option value="Internship">Internship/Consultancy projects</option>
                </select>
				<label ><span id="expertype2" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Attachments:</strong></label><br>(submit ID for verification)</td>
				<td><input type="file" name="file" id="input-file" style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf,.doc,.docx format supported)
				<label><span id="file" style="color:#C00;"></span></label></td></tr>
				
<?php	
	}
	if($_SESSION['type']=="Student")
	{
		?>
				<tr><td><label><span style='color:red;'>*</span><strong>Institute Name:</strong></label></td>
				<td><select name="institute3" id="input-institute" temp="Please select the institute" onblur="validator(this)">
                <option value="Select">Select</option>
				<option value="Don Bosco Institute of Technology">Don Bosco Institute of Technology</option>
                </select>
				<label ><span id="institute3" style="color:#C00;"></span></label>
                </td></tr>
		
				<tr><td><label><span style='color:red;'>*</span><strong>Currently studying?</strong></label></td>
				<td><select name="qualification2" id="input-qualification" temp="Please select qualification" onblur="validator5(this)">
                <option value="Select">Select</option>
				<option value="BE">BE</option>
                <option value="BPharma">BPharma</option>
                </select>
				<label ><span id="qualification2" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Branch:</strong></label></td>
				<td><select name="branch2" id="input-branch" temp="Please select the branch" onblur="validator2(this)">
                <option value="Select">Select</option>
				<option value="Computer">Computer</option>
                <option value="IT">IT</option>
                <option value="Mechanical">Mechanical</option>
                <option value="EXTC">EXTC</option>
                </select>
				<label ><span id="branch2" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Year:</strong></label></td>
				<td><select name="year" id="input-year" temp="Please select the year" onblur="validator6(this)">
                <option value="Select">Select</option>
				<option value="First">First</option>
                <option value="Second">Second</option>
                <option value="Third">Third</option>
                <option value="Fourth">Fourth</option>
                </select>
				<label ><span id="year" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Experience:</strong></label></td>
				<td><select name="experience3" id="input-experience" temp="Please select experience" onblur="validator3(this)">
                <option value="Select">Select</option>
				<option value="Fresher">Fresher</option>
                <option value="0-4 months">0-4 months</option>
                <option value="4-8 months">4-8 months</option>
                <option value="8 months-1 year">8 months-1 year</option>
				<option value="1-1.5 yrs">1-1.5 yrs</option>
                </select>
				<label ><span id="experience3" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Type of experience:</strong></label></td>
				<td><select name="expertype3" id="input-expertype" temp="Please select type of experience" onblur="validator4(this)">
                <option value="Select">Select</option>
				<option value="Full time">Full time</option>
                <option value="Part time">Part time</option>
                <option value="Internship">Internship/Consultancy projects</option>
                <option value="None">None</option>
                </select>
				<label ><span id="expertype3" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Attachments:</strong></label><br>(submit institute ID for verification)</td>
				<td><input type='file' name='file' id='input-file' style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf format supported)
				<label><span id="file" style="color:#C00;"></span></label></td></tr>
				
<?php	
	}
	if($_SESSION['type']=="Recruiter")
	{
		?>
				<tr><td><label><span style='color:red;'>*</span><strong>Company name/Institute name:</strong></label></td>
				<td><input  type="text" class="text2" name="cname" id="input-cname" autofocus temp="Please enter company or institute name." onblur="validate1(this);" />
				<label><span id="cname" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Attachments:</strong></label><br>(submit ID for verification)</td>
				<td><input type='file' name='file' id='input-file' style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf format supported)
				<label><span id="file" style="color:#C00;"></span></label></td></tr>
				    
<?php	
	}
	if($_SESSION['type']=="Admin")
	{
		?>
				<tr><td><label><span style='color:red;'>*</span><strong>Institute Name:</strong></label></td>
				<td><select name="institute4" id="input-institute" temp="Please select the institute" onblur="validator(this)">
				<option value="Select">Select</option>
                <option value="Don Bosco Institute of Technology">Don Bosco Institute of Technology</option>
                </select>
				<label ><span id="institute4" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Attachments:</strong></label><br>(submit ID for verification)</td>
				<td><input type='file' name='file' id='input-file' style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf format supported)
				<label><span id="file" style="color:#C00;"></span></label></td></tr>
				    
<?php	
	}
	if($_SESSION['type']=="Other")
	{
		?>
				<tr><td><label><span style='color:red;'>*</span><strong>Institute name/Company name:</strong></label></td>
				<td><input  type="text" class="text2" name="inname" id="input-inname" autofocus temp="Please enter institute or company name." onblur="validate2(this);" />
				<label><span id="inname" style="color:#C00;"></span></label>
				</td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Attachments:</strong></label><br>(submit ID for verification)</td>
				<td><input type='file' name='file' id='input-file' style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf format supported)
				<label><span id="file" style="color:#C00;"></span></label></td></tr>
				    
<?php	
	}
	if($_SESSION['type']=="Guest")
	{
		?>
				<tr><td><label><span style='color:red;'>*</span><strong>Institute name/Company name/none:</strong></label></td>
				<td><input  type="text" class="text2" name="iname" id="input-iname" autofocus temp="Please enter institute or company name." onblur="validate3(this);" />
				<label><span id="iname" style="color:#C00;"></span></label>
				</td></tr>
		
				<tr><td><label><span style='color:red;'>*</span><strong>Professional Experience:</strong></label></td>
				<td><select name="experience4" id="input-experience" temp="Please select experience" onblur="validator3(this)">
				<option value="Select">Select</option>
				<option value="Fresher">Fresher</option>
                <option value="less than 1yr">less than 1yr</option>
                <option value="1-2yrs">1-2yrs</option>
                <option value="2-3yrs">2-3yrs</option>
				<option value="3-4yrs">3-4yrs</option>
				<option value="4-5yrs">4-5yrs</option>
				<option value=">5yrs">>5yrs</option>
                </select>
				<label ><span id="experience4" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Type of experience:</strong></label></td>
				<td><select name="expertype4" id="input-expertype" temp="Please select type of experience" onblur="validator4(this)">
				<option value="None">None</option>
                <option value="Full time">Full time</option>
                <option value="Part time">Part time</option>
                <option value="Internship">Internship/Consultancy projects</option>
                </select>
				<label ><span id="expertype4" style="color:#C00;"></span></label>
                </td></tr>
				
				<tr><td><label><span style='color:red;'>*</span><strong>Attachments:</strong></label><br>(submit ID for verification)</td>
				<td><input type='file' name='file' id='input-file' style='padding:2px;border:0px;width:auto;' temp="Please select a file." onblur="validFile(this)" /><br>(only .pdf format supported)
				<label><span id="file" style="color:#C00;"></span></label></td></tr>    
<?php	
	}
		
?>
	</table>   
			</fieldset>
			<p>Fields Marked with <span style='color:red'>*</span> are compulsory</p>

<br>

<input type="submit" alt="SUBMIT" value="Submit" class="button" align="center"/>

<br />
</form>
<br />
<?php
}
}
}
else
{
echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('You are able to login only if you enroll for careerscope', function (e) {
		window.location.href='./index.php';
		});</SCRIPT>";
}
?>


if($_SESSION['type']=='Guest')
	{
	$iname = mysql_real_escape_string($_POST['iname']);
	$experience4 = mysql_real_escape_string($_POST['experience4']);
	$expertype4 = mysql_real_escape_string($_POST['expertype4']);
	$email = mysql_real_escape_string($_SESSION['email']);
	
	$sql="insert into guest(email,institute,experience,experiencetype,enrollstatus,paymentstatus) values('$email','$iname','$experience4','$expertype4',0,0)";
	$res=mysql_query($sql)or die("query not executed");
	
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
		window.location.href='./index.php';
		});</SCRIPT>";
	}
	
	//email
	
	<?php
//define the receiver of the email
$to = 'youraddress@example.com';
//define the subject of the email
$subject = 'Test email with attachment';
//create a boundary string. It must be unique
//so we use the MD5 algorithm to generate a random hash
$random_hash = md5(date('r', time()));
//define the headers we want passed. Note that they are separated with \r\n
$headers = "From: webmaster@example.com\r\nReply-To: webmaster@example.com";
//add boundary string and mime type specification
$headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\"";
//read the atachment file contents into a string,
//encode it with MIME base64,
//and split it into smaller chunks
$attachment = chunk_split(base64_encode(file_get_contents('attachment.zip')));
//define the body of the message.
ob_start(); //Turn on output buffering
?>
--PHP-mixed-<?php echo $random_hash; ?> 
Content-Type: multipart/alternative; boundary="PHP-alt-<?php echo $random_hash; ?>"

--PHP-alt-<?php echo $random_hash; ?> 
Content-Type: text/plain; charset="iso-8859-1"
Content-Transfer-Encoding: 7bit

Hello World!!!
This is simple text email message.

--PHP-alt-<?php echo $random_hash; ?> 
Content-Type: text/html; charset="iso-8859-1"
Content-Transfer-Encoding: 7bit

<h2>Hello World!</h2>
<p>This is something with <b>HTML</b> formatting.</p>

--PHP-alt-<?php echo $random_hash; ?>--

--PHP-mixed-<?php echo $random_hash; ?> 
Content-Type: application/zip; name="attachment.zip" 
Content-Transfer-Encoding: base64 
Content-Disposition: attachment 

<?php echo $attachment; ?>
--PHP-mixed-<?php echo $random_hash; ?>--

<?php
//copy current buffer contents into $message variable and delete current output buffer
$message = ob_get_clean();
//send the email
$mail_sent = @mail( $to, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"
echo $mail_sent ? "Mail sent" : "Mail failed";
?>