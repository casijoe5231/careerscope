<?php
    session_start();
    if(isset($_SESSION['user']))
    {
    include 'includes/connection1.php';
    
    $emails=$_SESSION['user'][0];
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s"); 
    $sql="insert into activity(email,menu_accessed,timesql) values('$emails','Admin Existing Staff Details','$timesql')";
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
<!-- Favicon -->
    <link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>BYB | Administrator Menu </title>
      
<!--  CSS  -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel='stylesheet' id='camera-css'  href='css/camera.css' type='text/css' media='all'>
    <link rel="stylesheet" type="text/css" href="css/carousel.css">
    <link rel="stylesheet" type="text/css" href="css/slicknav.css">
    <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main
    stylesheet"charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet'             type='text/css'>
      
<!--  JS  -->
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script> 
    <script type="text/javascript" src="js/camera.min.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
    <script src="js/sorting.js" type="text/javascript"></script>
    <script src="js/jquery.isotope.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js"></script>
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
        <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
        <script  type="text/javascript" src="validator3.js" ></script>
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
                        <img src="images/byblogo.png" width="90" height="90">
                    </a>
                </div>
            </div>
            <div class="col-md-11">
                <div class="mast-nav" style="text-align: center;">
                    <ul id="menu" style="color: red;" >
                         <li><a href="lecturerdetails.php">Existing Staff Details</a>
                        </li>
                        <li class="active"><a href="addsubject.php">Add subject</a>
                        </li>
                        
                        <li class="active"><a href="getdata.php">View Subject Details</a>
                        </li>
                         <li class="active"><a href="demo2.php">Assign Task</a>
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
            <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
        </div>
        <div class="col-sm-8">
            
        </div>
        <div class="col-sm-1">
            <a class="btn btn-default btn-block" href="logout.php">Logout</a>
        </div>
        
    </div>
</div>
    
        <table class="table table-hover"  style="margin-top:20px;margin-bottom:20px;">
        
        <tr>
        <th><b>Staff Name</b></th>
        <th><b>Email</b></th>
        <th><b>Mobile No.</b></th>
        <th><b>Discipline</b></th>
        <th><b>Department</b></th>
        <th><b>Role</b></th>
        </tr>
        <?php
        $sql="select * from masteruser where role='Staff'";
        $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
        while($row=mysqli_fetch_array($res))
        {
        $sql1="select * from istaff where email='$row[email]' and is_lecturer=1";
        $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
        while($row1=mysqli_fetch_array($res1))
        {
        ?>
        <tr><td><?php echo $row['name'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['mobile'] ?></td>
        <td><?php echo $row['discipline'] ?></td>
        <td><?php echo $row1['department'] ?></td>
        <td>
        <?php
        if($row1['is_lecturer']==1)
        {
        echo "Lecturer<br>";
        }
        if($row1['is_subjteacher']==1)
        {
        echo "Subject Teacher<br>";
        }
        ?>
        </td>
        </tr>
        <?php
        }
        }
        ?>
        
        </table>
        <?php
        if(isset($_POST['submit']))
{
include 'includes/connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
$email=$_POST['email'];

$sql="update masteruser set status=2 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Email Sent!!', function (e) {
    window.location.href='adminindex.php';
});</SCRIPT>";

}
        ?>
    </div>
        
<!--  Footer  -->
<div class="lineBlack">
    <div class="container">
        <div class="row downLine">
            <div class="col-md-12 text-right">
            </div>
            <div class="col-md-6 text-left copy">
                <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-right dm">
                <ul id="downMenu">
                    <li class="active"><a href="#home">Home</a>
                    </li>
                    <li><a href="#" target="blank">Link 1</a>
                    </li>
                    <li class="active" ><a href="#" target="blank">Link 2</a>
                    </li>
                    <li><a href="#" target="blank">Link 3</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--  End of Footer  -->
</body>
</html>
<?php
}
?>