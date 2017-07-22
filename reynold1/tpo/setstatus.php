<html>
<head>
<script type="text/javascript" charset="utf-8" src="../js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/ColVis.js"></script>

<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.columnFilter.js"></script>
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
$sql=mysqli_query($GLOBALS["___mysqli_ston"], "select * from users where role='student' and status=0");
echo "<div>";
echo "<table id='details' class='display'>";
echo "
<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Status</th>
<th>Action</th>
</tr>
</thead><tbody>";
while($row=mysqli_fetch_array($sql))
{
echo "<tr>
<td>".$row['name']."</td>
<td>".$row['email']."</td>
<td>".$row['phone']."</td>
<td>".$row['status']."</td>
<td><form name='trial' method='POST'>
<input type='hidden' name='username' value='".$row['username']."'>
<input type='hidden' name='name' value='".$row['name']."'>
<input type='submit' name='submit' value='Approve'>
<input type='submit' name='submit1' value='Debar'>
</form>
</td>

</tr>";
}
echo "</tbody></table>";
echo "<div>";
?>
<?php
if(isset($_POST['submit']))
{
include '../connect1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update users set status=1 where username='$_POST[username]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die("query not executed");
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Student Approved!!', function (e) {
    window.location.href='./setstatus.php';
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
$sql="update users set status=2 where username='$_POST[username]'";
echo $sql;
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Recruiter Debarred!!', function (e) {
    window.location.href='./setstatus.php';
});</SCRIPT>";

}


?>
</body>
</html>
