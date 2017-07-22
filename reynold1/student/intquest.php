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
echo "<h3 style='text-align:justify;'><b>6 commonly asked interview questions and tips how to answer</b></h3>
<br>
<ul>
<li><h3 style='text-align:justify;'><b>Tell me about yourself?</b><br>
<b> Tip</b> -Talk about a couple of your key achievements and the interviewer will likely select an accomplishment and ask you to tell more about it.</h3></li>
<li><h3 style='text-align:justify;'><b>What is your greatest strength?</b><br>
<b> Tip</b> -Figure out what your number one strength or skill is, then talk briefly about it and provide a good example. Before going into an interview, write down several of your top strengths and examples of each.</h3></li>
<li><h3 style='text-align:justify;'><b>What is the most important thing you are looking for in a job?</b><br>
<b> Tip</b> -Figure out what you want most in a job. You might value challenge, good working conditions, or friendly co-workers. Talk about one or two items and explain why they are important to you.</h3></li>
<li><h3 style='text-align:justify;'><b>What is the most difficult situation you have ever faced?</b><br>
<b> Tip</b> -Pick an example in which you successfully resolved a tough situation. Tell your story briefly but try to reveal as many good qualities as possible. Your interviewer wants to hear about qualities such as perseverance, good judgment and maturity.</h3></li>
<li><h3 style='text-align:justify;'><b>Is there anything you would like to improve about yourself?</b><br>
<b> Tip</b> -Pick a weakness (for example, not being comfortable with public speaking or even oral presentations in the class), then show how you're working to improve it (being part of a debating team). Your goal here is to provide a short answer that satisfies the interviewer.</h3></li>
<li><h3 style='text-align:justify;'><b>Why should I hire you?</b><br>
<b> Tip</b> -This is a great opportunity to sell you. Talk about your strengths and how they fit the needs of the company.</h3></li>
</ul><br>
<h4><a href='do.php' style='color:red'>Do's and Don'ts during an interview</a></h4>
<a href='interview.php' style='text-decoration:none;color:blue;'>&lt;&lt;&nbsp;Previous</a>";
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

