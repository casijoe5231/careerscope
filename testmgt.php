 <?php
    session_start();
    if(isset($_SESSION['testmgr']))
    {
    

    include 'styles/theme-master.php';
    $email=$_SESSION['testmgr'][0];
    include 'connection1.php';
        $sql1="SELECT * FROM masteruser WHERE email='$email'";
        $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
        while($row1 = mysqli_fetch_array($res1))
        {
            $discipline=$row1['discipline'];
            $branch=$row1['branch'];
        }
    
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s"); 
    $sql="insert into activity(email,menu_accessed,timesql) values('$email','Add New Test','$timesql')";
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
<!-- Favicon -->
    <link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>BYB | HOD Menu </title>
      
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
         <link rel="stylesheet" href="plugins/jqueryui/jquery-ui.css" />
  <script src="plugins/jqueryui/jquery-1.9.1.js"></script>
  <script src="plugins/jqueryui/jquery-ui.js"></script>
 <link rel="stylesheet" href="plugins/jqueryui/jquery-ui.css" />
  <script src="plugins/jqueryui/jquery-1.9.1.js"></script>
  <script src="plugins/jqueryui/jquery-ui.js"></script>
<script>
  $(function() {
    $( "#accordion" ).accordion();
  });
 </script>
<!-- Jquery UI ends here --> 
<style>
table {
    width: auto;
    text-align:left;
    }
</style>    
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
                        

                    </ul>
                </div>
            </div>
        </div>
    </div> 
</div>
   
<!--  Welcome Bar  -->
        <nav class="navbar-container">
            <ul class="nav nav-pills navbar-left">
                <p class="navbar-brand">Welcome <?php echo $_SESSION['testmgr'][1]; ?>,</p>
            </ul>
            <ul class="nav nav-pills navbar-right" style="margin-top:6px; margin-right:10px;">
               
                
                
                <li style="padding: 0 8px 0 8px;"><a href="logout.php" style="padding: 6px 12px;" class="btn btn-md btn-default">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"> </span> Log Out
                    </a>
                </li>
            </ul>  
        </nav>

<!--  /Welcome Bar  -->


<div class="container">
    <h3>Test Editor
<a href="logout.php" style="border:1px solid #09F; background:#09F; padding:8px; color:#FFF;  border-radius:5px; font-size:16px; float:right; margin-right:5%;">Logout</a>
</h3>
<div class="nav">
<a href="testmgthome.php">Home</a>
 > 
<a href="testmgt.php">Test Editor</a>
</div>
<br><br>

<div class="panel">
<h3>Create a new Test</h3>
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


<?php

    // Show Form to add Test
    echo "<form action='testmgt.php' method='POST'>";
    echo "<table>";
    echo "<tr>";
    echo "<td>";
    echo "<br>1. Choose area of expertise:";
    echo "</td>";
?>  
<td>
    <select name="expertise" id="expertise" temp="Please select the expertise" onblur="validator(this)">
    <option value="Select">Select</option>
              
<?php
  $sql="select expertise from approve_expertise where email='$email'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['expertise']; ?>"><?php echo $row['expertise']; ?></option>
<?php
}
?>
</select>
<br>
<label><span id="expertise" style="color:#C00;"></span></label>
</td></tr>
<tr>
<td>2. Select Test Level:</td>
                <td><select name="level" id="input-level" temp="Please select the level" onblur="validator(this)">
                <option value="Select">Select</option>
                <option value="1">Beginner</option>
                <option value="2">Intermediate</option>
                <option value="3">Expert</option>
                </select><br>
                <span id="level" style="color:#C00;"></span></label>
                </td>
                </tr>
                <tr>
                <td>3. Enter test Description:</td> <td><textarea name='desc' rows='4' cols='50' required></textarea></td>
                </tr>
                <tr>
                <td>Enable Negative Marking</td><td><input type='checkbox' name='negative' value='1'></td>
                </tr>
                </table>

                <br>
                <input type='submit' value='Create New' name='add_test'>
                </form>
<?php
if(isset($_POST['add_test']))
{
    $time=15;
    $level=$_POST['level'];
    if(isset($_POST['expertise']))
    $expertise=$_POST['expertise'];
    else
        $expertise="Normal";
    $desc=$_POST['desc'];
    if(isset($_POST['negative']))   // Negative marking
        $neg=$_POST['negative'];
    else
        $neg=0;
        
    // Create new test
    // Get current value of id
    $sql="SELECT MAX(tm_id) FROM `techtest_master` ";
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    while($row = mysqli_fetch_array($res))
    {
            $id=$row['MAX(tm_id)'];      
    }
    $id++;

    $sql="INSERT INTO `techtest_master`(`tm_id`,`testname`,`level`,`test_time`,`test_desc`,`negative`,`branch`,`discipline`) VALUES ('$id','$expertise','$level','$time','$desc','$neg','$branch','$discipline')";
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    if($res)
    {
      echo "<br><b>Test added successfully. Your test id is ".$id."</b>";
      echo "<br>You can add questions to test <a href='enter_questions.php?id=".$id."&level=".$level."'>here</a>";
    }
    else
    {
     echo "Test could not be added.";
    }

}
?>
</form>
<br><br>
</div>
<br>


<div class="panel">
<br><b>Available Tests:</b>
<br>
<br>
<?php
 // Show all available tests
    $sql="select * from techtest_master";                                                   // Select Domain
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
    while($row = mysqli_fetch_array($res))
                        {
                            echo "<div class='test_box'>";
                            echo "<img src='images/test.png' width='35px' style=\"float:left; margin-right:5px;\">";
                            echo $row['testname'];
                            if($row['level']==1)
                            {
                                echo "(Beginner)";
                            }
                            if($row['level']==2)
                            {
                                echo "(Intermediate)";
                            }
                            if($row['level']==3)
                            {
                                echo "(Expert)";
                            }
                            echo "<br>Time: ".$row['test_time']." mins</br><br>";
                            echo "</div>";
                        }
?>
<br><br>
</div>

<br><br><br>
</div>

</div>
</div>

</body>
</html>
<?php
}
?>