<html>
<head>
<script type="text/javascript" charset="utf-8" src="../js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/ColVis.js"></script>

<script type="text/javascript" charset="utf-8" src="../js/ColumnFilterWidgets.js"></script>
<link rel="stylesheet" type="text/css" href="../css/demo_table.css">
<link rel="stylesheet" type="text/css" href="../css/ColVis.css">

<link rel="stylesheet" type="text/css" href="../css/ColumnFilterWidgets.css">
<link rel="stylesheet" type="text/css" href="../css/stephen1.css">
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<script>
$(document).ready( function () {
	$('#details').dataTable( {
		 bAutoWidth:false ,
		"sDom": 'W<"clear">lfrtip',
		 oColumnFilterWidgets: {
        aiExclude: [7,8]
       }
	} );
} );


/*$(document).ready( function () {
	$("#details").dataTable().columnFilter();
} );*/
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
<?php

include "../connection1.php";
$sql="select c.username,c.cname,s.name,c.title,c.date,c.placed,c.appeared,c.status from clist as c inner join masteruser as s on c.username=s.name where c.status=1 and c.appeared=0";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);


echo "<div class='container'>
<div class='header'>
<img src='../images/logo.png' height='80px' align='left'>
<h1>TRAINING & PLACEMENT PORTAL</h1>
</div>
<div class='content'>
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

echo "<table id='details' class='display'>";
echo "
<thead>
<tr>
<th>Company Name</th>
<th>Student Name</th>
<th>Title</th>
<th>Date</th>
<th>Placed</th>
<th>Options</th>
</tr>
</thead><tbody>";
while($row=mysqli_fetch_array($res))
{
echo "<tr>
<td>".$row['cname']."</td>
<td>".$row['name']."</td>
<td>".$row['title']."</td>
<td>".$row['date']."</td>
<td>".$row['placed']."</td>
<td><form name='trial' method='POST'>
<input type='hidden' name='username' value='".$row['username']."'>
<input type='hidden' name='cname' value='".$row['cname']."'>";

echo "<input type='submit' name='submit' id='submit' value='Appeared & Rejected'>";
echo "<input type='submit' name='submit1' id='submit' value='Appeared & Placed'>
</form>
</td>

</tr>";
}
echo "</tbody></table>";



echo "</div>
<br/>
<br/>
<br/>
</div>

<div class='footer'>
Privacy Policy | Terms of use | FAQ's
</div>
</div>
</div>
}
";

?>
<?php
if(isset($_POST['submit']))
{
include '../connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update clist set appeared=1,placed='unplaced' where username='$_POST[username]' and cname='$_POST[cname]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die("query not executed");
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Student Status Set!!', function (e) {
    window.location.href='./appeared.php';
});
	
    </SCRIPT>";

}
if(isset($_POST['submit1']))
{
include '../connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update clist set appeared=1,placed='placed' where username='$_POST[username]' and cname='$_POST[cname]'";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$sql="update sinfo set placed='placed' where username='$_POST[username]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Student Status Set!!', function (e) {
    window.location.href='./appeared.php';
});</SCRIPT>";

}


?>
</body>
</html>
