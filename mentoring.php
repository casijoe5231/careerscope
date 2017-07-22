<?php

    session_start();
    if(!isset($_SESSION['user']))
    {
        header("location:login.php?error=1");
    }

    if(!($_SESSION['usertype']==6 || $_SESSION['usertype']==8 || $_SESSION['usertype']==11 || $_SESSION['usertype']==13 ||
     $_SESSION['usertype']==14 || $_SESSION['usertype']==16 || $_SESSION['usertype']==18 || $_SESSION['usertype']==19)){
        header("location:login.php?error=1");
    }
    $usertype= $_SESSION['usertype'];
    include 'includes/connection1.php';
    $emails=$_SESSION['user'][0];
    $name=$_SESSION['user'][1];
    $_SESSION['email']=$emails;
    $sql7="select * from masteruser where email='$_SESSION[email]'";
        $res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
        while($row7=mysqli_fetch_array($res7))
        {
        $discipline=$row7['discipline'];
        $_SESSION['discipline']=$discipline;
        }
    
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s"); 
    $sql="insert into activity(email,menu_accessed,timesql) values('$emails','Mentoring Requests','$timesql')";
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed"); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Favicon -->
        <link href="images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | Blank </title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
        <link rel='stylesheet' id='camera-css'  href='css/camera.css' type='text/css' media='all'>

        <link rel="stylesheet" type="text/css" href="css/slicknav.css">
        <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="css/style2.css">


        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/jquery.mobile.customized.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script> 
        <script type="text/javascript" src="js/camera.min.js"></script>
        <script type="text/javascript" src="js/myscript.js"></script>
        <script src="js/sorting.js" type="text/javascript"></script>
        <script src="js/jquery.isotope.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.slicknav.js"></script>
        <!--script type="text/javascript" src="js/jquery.nav.js"></script-->


        
    </head>
    <body>

        <div id="home">
            <div class="headerLine">
                <div id="menuF" class="default" style="margin-bottom:25px;">
                    <div class="container">
                        <div class="row">
                            <div class="logo col-md-2">
                                <div>
                                    <a href="#">
                                        <img src="images/byblogo.png" width="120" height="120">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-10">
                                    <div class="navmenu"style="text-align: center;">
                                        <ul id="menu">
                                            <li><a href="Home.html">Home</a></li>
                                            <li><a href="Big5.html" target="_blank">Take Test</a></li>
                                            <li><a href="Big5_Reports.html" target="_blank">Reports</a></li>
                                        </ul>
                                   </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  Welcome Bar  -->
        <nav class="navbar-container">
            <ul class="nav nav-pills navbar-left">
                <p class="navbar-brand">Welcome <?php echo $_SESSION['user'][1]; ?>,</p>
            </ul>
            <ul class="nav nav-pills navbar-right" style="margin-top:6px; margin-right:10px;">
                <li style="padding: 0 8px 0 8px;"><a href="login.php" style="padding: 6px 12px;" class="btn btn-md btn-default">
                    &laquo; Back
                    </a>
                </li>
                <li style="padding: 0 8px 0 8px;">
                    <div class="dropdown">
                      <button class="btn btn-default dropdown-toggle" type="button" id="current-role" data-toggle="dropdown" aria-expanded="true">
                        as Mentor
                        <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu" role="menu" aria-labelledby="current-role">

                      <?php
                        if($usertype>=9 && $usertype<=14){
                            echo '<li role="presentation">';
                            echo '<a role="menuitem" tabindex="-1" href="hodindex.php">';
                            echo 'HOD';
                            echo '</a></li>';
                        }

                        if(($usertype>=10 && $usertype<=13) || ($usertype>=15 && $usertype<=18)){

                            echo '<li role="presentation">';
                            echo '<a role="menuitem" tabindex="-1" href="lecturerindex.php">';
                            echo 'Lecturer';
                            echo '</a></li>';
                        }

                        if($usertype==11 || $usertype==13 || $usertype==14 || $usertype==16 || $usertype==18 || $usertype==19){

                            echo '<li role="presentation">';
                            echo '<a role="menuitem" tabindex="-1" href="mentorindex.php">';
                            echo 'Mentor';
                            echo '</a></li>';
                        }

                        if($usertype==12 || $usertype==13 || $usertype==17 || $usertype==18){

                            echo '<li role="presentation">';
                            echo '<a role="menuitem" tabindex="-1" href="testindex.php">';
                            echo 'Test';
                            echo '</a></li>';
                        }
                    ?>
                      </ul>
                    </div>
                </li>
                
                <li style="padding: 0 8px 0 8px;"><a href="logout.php" style="padding: 6px 12px;" class="btn btn-md btn-default">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"> </span> Log Out
                    </a>
                </li>
            </ul>  
        </nav>

<!--  /Welcome Bar  -->


        <!-- Main Content Here -->
        <div class="container">
        <div class="row">
        <h1>Mentoring Requests</h1>
            <div class="col-sm-offset-2 col-sm-8">
            <table class="table table-hover" style="margin-top:20px;">
        <thead>      
        <tr>
        <th><b>Student Name</b></th>
        <th><b>Branch</b></th>
        <th><b>Send Request</b></th>
        </tr>
        </thead>
        <?php
        include 'includes/connection1.php';
        $sql="select * from approve_mentor where mname='$name'";
        $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
        while($row=mysqli_fetch_array($res))
        {
        $sql2="select * from masteruser where email='$row[email]'";
        $res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
        while($row2=mysqli_fetch_array($res2))
        {
        ?>
        <tr>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row2['branch'] ?></td>
        <td>
        <?php
        $sql1="select * from approve_mentor where name='$row[name]' and mname='$name'";
        $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
        $num=mysqli_num_rows($res1);
        while($row1=mysqli_fetch_array($res1))
        {
        if($row1['status']==0)
        {
        ?>
        <form name="trial" method="GET">
        <input type="hidden" name="stuname" value="<?php echo $row['name']; ?>">
        <input class="btn btn-default btn-block" type='submit' name='submit' id='submit' value='Accept' style='cursor:pointer;'>
        <input class="btn btn-default btn-block" type='submit' name='submit1' id='submit' value='Reject' style='cursor:pointer;'>
        </form>
        <?php
        }
        elseif($row1['status']==1)
        {
        echo "<div class='alert alert-success text-center' style='padding:6px 12px;margin-bottom:0px;'>Accepted</div>";
        //echo "<input type='submit' name='submit1' id='submit' value='Reject' style='cursor:pointer;'>";
        }
        else
        {
        echo "<div class='alert alert-danger text-center' style='padding:6px 12px;margin-bottom:0px;'>Rejected</div>";
        //echo "<input type='submit' name='submit' id='submit' value='Accept' style='cursor:pointer;'>";
        }
        }
        ?>
        </td>
        </tr>
        <?php
        }
        }
        ?>
        
        </table>
        </div></div>

        </div>
        <?php
        if(isset($_GET['submit']))
{
include 'includes/connection1.php';
$name1=$_SESSION['user'][1];
$stuname=$_GET['stuname'];
$sql="update approve_mentor set status=1 where name='$stuname' and mname='$name1'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Request Accepted!!');
    window.location.href='mentoring.php';
    </SCRIPT>";
}


        if(isset($_GET['submit1']))
{
include 'includes/connection1.php';
$name1=$_SESSION['user'][1];
$stuname=$_GET['stuname'];
$sql="update approve_mentor set status=2 where name='$stuname' and mname='$name1'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Request Rejected!!');
    window.location.href='mentoring.php';
    </SCRIPT>";
}
        ?>
        <!-- End of the main content -->
        
        

  <div class="lineBlack">
            <div class="container">
                <div class="row downLine">
                    <div class="col-md-12 text-right">
                        <!--input  id="searchPattern" type="search" name="pattern" value="Search the Site" onblur="if(this.value=='') {this.value='Search the Site'; }" onfocus="if(this.value =='Search the Site' ) this.value='';this.style.fontStyle='normal';" style="font-style: normal;"/-->
                        <!--    <input  id="searchPattern" type="search" placeholder="Search the Site"/><i class="glyphicon glyphicon-search" style="font-size: 13px; color:#a5a5a5;" id="iS"></i>
</div>-->
                        <div class="col-md-6 text-left copy">
                            <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
                        </div>
                        <div class="col-md-6 text-right dm">
                            <ul id="downMenu">
                                <li class="active"><a href="Home.html">Home</a></li>
                                <li><a href="EP.html" target="_blank">E Portfolio</a></li>
                                <li><a href="Aptitude_test.html" target="_blank">Aptitude Test</a></li>
                                <li><a href="Psychometric_test.html" target="_blank">Psychometric Test</a></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


