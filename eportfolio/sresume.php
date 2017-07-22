<?php include("resumeconnection.php");
	$con=mysqli_connect("localhost","root","","careerscope");

if(isset($_SESSION['user']))
{
?>
<html>
<head>
<title>RESUME</title>
<link href="Image/icon1.ico" rel="shortcut icon"/>

<script type="text/javascript">
function convert(){
	
	if(document.getElementById("be_percent"))
	var be_percent = document.getElementById("be_percent").value;
	if(document.getElementById("be_yop"))
	var be_yop = document.getElementById("be_yop").value;
	if(document.getElementById("hsc_spc"))
	var hsc_spc = document.getElementById("hsc_spc").value;
	if(document.getElementById("hsc_percent"))
	var hsc_percent = document.getElementById("hsc_percent").value;
	if(document.getElementById("hsc_yop"))
	var hsc_yop = document.getElementById("hsc_yop").value;
	if(document.getElementById("dip_board"))
	var dip_board = document.getElementById("dip_board").value;
	if(document.getElementById("dip_spc"))
	var dip_spc = document.getElementById("dip_spc").value;
	if(document.getElementById("dip_percent"))
	var dip_percent = document.getElementById("dip_percent").value;
	if(document.getElementById("dip_yop"))
	var dip_yop = document.getElementById("dip_yop").value;
	if(document.getElementById("ssc_ins_name"))
	var ssc_ins_name = document.getElementById("ssc_ins_name").value;
	if(document.getElementById("ssc_board"))
	var ssc_board = document.getElementById("ssc_board").value;
	if(document.getElementById("ssc_percent"))
	var ssc_percent = document.getElementById("ssc_percent").value;
	if(document.getElementById("ssc_yop"))
	var ssc_yop = document.getElementById("ssc_yop").value;
	if(document.getElementById("hobbies"))
	var hobbies = document.getElementById("hobbies").value;
	if(document.getElementById("lang"))
	var languages = document.getElementById("lang").value;
	if(document.getElementById("objective"))
	var objective = document.getElementById("objective").value;
	if(document.getElementById("reference"))
	var reference = document.getElementById("reference").value;
	if(document.getElementById("wrk_exp"))
	var wrk_exp = document.getElementById("wrk_exp").value;
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
	if(document.getElementById("co"))
	var co = document.getElementById("co").value;
	if(document.getElementById("ts"))
	var ts = document.getElementById("ts").value;
	if(document.getElementById("oth_skills"))
	var oth_skills = document.getElementById("oth_skills").value;
	if(document.getElementById("ed"))
	var ed = document.getElementById("ed").value;
	if(document.getElementById("we"))
	var we = document.getElementById("we").value;
	if(document.getElementById("pd"))
	var pd = document.getElementById("pd").value;
	if(document.getElementById("ho"))
	var ho = document.getElementById("ho").value;
	if(document.getElementById("lk"))
	var lk = document.getElementById("lk").value;
	if(document.getElementById("ref"))
	var ref = document.getElementById("ref").value;
	if(document.getElementById("hts_os"))
	var hts_os = document.getElementById("hts_os").value;
	if(document.getElementById("hts_pl"))
	var hts_pl = document.getElementById("hts_pl").value;
	if(document.getElementById("hts_sl"))
	var hts_sl = document.getElementById("hts_sl").value;
	if(document.getElementById("hts_oth"))
	var hts_oth = document.getElementById("hts_oth").value;
	if(document.getElementById("hskill1"))
	var hskill1 = document.getElementById("hskill1").value;
	if(document.getElementById("hskill2"))
	var hskill2 = document.getElementById("hskill2").value;

		var eng = hin = mar = '';
			
		// if(document.getElementsById("lang"))
		// {		
	
		// var chkname = document.getElementById('lang');
		
				// if(typeof chkname[0]!='undefined')
				// {	
					// if(chkname[0].checked == true)
						// var eng = "English";
				// }
				// if(typeof chkname[1]!='undefined')
				// {
					// if(chkname[1].checked == true)
                    // var hin = "Hindi";
				// }
				// if(typeof chkname[2]!='undefined')
				// {
					// if(chkname[2].checked == true)
                    // var mar = "Marathi";
				// }	
		// }
					
	var url = "test.php?be_percent="+be_percent+"&be_yop="+be_yop+"&hsc_spc="+hsc_spc+"&hsc_percent="+hsc_percent+"&hsc_yop="+hsc_yop+"&dip_board="+dip_board+"&dip_spc="+dip_spc+"&dip_percent="+dip_percent+"&dip_yop="+dip_yop+"&ssc_ins_name="+ssc_ins_name+"&ssc_board="+ssc_board+"&ssc_percent="+ssc_percent+"&ssc_yop="+ssc_yop+"&hobbies="+hobbies+"&languages="+languages+"&objective="+objective+"&reference="+reference+"&wrk_exp="+wrk_exp+"&ts_os="+ts_os+"&ts_pl="+ts_pl+"&ts_sl="+ts_sl+"&ts_oth="+ts_oth+"&skill1="+skill1+"&skill2="+skill2+"&co="+co+"&ts="+ts+"&oth_skills="+oth_skills+"&ed="+ed+"&we="+we+"&pd="+pd+"&ho="+ho+"&lk="+lk+"&ref="+ref+"&hts_os="+hts_os+"&hts_pl="+hts_pl+"&hts_sl="+hts_sl+"&hts_oth="+hts_oth+"&hskill1="+hskill1+"&hskill2="+hskill2;
	window.open(url);
}
</script>

<?php include("theme_set.php");
?>
</head>
<body >
<table align="center" border="1"> 
<tr><td>
<table border="1">
	<tr><td colspan="2"><?php include("header.php"); ?></td>  </tr>
    <tr><td colspan="2"><?php include("menu.php");   ?></td></tr>
    <tr><td colspan="2"><?php include("stopmenu.php");   ?></td></tr>
	<tr>
    <td width="200" valign="top"> <?php include("smenu.php"); ?></td>
	<td>
	<table width="616" border="0" style="font-family:Comic Sans,Georgia,Serif;">
	<tr><td style="font-family:Comic Sans">
			<td style="font-family:Comic Sans"><fieldset style="width:720">
        		<legend class="student"> <b>RESUME</b></legend>
				<table align="left" border="0">
					<tr>
	 	  				<td width="1000">&nbsp;</td>
						<td rowspan="10" align="right"><img src="<?php echo $resume_pic; ?>" width="140" height="160" border="1" align="right"></td>
					</tr>
					<tr align="left">
	 	  				<td style="font-family:Comic Sans" colspan="10"><h3></h3 >&nbsp;</td>
					</tr>
					<tr align="left">
						<td style="font-family:Comic Sans" colspan="10"><h3><?php echo $fname ; ?><BR><?php echo $email ;?></h3></td>
					</tr>
				</table>
				
				<p>-----------------------------------------------------------------------------------------------------------------------------------------------</p>
            <table width="616" cellpadding="4" cellspacing="1">
				<form method="post" action="sresumeaction.php">
				<?php
				if(isset($_POST['co']))
				echo "<tr align='left'><td ><h4>CAREER OBJECTIVES</h4></td><td><textarea name='objective' id='objective' style='width:100%' ></textarea></td></tr>
				<input type='hidden' id='co' name='co' value='co'/>";
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
						echo "<tr>
								<td align='left'>Programming Languages: </td>
								<td style='font-family:Comic Sans'><input type='text' name='ts_pl' id='ts_pl' size='55'></td>
							<input type='hidden' id='hts_pl' name='hts_pl' value='ts_pl'/></tr>";
						if(isset($_POST['ts_sl']))
						echo "<tr>
								<td align='left'>Scripting Languages: </td>
								<td style='font-family:Comic Sans'><input type='text' name='ts_sl' id='ts_sl' size='55'></td>
							<input type='hidden' id='hts_sl' name='hts_sl' value='ts_sl'/></tr>";
						if(isset($_POST['ts_oth']))
						echo "<tr>
								<td align='left'>Others: </td>
								<td style='font-family:Comic Sans'><input type='text' name='ts_oth' id='ts_oth' size='55'></td>
							<input type='hidden' id='hts_oth' name='hts_oth' value='ts_oth'/></tr>";
							echo "</table>
							<input type='hidden' id='ts' name='ts' value='ts'/>";
							echo "</td></tr>";
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
						echo "<table border='0'><tr><td align='left'><h4>EDUCATION DETAILS</h4></td></tr>
									<tr><td style='font-family:Comic Sans'>$dyn_table</td></tr>
							</table>
							<input type='hidden' id='ed' name='ed' value='ed'/>";
						echo "</td></tr>";
					}
					?>
					<?php
					if(isset($_POST['we']))
					echo "<tr><td style='font-family:Comic Sans'>&nbsp;</td></tr><tr><td align='left'><h4>WORK EXPERIENCE</h4></td><td colspan='2'><textarea name='wrk_exp' id='wrk_exp' style='width:100%' ></textarea></td></tr>
					<input type='hidden' id='we' name='we' value='we'/>";
					?>
					
					<?php
					if(isset($_POST['pd']))
					echo "<tr><td>&nbsp;</td></tr><tr><td align='left'><h4>PERSONAL DETAILS</h4></td></tr>
					<tr><td align='left' colspan='20'><table border='0' width='100%'>
 					<tr><th align='left' width='125px'><font size='2'>Address :</font></th><td style='font-family:Comic Sans'><input type='text' style='width:100%' value='$address'/></td></tr>
                    <tr><th align='left'><font size='2'>Contact No. : </font></th><td style='font-family:Comic Sans'><input type='text' style='width:100%' value='$mobilenumber'/></td></tr>
					<tr><th align='left'><font size='2'>Category : </font></th><td style='font-family:Comic Sans'><input type='text' style='width:100%' value='$category '/></td></tr>
					<tr><th align='left'><font size='2'>Date Of Birth :</font></th><td colspan='2'><input type='text' style='width:100%' value='$dob'/></td></tr>
					<tr><th align='left'><font size='2'>Gender : </font></th><td colspan='2'><input type='text' style='width:100%' value='$gender'/></td></tr>
					</table></td></tr>
					<input type='hidden' id='pd' name='pd' value='pd'/>";
					?>	
					<tr></tr>	
					<?php
					if(isset($_POST['ho']))					
					echo "<tr><td align='left' width='25%'><h4>HOBBIES</h4></td><td colspan='2'><textarea name='hobbies' id='hobbies' style='width:100%' ></textarea></td></tr>
					<input type='hidden' id='ho' name='ho' value='ho'/>";
					
					if(isset($_POST['lk']))	
					echo "<tr> <td align='left'><h4>LANGUAGES KNOWN</h4></td>
						<td class='language' colspan='2'>
						<label>
							<input type='text' name='lang' id='lang' size='25'/>
						</label>
						</td>
					</tr>
					<input type='hidden' id='lk' name='lk' value='lk'/>";
					
					if(isset($_POST['ref']))	
					echo "<tr><td align='left'><h4>REFERENCES</h4></td><td colspan='2'><textarea name='reference' id='reference' style='width:100%'></textarea></td></tr>
					<input type='hidden' id='ref' name='ref' value='ref'/>";
					?>
					<?php if($pInstitutionId== "Guest"){?>
					<tr><td align="center" colspan="2"><input type="submit" name="print" value="Print Preview" disabled>
					<input type="submit" name="btn" value="Convert to PDF" disabled></td></tr>
					<?php } else{?>
					<tr><td align="center" colspan="2"><input type="submit" name="print" value="Print Preview">
					<input type="button" name="btn" value="Convert to PDF" onClick="convert(this);">
					</td></tr><?php }?>
 				</form>
			</table> 
       	</fieldset></td>
     </td></tr>
	 
	</table> 
	</td>
	</tr>
	<tr><td colspan="2"><?php include("footer.php"); ?></td></tr>
</table> 
</td></tr>
</table>

</body> 
</html> 

<?php

}
?>