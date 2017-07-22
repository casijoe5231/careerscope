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
<p>
Being an amazing motivator takes talent and thought. 
You can become a great motivational speaker by following several important steps.</p>
<p>
When an event host wants to choose motivational speakers for public speaking, 
there are many factors that he or she will consider. 
Reputation will be one of the biggest factors in making the decision. 
If you want to be a successful motivational speaker for a large audience,
 you need to develop a great reputation as a motivator. In order to do this, 
 you need to practice and learn how to deliver great speeches and presentations that will really keep people engaged and get them fired up. 
You can become an amazing motivator by following a few steps and working hard to craft your talent.
</p>
<p><b>Work on Your Public Speaking Skills</b></p>
<p>No matter what you plan to say in a presentation or speech, 
if you aren't able to convey it well to your audience,
 that message will get lost. Therefore,
 it is essential to become a strong public speaker. 
 When people choose motivational speakers for public speaking, 
 they want to find someone who can really relate to the audience.
 It is impossible to relate to the audience if you don't have the ability to speak well to them.
 Public speaking certainly isn't easy. 
 It will require you to get over some fears that are inherent when it comes to speaking in front of a large group. 
 Many famous speakers had fears when it came to public speaking.
 By practicing their public speaking, they overcame these fears and delivered great speeches.
 </p>
 <p>
 You can hone your public speaking skills through a lot of guided practice. 
 Taping yourself speaking is one great way to help with this. 
 You can watch your speeches as if you are an audience member, 
 and this can help you to evaluate the mistakes and correct them. 
 You need to pay attention to your vocal projection and your tones. 
 If you are monotone, you won't engage your audience. Similarly, 
 if you are too loud or too soft, your audience won't pay attention.
 You also need to make eye contact with the audience and work on good posture.
 Most of all, you need to sound natural. If your speech is forced, people won't listen.
 </p>
 <p><b>Have a Great Story to Tell</b></p>
 <p>
 Even if you have the greatest voice and delivery, you won't connect to your audience if you don't
 have anything meaningful to say. In order to be an amazing motivator,
 you need to find a great story that has a message. 
 The best motivators take their messages from personal experiences. 
 You have to be able to show your audience that your message has meaning to you. 
 The first step here is to think of your message. What do you want to share with your audience?
 Once you have this message, gather all of your life experiences that led you to this message. 
 Make sure you are honest when you deliver this. Even if you have great control of your voice, 
 your audience will notice if you aren't sincere.
</p>
<p><b>Get and Understand Feedback from Others</b></p>
<p>In order to be a great motivational speaker, you need to know how others view you. If you think you have a great message and great delivery, this won't mean much if your audience finds you dull. Therefore, you should consider getting a mentor who can provide honest feedback. It's also important to seek out the thoughts and reactions of your audiences. Follow up each presentation with an anonymous survey. People are more likely to tell the truth without having to face you. Once you get their feedback, you can adapt your presentation skills. Don't feel like you have to be rigid in the way you deliver. This can also help you better recognize the feedback your audience gives while you are performing. If people are yawning or talking during your presentation, then this is a type of feedback that tells you that you aren't engaging them.  Being flexible is a key to become a motivational speaker. It will allow you to make adjustments when you are giving a speech and you see the audience is not engaged. 

 

Being a great motivator is not an easy feat. It takes hard work and practice to get you to the level of amazing motivator. When people choose motivational speakers for public speaking, they are looking for someone who can truly get their audience motivated. In order to get to this level, you need to practice a lot and work on several key aspects of your speaking. By following the important steps listed above, you can make yourself into a great motivator that people will flock to see. While you may be the motivator, the feeling you'll get when you see that inspired crowd will make you even more motivated to spread your great messages. 

</p>
 

 

