<?php
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('location:../login.php');
        exit();
    }
    include '../includes/connection1.php';

    $emaill=$_SESSION['user'][0];
    $con=mysqli_connect("localhost","root","","careerscope");
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s"); 
    $sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Observer Assessment','$timesql')";
    $res=mysqli_query($con, $sql)or die("query not executed");
    echo $_SESSION['usertype'];
    
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Favicon -->
        <link href="../images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | Observer Assessment </title>
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
        <script language="JavaScript">
           setInterval("updateContent();", <?php include 'settings.php'; echo $ajax_delay; ?> );
           function updateContent()
            {
                 $('#refreshData').empty();
                 $('#refreshData').load("ajax_data.php").fadeIn("slow");
            }
        </script>

        
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
                                        <img src="../images/byblogo.png" width="120" height="120">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-10">
                                	<div class="navmenu"style="text-align: center;">
						                <ul id="menu">
                                            <li><a href="newindex.php">Home</a></li>
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
        
        <br>
<div class="title">
<h3>&nbsp;Welcome 
<?php 
echo $_SESSION['user'][1];
?>
<?php
if(isset($_POST['type']))
{ 
 //Set dropdown to previously selected value
 $type=$_POST['type'];
}
else if(!isset($type))
{
 $type="default";
}
?>
</h3>
</div>

<br>
<br>
<div align="center">
<br>
<b>Observer Assessment</b><br>

This test analyzes your skillset based on a feedback provided by your friends/ colleagues.<br><br>

<?php
if($_SESSION['usertype']==1 || $_SESSION['usertype']==2){
?>

<div class="row">
<div class="col-sm-6 animateFadeInUp">
 <div class="panel panel-default">
 <div class="panel-heading">
     Please nominate participants to request a feedback for you.
 </div>

<div class="panel-body">
<div class="row">
    <div class="col-sm-offset-2 col-sm-8">
        
    
    <?php

    function showList($type)
        { 
            $con=mysqli_connect("localhost","root","","careerscope");

          $email=$_SESSION['user'][0];
          $sql="SELECT name,email FROM masteruser WHERE role='$type' AND email<>'$email'";
          $res=mysqli_query($con , $sql);
          if(mysqli_num_rows($res)!=0)
          {

                echo "<div class='form-group'>";
                echo "<select  class='form-control' name='request_user'>";
                    while($row = mysqli_fetch_array($res))
                    {
                        $name=$row['name'];
                        $user_email=$row['email'];
                        echo "<option value='".$user_email."'>".$name."</option>";
                    }
                echo "</select>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<input class='btn btn-primary' type='submit' value='Request' name='request_feed'>";
                echo "</div>";
          }
          else
            echo "Sorry no one seems to have registered under this category";
        }
//Send new Request for a participant
        echo "<form style='margin-top:20px;' role='form' class=\"form-horizontal \" name='request_new_user' method='POST' action='test_mod2.php' onsubmit=\"return validateForm()\" >";
        include '../includes/connection1.php';
        
        echo "<div class='form-group'>";
        
        echo "<select class='form-control' name='type' onchange='this.form.submit()'>";
        echo "<option value='select' ";
        if($type=="select") echo "selected";
        echo ">Select Type</option>";
        
        echo "<option value='student' ";
        if($type=="student") echo "selected";
        echo ">Student</option>";
        
        echo "<option value='staff' ";
        if($type=="staff") echo "selected";
        echo ">Staff</option>";
        
        echo "<option value='alumni' ";
        if($type=="alumni") echo "selected";
        echo ">Alumni</option>";        
 
        echo "</select>";       
        echo "</div>";
        
        if(isset($_POST['type']))
        { 
        showList($_POST['type']);
        }
        echo "</form>";
        
        
?>
</div>
</div>
</div>

</div>
</div>

<div class="col-sm-6 animateFadeInUp">
 <div class="panel panel-default">
 <div class="panel-heading">
    People to whom you have sent requests
 </div>

<div class="panel-body">
<div class="row">

<?php
// Add request from POST to database
include '../includes/connection1.php';
$email=$_SESSION['user'][0];

if(isset($_POST['request_feed']))
{
        
        $email=$_SESSION['user'][0];
        $sql="SELECT `reviewer`, `requestor` FROM `mod2_requests` WHERE reviewer='$_POST[request_user]' AND requestor='$email'";        
        $res=mysqli_query($con, $sql);
        if(mysqli_num_rows($res)!=0)
        {
         echo'Error: Request was added previously<br>';     
        }
        else
        {
            $sql="INSERT INTO `mod2_requests`(`reviewer`, `requestor`) VALUES ('$_POST[request_user]','$email')";       
            $res=mysqli_query($con, $sql);
            if($res)
            {
                echo'Request was added successfully<br>';       
            }
            else
            {
                echo"<h3>Error occured.</h3><br>Requests could not be added";
            }
        }
}
// Show current added requests
    
         
         $email=$_SESSION['user'][0];
         $sql="SELECT reviewer FROM mod2_requests WHERE requestor='$email'";    
         $res=mysqli_query($con, $sql);
         while($row = mysqli_fetch_array($res))
         {
           $sql2="SELECT name,email FROM masteruser WHERE email='$row[reviewer]'";       
           $res2=mysqli_query($con, $sql2);
           while($row2 = mysqli_fetch_array($res2))
           {
            echo "<div class='col-sm-3'><div class='panel panel-default' style='height:80px;padding:10px 0px;'><img class='pull-left' src='images/im-user_profile.png' width='16px'>";
            echo "<h6>";
            echo $row2['name'];
            echo "</h6>";
            echo "<form action='test_mod2.php' method='POST'><input type='hidden' name='del_request' value='".$row2['email']."'><input style='bottom:30px;position:absolute' type='image' src='images/delete2.png' width='16px;'></form>";
            echo "</div></div>";
           }           
         }

         // Delete selected request
         if(isset($_POST['del_request']))
        {
        $email=$_SESSION['user'][0];
        $request=$_POST['del_request'];
        // Delete User request
        $sql="DELETE FROM `mod2_requests` WHERE reviewer='$request' AND requestor='$email'";
        $result=mysqli_query($con, $sql);
        echo "<meta http-equiv='refresh' content='0;url=".$_SERVER['HTTP_REFERER']."'>";
        }
?>
</div>
</div>
</div>

</div>

</div>
<?php
}
?>

<div class="row">

<div class="col-sm-12 animateFadeInUp">
 <div class="panel panel-default">
 <div class="panel-heading">
The following participants have requested you for a feedback of their skills.
 </div>

<div class="panel-body">
<div class="row">
<div class="box">


<div class="rate_user clearfix">
<?php
//AJAX data 
/*if($ajax_enable==1)
{
echo "<div id='refreshData'></div>";
}
else
{*/

$email=$_SESSION['user'][0];

         $sql="SELECT requestor, val FROM mod2_requests WHERE reviewer='$email'";   
         $res=mysqli_query($con, $sql);
         while($row = mysqli_fetch_array($res))
         {       
             if($row['val']<>null) //Feedback submitted
             {  
                echo "<div class='col-sm-2'> ";
                echo "<div class='well profile_display_submitted'>";
                echo "<img src='images/im-user_profile.png' width='60px'>";
                //Get first name, second name of user
                $sub_query="SELECT name FROM masteruser WHERE email = '$row[requestor]'";
                $result=mysqli_query($con, $sub_query);
                while($row = mysqli_fetch_array($result))
                {
                    echo $row['name'];
                }
          
                echo "</div></div>";
                //echo "</a>"; 
             }
         
             else
             {

                echo "<a href='test_mod2_rate.php?users=".$row['requestor']."'>";
                
                echo "<div class='col-sm-2'> ";
                echo "<div style='min-height: 20px;padding: 19px;margin-bottom: 20px;' class='panel panel-default profile_display'>";
                echo "<img src='images/im-user_profile.png' width='60px'>";
                //Get first name, second name of user
                $sub_query="SELECT name FROM masteruser WHERE email = '$row[requestor]'";
                $result=mysqli_query($con, $sub_query);
                while($row = mysqli_fetch_array($result))
                {
                    echo $row['name'];
                }
          
                echo "</div></div> </a>";
             }  
         }  

?>
 
<br><br>
</div>
</div>
</div>    
</div>
</div>

</div>

</div>
<!--
<a href="test_mod2_results.php" target="_blank" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;">Show my Report</a>
-->


<br>
<div class="row">
    
    <div class="col-sm-2">

        <a class="btn btn-default btn-block" href="home.php" class="button bright">Back</a>

    </div>
    <div class="col-sm-2">

        <a class="btn btn-default btn-block" href="logout.php" class="button bright">Logout</a>

    </div>
    <div class="col-sm-offset-4 col-sm-4">
        <a class="btn btn-default btn-block" href='#' data-toggle="modal" data-target="#360-modal" >About 360-Assessment</a>

    </div>
</div>
 
<!-- Modal Section -->

    <div class="modal fade" id="360-modal" tabindex="-1" role="dialog" aria-labelledby="360-modal-title" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="360-modal-title">360 Observer Assessment Test</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                <img class="img-responsive" src="plugins/modal/img/360assessment.gif">
                <p>360-degree feedback is a method of systematically collecting opinions about your performance from your colleagues, friends or teachers. 360-degree feedback is also known as multi-rater feedback, multi source feedback, or a multi source assessment. You can select upto 5 users to provide a feedback for you. This will help us to understand you skills, strengths & your weaknesss.</p>
              </div>              
            </div>
          </div>
        </div>
      </div>
    </div> 


                

<!-- Modal Section ends here --> 
<br>
<br>


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


