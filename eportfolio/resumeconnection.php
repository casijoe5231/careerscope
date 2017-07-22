<?php
include("database.php");
$email=$_SESSION['user'][0];
?>
<style>
	textarea
	{
		height:50px;
		width:150px;
		font-family:Comic Sans;
	}
	.input
	{
		height:50px;
		width:100%;
	}
	select
	{
		height:50px;
	}
</style>
<?php


//Academic details
		
$sql=mysqli_query($db, "SELECT * FROM qualification_master WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$row = mysqli_fetch_array($sql);

	if($row["ssc_hsc_diploma"]=='SSC')
	{
		$ssc=$row["ssc_hsc_diploma"];
		$institute = $row["institute"];
		$board = $row["board"];
		$stream = $row["stream"];
		$total = $row["total"];
		$outof = $row["outof"];
		$percent = $row["percent"];
		$yearofpassing = $row["yearofpassing"];
	}
	
	if($row["ssc_hsc_diploma"]=='HSC')
	{
		$ssc=$row["ssc_hsc_diploma"];
		$institute1 = $row["institute"];
		$board1 = $row["board"];
		$stream1 = $row["stream"];
		$total1 = $row["total"];
		$outof1 = $row["outof"];
		$percent1 = $row["percent"];
		$yearofpassing1 = $row["yearofpassing"];
		$cet_score = $row["cet_score"];
	}
	
	if($row["ssc_hsc_diploma"]=='Diploma')
	{
		$ssc=$row["ssc_hsc_diploma"];
		$institute2 = $row["institute"];
		$board2 = $row["board"];
		$stream2 = $row["stream"];
		$total2 = $row["total"];
		$outof2 = $row["outof"];
		$percent2 = $row["percent"];
		$yearofpassing2 = $row["yearofpassing"];
	}
	

$opt = "";
for($i=2000;$i<date('Y');$i++)
$opt .= "<option value='$i'>$i</option>";
// Establish the output variable
$dyn_table = '<table border="0" width="620">';
$dyn_table .= '<tr><th>Qualification</th><th>School/Institute</th><th>Board/Univ</th><th>Stream</th><th>Total</th><th>Out of</th><th>Percentage/CGPA</th><th>Yop</th></tr>';
if($ssc=='SSC')
	{
$dyn_table .= '<tr><td><b>SSC</b></td><td><textarea id="hsc_inst" name="hsc_inst" '.$institute.'>'.$institute.'</textarea></td>';
	$dyn_table .= '<td><textarea id="hsc_board" name="hsc_board" '.$board.'>'.$board.'</textarea></td><td><textarea id="hsc_str" name="hsc_str" '.$stream.'>'.$stream.'</textarea></td><td><textarea id="hsc_tot" name="hsc_tot" '.$total.'>'.$total.'</textarea></td><td><textarea id="hsc_out" name="hsc_out" '.$outof.'>'.$outof.'</textarea></td><td><textarea id="hsc_percent" name="hsc_percent" '.$percent.'>'.$percent.'</textarea></td><td><textarea id="hsc_pass" name="hsc_pass" '.$yearofpassing.'>'.$yearofpassing.'</textarea></td></tr>';
	}
if($ssc=='HSC')
	{
$dyn_table .= '<tr><td><b>HSC</b></td><td><textarea id="hsc_inst" name="hsc_inst" '.$institute1.'>'.$institute1.'</textarea></td>';
	$dyn_table .= '<td><textarea id="hsc_board" name="hsc_board" '.$board1.'>'.$board1.'</textarea></td><td><textarea id="hsc_str" name="hsc_str" '.$stream1.'>'.$stream1.'</textarea></td><td><textarea id="hsc_tot" name="hsc_tot" '.$total1.'>'.$total1.'</textarea></td><td><textarea id="hsc_out" name="hsc_out" '.$outof1.'>'.$outof1.'</textarea></td><td><textarea id="hsc_percent" name="hsc_percent" '.$percent1.'>'.$percent1.'</textarea></td><td><textarea id="hsc_pass" name="hsc_pass" '.$yearofpassing1.'>'.$yearofpassing1.'</textarea></td></tr>';
	}
$dyn_table .= '</table>';

?>