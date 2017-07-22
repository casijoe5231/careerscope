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
    $email=$_SESSION['user'][0];
    $uname=$_SESSION['user'][1];
    
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s"); 
    
    // Tracking the user
    $sql="insert into activity(email,menu_accessed,timesql) values('$email','Academic Brand Job Profiling Test','$timesql')";
    $res=mysqli_query($con, $sql)or die("query not executed");
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
        <script language="Javascript">  
        function validateForm(){
        if(document.getElementById('category').value=='')
        {
        alert("Please select an Item.");
        return false;
        }
        return true;
        }

        function go()
        {
        document.getElementById("div1").style.display = 'block';
        }

        function goto()
        {
        var skill=document.getElementById("skill").value;
        window.location="retaketest.php?skill="+skill;
        }
        </script>
            
        <script type="text/javascript">
        function get_job()
            {
                var goal_id = document.getElementById('goal').value;
                            if (window.XMLHttpRequest)
                              {// code for IE7+, Firefox, Chrome, Opera, Safari
                              xmlhttp=new XMLHttpRequest();
                              }
                            else
                              {// code for IE6, IE5
                              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                              }
                            xmlhttp.onreadystatechange=function()
                              {
                              if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                {
                                document.getElementById('job').innerHTML=xmlhttp.responseText;
                                }
                              }
                            xmlhttp.open("GET","display_job.php?goal_id="+goal_id,true);
                            xmlhttp.send();
            }
            
            function get_skill()
            {
                var job_id = document.getElementById('job').value;
                            if (window.XMLHttpRequest)
                              {// code for IE7+, Firefox, Chrome, Opera, Safari
                              xmlhttp=new XMLHttpRequest();
                              }
                            else
                              {// code for IE6, IE5
                              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                              }
                            xmlhttp.onreadystatechange=function()
                              {
                              if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                {
                                document.getElementById('skill').innerHTML=xmlhttp.responseText;
                                }
                              }
                            xmlhttp.open("GET","display_skillss.php?job_id="+job_id,true);
                            xmlhttp.send();
            }
            
            function get_mentor()
            {
                var skill_id = document.getElementById('skill').value;
                            if (window.XMLHttpRequest)
                              {// code for IE7+, Firefox, Chrome, Opera, Safari
                              xmlhttp=new XMLHttpRequest();
                              }
                            else
                              {// code for IE6, IE5
                              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                              }
                            xmlhttp.onreadystatechange=function()
                              {
                              if (xmlhttp.readyState==4 && xmlhttp.status==200)
                                {
                                document.getElementById('mentor[]').innerHTML=xmlhttp.responseText;
                                }
                              }
                            xmlhttp.open("GET","display_mentorss.php?skill_id="+skill_id,true);
                            xmlhttp.send();
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
        <div class="container">

        <div style="padding:10px;" class="panel panel-default">
            <div class="row">
                <div class="col-sm-2">
                    <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
                </div>
                <div class="col-sm-10">
                    <div class="col-sm-8"></div>

                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../login.php"><span class="glyphicon glyphicon-home"></span> </a></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../logout.php">Logout</a></div>
                
                </div>
            </div>
        </div>
        <h1>Job Aptitude</h1>
        
        <div class="row">
            <div class="col-sm-2">
                <div style="margin-top:20px;" class="list-group">
                    <a href="profile.php" class="list-group-item ">Job Profiling</a>
                    <a href="../riasec/index.php" class="list-group-item ">Holland Test</a>
                    <a href="#" class="list-group-item">Interview</a>
                    <a href="goal.php" class="list-group-item active">Job Aptitude</a>
                    <a href="presresume.php" class="list-group-item">Resume</a>
                    <a href="#" class="list-group-item">Biographical Sketch</a>
                  </div>
            </div>
            <div class="col-sm-10">
            
                <!--content goes here-->
                <div class="row">
                	   
                       <form class="form-horizontal"  action="techtest.php" method="get">
                           <div class="form-group clearfix">
                               <label for="goal" class="col-sm-offset-3 col-sm-2">Job Profile</label>
                               <div class="col-sm-4">
                                   <select class="form-control" name="goal" id="goal" temp="Please select the goal" onchange="get_job();" onblur="validator(this)">
                <option value="Select">Select</option>
                
<?php
  $sql="select * from goal_master";
  $res=mysqli_query($con, $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['g_id'] ?>"><?php echo $row['goal_desc'] ?></option>
<?php
}
?>
</select><span id="goal" style="color:#C00;"></span>
                               </div>
                           </div>
                           <div class="form-group clearfix">
                               <label for="job" class="col-sm-offset-3 col-sm-2">Job</label>
                               <div class="col-sm-4">
                                   <select class="form-control" name="job" id="job" temp="Please select the job" onchange="get_skill();" onblur="validator1(this)">
                <option value="Select">Select</option>
                </select><span id="job" style="color:#C00;"></span>
                               </div>
                           </div>
                           <div class="form-group clearfix">
                               <label for="skill" class="col-sm-offset-3 col-sm-2">Skill</label>
                               <div class="col-sm-4">
                                   <select class="form-control" name="skill" id="skill" temp="Please select the skill" onclick="go()" onchange="get_mentor();" onblur="validator2(this)">
                <option value="Select">Select</option>
                </select>
<span id="skill" style="color:#C00;"></span>
                               </div>
                           </div>
                           <div class="form-group clearfix">
                           <div id="div1" name="div1" style="display:none;">
                               <div class="col-sm-offset-3 col-sm-6">
                                   <input class="btn btn-default" type="submit" id="submit" name="submit" value="New Test">
</form>
<input class="btn btn-primary" type="button" onclick="goto()" value="Retake Test">
</div>
                               </div>
                           </div>
                       </form>




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


