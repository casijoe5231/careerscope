<?php
include 'includes/connection1.php';
    session_start();

    echo $_SESSION['user'][0];
    if ($_SESSION['usertype']==1 || $_SESSION['usertype']==2 ) {
        header("location:login.php");
    }

    $emails=$_SESSION['user'][0];
        $sql2="select * from istaff where email='$emails'";
        $res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
        while($row2=mysqli_fetch_array($res2))
        {
        $dept=$row2['department'];
        $_SESSION['dept']=$dept;
        }
        
        $sql3="select * from masteruser where email='$emails'";
        $res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
        while($row3=mysqli_fetch_array($res3))
        {
        $discipline=$row3['discipline'];
        $sql4="select * from discipline_master where name='$discipline'";
        $res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);
        while($row4=mysqli_fetch_array($res4))
        {
            $d_id=$row4['d_id'];
            $_SESSION['d_id']=$d_id;
        }
        }
    
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s"); 
    $sql="insert into activity(email,menu_accessed,timesql) values('$emails','Lecturer/Testmgr Add Area of Expertise','$timesql')";
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
<script  type="text/javascript" src="validator4.js" ></script>
<script type="text/javascript">
<!--
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
//-->
function go()
{
document.getElementById("div1").style.display = 'block';
}
</script>
<script>
$(document).ready(function()
{
$("#branch").click(function()
{
var staff = $(this).val();//get select value
$.ajax(
{
url:"display_staff.php",
type:"post",
data:{staff:$(this).val()},
success:function(response)
{
$("#sname").html(response);
}
});
});

</script>
<script>

$(document).ready(function()
{
$('#loginbutton').click(function(){
$('#loginarea').slideToggle();
})
})
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
                        

                    </ul>
                </div>
            </div>
        </div>
    </div> 
</div>
   
<!--  Welcome Bar  -->
       
 

<!--  /Welcome Bar  -->


<div style="margin-top:100px;" class="container">


<div style="padding:10px;" class="panel panel-default">
            <div class="row">
                <div class="col-sm-2">
                    <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
                </div>
                <div class="col-sm-10">
                    <div class="col-sm-8"></div>

                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="login.php">Home</a></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="logout.php">Logout</a></div>
                
                </div>
            </div>
        </div>






    <?php
 $sql5="select * from areaofexpertise where email='$emails'";
  $res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
  while($row5=mysqli_fetch_array($res5))
{
if($row5['status']==3)
{
?>
        <fieldset>
        <legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>DETAILS</b></legend>
        <table border="0"  style="margin-top:20px;margin-bottom:20px;">
        <?php
         $sql1="select * from masteruser where email='$emails'";
  $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
  while($row1=mysqli_fetch_array($res1))
{
        ?>
        <tr colspan="2">
        <td><b>Name:</b></td>
        <td><?php echo $row1['name']; ?></td>
        <td><b>Email:</b></td>
        <td><?php echo $row1['email']; ?></td>
        </tr>
        
        <tr colspan="2">
        <td><b>Institute:</b></td>
        <td><?php echo $row1['institute']; ?></td>
        <td><b>Branch:</b></td>
        <td><?php echo $row1['branch']; ?></td>
        </tr>
        <?php
        }
        ?>
        
        <?php
         $sql2="select * from areaofexpertise where email='$emails'";
  $res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
  while($row2=mysqli_fetch_array($res2))
{
        ?>
        <tr colspan="2">
        <td><b>Area of expertise:</b></td>
        <td style="color:red;"><?php echo $row2['expertise']; ?></td>
        <td><b>Authorised Tests:</b></td>
        <td style="color:red;">
        <?php
        /*if($row2['status']==3 || $row2['status']==0)
        {
         echo "Not Approved";
        }
        if($row2['status']==1)
        {
         echo "Approved";
        }
        if($row2['status']==2)
        {
         echo "Rejected";
        }*/
                 $sql7="select * from approve_expertise where email='$emails' and status=1";
  $res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
  $num=mysqli_num_rows($res7);
  if($num!=0)
  {
  while($row7=mysqli_fetch_array($res7))
{
    echo $row7['expertise']."<br>";
}
}
else
{
    echo "None";
}
        ?>
        </td>
        </tr>
        <?php
        }
        ?>
        </table>
        </fieldset>
<br><br>
        <fieldset>
        <legend><b>AREA OF EXPERTISE<b></legend>
        <form name="trial" onsubmit="return validateAll()" method="GET">
        <table border="0"  style="margin-top:20px;margin-bottom:20px;">
        <tr>
        <td><label><span style='color:red;'>*</span><strong>Years of experience:</strong></label></td>
                <td><select name="experience" id="input-experience" temp="Please select experience" onblur="validator(this)">
                <option value="Select">Select</option>
                <option value="0-1yr">0-1yr</option>
                <option value="1-2yrs">1-2yrs</option>
                <option value="2-3yrs">2-3yrs</option>
                <option value="3-4yrs">3-4yrs</option>
                <option value="4-5yrs">4-5yrs</option>
                <option value="5-10yrs">5-10yrs</option>
                <option value="10-20yrs">10-20yrs</option>
                <option value=">20yrs">>20yrs</option>
                </select><br>
                <label ><span id="experience" style="color:#C00;"></span></label>
                </td>
        <td><label><span style='color:red;'>*</span><strong>No. of projects guided:</strong></label></td>
                <td><select name="project" id="input-project" temp="Please select no. of projects guided" onblur="validator1(this)">
                <option value="Select">Select</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                </select><br>
                <label ><span id="project" style="color:#C00;"></span></label>
                </td>
        </tr>
        <tr>
        <td><label><span style='color:red;'>*</span><strong>No. of papers published:</strong></label></td>
                <td><select name="paper" id="input-paper" temp="Please select no. of papers published" onblur="validator2(this)">
                <option value="Select">Select</option>
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                </select><br>
                <label ><span id="paper" style="color:#C00;"></span></label>
                </td>
        <td><span style='color:red;'>*</span><strong>Examiner for subject:</strong> </td>
                <td>
                <input type="radio" name="examiner" id="Yes" value="Yes">Yes
                <input type="radio" name="examiner" id="No" value="No">No<br>
                <label><span id="examiner" style="color:#C00;"></span></label><br>
                </td>
        </tr>
        <tr>
        <td><label><span style='color:red;'>*</span><strong>Choose area of expertise:</strong></label></td>
                <td><select name="expertise[]" id="input-expertise" multiple="multiple" temp="Please select area of expertise." onblur="validator3(this)">
                <option value="Select">Select</option>
                <?php
  $sql="select * from expertise_master where dm_id='$_SESSION[d_id]'";
  $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
  while($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
<?php
}
?>
                </select><br><b><i>Please press ctrl button to<br> select more than 1 choices.</i></b><br>
                <label ><span id="expertise[]" style="color:#C00;"></span></label>
                </td>
        </tr>
        </table>
        <?php
        $sql3="select * from masteruser where role='Staff' and email='$emails'";
        $res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
        while($row3=mysqli_fetch_array($res3))
        {
        ?>
        <input type="hidden" name="email1" value="<?php echo $row3['email']; ?>">
        <input type='submit' name='submit' id='submit' value='Save' style='cursor:pointer;'>
        <input type='submit' name='submit1' id='submit' value='Discard' style='cursor:pointer;'>
        </form>
        <?php
        }
        ?>

        </fieldset>

<?php
}
elseif($row5['status']==1 || $row5['status']==2)
{
?>
<fieldset>
        <legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>DETAILS</b></legend>
        <table border="0"  style="margin-top:20px;margin-bottom:20px;">
        <?php
         $sql1="select * from masteruser where email='$emails'";
  $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
  while($row1=mysqli_fetch_array($res1))
{
        ?>
        <tr colspan="2">
        <td><b>Name:</b></td>
        <td><?php echo $row1['name']; ?></td>
        <td><b>Email:</b></td>
        <td><?php echo $row1['email']; ?></td>
        </tr>
        
        <tr colspan="2">
        <td><b>Institute:</b></td>
        <td><?php echo $row1['institute']; ?></td>
        <td><b>Branch:</b></td>
        <td><?php echo $row1['branch']; ?></td>
        </tr>
        <?php
        }
        ?>
        
        <?php
         $sql2="select * from areaofexpertise where email='$emails'";
  $res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
  while($row2=mysqli_fetch_array($res2))
{
        ?>
        <tr colspan="2">
        <td><b>Area of expertise:</b></td>
        <td style="color:red;"><?php echo $row2['expertise']; ?></td>
        <td><b>Authorised Tests:</b></td>
        <td style="color:red;">
        <?php
                                 $sql7="select * from approve_expertise where email='$emails' and status=1";
  $res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
  $num=mysqli_num_rows($res7);
  if($num!=0)
  {
  while($row7=mysqli_fetch_array($res7))
{
    echo $row7['expertise']."<br>";
}
}
else
{
    echo "None";
}
        ?>
        </td>
        </tr>
        <?php
        }
        ?>
        </table>
        </fieldset>
<br><br>
<input type="button" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px; width:auto; height:50px;margin-left:2px;" id="loginbutton" value="Change Expertise"  ><br><br>
<div id="loginarea" style="display:none;">
        <fieldset>
        <legend><b>AREA OF EXPERTISE<b></legend>
        <form name="trial2" onsubmit="return validateAll2()" method="GET">
        <table border="0"  style="margin-top:20px;margin-bottom:20px;">
        
        <tr>
        <td><label><span style='color:red;'>*</span><strong>Choose area of expertise:</strong></label></td>
                <td><select name="expertise[]" id="input-expertise" multiple="multiple" temp="Please select area of expertise." onblur="validator3(this)">
                <option value="Select">Select</option>
                <?php
  $sql21="select * from expertise_master where dm_id='$_SESSION[d_id]'";
  $res21=mysqli_query($GLOBALS["___mysqli_ston"], $sql21);
  while($row21=mysqli_fetch_array($res21))
{
?>
<option value="<?php echo $row21['name'] ?>"><?php echo $row21['name'] ?></option>
<?php
}
?>
                </select><br><b><i>Please press ctrl button to<br> select more than 1 choices.</i></b><br>
                <label ><span id="expertise[]" style="color:#C00;"></span></label>
                </td>
        </tr>
        </table>
        <?php
        $sql41="select * from masteruser where role='Staff' and email='$emails'";
        $res41=mysqli_query($GLOBALS["___mysqli_ston"], $sql41);
        while($row41=mysqli_fetch_array($res41))
        {
        ?>
        <input type="hidden" name="email3" value="<?php echo $row41['email']; ?>">
        <input type='submit' name='submit4' id='submit' value='Change' style='cursor:pointer;'>
        </form>
        <?php
        }
        ?>

        </fieldset>
        </div>
<?php
}
else
{
?>
<fieldset>
        <legend><img src="images/im-user_profile.png" width="25" alt="profile" /><b>DETAILS</b></legend>
        <table border="0"  style="margin-top:20px;margin-bottom:20px;">
        <?php
         $sql1="select * from masteruser where email='$emails'";
  $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
  while($row1=mysqli_fetch_array($res1))
{
        ?>
        <tr colspan="2">
        <td><b>Name:</b></td>
        <td><?php echo $row1['name']; ?></td>
        <td><b>Email:</b></td>
        <td><?php echo $row1['email']; ?></td>
        </tr>
        
        <tr colspan="2">
        <td><b>Institute:</b></td>
        <td><?php echo $row1['institute']; ?></td>
        <td><b>Branch:</b></td>
        <td><?php echo $row1['branch']; ?></td>
        </tr>
        <?php
        }
        ?>
        
        <?php
         $sql2="select * from areaofexpertise where email='$emails'";
  $res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
  while($row2=mysqli_fetch_array($res2))
{
        ?>
        <tr colspan="2">
        <td><b>Area of expertise:</b></td>
        <td style="color:red;"><?php echo $row2['expertise']; ?></td>
        <td><b>Authorised Tests:</b></td>
        <td style="color:red;">
        <?php
                         $sql7="select * from approve_expertise where email='$emails' and status=1";
  $res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
  $num=mysqli_num_rows($res7);
  if($num!=0)
  {
  while($row7=mysqli_fetch_array($res7))
{
    echo $row7['expertise']."<br>";
}
}
else
{
    echo "None";
}
        ?>
        </td>
        </tr>
        <?php
        }
        ?>
        </table>
        </fieldset>
<?php
}
}
?>
        <br><br>
<?php
if(isset($_GET['submit']))
{
include 'connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";

$email=$_GET['email1'];
$experience=$_GET['experience'];
$project=$_GET['project'];
$paper=$_GET['paper'];
$examiner=$_GET['examiner'];
$expertise = implode(",",$_GET['expertise']);

$sql="update areaofexpertise set expertise='$expertise', experience='$experience', project='$project', paper='$paper', examiner='$examiner', status=0 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="update masteruser set estatus=1 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Area of expertise saved successfully!!', function (e) {
    window.location.href='expertise2.php';
});</SCRIPT>";
}

if(isset($_GET['submit1']))
{
include 'connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Area of expertise discarded!!', function (e) {
    window.location.href='expertise2.php';
});</SCRIPT>";
}

if(isset($_GET['submit3']))
{
include 'connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";

$email=$_GET['email2'];
$expertise = implode(",",$_GET['expertise']);

$sql="update areaofexpertise set expertise='$expertise', status=0 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="delete from approve_expertise where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Area of expertise changed!!', function (e) {
    window.location.href='expertise2.php';
});</SCRIPT>";
}

if(isset($_GET['submit4']))
{
include 'connection1.php';
echo "<html><head><script src='js/alertify.min.js'></script>
<link rel='stylesheet' href='css/alertify.core.css' />
<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";

$email=$_GET['email3'];
$expertise = implode(",",$_GET['expertise']);

$sql="update areaofexpertise set expertise='$expertise', status=0 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="delete from approve_expertise where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('Area of expertise changed!!', function (e) {
    window.location.href='expertise2.php';
});</SCRIPT>";
}
?>



</div>






        
<!--  Footer  -->
<div  class="lineBlack">
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