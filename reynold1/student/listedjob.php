<html>
<head>
<title>TRAINING & PLACEMENT PORTAl</title>
<script type="text/javascript" charset="utf-8" src="../js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/ColVis.js"></script>
<!--<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.columnFilter.js"></script>

<link rel="stylesheet" type="text/css" href="../css/demo_page.css">-->

<link rel="stylesheet" type="text/css" href="../css/demo_table.css">
<link rel="stylesheet" type="text/css" href="../css/ColVis.css">

<link rel="stylesheet" type="text/css" href="../css/stephen1.css">
<!-- Autosize Scripts -->
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>

<script>
$(document).ready( function () {
	$('#details').dataTable( {
		"sDom": 'C<"clear">lfrtip',
		 /*"oColVis": {
			"aiExclude": [ 14,15 ]
		}*/
		
	} );
} );


/*$(document).ready( function () {
	$("#details").dataTable().columnFilter();
} );*/
</script>
</head>
<body>
<?php
session_start();
include "../connect1.php";
$sql=mysqli_query($GLOBALS["___mysqli_ston"], "select count(username) as count from clist where username='TPO-".$_SESSION['username']."'");

while($row=mysqli_fetch_array($sql))
{
$count=$row['count'];
}
if($count==0)
{
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('You Have No New Offers!!', function (e) {
    window.location.href='./view.php';
});
	
    </SCRIPT>";
}
else
{
$sql=mysqli_query($GLOBALS["___mysqli_ston"], "select * from clist where username='TPO-".$_SESSION['username']."'");
$count=mysqli_num_rows($sql);
if(($count!=null)&&($count>1))
{
$cname=array();
$title=array();
while($row=mysqli_fetch_array($sql))
{
$cname=$row['cname'];
$title=$row['title'];
}
$sql1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from company where cname in (".implode(",",$cname).") and title in (".implode(",",$title).")");
}
if(($count!=null)&&($count==1))
{
while($row=mysqli_fetch_array($sql))
{
$cname=$row['cname'];
$title=$row['title'];
}

$sql1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from company where cname='".$cname."' and title='".$title."'");
}

//style=\" overflow-x:scroll; \"
echo "<div class='container'>
<div class='header'>
<img src='../images/logo.png' height='80px' align='left'>
<h1>TRAINING & PLACEMENT PORTAL</h1>
</div>
<div class='content' >
<br>
<div class='title'>
<h3>&nbsp; TPO Menu</h3>
</div>
<br>
<br>
<br>
<br>
<div id='menu'>
<ul>

  <li><h2>Student Related Functions</h2>
    <ul>
      <li><a href='view.php'>View Company List</a></li>
	  <li><a href='appeared.php'>Submit job request</a></li>
	  <li><a href='listedjob.php'>Recommended jobs</a></li>
	  <li><a href='review.php'>Give Company Feedback</a></li>
	  <li><a href='dreview.php'>Company Reviews</a></li>
	  <li><a href='sinfo.php'>CREATE YOUR PROFILE</a></li>
	</ul>
  </li>
 
  <li><h2><a href='logout.php' style='background-color: #0066FF; border:0px; color: #fff;'>Logout</a></h2></li>
</ul>
</div>
<div id='container_internal' >";

echo "<table id='details' class='display'>";
echo "
<thead>
<tr>
<th>Company Name</th>
<th>Job Title</th>
<th>Profile</th>
<th>Skills required</th>
<th>Package</th>
<th>Posting Locations</th>
<th>Aggregate</th>
<th>Allowed KT's</th>
<th>Date</th>
<th>Options</th>
</tr>
</thead><tbody>";
while($row=mysqli_fetch_array($sql1))
{
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select * from clist where cname='".$row['cname']."' and title='".$row['title']."' and username='$_SESSION[username]'");

$count=mysqli_num_rows($list);

if($count==0)
{
echo "<tr>
<td>".$row['cname']."</td>
<td>".$row['title']."</td>
<td>".$row['profile']."</td>
<td>".$row['language']."</td>
<td>".$row['package']."</td>
<td>".$row['location']."</td>
<td>".$row['aggregate']."</td>
<td>".$row['kt']."</td>
<td>".$row['date']."</td>

<td><form name='trial' method='POST'>
<input type='hidden' name='username' value='".$row['username']."'>
<input type='hidden' name='title' value='".$row['title']."'>
<input type='hidden' name='date' value='".$row['date']."'>
<input type='hidden' name='cname' value='".$row['cname']."'>";
echo "<input type='submit' name='submit' value='Accept Job Offer'>";
echo "</form>
</td>
</tr>";
}
}
echo "</tbody></table>";
echo "</div>
<br/>
<br/>
<br/><p style='text-align:center;'><a href='view.php'>RETURN TO PREVIOUS PAGE</a></p>
</div>

<div class='footer'>
Privacy Policy | Terms of use | FAQ's
</div>
</div>
</div>

";
}
if(isset($_POST['submit']))
{

include '../connect1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update clist set username='".$_SESSION['username']."' where username='TPO-".$_SESSION['username']."'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die("query not executed");

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die("query not executed");
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Proposal Accepted!!', function (e) {
    window.location.href='./listedjob.php';
});
	
    </SCRIPT>";

}
?>

</body>
</html>
