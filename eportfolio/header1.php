<html>
<head>
<title>Header</title>
<link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css" />

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
.style1 {color: ##336699}
-->
</style>

</head>

<body>
<form action="index.php">
<table width="70%" height="200" border="0" cellpadding="0" cellspacing="0" align="center">
  <tr bgcolor="#336699">
   <td  rowspan="2" align="center"><img src="Image/header1.png" /></td>
  </tr>

  <tr>
    <td><img src="mm_spacer.gif" alt="" width="0" height="2" border="0" /></td>
  </tr>

  <tr bgcolor="#336699">
  	<td id="dateformat" height="20"><a>&nbsp;&nbsp;<script language="JavaScript" type="text/javascript">
      document.write(TODAY);	</script></a></td>
  </tr>
  
  </table>
  </form>
</body>
</html>
