<?php 
include("database.php");

$sq1 = mysqli_query($db, "SELECT theme FROM registration WHERE pUserName='{$_SESSION['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
					
			$row= mysqli_fetch_assoc($sq1);
			$theme=$row['theme'];
			
if("Wooden"== $theme){?>
	<head><link rel="stylesheet" href="SpryAssets/Theme1.css" type="text/css" />
    	  <link rel="stylesheet" href="SpryAssets/Theme1_MenuBarHorizontal.css" type="text/css" />
          <link rel="stylesheet" href="SpryAssets/Theme1_MenuBarVertical.css" type="text/css" />
    </head>	
<?php }

else if("Waterfall"== $theme){?>
	<head><link rel="stylesheet" href="SpryAssets/Theme2.css" type="text/css" />
    	  <link rel="stylesheet" href="SpryAssets/Theme2_MenuBarHorizontal.css" type="text/css" />
          <link rel="stylesheet" href="SpryAssets/Theme2_MenuBarVertical.css" type="text/css" />
    </head>	
<?php }

else if("Design"== $theme){?>
	<head><link rel="stylesheet" href="SpryAssets/Theme3.css" type="text/css" />
    	  <link rel="stylesheet" href="SpryAssets/Theme3_MenuBarHorizontal.css" type="text/css" />
          <link rel="stylesheet" href="SpryAssets/Theme3_MenuBarVertical.css" type="text/css" />
    </head>	
<?php }

else if("Default"== $theme){?>
	<head><link rel="stylesheet" href="SpryAssets/mm_student.css" type="text/css" />
    	  <link rel="stylesheet" href="SpryAssets/SpryMenuBarVertical.css" type="text/css" />
          <link rel="stylesheet" href="SpryAssets/SpryMenuBarHorizontal.css" type="text/css" />
    </head>	
<?php }

else if("Grey Look"== $theme){?>
	<head><link rel="stylesheet" href="SpryAssets/mm_investor.css" type="text/css" />
    	  <link rel="stylesheet" href="SpryAssets/iMenuBarHorizontal.css" type="text/css" />
          <link rel="stylesheet" href="SpryAssets/iMenuBarVertical.css" type="text/css" />
    </head>	
<?php }?>

