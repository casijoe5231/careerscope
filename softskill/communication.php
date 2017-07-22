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
										     <li><a>"Communication leads to community, that is, to understanding, intimacy and mutual valuing."</a></li>

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

    <img src="ci1.jpg" width="220" height="220">
      <img src="ci2.jpg" width="230" height="220">
          <img src="ci3.jpg" width="220" height="220">
          <img src="ci4.jpg" width="220" height="220">
          <img src="ci5.jpg" width="450" height="220">
    
 <div id="header">
<h1>Communication Skils</h1>
</div>





<p>

<h3>Think of how often you communicate with people during your day.</h3></p>

<p><h5>
You write emails, facilitate meetings, participate in conference calls, create reports, devise presentations, debate with your colleagues… the list goes on.</p>
<p>
We can spend almost our entire day communicating. So, how can we provide a huge boost to our productivity? We can make sure that we communicate in the clearest, most effective way possible.</p>
<p>
This is why the 7 Cs of Communication are helpful. The 7 Cs provide a checklist for making sure that your meetings [Add to My Personal Learning Plan] , emails [Add to My Personal Learning Plan] , conference calls [Add to My Personal Learning Plan] , reports [Add to My Personal Learning Plan] , and presentations [Add to My Personal Learning Plan] are well constructed and clear – so your audience gets your message.</p>
<p>
Every day has something with it which is stressful and if not managed with positive attitude adds up and makes our life depressing and frustrating. A man once tangled in these frustrations goes into never returning stage loosing deadlines for work, ill behaving, drug /smoke or alcohol addictions. Emotional breakdown, bad eating habits, headache, tiredness, anxiety, sleepy head, inactivity, heart attacks and blood pressure problems all can be related directly or indirectly to improper stress management.
</h5></p>




<h3>According to the 7 Cs, communication needs to be:</h3>
<p><h5>
Stress makes people to grow expand and lead their life the way they ever imagined but too much of stress is dangerous, it can make us loose the track or worse. In Gym exercising is helpful we do cardio or lift weights within our limit, but what if we strangle with the weights beyond our capacity? Or run on machine with speed way beyond our limit? Accidents are prone to happen. Similarly life stresses should also be in limit when exceeds may produce harmful results. 
Following are some of the strategies we must follow to grow in stressful world and enhance or endurance:
</h5></p>
<p class =ex><h5>
<ul><br>1.	<b>Clear:</b> When writing or speaking to someone, be clear about your goal or message. What is your purpose in communicating with this person? If you're not sure, then your audience won't be sure either.<br>To be clear, try to minimize the number of ideas in each sentence. Make sure that it's easy for your reader to understand your meaning. People shouldn't have to "read between the lines" and make assumptions on their own to understand what you're trying to say..</ul>
<ul><br>2.	<b>Concise:</b> When you are concise in your communication, you stick to the point and keep it brief. Your audience doesn't want to read six sentences when you could communicate your message in three.<br> <ul><li>Are there any adjectives or "filler words" that you can delete? You can often eliminate words like "for instance," "you see," "definitely," "kind of," "literally," "basically," or "I mean."</li></ul><br><ul><li>Are there any unnecessary sentences?</li></ul><br><ul><li>Have you repeated the point several times, in different ways?</li></ul>.</ul> 
<ul><br>3.	<b>Concrete:</b> When your message is concrete, then your audience has a clear picture of what you're telling them. There are details (but not too many!) and vivid facts, and there's laser-like focus. Your message is solid..</ul>
<ul><br>4.	<b>Correct:</b> When your communication is correct, it fits your audience. And correct communication is also error-free communication.<br> <ul><li>Do the technical terms you use fit your audience's level of education or knowledge?</li></ul><br><ul><li>Are all names and titles spelled correctly?</li></ul><br><ul><li>Have you checked your writing [Add to My Personal Learning Plan] for grammatical errors? Remember, spell checkers won't catch everything.</li></ul></ul>
<ul><br>5.	<b>Coherent:</b>When your communication is coherent, it's logical. All points are connected and relevant to the main topic, and the tone and flow of the text is consistent. </ul>
<ul><br>6.	<b>Complete:</b>In a complete message, the audience has everything they need to be informed and, if applicable, take action.<br><ul><li>Does your message include a "call to action," so that your audience clearly knows what you want them to do?</li></ul><br><ul><li>Have you included all relevant information – contact names, dates, times, locations, and so on?</li></ul>. </ul>
<ul><br>7.	<b>Courteous:</b> Courteous communication is friendly, open, and honest. There are no hidden insults or passive-aggressive tones. You keep your reader's viewpoint in mind, and you're empathetic to their needs. </ul>

</h5></p>
<p>
<h3>Key Points<h3>
<h5>
All of us communicate every day. The better we communicate, the more credibility we'll have with our clients, our boss, and our colleagues.<br>
Use the 7 Cs of Communication as a checklist for all of your communication. By doing this, you'll stay clear, concise, concrete, correct, coherent, complete, and courteous.<br>  
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
