
<?php
    	include 'includes/headerfooter.php';
    session_start();
    if($_SESSION['usertype']>=9 && $_SESSION['usertype']<=14)
	
		echo "usertype:".$_SESSION['usertype'];
		include 'includes/connection2.php';
		
		$emaill=$_SESSION['user'][0];
		$usertype=$_SESSION['usertype'];
		 $sql5="select * from masteruser where email='$emaill'";
    $res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
   while($row5=mysqli_fetch_array($res5))
    {
      $_SESSION['institute']=$row5['institute'];
    }
    
		date_default_timezone_set('Asia/Calcutta');
		$datetime = date("F j, Y, g:i a");
		$timesql = date("Y-m-d H:i:s"); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
<!-- Favicon -->
    <link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>EYB | Administrator Menu </title>
      
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
        


        <!--Custom CSS-->
<link rel="stylesheet" type="text/css" href="css/ColumnFilterWidGETs.css">
<script type="text/javascript" charset="utf-8" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" src="js/ColVis.js"></script>
<link rel="stylesheet" type="text/css" href="css/ColVis.css">

  <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script  type="text/javascript" src="validator2.js" ></script>

<script>
$(document).ready( function () {
    $('#details').dataTable( {
         bAutoWidth:false ,
        "sDom": 'W<"clear">lfrtip',
         oColumnFilterWidGETs: {
        aiExclude: [7,8]
       }
    } );
} );


/*$(document).ready( function () {
    $("#details").dataTable().columnFilter();
} );*/
</script>
<script language="javascript"> 
function toggle() {
    var ele = document.getElementById("toggleText");
    var text = document.getElementById("displayText");
    if(ele.style.display == "block") {
            ele.style.display = "none";
        text.innerHTML = "First Year";
    }
    else {
        ele.style.display = "block";
        text.innerHTML = "First Year";
    }
} 
function toggle1() {
    var ele = document.getElementById("toggleText");
    var text = document.getElementById("displayText");
    if(ele.style.display == "block") {
            ele.style.display = "none";
        text.innerHTML = "Second Year";
    }
    else {
        ele.style.display = "block";
        text.innerHTML = "Second Year";
    }
} 
function toggle2() {
    var ele = document.getElementById("toggleText");
    var text = document.getElementById("displayText");
    if(ele.style.display == "block") {
            ele.style.display = "none";
        text.innerHTML = "Third Year";
    }
    else {
        ele.style.display = "block";
        text.innerHTML = "Third Year";
    }
} 
function toggle3() {
    var ele = document.getElementById("toggleText");
    var text = document.getElementById("displayText");
    if(ele.style.display == "block") {
            ele.style.display = "none";
        text.innerHTML = "BE";
    }
    else {
        ele.style.display = "block";
        text.innerHTML = "BE";
    }
} 

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
                        <li><a href="lecturerdetails.php">Existing Staff Details</a>
                        </li>
                        <li class="active"><a href="addsubject.php">Add subject</a>
                        </li>
                        
                        <li class="active"><a href="getdata.php">View Subject Details</a>
                        </li>
                        

                    </ul>
                </div>
            </div>
        </div>
    </div> 
</div>
   

    <div style="margin-top:120px;" class="container">

    <div style="padding:10px;" class="panel panel-default">
    <div class="row">
        <div class="col-sm-3">
            <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
        </div>
        <div class="col-sm-8">
            
        </div>
        <div class="col-sm-1">
            <a class="btn btn-default btn-block" href="logout.php">Logout</a>
        </div>
        
    </div>
</div>





        <table class="table table-hover" id="details"  style="margin-top:20px;margin-bottom:20px;">
        <thead>
        <tr>
        <th><b>lecturer Name</b></th>
        <th><b>Change task</b></th>
        <th><b>Email</b></th>
        </tr>
        </thead>
        <tbody>
        <?php
		include 'includes/connection1.php';
		
		
		$sql="select * from masteruser where role='Staff' and institute='$_SESSION[institute]'";
        $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
        while($row=mysqli_fetch_array($res))
        {
        $sql1="select * from istaff where email='$row[email]' and  is_lecturer=1";
         $res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
        while($row1=mysqli_fetch_array($res1))
        {
        ?>
        <tr><td><?php echo $row['name'] ?></td>
        
        <form name="trial" method="GET" >
		<td><?php
		 if(isset($_POST['submit']))
		 {
		include 'includes/connection1.php';
		  //$email=$_GET['email1'];
        //session_start();
		
$department = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['department']);
		$year = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['year']);
		$sem = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['sem']);
       $sql="SELECT * from addsubject where department='".$department."' AND year='".$year."' AND sem='".$sem."'";
	    
		 $result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		$count=mysqli_num_rows($result);
  // Fetch one and one row
  
			for($i=0;$i<$count;$i++)
			{
				$row1=mysqli_fetch_array($result);
				$subject=$row1['subject'];
				echo "<input name=\"Director[]\" type=\"checkbox\" value=\"$subject\"> $subject";
				//echo $row['subject']; 
				//echo "<input type='checkbox' name='Director[]' value='".$row['subject']."'>";
			}
				
			}	
   
?></td>
       <td>
	   
        <input type="hidden" name="email1" value="<?php echo $row['email']; ?>">
		 <input type="hidden" name="year1" value="<?php echo $year;?>">
       
        <input type='submit' name='submit' id='submit1' value='Send email' style='cursor:pointer;'>
        </td>
        </form>
        </tr>
        <?php
        }
        }
		
		
        ?>
        </tbody>
        </table>
             
    </div>
        <?php
        if(isset($_GET['submit']))
        {
            include 'includes/connection1.php';
            $email=$_GET['email1'];
			echo $year=$_GET['year1'];
			 $datetime = date("F j, Y, g:i a");
            $timesql = date("Y-m-d H:i:s");
			$sql1="select distinct(sub_name) from asubhod where email='$email'";
              $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql1)or die("query not executed"); 
while($row = mysqli_fetch_array($res))
{			  
			 echo $sub=$row['sub_name'];
			  }
                           if(isset($_GET["Director"])) {
                            $director=implode(",",$_GET['Director']);
							 $director;
							if($sub=='0')
							//update photo_img set dtl=concat(dtl,'site_data to add') where gal_id='22'
							{
                             echo $sql="update asubhod set sub_name='$director',time='$timesql' where email='$email'";
                             $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
                            }
							else
							{
							echo $sql="INSERT INTO asubhod (email,sub_name,softskill,aptitude,year,time)
							VALUES ('".$email."','".$director."','0','0','$year','$timesql')";
							$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die('Error: ' . mysqli_error());

							//echo $sql="insert into asubhod(email,contact,sub_name,softskill,aptitude,year) values('$email','0','$director','0','0','$year')";
							//$res=mysql_query($sql)or die("query not executed");
                            
							//echo"hi kumkum"; 
							}
							}
                      echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('Modification done successfully!');
    window.location.href='demo2.php';</SCRIPT>";
         
                          
      
  }     
/*$To = $email; 
$Subject = 'Send Email'; 
$Message = 'Your role is modified as:'.if(isset($_GET['Director'])){echo $_GET['Director'];}.','.if(isset($_GET['Principal'])){echo $_GET['Principal'];}.','.if(isset($_GET['HOD'])){echo $_GET['HOD'];}.','.if(isset($_GET['TPO'])){echo $_GET['TPO'];}.','.if(isset($_GET['Mentor'])){echo $_GET['Mentor'];}.','.if(isset($_GET['SubjectTeacher'])){echo $_GET['SubjectTeacher'];}.','.if(isset($_GET['TestManager'])){echo $_GET['TestManager'];}.','.if(isset($_GET['Lecturer'])){echo $_GET['Lecturer'];};
$Headers = "From: priyankamalekar9@gmail.com \r\n" . 
"Reply-To: priyankamalekar9@gmail.com \r\n" . 
"Content-type: text/html; charset=UTF-8 \r\n"; 
  
mail($To, $Subject, $Message, $Headers);                
*/

 ?>
 
 
 </div>
<!--  Footer  -->
<div class="lineBlack">
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
                    <li><a href="#" tarGET="blank">Link 1</a>
                    </li>
                    <li><a href="#" tarGET="blank">Link 2</a>
                    </li>
                    <li><a href="#" tarGET="blank">Link 3</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!--  End of Footer  -->
</body>
</html>