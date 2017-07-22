<?php
session_start();
?>
<html>

<head>
<title>About System</title>
<link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css">
<link rel="stylesheet" href="SpryAssets/footer_content.css" type="text/css">
<link href="Image/icon1.ico" rel="shortcut icon"/>
</head>

<body>
<table border="1" align="center">
	<tr><td>
		<table border="0" align="center">

            <tr><td colspan="2"><?php include("header.php"); ?></td></tr>
			<tr><td colspan="2"><?php include("menu.php"); ?></td></tr>
			<tr><td>
			<ul type="circle">
                		<fieldset style="width:600">
                        <legend><b>ABOUT SYSTEM</b></legend> 
                		<li>An E-Portfolio is a digitized collection of artifacts including</li><br/>
                        <ul type="square"><li>demonstrations</li><li>resources</li><li> accomplishments that representing an individual.</li></ul><br/>
						<li>This collection is comprised of text based, graphic elements archived on the website.</li><br/>
						<li>It is a general e-portfolio that can be used by different users.</li><br/>
                        <li>Two types of e-portfolio are: Student and Investor.</li><br/>
						<li>If user want to have look before registration then he/she can login as a guest. If user likes website then he/she may contact administator and convert into registered user without creating new account.</li>
                        </fieldset>
                </ul>

			</td>
            <td><?php include("rightmenu.php"); ?></td></tr>
            <tr>  <td colspan="2"><?php include("footer.php"); ?></td></tr>
		</table>
   </td></tr>
</table>

</body>
</html>
