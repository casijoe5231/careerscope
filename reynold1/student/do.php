 <html>
<head>
<title>Placements</title>

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
$email=$_SESSION['user'][0];
$sql="select * from masteruser where email='$email' and role='Student'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$count=mysqli_num_rows($res);
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
<img src='../images/home.png' height='30px' width='30px'><a href='../recindex.php' style='text-decoration:none;margin-right:10px;color:black;'><strong>HOME</strong></a>
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
echo "<h3 style='text-align:justify;'><b>Do's and Donts during an interview</b></h3>
<br>
<h3><u><b>DO's:</b></u></h3>
<hr style='text-align:justify;'>
<ul>
<li>Wear dress pants or skirt that reaches your knees. (Girls)</li>
<li>Arrive early; at least 10 minutes prior to the interview start time.</li>
<li>Show a positive attitude during the interview.</li>
<li>Maintain good eye contact during the interview.</li>
<li>Respond to questions and back up your statements about yourself with specific examples whenever possible. Ask for clarification if you don’t understand a question.</li>
<li>Be honest and be yourself. Dishonesty gets discovered.</li>
<li>Have intelligent questions prepared to ask the interviewer. The interview can be a two-way street. You can ask what kind of employee they are looking for and return with an explanation of how you fit that description.</li><br>
</ul>

<h3><u><b>DONT's:</b></u></h3>
<hr style='text-align:justify;'>
<ul>
<li>Do not wear lots of jewelry.</li>
<li>Do not give the impression you are only interested in salary; Do not ask about salary and benefit issues until your interviewer brings up the subject.</li>
<li>Do not be unprepared for typical interview questions.</li>
<li>Do not refer to the interviewer as “Dude.”</li>
<li>Do not go to extremes with your posture; Do not slouch, and Do not sit rigidly on the edge of your chair.</li><br>

</ul></h4>
<a href='intquest.php' style='text-decoration:none;color:blue;'>&lt;&lt;&nbsp;Previous</a>";
echo "</div>
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

