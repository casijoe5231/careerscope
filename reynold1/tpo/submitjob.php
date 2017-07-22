<html>
<head>
<script type="text/javascript" charset="utf-8" src="../js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/ColVis.js"></script>


<link rel="stylesheet" type="text/css" href="../css/demo_table.css">
<link rel="stylesheet" type="text/css" href="../css/ColVis.css">


<script>
$(document).ready( function () {
	$('#details').dataTable({
	"sDom": 'C<"clear">lfrtip'
	})
	
	
} );

</script>
</head>
<body>
<?php
include "../connect1.php";
$sql=mysqli_query($GLOBALS["___mysqli_ston"], "select c.username,c.cname,s.name,c.title,c.date,c.placed from clist as c inner join users as s on c.username=s.username where c.status<>0 and c.appeared=0");
echo "<div>";
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
while($row=mysqli_fetch_array($sql))
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
echo "<input type='submit' name='submit' value='Appeared & Rejected'>";
echo "<input type='submit' name='submit1' value='Appeared & Placed'>
</form>
</td>

</tr>";
}
echo "</tbody></table>";
echo "</div>";
?>
<?php
if(isset($_POST['submit']))
{
include '../connect1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update clist set appeared=1,placed='unplaced' where username='$_POST[username]' and cname='$_POST[cname]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die("query not executed");
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Student Approved!!', function (e) {
    window.location.href='./appeared.php';
});
	
    </SCRIPT>";

}
if(isset($_POST['submit1']))
{
include '../connect1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo $_POST['username'];
$sql="update clist set appeared=1 and set placed='placed' where username='$_POST[username]' and cname='$_POST[cname]'";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Recruiter Debarred!!', function (e) {
    window.location.href='./appeared.php';
});</SCRIPT>";

}


?>
</body>
</html>
