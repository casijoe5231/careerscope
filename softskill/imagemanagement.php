
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

    <img src="im1.jpg" width="220" height="220">
      <img src="im2.jpg" width="230" height="220">
          <img src="im3.jpg" width="220" height="220">
          <img src="im4.jpg" width="220" height="220">
          
    
 <div id="header">
<h1>Image Management</h1>
</div>



<h3>What is Image Management?<h3>

<p><h5>
Managing one’s image is the key to success in any walk of life. It is easy to confuse image management with a makeover, or attending a motivational or grooming workshop or getting a new hairstyle or buying new clothes. Image Management is much more than that and it involves ongoing evaluation and better utilization of personal resources.
<br>
<p>
Drawing a direct comparison between managing a business and managing your image, in a business, there are various roles, played by different people, and they have certain resources at their disposal – people, marketing tools, IT, finances – which they are expected to make optimum use of in order to achieve the goals in their respected roles.

<p>
Unlike in a business, where different people have different roles, when it comes to your image, it’s just one person, that is, YOU. You play multiple roles, which could range from being a parent and managing the daily chores at home to going out for parties with your spouse, and interacting with people from different backgrounds. If you’re a working professional, then you also have a professional role to play.
<p>
Image management involves learning the science and art of optimally utilizing these elements for the achievement of goals in each role that one plays in life. It is the day-to-day management of these resources.
</p>

<h3>Why is it Important to Manage your Image?</h3></p>
<p>
Image matters because people make assumptions and judgments based on very limited information. H. Andrew Michener, John D. Delamater and Daniel J. Myers explain in their book “Social Psychology” that when we observe a single physical characteristic or behaviour in someone, we tend to assume that the person has a number of related qualities too. For example, someone may be perceived as confident because they have a firm handshake. They may be seen as trustworthy because they make eye contact. They may be judged as capable, professional, successful − even wealthy or intelligent − because they are well-dressed.
<p>
The reverse is also true. According to Brian Tracy, author of “The Psychology of Achievement”, “many capable men and women are disqualified from job opportunities because they do not look the part”.
<p>
Caroline Dunn and Lucette Charette of the National Research Council of Canada found that “people are affected by your appearance whether or not they realize it, and whether or not they think appearance is important”. They found that a first impression has significant and measurable effect on the observer:

</h5></p>




<h3><b>Your appearance strongly influences other people’s perception of your:</b>
</h3>
 <ul><li>Personality</li></ul>
     <ul><li>Values</li></ul>
     <ul><li>Financial Success</li></ul>
     <ul><li>Authority</li></ul>
     <ul><li>Trustworthiness</li></ul>
	 <ul><li>Intelligence</li></ul>
	 <ul><li>Suitability for hire or promotion</li></ul>
<p><h5>
Your personal presentation (communication skills and appearance) influences people’s behaviour toward you, including:
</h5></p>
<p><h5>
<ul><br>Complying with your request</ul>
<ul><br>Trusting you with information</ul> 
<ul><br>Giving you access to decision makers</ul>
<ul><br>Paying you a certain salary or fee for contracted business</ul>
<ul><br>Hiring you or purchasing your product </ul>


</h5></p>
<p>
<h3>Corporate Image<h3>
<h5>
For corporations and other organizations, image can affect the financial bottom line. Fortune Magazine’s annual ranking of the most admired companies has found a correlation between a company’s image and its profits. Companies can have the following benefits by creating a positive image:
<br>

<ul>
<br><h5>
    <ul><li>Larger market share</li></ul>
    <ul><li>Ability to charge a premium</li></ul>
    <ul><li>Ability to pull through tough times</li></ul>
    <ul><li>Greater attraction to talent</li></ul>
	<ul><li>Higher retention and productivity of people</li></ul>
   	<ul><li>Lower costs</li></ul>
    <ul><li>Better and favourable media coverage</li></ul>
	<ul><li>Higher returns for investors</li></ul>
	
	<ul>If a company’s image is not as good as it could be, the company may lose out on all of these benefits.</ul>
  </h5>
  </ul>

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
