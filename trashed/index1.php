<?php
    session_start();
	include 'connection.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css">
		<link rel="stylesheet" type="text/css" href="styles/default.css" />
		<link rel="stylesheet" type="text/css" href="styles/component.css" />
		<script src="js/modernizr.custom.js"></script>
<title>CareerScope</title>
</head>
<body>
<div class="container">
<div class="header"><img src="images/careerscope_banner.png" width="18%" alt="CareerScope logo" align="left"/>
  <img src="images/dbit.png"  width="6%" alt="DBIT"  align="right"/> </div>
<div class="header-shadow"></div>
  
<div class="content">
 
 
  <div class="main-content">
  <!-- Main content to display -->
 
  
  <ul class="grid cs-style-3">
				<li>
					<figure>
						<img src="images/4.png" alt="img04">
						<figcaption>
							<h3>Skill Assessment</h3>
							<a href="./skill">Start</a>
						</figcaption>
					</figure>
				</li>
				<li>
					<figure>
						<img src="images/1.png" alt="img01">
						<figcaption>
							<h3>Aptitude</h3>
							<a href="./aptitude">Start</a>
						</figcaption>
					</figure>
				</li>
				<li>
					<figure>
						<img src="images/2.png" alt="img02">
						<figcaption>
							<h3>Placements</h3>
							<a href="./reynold1">View</a>
						</figcaption>
					</figure>
				</li>
				<li>
					<figure>
						<img src="images/5.png" alt="img05">
						<figcaption>
							<h3>Career Path</h3>
							<a href="./careers">View</a>
						</figcaption>
					</figure>
				</li>
				<li>
					<figure>
						<img src="images/3_b.png" alt="img03">
						<figcaption>
							<h3>Training Certifications</h3>
							<a href="./courses">View</a>
						</figcaption>
					</figure>
				</li>
				<li>
					<figure>
						<img src="images/6.png" alt="img06">
						<figcaption>
							<h3>Alumni</h3>
							<a href="#">Join</a>
						</figcaption>
					</figure>
				</li>
			</ul>
  </div>
  
  <div class="sidebar">
  <?php
  if(isset($_SESSION['username']))
	{
		echo "<h3> Welcome, <br><img src='images/im-user_profile.png' alt='Login' height='30px' style=\"padding-top:6px;\">";
		echo $_SESSION['username'][1]." ";
		echo "<a href='logout.php' class='button'>Logout</a></h3><br>";
	}
	else
	{
		  echo "<br /><h3>Login or Register</h3>";
  		  echo "<div class='login'>";
  		  echo "<a href='login.php' class='button'><img src='images/lock.png' alt='Login' height='25px'>Login</a>";
  		  echo "<a href='./register' class='button'><img src='images/user.png' alt='Register' height='25px'>Register</a>";
  		  echo "<br /><br />";
 		  echo "</div>";
	}
	?>	

  	<div class="sidebar-title">
    <h3>News Feed</h3>
    </div>
  <ul>
  <li>Infosys Campus placement drive on 30th August 2013. <a>More..</a></li>
  <li>New Tests on Logic & Mathematics available. <a>View</a></li>
  <li>Find your career goal. Career Path. <a>View</a></li>
  <li>Pre-placement drive organized by Training & Placement on 25th August 2013.<a>More..</a></li>
  <br /><br />
  </ul>
  </div>



</div>
<div class="footer">
  <div class="footer-link">
  <br>Home | Privacy Policy | Terms of use | About
  <br /> www.dbit.in
  </div>
</div>

</div>
</body>
</html>
