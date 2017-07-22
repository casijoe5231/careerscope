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


<script type="text/javascript" charset="utf-8" src="../js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/ColumnFilterWidgets.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/ColVis.js"></script>

<link rel="stylesheet" type="text/css" href="../css/ColumnFilterWidgets.css">
<link rel="stylesheet" type="text/css" href="../css/demo_table.css">
<link rel="stylesheet" type="text/css" href="../css/ColVis.css">


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
</head>
<body>
<?php
include "../connection1.php";
$sql=mysqli_query($GLOBALS["___mysqli_ston"], "select c.cname,c.title,c.date,c.placed,c.status,i.username,i.aggregate,i.gender,i.kt,i.deadkt,u.name from clist as c inner join masteruser as u on c.username=u.name inner join sinfo as i on i.username=c.username where c.status=2 and u.status=1");
echo "<div class='container'>";
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


echo "<table id='details' class='display'>";
echo "
<thead>
<tr>
<th>Company Name</th>
<th>Title</th>
<th>Date</th>
<th>Student Name</th>
<th>Aggregate</th>
<th>Live kt</th>
<th>Dead kt</th>
<th>Placed</th>
<th>Gender</th>
<th>Options</th>
</tr>
</thead><tbody>";
while($row=mysqli_fetch_array($sql))
{
echo "<tr>
<td>".$row['cname']."</td>
<td>".$row['title']."</td>
<td>".$row['date']."</td>
<td>".$row['name']."</td>
<td>".$row['aggregate']."</td>
<td>".$row['kt']."</td>
<td>".$row['deadkt']."</td>
<td>".$row['placed']."</td>
<td>".$row['gender']."</td>

<td><form name='trial' method='POST'>
<input type='hidden' name='username' value='".$row['username']."'>
<input type='hidden' name='name' value='".$row['name']."'>
<input type='hidden' name='cname' value='".$row['cname']."'>
<input type='submit' name='submit' id='submit' value='Approve'>
<input type='submit' name='submit1' id='submit' value='Reject'>
</form>
</td>

</tr>";
}
echo "</tbody></table>";

echo "</div>
<br/>
<br/>
<br/>
</div>";

footer_fn();
echo "</div>
</div>

";
?>


<?php
if(isset($_POST['submit']))
{
include '../connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update clist set status=1 where username='$_POST[username]'and cname='$_POST[cname]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die("query not executed");
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Proposal Approved!!', function (e) {
    window.location.href='./joboffer.php';
});
	
    </SCRIPT>";

}
if(isset($_POST['submit1']))
{
include '../connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo $_POST['username'];
$sql="update clist set status=3 where username='$_POST[username]'and cname='$_POST[cname]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$sql="update criteria set status=3 where sname='$_POST[username]'and cname='$_POST[cname]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Proposal Rejected!!', function (e) {
    window.location.href='./joboffer.php';
});</SCRIPT>";

}



?>
</body>
</html>
