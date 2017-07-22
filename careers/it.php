<?php
    session_start();
	if(!isset($_SESSION['username']))
	{
		header('location:index.php');
		exit();
	}
	include 'styles/theme-master.php';
	?>
<!DOCTYPE html>
<html><head><title>Career Path</title>
<link rel="icon" href="images/career.jpg" type="image/png" sizes="16x16">
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
echo $_SESSION['username'][1];
?>
</h3>
</div>

<br>
<br>
<br>
<br>
<h3 style="text-align:center;text-shadow: 5px 5px 5px #CC6699;"><b>IT Engineering</b><br></h3>
<br>
 <h5 style="text-align:justify;padding-right:10px">&nbsp;&nbsp;&nbsp;&nbsp; Since the advent of the affordable computer system, businesses have adopted this method of record keeping and communication across the globe. 
 With that adaptation came jobs for individuals who understood the languages, the hardware, and the software that makes a computer function properly. 
 The following top career paths in information technology (IT) provide information about those careers and the education required to meet employment standards: </h5><br>
 
 <h4><b>Computer and Information Systems Manager:</b></h4>
 
 <h5 style="text-align:justify;padding-right:10px">&nbsp;&nbsp;&nbsp;&nbsp;Often called information technology managers (IT managers or IT project managers), these skilled individuals plan, coordinate, and direct computer-related activities within an organization. 
 They help determine the organization information technology goals and are responsible for implementing the appropriate computer systems to accomplish those goals. 
 Computer and information systems managers normally must have a bachelor degree in a computer- or information science-related field. 
 Many organizations require their computer and information systems managers to have a graduate degree as well.</h5><br>

  <h4><b>Database Administrators:</b></h4>
  <h5 style="text-align:justify;padding-right:10px">&nbsp;&nbsp;&nbsp;&nbsp; Database administrators use software to store and organize data, such as financial information and customer shipping records. 
  These jobs carry a high degree of responsibility, as these administrators make sure that data are available to users and secure from unauthorized access.
  Most database administrators have a bachelor degree in management information systems (MIS) or a computer-related field. 
  Firms with large databases may prefer applicants who have a Master of Business Administration (MBA) with a concentration in information systems.</h5><br>
  
  <h4><b>Computer Systems Analysts:</b></h4>
  <h5 style="text-align:justify;padding-right:10px">&nbsp;&nbsp;&nbsp;&nbsp; These individuals analyze an an organization current computer system and procedures and make recommendations to help the organization operate more efficiently and effectively through those systems and programs. 
  They bring business and information IT together by understanding the needs and limitations of both fields. 
  A bachelor degree in a computer or information science field is common, although not always a requirement. 
  Some firms may hire analysts with business or liberal arts degrees who know how to write computer programs.</h5><br>
<br>
<a href="index.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>


		
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>