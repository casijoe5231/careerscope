<!--?php
    session_start();
    if(isset($_SESSION['admin']))
    {
    include 'includes/connection1.php';
    $emails=$_SESSION['admin'][0];
    $sql5="select * from masteruser where email='$emails'";
    $res5=mysql_query($sql5);
    while($row5=mysql_fetch_array($res5))
    {
      $_SESSION['institute']=$row5['institute'];
    }
    
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s"); 
    $sql="insert into activity(email,menu_accessed,timesql) values('$emails','Admin Home Page','$timesql')";
    $res=mysql_query($sql)or die("query not executed");
?-->
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
<!-- Favicon -->
    <link href="file:///home/mech/Desktop/images/favicon.ico" rel="shortcut icon">
	
    <title>BYB | Administrator Menu </title>
      
<!--  CSS  -->
    <link rel="stylesheet" type="text/css" href="BYB%20%7C%20Administrator%20Menu_files/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="BYB%20%7C%20Administrator%20Menu_files/font-awesome.css">
    <link rel="stylesheet" id="camera-css" href="BYB%20%7C%20Administrator%20Menu_files/camera.css" type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="BYB%20%7C%20Administrator%20Menu_files/carousel.css">
    <link rel="stylesheet" type="text/css" href="BYB%20%7C%20Administrator%20Menu_files/slicknav.css">
    <link rel="stylesheet" href="BYB%20%7C%20Administrator%20Menu_files/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main
    stylesheet" charset="utf-8">
    <link rel="stylesheet" type="text/css" href="BYB%20%7C%20Administrator%20Menu_files/style.css">
    <link href="BYB%20%7C%20Administrator%20Menu_files/css.css" rel="stylesheet" type="text/css">
      
<!--  JS  -->
    <script type="text/javascript" src="BYB%20%7C%20Administrator%20Menu_files/jquery-1.js"></script>
    <script type="text/javascript" src="BYB%20%7C%20Administrator%20Menu_files/jquery_003.js"></script>
    <script type="text/javascript" src="BYB%20%7C%20Administrator%20Menu_files/jquery.js"></script> 
    <script type="text/javascript" src="BYB%20%7C%20Administrator%20Menu_files/camera.js"></script>
    <script type="text/javascript" src="BYB%20%7C%20Administrator%20Menu_files/myscript.js"></script>
    <script src="BYB%20%7C%20Administrator%20Menu_files/sorting.js" type="text/javascript"></script>
    <script src="BYB%20%7C%20Administrator%20Menu_files/jquery_002.js" type="text/javascript"></script>
    <script src="BYB%20%7C%20Administrator%20Menu_files/bootstrap.js"></script>
    <script>
			jQuery(function(){
					jQuery('#camera_wrap_1').camera({
					transPeriod: 500,
					time: 3000,
					height: '490px',
					thumbnails: false,
					pagination: true,
					playPause: false,
					loader: false,
					navigation: false,
					hover: false
				});
			});
		</script>
        <script src="BYB%20%7C%20Administrator%20Menu_files/SpryMenuBar.js" type="text/javascript"></script>
        <script type="text/javascript" src="BYB%20%7C%20Administrator%20Menu_files/validator3.js"></script>
        <script type="text/javascript">
        <!--
        var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
        //-->
        </script>
    </head>
<body>
    <!--header-->


<div class="mast">
<div class="container">
        <div class="row">
            <div class="logo col-md-1">
                <div>
                    <a href="#">
                        <img src="BYB%20%7C%20Administrator%20Menu_files/byblogo.png" width="90" height="90">
                    </a>
                </div>
            </div>
            <div class="col-md-11">
                <div class="mast-nav" style="text-align: center;">
                    <ul id="menu" style="color: red;">
                        <li class="active"><a href="file:///home/mech/Desktop/adminindex.php">Add New Staff</a>
                        </li>
                        <li><a href="file:///home/mech/Desktop/sdetails.php">Existing Staff Details</a>
                        </li>
                        <li><a href="file:///home/mech/Desktop/modify.php">Modify Staff</a>
                        </li>
                        <li><a href="file:///home/mech/Desktop/roles.php">Manage Roles</a>
                        </li>
                        

                    </ul>
                </div>
            </div>
        </div>
    </div> 
</div>
   

    <div style="margin-top:120px;" class="container">
<div style="padding:10px;" class="panel panel-default">
    <div class="row">
        <div class="col-sm-3">
            <h5>Welcome <!--?php echo $_SESSION['admin'][1]; ?-->,</h5>
        </div>
        <div class="col-sm-8">
            
        </div>
        <div class="col-sm-1">
            <a class="btn btn-default btn-block" href="file:///home/mech/Desktop/logout.php">Logout</a>
        </div>
        
    </div>
</div>
    


        <div class="">
            <h2>Assign Role Authority</h2>
            
            
            <form class="form-horizontal" role="form" action="staffreg.php" onsubmit="return validateAll()" method="post">
            <div class="well">
      
<table style="width:100%">
  <tbody><tr>
    <td> </td>
    <td>Admin</td>
    <td>Director</td>
    <td>Principal</td>	
    <td>HOD</td>
    <td>Mentor</td>
    <td>Subject teacher</td>	
 </tr>
  <tr>
    <td>Admin</td>
    <td><input checked="checked" name="Admin1" type="checkbox"> </td>		
    <td> <input checked="checked" name="Admin2" type="checkbox"></td>
    <td> <input checked="checked" name="Admin3" type="checkbox"></td>		
    <td><input checked="checked" name="Admin4" type="checkbox"> </td>
    <td> <input checked="checked" name="Admin5" type="checkbox"></td>		
    <td><input checked="checked" name="Admin6" type="checkbox"> </td>
  </tr>
   <tr>
    <td>Director</td>
    <td><input name="Director1" type="checkbox"> </td>		
    <td> <input name="Director2" type="checkbox"></td>
    <td> <input name="Director3" type="checkbox"></td>		
    <td><input checked="checked" name="Director4" type="checkbox"> </td>
    <td> <input checked="checked" name="Director5" type="checkbox"></td>		
    <td><input checked="checked" name="Director6" type="checkbox"> </td>
  </tr>
 <tr>
    <td>Principal</td>
     <td><input name="Principal1" type="checkbox"> </td>		
    <td> <input name="Principal2" type="checkbox"></td>
    <td> <input name="Principal3" type="checkbox"></td>		
    <td><input name="Principal4" type="checkbox"> </td>
    <td> <input checked="checked" name="Principal5" type="checkbox"></td>		
    <td><input checked="checked" name="Principal6" type="checkbox"> </td>
  </tr>
<tr>
    <td>HOD</td>
    <td><input name="HOD1" type="checkbox"> </td>		
    <td> <input name="HOD2" type="checkbox"></td>
    <td> <input name="HOD3" type="checkbox"></td>		
    <td><input name="HOD4" type="checkbox"> </td>
    <td> <input checked="checked" name="HOD5" type="checkbox"></td>		
    <td><input checked="checked" name="HOD6" type="checkbox"> </td>
  </tr>
 <tr>
    <td>Mentor</td>
   <td><input name="Mentor1" type="checkbox"> </td>		
    <td> <input name="Mentor2" type="checkbox"></td>
    <td> <input name="Mentor3" type="checkbox"></td>		
    <td><input name="Mentor4" type="checkbox"> </td>
    <td> <input checked="checked" name="Mentor5" type="checkbox"></td>		
    <td><input checked="checked" name="Mentor6" type="checkbox"> </td>
  </tr>
 <tr>
    <td>Subject Teacher</td>
     <td><input name="SubjectTeacher1" type="checkbox"> </td>		
    <td> <input name="SubjectTeacher2" type="checkbox"></td>
    <td> <input name="SubjectTeacher3" type="checkbox"></td>		
    <td><input name="SubjectTeacher4" type="checkbox"> </td>
    <td> <input checked="checked" name="SubjectTeacher5" type="checkbox"></td>		
    <td><input checked="checked" name="SubjectTeacher6" type="checkbox"> </td>
  </tr>
</tbody></table>

        <center><button class="btn btn-info btn-md" type="submit" style="margin-bottom:10px;">Approve and send email</button></center>
                
    </div>  
 </form></div>
</div>
        
        
<!--  Footer  -->
<div class="lineBlack">
    <div class="container">
        <div class="row downLine">
            <div class="col-md-12 text-right">
            </div>
            <div class="col-md-6 text-left copy">
                <p>Copyright © 2014 Build Your Brand. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-right dm">
                <ul id="downMenu">
                    <li class="active"><a href="#home">Home</a>
                    </li>
                    <li><a href="#" target="blank">Link 1</a>
                    </li>
                    <li><a href="#" target="blank">Link 2</a>
                    </li>
                    <li><a href="#" target="blank">Link 3</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--  End of Footer  -->


</body></html>
<!--?php
}
?-->