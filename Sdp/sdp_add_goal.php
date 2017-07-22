<html>
<head>
<?php
session_start();

    if(!isset($_SESSION['user'])){
        header("location:../careerscope/login.php");
    }
?>
	<!-- Favicon -->
    <link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>EYB | SDP | Add Goal</title>
    
<!--  CSS  -->
<link rel="stylesheet" type="text/css" href="../css/logo.css">
    
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>
    <link rel="stylesheet" type="text/css" href="../css/carousel.css">
    <link rel="stylesheet" type="text/css" href="../css/slicknav.css">
    <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main
    stylesheet"charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet'             type='text/css'>
    

<link rel="stylesheet" type="text/css" href="../css/style.css">  
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
      <link href="../css/bootstrap-theme.min.css" rel="stylesheet">
      <link href="../css/bootstrap-theme.css" rel="stylesheet">
        <link href="../css/normalize.css" rel="stylesheet">
      <script src="../css/jquery.min.js"></script>
  <script src="../css/bootstrap.min.js"></script>

    <link rel="stylesheet" href="../css/datepicker.min.css" />
<link rel="stylesheet" href="../css/datepicker3.min.css" />
<link rel="stylesheet" href="For_tab/bootstrap.min.css">
<script src="../css/bootstrap-datepicker.min.js"></script>
    <!-- jQuery library -->
<script src="../js/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="../js/bootstrap.min.js"></script>
</head>
<body>
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
<!--header-->
<style>
.headerLine{
    position: relative;
    width: 101%;
    
    height:22%;
    background: url(../images/bgTop.jpg) center center no-repeat;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
</style>
<!--header starts-->
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
<!--   /Header     -->

<!--Body -->
<!-- NAme of user-->
<div class="container">

    <div style="padding:10px;" class="panel panel-default">
    <div class="row">
        <div class="col-sm-3">
            <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
        </div>
        <div class="col-sm-7">
            
        </div>
		<div class="col-sm-1">
                    <a class="btn btn-default btn-block" href="../newindex.php">Home</a>
		</div>
        <div class="col-sm-1">
            <span><a class="btn btn-default" href="../logout.php">Logout</a></span>
        </div>
        
    </div>
</div>
</div>
<!-- Name of user ends-->
<div class="row">
  <div class="col-md-2">.</div>
  <div class="col-md-8">
  <!--<p class="navbar-brand">Welcome <?php echo $_SESSION['user'][1]; ?>,</p>-->
	<center><h2>Fill the form to add a Goal</h2></center>
  	<form class="fieldset" method="post" action="sdp_add.php">
  
  <div class="form-group">
    <label for="exampleInputPassword1">Title</label>
    <input type="text" name="title"class="form-control" id="exampleInputPassword1" placeholder="Title" required="">
  </div>
  <div class="form-group">
    <label for="exampleTextarea">Describe Your Action Plan</label>
    <textarea name ="a_plan"class="form-control" id="exampleTextarea" rows="3" required=""></textarea>
  </div>
  
  <div class="form-group">
        <label required="">DeadLine</label><br>
        
            <div class="input-group input-append date col-sm-3" id="datePicker">
                <input name="dead_l" type="text" class="form-control" name="Give_Something" required=""/>
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        
    </div>
    <!-- script ends here-->
  <div class="form-group">
    <label for="exampleSelect1">Select Goal Type</label>
  <!--  <select class="form-control" name = "type" id="exampleSelect1" required="">-->
	<?php
            
            $mysqlserver="localhost";
            $mysqlusername="root";
            $mysqlpassword="oracle";
            $link=($GLOBALS["___mysqli_ston"] = mysqli_connect(localhost,  $mysqlusername,  $mysqlpassword)) or die ("Error connecting to mysql server: ".mysqli_error($GLOBALS["___mysqli_ston"]));
            
            $dbname = 'careerscope';
            mysqli_select_db( $link, $dbname) or die ("Error selecting specified database on mysql server: ".mysqli_error($GLOBALS["___mysqli_ston"]));
    
	/*select goal="Goal_name">
	
            /*$cdquery="SELECT Goal_name FROM goal_type";
            $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
            while ($cdrow=mysql_fetch_array($cdresult)) {
            $cdTitle=$cdrow["cdTitle"];
                echo "<option value=\"Goal_name1\">"
                    .$row['Goal_name'].
               " </option>";
            
            }			
               
            ?>
	</select>*/
	?><div>
		 <select name="Goal_name" class="form-control" id="input-goal_type" temp="Please select the Goal Type" onblur="validator1(this)"> 
               <option value="Goal_name"> -----------ALL----------- </option> 
            <?php
  
                 $dd_res=mysqli_query($GLOBALS["___mysqli_ston"], "Select Goal_name from goal_type");
                 while($r=mysqli_fetch_row($dd_res))
                 { 
                       echo "<option value='$r[0]'> $r[0] </option>";
                 }
             ?>
              </select>
		</div>
	
	<?php
	?>
      <!--<option value="Realisitic">Realisitic</option>
      <option value="Timedays">Timedays</option>
      <option value="Ambitious">Ambitious</option>
      <option value="Mesaurable">Measurable</option>
      <option value="Specific">Specific</option> 
    </select>-->
  </div>
  
  
  <fieldset class="form-group">
    <label>Frequency of Reminder</label>
    <div class="radio">
      <label>
        <input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked>
        Once a Week
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="optionsRadios" id="optionsRadios2" value="3">
        Thrice a Week
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="optionsRadios" id="optionsRadios3" value="7">
        Everyday
      </label>
    </div>
  </fieldset>
  <hr>
  <center><button type="submit" class="btn btn-primary">Submit</button></center>
</form>
  </div>
  <div class="col-md-2">.</div>
  
</div>

<!-- /Body-->
<!--  Footer  -->
<div class="row">
<div  class="lineBlack">
    <div class="container">
        <div class="row downLine">
            <div class="col-md-12 text-right">
            </div>
            <div class="col-md-6 text-left copy">
                <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
            </div>
            <div class="col-md-6 text-right dm">
               <!-- <ul id="downMenu">
                    <li class="active"><a href="#home">Home</a>
                    </li>
                    <li><a href="#" target="blank">Link 1</a>
                    </li>
                    <li><a href="#" target="blank">Link 2</a>
                    </li>
                    <li><a href="#" target="blank">Link 3</a>
                    </li>
                </ul>-->
            </div>
        </div>
    </div>
</div>
</div>
<!--  End of Footer  -->

</body>
</html>
