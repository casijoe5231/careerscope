<?php
include '../logic/theme-master.php';
?>
<html>
<head>
<title>Placements</title>
<link rel="stylesheet" type="text/css" href="../css/stephen1.css">
<!-- Autosize Scripts -->
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<style>

			.animated {
				-webkit-transition: height 0.2s;
				-moz-transition: height 0.2s;
				transition: height 0.2s;
			}

		</style>
<script src="../js/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="../css/uploadify.css">
<script src='../js/jquery.autosize.js'></script>
		<script>
			$(function(){
				
				$('.animated').autosize();
			});
		</script>
		
<!-- Auto size scripts end here -->	
<style>

#container_internal
{
margin-right:25%;
margin-left:auto;
}
#report tr:first-child
{
background-color:#0099FF;
border:none;

}
table {
    border:1px solid #CCC;
    border-collapse:collapse;
}
</style>

<script language="javascript" type="text/javascript" src="../js/jquery.jqplot.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.jqplot.min.css" />
<script type="text/javascript" src="../js/jqplot.pieRenderer.min.js"></script>
<script type="text/javascript" src="../js/jqplot.donutRenderer.min.js"></script>
</head>
<body>
<?php
session_start();

if(isset($_SESSION['user4']))
{
include '../connection1.php';
$name=$_SESSION['user4'][1];
$sql="select * from masteruser where name='$name' and role='Staff'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname from clist order by cname;");
if($count==1)
{

echo "

<div class='container'>";
header_fn1();
echo "<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Placements Menu</h3>
</div>
<div style='float:right;'>
<img src='../images/home.png' height='30px' width='30px'><a href='../tpoindex.php' style='text-decoration:none;margin-right:10px;color:black;'><strong>HOME</strong></a>
</div>
<br>
<br>
<br>
<br>
<div id='menu'>
<ul>
  <li><h2>Job Related Functions</h2>
    <ul>
      <li><a href='tpo.php'>Post a Job</a></li>
	  <li><a href='post.php'>Edit a Job POST</a></li>
    </ul>
  </li>
  <li><h2>Student Related Functions</h2>
    <ul>
      <li><a href='dreview.php'>Delete/approve reviews</a></li>
	  <li><a href='details.php'>View Student Details</a></li>
	  <li><a href='set.php'>Confirm Students</a></li>
	  <li><a href='appeared.php'>Set Student Status</a></li>
	  <li><a href='joboffer.php'>Confirm Student proposals</a></li>
    </ul>
  </li>
  <li><h2>Recruiter Related Functions</h2>
    <ul>
      <li><a href='status.php'>View Company Posts</a></li>
	  <li><a href='verify.php'>Verify Company Details</a></li>
	  <li><a href='stats.php'>View companies statistics</a></li>
    </ul>
  </li>
</ul>
</div>
<div id='container_internal' >";

echo "<form method='POST' style='text-align:center'><input type='submit' name='submit' id='submit' value='Select manually'>
<input type='submit' id='submit' name='submit1' value='Display All'></form>";
if(isset($_POST['submit1']))
{ 

$_SESSION['submit1']="set";
if(isset($_SESSION['submit']))
{
unset($_SESSION['submit']);
}

}
if(isset($_POST['submit']))
{ 

$_SESSION['submit']="set";
if(isset($_SESSION['submit1']))
{
unset($_SESSION['submit1']);
}

}

if(isset($_SESSION['submit1']))
{
$sql="select distinct cname from clist";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
$sqlvalue="select * from masteruser where role='Student'";
$value=mysqli_query($GLOBALS["___mysqli_ston"], $sqlvalue);
$total=mysqli_num_rows($value);
//echo $total;
echo "
<table id='report'>
<tr>
<th>Company Name</th>
<th>Placed</th>
<th>Appeared</th>
</tr>";
$count6=array();
$count7=array();
while($row=mysqli_fetch_array($res))
{
$sql="select * from clist where cname='".$row['cname']."' and placed='placed' and appeared=1";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count2=mysqli_num_rows($res1);

$sql="select * from clist where cname='".$row['cname']."' and appeared=1";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count3=mysqli_num_rows($res1);
$sql="select * from clist where cname='".$row['cname']."' and placed='placed'";
$values=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$value1=mysqli_num_rows($values);
//echo $value1;
$count7[]=$row['cname'];
$count6[]=$value1;
echo "
<tr>
<td>".$row['cname']."</td>
<td>".$count2."</td>";

echo "<td>".$count3."</td>";		
echo "</tr>";
}
$i=0;
$data="";
while($count>0)
{

$data.="['".$count7[$i]."',".$count6[$i]."],";
$count--;
$i++;
}


$final=0;
$final=array_sum($count6);

//echo $final;
$total=$total-$final;
//echo $total;
echo "</table>";
echo "<p>Placement Statistics</p>";
echo "<script>
$(document).ready(function(){
  var data = [
    ".$data." ['Unplaced', ".$total."]
  ];
  var plot1 = jQuery.jqplot ('chart1', [data], 
    { 
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true
        }
      }, 
      legend: { show:true, location: 'e' }
    }
  );
});
</script>
<div id='chart1'></div>";
}

if(isset($_SESSION['submit']))
{
echo "<center>";
echo "<p>Company Name:";
echo "<select name='name' onchange=window.location='stats.php?q='+this.value>";


if(!isset($_GET["q"]))
{
echo "<option value=''>SELECT COMPANY NAME</option>";
while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['cname'])."'>".addslashes($row['cname'])."</option>";
}
}
else 
{
echo "<option value='".$_GET["q"]."'>".$_GET["q"]."</option>";
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname from clist where cname<>'".trim($_GET["q"],"%20")."' order by cname;");

while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['cname'])."'>".addslashes($row['cname'])."</option>";
}

}

echo "</select>&nbsp;&nbsp;";

function strip($a)
{

$b=explode(" ",$a);

$c=implode(" ",$b);
trim($c," ");

return $c;
}



if(isset($_GET["q"]))
{


$q1=strip($_GET["q"]);
$sql1="select distinct title from clist where cname='".$q1."'";

$list1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);



if(!isset($_GET["p"]))
{
$q1=urlencode($q1);
echo "<select name='name' onchange=window.location='stats.php?q=$q1&p='+this.value>";



$count=true;
while($row=mysqli_fetch_array($list1))
{
if($count)
{echo "<option value=\"SELECT JOB TITLE\">SELECT JOB TITLE</option>";
$count=false;
}
echo "<option value='".addslashes($row['title'])."'>".addslashes($row['title'])."</option>";
}



echo "</select></p>";
}

if(isset($_GET["p"]))
{
$q1=urlencode($q1);
echo "<select name='name' onchange=window.location='stats.php?q=$q1&p='+this.value>";




echo "<option value='".$_GET["p"]."'>".$_GET["p"]."</option>";
$list1=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct title from clist where title<>'".$_GET["p"]."' and cname='".$q1."'");
while($row=mysqli_fetch_array($list1))
{

echo "<option value='".addslashes($row['title'])."'>".addslashes($row['title'])."</option>";
}


echo "</select></p>";
}


}



if((isset($_GET["q"]))&&(isset($_GET["p"])))
{
$q=urldecode($_GET["q"]);
$p=$_GET["p"];
$sql="select * from clist where cname='$q' and title='$p' and placed='placed' and appeared=1";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
$sql="select * from clist where cname='$q' and title='$p' and appeared=1";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count3=mysqli_num_rows($res1);
while($row=mysqli_fetch_array($res))
{

echo "

<table id='report'>
<tr>
<th>Company Name</th>
<th>Placed</th>
<th>Appeared</th>
</tr>
	
<tr>
<td>".$row['cname']."</td>
<td>".$count."</td>
<td>".$count3."</td>		
</tr>
	
	
</table>

</center>
";

}

}
}
echo "</div>


</div>";
footer_fn();
echo "</div>
</div>

";
}
else 
{
echo "You do not have permission to access this page.Redirecting to Home.<meta http-equiv='refresh' content='2;url=../index.php'>";
}
}
else
{
echo "YOU HAVE NOT LOGGED IN.PLZ LOGIN.<meta http-equiv='refresh' content='2;url=./tlogin.php'>";
}
?>

</body>
</html>
