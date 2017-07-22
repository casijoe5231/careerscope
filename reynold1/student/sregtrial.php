<!--<html>
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
<h3>&nbsp; Register Menu</h3>
</div>
<br>
<br>
<br>
<div class='register1' >
<form name="student" method="post">
<table align="center">
<tr class="nh"><th colspan="2">STUDENT PORTAL</th></tr>


<tr>
<td colspan="2">USERNAME:<input type="text" name="uname" size='60'></td>

</tr>

<tr class="even">
<td colspan="2">PASSWORD:<input type="password" name="password" size='60'></td>
</tr>

<tr>
<td colspan="2"><input type="submit" name="submit" id="submit" value="submit"></td>
</tr>

</table>
</form>
</div>
<p><a href='slogin.php'>RETURN TO PREVIOUS PAGE</a></p>
</div>
<div class='footer'>
Privacy Policy | Terms of use | FAQ's
</div>
</div>
</div>
</body>
</html>
-->
<?php
if(!isset($_POST['submit']))
{
echo "
<html>
<head>
<title>Placements</title>
<link rel='stylesheet' type='text/css' href='../css/stephen.css'>
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
<h3>&nbsp; Register Menu</h3>
</div>
<br>
<br>
<br>
<div class='register1' >
<form name='student' method='post'>
<table align='center'>
<tr class='nh'><th colspan='2'>STUDENT PORTAL</th></tr>


<tr>
<td colspan='2'>USERNAME:<input type='text' name='uname' size='60'></td>

</tr>

<tr class='even'>
<td colspan='2'>PASSWORD:<input type='password' name='password' size='60'></td>
</tr>

<tr>
<td colspan='2'><input type='submit' name='submit' value='submit'></td>
</tr>

</table>
</form>
</div>
<p><a href='slogin.php'>RETURN TO PREVIOUS PAGE</a></p>
</div>
<div class='footer'>
Privacy Policy | Terms of use | FAQ's
</div>
</div>
</div>
</body>
</html>
";
}
else
{
$error1=false;
$error2=false;
$name=$_POST['uname'];
echo $name;
$password=$_POST['password'];
if(ctype_alnum($name))
{
$error1=true;
}
if(ctype_alnum($password))
{
$error2=true;
}
if(strlen($name)==0||strlen($name)>8)
{
$error1=true;
}
if(strlen($password==0)||strlen($name)>8)
{
$error2=true;

}

if($error1==true||$error2==true)
{
echo "
<html>
<head>
<title>Placements</title>
<link rel='stylesheet' type='text/css' href='../css/stephen.css'>
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
<h3>&nbsp; Register Menu</h3>
</div>
<br>
<br>
<br>
<div class='register1' >
<form name='student' method='post'>
<table align='center'>
<tr class='nh'><th colspan='2'>STUDENT PORTAL</th></tr>";
if($error1==true)
{
echo "<tr class='even'>
<td colspan='2'>Username should have maximum 8 characters and must contains only letters and numbers.</td>
</tr>";
}
echo "<tr>
<td colspan='2'>USERNAME:<input type='text' name='uname' size='60'></td>

</tr>
";

if($error2==true)
{
echo "<tr>
<td colspan='2'>Password should have maximum 8 characters and must conatins only letters and numbers</td>

</tr>";
}
echo "<tr class='even'>
<td colspan='2'>PASSWORD:<input type='password' name='password' size='60'></td>
</tr>

<tr>
<td colspan='2'><input type='submit' name='submit' value='submit'></td>
</tr>

</table>
</form>
</div>
<p><a href='slogin.php'>RETURN TO PREVIOUS PAGE</a></p>
</div>
<div class='footer'>
Privacy Policy | Terms of use | FAQ's
</div>
</div>
</div>
</body>
</html>
";


}


}
?>