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
<link rel="stylesheet" href="website.css" media="screen">
<script src="jquery.js"> </script>
<script src="jquery.tinycarousel.min.js"> </script>
<script>
$(function()
{
$("#slider1").tinycarousel({interval:true,pager:true});
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
<h1 style="text-align:center;text-shadow: 5px 5px 5px #CC6699;"><b>Which Career Path To Choose After BE?</b></h1>
<br>
<div id="slider1">
		<div class="viewport">
		<ul class="overview">
		<li><img src="images/s.jpg" width="800px" height="300px"></li>
		<li><a href="comp.php"><img src="images/t.jpg" width="99%" height="300px"></a></li>
		<li><a href="it.php"><img src="images/u.jpg" width="99%" height="300px"></a></li>
		<li><a href="mech.php"><img src="images/w.jpg" width="99%" height="300px"></a></li>
		<li><a href="extc.php"><img src="images/y.jpg" width="99%" height="300px"></a></li>
		</ul>
		</div>
		<ul class="pager">
		<li><a rel="0" class="pagenum" href="#">1</a></li>
		<li><a rel="1" class="pagenum" href="#">2</a></li>
		<li><a rel="2" class="pagenum" href="#">3</a></li>
		<li><a rel="3" class="pagenum" href="#">4</a></li>
		<li><a rel="4" class="pagenum" href="#">5</a></li>
		</ul>
		</div>
		<br>
<a href="../index.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>


		
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>