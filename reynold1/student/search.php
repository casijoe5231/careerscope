<html>
<head>
<link href="../css/blue.css" rel="stylesheet">
<script src="../js/jquery-1.9.1.js"></script>
<script src="../js/jquery.icheck.js"></script>
<script>
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass: 'iradio_minimal-blue',
    increaseArea: '20%' // optional
  });
});
</script>
<link href="custom.css" rel="stylesheet">
</head>
<body>

<?php
/*
echo "<select name='users' onchange=window.location='search.php?q='+this.value>
<option value=''>Select a criteria:</option>
<option value='cname'>Company name</option>
<option value='aggregate'>Aggregate</option>
<option value='language'>Language</option>
<option value='location'>Location</option>
</select>";*/
function select($a,$b,$c)
{
echo "<input type='checkbox' name='$a' value='$a'".$c.">".$b.".";
}
if(!isset($_POST['submit'])&&!isset($_POST['submit1']))
{
echo "<form method='post'>
<input type='checkbox' name='cname' value='cname'>Company name.
<input type='checkbox' name='aggregate' value='aggregate'>Aggregate.
<input type='checkbox' name='language' value='language'>Language.
<input type='checkbox' name='location' value='location'>Location.
<input type='submit' name='submit' id='submit' value='submit'>  
</form>";
}
else
{

if(isset($_POST['cname']))
{
select($_POST['cname'],"Company Name","checked");
}
else
{
select("cname","Company Name","");
}
if(isset($_POST['aggregate']))
{
select($_POST['aggregate'],"Aggregate","checked");
}
else
{
select("aggregate","Aggregate","");
}
if(isset($_POST['language']))
{
select($_POST['language'],"Language","checked");
}
else
{
select("language","Language","");
}
if(isset($_POST['location']))
{
select($_POST['location'],"Location","checked");
}
else
{
select("location","Location","");
}
echo "<input type='button' name='reset' value='Reset' id='reset' onclick=window.location='search.php'>";
}
?>

</body>
</html>

<?php
include '../Logic/functions1.php';
/*if(isset($_GET['q']))
{
$q=$_GET['q'];
input($q);
}*/
$a=array();
if(isset($_POST['submit']))
{ 

if(isset($_POST['cname']))
{
array_push($a,$_POST['cname']);
}
if(isset($_POST['aggregate']))
{
array_push($a,$_POST['aggregate']);
}
if(isset($_POST['language']))
{
array_push($a,$_POST['language']);
}
if(isset($_POST['location']))
{
array_push($a,$_POST['location']);
}
input1($a);
//input1($_POST['cname'],$_POST['aggregate'],$_POST['language'],$_POST['location']);
}


if(isset($_POST['submit1']))
{
$sql1="select * from company ";
$sql2="where";
if(isset($_POST['cname']))
{
if($sql2=="where")
{
$sql2.=" ".$_POST['cname']."='".$_POST['name']."'";

}
else
{
$sql2.=" and ".$_POST['cname']."='".$_POST['name']."' ";
}

}

if(isset($_POST['aggregate']))
{
if($sql2=="where")
{
$sql2.=" ".$_POST['aggregate']." between ".$_POST['range1']." and ".$_POST['range2']." ";

}
else
{
$sql2.=" and ".$_POST['aggregate']." between ".$_POST['range1']." and ".$_POST['range2']." ";
}

}



if(isset($_POST['language']))
{
if($sql2=="where")
{
$sql2.=" ".$_POST['language']." like '%".$_POST['laname']."%'";

}
else
{
$sql2.=" and ".$_POST['language']." like '%".$_POST['laname']."%' ";
}
}


if(isset($_POST['location']))
{
if($sql2=="where")
{
$sql2.=" ".$_POST['location']." like '%".$_POST['loname']."%'";

}
else
{
$sql2.="and ".$_POST['location']." like '%".$_POST['loname']."%' ";
}
}

$sql1.=$sql2;
echo $sql1;
$list=mysqli_query($GLOBALS["___mysqli_ston"], $sql1) or die("query could not be executed");




echo "</br><table>";
echo "<tr><th>Comapny name</th><th>aggregate</th><th>language</th><th>location</th></tr>";

while($row=mysqli_fetch_array($list))
{
echo "<tr>";
echo "<td>$row[cname]</td>";
echo "<td>$row[aggregate]</td>";
echo "<td>$row[language]</td>";
echo "<td>$row[location]</td>";
echo "</tr>";
}

echo "</table>";




/*$sql1="select * from company";
$sql2="where";
if(isset($_POST['cname']))
{
if($sql2=="where")
{
$sql2.=" ".$_POST['cname']."='".$_POST['name']."'";

}
else
{
$sql2.="and".$_POST['cname']."='".$_POST['name']."' ";
}

}
*/


}



?>

