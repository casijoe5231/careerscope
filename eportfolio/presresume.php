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

    $emaill=$_SESSION['user'][0];
    
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s"); 
    $sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Academic Brand Resume','$timesql')";
    $res=mysqli_query($con, $sql)or die("query not executed");
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Favicon -->
        <link href="../images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | Dynamic Resume </title>
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

        <script language="Javascript">
function ts_categories(){
    if(document.getElementById("ts").checked==true)
    document.getElementById("ts_categories").style.display = 'block';
    else
    document.getElementById("ts_categories").style.display = 'none';
    return true;
}

function oth_skills_categories(){
    if(document.getElementById("oth_skills").checked==true)
    document.getElementById("oth_skills_categories").style.display = 'block';
    else
    document.getElementById("oth_skills_categories").style.display = 'none';
    return true;
}

function get_resume()
{
    var stud_id = document.getElementById("stud_id").value;
    url = "http://localhost/eportfolio/"+stud_id+".pdf";
    window.open(url);
}
</script>


        
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
        <div style="padding-bottom:60px;" class="container">

        <div style="padding:10px;" class="panel panel-default">
            <div class="row">
                <div class="col-sm-2">
                    <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
                </div>
                <div class="col-sm-10">
                    <div class="col-sm-8"></div>

                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../newindex.php"><span class="glyphicon glyphicon-home"></span> </a></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../logout.php">Logout</a></div>
                
                </div>
            </div>
        </div>
        <h1>Dynamic Resume</h1>
        
        <div class="row">
            <div class="col-sm-2">
                <div style="margin-top:20px;" class="list-group">
                    <a href="profile.php" class="list-group-item ">Job Profiling</a>
                    <a href="../riasec/index.php" class="list-group-item ">Holland Test</a>
                    <a href="#" class="list-group-item">Interview</a>
                    <a href="goal.php" class="list-group-item">Job Aptitude</a>
                    <a href="presresume.php" class="list-group-item active">Resume</a>
                    <a href="#" class="list-group-item">Biographical Sketch</a>
                  </div>
            </div>
            <div class="col-sm-10">
                <!--content goes here-->
                <div class="row">
                <div class="col-sm-offset-4 col-sm-4">
                <h4 style="padding-top:20px;">Choose fields that you want to display</h4>
                   <form method="post" action="sresume1.php">
        <!--<input type="button" value="View Previous Resume" onclick="get_resume()" ></input>-->
        <input type="hidden" id="stud_id" value="<?php echo $_SESSION['user'][0]; ?>"></input>
            <ul style="list-style-type:none;">
                <li><input type="checkbox" name="co" /> Career Objectives</li>
                <li><input type="checkbox" name="ts" id="ts" onclick="return ts_categories()"/> Technical Skills
                    <ul style="list-style-type:none; display:none;" id="ts_categories">
                        <li><input type="checkbox" name="ts_os" />  Operating Systems</li>
                        <li><input type="checkbox" name="ts_pl" /> Programming Languages</li>
                        <li><input type="checkbox" name="ts_sl" />  Scripting Languages</li>
                        <li><input type="checkbox" name="ts_oth" />  Career skills</li>
                    </ul>
                </li>
                <li><input type="checkbox" name="oth_skills" id="oth_skills" onclick="return oth_skills_categories()"/> Other Skills
                    <ul style="list-style-type:none; display:none;" id="oth_skills_categories">
                        <li><input type="checkbox" name="skill1" /> Skill 1</li>
                        <li><input type="checkbox" name="skill2" /> Skill 2</li>
                    </ul>
                </li>
                <li><input type="checkbox" name="ed" /> Education Details</li>
                <li><input type="checkbox" name="we" /> Internship</li>
                <li><input type="checkbox" name="pd" /> Personal Details</li>
                <li><input type="checkbox" name="ho" /> Hobbies</li>
                <li><input type="checkbox" name="lk" /> Languages Known</li>
                <li><input type="checkbox" name="ref" /> References</li>
            </ul><center><input class="btn btn-default" type="submit" value="Submit"/></center>
        </form></div>
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
                        <!--    <input  id="searchPattern" type="search" placeholder="Search the Site"/><i class="glyphicon glyphicon-search" style="font-size: 13px; color:#a5a5a5;" id="iS"></i>
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


