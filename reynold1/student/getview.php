<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/1.css">
</head>
<body>

<div id="page">

<table align="center">
<tr class="nh"><th colspan="5">COMPANY DETAILS</th></tr>
<?php
include '../connect.php';
if(isset($_GET["q"]))
{
$q=$_GET["q"];

$sql="select * from company where cname='$q'";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);

while($row=mysqli_fetch_array($res))
{
echo "<tr>
<td colspan='2'>Company Name:<br/>".$row['cname']."</td>

</tr>

<tr class='even'>
<td colspan='2'>Profile Offered:<br/>".$row['profile']."</td>

</tr>

<tr>
<td>Skills Required:<br/>".$row['skills']."</td>

</tr>

<tr class='even'>
<td colspan='2'>Other:<br/>".$row['other']."</td>

</tr>

<tr>
<td colspan='2'>Package:<br/>".$row['package']."</td>

</tr>

<tr class='even'>
<td colspan='2'>Eligibility:<br/>".$row['eligibility']."</td>

</tr>

<tr>
<td colspan='2'>Recruitment process:<br/>".$row['process']."</td>
</tr>

<tr class='even'>
<td colspan='2'>Company website:<br/>".$row['website']."</td>
</tr>

<tr>
<td colspan='2'>Responsibility Scope:<br/>".$row['scope']."</td>
</tr>


<tr class='even'>
<td colspan='2'>Possible Next Position:<br/>".$row['nposition']."</td>
</tr>";


}

}
?>
</table>
</div>
</body>
</html>
