<?php
    session_start();
    if(!isset($_SESSION['admin']))
        header("location: login.php");
    include 'includes/connection1.php';
    $emails=$_SESSION['admin'][0];
    $sql5="select * from masteruser where email='$emails'";
    $res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
    while($row5=mysqli_fetch_array($res5))
    {
      $_SESSION['institute']=$row5['institute'];
    }
    
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s"); 
    $sql="insert into activity(email,menu_accessed,timesql) values('$emails','Admin Modify Existing Staff','$timesql')";
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
        


        <!--Custom CSS-->
<link rel="stylesheet" type="text/css" href="css/ColumnFilterWidgets.css">
<script type="text/javascript" charset="utf-8" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="js/ColVis.js"></script>
<link rel="stylesheet" type="text/css" href="css/ColVis.css">

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script  type="text/javascript" src="validator2.js" ></script>

<script>
$(document).ready( function () {
    $('#details').dataTable( {
         bAutoWidth:false ,
        "sDom": 'W<"clear">lfrtip',
         oColumnFilterWidgets: {
        aiExclude: [7,8]
       }
    } );
} );


/*$(document).ready( function () {
    $("#details").dataTable().columnFilter();
} );*/
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
                        <li><a href="adminindex.php">Add New Staff</a>
                        </li>
                        <li><a href="sdetails.php">Existing Staff Details</a>
                        </li>
                        <li class="active"><a href="modify.php">Modify Staff</a>
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
            <h5>Welcome <?php echo $_SESSION['admin'][1]; ?>,</h5>
        </div>
        <div class="col-sm-8">
            
        </div>
        <div class="col-sm-1">
            <a class="btn btn-default btn-block" href="logout.php">Logout</a>
        </div>
        
    </div>
</div>

        <table class="table table-hover" id="details"  style="margin-top:20px;margin-bottom:20px;">
        <thead>
        <tr>
        <th><b>Staff Name</b></th>
        <th><b>Existing role</b></th>
        <th><b>Current status</b></th>
        <th><b>Change role</b></th>
        <th><b>Change status</b></th>
        <th><b>Email</b></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql="select * from masteruser where role='Staff' and institute='$_SESSION[institute]'";
        $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
        while($row=mysqli_fetch_array($res))
        {
        $sql1="select * from istaff where email='$row[email]' and is_admin!=1";
        $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
        while($row1=mysqli_fetch_array($res1))
        {
        ?>
        <tr><td><?php echo $row['name'] ?></td>
        <td>
        <?php
        if($row1['is_director']==1)
        {
        echo "Director<br>";
        }
        if($row1['is_principal']==1)
        {
        echo "Principal<br>";
        }
        if($row1['is_hod']==1)
        {
        echo "HOD<br>";
        }
        if($row1['is_tpo']==1)
        {
        echo "TPO<br>";
        }
        if($row1['is_mentor']==1)
        {
        echo "Mentor<br>";
        }
        if($row1['is_testmgr']==1)
        {
        echo "Test Manager<br>";
        }
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
        <td>
        <?php
        if($row1['active_yn']==1)
        {
        echo "Active";
        }
        if($row1['active_yn']==0)
        {
        echo "Inactive";
        }
        ?>
        </td>
        <form name="trial" method="GET">
        <td><input type="checkbox" name="Director" value="Director">Director
        <input type="hidden" name="director2" value="Director">
        <input type="checkbox" name="Principal" value="Principal">Principal
        <input type="hidden" name="principal2" value="Principal">
        <input type="checkbox" name="HOD" value="HOD">HOD
        <input type="hidden" name="hod2" value="HOD">
        <input type="checkbox" name="TPO" value="TPO">TPO
        <input type="hidden" name="tpo2" value="TPO">
        <input type="checkbox" name="Mentor" value="Mentor">Mentor
        <input type="hidden" name="mentor2" value="Mentor">
        <input type="checkbox" name="TestManager" value="TestManager">Test Manager
        <input type="hidden" name="testmgr2" value="TestManager">
        <input type="checkbox" name="Lecturer" value="Lecturer">Lecturer
        <input type="hidden" name="lecturer2" value="Lecturer">
        <input type="checkbox" name="SubjectTeacher" value="SubjectTeacher">Subject Teacher
        <input type="hidden" name="subjteacher2" value="SubjectTeacher"><br>
        <label><span id="role" style="color:#C00;"></span></label>
        </td>
        <td>
        <input type="checkbox" name="active" value="active">
        <input type="hidden" name="active2" value="active">
        </td>
        <td>
        <input type="hidden" name="email1" value="<?php echo $row['email']; ?>">
        <input type='submit' name='submit' id='submit' value='Send email' style='cursor:pointer;'>
        </td>
        </form>
        </tr>
        <?php
        }
        }
        ?>
        </tbody>
        </table>
        
    </div>
        <?php
        if(isset($_GET['submit']))
        {
            include 'includes/connection1.php';
            $email=$_GET['email1'];

                if(isset($_GET['active'])){
                    if(isset($_GET['active2'])){
                            $active=$_GET['active'];
                            $sql="select * from istaff where email='$email'";
                            $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
                            while($row=mysqli_fetch_array($res))
                            {
                            if($row['active_yn']==1)
                            {
                            $sql="update istaff set active_yn='0' where email='$email'";
                            $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
                            }
                            else
                            {
                            $sql="update istaff set active_yn='1' where email='$email'";
                            $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
                            }
                            }
                            }
        }
        else
        {
        $sql="update istaff set is_director=0, is_principal=0, is_hod=0, is_tpo=0, is_lecturer=0, is_mentor=0, is_testmgr=0, is_subjteacher=0 where email='$email'";
        $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

                            if(isset($_GET['Lecturer']))
                            {
                            if(isset($_GET['lecturer2']))
                            {
                            $lecturer=$_GET['Lecturer'];
                            $sql="update istaff set is_lecturer='1' where email='$email'";
                            $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
                            }
                            }
                            
                            if(isset($_GET['Mentor']))
                            {
                            if(isset($_GET['mentor2']))
                            {
                            $mentor=$_GET['Mentor'];
                            $sql="update istaff set is_mentor='1' where email='$email'";
                            $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
                            }
                            }
                            
                            if(isset($_GET['Director']))
                            {
                            if(isset($_GET['director2']))
                            {
                            $director=$_GET['Director'];
                            $sql="update istaff set is_director='1' where email='$email'";
                            $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
                            }
                            }
                            
                            if(isset($_GET['Principal']))
                            {
                            if(isset($_GET['principal2']))
                            {
                            $principal=$_GET['Principal'];
                            $sql="update istaff set is_principal='1' where email='$email'";
                            $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
                            }
                            }
                            
                            if(isset($_GET['HOD']))
                            {
                            if(isset($_GET['hod2']))
                            {
                            
                            $sql="update istaff set is_hod='1' where email='$email'";
                            $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
                            }
                            }
                            
                            if(isset($_GET['TPO']))
                            {
                            if(isset($_GET['tpo2']))
                            {
                            $tpo=$_GET['TPO'];
                            $sql="update istaff set is_tpo='1' where email='$email'";
                            $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
                            }
                            }
                            
                            if(isset($_GET['TestManager']))
                            {
                            if(isset($_GET['testmgr2']))
                            {
                            $test=$_GET['TestManager'];
                            $sql="update istaff set is_testmgr='1' where email='$email'";
                            $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
                            }
                            }
                            
                            if(isset($_GET['SubjectTeacher']))
                            {
                            if(isset($_GET['subjteacher2']))
                            {
                            $subj=$_GET['SubjectTeacher'];
                            $sql="update istaff set is_subjteacher='1' where email='$email'";
                            $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
                            }
                            }
        }                   
        echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Modification done successfully!');
    window.location.href='modify.php';</SCRIPT>";
}        
/*$To = $email; 
$Subject = 'Send Email'; 
$Message = 'Your role is modified as:'.if(isset($_GET['Director'])){echo $_GET['Director'];}.','.if(isset($_GET['Principal'])){echo $_GET['Principal'];}.','.if(isset($_GET['HOD'])){echo $_GET['HOD'];}.','.if(isset($_GET['TPO'])){echo $_GET['TPO'];}.','.if(isset($_GET['Mentor'])){echo $_GET['Mentor'];}.','.if(isset($_GET['SubjectTeacher'])){echo $_GET['SubjectTeacher'];}.','.if(isset($_GET['TestManager'])){echo $_GET['TestManager'];}.','.if(isset($_GET['Lecturer'])){echo $_GET['Lecturer'];};
$Headers = "From: priyankamalekar9@gmail.com \r\n" . 
"Reply-To: priyankamalekar9@gmail.com \r\n" . 
"Content-type: text/html; charset=UTF-8 \r\n"; 
  
mail($To, $Subject, $Message, $Headers);                
*/

 ?>
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
</body>
</html>