<?php
    session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }

    if ($_SESSION['usertype']!=1) {
        if ($_SESSION['usertype']!=2) {
            header("location:../login.php");
        }
    }

    include '../includes/connection1.php';
    $name=$_SESSION['user'][1];
    $emaill=$_SESSION['user'][0];
    
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s"); 
    // Tracking the user
    $sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Academic Brand Choose Mentor','$timesql')";
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Favicon -->
        <link href="../images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | Blank </title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
        <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>

        <link rel="stylesheet" type="text/css" href="../css/slicknav.css">
        <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/style2.css">


        <script type="text/javascript" src="../js/jquery-1.8.3.min.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="../js/jquery.mobile.customized.min.js"></script>
        <script type="text/javascript" src="../js/jquery.easing.1.3.js"></script> 
        <script type="text/javascript" src="../js/camera.min.js"></script>
        <script type="text/javascript" src="../js/myscript.js"></script>
        <script src="../js/sorting.js" type="text/javascript"></script>
        <script src="../js/jquery.isotope.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.slicknav.js"></script>
        <!--script type="text/javascript" src="../js/jquery.nav.js"></script-->


        
    </head>
    <body>

        <div style="margin-bottom:20px;" id="home">
            <div class="headerLine">
                <div id="menuF" class="default" style="margin-bottom:25px;">
                    <div class="container">
                        <div class="row">
                            <div class="logo col-md-2">
                                <div>
                                    <a href="#">
                                        <img src="../images/byblogo.png" width="120" height="120">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-10">
                                	<div class="navmenu"style="text-align: center;">
						                <ul id="menu">
                                            <li><a href="../newindex.php">Home</a></li>
                                            <li  class="active"><a href="register.php">Academic Brand</a></li>
                                            <li><a href="test_reports.php">Technical Brand</a></li>
                                            <li><a href="events.php">Technical Brand</a></li>
                                        </ul>
					               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Main Content Here -->
        <div class="container">

        <div style="padding:10px;" class="panel panel-default">
            <div class="row">
                <div class="col-sm-2">
                    <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
                </div>
                <div class="col-sm-10">
                    <div class="col-sm-8"></div>

                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../newindex.php"><span class="glyphicon glyphicon-home"></span> Home</a></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../logout.php">Logout</a></div>
                
                </div>
            </div>
        </div>
        <h1>Mentor Requests</h1>
        
        <div class="row">
            <div class="col-sm-2">
                <div style="margin-top:20px;" class="list-group">
                    <a href="register.php" class="list-group-item">Register</a>
                    <a href="choose.php" class="list-group-item active">Choose your Mentor</a>
                    <a href="newindex.php" class="list-group-item">Add Achievements</a>
                    <a href="sdisplay1.php" class="list-group-item">Display your Brand</a>
                    <a href="presresume.php" class="list-group-item">Dynamic Resume</a>
                  </div>
            </div>
            <div class="col-sm-10">

                <!--content goes here-->
                <div class="row">
                    <table class="table table-hover"  style="margin-top:20px;margin-bottom:20px;">
        <thead>
            <tr>
        <th><b>Mentor Name</b></th>
        <th><b>Designation</b></th>
        <th><b>Department</b></th>
        <th><b>Send Request</b></th>
        </tr>
        </thead>
        
        <?php
        include '../includes/connection1.php';
        $sql="select * from istaff where is_mentor=1 and is_admin!=1 and is_tpo!=1";
        $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
        while($row=mysqli_fetch_array($res))
        {
        ?>
        <tr>
        <td><?php echo $row['staff_name'] ?></td>
        <td>
        <?php
        if($row['is_director']==1)
        {
        echo "Director<br>";
        }
        if($row['is_hod']==1)
        {
        echo "Head of Department<br>";
        }
        if($row['is_principal']==1)
        {
        echo "Principal<br>";
        }
        if($row['is_lecturer']==1)
        {
        echo "Lecturer<br>";
        }
        if($row['is_tpo']==1)
        {
        echo "TPO<br>";
        }
        if($row['is_subjteacher']==1)
        {
        echo "Subject Teacher<br>";
        }
        if($row['is_testmgr']==1)
        {
        echo "Test Manager<br>";
        }
        ?>
        </td>
        <td><?php echo $row['department'] ?></td>
        <td>
        <?php
        $sql1="select * from approve_mentor where name='$name' and mname='$row[staff_name]'";
        $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
        $num=mysqli_num_rows($res1);
        if($num==0)
        {
        ?>
        <form name="trial" method="GET">
        <input type="hidden" name="mname" value="<?php echo $row['staff_name']; ?>">
        <input class="btn btn-default btn-block" type='submit' name='submit' id='submit' value='Send request' style='cursor:pointer;'>
        </form>
        <?php
        }
        while($row1=mysqli_fetch_array($res1))
        {
        if($row1['status']==0)
        {
        echo "<div style='padding:6px;margin-bottom:0px;' class='text-center alert alert-info'>Request Sent</div>";
        }
        elseif($row1['status']==1)
        {
        echo "<div style='padding:6px;margin-bottom:0px;' class='text-center alert alert-success'>Request Accepted</div>";
        }
        else
        {
        echo "<div style='padding:6px;margin-bottom:0px;' class='text-center alert alert-danger'>Request Rejected</div>";
        }
        }
        ?>
        </td>
        </tr>
        <?php
        }
        ?>
        
        </table>

        <?php
        if(isset($_GET['submit']))
{
include '../includes/connection1.php';

$name1=$_SESSION['user'][1];
$email2=$_SESSION['user'][0];
$mname=$_GET['mname'];
$sql="insert into approve_mentor(id,email,name,mname,status)values('','$email2','$name1','$mname',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Request Sent!!');
    window.location.href='choose.php';</SCRIPT>";
}
        ?>
                </div>
            </div>
        </div>














        </div>
        <!-- End of the main content -->
        
        

  <div class="lineBlack">
            <div class="container">
                <div class="row downLine">
                    <div class="col-md-12 text-right">
                        <!--input  id="searchPattern" type="search" name="pattern" value="Search the Site" onblur="if(this.value=='') {this.value='Search the Site'; }" onfocus="if(this.value =='Search the Site' ) this.value='';this.style.fontStyle='normal';" style="font-style: normal;"/-->
                        <!--	<input  id="searchPattern" type="search" placeholder="Search the Site"/><i class="glyphicon glyphicon-search" style="font-size: 13px; color:#a5a5a5;" id="iS"></i>
</div>-->
                        <div class="col-md-6 text-left copy">
                            <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
                        </div>
                        <div class="col-md-6 text-right dm">
                            <ul id="downMenu">
                                            <li><a href="../newindex.php">Home</a></li>
                                            <li><a href="register.php" >Academic Brand</a></li>
                                            <li><a href="test_reports.php" >Technical Brand</a></li>
                                            <li><a href="events.php" >Technical Brand</a></li>
                                      
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


