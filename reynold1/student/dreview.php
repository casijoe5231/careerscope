<?PHP
session_start();
include '../logic/theme-master.php';
if(isset($_SESSION['user']))
{
include "../connection1.php";
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname from review where status=1 order by cname;");

?>


<html>
<head>
<title>Placements</title>
<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<link rel="stylesheet" type="text/css" href="../css/stephen.css">
<link type="text/css" rel="stylesheet" href="../css/stylepj.css" />
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
<h3>&nbsp; Student Menu</h3>
</div>
<div style="float:right;">
<img src="../images/home.png" height="30px" width="30px"><a href="../back.php" style="text-decoration:none;margin-right:10px;color:black;"><strong>HOME</strong></a>
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
	  <!--<li><a href='listedjob.php'>Recommended jobs</a></li>-->
	  <li><a href='review.php'>Give Company Feedback</a></li>
	  <li><a href='dreview.php'>Company Reviews</a></li>
	  <li><a href='sinfo.php'>CREATE YOUR PROFILE</a></li>
	</ul>
  </li>
</ul>
</div>
<div class='register1' >

<h2 style='text-align:center;'>COMPANY LIST</h2>
<p>COMPANY NAME:

<?php
if(!isset($_GET["q"]))
{
echo "<select name='symptom' onchange=window.location='dreview.php?q='+this.value>";
echo "<option value=''>SELECT COMPANY NAME</option>";
while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['cname'])."'>".addslashes($row['cname'])."</option>";
}
echo "</select>";
}
else
{
echo "<select name='symptom' onchange=window.location='dreview.php?q='+this.value>";
echo "<option value='".$_GET["q"]."'>".$_GET["q"]."</option>";
$list=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname from review where cname<>'".$_GET["q"]."' ans status=1 order by cname;");
while($row=mysqli_fetch_array($list))
{
echo "<option value='".addslashes($row['cname'])."'>".addslashes($row['cname'])."</option>";
}
echo "</select>";
}


?>
</p>



<?php
include '../connection1.php';
if(isset($_GET["q"]))
{
$q=$_GET["q"];

$sql="select * from review where cname='$q' and status=1";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
echo "<div id='paging_container1' class='container'><div class='page_navigation'></div><ul class='content1'>";
while(($row=mysqli_fetch_array($res))&&($count!=0))
{
echo "
<li><hr><fieldset style='border:1px solid black;'><legend style='text-transform:uppercase;background-color:#3399FF;margin-left:5px;border:1px solid black;'>USERNAME:&#09;".$row['username']."</legend>

<b>Company Name:</b>&#09;".$row['cname']."<br/>

<b>Question Asked:</b>&#09;".$row['question']."<br/>

<b>Group Discussion Topic:</b>&#09;".$row['gd']."<br/>

<b>Any other Details:</b>&#09;".$row['other']."<br/></fieldset>
</li>";
$count--;
}
echo "</ul></div>";
}
?>
<script type="text/javascript">
			$(document).ready(function(){
				$('#paging_container1').pajinate(
				{
				num_page_links_to_display : 10,
				items_per_page : 6,
                
				wrap_around: true,//lets the list continue after reaching last page
                show_first_last: true
				}
				);
			});
/*$(document).ready(function(){
$('li:odd, .content1 > *:odd').css('background-color','#00D9BF');
});	*/	
$(document).ready(function(){
$('.content1 li:first-child').css('margin-top','25px');
});			
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