<html>
<head>
<!--  CSS  -->
<link rel="stylesheet" type="text/css" href="../css/logo.css">
    <link rel="stylesheet" type="text/css" href="../css/sdp_edit_border.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>
    <link rel="stylesheet" type="text/css" href="../css/carousel.css">
    <link rel="stylesheet" type="text/css" href="../css/slicknav.css">
    <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main
    stylesheet"charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet'             type='text/css'>
<!-- Bootstrap -->
<link rel="stylesheet" href="css_modal/bootstrap.css">
<link rel="stylesheet" href="css_modal/style1.css">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="js_modal/jquery.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js_modal/bootstrap.js"></script>



 <link rel="stylesheet" href="../css/datepicker.min.css" />
<link rel="stylesheet" href="../css/datepicker3.min.css" />

<script src="../css/bootstrap-datepicker.min.js"></script>
    <!-- jQuery library -->
<script src="../js/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="../js/bootstrap.min.js"></script>

<style type='text/css'>
.fieldset{
padding:10px;

line-height:1.8;
border: 1px solid #781351;
}
</style>
<!-- Script for test-->

  <script>
var nowDate = new Date();
var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
today.setDate(today.getDate() + 7);
$(document).ready(function() {
    $('#datePicker')
        .datepicker({
            //format: 'mm/dd/yyyy'
            startDate: today,
            format: 'dd-mm-yyyy'

        })
		//$("#datepicker").datepicker({ minDate: 0 });
        .on('changeDate', function(e) {
            // Revalidate the date field
            $('#eventForm').formValidation('revalidateField', 'date');
        });

    $('#eventForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'The name is required'
                    }
                }
            },
            date: {
                validators: {
                    notEmpty: {
                        message: 'The date is required'
                    },
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'The date is not a valid'
                    }
                }
            }
        }
    });
});
</script>
<!-- Script for test ends here-->
</head>
<body>
<?php
//Include database connection here
session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }
	
//Connection Code
$db="careerscope";
$servername = "localhost";
$username = "root";
$password = "oracle";

// Create connection
$conn=($GLOBALS["___mysqli_ston"] = mysqli_connect($servername, $username, $password));  // Make Connection
	mysqli_select_db($GLOBALS["___mysqli_ston"], $db);                      // Select Database

// Check connection
if (!$conn) {
    die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
//echo "Connected successfully";

//Connection Code ends


$Id = $_GET["id"]; //escape the string if you like
 $_SESSION['ID'] = $Id;
$email=$_SESSION['user'][0];
$sql1="select * from goal_list where email='$email'and goal_id='$Id'";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$count=mysqli_num_rows($res1);
// Run the Query
//echo $Id;echo $count;
 $data2 = mysqli_fetch_array($res1);
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><center><?php $user_name = $_SESSION['user'][1]; echo "$user_name";echo "'s Goal" ?></center></h4>
</div>
<div class="modal-body">
   
   
<form class="form-horizontal" action="updatedb.php" method="get">
  <!--Goal Title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $data2[title]?>"/> </br>
  Action Plan:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $data2[action_plan]?>"/> </br>
  Deadline:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="<?php echo $data2[deadline]?>"/><br>
  Frequency of Reminders: <input type="text" value="<?php echo $data2[frequency]?>"/> </br>
  Goal Type:              <input type="text" value="<?php echo $data2[goal_type]?>"/> </br> -->
  <div class="container">
  <div class="row">
  <div class="form-group col-sm-6">
    <label for="email">Goal Title:</label>
    <input type="text" class="form-control" name="goal_title" value="<?php echo $data2[title]?>">
  </div></div>
  <div class="row">
  <div class="form-group col-sm-6">
    <label for="pwd">Action Plan:</label>
    <input type="text" class="form-control" name="action_plan" value="<?php echo $data2[action_plan]?>">
  </div></div>
  
  <div class="row">
  <div class="form-group col-sm-6">
  <!--                 -->
	
        <label required="">DeadLine</label><br>
        
            <div class="input-group input-append date col-sm-4" id="datePicker">
                <input name="deadline" type="text" class="form-control" required="" value="<?php echo $data2[deadline]?>"/>
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        
    
  <!---                -->
    <!--<label for="pwd">Deadline:</label>
    <input type="text" class="form-control" name="deadline" value="<?php echo $data2[deadline]?>">-->
  </div></div>
  
  <div class="row">
  <div class="form-group col-sm-6">
    <label for="pwd">Frequency of Reminders:</label>
	
			<?php 
			if($data2[frequency] == 1)
			{
				echo '<fieldset class="form-group"><div class="radio"><label><input type="radio" name="remind" id="optionsRadios1" value="1" checked>Once a Week</label></div><div class="radio"><label><input type="radio" name="remind" id="optionsRadios2" value="3">Thrice a Week</label></div><div class="radio"><label><input type="radio" name="remind" id="optionsRadios3" value="7">Everyday</label></div></fieldset>'; 
			}
			elseif($data2[frequency] == 3)
			{
				echo '<fieldset class="form-group"><div class="radio"><label><input type="radio" name="remind" id="optionsRadios1" value="1">Once a Week</label></div><div class="radio"><label><input type="radio" name="remind" id="optionsRadios2" value="3" checked>Thrice a Week</label></div><div class="radio"><label><input type="radio" name="remind" id="optionsRadios3" value="7">Everyday</label></div></fieldset>'; 
			}
			else
			{
				echo '<fieldset class="form-group"><div class="radio"><label><input type="radio" name="remind" id="optionsRadios1" value="1" checked>Once a Week</label></div><div class="radio"><label><input type="radio" name="remind" id="optionsRadios2" value="3">Thrice a Week</label></div><div class="radio"><label><input type="radio" name="remind" id="optionsRadios3" value="7" checked>Everyday</label></div></fieldset>'; 
			}
			?>	
				  </div></div>
			
<fieldset class="form-group">
  <div class="form-group col-sm-6">
    
	
	<!-- -->

    <label for="exampleSelect1">Select Goal Type</label>
  <!--  <select class="form-control" name = "type" id="exampleSelect1" required="">-->
	
<div>
		 <select name="goal_type" class="form-control" id="input-goal_type" temp="Please select the Goal Type" onblur="validator1(this)"> 
               <option value="<?php echo $data2[goal_type]?>"><?php echo $data2[goal_type]; ?></option> 
            <?php
  
                 $dd_res=mysqli_query($GLOBALS["___mysqli_ston"], "Select Goal_name from goal_type");
                 while($r=mysqli_fetch_row($dd_res))
                 { 
                       echo "<option value='$r[0]'> $r[0] </option>";
                 }
             ?>
              </select>
		</div>
 
	<!--  -->
	
    <!-- <input type="text" class="form-control" name="goal_type" value="<?php //echo $data2[goal_type]?>"> -->
  </div>
 </fieldset>
</div>
  <center><button type="submit"class="btn btn-primary">Update</button></center>
   
   </form>
</div>
<div class="modal-footer">
   
    <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">Close</button>
 

</div>
</body>
</html>