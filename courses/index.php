 <?php
    session_start();
	include 'styles/theme-master.php';
	
	include '../connection1.php';

	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Training and Certifications Home Page','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<!DOCTYPE html>
<html>
<head>
<title>Training & Certification</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head><body onLoad="MM_preloadImages('images/logo_course_l.png, images/logo_course_l.png, images/logo_course_l.png','images/logo_course_l.png')">
<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content">
<br>
<?php
	if(isset($_SESSION['user']))
	{
      echo "<div class='title'>";
	  echo "<h3>&nbsp; Welcome "; 
	  echo $_SESSION['user'][1];
	  echo "</h3>";
	  echo "</div>";
	  echo "<a href='logout.php' class='button right'>Logout</a>";
	  echo "<a href='./home.php' class='button right'>My Tests</a>";
    }
	else
	 echo "<a href='./login.php' class='button right' >Login</a>";
?>
<div class="box">

<div class="grid_outer clearfix">

<div class="grid_row">
	<div class="grid">
	<b>Computer Engineering</b>
	<a href="select.php?type=comp" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image1','','images/logo/logo_course_l.png',1)"><img src="images/logo/logo_course.png" width="100%" id="Image1" ></a>
	</div>
	
	<div class="grid">
	<b>Information Technology</b>
	<a href="select.php?type=it" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','images/logo/logo_course_l.png',1)"><img src="images/logo/logo_course.png" width="100%" id="Image2" ></a>
	</div>
</div>

	<div class="divider"></div>

<div class="grid_row">
	<div class="grid">
	<b>E.X.T.C</b>
	<a href="select.php?type=extc" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','images/logo/logo_course_l.png',1)"><img src="images/logo/logo_course.png" width="100%" id="Image3" ></a>
	</div>
	
	<div class="grid">
	<b>Mechanical Engineering</b>
	<a href="select.php?type=mech" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image4','','images/logo/logo_course_l.png',1)"><img src="images/logo/logo_course.png" width="100%" id="Image4" ></a>
	</div>
</div>



<br>
<br>
<br>

</div>



<br><br><br>
<a href="./administration" target="_blank" class="button" >Administration</a>
<a href="select.php" class="button" >View all Courses</a><br><br>
<a href="../newindex.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>
</div>
<br><br><br>
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>