<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include '../styles/theme-master.php';
	include 'connection1.php';

	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql1="insert into activity(email,menu_accessed,timesql) values('$emaill','Self Assessment','$timesql')";
	$res=mysqli_query($con,$sql1)or die("query not executed");
	$stmt = "SELECT * FROM riasec_qus;";
	$result = mysqli_query($con,$stmt);


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Skill Assessment</title>
		<link rel="stylesheet" type="text/css" href="../styles/theme-style.css" />
		<link rel="stylesheet" type="text/css" href="../styles/theme-master.css" />
		<link rel="stylesheet" type="text/css" href="css/raisec.css" />
		<script type=text/javascript src="js/jQuery/jquery-2.1.1.min.js"></script>
		<script type=text/javascript >
		var clickarray = new Array();
		for(var i=0;i<9;i++)
		{
		clickarray[i]=new Array();
		}
		</script>
		<script type=text/javascript src="js/clicksense.js"></script>
		<script type=text/javascript src="js/presubmit.js"></script>
		<script type=text/javascript>
		$(document).ready(function(){
			var pos=1;
			var tmp,batch;
			//initializing display of every element to none
			for(var i=2;i<9;i++)
			{
				batch="#batch_"+i;
				$(batch).css({
					display:"none"});
			}
			//animation on next button
			$("#btn-next").click(function(){
				if(pos<9){
					tmp="#batch_"+(pos+1);
					$(tmp).css({
						display:"block"});
					if(pos<8)
					{
					tmp="#batch_"+pos;
					$(tmp).css({
						display:"none"});
					pos++;
					}
				}
				//document.getElementById("demo3").innerHTML = pos;
			});
			//animation on back button
			$("#btn-prev").click(function(){
				if(pos>0){
					tmp="#batch_"+(pos-1);
					$(tmp).css({
						display:"block"});
					if(pos>1)
					{
					tmp="#batch_"+pos;
					$(tmp).css({
						display:"none"});
					pos--;
					}
				}
				//document.getElementById("demo3").innerHTML = pos;
			});
			//document.getElementById("demo3").innerHTML = pos;
		});
		</script>
	</head>

	<body>
		<div class="bg">
			<div class="container">
			<?php
			header_fn();
			?>
				<div class="content">
					<br />
					<div class="title">
						<h3>&nbsp; Welcome 
						<?php 
						echo $_SESSION['user'][1];
						?>
						</h3>
					</div>
					<div id="test-title-container">
						<span id="test-title">Test Module 2</span>
						<br />
						<span style="font-size:18px;">Arrange the images on a scale of MOST FAVOURITE to the LEAST FAVOURITE choice</span>
					</div>


						<!--Holland Codes-->
						<!--div class="result" id="demo"></div>
						<div class="result" id="demo2"></div>
						<div class="result" id="demo3"></div>
						<div class="result" id="demo4"></div-->
						<div class="container-main">
							<?php
							for($i=1;$i<=8;$i++)
							{
							echo'<div class="container-holland" id="batch_'.$i.'">';
							echo	'<div class="option-box" id="here'.$i.'">';
								
								for($j=1;$j<=6;$j++)
								{
									$row=mysqli_fetch_array($result);
									echo '<div class="options" id="'.$i.$j.'" onclick="clicksense(this,'.$i.','.$j.');" style="background-image:url(imgop/img_'.$i.$j.'.jpg)">';
									echo '<div class="option-text" id="optext_'.$j.'"><p class="option-text-str">'.$row["Options"].'</p></div>';
									echo '</div>';
								}
								
								

							echo	'</div>';
							echo	'<div class="option-box" id="there'.$i.'">';
							echo	'</div>';
							echo'</div>';
							}
							?>
							<div id="button-container">
								<div id="nav-btn">
								<button id="btn-prev">< Back</button>
								<button id="btn-next">Next ></button>
								</div>
								<form action="holland_sub.php" id="form-send" method="post">
								<input id="r" name="r" type="hidden" value="" />
								<input id="i" name="i" type="hidden" value="" />
								<input id="a" name="a" type="hidden" value="" />
								<input id="s" name="s" type="hidden" value="" />
								<input id="e" name="e" type="hidden" value="" />
								<input id="c" name="c" type="hidden" value="" />
								<button type=button onclick="presubmit(clickarray)" id="btn-send" >Submit</button>
								</form>
							</div>
						</div>

				</div>

			</div>
			<?php
			footer_fn();
			?>
		</div>
	</div>

</body>
</html>
<?php
}
elseif(isset($_SESSION['hod']))
{
					echo "<html><head><script src='../js/alertify.min.js'></script>
					<link rel='stylesheet' href='../css/alertify.core.css' />
					<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
					echo "<SCRIPT LANGUAGE='JavaScript'>
					alertify.alert('Access Restriction!!!', function (e) {
					window.location.href='home.php';
					});
					</SCRIPT>";
}
elseif(isset($_SESSION['lecturer']))
{
					echo "<html><head><script src='../js/alertify.min.js'></script>
					<link rel='stylesheet' href='../css/alertify.core.css' />
					<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
					echo "<SCRIPT LANGUAGE='JavaScript'>
					alertify.alert('Access Restriction!!!', function (e) {
					window.location.href='home.php';
					});
					</SCRIPT>";
}
else
{
		header('location:../login.php');
		exit();
}

?>