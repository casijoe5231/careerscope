<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	$email=$_SESSION['user'][0];
	$name=$_SESSION['user'][1];
	include '../connection1.php';
?>
<html>
<head>
<title>Personality Result Print Preview</title>

<link href="Image/icon1.ico" rel="shortcut icon"/>
<style type="text/css">
<!--
#style1 th{ text-align:left;}
-->
</style>
<script type="text/javascript">
function printpage()
	{
		window.print();
	    document.getElementById('onclick_display').style.display = 'none';	

	}
	
	function disableCopyPaste() {    
        document.onselectstart=new Function('return false');
        function dMDown(e) {return false;}
        function dOClick() {return true;}
        document.onmousedown=dMDown;
        document.onclick=dOClick;
}
</script>
<style type="text/css" media="print">
     body {display:none;} 
  </style>
</head>
<div id="main-content">
<body>
		<form action="print.php" method="get"><div id="style1">
		<table width="1000" cellpadding="4" cellspacing="4" border="0" bgcolor="white" align="center">
		<?php
				$sql="select * from masteruser where email='$email'";
				$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
				while($row=mysqli_fetch_array($res))
					{
				?>
				<tr><td colspan="3" align="center"><h1>Personality Profiling</h1></td></tr>
				<tr align="left">
					<td style="font-family:Comic Sans" colspan="2"><h3></h3>&nbsp;</td>
				</tr>
				<tr align="left">
					<td style="font-family:Comic Sans" colspan="2"><h2><img src="../images/im-user_profile.png" width="20px;" height="20px;"><?php echo $name ; ?></h2><h3><?php echo $row['email'] ;?></h3></td>
				</tr>
				<tr>
				<td style="font-family:Comic Sans" align="center"><b>Assessment Results are as follows:</b><br><?php echo $email ?> <br>
				<?php
				$query="SELECT * FROM mod2_requests WHERE requestor='$email' AND val<>''";
				$result=mysqli_query($GLOBALS["___mysqli_ston"], $query);
				$num_rows = mysqli_num_rows($result);
				echo "Result based on a review by ".$num_rows." users";
				?>
				</td>
				</tr>
				</table>
				<table border="1" width="1000" cellpadding="4" cellspacing="4" border="0" bgcolor="white" align="center">
				<tr>
				<th width="200" style="text-align:center;">Trait</th>
				<th width="500" style="text-align:center;">Description</th>
				</tr>
				<tr>
				<td align="center"><img src="images/trait_icons/Extrversion-icon_friends.png"><br><h2>Extraversion</h2></td>
				<td></td>
				</tr>
				<tr>
				<td align="center"><img src="images/trait_icons/Agreeableness-icon_help.png"><br><h2>Agreeableness</h2></td>
				<td></td>
				</tr>
				<tr>
				<td align="center"><img src="images/trait_icons/Conscientiousness-icon_working.png"><br><h2>Conscientiousness</h2></td>
				<td></td>
				</tr>
				<tr>
				<td align="center"><img src="images/trait_icons/Neuroticism-icon_stress.png"><br><h2>Neuroticism</h2></td>
				<td></td>
				</tr>
				<tr>
				<td align="center"><img src="images/trait_icons/Openess-icon_artist.png"><br><h2>Openness</h2></td>
				<td></td>
				</tr>
					<?php
					}
					?>
			</table> 
			</form>
</body>
</div>
</html>
 <?php
 }
 ?>