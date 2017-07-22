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
										     <li><a>"In times of stress, the best thing we can do for each other is to listen with our ears and our hearts and to be assured that our questions are just as important as our answers."</a></li>

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

    <img src="st1.jpg" width="220" height="220">
      <img src="st2.jpg" width="230" height="220">
          <img src="st3.jpg" width="220" height="220">
          <img src="st4.jpg" width="220" height="220">
          <img src="st5.jpg" width="450" height="220">
		  
<div id="header">
<h1>Stress Management</h1>
</div>


<div id= "header"> <img src="  st6.jpg " alt="Mountain View" style="width:600px; height:250px;" >
</div>
<h2> Introduction:</h2>

<h5>
<p>

Stress is the responsive feeling generated due to absorption of external events. When exposed to abnormal situations we tend to think possible reactions which may cause tension hence stress. While going for an interview or preparing for exams, during oral exams, performing on stage all these activities causes us to think about it. Would I be able to answer correctly? How would be the question paper? Would I be able to perform? What if it is not interesting? Stress is bound to happen to all of us. It’s us how we take it and respond to it. 
</p>

<p>
Stresses can be either good or bad, it depends on the perspective and situations, but getting selected for a job or finding a best match in relationship produces happiness also the stress. Such a stress is called as Eustress which are though considered as good. The other kind of stress which creates depression or instant sadness for instance death or loved ones or failing in exam are called as acute or chronic stress. Causes for acute or chronic stress can instantaneous or long term, all depends on situations. A hectic work day or same repetitive schedule can produce such stress. These are dreadful and may result in frustration, depression, and worst is suicide.
</p>
<p>
Stress in general, is the cause for every change that occurs, like if we want to change ourselves we have to go through change. In gym we lift weights, run on machines and produce physical stress to get better in shape and size. Similarly if we wish to develop our skills, capabilities we need to go through stress, a lot of stresses. All the excitement, interesting things come through stress. For instance, rappelling can be dangerous but interesting. Similarly performing on stage, choosing a sport, facing an interview or presenting in a seminar, all of it is risky, risk of failing the task or not up to the mark but heading it with confidence creates history. Hence not all the time stress is stressful, it is actually the base to grow and enhance the skills. We have seen people with great talent and skill sets but just their inability of facing a crowd or commercializing themselves hinders them from growing or improving. These people just can’t take any stress, though they enjoy their art. Inability to work under stress causes depression and blinds the skills and capabilities.
</p>
<p>
Though it is easy to read about stress management it is really difficult to go through the tough times producing stresses. It is difficult to get over with a loss of a year, it’s depressing to manage boring work schedule, coping up with seniors or managers or professors. The stance of life is fast and still pacing up, it’s difficult as sometimes we find ourselves tangled up in situations which breaks us and we start behaving abnormal.
</p>
<p>
Every day has something with it which is stressful and if not managed with positive attitude adds up and makes our life depressing and frustrating. A man once tangled in these frustrations goes into never returning stage loosing deadlines for work, ill behaving, drug /smoke or alcohol addictions. Emotional breakdown, bad eating habits, headache, tiredness, anxiety, sleepy head, inactivity, heart attacks and blood pressure problems all can be related directly or indirectly to improper stress management.
</p>




<p>
Stress may cause you to have physiological, behavioral or even psychological effects.Physiological hormone release triggers your fight or flight response. These hormones help you to either fight harder or run faster. They
increase heart rate, blood pressure, and sweating. Stress has been tied to heart disease. Because of the increase in heart rate and blood pressure, prolonged stress increases the tension that is put on the arteries. It also affects your immune system which is why cold and flu illness 
usually show up during exams, Behavioral it may cause you to be jumpy, excitable,or even irritable. The effects of stress may cause some people to drink or smoke heavily, neglect exercise or proper nutrition, or over use either the television or the computer.Psychological–the response to stress may decrease your ability to work or interact effectively with other people, and be less able to make good decisions.
Stress has also been known to play a part in anxiety and depression.
</p>

<h2>Stress management Strategies:</h2>
<p><h5>
Stress makes people to grow expand and lead their life the way they ever imagined but too much of stress is dangerous, it can make us loose the track or worse. In Gym exercising is helpful we do cardio or lift weights within our limit, but what if we strangle with the weights beyond our capacity? Or run on machine with speed way beyond our limit? Accidents are prone to happen. Similarly life stresses should also be in limit when exceeds may produce harmful results. 
Following are some of the strategies we must follow to grow in stressful world and enhance or endurance:
</h5></p>
<p class =ex><h5>
<ul><br>1.	<b>Be Positive:</b> Stresses are nothing but what we think. If our boss calls us for meeting in half hour, we start thinking about it. What could be the reason? We may assume some project deadlines which might not have met or some unknown reason which is scary again. This causes us to waste time on thinking useless things and respond. No matter what the senior called us for, but being negative about it took our time with unpleasant memories which actually didn’t happen but we imagined it.  Being positive about it would have least saved the time.</ul>
<ul><br>2.	<b>Be Brave:</b> Most of the time we hide our feelings and tolerate the nonsense of the world. It is better if senior assigns a work which is way beyond the capacity to let him know that. If a situation is too much exhaustive or stressful we must strike it with confidence. Presentations, orals or stage performance what so ever may be the situation handle it with bravery.</ul> 
<ul><br>3.	<b>Attitude:</b> Being Positive and brave creates the winners attitude. When we can’t see any way forward our attitude leads us towards our destiny. Attitude can be referred to as the mindset one has which accounts for his unconscious activities. Better attitude can be developed through helping others, reading, examining our self and our daily activities, setting up new goals and heights for ourselves and bringing happiness and joy in our surroundings. Attitude is what we can do for our world not what we get out of it.</ul>
<ul><br>4.	<b>Friends and family:</b> Family and friends are the gifts from God, maintaining a healthy relation with them have their benefits. There should be a self time but we should not devoid ourselves from the company of friends and family. They can save us most of the time and hardest of the situation. With friends a worst movie turns into comedy act and few moments shared with our parents can give us sense of love and care. Share love and happiness among your colleagues and friends and be good to them. It will come back to you and you will find strange helping hands not strange after all.</ul>
<ul><br>5.	<b>Time Management:</b> Do not delay our daily work, which causes unseen tension and may lead to stressful times. Don’t postpone or procrastinate the decided task unless its inhuman. Complete most of the work sooner as possible and work on time management to enjoy the free time. </ul>
<ul><br>6.	<b>Habits:</b> Depression and frustration can become a habit, when exposed to any stressful situation our attitude defines who we think we are and our habit justifies it. Make habit of smiling, laughing on our problems and keeping focused with majority of issues. Plan occasionally for the outings and keep the life going for the betterment. Rule out the hectic and repetitive work schedule. </ul>
</h5></p>
<p><h5>
Life is something which no one can explain or understand but everyone can enjoy things they like to do within it. Grow, expand make our name and fame, earn a lot of money but have fun doing that. Don’t fall for the rat race or dog fight, ignore the nonsense with maturity and be a greater person at heart. Help others and love everyone. 
  
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
