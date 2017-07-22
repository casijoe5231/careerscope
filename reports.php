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
    $sql="insert into activity(email,menu_accessed,timesql) values('$emails','Mentor Test Reports','$timesql')";
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<!DOCTYPE html>
<html lang="en" style="height:100%" >
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
        <script>
$(document).ready(function()
{
$('#loginbutton').click(function(){
$('#loginarea').slideToggle();
})
})
</script>

<script type="text/javascript">
    function go()
{
    document.getElementById("div1").style.display = 'block';
}

</script>
        
    </head>
    <body style="height:100%"  >

        <div style="margin-bottom:20px;" id="home">
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
                    <a class="btn btn-default btn-block" href="mentorindex.php"><span class="glyphicon glyphicon-home" > Home</span></a></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="logout.php">Logout</a></div>
                
                </div>
            </div>
        </div>




            <div class="row">
                <h1>
                    Test Reports
                </h1>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            
                            <form class="form-horizontal" action="student_report.php"  method="get">
                                <div class="form-group clearfix">
                                    <label class="control-label col-sm-offset-3 col-sm-2" for="">
                                        Name of the student
                                    </label>
                                    <div class="col-sm-4">
                                    <select class="form-control"  name="studnt" id="studnt" temp="Please select the student" onclick="go()" onblur="validator(this)">
                <option value="Select">Select</option>                
<?php
  $sql="select distinct name, email from approve_mentor where mname='$name' and status=1";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['email'] ?>"><?php echo $row['name'] ?></option>

<?php
}
?>
<option value="All">All</option>
</select>
                <span id="studnt" style="color:#C00;"></span>
                                    </div>
                                </div>
                                <div class="form-group clearfix">
                                    <div class="col-sm-offset-3 col-sm-6">
                                        <div id="div1" name="div1" style="display:none;">
<input class="btn btn-primary pull-right" type="submit" id="submit" name="submit" value="Submit">
</div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End of the main content -->
        
        

  <div style="bottom:0px;position:fixed;" class="lineBlack">
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


