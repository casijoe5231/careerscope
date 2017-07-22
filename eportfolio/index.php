
<?php 
//session_start();
//include("database.php");
//$active=$_GET['active'];
//$passkey=$_GET['passkey'];
///$q1=mysql_query("UPDATE registration SET active='$active' WHERE code='$passkey'",$db) or die(mysql_error());
//$q2=mysql_query("UPDATE registration SET code='0' WHERE code='$passkey'",$db) or die(mysql_error());
?>

<html>
<head>

<title>E portfolio</title>

<link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css">
<link href="Image/icon1.ico" rel="shortcut icon"/>

<script type="text/javascript">

var curimg=0
var galleryarray=new Array();
galleryarray[0]='myphoto2.jpg'
galleryarray[1]='myphoto.png'
galleryarray[2]='myphoto1.jpg'
galleryarray[3]='investor.jpg'

function rotateimages(){
document.getElementById("slideshow").setAttribute("src", "Image/"+galleryarray[curimg])
curimg=(curimg<galleryarray.length-1)? curimg+1 : 0
}

window.onload=function(){
setInterval("rotateimages()", 2500)
}
</script>
</head>

<body>

<table align="center" border="1">
<tr> <td>
<table align="center" border="0">
			<tr><td colspan="2"><?php include("header.php"); ?></td></tr>
			
			<?php if(isset($_SESSION['login'])&& $pRoleId=="Student"){
					echo "<tr id='logout'><td align='right' colspan='2'>
					you have logged in as <a href='studenthome.php'>$username</a>&nbsp;<a href='logout.php'>(log out)</a></td></tr>"; 
				  }
				  else if(isset($_SESSION['login'])&& $pRoleId=="Investor"){
					echo "<tr id='logout'><td align='right' colspan='2'>
					you have logged in as <a href='investorhome.php'>$username</a>&nbsp;<a href='logout.php'>(log out)</a></td></tr>"; 
				  }
				  else{};
			?>
			
            <tr><td colspan="2"><?php include("menu.php"); ?></td></tr>
            
            <tr>
            	
        		<td><div class="loginform">
					<fieldset><legend >LogIn</legend>
					<table border="0">
					  <form action="LDAP Files/index.php" method="post"> 
                    <tr>
						<td width="172" height="36">UserName:</td>
					  	<td width="172"><input type="text" name="username" size="15"/></td>
					</tr>
					<tr>
						<td height="33">Password:</td> 
					  	<td><input type="password" name="password" size="15" /></td>
					</tr>
                    
		    		<tr>
						<td height="36"></td>
					  	<td align="left"><input type="Submit" name="signin" value="SIGN IN"/></td>
		    		</tr>
						</form>
					
					</table>
			  		</fieldset>
					</div>		    	
                 </td>
            <td><img id="slideshow" src="" width="610" height="444"/></td>
        </tr>
        <tr>  <td colspan="2"><?php include("footer.php"); ?></td></tr>
</table>
</td></tr>
</table>

</body>
</html>
<?php //<embed src="Image\slideshow.wmv" width="650" height="500" type="application/x-mplayer2" align="center" /> ?>