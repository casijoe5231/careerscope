<?php
include 'logic/theme-master.php';
?>
<html>
<head>
<title>Placements</title>
<link rel="stylesheet" type="text/css" href="css/stephen2.css">
<link rel="stylesheet" type="text/css" href="css/menu.css">

<link rel='icon' href='images/favicon.png' type='image/png' sizes='16x16'>
<script src="js/jquery.min.js"></script>

<script>
$(document).ready(function(){
$( "#recruiter" ).hover(function() {
$( "#r-title" ).fadeIn( 100 );
$( "#recruiter" ).addClass( "extra" );

},
function() {
$( "#r-title" ).fadeOut( 100 );
$( "#recruiter" ).removeClass( "extra" );

});

$( "#student" ).hover(function() {
$( "#s-title" ).fadeIn( 100 );
$( "#student" ).addClass( "extra" );

},
function() {
$( "#s-title" ).fadeOut( 100 );
$( "#student" ).removeClass( "extra" );

});

$( "#tpo" ).hover(function() {
$( "#t-title" ).fadeIn( 100 );
$( "#tpo" ).addClass( "extra" );

},
function() {
$( "#t-title" ).fadeOut( 100 );
$( "#tpo" ).removeClass( "extra" );

});
});
</script>

<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">

</head>
<body>

<div class="container">
<?php
header_fn();
?>

<div class="content">
<a href="../index.php" style="text-decoration:none;color:blue;text-align:left;">&lt;&lt;&nbsp;Previous</a>

<div style="float:right;padding:10px;background:#3399FF;">
<a href="services/index.php" style="text-decoration:none;color:#000000">Interview Services</a>
</div>

<!--<div class='common'><a href='tpo/tlogin.php'><img src='images/staff-real.jpg' width='240px' height='170px' ></a></div>
<div class='common'><a href='student/slogin.php'><img src='images/slogin.png' width='240px' height='170px' ></a></div>
<div class='common'><a href='recruiter/rlogin.php'><img src='images/recruit-real.png' width='240px' height='170px'></a></div>-->
<div class='common' id='recruiter'><a href='recruiter/rlogin.php'><img src='images/recruiter.png' style=''></a></div>
<div id='r-title' style='display:none;position:absolute;left:31.5%;top:62%;color:white;background-color:black;padding:4px;'>RECRUITER</div>


<div class='common' id='student'><a href='student/slogin.php'><img src='images/Student.PNG' style=''></a></div>
<div id='s-title' style='display:none;position:absolute;left:63%;top:62%;color:white;background-color:black;padding:4px;'>STUDENT</div>

<div class='common' id='tpo'><a href='tpo/tlogin.php'><img src='images/tpo.png'  style=''></a></div>
<div id='t-title' style='display:none;position:absolute;left:48%;top:110%;color:white;background-color:black;padding:4px;width:60px;text-align:center;'>TPO</div>

        	





</div>

<br>
<?php
footer_fn();
?>
</div>


</body>
</html>