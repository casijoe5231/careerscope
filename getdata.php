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
	
    <title>BYB | Administrator Menu </title>
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
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    
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
<script type="text/javascript">
		$(document).ready(function()
		{
			('show').load('getdata.php');
			
		});
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
                         <li><a href="demo2.php">Assign Task</a>
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

	 
	 
	 <table class="table table-condensed table-bordered table-hover table-striped">
 <tr>
 
   <th>Department</th>
   <th>Yaer</th>
   <th>Semester</th>
   <th>subject</th>
   <th>Edit Data</th>
   <th>Delete Data</th>
  
  </tr>
<?php
include 'includes/connection1.php';
    
$res = "SELECT * FROM addsubject";
$result=mysqli_query($GLOBALS["___mysqli_ston"], $res);
while($row = mysqli_fetch_array($result)):
?>
 <tr>
   <td><?php echo $row['department']; ?></td>
   <td><?php echo $row['year']; ?></td>
   <td><?php echo $row['sem']; ?></td>
   <td><?php echo $row['subject']; ?></td>
   
   
   <td><a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addData-<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a> </td>
      <!-- Modal -->
      <div class="modal fade" id="addData-<?php echo $row['id']; ?>" tabindex="-<?php echo $row['id']; ?>" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['id']; ?>" aria-hidden="false">
      <div class="modal-dialog">
 <div class="modal-content">
    <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
     <h4 class="modal-title" id="myModalLabel-<?php echo $row['id']; ?>">Update Data</h4>
   </div>
   <form role="form" action="getdata.php" method="post">
  
   <div class="modal-body">
       <input type="hidden" name="id1" id="id" value="<?php echo $row['id']; ?>">
       <div class="form-group">
  <label for="department">Department</label>
  <input type="text" class="form-control" name="dept" id="department<?php echo $row['id']; ?>" value="<?php echo $row['department']; ?>">
       </div>
       <div class="form-group">
  <label for="year">yaer</label>
  <input type="text" class="form-control" name="year1"id="year<?php echo $row['id']; ?>" value="<?php echo $row['year']; ?>">
       </div>
	   
	   <div class="form-group">
  <label for="year">Semester</label>
  <input type="text" class="form-control" name="sem1" id="sem<?php echo $row['id']; ?>" value="<?php echo $row['sem']; ?>">
       </div>
       
       <div class="form-group">
  <label for="subject">subject</label>
  <input type="text" class="form-control" name="subject1" id="subject<?php echo $row['id']; ?>" value="<?php echo $row['subject']; ?>">
       </div>
      <div class="modal-footer">
     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     <button type='submit' name='submit' class='btn btn-primary'>Save changes</button>
   </div>
  </form>
  </div>
      </div>
      </div>
	   <td><a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteData-<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</a> </td>
 
 </tr>
  
	  <div class="modal fade" id="deleteData-<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel-<?php echo $row['id']; ?>" aria-hidden="false">
       <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="delete-modal-title">Delete</h4>
          </div>
          <form role="form" action="getdata.php" method="post">
          <div class="modal-body">
		  <input type="hidden" name="id1" id="id" value="<?php echo $row['id']; ?>">
       
            <div class="row">
              <h4 class="text-center">Are you sure, you want to delete all the entries with that name?</h4>
              <input id="piddelete" type="hidden" name="piddelete">
              <div class="col-sm-6">
                <button type="button" class="btn btn-default btn-block"  data-dismiss="modal" aria-label="Close">Nope</button>
              </div>
              <div class="col-sm-6">
                <button type="submit1" id="b1" name="submit1" class="btn btn-danger btn-block" >Damn Sure!</button>
              </div>              
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>  
</div>
<?php
endwhile;
?>
      </table>
 <div id="show">
	 <?php
	 
if(isset($_POST['submit']))
{
include 'includes/connection1.php';
echo $id=$_POST['id1'];
$department = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['dept']);
$year = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['year1']);
$sem = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['sem1']);
$subject = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['subject1']);


  $res2 = "update  addsubject set department='$department', year='$year', sem='$sem', subject='$subject' where id='$id'";
  $result=mysqli_query($GLOBALS["___mysqli_ston"], $res2)or die('error'.mysqli_error($GLOBALS["___mysqli_ston"]));
  
  if($result)
  {
    echo "Success Update Data";
  } else
  {
    echo "Fail Update Data";
  }
} 

?>
</div>

<?php
	 
if(isset($_POST['submit1']))
{
include 'includes/connection1.php';
echo $id=$_POST['id1'];

  $res2 = "delete  from addsubject  where id='$id'";
  $result=mysqli_query($GLOBALS["___mysqli_ston"], $res2)or die('error'.mysqli_error($GLOBALS["___mysqli_ston"]));
  
  if($result)
  {
    echo "Success Update Data";
  } else
  {
    echo "Fail Update Data";
  }
} 

?>
	
	 
	 
	 
	 </body>
</html>