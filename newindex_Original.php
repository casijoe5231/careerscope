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

    include 'includes/connection1.php';

    
	$email=$_SESSION['user'][0];
	$uname=$_SESSION['user'][1];
    
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$email','Student Home Page','$timesql')";
	$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Favicon -->
    <link href="images/favicon.ico" rel="shortcut icon" />

    <title>EYB |</title>

    <!--  CSS  -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css">
    <link rel='stylesheet' id='camera-css' href='css/camera.css' type='text/css' media='all'>
    <link rel="stylesheet" type="text/css" href="css/carousel.css">
    <link rel="stylesheet" type="text/css" href="css/slicknav.css">
    <link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main
stylesheet" charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet' type='text/css'>

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
$(document).ready(function()
{
$('#loginbutton').click(function(){
$('#loginarea').slideToggle();
})
})
</script>

<script language="Javascript">
function get_chat_msg()
{
var receiver_id=document.getElementById("receiverid").value;
    if(typeof XMLHttpRequest != "undefined")
    {
        oxmlHttp = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
       oxmlHttp = new ActiveXObject("Microsoft.XMLHttp");
    }
    if(oxmlHttp == null)
    {
        alert("Browser does not support XML Http Request");
       return;
    }
    
    oxmlHttp.onreadystatechange = get_chat_msg_result;
    oxmlHttp.open("GET","chat_recv_ajax2.php?receiver_id="+receiver_id,true);
    oxmlHttp.send(null);
}

function get_chat_msg_result(t)
{
    if(oxmlHttp.readyState==4 || oxmlHttp.readyState=="complete")
    {
        if (document.getElementById("chatbox1") != null)
        {
            document.getElementById("chatbox1").innerHTML =  oxmlHttp.responseText;
            oxmlHttp = null;
        }
        var scrollDiv = document.getElementById("chatbox1");
        scrollDiv.scrollTop = scrollDiv.scrollHeight;
    }
}
</script>
<script type="text/javascript">
$(document).ready(function()
{
$(".chatbox").hide();

$(".chat").click(function()
{
var y=$(this).siblings(".chatterid").html();
$(".chatbox").show();
$("#receiverid").val(y);
})

$(".submitmsg").click(function()
{
var value1=$("#receiverid").val();
var value2=$("#inputmsg").val();
document.getElementById('inputmsg').value='';
			$.ajax(
			{
				type:"GET",
				url:"insertmessage2.php",
				data:"data1="+value1+"&data2="+value2,
				success:function(response)
				{
				$('#chatbox1').html(response);
				}
			});

})
var t = setInterval(function(){get_chat_msg()},1000);


$(".logout").click(function()
{
$(".chatbox").hide();
})

})
</script>
<?php
// code to display a pop up when the user had any notifications
$mysqlserver="localhost";
$mysqlusername="root";
$mysqlpassword="oracle";
$dbname = "careerscope";
$conn=new mysqli($mysqlserver, $mysqlusername, $mysqlpassword,$dbname) or die ("Error connecting to mysql server: ".mysqli_error($GLOBALS["___mysqli_ston"]));

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
	echo "Connected successfully";

$email=$_SESSION['user'][0];
/*$query1 = "Select * from Goal_Assigned where email like '$email'";
$result = $conn->query($query1);

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} */

$conn->close();
?>


<!--Script for reminder modal-->
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal69").modal('show');
		
				$("#myModal69").modal('show');
      $("#myModa69").modal('show');

	});
	</script>

<!--Script for reminder modal ends here-->
</head>


<body>
    <!--header-->
    <div class="mast-not-fixed">
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
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/Header-->
    
<!--  Welcome Bar  -->
        <nav class="navbar-container">
            <ul class="nav nav-pills navbar-left">
                <p class="navbar-brand">Welcome <?php echo $_SESSION['user'][1]; ?>,</p>
            </ul>
            <ul class="nav nav-pills navbar-right" style="margin-top:6px; margin-right:10px;">
            <li style="padding: 0 8px 0 8px;"><a id="loginbutton" href="eportfolio/choose.php" style="padding: 6px 12px;" class="btn btn-md btn-default">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"> </span> Choose Your Mentor
                    </a>
                </li>
                <li style="padding: 0 8px 0 8px;"><button id="loginbutton" value="Chat with mentors"   style="padding: 6px 12px;" class="btn btn-md btn-default">
                    <span class="glyphicon glyphicon-comment" aria-hidden="true"> </span> Chat with Mentors
                    </button>
                </li>
                <li style="padding: 0 8px 0 8px;"><a href="logout.php" style="padding: 6px 12px;" class="btn btn-md btn-default">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"> </span> Log Out
                    </a>
                </li>
            </ul>  
        </nav>

<!--  /Welcome Bar  -->
 
<!--////modal *********************************************

<div class="container">
  
  <!-- Trigger the modal with a button -->
 
  <!-- Modal -->
  <div class="modal fade" id="myModal69" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-confirmation">GOALS CREATED</h4>
        </div>
        <div class="modal-body">
          <p class="danger">  <?php

				
								$email=$_SESSION['user'][0];
				$Curr_time = date('Y-m-d');
				 $sql1="select * from goal_list where email='$email' and deadline > '$Curr_time'";
        $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		$count=mysqli_num_rows($res1);
        while($row1=mysqli_fetch_array($res1))
        {
		
        ?>
        
        <br><strong><big><p><?php echo $row1['title'] ?></strong></big></p>
		<?php
        }
        
        ?>
</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Close</button>
		   <button type="button" class="btn btn-success" onclick="location.href='Sdp/sdp_weeklyupdate.php';" data-dismiss="modal">Update Goal Status</button></a>
        
        
      </div>
      
    </div>
  </div>
  



<!--////loop modal********************************* -->




 
 
 

 

<!--  Create Your Brand  -->
<!--  Panels  -->
<center>
    <div class="panel panel-primary" style="width:1000px; margin-left: auto; margin-right: auto; margin-top: 35px;">
        <div class="panel-heading">
            <h2 class="panel-title">Create Your Brand</h2>
        </div>
        <div class="panel-body">
            <!-- Three columns of Tests -->
            <div class="row">
                <div class="col-lg-4">
                    <img class="img-circle" src="images/flaticons/job.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h3>Jobs</h3>
                     
                    <p><a class="btn btn-default" href="eportfolio/profile.php" role="button">Explore &raquo;</a>
                    </p>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="img-circle" src="images/flaticons/generic-skills-brand.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h3>Generic Skills</h3>
                     
                    <p><a class="btn btn-default" href="#" role="button">Explore &raquo;</a>
                    </p>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="img-circle" src="images/flaticons/subjects-brand.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h3>Subjects</h3>
                     
                    <p><a class="btn btn-default" href="subjects/subjindex1.php" role="button">Explore &raquo;</a>
                    </p>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            <!-- Three columns of Tests -->
            <div class="row">
                <div class="col-lg-4">
                    <img class="img-circle" src="images/flaticons/soft-skills-brand.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h3>Soft Skills</h3>
                     
                    <p><a class="btn btn-default" href="softskill/index.php" role="button">Explore &raquo;</a>
                    </p>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="img-circle" src="images/flaticons/gallery.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h3>Gallery</h3>
                     
                    <p><a class="btn btn-default" href="eportfolio/newindex.php" role="button">Explore &raquo;</a>
                    </p>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="img-circle" src="images/flaticons/personality-profiling.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h3>Personality Profiling</h3>
                     
                    <p><a class="btn btn-default" href="skill/index.php" role="button">Explore &raquo;</a>
                    </p>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
            <!-- Three columns of Tests -->
            <div class="row">
                <div class="col-lg-4">
                    <img class="img-circle" src="images/flaticons/self-development-plan.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h3>Self Development Plan</h3>
                     
                    <p><a class="btn btn-default" href="Sdp/sdp.php" target="_blank" role="button">Explore &raquo;</a>
                    </p>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="img-circle" src="images/flaticons/e-portfolio.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h3>E-Portfolio</h3>
                     
                    <p><a class="btn btn-default" href="#" role="button">Explore &raquo;</a>
                    </p>
                </div>
                <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <img class="img-circle" src="images/flaticons/tests.png" alt="Generic placeholder image" style="width: 140px; height: 140px;">
                    <h3>Aptitude Test</h3>
                     
                    <p><a class="btn btn-default" href="aptitude/index.php" role="button">Explore &raquo;</a>
                    </p>
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
    </div>
</center>
<!--  /Panels  -->
   
<!--chat box-->
<div id="loginarea" style="display:none;float:right;">	
	<div id="chat" style="float:right;height:auto;width:250px;border:2px solid #DBDBFF;border-radius:25px;margin-top:7px;margin-bottom:7px;">
<?php
  $sql1="select distinct mname as mname,email from approve_mentor where email='$email' and status=1";
  $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
  while($row1=mysqli_fetch_array($res1))
{	
$sql2="select * from masteruser where name='$row1[mname]'";
$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
while($row2=mysqli_fetch_array($res2))
{	
?>
<table style="color:#336699;">
<tr>
<td><span style="cursor:pointer"><img style="height:35px;width:35px;border-radius:25px;" src="images/mentor1.gif"></span></td>
<td style="font-size:20px;"><span style="cursor:pointer" class="chat"><?php echo $row1['mname'] ?></span><span style="display:none" class="chatterid"><?php echo $row2['email'] ?></span></td>
</tr>
</table>
<?php
}
}
?>
</div>
				
<div class="chatbox" style="float:right" >
			<div id="wrapper" style="margin-top:10px;margin-bottom:10px;padding-bottom:25px;background:#EBF4FB;width:230px;height:269px;border:1px solid #ACD8F0;border-radius:25px; ">  
			<div class="menu" style="padding:12.5px 25px 12.5px 25px;">
			<p class="logout" style="float:right;cursor:pointer;">Exit Chat</p>			
			<div style="clear:both"></div>  
			</div>  
      
			
		<div id="chatbox1" style="text-align:left;margin:0 auto;margin-bottom:25px;padding:10px;background:#fff;height:130px;width:180px;border:1px solid #ACD8F0;overflow:auto;">
		
		</div>  
			  
			<input style="margin-left:15px" type="text" id="inputmsg">

			<input type="hidden" id="receiverid">
			<input  name="submitmsg" type="button"  class="submitmsg" value="Send"/>  
			</div>  
			</div>
			</div>

<!--/chat box-->

<!--  Footer  -->
    <div class="lineBlack" style="margin-top:-20px;">
        <div class="container">
            <div class="row downLine">
                <div class="col-md-12 text-right">
                </div>
                <div class="col-md-6 text-left copy">
                    <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-right dm">
                        
                </div>
            </div>
        </div>
    </div>
    <!--  End of Footer  -->
</body>

</html>
