<?php
	$sql=mysqli_query($db, "SELECT pUserName,pRoleId,pInstitutionId,active,date FROM registration") or die(mysqli_error($GLOBALS["___mysqli_ston"]));


// Establish the output variable
echo ("<table border='1' width='620' >");
echo ("<tr><th>UserName </th><th>RoleId</th><th>pInstitutionId</th><th>Account Type</th><th>Login Date</th></tr>");
while($row = mysqli_fetch_array($sql)){ 
    
    $un = $row["pUserName"];
	$rid = $row["pRoleId"];
	$iid = $row["pInstitutionId"];
	$act = $row["active"];
	$date = $row["date"];
	
	echo (" <tr><td>$un</td><td>$rid</td>
			<td>$iid</td><td>$act</td><td>$date</td>");
}
echo '</tr></table>';

 
?>