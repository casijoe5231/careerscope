<?php
	include 'includes/headerfooter.php';
    session_start();
    if($_SESSION['usertype']>=9 && $_SESSION['usertype']<=14)
	{
		echo "usertype:".$_SESSION['usertype'];
		include 'includes/connection2.php';
		$emaill=$_SESSION['user'][0];
		$usertype=$_SESSION['usertype'];
		date_default_timezone_set('Asia/Calcutta');
		$datetime = date("F j, Y, g:i a");
		$timesql = date("Y-m-d H:i:s"); 
		//$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Testmgr Home Page','$timesql')";
		//$res=mysql_query($sql)or die("query not executed");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CareerScope</title>

		<link rel="stylesheet" type="text/css" href="styles/style.css">
		<link rel="stylesheet" type="text/css" href="styles/default.css" />
		<link rel="stylesheet" type="text/css" href="styles/component.css" />
		<link rel="stylesheet" type="text/css" href="styles/custom.css" />
		
		<script src="js/modernizr.custom.js"></script>
		
	</head>

	<body>
		<div class="container">
			
			<?php
				header1();
			?>
			
			<div class="content">

				<div class="main-content">
		  		<!-- Main content to display -->
		  		<h1>HOD Index</h1>
		  		
		  		<a href="skill/">Personality profiling</a>
		  		</div>
		  
				<div class="sidebar">

				<div class="sidebar-menu">
					<?php
						if($usertype>=9 && $usertype<=14){
							echo "<a href='hodindex.php' class='active sidebar-menu-options'>";
							echo "<div>";
							echo "<span> HOD menu </span>";
							echo "</div>";
							echo "</a>";
						}

						if(($usertype>=10 && $usertype<=13) || ($usertype>=15 && $usertype<=18)){
							echo "<a href='lecturerindex.php' class='sidebar-menu-options'>";
							echo "<div >";
							echo "<span> Lecturer menu </span>";
							echo "</div>";
							echo "</a>";
						}

						if($usertype==11 || $usertype==13 || $usertype==14 || $usertype==16 || $usertype==18 || $usertype==19){
							echo "<a href='mentorindex.php' class='sidebar-menu-options'>";
							echo "<div>";
							echo "<span> Mentor menu </span>";
							echo "</div>";
							echo "</a>";
						}

						if($usertype==12 || $usertype==13 || $usertype==17 || $usertype==18){
							echo "<a href='testindex.php' class='sidebar-menu-options'>";
							echo "<div>";
							echo "<span> Test menu </span>";
							echo "</div>";
							echo "</a>";
						}
					?>
				</div>
		  		<?php
			  	/*if(isset($_SESSION['testmgr']))
				{
					echo "<h3> Welcome, <br><img src='images/im-user_profile.png' alt='Login' height='30px' style=\"padding-top:6px;\">";
					echo $_SESSION['testmgr'][1]." ";
					echo "<a href='logout.php' class='button'>Logout</a></h3><br>";
				}*/
				?>	
		  		</div>
			</div>
		
			<?php
				footer1();
			?>

		</div>
	</body>

</html>
<?php
}
else
{
	header("location:login.php?login=0");
}
?>