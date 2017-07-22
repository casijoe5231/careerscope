<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include 'styles/theme-master.php';
	include '../connection1.php';

	$emaill=$_SESSION['user'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Skill Assessment Home Page','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
	?>
<!DOCTYPE html>
<html>
	<head>
		<title>Skill Assessment Home</title>
		<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
		<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
		<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
	</head>

	<body>
		<div class="bg">
			<div class="container">
			<?php
				header_fn();
			?>
				<div class="content">
					<br />
					<div class="title">
						<h3>&nbsp; Welcome <?php echo $_SESSION['user'][1];?></h3>
					</div>
					<br />
					<br />
					<br />
					<br />
					<p>
<b>Self Assessment</b><br>

A personality test shows your traits based on the following factors
<ul>
<li>Openness to experience - It is described as the extent to which a person is imaginative or independent, and depicts a personal preference for a variety of activities over a strict routine.</li> 
<li>Conscientiousness - (efficient/organized vs. easy-going/careless). A tendency to show self-discipline, act dutifully, and aim for achievement; planned rather than spontaneous behavior; organized, and dependable.</li>
<li>Extraversion - (outgoing/energetic vs. solitary/reserved). Energy, positive emotions, surgency, assertiveness, sociability and the tendency to seek stimulation in the company of others, and talkativeness.</li>
<li>Agreeableness - (friendly/compassionate vs. cold/unkind). A tendency to be compassionate and cooperative rather than suspicious and antagonistic towards others. It is also a measure of ones' trusting and helpful nature, and whether a person is generally well tempered or not.</li>
<li>Neuroticism - (sensitive/nervous vs. secure/confident). The tendency to experience unpleasant emotions easily, such as anger, anxiety, depression, or vulnerability. Neuroticism also refers to the degree of emotional stability and impulse control, and is sometimes referred by its low pole - "emotional stability".</li>
</ul>
<br>
<a href="test_mod1.php" class="button">Start Assessment&#8594;</a>
<br>
<br><br>

<b>Observer Assessment</b><br>
As you are rating yourself, you are encouraged to rate another person. <br>
By rating someone else you will tend to receive a more accurate assessment<br>
of your own personality. Also, you will be given a personality profile for <br>
the person you rate, which will allow you to compare yourself to this person <br>
on each of five basic personality dimensions. Try to rate someone whom you <br>
know well, such as a close friend, coworker, or family member.
</p>
<br>
<a href="test_mod2.php" class="button">Start Assessment&#8594;</a>
<br>
<br><br>
<a href="result1.php" target="_blank" class="button">Score based report</a>
<a href="result2.php" target="_blank" class="button">Detailed report</a>
<a href="logout.php" class="button bright">LOGOUT</a><br><br>
<a href="../newindex.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>



<br><br>
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>
<?php
}
elseif(isset($_SESSION['hod']))
{
	include 'styles/theme-master.php';
	include '../connection1.php';
	
	$emaill=$_SESSION['hod'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','HOD/Mentor Skill Assessment','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<!DOCTYPE html>
<html><head><title>Skill Assessment Home</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">

</head>
<body>
<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content">
<br>
<div class="title">
<h3>&nbsp; Welcome 
<?php 
echo $_SESSION['hod'][1];
?>
</h3>
</div>

<br>
<br>
<br>
<br>
<p>
<b>Self Assessment</b><br>

A personality test shows your traits based on the following factors
<ul>
<li>Openness to experience - It is described as the extent to which a person is imaginative or independent, and depicts a personal preference for a variety of activities over a strict routine.</li> 
<li>Conscientiousness - (efficient/organized vs. easy-going/careless). A tendency to show self-discipline, act dutifully, and aim for achievement; planned rather than spontaneous behavior; organized, and dependable.</li>
<li>Extraversion - (outgoing/energetic vs. solitary/reserved). Energy, positive emotions, surgency, assertiveness, sociability and the tendency to seek stimulation in the company of others, and talkativeness.</li>
<li>Agreeableness - (friendly/compassionate vs. cold/unkind). A tendency to be compassionate and cooperative rather than suspicious and antagonistic towards others. It is also a measure of ones' trusting and helpful nature, and whether a person is generally well tempered or not.</li>
<li>Neuroticism - (sensitive/nervous vs. secure/confident). The tendency to experience unpleasant emotions easily, such as anger, anxiety, depression, or vulnerability. Neuroticism also refers to the degree of emotional stability and impulse control, and is sometimes referred by its low pole - "emotional stability".</li>
</ul>
<br>
<a href="test_mod1.php" class="button">Start Assessment&#8594;</a>
<br>
<br><br>

<b>Observer Assessment</b><br>
As you are rating yourself, you are encouraged to rate another person. <br>
By rating someone else you will tend to receive a more accurate assessment<br>
of your own personality. Also, you will be given a personality profile for <br>
the person you rate, which will allow you to compare yourself to this person <br>
on each of five basic personality dimensions. Try to rate someone whom you <br>
know well, such as a close friend, coworker, or family member.
</p>
<br>
<a href="test_mod3.php" class="button">Start Assessment&#8594;</a>
<br>

<a href="logout.php" class="button bright">LOGOUT</a><br><br>
<a href="../hodindex.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>



<br><br>
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>
<?php
}
elseif(isset($_SESSION['lecturer']))
{
	include 'styles/theme-master.php';
	
	include '../connection1.php';
	
	$emaill=$_SESSION['lecturer'][0];
	
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Lecturer/Testmgr Skill Asessment Home Page','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<!DOCTYPE html>
<html><head><title>Skill Assessment Home</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">

</head>
<body>
<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content">
<br>
<div class="title">
<h3>&nbsp; Welcome 
<?php 
echo $_SESSION['lecturer'][1];
?>
</h3>
</div>

<br>
<br>
<br>
<br>
<p>
<b>Self Assessment</b><br>

A personality test shows your traits based on the following factors
<ul>
<li>Openness to experience - It is described as the extent to which a person is imaginative or independent, and depicts a personal preference for a variety of activities over a strict routine.</li> 
<li>Conscientiousness - (efficient/organized vs. easy-going/careless). A tendency to show self-discipline, act dutifully, and aim for achievement; planned rather than spontaneous behavior; organized, and dependable.</li>
<li>Extraversion - (outgoing/energetic vs. solitary/reserved). Energy, positive emotions, surgency, assertiveness, sociability and the tendency to seek stimulation in the company of others, and talkativeness.</li>
<li>Agreeableness - (friendly/compassionate vs. cold/unkind). A tendency to be compassionate and cooperative rather than suspicious and antagonistic towards others. It is also a measure of ones' trusting and helpful nature, and whether a person is generally well tempered or not.</li>
<li>Neuroticism - (sensitive/nervous vs. secure/confident). The tendency to experience unpleasant emotions easily, such as anger, anxiety, depression, or vulnerability. Neuroticism also refers to the degree of emotional stability and impulse control, and is sometimes referred by its low pole - "emotional stability".</li>
</ul>
<br>
<a href="test_mod1.php" class="button">Start Assessment&#8594;</a>
<br>
<br><br>

<b>Observer Assessment</b><br>
As you are rating yourself, you are encouraged to rate another person. <br>
By rating someone else you will tend to receive a more accurate assessment<br>
of your own personality. Also, you will be given a personality profile for <br>
the person you rate, which will allow you to compare yourself to this person <br>
on each of five basic personality dimensions. Try to rate someone whom you <br>
know well, such as a close friend, coworker, or family member.
</p>
<br>
<a href="test_mod6.php" class="button">Start Assessment&#8594;</a>
<br>

<a href="logout.php" class="button bright">LOGOUT</a><br><br>
<a href="../lecturerindex.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>



<br><br>
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>
<?php
}
elseif(isset($_SESSION['user2']))
{
	include 'styles/theme-master.php';
?>
<!DOCTYPE html>
<html><head><title>Skill Assessment Home</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">

</head>
<body>
<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content">
<br>
<div class="title">
<h3>&nbsp; Welcome 
<?php 
echo $_SESSION['user2'][1];
?>
</h3>
</div>

<br>
<br>
<br>
<br>
<p>
<b>Self Assessment</b><br>

A personality test shows your traits based on the following factors
<ul>
<li>Openness to experience - It is described as the extent to which a person is imaginative or independent, and depicts a personal preference for a variety of activities over a strict routine.</li> 
<li>Conscientiousness - (efficient/organized vs. easy-going/careless). A tendency to show self-discipline, act dutifully, and aim for achievement; planned rather than spontaneous behavior; organized, and dependable.</li>
<li>Extraversion - (outgoing/energetic vs. solitary/reserved). Energy, positive emotions, surgency, assertiveness, sociability and the tendency to seek stimulation in the company of others, and talkativeness.</li>
<li>Agreeableness - (friendly/compassionate vs. cold/unkind). A tendency to be compassionate and cooperative rather than suspicious and antagonistic towards others. It is also a measure of ones' trusting and helpful nature, and whether a person is generally well tempered or not.</li>
<li>Neuroticism - (sensitive/nervous vs. secure/confident). The tendency to experience unpleasant emotions easily, such as anger, anxiety, depression, or vulnerability. Neuroticism also refers to the degree of emotional stability and impulse control, and is sometimes referred by its low pole - "emotional stability".</li>
</ul>
<br>
<a href="result1.php" target="_blank" class="button">Score based report&#8594;</a>
<a href="result2.php" target="_blank" class="button">Detailed report&#8594;</a>
<br>
<br><br>

<b>Observer Assessment</b><br>
As you are rating yourself, you are encouraged to rate another person. <br>
By rating someone else you will tend to receive a more accurate assessment<br>
of your own personality. Also, you will be given a personality profile for <br>
the person you rate, which will allow you to compare yourself to this person <br>
on each of five basic personality dimensions. Try to rate someone whom you <br>
know well, such as a close friend, coworker, or family member.
</p>
<br>
<a href="result1.php" target="_blank" class="button">Score based report&#8594;</a>
<a href="result2.php" target="_blank" class="button">Detailed report&#8594;</a>
<br>
<br><br>
<a href="result.php" target="_blank" class="button">Show my Skill Report</a>

<a href="logout.php" class="button bright">LOGOUT</a><br><br>
<a href="../index.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>



<br><br>
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>
<?php
}
else
{
		header('location:../login.php');
		exit();
}
?>