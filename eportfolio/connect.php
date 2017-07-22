<?php
if($_POST['Next']== "Next"){
$db=($GLOBALS["___mysqli_ston"] = mysqli_connect('localhost', 'root', 'dbitsdt')) or die(mysqli_error($GLOBALS["___mysqli_ston"]));
mysqli_select_db($db, maindb);
session_start();

$_SESSION['fname']=$_POST['FirstName'];
$_SESSION['mname']=$_POST['MiddleName'];
$_SESSION['lname']=$_POST['LastName'];
$_SESSION['Address1']=$_POST['permAddress1'];
$_SESSION['mbnumber']=$_POST['mobilenumber'];
$_SESSION['PermCity']=$_POST['permCity'];
$_SESSION['PermState']=$_POST['permState'];
$_SESSION['PermZipCode']=$_POST['permZipCode'];
$_SESSION['ppEmail']=$_POST['pEmail'];
$_SESSION['insitutionID']=$_POST['InstitutionID'];
$_SESSION['roleID']=$_POST['RoleID'];

?>


<html>

<head>

<title>Registration of an Account</title>
<link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css">
<link href="Image/icon1.ico" rel="shortcut icon"/>

<script type="text/javascript">
  //function to create ajax object
  
function GetXmlHttpObject()
{ 
	var objXMLHttp=null
	if (window.XMLHttpRequest)
	{
		objXMLHttp=new XMLHttpRequest()
	}
	else if (window.ActiveXObject)
	{
		objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
	}
	return objXMLHttp
}

function validate1()
{
	function stateChanged1() 
	{	
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			document.getElementById("msg").innerHTML=xmlHttp.responseText;
			//document.write(xmlHttp.responseText);   
		}
	}

	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{	
		alert ("Browser does not support HTTP Request");
		return
	}

	var user = document.getElementById('uname').value;
	var url="validate.php?username="+user;
	xmlHttp.onreadystatechange = stateChanged1;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	
}


 
</script>
<script type="text/javascript" src="validation/validator.js"></script>

<style>#uname{border: 1px solid #000;}</style>

</head>

<body>
<table border="1" align="center">

<tr><td>
<table border="0" align="center">
	
    <tr><td colspan="2"><?php include("header.php"); ?></td></tr>
    <tr><td colspan="2"><?php include("menu.php"); ?></td></tr>
	<tr>
    	
        
        <td><div class= "account">
        <form name="create" method="post" action="connect2.php" onSubmit="return validateFormOnSubmit1();">
				<fieldset>
					<legend><b>Account Information</b></legend>
	
                	<table align="left" border="0" cellspacing="4" cellpadding="4" width="620" class="register">
          			
       <tr> 
       <td><label>User Name:<i>*</i></label></td>
       <td><input type="text" id="uname" name="uname" value="" onChange="validate1()" />
     </tr>
     <tr><td id="msg" colspan="2" align="right" style="color:#FF0000"> </td></tr>
     <tr> 
       <td><label>Password:<i>*</i></label></td>
       <td><input name="Password" type="password" id="Password" value=""></td>
     </tr>

     <tr> 
       <td><label>Verify Password:<i>*</i></label></td>
       <td><input name="VerifyPassword" type="password" id="VerifyPassword"  /></td>
     </tr>
	 
	 <tr><td>&nbsp;</td></tr>
	 
	 <tr>
		<td valign="top" colspan="2">
			<label for="newaccountcaptcha" class="capcha">
				<b>Word Verification:</b> Type 3 black characters you see in the picture below.
			</label>
		</td>
		
	 </tr>
	 <tr>
	    <td colspan="2"><b>CAPTCHA:</b> <i>(antispam code, 3 black symbols)</i></td>
	 </tr>
	 <tr>
		<td colspan="2"><img src="captcha.php" alt="captcha image" name="captcha" />&nbsp;&nbsp;&nbsp;
        <input type="text" name="captcha" size="5" maxlength="3">
       </td>
	 </tr>
	 
	 <tr><td>&nbsp;</td></tr>
	 
	 <tr>
		<td colspan="2"><b>Terms and Conditions:</b></td>
	 </tr>
	 
	 <tr><td colspan="2">
		To read Terms and Conditions <a href="terms_and_conditions.php" target="_blank">Click Here</a>
     </td></tr>
     
	 <tr>
		<td colspan="2"> <font size="-1">By clicking on 'I accept' below you are agreeing
		to the Terms &amp; Conditions above and the Privacy Policy.
        </font></td>
	 </tr>

	<tr>
		<th>&nbsp;</th>
	 </tr>  
	 

	 <tr>
		<th align="center" colspan="2"><input name="Submit" type="submit" value="I agree,Create my account"></th>
	 </tr>
                    
     				</table>
                </fieldset>
        </form></div></td>
		
        <td><?php include("rightmenu.php"); ?></td>
	</tr>
    <tr>  <td colspan="2"><?php include("footer.php"); ?></td></tr>
</table>

</td></tr>
</table>

</body>
</html>
<?php

}
else{
?><html>
		<head>
	<script type="text/javascript">
	
			window.location="register.php";
			</script></head>
		</html>
			<?php
}
?>