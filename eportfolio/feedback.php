<?php
session_start();
?>
<html>

<head>

<title>Send Feedback</title>
<link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css">
<link href="Image/icon1.ico" rel="shortcut icon"/>
<link rel="stylesheet" href="SpryAssets/footer_content.css" type="text/css">
</head>

<body>
<table border="1" align="center">
	<tr><td>
		<table border="0" align="center">

            <tr><td colspan="3"><?php include("header.php"); ?></td></tr>
			<tr><td colspan="3"><?php include("menu.php"); ?></td></tr>
            <tr>
            	<td colspan="2">
				
				<fieldset style="width:600">
        				<legend><b>Company Web Site Feedback</b></legend>
        				<table border="0"  align="center" cellpadding="4" cellspacing="4"><tr><td>&nbsp;</td></tr>
        					<form action="email.php" method="post">
								<tr><td colspan="2" id="feedback">
								<ul>
								<li>Use this form to give us your feedback or report any problems 
								you experienced finding information on our website. </li>
								<li>We will try our best to respond to general questions and/or information requests 
								submitted through our Feedback site. </li>
								</ul><br/><br/>
								</td></tr>
       							<tr><td><label>Your Name:</label></td><td><input name="name" type="text" id="name"/></td></tr>
       							<tr><td><label>Your Email:</label></td><td><input name="email" type="text" id="email"  /></td></tr>
       	   						<tr><td><label>Your Comment:</label></td><td><textarea name="comment" id="comment"></textarea></td></tr>
      							<tr><td colspan="2" align="center"><input type="submit" name="submit" value="Click to send ur comments"/></td></tr>
	 	 					</form>
       					</table>
    			</fieldset></td>
            	<td><?php include("rightmenu.php"); ?></td>
            </tr>
            <tr>  <td colspan="3"><?php include("footer.php"); ?></td></tr>
		</table>
   </td></tr>
</table>

</body>
</html>
