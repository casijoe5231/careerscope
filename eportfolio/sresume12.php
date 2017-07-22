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
<title>CareerScope</title>

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
		<link href="Image/icon1.ico" rel="shortcut icon"/>
<script language="Javascript">
function convert(){
	
	if(document.getElementById("objective"))
	var objective = document.getElementById("objective").value;
	if(document.getElementById("ts_os"))
	var ts_os = document.getElementById("ts_os").value;
	if(document.getElementById("ts_pl"))
	var ts_pl = document.getElementById("ts_pl").value;
	if(document.getElementById("ts_sl"))
	var ts_sl = document.getElementById("ts_sl").value;
	if(document.getElementById("ts_oth"))
	var ts_oth = document.getElementById("ts_oth").value;
	if(document.getElementById("skill1"))
	var skill1 = document.getElementById("skill1").value;
	if(document.getElementById("skill2"))
	var skill2 = document.getElementById("skill2").value;
	if(document.getElementById("inst"))
	var inst = document.getElementById("inst").value;
	if(document.getElementById("board"))
	var board = document.getElementById("board").value;
	if(document.getElementById("str"))
	var str = document.getElementById("str").value;
	if(document.getElementById("tot"))
	var tot = document.getElementById("tot").value;
	if(document.getElementById("out"))
	var out = document.getElementById("out").value;
	if(document.getElementById("percent"))
	var percent = document.getElementById("percent").value;
	if(document.getElementById("pass"))
	var pass = document.getElementById("pass").value;
	if(document.getElementById("inst1"))
	var inst1 = document.getElementById("inst1").value;
	if(document.getElementById("board1"))
	var board1 = document.getElementById("board1").value;
	if(document.getElementById("str"))
	var str1 = document.getElementById("str1").value;
	if(document.getElementById("tot1"))
	var tot1 = document.getElementById("tot1").value;
	if(document.getElementById("out1"))
	var out1 = document.getElementById("out1").value;
	if(document.getElementById("percent1"))
	var percent1 = document.getElementById("percent1").value;
	if(document.getElementById("pass1"))
	var pass1 = document.getElementById("pass1").value;
	if(document.getElementById("inst2"))
	var inst2 = document.getElementById("inst2").value;
	if(document.getElementById("board2"))
	var board2 = document.getElementById("board2").value;
	if(document.getElementById("str2"))
	var str2 = document.getElementById("str2").value;
	if(document.getElementById("tot2"))
	var tot2 = document.getElementById("tot2").value;
	if(document.getElementById("out2"))
	var out2 = document.getElementById("out2").value;
	if(document.getElementById("percent2"))
	var percent2 = document.getElementById("percent2").value;
	if(document.getElementById("pass2"))
	var pass2 = document.getElementById("pass2").value;
	if(document.getElementById("insti"))
	var insti = document.getElementById("insti").value;
	if(document.getElementById("univ"))
	var univ = document.getElementById("univ").value;
	if(document.getElementById("spe"))
	var spe = document.getElementById("spe").value;
	if(document.getElementById("total"))
	var total = document.getElementById("total").value;
	if(document.getElementById("totoutof"))
	var totoutof = document.getElementById("totoutof").value;
	if(document.getElementById("totpercent"))
	var totpercent = document.getElementById("totpercent").value;
	if(document.getElementById("yrpass"))
	var yrpass = document.getElementById("yrpass").value;
	if(document.getElementById("insti1"))
	var insti1 = document.getElementById("insti1").value;
	if(document.getElementById("univ1"))
	var univ1 = document.getElementById("univ1").value;
	if(document.getElementById("spe1"))
	var spe1 = document.getElementById("spe1").value;
	if(document.getElementById("total1"))
	var total1 = document.getElementById("total1").value;
	if(document.getElementById("totoutof1"))
	var totoutof1 = document.getElementById("totoutof1").value;
	if(document.getElementById("totpercent1"))
	var totpercent1 = document.getElementById("totpercent1").value;
	if(document.getElementById("yrpass1"))
	var yrpass1 = document.getElementById("yrpass1").value;
	if(document.getElementById("insti2"))
	var insti2 = document.getElementById("insti2").value;
	if(document.getElementById("univ2"))
	var univ2 = document.getElementById("univ2").value;
	if(document.getElementById("spe2"))
	var spe2 = document.getElementById("spe2").value;
	if(document.getElementById("total2"))
	var total2 = document.getElementById("total2").value;
	if(document.getElementById("totoutof2"))
	var totoutof2 = document.getElementById("totoutof2").value;
	if(document.getElementById("totpercent2"))
	var totpercent2 = document.getElementById("totpercent2").value;
	if(document.getElementById("yrpass2"))
	var yrpass2 = document.getElementById("yrpass2").value;
	if(document.getElementById("insti3"))
	var insti3 = document.getElementById("insti3").value;
	if(document.getElementById("univ3"))
	var univ3 = document.getElementById("univ3").value;
	if(document.getElementById("spe3"))
	var spe3 = document.getElementById("spe3").value;
	if(document.getElementById("total3"))
	var total3 = document.getElementById("total3").value;
	if(document.getElementById("totoutof3"))
	var totoutof3 = document.getElementById("totoutof3").value;
	if(document.getElementById("totpercent3"))
	var totpercent3 = document.getElementById("totpercent3").value;
	if(document.getElementById("yrpass3"))
	var yrpass3 = document.getElementById("yrpass3").value;
	if(document.getElementById("insti4"))
	var insti4 = document.getElementById("insti4").value;
	if(document.getElementById("univ4"))
	var univ4 = document.getElementById("univ4").value;
	if(document.getElementById("spe4"))
	var spe4 = document.getElementById("spe4").value;
	if(document.getElementById("total4"))
	var total4 = document.getElementById("total4").value;
	if(document.getElementById("totoutof4"))
	var totoutof4 = document.getElementById("totoutof4").value;
	if(document.getElementById("totpercent4"))
	var totpercent4 = document.getElementById("totpercent4").value;
	if(document.getElementById("yrpass4"))
	var yrpass4 = document.getElementById("yrpass4").value;
	if(document.getElementById("period"))
	var period = document.getElementById("period").value;
	if(document.getElementById("company"))
	var company = document.getElementById("company").value;
	if(document.getElementById("title"))
	var title = document.getElementById("title").value;
	if(document.getElementById("area"))
	var area = document.getElementById("area").value;
	if(document.getElementById("address"))
	var address = document.getElementById("address").value;
	if(document.getElementById("mobile"))
	var mobile = document.getElementById("mobile").value;
	if(document.getElementById("category"))
	var category = document.getElementById("category").value;
	if(document.getElementById("minority"))
	var minority = document.getElementById("minority").value;
	if(document.getElementById("dob"))
	var dob = document.getElementById("dob").value;
	if(document.getElementById("gender"))
	var gender = document.getElementById("gender").value;
	if(document.getElementById("hobbies"))
	var hobbies = document.getElementById("hobbies").value;
	if(document.getElementById("lang"))
	var languages = document.getElementById("lang").value;
	if(document.getElementById("reference"))
	var reference = document.getElementById("reference").value;
			
	var url = "test.php?objective="+objective+"&ts_os="+ts_os+"&ts_pl="+ts_pl+"&ts_sl="+ts_sl+"&ts_oth="+ts_oth+"&skill1="+skill1+"&skill2="+skill2+"&inst="+inst+"&board="+board+"&str="+str+"&tot="+tot+"&out="+out+"&percent="+percent+"&pass="+pass+"&inst1="+inst1+"&board1="+board1+"&str1="+str1+"&tot1="+tot1+"&out1="+out1+"&percent1="+percent1+"&pass1="+pass1+"&inst2="+inst2+"&board2="+board2+"&str2="+str2+"&tot2="+tot2+"&out2="+out2+"&percent2="+percent2+"&pass2="+pass2+"&insti="+insti+"&univ="+univ+"&spe="+spe+"&total="+total+"&totoutof="+totoutof+"&totpercent="+totpercent+"&yrpass="+yrpass+"&insti1="+insti1+"&univ1="+univ1+"&spe1="+spe1+"&total1="+total1+"&totoutof1="+totoutof1+"&totpercent1="+totpercent1+"&yrpass1="+yrpass1+"&insti2="+insti2+"&univ2="+univ2+"&spe2="+spe2+"&total2="+total2+"&totoutof2="+totoutof2+"&totpercent2="+totpercent2+"&yrpass2="+yrpass2+"&insti3="+insti3+"&univ3="+univ3+"&spe3="+spe3+"&total3="+total3+"&totoutof3="+totoutof3+"&totpercent3="+totpercent3+"&yrpass3="+yrpass3+"&insti4="+insti4+"&univ4="+univ4+"&spe4="+spe4+"&total4="+total4+"&totoutof4="+totoutof4+"&totpercent4="+totpercent4+"&yrpass4="+yrpass4+"&period="+period+"&company="+company+"&title="+title+"&area="+area+"&address="+address+"&mobile="+mobile+"&category="+category+"&minority="+minority+"&dob="+dob+"&gender="+gender+"&hobbies="+hobbies+"&lang="+lang+"&reference="+reference;
	window.open(url);
}
</script>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
</script>



<link rel="stylesheet" type="text/css" href="../css/stephen1.css">  

</head>
<body>

<div class='container'>
<div class="header"><img src="../images/byb.jpg" width="160" height="80" alt="CareerScope logo" align="left"/>
  <img src="../images/dbit.png"  width="6%" alt="DBIT"  align="right"/>
  </div>
<div class="header-shadow"></div>
<div class='content'>
<br>
<div style="float:left;"><?php include("menu.php"); ?></div>
<br>
<br>
<br>
<div class='title' style="clear:both;">
<h3>&nbsp; Academic Brand menu</h3>
</div>
<br>
<br>
<br>
<div style="float:left;clear:both;margin-top:30px;">
<ul id="sidenavigation" class="MenuBarVertical">
	<li><a href="register.php">Register</a></li>
	<li><a href="choose.php">Choose your mentor</a></li>
	<!--li><a href="profile.php">Job profile</a></li>
	<li><a href="goal.php">Job profiling test</a></li>
	<li><a href="know.php">Know your subjects</a></li-->
	<?php include("smenu.php"); ?>
  <li><a href="newindex.php">
	<?php
	if($first==1)
	echo "Create";
	else
	echo "Add";
	?></a></li>
  <li><a href="sdisplay1.php">Display</a></li>
    <li><a href="presresume.php">Resume</a></li>
	<li><a href="../newindex.php">Back to home</a></li>
	</ul>
</div>
<!-- Content here -->
<div id='container_internal' style="float:left;margin-top:30px;">
<table width="616" border="0" style="font-family:Comic Sans,Georgia,Serif;">
	<tr><td style="font-family:Comic Sans">
			<td style="font-family:Comic Sans"><fieldset style="width:720">
        		<legend class="student"> <b>RESUME</b></legend>
				<table align="left" border="0">
				<?php
				$sql="select * from acadportfolio where email='$email'";
				$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
				while($row=mysqli_fetch_array($res))
					{
				?>
					<tr>
	 	  				<td width="1000">&nbsp;</td>
						<td rowspan="10" align="right"><img src="<?php echo $row['file'] ?>" width="140" height="160" border="1" align="right"></td>
					</tr>
					<tr align="left">
	 	  				<td style="font-family:Comic Sans" colspan="10"><h3></h3 >&nbsp;</td>
					</tr>
					<tr align="left">
						<td style="font-family:Comic Sans" colspan="10"><h3><?php  echo $name ?><BR><?php  echo $row['email'] ;?></h3></td>
					</tr>
					<?php
					}
					?>
				</table>
				
				<p>-----------------------------------------------------------------------------------------------------------------------------------------------</p>
            <table width="616" cellpadding="4" cellspacing="1">
				<form method="post" action="sresumeaction.php" target="_blank">
				<?php
				if(isset($_POST['co']))
				{
				echo "<tr align='left'><td ><h4>CAREER OBJECTIVES</h4></td>";
				
									$sql2="select * from acadportfolio where email='$email'";
									$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
									while($row2=mysqli_fetch_array($res2))
									{
									echo	"<td><textarea name='objective' id='objective' style='width:100%' $row2[objective]>$row2[objective]</textarea></td></tr>
										<input type='hidden' id='co' name='co' value='co'/>";
									}
									
				}
				if(isset($_POST['ts']))
				{
					echo "<tr><td align='left'><h4>TECHNICAL SKILLS</h4></td>
					<td style='font-family:Comic Sans' colspan='6'>
						<table border='0' width='100%'>";
						if(isset($_POST['ts_os']))
						echo "<tr>
								<td align='left'>Operating Systems: </td>
								<td style='font-family:Comic Sans'><input type='text' name='ts_os' id='ts_os' size='55'></td>
							<input type='hidden' id='hts_os' name='hts_os' value='ts_os'/></tr>";
						if(isset($_POST['ts_pl']))
						{
						echo "<tr>
								<td align='left'>Programming Languages: </td>";
								$sql3="select * from acadportfolio where email='$email'";
									$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
									while($row3=mysqli_fetch_array($res3))
									{
						echo	"<td style='font-family:Comic Sans'><input type='text' name='ts_pl' id='ts_pl' size='55' value='$row3[skills]'></td>
							<input type='hidden' id='hts_pl' name='hts_pl' value='ts_pl'/></tr>";
									}
						}
						if(isset($_POST['ts_sl']))
						echo "<tr>
								<td align='left'>Scripting Languages: </td>
								<td style='font-family:Comic Sans'><input type='text' name='ts_sl' id='ts_sl' size='55'></td>
							<input type='hidden' id='hts_sl' name='hts_sl' value='ts_sl'/></tr>";
						if(isset($_POST['ts_oth']))
						{
						echo "<tr>
								<td align='left'>Career skills: </td>";
								$sql4="select * from acadportfolio where email='$email'";
									$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);
									while($row4=mysqli_fetch_array($res4))
									{
						echo	"<td style='font-family:Comic Sans'><input type='text' name='ts_oth' id='ts_oth' size='55' value='$row4[cskills]'></td>
							<input type='hidden' id='hts_oth' name='hts_oth' value='ts_oth'/></tr>";
									}
							echo "</table>
							<input type='hidden' id='ts' name='ts' value='ts'/>";
							echo "</td></tr>";
						}
				}
				if(isset($_POST['oth_skills']))
				{
					echo "<tr><td align='left'><h4>OTHER SKILLS</h4></td>
					<td style='font-family:Comic Sans' colspan='6'>
						<table border='0' width='100%'>";
						if(isset($_POST['skill1']))
						echo "<tr>
								<td align='left'>Skill 1: </td>
								<td style='font-family:Comic Sans'><input type='text' name='skill1' id='skill1' size='55'></td>
							<input type='hidden' id='hskill1' name='hskill1' value='skill1'/></tr>";
						if(isset($_POST['skill2']))
						echo "<tr>
								<td align='left'>Skill 2: </td>
								<td style='font-family:Comic Sans'><input type='text' name='skill2' id='skill2' size='55'></td>
							<input type='hidden' id='hskill2' name='hskill2' value='skill2'/></tr>";
							echo "</table>
							<input type='hidden' id='oth_skills' name='oth_skills' value='oth_skills'/>";
					echo "</td></tr>";
				}
						?>
					<?php
					if(isset($_POST['ed']))
					{
						echo "<tr><td colspan='10'>";
						echo "<table border='0'><tr><td align='left'><h4>UNDER GRADUATION EDUCATION DETAILS</h4></td></tr>
									<tr><td style='font-family:Comic Sans'>";
									?>
									<table border="0" width="620">
									<tr><th>Qualification</th><th>School/Institute</th><th>Board</th><th>Stream</th><th>Total</th><th>Out of</th><th>Percent/CGPA</th><th>Yop</th></tr>
									<?php
									$sql1="select * from qualification_master where email='$email'";
									$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
									while($row1=mysqli_fetch_array($res1))
									{
									if($row1['ssc_hsc_diploma']=='SSC')
									{
									echo "<tr><td><b>$row1[ssc_hsc_diploma]</b></td><td><textarea id='inst' name='inst' $row1[institute]>$row1[institute]</textarea></td><td><textarea id='board' name='board' $row1[board]>$row1[board]</textarea></td><td><textarea id='str' name='str' $row1[stream]>$row1[stream]</textarea></td><td><textarea id='tot' name='tot' $row1[total]>$row1[total]</textarea></td><td><textarea id='out' name='out' $row1[outof]>$row1[outof]</textarea></td><td><textarea id='percent' name='percent' $row1[percent]>$row1[percent]</textarea></td><td><textarea id='pass' name='pass' $row1[yearofpassing]>$row1[yearofpassing]</textarea></td></tr>";
									}
									if($row1['ssc_hsc_diploma']=='HSC')
									{
									echo "<tr><td><b>$row1[ssc_hsc_diploma]</b></td><td><textarea id='inst1' name='inst1' $row1[institute]>$row1[institute]</textarea></td><td><textarea id='board1' name='board1' $row1[board]>$row1[board]</textarea></td><td><textarea id='str1' name='str1' $row1[stream]>$row1[stream]</textarea></td><td><textarea id='tot1' name='tot1' $row1[total]>$row1[total]</textarea></td><td><textarea id='out1' name='out1' $row1[outof]>$row1[outof]</textarea></td><td><textarea id='percent1' name='percent1' $row1[percent]>$row1[percent]</textarea></td><td><textarea id='pass1' name='pass1' $row1[yearofpassing]>$row1[yearofpassing]</textarea></td></tr>";
									}
									if($row1['ssc_hsc_diploma']=='Diploma')
									{
									echo "<tr><td><b>$row1[ssc_hsc_diploma]</b></td><td><textarea id='inst2' name='inst2' $row1[institute]>$row1[institute]</textarea></td><td><textarea id='board2' name='board2' $row1[board]>$row1[board]</textarea></td><td><textarea id='str2' name='str2' $row1[stream]>$row1[stream]</textarea></td><td><textarea id='tot2' name='tot2' $row1[total]>$row1[total]</textarea></td><td><textarea id='out2' name='out2' $row1[outof]>$row1[outof]</textarea></td><td><textarea id='percent2' name='percent2' $row1[percent]>$row1[percent]</textarea></td><td><textarea id='pass2' name='pass2' $row1[yearofpassing]>$row1[yearofpassing]</textarea></td></tr>";
									}
									}									
									?>
									</table>
									<?php
							echo	"</td></tr>
							</table>
							<input type='hidden' id='ed' name='ed' value='ed'/>";
						echo "</td></tr>";
						
						echo "<tr><td colspan='10'>";
						echo "<table border='0'><tr><td align='left'><h4>GRADUATION EDUCATION DETAILS</h4></td></tr>
									<tr><td style='font-family:Comic Sans'>";
									?>
									<table border="0" width="620">
									<tr><th>Academic Year</th><th>Institute</th><th>Board/Univ</th><th>Specialisation</th><th>Total marks</th><th>Out of</th><th>Percent/CGPA</th><th>Yop</th></tr>
									<?php
									$sql1="select * from graduation_master where email='$email' order by year";
									$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
									while($row1=mysqli_fetch_array($res1))
									{
									if($row1['academicyear']=='First year')
									{
									echo "<tr><td><b>$row1[academicyear]</b></td><td><textarea id='insti' name='insti' $row1[institute]>$row1[institute]</textarea></td><td><textarea id='univ' name='univ' $row1[university]>$row1[university]</textarea></td><td><textarea id='spe' name='spe' $row1[specialisation]>$row1[specialisation]</textarea></td><td><textarea id='total' name='total' $row1[totalmarks]>$row1[totalmarks]</textarea></td><td><textarea id='totoutof' name='totoutof' $row1[totaloutof]>$row1[totaloutof]</textarea></td><td><textarea id='totpercent' name='totpercent' $row1[percent]>$row1[percent]</textarea></td><td><textarea id='yrpass' name='yrpass' $row1[yearofpassing]>$row1[yearofpassing]</textarea></td></tr>";
									}
									if($row1['academicyear']=='Second year')
									{
									echo "<tr><td><b>$row1[academicyear]</b></td><td><textarea id='insti1' name='insti1' $row1[institute]>$row1[institute]</textarea></td><td><textarea id='univ1' name='univ1' $row1[university]>$row1[university]</textarea></td><td><textarea id='spe1' name='spe1' $row1[specialisation]>$row1[specialisation]</textarea></td><td><textarea id='total1' name='total1' $row1[totalmarks]>$row1[totalmarks]</textarea></td><td><textarea id='totoutof1' name='totoutof1' $row1[totaloutof]>$row1[totaloutof]</textarea></td><td><textarea id='totpercent1' name='totpercent1' $row1[percent]>$row1[percent]</textarea></td><td><textarea id='yrpass1' name='yrpass1' $row1[yearofpassing]>$row1[yearofpassing]</textarea></td></tr>";
									}
									if($row1['academicyear']=='Third year')
									{
									echo "<tr><td><b>$row1[academicyear]</b></td><td><textarea id='insti2' name='insti2' $row1[institute]>$row1[institute]</textarea></td><td><textarea id='univ2' name='univ2' $row1[university]>$row1[university]</textarea></td><td><textarea id='spe2' name='spe2' $row1[specialisation]>$row1[specialisation]</textarea></td><td><textarea id='total2' name='total2' $row1[totalmarks]>$row1[totalmarks]</textarea></td><td><textarea id='totoutof2' name='totoutof2' $row1[totaloutof]>$row1[totaloutof]</textarea></td><td><textarea id='totpercent2' name='totpercent2' $row1[percent]>$row1[percent]</textarea></td><td><textarea id='yrpass2' name='yrpass2' $row1[yearofpassing]>$row1[yearofpassing]</textarea></td></tr>";
									}
									if($row1['academicyear']=='Fourth year')
									{
									echo "<tr><td><b>$row1[academicyear]</b></td><td><textarea id='insti3' name='insti3' $row1[institute]>$row1[institute]</textarea></td><td><textarea id='univ3' name='univ3' $row1[university]>$row1[university]</textarea></td><td><textarea id='spe3' name='spe3' $row1[specialisation]>$row1[specialisation]</textarea></td><td><textarea id='total3' name='total3' $row1[totalmarks]>$row1[totalmarks]</textarea></td><td><textarea id='totoutof3' name='totoutof3' $row1[totaloutof]>$row1[totaloutof]</textarea></td><td><textarea id='totpercent3' name='totpercent3' $row1[percent]>$row1[percent]</textarea></td><td><textarea id='yrpass3' name='yrpass3' $row1[yearofpassing]>$row1[yearofpassing]</textarea></td></tr>";
									}
									if($row1['academicyear']=='Fifth year')
									{
									echo "<tr><td><b>$row1[academicyear]</b></td><td><textarea id='insti4' name='insti4' $row1[institute]>$row1[institute]</textarea></td><td><textarea id='univ4' name='univ4' $row1[university]>$row1[university]</textarea></td><td><textarea id='spe4' name='spe4' $row1[specialisation]>$row1[specialisation]</textarea></td><td><textarea id='total4' name='total4' $row1[totalmarks]>$row1[totalmarks]</textarea></td><td><textarea id='totoutof4' name='totoutof4' $row1[totaloutof]>$row1[totaloutof]</textarea></td><td><textarea id='totpercent4' name='totpercent4' $row1[percent]>$row1[percent]</textarea></td><td><textarea id='yrpass4' name='yrpass4' $row1[yearofpassing]>$row1[yearofpassing]</textarea></td></tr>";
									}
									}									
									?>
									</table>
									<?php
							echo	"</td></tr>
							</table>
							<input type='hidden' id='ed' name='ed' value='ed'/>";
						echo "</td></tr>";
					}
					?>
					<?php
					if(isset($_POST['we']))
					{
					echo "<tr><td align='left'><h4>Internship</h4></td>
						  <td style='font-family:Comic Sans' colspan='6'>
						  <table border='0' width='100%'>";
						  $sql5="select * from acadportfolio where email='$email'";
									$res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
									while($row5=mysqli_fetch_array($res5))
									{
					echo "<tr><td align='left'><b>Period:</b> </td>
						  <td style='font-family:Comic Sans'><input type='text' name='period' id='period' size='55' value='$row5[period]'></td>
							<input type='hidden' id='period' name='period' value='period'/></tr>
							<tr><td align='left'><b>Company Name: </b></td>
						  <td style='font-family:Comic Sans'><input type='text' name='company' id='company' size='55' value='$row5[company]'></td>
							<input type='hidden' id='company' name='company' value='company'/></tr>
							<tr><td align='left'><b>Title:</b> </td>
						  <td style='font-family:Comic Sans'><input type='text' name='title' id='title' size='55' value='$row5[title]'></td>
							<input type='hidden' id='title' name='title' value='title'/></tr>
							<tr><td align='left'><b>Area: </b></td>
						  <td style='font-family:Comic Sans'><input type='text' name='area' id='area' size='55' value='$row5[area]'></td>
							<input type='hidden' id='area' name='area' value='area'/></tr>";
									}
					echo "</table>
							<input type='hidden' id='we' name='we' value='we'/>
							</td></tr>";
					}
					?>
					
					<?php
					if(isset($_POST['pd']))
					{
					echo "<tr><td>&nbsp;</td></tr><tr><td align='left'><h4>PERSONAL DETAILS</h4></td></tr>
					<tr><td align='left' colspan='20'><table border='0' width='100%'>";
					$sql6="select * from masteruser as m inner join istudent as s on m.email=s.email where m.email='$email'";
									$res6=mysqli_query($GLOBALS["___mysqli_ston"], $sql6);
									while($row6=mysqli_fetch_array($res6))
									{
 					echo"<tr><th align='left' width='125px'><font size='2'>Address :</font></th><td style='font-family:Comic Sans'><input type='text' name='address' id='address' style='width:100%' value='$row6[address]'/></td></tr>
                    <tr><th align='left'><font size='2'>Contact No. : </font></th><td style='font-family:Comic Sans'><input type='text' style='width:100%' name='mobile' id='mobile' value='$row6[mobile]'/></td></tr>
					<tr><th align='left'><font size='2'>Category : </font></th><td style='font-family:Comic Sans'><input type='text' style='width:100%' name='category' id='category' value='$row6[category] '/></td></tr>
					<tr><th align='left'><font size='2'>Minority : </font></th><td style='font-family:Comic Sans'><input type='text' style='width:100%' name='minority' id='minority' value='$row6[minority] '/></td></tr>
					<tr><th align='left'><font size='2'>Date Of Birth :</font></th><td colspan='2'><input type='text' style='width:100%' name='dob' id='dob' value='$row6[dob]'/></td></tr>
					<tr><th align='left'><font size='2'>Gender : </font></th><td colspan='2'><input type='text' style='width:100%' name='gender' id='gender' value='$row6[gender]'/></td></tr>";
					}
					echo "</table></td></tr>
					<input type='hidden' id='pd' name='pd' value='pd'/>";
					}
					?>	
					<tr></tr>	
					<?php
					if(isset($_POST['ho']))	
					{					
					echo "<tr><td align='left' width='25%'><h4>HOBBIES</h4></td>";
					$sql7="select * from acadportfolio where email='$email'";
									$res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
									while($row7=mysqli_fetch_array($res7))
									{
					echo "<td colspan='2'><textarea name='hobbies' id='hobbies' style='width:100%' $row7[hobbies]>$row7[hobbies]</textarea></td></tr>
					<input type='hidden' id='ho' name='ho' value='ho'/>";
					}
					}
					if(isset($_POST['lk']))	
					{
					echo "<tr> <td align='left'><h4>LANGUAGES KNOWN</h4></td>";
					$sql8="select * from acadportfolio where email='$email'";
									$res8=mysqli_query($GLOBALS["___mysqli_ston"], $sql8);
									while($row8=mysqli_fetch_array($res8))
									{
					echo "<td class='language' colspan='2'>
						<label>
							<input type='text' name='lang' id='lang' size='25' value='$row8[language]'/>
						</label>
						</td>
					</tr>
					<input type='hidden' id='lk' name='lk' value='lk'/>";
					}
					}
					if(isset($_POST['ref']))	
					echo "<tr><td align='left'><h4>REFERENCES</h4></td><td colspan='2'><textarea name='reference' id='reference' style='width:100%'></textarea></td></tr>
					<input type='hidden' id='ref' name='ref' value='ref'/>";
					?>
					<tr><td align="center" colspan="2"><input type="submit" name="print" value="Print Preview">
					<!--<input type="button" name="btn" value="Convert to PDF" onClick="convert(this);">-->
					</td></tr>
 				</form>
			</table> 
			<a href="presresume.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>
       	</fieldset></td>
     </td></tr>
	 
	</table> 
</div>
<!-- Content ends here -->
</div><br>
<div class="footer">
  <div class="footer-link">
  <br>Home | Privacy Policy | Terms of use | About
  <br /> www.dbit.in
  </div>
</div>
</div>

</body>
</html>
<?php
}
?>