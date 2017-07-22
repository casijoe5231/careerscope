<?php
include 'theme-master.php';
?>
<html>
<head>
<title>Interview Services</title>
<link rel="stylesheet" type="text/css" href="stephen2.css">
<link rel="stylesheet" type="text/css" href="../css/menu.css">

<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<script src="../js/jquery.min.js"></script>

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

$( "#alumni" ).hover(function() {
$( "#a-title" ).fadeIn( 100 );
$( "#alumni" ).addClass( "extra" );

},
function() {
$( "#a-title" ).fadeOut( 100 );
$( "#alumni" ).removeClass( "extra" );

});
});
</script>

<link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x16">

</head>
<body>

<div class="container">
<?php
header_fn();
?>

<div class="content">
<a href="../index.php" style="text-decoration:none;color:blue;text-align:left;">&lt;&lt;&nbsp;Previous</a>
<h3><center><b>Welcome to Interview Services</b></center></h3>
<!--<div class='common'><a href='tpo/tlogin.php'><img src='images/staff-real.jpg' width='240px' height='170px' ></a></div>
<div class='common'><a href='student/slogin.php'><img src='images/slogin.png' width='240px' height='170px' ></a></div>
<div class='common'><a href='recruiter/rlogin.php'><img src='images/recruit-real.png' width='240px' height='170px'></a></div>-->
<div class='common' id='recruiter'><a href='rlogin.php'><img src='../images/recruiter1.jpg' style=''></a></div>
<div id='r-title' style='display:none;position:absolute;left:31.5%;top:59%;color:white;background-color:black;padding:4px;'>RECRUITER</div>

<div class='common' id='student'><a href='student/slogin.php'><img src='../images/student2.jpg' style=''></a></div>
<div id='s-title' style='display:none;position:absolute;left:63%;top:59%;color:white;background-color:black;padding:4px;'>STUDENT</div>

<div class='common' id='tpo'><a href='tpo/tlogin.php'><img src='../images/tpo1.jpg'  style=''></a></div>
<div id='t-title' style='display:none;position:absolute;left:35.5%;top:105%;color:white;background-color:black;padding:4px;'>TPO</div>

<div class='common' id='alumni'><a href='tpo/tlogin.php'><img src='../images/alumni.jpg'  style=''></a></div>
<div id='a-title' style='display:none;position:absolute;left:62%;top:105%;color:white;background-color:black;padding:4px;'>ALUMNI</div>

</div>

<br>
<?php
footer_fn();
?>
</div>


</body>
</html>