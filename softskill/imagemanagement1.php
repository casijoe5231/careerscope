
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
										     <li><a>“Image management is the ongoing process of evaluating and controlling the impact of your appearance and the resulting response on you and others”.</a></li>

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

    <img src="ime1.jpg" width="220" height="220">
      <img src="ime2.jpg" width="230" height="220">
          <img src="ime3.jpg" width="220" height="220">
          <img src="ime4.jpg" width="220" height="220">
          <img src="ime5.jpg" width="220" height="220">
		  <img src="ime6.jpg" width="220" height="220">
    
 <div id="header">
<h1>Etiquette and Manners</h1>
</div>



<h3>How to Have Good Manners<h3>

<p><h5>
Manners are an important thing to learn. Having good manners means acting in a manner that is socially acceptable and respectful. Excellent manners can help you to have better relationships with people you know, and those you will meet.Some steps to take in an effort to develop good manners would be to familiarize yourself with basic etiquette such as dining and phone etiquette. Being polite to others is always a good place to start and you can begin your journey to good manners by holding doors open for others when possible. Good manners convey respect to those you interact with, and also commands respect from those you interact with.
<br>
<p>
Etiquette, the complex network of rules that govern good behavior and our social and business interactions, is always evolving and changing as society changes.  It reflects our cultural norms, generally accepted ethical codes, and the rules of various groups we belong to.  

<p>
Unlike in a business, where different people have different roles, when it comes to your image, it’s just one person, that is, YOU. You play multiple roles, which could range from being a parent and managing the daily chores at home to going out for parties with your spouse, and interacting with people from different backgrounds. If you’re a working professional, then you also have a professional role to play.
</p>
<p>
<h3>Why is it Important to Etiquette and manners</h3>
</p>
<p>
Etiquette is merely a set of guidelines for politeness and good manners, the kindnesses with which we should always treat each other. It will always matter!
<p>
It helps us show respect and consideration to others and makes others glad that we are with them. Without proper manners and etiquette, the customs of polite society would soon disappear and we would act more like animals and less like people. Aggressiveness and an "every man for himself" attitude would take the lead.
<p>
The rules of etiquette concerning marriage, mourning, and other major events of life largely applied only to the ruling classes or the wealthy. Peasants and workers, as long as they followed the rules of etiquette pertaining to respecting their superiors, were not expected to follow formalized rules of courtship; they tended to base their own "rules" of courtship on good manners and common sense.

</h5></p>




<h3><b>Your appearance strongly influences other people’s perception of your:</b>
</h3>
 <ul><li>Practice basic courtesy.</li></ul>
     <ul><li>Hold doors open for other people.</li></ul>
     <ul><li>Speak politely.</li></ul>
     <ul><li>Give up your seat on public transportation.</li></ul>
     <ul><li>Congratulate people.</li></ul>
	 <ul><li>Be a courteous driver.</li></ul>
	 <ul><li>Know how to greet people.</li></ul>
	 <ul><li>Manage introductions with grace.</li></ul>
	  <ul><li>Groom yourself appropriately.</li></ul>
	   <ul><li>Write thank-you notes.</li></ul>
<p><h5>
<h3><b>Etiquette and manners includes:</b></h5>
</h5></p>
<p><h5>
<ul>
<ul><li>Basic etiquette</li></ul>
<ul><li>phone etiquette</li></ul> 
<ul><li>dining manners</li></ul>
</ul>


</h5></p>
<p>
<h5>
Even on miserable days when everything seems to be going wrong, forcing a smile has the potential to lift the mood of not only the person you’re looking at but yours as well. Offer a greeting, and you might even see an extra ray of sunshine.
<br>


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
