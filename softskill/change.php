 <?php
    session_start();
    include '../includes/connection1.php';

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }

    if ($_SESSION['usertype']!=1) {
        if ($_SESSION['usertype']!=2) {
            header("location:../login.php");
        }
    }

    $emaill=$_SESSION['user'][0];
    
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s"); 
    $sql="insert into activity(email,menu_accessed,timesql) values('$emaill','Aptitude Test','$timesql')";
    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Favicon -->
        <link href="../images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | Tests </title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
        <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>

        <link rel="stylesheet" type="text/css" href="../css/slicknav.css">
        <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/style2.css">
<link rel="stylesheet" href="blossom.css">
<link rel="stylesheet" href="nivo-slider/themes/default/default.css" type="text/css" media="screen" />


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
        <!--script type="text/javascript" src="js/jquery.nav.js"></script-->
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="blossom.js"></script>
<style>

#header {
    
       text-align:center;
   
}
p. {
    margin-top: 10px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 50px;
}

p.ex {
    margin-top: 10px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 50px;
}

</style>

        
    </head>
    <body>
	
	
	
	
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
										     <li><a>"Change your thoughts and you change your world "</a></li>

                                           </ul>
					               </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		 <div class="container">

        <div style="padding:10px;" class="panel panel-default">
            <div class="row">
                <div class="col-sm-2">
                    <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
                </div>
                <div class="col-sm-10">
                    <div class="col-sm-8"></div>

                    <div class="col-sm-2">
                    <?php
            if(isset($_SERVER['HTTP_REFERER']))
                $referer=$_SERVER['HTTP_REFERER'];
            else
                $referer="index.php";
            echo '<a class="btn btn-default btn-block" href="'.$referer.'">&laquo; Back</a>';
        ?>
                    </div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../logout.php">Logout</a></div>
                
                </div>
            </div>
        </div>
</div>

    <img src="ch1.jpg" width="220" height="220">
      <img src="ch2.jpg" width="230" height="220">
          <img src="ch3.jpg" width="220" height="220">
          <img src="ch4.jpg" width="220" height="220">
          
    
 <div id="header">
<h1>change Management</h1>
</div>







<p><h5>
Change management is a term that is bandied about freely. Sometimes it's a scapegoat for less than stellar results: "That initiative failed because we didn't focus enough on change management." And it's often used as a catch-all for project activities that might otherwise get overlooked: "When we implement that new process, let's not forget about the change management."
</p>

<h3>But what exactly is it?</h3></p>
<p>
Change management is a structured approach for ensuring that changes are thoroughly and smoothly implemented, and that the lasting benefits of change are achieved.
<p>
The focus is on the wider impacts of change, particularly on people and how they, as individuals and teams, move from the current situation to the new one. The change in question could range from a simple process change, to major changes in policy or strategy needed if the organization is to achieve its potential.
<p>
<b>Understanding Change Management</b>
<br>
Theories about how organizations change draw on many disciplines, from psychology and behavioral science, through to engineering and systems thinking. The underlying principle is that change does not happen in isolation – it impacts the whole organization (system) around it, and all the people touched by it.
</h5></p>




<h3>According to the 7 Cs, communication needs to be:</h3>
<p><h5>
When you are tasked with "managing change" (irrespective of whether or not you subscribe to a particular change management approach), the first question to consider is what change management actually means in your situation. Change management focuses on people, and is about ensuring change is thoroughly, smoothly and lastingly implemented. And to know what that means exactly in your situation, you must dig down further to define your specific change management objectives.
</h5></p>
<p class =ex><h5>
<ul><br>1.	<b>Sponsorship:</b>Ensuring there is active sponsorship for the change at a senior executive level within the organization, and engaging this sponsorship to achieve the desired results.</ul>
<ul><br>2.	<b>Buy-in:</b> Gaining buy-in for the changes from those involved and affected, directly or indirectly.</ul> 
<ul><br>3.	<b>Involvement:</b> Involving the right people in the design and implementation of changes, to make sure the right changes are made.</ul>
<ul><br>4.	<b>Impact:</b> Assessing and addressing how the changes will affect people.</ul>
<ul><br>5.	<b>Communication:</b> Telling everyone who's affected about the changes. </ul>
<ul><br>6.	<b> Readiness:</b>Getting people ready to adapt to the changes, by ensuring they have the right information, training and help.</ul>

</h5></p>
<p>
<h3>Change Management Activities<h3>
<h5>
Once you have considered the change management objectives and scope, you'll also need to consider the specific tasks. Again, the range of possible activities is broad. It's a question of working out what will best help you meet the change challenge in hand, as you have defined it in your objectives and scope, and how to work along side other people's and projects' activities and responsibilities.
<br>
The essence of this is to identify the tasks that are necessary if you're going to give change the greatest chance of success.
<br>
Coming from this, the activities involved in managing change can include:

<ul>
<br><h5>
    <ul><li>Ensuring there is clear expression of the reasons for change, and helping the sponsor communicate this.</li></ul>
    <ul><li>Identifying "change agents" and other people who need to be involved in specific change activities, such as design, testing, and problem solving, and who can then act as ambassadors for change.</li></ul>
    <ul><li>Assessing all the stakeholders and defining the nature of sponsorship, involvement and communication that will be required.</li></ul>
    <ul><li>Planning the involvement and project activities of the change sponsor(s).</li></ul>
	<ul><li>Planning how and when the changes will be communicated, and organizing and/or delivering the communications messages.</li></ul>
   	<ul><li>Planning activities needed to address the impacts of the change.</li></ul>
    <ul><li>Ensuring that people involved and affected by the change understand the process change.</li></ul>
	<ul><li>Making sure those involved or affected have help and support during times of uncertainty and upheaval.</li></ul>
	<ul><li>Assessing training needs driven by the change, and planning when and how this will be implemented.</li></ul>
	<ul><li>Identifying and agreeing the success indicators for change, and ensure they are regularly measured and reported on.</li></ul>
	<ul>Remember, these are just some typical change management activities. Others may be required in your specific situation. Equally, some of the above may not be within your remit, so plan carefully, and coordinate with other people involved.</ul>
  </h5>
  </ul>

</h5></p>
<p>
<h3>Key Points<h3>
<h5>
Change management is a broad discipline that involves ensuring change is implemented smoothly and with lasting benefits, by considering its wider impact on the organization and people within it. Each change initiative you manage or encounter will have its own unique set of objectives and activities, all of which must be coordinated.
<br>
As a change manager, your role is to ease the journey towards new ways of working, and you'll need a set of tools to help you along the way: There's a wide range of change management tools here at Mind Tools – this a great place to start!
</h5></p>

 <div class="wrapper row10"> 
      <div style="margin-top:40px;" class="lineBlack">
            <div class="container">
                <div class="row downLine">
                    <div class="col-md-12 text-right">
                                          <div class="col-md-6 text-left copy">
                            <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
                        </div>
                        <div class="col-md-6 text-right dm">
                           <div class="col-md-10">
                                <div class="navmenu"style="text-align: center;">
                                    <ul id="menu">
                                        <li><p href="../newindex.php">Home</p></li>
                                       
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
</htm
