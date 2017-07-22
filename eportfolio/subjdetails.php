<?php
    session_start();
$con=mysqli_connect("localhost","root","","careerscope");

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }

    if ($_SESSION['usertype']!=1) {
        if ($_SESSION['usertype']!=2) {
            header("location:../login.php");
        }
    }

    include '../includes/connection1.php';
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
                    <div class="col-sm-6"></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="profile.php"><span class="glyphicon glyphicon-chevron-left"></span> Back </a></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../newindex.php"><span class="glyphicon glyphicon-home"></span> Home </a></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../logout.php">Logout</a></div>
                
                </div>
            </div>
        </div>
        <h1>Mentor Requests</h1>
        
        <div class="row">
            <div class="col-sm-2">
                <div style="margin-top:20px;" class="list-group">
                    <a href="profile.php" class="list-group-item active">Job Profiling</a>
                    <a href="../riasec/index.php" class="list-group-item ">Holland Test</a>
                    <a href="#" class="list-group-item">Interview</a>
                    <a href="goal.php" class="list-group-item">Job Aptitude</a>
                    <a href="presresume.php" class="list-group-item">Resume</a>
                    <a href="#" class="list-group-item">Biographical Sketch</a>
                  </div>
            </div>
            <div class="col-sm-10">
            
                <!--content goes here-->
                <div class="row">
                   <table border=0 style="margin-top:20px;margin-bottom:20px;">
<tr>
<td><div style="background-color:#EEEEEE"><b><h4>Job Name:</h4></b></div></td>
</tr>
<tr>
<td>
<?php

    $sql2="SELECT distinct job_desc from job_master WHERE jm_id ='$_GET[job]'";
    $res2=mysqli_query($con, $sql2);
    while($row2=mysqli_fetch_array($res2))
    {
        echo "<h2>".$row2['job_desc']."</h2>";
    }
    
?>
<br>
</td>
</tr>
<tr>
<td><div style="background-color:#EEEEEE"><b><h4>Engineering knowledge:</h4></b></div></td>
</tr>
<tr>
<td>
<?php

    $sql2="SELECT distinct engg_knowledge from job_master WHERE jm_id ='$_GET[job]'";
    $res2=mysqli_query($con, $sql2);
    while($row2=mysqli_fetch_array($res2))
    {
        echo $row2['engg_knowledge']."<br>";
    }
?>
<br>
</td>
</tr>
<tr>
<td><div style="background-color:#EEEEEE"><b><h4>Problem analysis:</h4></b></div></td>
</tr>
<tr>
<td>
<?php

    $sql2="SELECT prob_analysis from job_master WHERE jm_id ='$_GET[job]'";
    $res2=mysqli_query($con, $sql2);
    while($row2=mysqli_fetch_array($res2))
    {
        echo $row2['prob_analysis']."<br><br>";
    }

?>
</td>
</tr>
<tr>
<td><div style="background-color:#EEEEEE"><b><h4>Design/Development of solutions:</h4></b></div></td>
</tr>
<tr>
<td>
<?php

    $sql2="SELECT development from job_master WHERE jm_id ='$_GET[job]'";
    $res2=mysqli_query($con, $sql2);
    while($row2=mysqli_fetch_array($res2))
    {
        echo $row2['development']."<br><br>";
    }

?>
</td>
</tr>
<tr>
<td><div style="background-color:#EEEEEE"><b><h4>Conduct investigation of complex problems:</h4></b></div></td>
</tr>
<tr>
<td>
<?php

    $sql2="SELECT investigation from job_master WHERE jm_id ='$_GET[job]'";
    $res2=mysqli_query($con, $sql2);
    while($row2=mysqli_fetch_array($res2))
    {
        echo $row2['investigation']."<br><br>";
    }

?>
</td>
</tr>
<tr>
<td><div style="background-color:#EEEEEE"><b><h4>Model tool usage:</h4></b></div></td>
</tr>
<tr>
<td>
<?php

    $sql2="SELECT model_tool from job_master WHERE jm_id ='$_GET[job]'";
    $res2=mysqli_query($con, $sql2);
    while($row2=mysqli_fetch_array($res2))
    {
        echo $row2['model_tool']."<br><br>";
    }

?>
</td>
</tr>
<tr>
<td><div style="background-color:#EEEEEE"><b><h4>Ethics:</h4></b></div></td>
</tr>
<tr>
<td>
<?php

    $sql2="SELECT ethics from job_master WHERE jm_id ='$_GET[job]'";
    $res2=mysqli_query($con, $sql2);
    while($row2=mysqli_fetch_array($res2))
    {
        echo $row2['ethics']."<br><br>";
    }

?>
</td>
</tr>
<tr>
<td><div style="background-color:#EEEEEE"><b><h4>Individual and team work:</h4></b></div></td>
</tr>
<tr>
<td>
<?php

    $sql2="SELECT team_work from job_master WHERE jm_id ='$_GET[job]'";
    $res2=mysqli_query($con, $sql2);
    while($row2=mysqli_fetch_array($res2))
    {
        echo $row2['team_work']."<br><br>";
    }

?>
</td>
</tr>
<tr>
<td><div style="background-color:#EEEEEE"><b><h4>Communication:</h4></b></div></td>
</tr>
<tr>
<td>
<?php

    $sql2="SELECT communication from job_master WHERE jm_id ='$_GET[job]'";
    $res2=mysqli_query($con, $sql2);
    while($row2=mysqli_fetch_array($res2))
    {
        echo $row2['communication']."<br><br>";
    }

?>
</td>
</tr>
<tr>
<td><div style="background-color:#EEEEEE"><b><h4>Project management and finance:</h4></b></div></td>
</tr>
<tr>
<td>
<?php

    $sql2="SELECT project_mgt from job_master WHERE jm_id ='$_GET[job]'";
    $res2=mysqli_query($con, $sql2);
    while($row2=mysqli_fetch_array($res2))
    {
        echo $row2['project_mgt']."<br><br>";
    }

?>
</td>
</tr>
<tr>
<td><div style="background-color:#EEEEEE"><b><h4>Life long learning:</h4></b></div></td>
</tr>
<tr>
<td>
<?php

    $sql2="SELECT learning from job_master WHERE jm_id ='$_GET[job]'";
    $res2=mysqli_query($con, $sql2);
    while($row2=mysqli_fetch_array($res2))
    {
        echo $row2['learning']."<br><br>";
    }

?>
</td>
</tr>
<tr>
<td><div style="background-color:#EEEEEE"><b><h4>Technical responsibilities:</h4></b></div></td>
</tr>
<tr>
<td>
<?php

    $sql2="SELECT responsibilities from job_master WHERE jm_id ='$_GET[job]'";
    $res2=mysqli_query($con, $sql2);
    while($row2=mysqli_fetch_array($res2))
    {
        echo $row2['responsibilities']."<br><br>";
    }

?>
</td>
</tr>
</table>
<div class="row">
    
    <div class="col-sm-2">

        <a class="btn btn-default btn-block" href="profile.php" class="button bright">Back</a>

    </div>
</div>




                </div>
            </div>
        </div>














        </div>
        <!-- End of the main content -->
        
        

  <div style="margin-top:20px;" class="lineBlack">
            <div class="container">
                <div class="row downLine">
                    <div class="col-md-12 text-right">
                        <!--input  id="searchPattern" type="search" name="pattern" value="Search the Site" onblur="if(this.value=='') {this.value='Search the Site'; }" onfocus="if(this.value =='Search the Site' ) this.value='';this.style.fontStyle='normal';" style="font-style: normal;"/-->
                        <!--    <input  id="searchPattern" type="search" placeholder="Search the Site"/><i class="glyphicon glyphicon-search" style="font-size: 13px; color:#a5a5a5;" id="iS"></h4>
</div>-->
                        <div class="col-md-6 text-left copy">
                            <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
                        </div>
                        <div class="col-md-6 text-right dm">
                            <ul id="downMenu">
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


