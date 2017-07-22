<?php
    session_start();
	if(isset($_SESSION['user']))
	{
		if($_SESSION['usertype']!=1){
			
			header("location: home.php?error=0");
		
		}
	include '../includes/connection1.php';


	$emaill=$_SESSION['user'][0];
	$con=mysqli_connect("localhost","root","","careerscope");
	date_default_timezone_set('Asia/Calcutta');
	$datetime = date("F j, Y, g:i a");
	$timesql = date("Y-m-d H:i:s"); 
	$sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Self Assessment','$timesql')";
	$res=mysqli_query($con, $sql)or die("query not executed");

	$stmt = "SELECT * FROM riasec_qus;";
	$result = mysqli_query($con, $stmt);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta property="fb:app_id" content="326516237427150"/>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" /> 
<meta name="description" content="Flip Resume : A book style resume theme" />
<meta name="author" content="Revolutionix" />

<title>BYB | Psychometric Test</title>

<link rel="icon" type="image/png" href="../images/favicon.ico">
<link href="../css/bootstrap.min3.css" rel="stylesheet">
<link href="../css/main-theme3.css" rel="stylesheet">
<link href="../css/glyphicons3.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet">
<script src="../js/js_psycho/jquery.min.js"></script>
<link rel="stylesheet" href="../css/jquery-ui3.css" />
<script src="../js/js_psycho/jquery-ui.min.js"></script>

            <!-- Favicon -->
		<link href="../images/favicon.ico" rel="shortcut icon"/> 
		
		<!-- Bootstrap Core CSS -->
		<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
		
		<!-- Other CSS -->
		<!--<link href="css/font-awesome.css" rel="stylesheet" type="text/css">-->
		<link href="../css/test/animate.css" rel="stylesheet" type="text/css">
		<link href="../css/test/simpletextrotator.css" rel="stylesheet" type="text/css" />
		<link href="../css/test/theme-loading-bar.css" rel="stylesheet" />
		
		

        
        		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
		<link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>
		<link rel="stylesheet" type="text/css" href="../css/slicknav.css">
		<link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../css/style2.css">
        <link href="../css/animate2.css" rel="stylesheet">
		<!--script type="text/javascript" src="js/jquery.nav.js"></script-->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->    </head>

    <body role="document">

        <!--home start-->
    
    <div id="home">
    	<div class="headerLine">
	<div id="menuF" class="default" style="margin-bottom:25px;">
		<div class="container">
			<div class="row">
				<div class="logo col-md-4">
					<div>
						<a href="#">
							<img src="../images/byblogo.png" width="120" height="120">
						</a>
					</div>
				</div>
				<div class="col-md-8">
					<div class="navmenu"style="text-align: center;">
						<ul id="menu">
							<li><a href="../">Home</a></li>
							<li><a href="EP.html" target="_blank">E Portfolio</a></li>
							<li><a href="Aptitude_test.html" target="_blank">Aptitude Test</a></li>
							<li><a href="../big5/">Psychometric Test</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
            </div></div>
        
        
    <div class="main-wrapper">
		<form method="POST"  accept-charset="UTF-8" id="test-form" action="test_mod1_results.php">
			<?php
				include '../includes/connection1.php';
				$sql="SELECT * FROM skillquestions";
				$res=mysqli_query($con, $sql);
				if ($res) {
					echo ":)";
				}
				else{
					echo ":(";
				}
       			while($row = mysqli_fetch_array($res))
		        {
					echo '
						<div class="test_question_wrapper set">
							<div class="row">
								<div class="col-xs-12 test-question-text text-center">'.$row["selfquestions"].'</div>
							</div>
							<div class="row test_question_decision">
								<div class="col-md-10 col-xs-10 test_question_slider_wrapper col-md-offset-1  col-xs-offset-1"><div onclick="countit()" id="slider" class="test_question_slider"></div></div>
							</div>
			                <div class="row test_question_decision">
			                    <div class="col-md-2 col-xs-2 test-question-answer-left">Strongly Agree</div>
			                    <div class="col-md-2 col-xs-2 test-question-answer-left">Agree</div>
			                    <div class="col-md-1 col-xs-1 test-question-answer-left  col-md-offset-1  col-xs-offset-1">Neither agree</div>
			                    <div class="col-md-1 col-xs-1 test-question-answer-left" style="text-align:left;">Nor disagree</div>
			                    <div class="col-md-2 col-xs-2 test-question-answer-left">Disagree</div>
			                    <div class="col-md-3 col-xs-3 test-question-answer-left" style="text-align:center;">Strongly Disagree</div>
			                </div>
			                <input type="hidden" name="option" id="optionid">
						</div>';
			    }

			?>
				   
            
            
			<div class="row test-buttons-wrapper">
				<div class="col-md-12">
					<div class="submit_wrapper setnext"><button type="button" id="submbut" class="btn btn-action btn-lg" ><span>SUBMIT&nbsp;</span></button></div>
				</div>  
			</div>

			<input type="hidden" name="email" value="">

			
		</form>

	</div>

	<div class="test-social-wrapper">
	
		<div class="row">


		</div>
			

	</div>




<!--script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-27031617-1', 'auto');

  ga('send', 'pageview');

</script-->

    </div>

        <script src="../js/js_psycho/test.js"></script>

    <script src="../js/js_psycho/bootstrap.min.js"></script>
    <script>
    //$j('.btn').button();
    </script>
    
    
    <div class="lineBlack" style="margin-top:60px">
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
							<!--li><a href="#features">Features</a></li-->
						</ul>
					</div>
				</div>
			</div>
		</div>
        </div>
    </body>
</html>
<?php
}
elseif(isset($_SESSION['hod']))
{
					echo "<html><head><script src='../js/alertify.min.js'></script>
					<link rel='stylesheet' href='../css/alertify.core.css' />
					<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
					echo "<SCRIPT LANGUAGE='JavaScript'>
					alertify.alert('Access Restriction!!!', function (e) {
					window.location.href='home.php';
					});
					</SCRIPT>";
}
elseif(isset($_SESSION['lecturer']))
{
					echo "<html><head><script src='../js/alertify.min.js'></script>
					<link rel='stylesheet' href='../css/alertify.core.css' />
					<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
					echo "<SCRIPT LANGUAGE='JavaScript'>
					alertify.alert('Access Restriction!!!', function (e) {
					window.location.href='home.php';
					});
					</SCRIPT>";
}
else
{
		header('location:../login.php');
		exit();
}

?>
