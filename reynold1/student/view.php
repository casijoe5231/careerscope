<html>
<head>
<title>Placements</title>

<script src="../js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/news.css">
<script type="text/javascript" src="../js/jquery.totemticker.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="../css/demo_table.css">
<script>
$(document).ready( function () {
	$('#details').dataTable()
	
	
} );

</script>
<!-- Autosize Scripts -->

<script src='../js/jquery.autosize.js'></script>
<script>
$(function(){
				
            $('.animated').autosize();
			});
</script>
<script type="text/javascript">
$(function(){
			$('#vertical-ticker').totemticker({
				row_height	:	'50px',
				next		:	'#ticker-next',
				previous	:	'#ticker-previous',
				stop		:	'#stop',
				start		:	'#start',
				mousestop	:	true,
				interval    :   3000
			});
		});
</script>
<script type="text/javascript">
		
		var image = document.getElementById("ads");
		var img_array=["images/dell.jpg","images/tata.jpg","images/infosys.jpg","images/reliance.jpg","images/techm.jpg","images/wipro.jpg","images/lnt.jpg","images/deloitte.jpg","images/maruti.jpg","images/syntel.jpg"];
		var index=0;
		function slide()
		{

			document["ads"].src = img_array[index];
			index++;
			if(index>=img_array.length)
			{
				index=0;
			}
		}
		setInterval("slide()",2000);
		</script>
<!-- Auto size scripts end here -->	
<link rel="stylesheet" type="text/css" href="../css/stephen1.css">
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<link rel="stylesheet" type="text/css" href="../css/uploadify.css">
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<style>

			.animated {
				-webkit-transition: height 0.2s;
				-moz-transition: height 0.2s;
				transition: height 0.2s;
			}
</style>

<style>
#container_internal
{
margin-left:5%;
margin-right:0px;
width:40%;
float:left;
display:block;

}
.content
{
min-height:1000px;
}

</style>
</head>
<body>
<?php
session_start();
include '../logic/theme-master.php';
if(isset($_SESSION['user']))
{
include '../connection1.php';
include '../logic/functions.php';
$user=$_SESSION['user'][1];
$sql="select * from masteruser where name='$user' and role='Student'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct k.cname from company as c inner join criteria as k on c.cname=k.cname where k.sname='$user' and k.status<>2 order by k.cname;");
if($count==1)
{

echo "

<div class='container'>";
header_fn1();
echo "<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Student Menu</h3>
</div>
<div style='float:right;'>
<img src='../images/home.png' height='30px' width='30px'><a href='../back.php' style='text-decoration:none;margin-right:10px;color:black;'><strong>HOME</strong></a>
</div>
<br>
<br>
<br>
<br>
<div id='menu'>
<ul>

  <li><h2>Student Related Functions</h2>
    <ul>
      <li><a href='view.php'>View Company List</a></li>
	  <li><a href='appeared.php'>Submit job request</a></li>
	  <li><a href='interview.php'>Interview Preparation</a></li>
	  <li><a href='review.php'>Give Company Feedback</a></li>
	  <li><a href='dreview.php'>Company Reviews</a></li>
	  <li><a href='sinfo.php'>CREATE YOUR PROFILE</a></li>
	</ul>
  </li>
</ul>
</div>
<div id='container_internal' >
";
echo "<form method='POST' style='text-align:center'><input type='submit' name='submit1' id='submit' value='Select manually'>
<input type='submit' id='submit' name='submit2' value='Display All'></form>";
if(isset($_POST['submit1']))
{ 

$_SESSION['submit1']="set";
if(isset($_SESSION['submit2']))
{
unset($_SESSION['submit2']);
}

}
if(isset($_POST['submit2']))
{ 

$_SESSION['submit2']="set";
if(isset($_SESSION['submit1']))
{
unset($_SESSION['submit1']);
}

}
if(isset($_SESSION['submit1']))
{

echo "<p>Company Name:";
echo "<select name='name' onchange=window.location='view.php?q='+this.value>";

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
echo "<option value='".$_GET["q"]."'>".$_GET["q"]."</option>";
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct k.cname from company as c inner join criteria as k where c.cname<>'".$_GET["q"]."' and k.sname='$_SESSION[username]' and k.status<>2 order by k.cname;");
while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['cname'])."'>".addslashes($row['cname'])."</option>";
}

}
echo "</select>&nbsp;&nbsp;";

if(isset($_GET["q"]))
{
$q1=urlencode($_GET["q"]);
$sql1="select distinct title from company where cname='".$_GET["q"]."'";
$list1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
echo "<select name='name' onchange=window.location='view.php?q=$q1&p='+this.value>";

if(!isset($_GET["p"]))
{
echo "<option value=''>SELECT JOB TITLE</option>";
while($row=mysqli_fetch_array($list1))
{
echo "<option value='".addslashes($row['title'])."'>".addslashes($row['title'])."</option>";
}
}
else
{
echo "<option value='".$_GET["p"]."'>".$_GET["p"]."</option>";
$list1=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct title from company where title!='".$_GET["p"]."' and cname='".$_GET["q"]."'");
while($row=mysqli_fetch_array($list1))
{
echo "<option value='".addslashes($row['title'])."'>".addslashes($row['title'])."</option>";
}

}
echo "</select></p>";
}



if((isset($_GET["q"]))&&(isset($_GET["p"])))
{
$q=$_GET["q"];
$p=$_GET["p"];
$sql="select * from company as c inner join criteria as k on c.cname=k.cname where c.cname='$q' and c.title='$p'";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count1=mysqli_num_rows($res);
while($row=mysqli_fetch_array($res))
{
$cname=$row['cname'];
echo "<table>

  <tr>
<td>Company Name:</td>
    <td>
     ".$q."
    </td>
    </tr>
	
    <tr>
	<td>Company Details:</td>
    <td>
    ".$row['details']."
    </td>
    </tr>
	
	<tr>
	<td>Profile Offered:</td>
    <td>
   ".$row['profile']."
    </td>
    </tr>
	
	<tr>
	<td>Job Title:</td>
    <td>
   ".$row['title']."
    </td>
    </tr>
    
	<tr>
	<td>Skills Required:</td>
    <td>
      ".$row['language']."
    </td>
    </tr>
    
	<tr>
	<td>Others Skills:</td>
    <td>
    ".$row['other']."
    </td>
    </tr>
	
	
	<tr>
	<td>Package:</td>
    <td>
     ".$row['package']."
    </td>
    </tr>
	
	<tr>
	<td>Eligibility:</td>
    <td>
      ".$row['aggregate']."
    </td>
    </tr>
	
	<tr><td>Recruitment Process :</td>
    <td>
    ".$row['process']."
    </td>
    </tr>
	
	
	<tr>
	<td>Company Website:</td>
    <td>
     ".$row['website']." 
    </td>
    </tr>
	
	
	
	<tr>
	<td>Responsibility scope:</td>
    <td>
      ".$row['scope']."
    </td>
    </tr>
	
	
	<tr>
	<td>Next Position:</td>
    <td>
     ".$row['nposition']."
    </td>
    </tr>
	
	<tr>
	<td><a href='../uploads/$row[username]/'>View details</a></td>
    </tr>
	
    </table>
   

";
$sql3="select * from criteria where cname='$cname' and sname='$user'";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
while($row1=mysqli_fetch_array($res1))
{
if($row1['status']==0)
{
	echo "<h3 style='color:red'><center><b>This post is approved by the TPO. You can now apply for the job.</b></center></h3>";
}
if($row1['status']==1)
{
	echo "<h3 style='color:red'><center><b>You have already applied for this job.</b></center></h3>";
}
if($row1['status']==3)
{
	echo "<h3 style='color:red'><center><b>You are rejected by the TPO.</b></center></h3>";
}

}
}

}
}
if(isset($_SESSION['submit2']))
{
$sql2="select * from company as c inner join criteria as k on c.cname=k.cname where k.sname='$user' and k.status<>2";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
$count1=mysqli_num_rows($res);
echo "<table id='details' class='display'>";
echo "
<thead>
<tr>
<th>Company Name</th>
<th>Job title</th>
<th>Skills required</th>
<th>Package</th>
<th>Aggregate</th>
<th>Date</th>
<th>Selection Process</th>
<th>Status</th>
</tr>
</thead><tbody>";
while($row=mysqli_fetch_array($res))
{
$cname=$row['cname'];
echo "<tr>
<td>".$row['cname']."</td>
<td>".$row['title']."</td>
<td>".$row['language']."</td>
<td>".$row['package']."</td>
<td>".$row['aggregate']."</td>
<td>".$row['date']."</td>
<td>".$row['process']."</td>
<td>";
$sql3="select * from criteria where cname='$cname' and sname='$user'";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
while($row1=mysqli_fetch_array($res1))
{
if($row1['status']==0)
{
	echo "<h3 style='color:red'><center><b>Approved</b></center></h3>";
}
if($row1['status']==1)
{
	echo "<h3 style='color:red'><center><b>Applied</b></center></h3>";
}
if($row1['status']==3)
{
	echo "<h3 style='color:red'><center><b>Rejected</b></center></h3>";
}

}
 echo "
</td>

</tr>";
}
echo "</tbody></table>";
}

echo "</div>

<div id='wrapper'>
	
		<h2>Newsfeed:</h2>";
	 news();
echo  "<p><a href='#' id='ticker-previous'><img src='../images/backward.png' height='30' width='30'></a> / <a href='#' id='ticker-next'><img src='../images/forward.png' height='30' width='30'></a> / <a id='stop' href='#'><img src='../images/stop.png' height='30' width='30'></a> / <a id='start' href='#'><img src='../images/start.png' height='30' width='30'></a></p>
		
		
</div>
<br>
<div id='divrupper2' style='float:right;'><h2>OUR RECRUITERS:</h2><br>
		    <img id='ads' src='images/dell.jpg' style='margin:10px' width='400px' name='image'/>
		</div>

</div>";
footer_fn();
echo "</div>


";
}
else 
{
echo "You do not have permission to access this page.Redirecting to Home.<meta http-equiv='refresh' content='2;>";
}
}
else
{
echo "YOU HAVE NOT LOGGED IN.PLZ LOGIN.<meta http-equiv='refresh' content='2;url=./slogin.php'>";
}
?>

</body>
</html>

