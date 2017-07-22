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
echo "<h3 style='text-align:justify;'><b>One should be prepared for the interview to make sure he/she is successful and get the job:</b></h3>
<br>
<h3><u>Research the company:</u></h3>
<h4 style='text-align:justify;'>You should spend some time researching the company as this will
give you confidence should you be asked a question on what the company does. It will also allow
you to ask the employer questions.<br>

It is helpful to find out the following things about the employer:
<ul>
<li>What they do, make or sell?</li>
<li>Who are their customers?</li>
<li>What sort of organisation are they?</li>
<li>What is the job likely to involve?</li>
<li>How can you best fit your skills to match the job?</li>
</ul>
<br>
</h4>

<h3><u>Plan for the interview:</u></h3>
<h4 style='text-align:justify;'>Find out what the interview will involve to make sure you are prepared.
If you have a disability, all employers must make reasonable adjustments for you to have an
interview. If you need the employer to make particular arrangements, contact them before your interview to make sure they can make these
arrangements.<br>
Find out how many people will be interviewing you and their positions in the company. This will help
you prepare for the kinds of questions they may ask.
Finding out how long the interview is likely to last will give you an idea of how detailed the interview
will be.<br><br>
<a href='intquest.php' style='color:red'>6 commonly asked interview questions</a></h4><br>";
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

