<?php
ob_start();
session_start();
include '../logic/theme-master.php';
?>
<html>
<head>
<title>Placements</title>
<link rel="stylesheet" type="text/css" href="../css/stephen1.css">
<link type="text/css" rel="stylesheet" href="../css/style2.css" />

<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.pajinate.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="../css/demo_table.css">

<script>
$(document).ready( function () {
	$('#details').dataTable()
	
	
} );

</script>
<style>
#container_internal
{
margin-right:5px;
display:block;
margin-left:17%;
}
</style>
</head>
<body>

<div class='container'>
<?php
header_fn1();
?>
<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; TPO menu</h3>
</div>
<div style="float:right;">
<img src="../images/home.png" height="30px" width="30px"><a href="../tpoindex.php" style="text-decoration:none;margin-right:10px;color:black;"><strong>HOME</strong></a>
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
	  <li><a href='internship.php'>Post an Internship</a></li>
	  <li><a href='post.php'>Edit a Job POST</a></li>
	  <li><a href='editinternship.php'>Edit an Internship Post</a></li>
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
<div id='container_internal' >
<?php
include '../connection1.php';
$sql="select * from company where kt>='$_GET[q]' and deadkt>='$_GET[p]' and aggregate<='$_GET[s]' and status=1";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
if($count!=0)
{
echo "<table id='details' class='display'>";
echo "
<thead>
<tr>
<th>Company Name</th>
<th>Job title</th>
<th>Skills required</th>
<th>Package</th>
<th>Aggregate</th>
<th>Allowed Live KT's</th>
<th>Allowed Dead KT's</th>
<th>Date</th>
<th>Selection Process</th>
<th>Options</th>
</tr>
</thead><tbody>";
while($row=mysqli_fetch_array($res))
{
echo "<tr>
<td>".$row['cname']."</td>
<td>".$row['title']."</td>
<td>".$row['language']."</td>
<td>".$row['package']."</td>
<td>".$row['aggregate']."</td>
<td>".$row['kt']."</td>
<td>".$row['deadkt']."</td>
<td>".$row['date']."</td>
<td>".$row['process']."</td>
<td><form name='trial' method='POST'>
<input type='hidden' name='username' value='".$row['username']."'>
<input type='hidden' name='cnames' value='".$row['cname']."'>
<input type='hidden' name='kt' value='".$row['kt']."'>
<input type='hidden' name='deadkt' value='".$row['deadkt']."'>
<input type='hidden' name='aggregate' value='".$row['aggregate']."'>
<input type='hidden' name='user' value='$_GET[r]'>";
$cname=$row['cname'];
$sql1="select * from criteria where sname='$_GET[r]' and cname='$cname'";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$count1=mysqli_num_rows($res1);
if($count1!=0)
{
while($row1=mysqli_fetch_array($res1))
{
if($row1['status']==0)
{
echo "<h3 style='color:red'><b><center>Request sent</center></b></h3>";
echo	"<input type='submit' name='submit5' id='submit' value='Reject'>";
}
if($row1['status']==1)
{
echo "<h3 style='color:red'><b><center>Applied for job</center></b></h3>";
}
if($row1['status']==2)
{
echo "<h3 style='color:red'><b><center>Rejected</center></b></h3>";
echo	"<input type='submit' name='submit6' id='submit' value='Approve'>";
}
if($row1['status']==3)
{
echo "<h3 style='color:red'><b><center>Proposal Rejected</center></b></h3>";
}
}
}
else
{
echo	"<input type='submit' name='submit1' id='submit' value='Approve'>";
}

 echo "</form>
</td>

</tr>";
}
echo "</tbody></table>";
}
else
{
echo "<h3 style='color:red'><b><center>No such company!!</center></b></h3>";
}

if(isset($_POST['submit1']))
{
include '../connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$user=$_POST['user'];
$kt=$_POST['kt'];
$deadkt=$_POST['deadkt'];
$aggregate=$_POST['aggregate'];
$sql="insert into criteria(id,sname,cname,status)values('','$_POST[user]','$_POST[cnames]',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$sql="update masteruser set status=1 where name='$_POST[user]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$sql="update sinfo set status=1 where username='$_POST[user]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Student Approved!!', function (e) {
    window.location.href='./sett.php?q=$kt&p=$deadkt&s=$aggregate&r=$user';
});</SCRIPT>";

}

if(isset($_POST['submit5']))
{
$user=$_POST['user'];
$kt=$_POST['kt'];
$deadkt=$_POST['deadkt'];
$aggregate=$_POST['aggregate'];
$cnames=$_POST['cnames'];
include '../connect1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update criteria set status=2 where sname='$_POST[user]' and cname='$cnames'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Rejected', function (e) {
    window.location.href='./sett1.php?q=$kt&p=$deadkt&s=$aggregate&r=$user';
});
	
    </SCRIPT>";

}

if(isset($_POST['submit6']))
{
$user=$_POST['user'];
$kt=$_POST['kt'];
$deadkt=$_POST['deadkt'];
$aggregate=$_POST['aggregate'];
$cnames=$_POST['cnames'];
include '../connect1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update criteria set status=0 where sname='$_POST[user]' and cname='$cnames'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Approved', function (e) {
    window.location.href='./sett1.php?q=$kt&p=$deadkt&s=$aggregate&r=$user';
});
	
    </SCRIPT>";

}
?>
</div>


</div>
<?php
footer_fn();
?>
</div>

</body>
</html>

<!--echo "<div id='paging_container1' class='container1'><div class='page_navigation'></div><ul class='content1'>";
while(($row=mysql_fetch_array($res))&&($count!=0))
{
echo "
<li><b>Student name:</b>&#09;".$row['name']."<br/>

<b>Email:</b>&#09;".$row['email']."<br/>

<b>Phone:</b>&#09;".$row['phone']."<br/>";
if($row['status']==1)
{
echo "<b>Status:</b>&#09;Approved<br/>";
}
if($row['status']==0)
{
echo "<b>Status:</b>&#09;Not Approved<br/>";
}
if($row['status']==3)
{
echo "<b>Status:</b>&#09;Debarred<br/>";
}


echo "<p style='text-align:center;'>
<form name='trial' method='POST'>
<input type='hidden' name='username' value='".$row['username']."'>
<input type='hidden' name='name' value='".$row['name']."'>
<input type='submit' name='submit' value='Approve'>
<input type='submit' name='submit1' value='Debar'>
</form>
</p>
<br/>
</p>
</li>";
$count--;
}
echo "</ul></div>";-->
<?php
ob_flush();
?>