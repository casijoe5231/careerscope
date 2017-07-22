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
<div class="container">
<div class="header"><img src="images/careerscope.jpg" width="250"  height="80" alt="CareerScope logo" align="left"/>
 <img src="images/dbit.png"  width="6%" alt="DBIT"  align="right"/> </div>
<div class="header-shadow"></div>
  
<div class="content">
 
 
  <div class="main-content">
  <!-- Main content to display -->
<br>

<div id="slider1">
		<div class="viewport">
		<ul class="overview">
		<li><img src="images/s.jpg" width="800px" height="300px"></li>
		<li><a href="#"><img src="images/skill.jpg" width="99%" height="300px"></a></li>
		<li><a href="#"><img src="images/aptitude.jpg" width="99%" height="300px"></a></li>
		<li><a href="#"><img src="images/placement.jpg" width="99%" height="300px"></a></li>
		<li><a href="#"><img src="images/career.jpg" width="99%" height="300px"></a></li>
		<li><a href="#"><img src="images/training.jpg" width="99%" height="300px"></a></li>
		<li><a href="#"><img src="images/alumni.jpg" width="99%" height="300px"></a></li>
		<li><a href="#"><img src="images/conclusion.png" width="99%" height="300px"></a></li>
		</ul>
		</div>
		<ul class="pager">
		<li><a rel="0" class="pagenum" href="#">1</a></li>
		<li><a rel="1" class="pagenum" href="#">2</a></li>
		<li><a rel="2" class="pagenum" href="#">3</a></li>
		<li><a rel="3" class="pagenum" href="#">4</a></li>
		<li><a rel="4" class="pagenum" href="#">5</a></li>
		<li><a rel="5" class="pagenum" href="#">6</a></li>
		<li><a rel="6" class="pagenum" href="#">7</a></li>
		<li><a rel="7" class="pagenum" href="#">8</a></li>
		</ul>
		</div>
		<br>
  
  
<div id="redblock" style="float:left;width:995px;background:red;height:25px;">
<marquee scrollamount="2" scrolldelay="30" style="color:white;font-weight:bold;">Welcome to Careerscope!!</marquee>
</div> 
  

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
