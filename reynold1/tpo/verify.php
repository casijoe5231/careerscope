<html>
<head>
<title>Placements</title>
<link rel="stylesheet" type="text/css" href="../css/stephen1.css">
<link rel="stylesheet" type="text/css" href="../css/style2.css">

<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/ColumnFilterWidgets.js"></script>

<link rel="stylesheet" type="text/css" href="../css/ColumnFilterWidgets.css">
<link rel="stylesheet" type="text/css" href="../css/demo_table.css">

		<!--<script type="text/javascript" src="../js/jquery.paginate1.js"></script>-->
<style>.register{width:60%;}</style>
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

<div class='container'>
<div class='header'>
<img src='../images/logo.png' height='80px' align='left'>
<h1>TRAINING & PLACEMENT PORTAL</h1>
</div>
<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Placements menu</h3>
</div>
<div style="float:right;">
<img src="../images/home.png" height="30px" width="30px"><a href="../tpoindex.php" style="text-decoration:none;margin-right:10px;color:black;"><strong>HOME</strong></a>
</div>
<br>
<br>
<br>
<br>

<div id='menu' style='width:192px;'>
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

<div  id='container_internal'  >


<?php
session_start();
include '../connection1.php';
if(isset($_SESSION['user4']))
{


$sql="select * from masteruser where role='Recruiter' and status=0";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);

if($count!=0)
{

echo "<table id='details' class='display'>";
echo "
<thead>
<tr>
            <th>Recruiter name</th>
            <th>Email</th>
            <th>Contact No.</th>
			<th>Status</th>
            <th>Options</th>
</tr>
</thead><tbody>";
while($row=mysqli_fetch_array($res))
{
echo "<tr>

<td>".$row['name']."</td>

<td>".$row['email']."</td>

<td>".$row['mobile']."</td>

<td>";
if($row['status']==1)
{
	echo "Approved";
}
if($row['status']==0)
{
	echo "Not Approved";
}
if($row['status']==2)
{
	echo "Debarred";
}
echo "</td>
<td>
<form name='trial' method='POST'>
<input type='hidden' name='name' value='".$row['name']."'>
<input type='submit' name='submit' id='submit' value='Approve'>
<input type='submit' name='submit1' id='submit' value='Debar'>
</form>
</td>

</tr>";
}
echo "</tbody></table>";




}
else
{
echo "<p style='font-size:1.5em'>ALL RECRUITERS HAVE BEEN VERIFIED!!</p>";
}
}
else
{
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('You do not belong here!!', function (e) {
    window.location.href='../index.php';
});
	
    </SCRIPT>";

}
?>

<?php
if(isset($_POST['submit']))
{
include '../connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update masteruser set status=1 where name='$_POST[name]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die("query not executed");
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Recruiter Approved!!', function (e) {
    window.location.href='./verify.php';
});
	
    </SCRIPT>";

}
if(isset($_POST['submit1']))
{
include '../connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update masteruser set status=2 where name='$_POST[name]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Recruiter Debarred!!', function (e) {
    window.location.href='./verify.php';
});</SCRIPT>";

}
?>

</div>


</div>
<div class='footer'>
Privacy Policy | Terms of use | FAQ's
</div>
</div>

</body>
</html>
<!--echo "<script type='text/javascript'>
			$(document).ready(function(){
				$('#paging_container1').pajinate(
				{
				num_page_links_to_display : 3,
				items_per_page : 6,
				total_items: ".$count.",
                //abort_on_small_lists: true,
				wrap_around: true,
                show_first_last: true
				}
				);
			});

			
</script>";
echo "<div id='demo2'></div><br><div id='paging_container1' class='container1'><div class='page_navigation'></div>";
echo "<table id='report'>
<tr>
            <th>Company name</th>
            <th>Recruiter name</th>
            <th>Email</th>
            <th>Recruiter</th>
			<th>Status</th>
            <th>Options</th>
</tr><ul class='content1'>";
while(($row=mysql_fetch_array($res))&&($count!=0))
{
echo "
<li><tr><td>".$row['username']."</td>

<td>".$row['name']."</td>

<td>".$row['email']."</td>

<td>".$row['phone']."</td>

<td>".$row['status']."</td>
<td>
<form name='trial' method='POST'>
<input type='hidden' name='username' value='".$row['username']."'>
<input type='hidden' name='name' value='".$row['name']."'>
<input type='submit' name='submit' value='Approve'>
<input type='submit' name='submit1' value='Debar'>
</form>
</td>

</tr>
</li>";
$count--;
}
echo "</ul></table></div>";-->