<?php
include '../logic/theme-master.php';
?>
<html>
<head>
<title>Placements</title>
<link rel="stylesheet" type="text/css" href="../css/newcss.css">
<!--<link type="text/css" rel="stylesheet" href="../css/stylepj.css" />-->
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.pajinate.js"></script>
<style type="text/css">
        body { font-family:Arial, Helvetica, Sans-Serif; font-size:0.8em;}
        #report { border-collapse:collapse;}
        #report h4 { margin:0px; padding:0px;}
        #report img { float:right;}
        #report ul { margin:10px 0 10px 40px; padding:0px;}
        #report th { background:#7CB8E2 url(../images/header_bkg.png) repeat-x scroll center left; color:#fff; padding:7px 15px; text-align:left;}
        #report td { background:#C7DDEE none repeat-x scroll center left; color:#000; padding:7px 15px; }
        #report tr.odd td { background:#fff url(../images/row_bkg.png) repeat-x scroll center left; cursor:pointer; }
        
        #report div.up { background-position:0px 0px;}
		.register1
		{
		width:55%;
		}
		
</style>
    <script type="text/javascript">  
        $(document).ready(function(){
            $("#report tr:odd").addClass("odd");
            $("#report tr:not(.odd)").hide();
            $("#report tr:first-child").show();
            
            $("#report tr.odd").click(function(){
                $(this).next("tr").toggle();
                $(this).find(".arrow").toggleClass("up");
            });
            //$("#report").jExpand();
        });
    </script> 
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

<div id='menu' style='width:192px;'>
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
<div class='register1' >

<h1 style='text-align:center;'>STUDENT DETAILS</h1>
<?php
session_start();

include '../connection1.php';
if(isset($_SESSION['user4']))
{
$email=$_SESSION['user4'][0];

$sql="SELECT *
FROM masteruser
INNER JOIN sinfo
ON masteruser.email=sinfo.email where masteruser.status=1;";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
if($count!=0)
{
/*echo "<div id='paging_container1' class='container1'><div class='page_navigation'></div><ul class='content1'>";


while(($row=mysql_fetch_array($res))&&($count!=0))
{
echo "<li>

<b>Student name:</b>&#09;".$row['name']."<br/>

<b>Email:</b>&#09;".$row['email']."<br/>

<b>Phone:</b>&#09;".$row['phone']."<br/>

<b>Gender:</b>&#09;".$row['gender']."<br/>

<b>Branch:</b>&#09;".$row['branch']."<br/>

<b>Semester:</b>&#09;".$row['sem']."<br/>

<b>Aggregate:</b>&#09;".$row['aggregate']."<br/>

<b>Backlogs:</b>&#09;".$row['kt']."<br/>

<b>Status:</b>&#09;".$row['placed']."<br/>


<br/>

</li>";
$count--;
}
echo "</ul></div>";*/

echo "<table id='report'>
<tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
			<th></th>
            <th></th>
         
</tr>";
while($row=mysqli_fetch_array($res))
{
echo "<tr>

<td>".$row['name']."</td>

<td>".$row['email']."</td>

<td>".$row['mobile']."</td>

<td>".$row['gender']."</td>
<td><a href='../uploads/$email/'>Resume</a></td>
<td><div class='arrow'><a href='#' style='text-transform:none;'>More..</a></div></td>
</tr>
<tr>
            <td colspan='5'>
                <h4>Additional information</h4>
                <ul>
                    <li>Discipline:&#09;".$row['discipline']."</li>
                    <li>Semester:&#09;".$row['sem']."</li>
                    <li>Aggregate:&#09;".$row['aggregate']."</li>
                    <li>Backlogs:&#09;".$row['kt']."</li>
                    <li>Status:&#09;".$row['placed']."</li>";
					if($row['status']='placed')
					{
						$sql1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from clist where username='$row[name]' and placed='placed'");
						while($row=mysqli_fetch_array($sql1))
						{
							echo "<li>Company Name:&#09;".$row['cname']."</li>
								<li>Date of interview:&#09;".$row['date']."</li>";
						}
					}
                echo "</ul>   
            </td>
</tr>";
}

echo "</table>";
}
else
{
echo "<p style='font-size:1.5em'>Table is Empty!!</p>";
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
			$(document).ready(function(){
				$('#paging_container1').pajinate(
				{
				num_page_links_to_display : 3,
				items_per_page : 6,
                //abort_on_small_lists: true,
				wrap_around: true,
                show_first_last: false
				}
				);
			});
/*$(document).ready(function(){
$('li:odd, .content1 > *:odd').css('background-color','#00D9BF');
});*/		
			
</script>

</div>


</div>
<?php
footer_fn();
?>
</div>

</body>
</html>