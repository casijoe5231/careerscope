<?php
include '../connect1.php';
/*
function spara(array $a)
{
switch($a[0])
{
case "cname":
$list=mysql_query("select * from company where ".$a[0]."='".$a[1]."'");
while($row=mysql_fetch_array($list))
{
echo "<table><tr><th>Company Name</th></tr>";
echo "<tr><td>".$row['cname']."</td>";
echo "</tr></table>";
}
break;

case "aggregate":
$list=mysql_query("select * from company where $a[0] between $a[1] and $a[2]");
while($row=mysql_fetch_array($list))
{
echo "<table><tr><th>Company Name</th><th>Aggregate</th></tr>";
echo "<tr><td>".$row['cname']."</td>";
echo "<td>".$row['aggregate']."</td>";
echo "</tr></table>";
}
break;


case "language":
$list=mysql_query("select * from company where $a[0] like '%$a[1]%'");
while($row=mysql_fetch_array($list))
{
echo "<table><tr><th>Company Name</th><th>Language</th></tr>";
echo "<tr><td>".$row['cname']."</td>";
echo "<td>".$row['language']."</td>";
echo "</tr></table>";
}
break;



case "location":
$list=mysql_query("select * from company where $a[0] like '%$a[1]%'");

if($list)
{
while($row=mysql_fetch_array($list))
{
echo "<table><tr><th>Company Name</th><th>Location</th></tr>";
echo "<tr><td>".$row['cname']."</td>";
echo "<td>".$row['location']."</td>";
echo "</tr></table>";
}
break;
}

}

}



function input($a)
{
switch($a)
{
case "cname":
echo "<form method='post'>
Company name:<input type='text' name='name'/>
<input type='hidden' name='cname' value='$a'/>
<input type='submit' name='submit' value='submit'/></form>";
if(isset($_POST['submit']))
{
$q=$_POST['cname'];
$p=$_POST['name'];
$x=array($q,$p);
spara($x);
}
break;

case "aggregate":
echo "<p>Please specify a range.</p>
<form method='post'>
Min:<input type='text' name='range1'/>
Max:<input type='text' name='range2'/>
<input type='hidden' name='aggregate' value='$a'/>
<input type='submit' name='submit' value='submit'/>
</form>";
if(isset($_POST['submit']))
{
$q=$_POST['aggregate'];
$p=$_POST['range1'];
$r=$_POST['range2'];
$x=array($q,$p,$r);
spara($x);
}
break;


case "language":
echo "<form method='post'>
Languages:<input type='text' name='lname'/>
<input type='hidden' name='language' value='$a'/>
<input type='submit' name='submit' value='submit'/>
</form>";
if(isset($_POST['submit']))
{
$q=$_POST['language'];
$p=$_POST['lname'];
$x=array($q,$p);
spara($x);
}
break;

case "location":
echo "<form method='post'>
Location:<input type='text' name='lname'/>
<input type='hidden' name='location' value='$a'/>
<input type='submit' name='submit' value='submit'/>
</form>";
if(isset($_POST['submit']))
{
$q=$_POST['location'];
$p=$_POST['lname'];
$x=array($q,$p);
spara($x);
}
break;
}

}
*/

function in(array $a,$b)
{
$i=0;
$count=count($a);
while($i<$count)
{
switch($a[$i])
{
case "cname":
if($count==2)
{
$list="select * from company where ".$a[$i]."='".$a[$i+1]."'";
}
else
{
$list.="and".$a[$i]."='".$a[$i+1]."'";
}
break;

case "aggregate":
if($count==3)
{
$list="select * from company where $a[$i] between ".$a[$i+1]."and".$a[$i+2]."";
}
else
{
$list.="and between ".$a[$i+1]."and".$a[$i+2]."";
}
break;


case "language":
if($count==2)
{
$list="select * from company where ".$a[$i]." like '%".$a[$i+1]."%'";
}
else
{
$list.="and $a[$i] like '%".$a[$i+1]."%'";
}
break;



case "location":
if($count==2)
{
$list="select * from company where $a[$i] like '%".$a[$i+1]."%'";
}
else
{
$list.="and $a[$i] like '%".$a[$i+1]."%'";
}
break;
}

}
}




function input1(array $value)
{

if(count($value)!=0)
{
echo "<form method='post'>";
foreach ($value as $value)
{
switch($value)
{
case "cname":
echo "</br></br>Please type in the company name</br></br>
Company name:<input type='text' name='name'/></br>
<input type='hidden' name='cname' value='$value'/>
";

break;

case "aggregate":
echo "</br></br>Please type in aggregate range</br></br>
Min:<input type='text' name='range1'/>
Max:<input type='text' name='range2'/>
<input type='hidden' name='aggregate' value='$value'/>
";

break;


case "language":
echo "</br></br>Please type in the preferred programming langauge</br></br>
Languages:<input type='text' name='laname'/></br>
<input type='hidden' name='language' value='$value'/>
";

break;

case "location":
echo "</br></br>Please type in the preferred location</br></br>
Location:<input type='text' name='loname'/></br>
<input type='hidden' name='location' value='$value'/>
";

break;
}
}
echo "<input type='submit' name='submit1' id='submit1' value='submit'></form>";
}
}



/*function spara(array $a)
{
$count=count($a);
echo $count;
$sql="select * from company ";

$i=0;
if($i<$count)
{
if(strcmp($a[$i],"cname"))
{
$sql.="where $a[$i]='".$a[$i+1]."'";
$i+=2;

}
echo $i;
echo $a[$i];
if($a[$i]!="aggregate")
{
$b=$a[$i+1];
$sql.="and $a[$i] like '%".$a[$i+1]."%'";
$i+2;
}

if(strcmp($a[$i],"aggregate"))
{
$sql.=" and $a[$i] between ".$a[$i+1]." and ".$a[$i+2]."";
$i=$i+3;

}



}

echo "</br>".$sql;

}
*/

/*start of while loop
$i=0;
while($i<$count)
{


if($i=0)
{
$sql=$sql."where $a[$i]='a[$i+1]'";
$i+2;
}
else
{
if($a[$i]!='aggregate')
{
$b=$a[$i+1];
$sql=$sql."and $a[$i] like '%".$a[$i+1]."%'";
$i+2;
}
else
{
$sql=$sql."and $a[$i] between ".$a[$i+1]." and ".$a[$i+2]."";
$i+3;

}

}

$i++;
}
echo $i;
*/




?>
