<html>

<head>
<title>Menu</title>
<link rel="stylesheet" href="SpryAssets/mm_eportfolio.css" type="text/css">
</head>

<body>
<table border="0" style="align:center;">
	<tr><td>
    <table id="navigation" style="align:center;width:1290px;">
    
        <tr>
          <td ><div align="center">
		  <?php
		  if(isset($_SESSION['user']))
		  {
		   echo "<a href='register.php'>Academic Brand</a>";
		  }
		  
		   ?>
		  </div></td>
          <!--td ><div align="center"><a href="#">Developmental Brand</a></div></td-->
          <!--td ><div align="center"><a href="#">Reflective Brand</a></div></td-->
         <!-- <td ><div align="center"><a href="help.php">HELP</a></div></td>
          <td ><div align="center"><a href="register.php">REGISTER</a></div></td> -->
          <!--td ><div align="center"><a href="#">Assessment Brand</a></div></td-->
		  <td ><div align="center"><a href="test_reports.php">My Brand</a></div></td>
		  <td ><div align="center"><a href="events.php">Events</a></div></td>
		 <!-- <td ><div align="center"><a href="review.php">REVIEW</a></div></td> -->
        </tr>
    </table>
    </tr>
</table>
</body>
</html>
