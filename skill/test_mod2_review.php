<?php
    session_start();
    if(!isset($_SESSION['user']))
    {
        header('location:../login.php');
        exit();
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
            
            <br>
<div class="title">

<h3 class="text-center"> Qualitative Feedback </h3>
<h4>Welcome 
<?php 
echo $_SESSION['user'][1];
?>,
</h4>
</div>
<?php 
//if(isset($_POST["submit_feed"]))
  //  {
        //Calculate using formula       
        
        
        //Save Result for user
        include '../includes/connection1.php';
        $email=$_SESSION['user'][0];
        $requestor=$_GET['users'];
        $data_array=array();
        for ($i=1; $i < 52 ; $i++) { 
            $_POST['option'.$i]=6-$_POST['option'.$i];
        }
        foreach ($_POST as $key => $value) 
        {   
           array_push($data_array,$value);
        }
        array_pop($data_array); // Remove last value from array, since last value is SAVE
        $ser_array = serialize($data_array);  // Serialize array to be stored as single value in database
        
        $query="SELECT reviewer,val FROM mod2_requests WHERE reviewer='$email' AND requestor='$requestor'";
        $result=mysqli_query($GLOBALS["___mysqli_ston"], $query);
        while($row = mysqli_fetch_array($result))
        {
            if($row['val']<>null)
            {
                echo "<div class='alert alert-warning'>You seem to have already provided a review for this user</div>"; 
            }
            else
            {
                $sql="UPDATE `mod2_requests` SET `val`='$ser_array' WHERE reviewer='$email' AND requestor='$requestor'";                
                $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
                if($res)
                {
                    echo "<div class='alert alert-success'>Your Observer assessment was saved successfully. Thank you for your feedback.</div>";      
                }
                else
                {
                    echo"<div class='alert alert-danger'>An error occured.<br>Your review might not have been saved.<br>The review request may have been deleted by the user.</div>";
         
                }
            }
        }
    //}
    

    
    
?>


<div class="box">
<br>
<?php
// For Qualitative Feedback
if(isset($_POST['Qualitative']))
{
include '../includes/connection1.php';
 if($_POST['review']<>"")
 {   
     $requestor=$_GET['users'];
     $email=$_SESSION['user'][0];
     $sql="SELECT * FROM mod2_qualitative WHERE reviewer='$email' AND requestor='$requestor'";
     $result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
     $reviews= mysqli_num_rows($result);
     if($reviews<=4)
     {

         $review= mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['review']);
         $sql="INSERT INTO `mod2_qualitative`(`reviewer`, `requestor`, `question`, `review`) VALUES ('$email','$requestor','$_POST[question]','$review')";
         $result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
         if($result)
         {
            echo "<div class='alert alert-success'>Review saved successfully &nbsp; Reviews submitted:".($reviews+1)."</div>";
         }
         else
         {
           echo "<div class='alert alert-danger'>Review could not be saved !</div>";
         } 
    }
    else
        echo "<div class='alert alert-warning'>You cannot submit more than 5 reviews</div>";
 }
 else
    echo "Please provide a review<br>";
}
?>
<div class="row">
    <div class="col-sm-offset-1 col-sm-10">
        <div class="panel panel-default">
            <div class="panel-heading">
                Please provide a short feedback for
                <?php
                $user=$_GET['users'];
                include '../includes/connection1.php';
                   $username=$_SESSION['user'][1];
                         $sql="   SELECT name FROM masteruser WHERE email = '$user'";       
                         $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
                         while($row = mysqli_fetch_array($res))
                         {
                         echo "<b>".$row['name']."</b>";
                         }
                    
                    $user=$_GET['users'];?>
            </div>
            <div class="panel-body">
                    <div class="row">
                            
                            <div class="col-sm-offset-2 col-sm-8">
                                <?php
                            echo "<form role='form' class='form-horizontal' action='test_mod2_review.php?users=".$user."' method='POST'>";
                            ?>
                                <div class="form-group">
                                    
                                
                                <select class="form-control" name="question">
                                    <option value="general_review">General Review</option>
                                    <option value="written_communication">Written Communication</option>
                                    <option value="verbal_communication">Verbal Communication</option>
                                    <option value="flexibility">Fexibility</option>
                                    <option value="persuading">Persuading</option>
                                    <option value="leadership">Leadership</option>
                                    <option value="planning&organising">Planning and Organising</option>
                                    <option value="problem_solving">Investigating, Analysing and Problem Solving</option>
                                    <option value="professionalism">Developing Professionalism</option>
                                </select>
                                </div>
                                <div class="form-group">
                                    
                                
                                    <textarea class="form-control" rows="10" name="review" placeholder="Provide a review here"></textarea>
                                    </div>
                                
                                <div class="form-group">
                                    
                                    <button class="btn btn-primary" type="submit" name="Qualitative">Submit</button>
                                    
                                </div>
                            </form>
                            </div>
                    </div>
                    
            </div>
            <div class="panel-footer">
                <h6>Note: You can provide a maximum of upto 5 reviews.</h6>
            </div>
        </div>
    </div>
</div>
<br>
<p>
You can continue providing feedback for other users.</p>
<div class="row">
    
    <div class="col-sm-2">

        <a class="btn btn-default btn-block" href="test_mod2.php" class="button bright">Back</a>

    </div>
    <div class="col-sm-2">

        <a class="btn btn-default btn-block" href="logout.php" class="button bright">Logout</a>

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


