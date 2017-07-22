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
<h3 style="text-align:center;text-shadow: 5px 5px 5px #CC6699;"><b>Computer Engineer</b></h3><br>
<br>
 <h5 style="text-align:justify;padding-right:10px">&nbsp;&nbsp;&nbsp;&nbsp; Computer Engineering seems to be the most straight forward career that a CpE major will go to upon graduating. 
 In this career you will be dealing mainly with hardware or software. 
 You will be designing, testing, and building computer applications. 
 You will be working in a variety of settings. 
 Computer engineer's working space vary from a home office to a big corporation. 
 Computer Engineers are known to work all over the place, from public to private sectors.
 Computer Engineers who specialize in software must be able to read and write in high-level programming languages such as C++, java, and COBOL. 
 Also the Engineers who specialize in software must be familiar with the internet and how to develop and maintain a website. 
 Developing and maintaining a website is a very important skill because many businesses want to make, or already have, a web page or internet services in order to grow closer to their clients.<br>
 
 &nbsp;&nbsp;&nbsp;&nbsp; Computer engineers who specialize in computer hardware work in research, design, development, testing, and supervision of all aspects of the manufacturing and installing of computer hardware. 
 The hardware of a computer includes chips, circuit boards, systems, keyboards, modems, printers, and other related equipment. 
 Some computer hardware engineers have a background in electronics because the two fields are related, because computer hardware involves circuitry.</h5><br>

 <h4><b>Salary Approximations:</b></h4>

 <h5 style="text-align:justify;padding-right:10px">&nbsp;&nbsp;&nbsp;&nbsp; Computer Engineers are used almost everywhere. 
 With this career choice, you are eligible to work in the fields of business, telecommunications, government, and health care. According to a 2006 report of the Bureau of Labor Statistics, the median salary of computer software engineers was close to $80,000. 
 Since we live in a society that is rapidly growing technology wise, it is projected that the demand for Computer Engineering will increase by 38 percent by the year 2016. 
 This increase will open up about 324,000 new jobs.</h5><br>
 <br>


<a href="comp.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>


		
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>