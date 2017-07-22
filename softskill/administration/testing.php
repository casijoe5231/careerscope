<html><head><title>Testing</title>

<!-- Modal -->
<!-- Contact Form CSS files -->
<link type='text/css' href='../plugins/modal/css/basic.css' rel='stylesheet' media='screen' />
<!-- Load jQuery, SimpleModal and Basic JS files -->
<script type='text/javascript' src='../plugins/modal/js/jquery.js'></script>
<script type='text/javascript' src='../plugins/modal/js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='../plugins/modal/js/basic.js'></script>
<script>
function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}


//setTimeout('document.forms[0].submit();', 10000);
setTimeout('document.forms[0].submit();alert("You have reached the Test time limit!");', 20000);

function Save()
{
 if(confirm('Do you want to Submit?'))
document.forms[0].submit();
else alert('You can continue to make changes')
}


</script> 
<!-- Modal ends here -->

</head>
<body>
// Show Test Hierarchy

	<br><br>
<form action='testing.php' method='POST'>
Form Should autosubmit in some time
<input type="text" name="message">
<input type="button" value="Submit" onclick="Save()"> 
</form>
<?php
if(isset($_POST['message']))
{
 echo "<br><br><b>Gotcha !!</b>: ".$_POST['message'];
}

?>
</body>