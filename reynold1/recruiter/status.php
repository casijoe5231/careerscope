<?php
session_start();
include '../logic/theme-master.php';
if(isset($_SESSION['user3']))
{
include '../connection1.php';
$user=$_SESSION['user3'][1];
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select * from company where username='$user' and status=0 order by title;");

?>


<html>
<head>
<title>Placements</title>
<link rel="stylesheet" type="text/css" href="../css/stephen.css">
<link type="text/css" rel="stylesheet" href="../css/stylepj.css" />
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.pajinate.js"></script>

</head>
<body>

<div class='container'>
<?php
header_fn1();
?>
<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; Recruiter menu</h3>
</div>
<div style="float:right;">
<img src="../images/home.png" height="30px" width="30px"><a href="../recindex.php" style="text-decoration:none;margin-right:10px;color:black;"><strong>HOME</strong></a>
</div>
<br>
<br>
<br>
<br>
<div id='menu'>
<ul>

  <li><h2>Available Functions</h2>
    <ul>
      <li><a href='details.php'>Post a Job</a></li>
	  <li><a href='edit.php'>Edit a Job POST</a></li>
	  <li><a href='status.php'>Check Post Status</a></li>
	</ul>
  </li>
</ul>
</div>
<div class='register1' >


<?php
include '../connection1.php';

$sql="select title,status from company where username='$user' and status='0'";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
if($count!=0)
{
echo "<div id='paging_container1' class='container1'><div class='page_navigation'></div><ul class='content1'>";
while(($row=mysqli_fetch_array($res))&&($count!=0))
{
echo "
<li><p><b>Job Title:</b>&#09;".$row['title']."<br/>";
if($row['status']==0)
{
echo "<b>Status:</b>&#09;Not Approved<br/></li>";
}
else
{
echo "<b>Status:</b>&#09;Approved<br/></li>";
}
$count--;
}
echo "</ul></div>";
}
else
{
echo "<h3><p style='color:red'><b>No more pending Posts</b></p></h3>";
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
});		*/
			
</script>


</div>


</div>
<?php
footer_fn();
?>
</div>

</body>
</html>
<?php
}
?>