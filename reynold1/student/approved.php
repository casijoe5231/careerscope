<html>
<head>
<title>TRAINING & PLACEMENT PORTAl</title>
<script type="text/javascript" charset="utf-8" src="../js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/ColumnFilterWidgets.js"></script>
<!--<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.columnFilter.js"></script>

<link rel="stylesheet" type="text/css" href="../css/demo_page.css">-->

<link rel="stylesheet" type="text/css" href="../css/demo_table.css">
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
.container
{
width:95%;
}
#container_internal
{
width:80%;
margin-left:auto;
margin-right:auto;
display:block;

}
</style>
</head>
<body>
<?php
session_start();
include "../connect1.php";
$sql=mysqli_query($GLOBALS["___mysqli_ston"], "select * from company");
echo "<div class='container'>
<div class='header'>
<img src='../images/logo.png' height='80px' align='left'>
<h1>TRAINING & PLACEMENT PORTAL</h1>
</div>
<div class='content'>
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
	 
	  <li><a href='review.php'>Give Company Feedback</a></li>
	  <li><a href='dreview.php'>Company Reviews</a></li>
	  <li><a href='sinfo.php'>CREATE YOUR PROFILE</a></li>
	</ul>
  </li>
 
  <li><h2><a href='logout.php' style='background-color: #0066FF; border:0px; color: #fff;'>Logout</a></h2></li>
</ul>
</div>
";

$sql=mysqli_query($GLOBALS["___mysqli_ston"], "select * from clist where username='$_SESSION[username]'");
echo "<div id='container_internal' ><table id='details' class='display'>";
echo "
<thead>
<tr>
<th>Company Name</th>
<th>Job Title</th>
<th>Date</th>
<th>Options</th>
</tr>
</thead><tbody>";
while($row=mysqli_fetch_array($sql))
{

echo "<tr>
<td>".$row['cname']."</td>
<td>".$row['title']."</td>


<td>".$row['date']."</td>";

$sql1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from clist where cname='$row[cname]' and title='$row[title]' and username='$_SESSION[username]'");
$no=mysqli_num_rows($sql1);
if($no==0)
{
echo "<td><form name='trial' method='POST'>
<input type='hidden' name='username' value='".$row['username']."'>
<input type='hidden' name='title' value='".$row['title']."'>
<input type='hidden' name='date' value='".$row['date']."'>
<input type='hidden' name='cname' value='".$row['cname']."'>";
echo "<input type='submit' name='submit' id='submit' value='Submit Job Request'>";
echo "</form></td>";
}
else
{
echo "<td>Applied</td>";
}
echo "
</tr>";

}
echo "</tbody><tfoot><tr></tr><tr></tr></tfoot></table></div>";



echo "
<br/>
<br/>
<br/>
</div>

<div class='footer'>
Privacy Policy | Terms of use | FAQ's
</div>
</div>
</div>

";
if(isset($_POST['submit']))
{

include '../connect1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="insert into clist(username,cname,title,date,appeared,rgiven,placed,status) values('$_SESSION[username]','$_POST[cname]','$_POST[title]','$_POST[date]','0','0','unplaced','0')";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die("query not executed");
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Job Proposal has been sent!!', function (e) {
    window.location.href='./appeared.php';
});
	
    </SCRIPT>";

}
?>

</body>
</html>
