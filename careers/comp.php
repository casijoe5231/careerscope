<?php
    session_start();
	if(!isset($_SESSION['username']))
	{
		header('location:index.php');
		exit();
	}
	include 'styles/theme-master.php';
	?>
<!DOCTYPE html>
<html><head><title>Career Path</title>
<link rel="icon" href="images/career.jpg" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">



</head>
<body>
<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content">
<br>
<div class="title">
<h3>&nbsp; Welcome 
<?php 
echo $_SESSION['username'][1];
?>
</h3>
</div>

<br>
<br>
<br>
<br>
<h3 style="text-align:center;text-shadow: 5px 5px 5px #CC6699;"><b>Computer Engineering</b><br></h3>
<br>
Upon receiving a degree in Computer Engineering, there are many career possibilities to chose from. A few of these possibilities are:
<ul>
<li><a href="compengg.php" style="text-decoration:none;color:black;">Computer Engineer</a></li>
<li><a href="comparch.php" style="text-decoration:none;color:black;">Computer Architect</a></li>
<li><a href="nwengg.php" style="text-decoration:none;color:black;">Networking Engineer</a></li>
<li><a href="swengg.php" style="text-decoration:none;color:black;">Software Engineer</a></li>
</ul>
<br>
<br>
<a href="index.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>
<br>
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>