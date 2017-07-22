<html>
<head>

<link rel="stylesheet" type="text/css" href="css/news.css"/>
<script src="js/jquery.min.js"></script>
<script src="js/jquery.layout.js"></script>
<script>
    $(document).ready(function () {
        var myLayout = $('body').layout({ applyDefaultStyles: true ,   north__applyDefaultStyles: false,south__applyDefaultStyles: false,center__applyDefaultStyles: false});
		
		myLayout.sizePane("east", 300);
    });
</script>
<script type="text/javascript" src="js/jquery.totemticker.js"></script>
<script type="text/javascript">
		$(function(){
			$('#vertical-ticker').totemticker({
				row_height	:	'100px',
				next		:	'#ticker-next',
				previous	:	'#ticker-previous',
				stop		:	'#stop',
				start		:	'#start',
				mousestop	:	true,
				interval    :   1000
			});
		});
	</script>
<style type="text/css">
.ui-layout-north
{
 /*background: url('../images/pattern2.jpg'); */ 
 padding-left:2%; 
 width:98%;
 height:12%;
 background-color:#0099FF;
 border-style:solid;
 border-radius:15px;
}
.ui-layout-south
{
 margin-top:1%;
 width:100%;
 height: 7%;
 background-color:#0099FF;
 border-style:solid;
 border-radius:15px;
 text-align:center;
 padding-top:1%;
 margin-bottom:1%;
 }
.ui-layout-center
{
-webkit-box-shadow: 0 0 5px #666;
background: #eee;

width:70%;
border-style:solid;
 border-radius:15px;
 margin-left:auto; margin-right:auto; padding: 10px;
}
#id
{
 width:90%;
 margin-left:auto;
 margin-right:auto;

}
</style>
	
</head>
<body>

<div class="ui-layout-center"><table align="center">
<tr class="nh"><th>SELECT APPROPRIATE LOGIN</th></tr>


<tr>
<td colspan="2"><a href="tpo/tlogin.php">TRAINING AND PLACEMENT CELL</a></td>

</tr>

<tr class="even">
<td colspan="2"><a href="student/slogin.php">STUDENT PORTAL</a></td>

</tr>

<tr>
<td colspan="2"><a href="recruiter/rlogin.php">COMPANY PORTAL</a></td>
</tr>

</table>
</div>



<div class="ui-layout-north">
<img src="images/logo.png" height="80px" align="left">
<h1>TRAINING & PLACEMENT PORTAL</h1>
</div>

<div class="ui-layout-south">
Privacy Policy | Terms of use | FAQ's
</div>

<div class="ui-layout-east">
<?php 
include 'logic/functions.php';
news();?>
<p><a href="#" id="ticker-previous">Previous</a> / <a href="#" id="ticker-next">Next</a> / <a id="stop" href="#">Stop</a> / <a id="start" href="#">Start</a></p>
</div>



</body>
</html>