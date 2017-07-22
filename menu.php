	<?php
	 // Included configuration file in our code.
	include("connection1.php");
	?>
	<html>
	<head>
	<title>Dynamic Drop Down menu in php</title>
	<link rel="stylesheet" type="text/css" href="menu.css">
	</head>
	<body class="bdy">
	<table>
	<tr>
	<td>
	<ul id="Drop_Down_Menu">
	<?php
	// Creating query to fetch state information from mysql database table.
	$state_query = "select * from menu";
	$state_result = mysqli_query($GLOBALS["___mysqli_ston"], $state_query);
	while($r = mysqli_fetch_array($state_result)){ ?>
	 <li><a href="#"><?php echo $r['menu_name'];?></a>
	 <ul>
	 <?php
	 $city_query = "select * from sub_menu where menu_id=".$r['menu_id'];	 $city_result = mysqli_query($GLOBALS["___mysqli_ston"], $city_query);
	 while($r1 = mysqli_fetch_array($city_result)){ ?>
	  <li><a href="<?php echo $r1['link'];?>"><?php echo $r1['sub_menu'];?></a></li>
	 <?php } ?>
	 </ul>
	 </li>
	<?php } ?>
	</ul>
	</td>
	</tr>
	</table>
	</body>
	</html>
