<?php 
session_start();
include("database.php");
include("eportfolio_printpreview_tables.php");
if(isset($_SESSION['user']))
{
$email=$_SESSION['email'];
$name_query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT name,email FROM masteruser WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$name = mysqli_fetch_array($name_query);
?>

<html>
<head>
<title>Resume Print Preview</title>
<link href="Image/icon1.ico" rel="shortcut icon"/>

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
</head>
<div id="main-content">
<body>	<form action="snap.php" method="get"><div id="style1">
		<center><h2 style="font-size:28px"><img src="logo.png" width="70" height="70"/>&nbsp; <b>DON BOSCO INSTITUTE OF TECHNOLOGY</b></h2></center>
		<center><h2 style="font-size:18px"><b>Premier Automobiles Road, Kurla(West), Mumbai-400070</b></h2></center>
		<hr/>
		<table width="616" cellpadding="4" cellspacing="3" border="0" bgcolor="white" align="center">
				<tr><td colspan="3" align="center"><h3 style="font-size:18px">E-PORTFOLIO</h3></td></tr>
				<tr><td><h4 style="font-size:18px">Name: <?php echo ucwords(strtolower($_SESSION['user'][1])); ?></h4></td></tr>
                <tr><td><?php echo $dyn_table.'<br>'; echo $dyn_table2.'<br>'; echo $dyn_table4.'<br>'; echo $dyn_table5.'<br>'; echo $dyn_table3.'<br>'; echo $dyn_table1; ?></td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td><b>Signature & Date:</b></td></tr>
				<tr><td>&nbsp;</td></tr>
				<tr><td>&nbsp;</td></tr>
                <tr id="onclick_display"><td align="center"><input type="button" name="print" value="PRINT"  onClick="printpage();"></td></tr>
		</table> 
		</form>
</body>
</div>
</html>

<?php

}

?>