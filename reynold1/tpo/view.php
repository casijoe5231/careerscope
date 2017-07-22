<?PHP
session_start();
if(!isset($_SESSION['username']))
{
header("location:tlogin.php");
}
include "../connect.php";
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname from company order by cname");

?>


<html>
<head>
<title>Placements</title>
<link rel="stylesheet" type="text/css" href="../css/stephen.css">
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
</head>
<body>

<div class='bg'>
<div class='container'>
<div class='header'>
<img src='../images/logo.png' height='80px' align='left'>
<h1>TRAINING & PLACEMENT PORTAL</h1>
</div>
<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Student Menu</h3>
</div>
<br>
<br>
<br>
<div class='register1' >
<table align="center">
<tr class="nh"><th colspan="5">COMPANY LIST</th></tr>

<tr>
<td>
COMPANY LIST:</td>
<td><select name="symptom" onchange="window.location='view.php?q='+this.value">
<?php
if(!isset($_GET["q"]))
{
echo "<option value=''>SELECT COMPANY NAME</option>";
while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['cname'])."'>".addslashes($row['cname'])."</option>";
}
}
else
{
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname from company where cname<>'".$_GET["q"]."'order by cname");
echo "<option value='".$_GET["q"]."'>".$_GET["q"]."</option>";
while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['cname'])."'>".addslashes($row['cname'])."</option>";
}
}
?>
</select>
</td>
</tr>
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
<td colspan='2'>Skills Required:<br/>".$row['skills']."</td>

</tr>

<tr class='even'>
<td colspan='2'>Responsibility scope:<br/>".$row['scope']."</td>

</tr>

<tr>
<td colspan='2'>Job Title:<br/>".$row['title']."</td>

</tr>

<tr class='even'>
<td colspan='2'>Possible Next Position:<br/>".$row['eligibility']."</td>

</tr>

<tr>
<td colspan='2'>Company Details:<br/>".$row['details']."</td>
</tr>

<tr class='even'>
<td colspan='2'>Recuritment Procedure:<br/>".$row['process']."</td>
</tr>


<tr>
<td colspan='2'>Eligibility:<br/>".$row['eligibility']."</td>
</tr>

<tr class='even'>
<td colspan='2'>Package:<br/>".$row['package']."</td>
</tr>


<tr>
<td colspan='2'>Company website:<br/>".$row['website']."</td>
</tr>
";


}

}
?>
</table>
</div>
<p><a href='spanel.php'>RETURN TO PREVIOUS PAGE</a></p>
</div>
<div class='footer'>
Privacy Policy | Terms of use | FAQ's
</div>
</div>
</div>
</body>
</html>