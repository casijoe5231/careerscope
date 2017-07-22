<?php
ob_start();
session_start();
include '../logic/theme-master.php';
?>
<html>
<head>
<title>Placements</title>
<link rel="stylesheet" type="text/css" href="../css/stephen1.css">
<link type="text/css" rel="stylesheet" href="../css/style2.css" />

<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.pajinate.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="../css/demo_table.css">

<script>
$(document).ready( function () {
	$('#details').dataTable()
	
	
} );

</script>
<style>
#container_internal
{
margin-right:5px;
display:block;
margin-left:17%;
}
</style>
</head>
<body>

<div class='container'>
<?php
header_fn1();
?>
<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Placements menu</h3>
</div>
<div style="float:right;">
<img src="../images/home.png" height="30px" width="30px"><a href="../tpoindex.php" style="text-decoration:none;margin-right:10px;color:black;"><strong>HOME</strong></a>
</div>
<br>
<br>
<br>
<br>

<div id='menu'>
<ul>
  <li><h2>Job Related Functions</h2>
    <ul>
      <li><a href='tpo.php'>Post a Job</a></li>
	  <li><a href='post.php'>Edit a Job POST</a></li>
    </ul>
  </li>
  <li><h2>Student Related Functions</h2>
    <ul>
      <li><a href='dreview.php'>Delete/approve reviews</a></li>
	  <li><a href='details.php'>View Student Details</a></li>
	  <li><a href='set.php'>Confirm Students</a></li>
	  <li><a href='appeared.php'>Set Student Status</a></li>
	  <li><a href='joboffer.php'>Confirm Student proposals</a></li>
    </ul>
  </li>
  <li><h2>Recruiter Related Functions</h2>
    <ul>
      <li><a href='status.php'>View Company Posts</a></li>
	  <li><a href='verify.php'>Verify Company Details</a></li>
	  <li><a href='stats.php'>View companies statistics</a></li>
    </ul>
  </li>
</ul>
</div>
<div id='container_internal' >


<?php
include '../connection1.php';
if(isset($_SESSION['user4']))
{
echo "<form method='POST' style='text-align:center'><input type='submit' name='submit7' id='submit' value='Select criteria'>
<input type='submit' id='submit' name='submit9' value='Display All'></form>";
if(isset($_POST['submit7']))
{ 

$_SESSION['submit7']="set";
if(isset($_SESSION['submit9']))
{
unset($_SESSION['submit9']);
}

}
if(isset($_POST['submit9']))
{ 

$_SESSION['submit9']="set";
if(isset($_SESSION['submit7']))
{
unset($_SESSION['submit7']);
}
}

if(isset($_SESSION['submit9']))
{

$sql="select * from masteruser as u inner join sinfo as s on u.email=s.email where u.role='Student'";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);


if($count!=0)
{
echo "<table id='details' class='display'>";
echo "
<thead>
<tr>
<th>Student name</th>
<th>Branch</th>
<th>Semester</th>
<th>Live kt</th>
<th>Dead kt</th>
<th>Aggregate</th>
<th>Preferred location</th>
<th>Skills</th>
<th>Gender</th>
<th>Status</th>
<th>Options</th>
</tr>
</thead><tbody>";
while($row=mysqli_fetch_array($res))
{
echo "<tr>
<td>".$row['name']."</td>
<td>".$row['branch']."</td>
<td>".$row['sem']."</td>
<td>".$row['kt']."</td>
<td>".$row['deadkt']."</td>
<td>".$row['aggregate']."</td>
<td>".$row['location']."</td>
<td>".$row['skills']."</td>
<td>".$row['gender']."</td>";
echo "<td>";
if($row['status']==1)
{
echo "Approved";
}
if($row['status']==0)
{
echo "Not Approved";
}
if($row['status']==2)
{
echo "Debarred";
}
echo "</td>";
echo "<td><form name='trial' method='POST'>";
if($row['status']==0 || $row['status']==1)
{
echo "<input type='hidden' name='username' value='".$row['username']."'>
<input type='hidden' name='name' value='".$row['name']."'>
<input type='hidden' name='kt' value='".$row['kt']."'>
<input type='hidden' name='deadkt' value='".$row['deadkt']."'>
<input type='hidden' name='aggregate' value='".$row['aggregate']."'>
<input type='submit' name='submit5' id='submit' value='select recruiter'>
<input type='submit' name='submit1' id='submit' value='Debar'>";
}
if($row['status']==2)
{
echo "<h3 style='color:red'><b><center>Debarred</center></b></h3>";
}
echo "</form>
</td>

</tr>";
}
echo "</tbody></table>";
}
else
{
echo "<h3 style='color:red'><b><center>No new users!!</center></b></h3>";

}
}
if(isset($_SESSION['submit7']))
{
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct kt from company order by kt;");
echo "<p>Select criterias:";
echo "<select name='name' onchange=window.location='set.php?q='+this.value>";

if(!isset($_GET["q"]))
{
echo "<option value=''>SELECT LIVE KT'S</option>";
while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['kt'])."'>".addslashes($row['kt'])."</option>";
}
}
else 
{
echo "<option value='".$_GET["q"]."'>".$_GET["q"]."</option>";
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct kt from company where kt<>'".$_GET["q"]."' order by kt;");
while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['kt'])."'>".addslashes($row['kt'])."</option>";
}

}
echo "</select>&nbsp;&nbsp;";

if(isset($_GET["q"]))
{
$q1=urlencode($_GET["q"]);
$sql1="select distinct deadkt from company where kt='".$_GET["q"]."'";
$list1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
echo "<select name='name' onchange=window.location='set.php?q=$q1&p='+this.value>";

if(!isset($_GET["p"]))
{
echo "<option value=''>SELECT DEAD KT</option>";
while($row=mysqli_fetch_array($list1))
{
echo "<option value='".addslashes($row['deadkt'])."'>".addslashes($row['deadkt'])."</option>";
}
}
else
{
echo "<option value='".$_GET["p"]."'>".$_GET["p"]."</option>";
$list1=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct deadkt from company where deadkt!='".$_GET["p"]."' and kt='".$_GET["q"]."'");
while($row=mysqli_fetch_array($list1))
{
echo "<option value='".addslashes($row['deadkt'])."'>".addslashes($row['deadkt'])."</option>";
}

}
echo "</select>&nbsp;&nbsp;";
}

if(isset($_GET["p"]))
{
$q1=urlencode($_GET["q"]);
$q2=urlencode($_GET["p"]);
$sql2="select distinct aggregate from company where kt='".$_GET["q"]."' and deadkt='".$_GET["p"]."'";
$list2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
echo "<select name='name' onchange=window.location='set.php?q=$q1&p=$q2&r='+this.value>";

if(!isset($_GET["r"]))
{
echo "<option value=''>SELECT AGGREGATE</option>";
echo "<option value='58'>58</option>";
echo "<option value='60'>60</option>";
echo "<option value='65'>65</option>";
}
else
{
echo "<option value='".$_GET["r"]."'>".$_GET["r"]."</option>";
echo "<option value='58'>58</option>";
echo "<option value='60'>60</option>";
echo "<option value='65'>65</option>";
}
echo "</select></p>";
}



if((isset($_GET["q"]))&&(isset($_GET["p"]))&&(isset($_GET["r"])))
{
$q=$_GET["q"];
$p=$_GET["p"];
$r=$_GET["r"];
$sql="select * from masteruser as u inner join sinfo as s on u.name=s.username where u.role='student' and s.kt<='$q' and s.deadkt<='$p' and s.aggregate>='$r'";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);

echo "<table id='details' class='display'>";
echo "
<thead>
<tr>
<th>Student name</th>
<th>Branch</th>
<th>Semester</th>
<th>Live kt</th>
<th>Dead kt</th>
<th>Aggregate</th>
<th>Preferred location</th>
<th>Skills</th>
<th>Gender</th>
<th>Status</th>
<th>Options</th>
</tr>
</thead><tbody>";
while($row=mysqli_fetch_array($res))
{
echo "<tr>
<td>".$row['name']."</td>
<td>".$row['branch']."</td>
<td>".$row['sem']."</td>
<td>".$row['kt']."</td>
<td>".$row['deadkt']."</td>
<td>".$row['aggregate']."</td>
<td>".$row['location']."</td>
<td>".$row['skills']."</td>
<td>".$row['gender']."</td>";
echo "<td>";
if($row['status']==1)
{
echo "Approved";
}
if($row['status']==0)
{
echo "Not Approved";
}
if($row['status']==2)
{
echo "Debarred";
}
echo "</td>";
echo "<td><form name='trial' method='POST'>";
if($row['status']==0 || $row['status']==1)
{
echo "<input type='hidden' name='username' value='".$row['username']."'>
<input type='hidden' name='name' value='".$row['name']."'>
<input type='submit' name='submit' id='submit' value='Go to recruiter'>
<input type='submit' name='submit1' id='submit' value='Debar'>";
}
if($row['status']==2)
{
echo "<h3 style='color:red'><b><center>Debarred</center></b></h3>";
}
echo "</form></td>";

echo "</tr>";
}
echo "</tbody></table>";
  



}

}
}
else
{
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('You do not belong here!!', function (e) {
    window.location.href='../index.php';
});
	
    </SCRIPT>";

}
?>
<script type="text/javascript">
/*			$(document).ready(function(){
				$('#paging_container1').pajinate(
				{
				num_page_links_to_display : 3,
				items_per_page : 6,
                //abort_on_small_lists: true,
				wrap_around: true,
                show_first_last: false
				}
				);
			});*/
/*$(document).ready(function(){
$('li:odd, .content1 > *:odd').css('background-color','#00D9BF');
});	*/	
/*$(document).ready(function(){
$('.content1 li:first-child').css('margin-top','25px');
});	*/		
</script>
<?php
if(isset($_POST['submit']))
{
$q2=urlencode($_GET["q"]);
$p2=urlencode($_GET["p"]);
$r2=urlencode($_GET["r"]);
$name1=urlencode($_POST["name"]);
header("location:sett.php?q=$q2&p=$p2&s=$r2&r=$name1");


}

if(isset($_POST['submit5']))
{
$kt=$_POST['kt'];
$deadkt=$_POST['deadkt'];
$aggregate=$_POST['aggregate'];
$name2=urlencode($_POST["name"]);
header("location:sett1.php?q=$kt&p=$deadkt&s=$aggregate&r=$name2");


}
if(isset($_POST['submit1']))
{
include '../connection1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update users set status=2 where name='$_POST[username]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$sql="update sinfo set status=2 where username='$_POST[username]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Student Debarred!!', function (e) {
    window.location.href='./set.php';
});</SCRIPT>";

}

?>

</div>


</div>
<?php
footer_fn();
?>
</div>

</body>
</html>

<!--echo "<div id='paging_container1' class='container1'><div class='page_navigation'></div><ul class='content1'>";
while(($row=mysql_fetch_array($res))&&($count!=0))
{
echo "
<li><b>Student name:</b>&#09;".$row['name']."<br/>

<b>Email:</b>&#09;".$row['email']."<br/>

<b>Phone:</b>&#09;".$row['phone']."<br/>";
if($row['status']==1)
{
echo "<b>Status:</b>&#09;Approved<br/>";
}
if($row['status']==0)
{
echo "<b>Status:</b>&#09;Not Approved<br/>";
}
if($row['status']==3)
{
echo "<b>Status:</b>&#09;Debarred<br/>";
}


echo "<p style='text-align:center;'>
<form name='trial' method='POST'>
<input type='hidden' name='username' value='".$row['username']."'>
<input type='hidden' name='name' value='".$row['name']."'>
<input type='submit' name='submit' value='Approve'>
<input type='submit' name='submit1' value='Debar'>
</form>
</p>
<br/>
</p>
</li>";
$count--;
}
echo "</ul></div>";-->
<?php
ob_flush();
?>