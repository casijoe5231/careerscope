<?php
$str = "Paneer Pakoda dish";
echo str_replace(' ','',$str);
?> 
<html>
<head>
<!-- Favicon -->
    <link href="images/favicon.ico" rel="shortcut icon"/>
	
    <title>EYB | SDP</title>
      
<!--  CSS  -->
<link rel="stylesheet" type="text/css" href="css/logo.css">
    
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>
    <link rel="stylesheet" type="text/css" href="../css/carousel.css">
    <link rel="stylesheet" type="text/css" href="../css/slicknav.css">
    <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main
    stylesheet"charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700|Open+Sans:700' rel='stylesheet'             type='text/css'>
  <link rel="stylesheet" href="For_tab/bootstrap.min.css">
  <script src="For_tab/jquery.min.js"></script>
  <script src="For_tab/bootstrap.min.js"></script>
    <!--css ends-->
<style>
.col-md-2 {
    margin:20px;
}
</style>

</head>
<body>
<!-- Data presentation in body starts here-->
<div class="container">
  <h2>Dynamic Tabs</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">SDP</a></li>
    <li><a data-toggle="tab" href="#menu1">Specific</a></li>
    <li><a data-toggle="tab" href="#menu2">Measurable</a></li>
    <li><a data-toggle="tab" href="#menu3">Ambitious</a></li>
    <li><a data-toggle="tab" href="#menu4">Realistic</a></li>
    <li><a data-toggle="tab" href="#menu5">Timebased</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h1>Self-Development Plan</h1>
      <h3>Set your own Targets!</h3><br>
  		<p><a class="btn btn-primary btn-lg" href="sdp_add_goal.php" role="button">Add a Goal</a></p>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
    <div id="menu4" class="tab-pane fade">
      <h3>Menu 4</h3>
      <p>menu 4.</p>
    </div>
    <div id="menu5" class="tab-pane fade">
      <h3>Menu 5</h3>
      <p>Menu 5.</p>
    </div>
  </div>
</div>
<!-- Data presentation in body ends here-->
</body>
</html>

