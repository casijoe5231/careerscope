<html>
<head>
<script type="text/javascript" charset="utf-8" src="js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="js/ColVis.js"></script>

<script type="text/javascript" charset="utf-8" src="js/jquery.dataTables.columnFilter.js"></script>
<link rel="stylesheet" type="text/css" href="css/demo_table.css">
<link rel="stylesheet" type="text/css" href="css/ColVis.css">


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
include "connect1.php";
$sql=mysqli_query($GLOBALS["___mysqli_ston"], "select name,email,phone from users where role='student' and status=0");
echo "<div>";
echo "<table id='details' class='display'>";
echo "
<thead>
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
</tr>
</thead><tbody>";
while($row=mysqli_fetch_array($sql))
{
echo "<tr>
<td>".$row['name']."</td>
<td>".$row['email']."</td>
<td>".$row['phone']."</td>
</tr>";
}
echo "</tbody></table>";
echo "<div>";
?>

</body>
</html>
