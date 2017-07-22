<html>
<head>
<script type="text/javascript" charset="utf-8" src="../js/jquery.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="../js/ColVis.js"></script>

<script type="text/javascript" charset="utf-8" src="../js/jquery.dataTables.columnFilter.js"></script>
<script type='text/javascript' src='../js/jquery.simplemodal.js'></script>
<link rel="stylesheet" type="text/css" href="../css/demo_table.css">
<link rel="stylesheet" type="text/css" href="../css/ColVis.css">

<link rel="stylesheet" type="text/css" href="../css/stephen1.css">
<link rel="stylesheet" type="text/css" href="../css/style2.css">
<link type='text/css' href='../css/basic.css' rel='stylesheet' media='screen' />

<link rel='icon' href='../images/favicon.png' type='image/png' sizes='16x16'>
<script>
$(document).ready( function () {
	$('#details').dataTable({
	"sDom": 'C<"clear">lfrtip'
	})
	$('#basic').click(function (e) {
		$('#basic-modal-content').modal();

		return false;
	});
	
} );
</script>
  <script src="../js/date.js"></script>
  <script src="../js/jquery.datePicker.js"></script>
  <script>
  $(function()
{
	$('#datepicker').datePicker({clickInput:true})
	$('#datepicker').dpSetOffset(30, 0);
});

  </script>
<style>
.animated {
-webkit-transition: height 0.2s;
-moz-transition: height 0.2s;
transition: height 0.2s;
}

</style>

<script src='../js/jquery.autosize.js'></script>
<script>
$(function(){
$('.animated').autosize({});
});
</script>
</head>
<body>
<?php
include "../connect1.php";
$sql=mysqli_query($GLOBALS["___mysqli_ston"], "select c.username,c.cname,s.name,c.title,c.date,c.placed from clist as c inner join users as s on c.username=s.username where c.status<>0 and c.appeared=0");
echo "<div class='container'>
<div class='header'>
<img src='../images/logo.png' height='80px' align='left'>
<h1>TRAINING & PLACEMENT PORTAL</h1>
</div>
<div class='content'>
<br>
<div class='title'>
<h3>&nbsp; TPO Menu</h3>
</div>
<br>
<br>
<br>
<div class='container_internal' >";
echo "<br/>ADD NEW USER <input type='button' name='basic' value='Demo' id='basic'/>";
echo "<div id='basic-modal-content'>  
<p>ENTER COMPANY DETAILS</p>
 
  <form name='contactForm' id='contact_form' method='post' action='read.php'>
<fieldset>
<legend>Company Info</legend>
<div>Company Name:<textarea type='text' name='cname' class='animated'></textarea><div><br/>
<div>Company Address:<textarea name='caddress'  class='animated'></textarea></div><br/>
<div>Company Details:<textarea name='details'  class='animated'></textarea></div><br/>
</fieldset>
<br/>	

<fieldset>
<legend>Offer Details</legend>
<div>Profile Offered:<textarea  name='profile'  class='animated'></textarea></div><br/>
<div>Job Title:<textarea name='title'  class='animated'></textarea></div><br/>
<div>Location:<textarea  name='location'  class='animated'></textarea></div><br/>
<div>Package:<textarea name='package'  class='animated'></textarea></div><br/>
<div>Recruitment Process :<textarea name='process'  class='animated'></textarea></div><br/>
<div>Company Website:<textarea name='website'  class='animated'></textarea></div><br/>
<div>Responsibility scope:<textarea name='scope'  class='animated'></textarea></div><br/>
</fieldset>
<br/>
<fieldset>
<legend>Skills & Eligibility</legend>
<div>Languages Required:<textarea name='language'  class='animated'></textarea></div><br/>
<div>Others Skills:<textarea name='other'  class='animated'></textarea></div><br/>
<div>Aggregate:<textarea name='aggregate'  class='animated'></textarea></div><br/>
<div>Kt's Allowed:<br/><input type='text' name='kt'/></div><br/>
</fieldset>
<br/>
<fieldset>
<legend>Interview Date and venue</legend>
<div>Date:<br/><input type='text' name='date' id='datepicker' class='date'></div><br/><br/>
<div>Venue:<textarea name='venue'  class='animated'></textarea></div><br/>
</fieldset>  
<br/>
<fieldset>
<legend>Optional</legend>
<div>Next Position:<textarea name='nposition'  class='animated'></textarea></div>
</fieldset>
<p>
    <input type='submit' id='send_message' value='Submit Form'>
</p>
</form>
<p><a href='tpo.php'>RETURN TO PREVIOUS PAGE</a></p>
</div>";
echo "<div style='display:none'>
			<img src='img/basic/x.png' alt='' />
		</div>";
echo "<table id='details' class='display'>";
echo "
<thead>
<tr>
<th>Company Name</th>
<th>Student Name</th>
<th>Title</th>
<th>Date</th>
<th>Placed</th>
<th>Options</th>
</tr>
</thead><tbody>";
while($row=mysqli_fetch_array($sql))
{
echo "<tr>
<td>".$row['cname']."</td>
<td>".$row['name']."</td>
<td>".$row['title']."</td>
<td>".$row['date']."</td>
<td>".$row['placed']."</td>
<td><form name='trial' method='POST'>
<input type='hidden' name='username' value='".$row['username']."'>
<input type='hidden' name='cname' value='".$row['cname']."'>";
echo "<input type='submit' name='submit' value='Rejected'>";
echo "<input type='submit' name='submit1' value='Placed'>
</form>
</td>

</tr>";
}
echo "</tbody></table>";
echo "</div>
<br/>
<br/>
<br/><p style='text-align:center;'><a href='tpo.php'>RETURN TO PREVIOUS PAGE</a></p>
</div>

<div class='footer'>
Privacy Policy | Terms of use | FAQ's
</div>
</div>
</div>

";
?>
<?php
if(isset($_POST['submit']))
{
include '../connect1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
$sql="update clist set appeared=1,placed='unplaced' where username='$_POST[username]' and cname='$_POST[cname]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql) or die("query not executed");
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Student Status Set!!', function (e) {
    window.location.href='./appeared.php';
});
	
    </SCRIPT>";

}
if(isset($_POST['submit1']))
{
include '../connect1.php';
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo $_POST['username'];
$sql="update clist set appeared=1 and set placed='placed' where username='$_POST[username]' and cname='$_POST[cname]'";

$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$sql="update sinfo set placed='placed' where username='$_POST[username]'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Student Status Set!!', function (e) {
    window.location.href='./appeared.php';
});</SCRIPT>";

}


?>
</body>
</html>
