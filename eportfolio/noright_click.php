<html> 
<head> 
<title> To Detect Users Javascript Is Enabled or not</title> 

<script type="text/javascript"> 
	// This function is responsible for checking which key is being pressed. If user presses ctrl key then the an alert is coming out that "Sorry, this functionality is disabled.".

function noCTRL(e)
{
 var code = (document.all) ? event.keyCode:e.which;

 var msg = "Sorry, this functionality is disabled.";
 if (parseInt(code)==17) // This is the Key code for CTRL key
 {
  alert(msg);
  window.event.returnValue = false;
 }
}
</script> 

</head>

<body onload="disableCopyPaste();" onload=setInterval("window.clipboardData.setData('text','')",2) 
oncontextmenu="return false" onselectstart="return false">


</body> 
</html>