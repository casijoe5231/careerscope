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
<title>Resume Print Preview</title>

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
		<form action="sresumeaction.php" method="get"><div id="style1">
		<table width="616" cellpadding="4" cellspacing="4" border="0" bgcolor="white" align="center">
		<?php
				$sql="select * from acadportfolio where email='$email'";
				$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
				while($row=mysqli_fetch_array($res))
					{
				?>
				<tr><td colspan="3" align="center"><h1>RESUME</h1></td></tr>
				<tr align="left">
					<td style="font-family:Comic Sans" colspan="2">&nbsp;</td>
						<td rowspan="3" align="right"><img src="<?php echo $row['file'] ?>" width="140" height="160" border="1" align="right"></td>
				</tr>
				<tr align="left">
					<td style="font-family:Comic Sans" colspan="2"><h3></h3>&nbsp;</td>
				</tr>
				<tr align="left">
					<td style="font-family:Comic Sans" colspan="2"><h3><?php echo $name ; ?><br><?php echo $row['email'] ;?></h3></td>
				</tr>
				<tr><td colspan="7"><p>------------------------------------------------------------------------------------------------------------</p><td></tr>
					<?php
						if(isset($_POST['co']))
						{
						echo "<tr><td width='200'><h4>CAREER OBJECTIVES</h4></td>";
			
						echo "<td colspan='2'> $_POST[objective] </td></tr>";
						}

					
					if(isset($_POST['ts']))
					{
					echo "
					<tr><td width='200'><h4>TECHNICAL SKILLS</h4></td>
					<td style='font-family:Comic Sans' colspan='6'>
						<table border='0'>";
						if(isset($_POST['ts_os']))
					echo "  <tr>
								<th align='left'>Operating Systems: </th>
								<td style='font-family:Comic Sans'>$_POST[ts_os]</td>
							</tr>";
						if(isset($_POST['ts_pl']))
						
					echo "<tr>
								<th align='left'>Programming Languages: </th>";
								
							echo "<td style='font-family:Comic Sans'>$_POST[ts_pl]</td>";
							
							echo "</tr>";
						
						if(isset($_POST['ts_sl']))
					echo "<tr>
								<th align='left'>Scripting Languages: </th>
								<td style='font-family:Comic Sans'>$_POST[ts_sl]</td>
							</tr>";
						if(isset($_POST['ts_oth']))
						
					echo "<tr>
								<th align='left'>Career skills: </th>";
								
								echo "<td style='font-family:Comic Sans'>$_POST[ts_oth]</td>";
								
							echo "</tr>";
						
					echo "</table>
					</td></tr >";
						
					}
					
					if(isset($_POST['oth_skills']))
					{
					echo "
					<tr><td width='200'><h4>OTHER SKILLS</h4></td>
					<td style='font-family:Comic Sans' colspan='6'>
						<table border='0'>";
						if(isset($_POST['hskill1']))
					echo "  <tr>
								<th align='left'>Skill 1: </th>
								<td style='font-family:Comic Sans'>$_POST[skill1]</td>
							</tr>";
						if(isset($_POST['hskill2']))
					echo "<tr>
								<th align='left'>Skill 2: </th>
								<td style='font-family:Comic Sans'>$_POST[skill2]</td>
							</tr>";
					echo "</table>
					</td></tr >";
					}
					?>
					
					<?php
					if(isset($_POST['ed']))
					{
					echo "<tr><td width='200'><h4>UNDER-GRADUATION EDUCATIONAL DETAILS</h4></td></tr>
								<tr><td style='font-family:Comic Sans' colspan='6'>";
								?>
								<table border="0" cellpadding="5">
									<tr><th>Qualification</th><th>School/Institute</th><th>Board</th><th>Stream</th><th>Total</th><th>Out of</th><th>Percent/CGPA</th><th>Year of passing</th></tr>
									<?php
									$sql1="select * from qualification_master where email='$email'";
									$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
									while($row1=mysqli_fetch_array($res1))
									{
									if($row1['ssc_hsc_diploma']=='SSC')
									{
									echo "<tr><td style='font-family:Comic Sans'><b>$row1[ssc_hsc_diploma]</b></td><td style='font-family:Comic Sans'>$_POST[inst]</td><td style='font-family:Comic Sans'>$_POST[board]</td><td style='font-family:Comic Sans'>$_POST[str]</td><td style='font-family:Comic Sans'>$_POST[tot]</td><td style='font-family:Comic Sans'>$_POST[out]</td><td style='font-family:Comic Sans'>$_POST[percent]</td><td style='font-family:Comic Sans'>$_POST[pass]</td></tr>";
									}
									if($row1['ssc_hsc_diploma']=='HSC')
									{
									echo "<tr><td style='font-family:Comic Sans'><b>$row1[ssc_hsc_diploma]</b></td><td style='font-family:Comic Sans'>$_POST[inst1]</td><td style='font-family:Comic Sans'>$_POST[board1]</td><td style='font-family:Comic Sans'>$_POST[str1]</td><td style='font-family:Comic Sans'>$_POST[tot1]</td><td style='font-family:Comic Sans'>$_POST[out1]</td><td style='font-family:Comic Sans'>$_POST[percent1]</td><td style='font-family:Comic Sans'>$_POST[pass1]</td></tr>";
									}
									if($row1['ssc_hsc_diploma']=='Diploma')
									{
									echo "<tr><td style='font-family:Comic Sans'><b>$row1[ssc_hsc_diploma]</b></td><td style='font-family:Comic Sans'>$_POST[inst2]</td><td style='font-family:Comic Sans'>$_POST[board2]</td><td style='font-family:Comic Sans'>$_POST[str2]</td><td style='font-family:Comic Sans'>$_POST[tot2]</td><td style='font-family:Comic Sans'>$_POST[out2]</td><td style='font-family:Comic Sans'>$_POST[percent2]</td><td style='font-family:Comic Sans'>$_POST[pass2]</td></tr>";
									}
									}									
									?>
									</table>
									<?php
							echo	"</td></tr>
						
							<input type='hidden' id='ed' name='ed' value='ed'/>";
						echo "</td></tr>";
						
						echo "<tr><td colspan='10'>";
						echo "<tr><td width='200'><h4>GRADUATION EDUCATION DETAILS</h4></td></tr>
									<tr><td style='font-family:Comic Sans' colspan='6'>";
									?>
									<table border="0" cellpadding="5">
									<tr><th>Academic Year</th><th>Institute</th><th>Board/Univ</th><th>Specialisation</th><th>Total marks</th><th>Out of</th><th>Percent/CGPA</th><th>Year of passing</th></tr>
									<?php
									$sql1="select * from graduation_master where email='$email' order by year";
									$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
									while($row1=mysqli_fetch_array($res1))
									{
									if($row1['academicyear']=='First year')
									{
									echo "<tr><td style='font-family:Comic Sans'><b>$row1[academicyear]</b></td><td style='font-family:Comic Sans'>$_POST[insti]</td><td style='font-family:Comic Sans'>$_POST[univ]</td><td style='font-family:Comic Sans'>$_POST[spe]</td><td style='font-family:Comic Sans'>$_POST[total]</td><td style='font-family:Comic Sans'>$_POST[totoutof]</td><td style='font-family:Comic Sans'>$_POST[totpercent]</td><td style='font-family:Comic Sans'>$_POST[yrpass]</td></tr>";
									}
									if($row1['academicyear']=='Second year')
									{
									echo "<tr><td style='font-family:Comic Sans'><b>$row1[academicyear]</b></td><td style='font-family:Comic Sans'>$_POST[insti1]</td><td style='font-family:Comic Sans'>$_POST[univ1]</td><td style='font-family:Comic Sans'>$_POST[spe1]</td><td style='font-family:Comic Sans'>$_POST[total1]</td><td style='font-family:Comic Sans'>$_POST[totoutof1]</td><td style='font-family:Comic Sans'>$_POST[totpercent1]</td><td style='font-family:Comic Sans'>$_POST[yrpass1]</td></tr>";
									}
									if($row1['academicyear']=='Third year')
									{
									echo "<tr><td style='font-family:Comic Sans'><b>$row1[academicyear]</b></td><td style='font-family:Comic Sans'>$_POST[insti2]</td><td style='font-family:Comic Sans'>$_POST[univ2]</td><td style='font-family:Comic Sans'>$_POST[spe2]</td><td style='font-family:Comic Sans'>$_POST[total2]</td><td style='font-family:Comic Sans'>$_POST[totoutof2]</td><td style='font-family:Comic Sans'>$_POST[totpercent2]</td><td style='font-family:Comic Sans'>$_POST[yrpass2]</td></tr>";
									}
									if($row1['academicyear']=='Fourth year')
									{
									echo "<tr><td style='font-family:Comic Sans'><b>$row1[academicyear]</b></td><td style='font-family:Comic Sans'>$_POST[insti3]</td><td style='font-family:Comic Sans'>$_POST[univ3]</td><td style='font-family:Comic Sans'>$_POST[spe3]</td><td style='font-family:Comic Sans'>$_POST[total3]</td><td style='font-family:Comic Sans'>$_POST[totoutof3]</td><td style='font-family:Comic Sans'>$_POST[totpercent3]</td><td style='font-family:Comic Sans'>$_POST[yrpass3]</td></tr>";
									}
									if($row1['academicyear']=='Fifth year')
									{
									echo "<tr><td style='font-family:Comic Sans'><b>$row1[academicyear]</b></td><td style='font-family:Comic Sans'>$_POST[insti4]</td><td style='font-family:Comic Sans'>$_POST[univ4]</td><td style='font-family:Comic Sans'>$_POST[spe4]</td><td style='font-family:Comic Sans'>$_POST[total4]</td><td style='font-family:Comic Sans'>$_POST[totoutof4]</td><td style='font-family:Comic Sans'>$_POST[totpercent4]</td><td style='font-family:Comic Sans'>$_POST[yrpass4]</td></tr>";
									}
									}									
									?>
									</table>
								<?php
							echo	"</td></tr>
                       
						<input type='hidden' id='ed' name='ed' value='ed'/>
						</td></tr>";
					}
					?>

					
					<?php
					if(isset($_POST['we']))
					{
					echo "<tr><td width='100'><h4>Internship</h4></td>
						  <td style='font-family:Comic Sans' colspan='6'>
						  <table border='0'>";
					 $sql5="select * from acadportfolio where email='$email'";
									$res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
									while($row5=mysqli_fetch_array($res5))
									{
					echo "<tr><td align='left'><b>Period: </b></td>
						  <td style='font-family:Comic Sans'>$_POST[period]</td>
							<input type='hidden' id='period' name='period' value='period'/></tr>
							<tr><td align='left'><b>Company Name: </b></td>
						  <td style='font-family:Comic Sans'>$_POST[company]</td>
							<input type='hidden' id='company' name='company' value='company'/></tr>
							<tr><td align='left'><b>Title: </b></td>
						  <td style='font-family:Comic Sans'>$_POST[title]</td>
							<input type='hidden' id='title' name='title' value='title'/></tr>
							<tr><td align='left'><b>Area: </b></td>
						  <td style='font-family:Comic Sans'>$_POST[area]</td>
							<input type='hidden' id='area' name='area' value='area'/></tr>";
					}
					echo "</table>
							</td></tr>";
					}
					?>
					
					<?php
					if(isset($_POST['pd']))
					echo "<tr><td style='font-family:Comic Sans'>&nbsp;</td></tr>
					<tr><td width='200'><h4>PERSONAL DETAILS</h4></td></tr>
 					<tr><td colspan='7'><table border='0' >
					<tr><th align='left' width='100'>Address :</th><td style='font-family:Comic Sans'>$_POST[address]<br/></td></tr>
                    <tr><th align='left'>Contact No :</th><td style='font-family:Comic Sans'>$_POST[mobile]</td></tr>
					<tr><th align='left'>Category : </th><td style='font-family:Comic Sans'>$_POST[category]</td></tr>
					<tr><th align='left'>Minority : </th><td style='font-family:Comic Sans'>$_POST[minority]</td></tr>
					<tr><th align='left'>DOB :</th><td colspan='2'>$_POST[dob]</td></tr>
					<tr><th align='left'>Gender : </th><td colspan='2'>$_POST[gender]</td></tr>
					</table></td></tr>";
					?>
					
					<?php	
					if(isset($_POST['ho']))
					echo "<tr><td style='font-family:Comic Sans'>&nbsp;</td></tr>	
					<tr><td width='200'><h4>HOBBIES</h4></td><td colspan='2'>$_POST[hobbies] </td></tr>";
					
					if(isset($_POST['lk']))
					{
					echo "
					<tr> <td width='200'><h4>LANGUAGES KNOWN </h4></td>";
						echo"<td colspan='2'>$_POST[lang] </td></tr>";
					}
					if(isset($_POST['ref']))
					echo "
					<tr><td width='200'><h4>REFERENCES</h4></td><td colspan='2'>$_POST[reference]</td></tr>";
					?>
					<tr><td width='200'>&nbsp;</td><td align="right">&nbsp;</td></tr>
					<tr><td width='200'>&nbsp;</td><td align="right"><b>Sign & Stamp:</b></td></tr>
					<tr><td width='200'>&nbsp;</td><td align="right">&nbsp;</td></tr>
					<tr><td width='200'>&nbsp;</td><td align="right">&nbsp;</td></tr>
					<tr id="onclick_display"><td colspan="10" align="center"><input type="button" name="print" value="PRINT" onClick="printpage();"></td></tr>
					</table>
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