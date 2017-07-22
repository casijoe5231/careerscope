
<html>
<head>
<title>Student Header</title>
<?php include("theme_set.php"); ?>
<script language="JavaScript" type="text/javascript">
//--------------- LOCALIZEABLE GLOBALS ---------------
var d=new Date();
var monthname=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
//Ensure correct for language. English is "January 1, 2004"
var TODAY = monthname[d.getMonth()] + " " + d.getDate() + ", " + d.getFullYear();
//---------------   END LOCALIZEABLE   ---------------
</script>
<style type="text/css">
<!--
.style1 {color: #00CC00}
-->
</style>

<?php include("noright_click.php"); ?>

<script language=JavaScript>
<!--

//Disable right mouse click Script
//By Maximus (maximus@nsimail.com) w/ mods by DynamicDrive
//For full source code, visit http://www.dynamicdrive.com

function clickIE4(){
if (event.button==2){
return false;
}
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("return false")

// --> 
</script>


</head>

<body>
<form action="index.php">
<table width="70%" height="200" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
   <td rowspan="1" align="center"><img src="Image/headerstudent.jpg" border="1" /></td>
  </tr>

  <tr id="headerdate">
  	<td id="dateformat" height="20"><a>&nbsp;&nbsp;<script language="JavaScript" type="text/javascript">
      document.write(TODAY);</script></a></td>
  </tr>
</table>
  </form>
</body>
</html>
