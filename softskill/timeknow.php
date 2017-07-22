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
										    <li><a>Time Management is viewed as not only a	college success strategy, but as a life success skill</a></li>

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
<div id="show">
  <img src="tm1.jpg" width="220" height="220">
      <img src="tm2.jpeg" width="230" height="220">
          <img src="tm3.jpg" width="220" height="220">
          <img src="tm4.jpg" width="220" height="220">
          <img src="maintime.jpeg" width="220" height="220">
          
 
  
  <h5>  <p>It seems that there is never enough time in the day. But, since we all get the same 24 hours, why is it that some people achieve so much more with their time than others? The answer lies in good time management.

The highest achievers manage their time exceptionally well. By using the time-management techniques in this section, you can improve your ability to function more effectively – even when time is tight and pressures are high.

Good time management requires an important shift in focus from activities to results: being busy isn’t the same as being effective. (Ironically, the opposite is often closer to the truth.)

Spending your day in a frenzy of activity often achieves less, because you’re dividing your attention between so many different tasks. Good time management lets you work smarter – not harder – so you get more done in less time.
</p> </h5>
<br>
<b><h3>What is “Time Management?”</h3></b>	
<p>
<h5>“Time management” refers to the way that you organize and plan how long you spend on specific activities.

It may seem counter-intuitive to dedicate precious time to learning about time management, instead of using it to get on with your work, but the benefits are enormous :
</h5></p>
<ul>
<br><h5>
    <ul><li>Greater productivity and efficiency.</li></ul>
   <ul><li>A better professional reputation.</li></ul>
    <ul><li>Less stress.</li></ul>
   <ul><li>Increased opportunities for advancement.</li></ul>
  <ul><li>Greater opportunities to achieve important life and career goals.</li></ul>
</h5>
  </ul>
<br>
<h3><b>Failing to manage your time effectively can have some very undesirable consequences:</b></h3>
<br><h5>
   <ul><li> Missed deadlines.</li></ul>
     <ul><li>Inefficient work flow.</li></ul>
     <ul><li>Poor work quality.</li></ul>
     <ul><li>A poor professional reputation and a stalled career.</li></ul>
     <ul><li>Higher stress levels.</li></ul>
	 </h5>
	 <br>

	 
<p><h5>
Spending a little time learning about time-management techniques will have huge benefits now – and throughout your career.    
    </h5></p>
  

<h3><b> Introduction:</b></h3>
<br>
<p><h5>
Time is fixed quantity, ever increasing with same rate. For every lifespan there are fixed sunshines, and it has been the same for all the time. Still many of us finds there time hard finding it difficult to complete there daily activities whereas some people achieves unimaginable accomplishments within a day. Every day there is something important, essential, interesting and something not worthy.
Time can not be managed, its 24 hours everyone gets every day. we can not add or remove an hour or two from a day. It is going to be same for all but what can be changed or improvised is how we utilize it. How can we make it beautiful and worth living.   
</h5></p>
<br>
<p><h5>
Humans have to fulfill certain desires, achieve decided goals and make their life worth living. Through time, we understand that not all of our dreams are achievable, not all of the desires can be fulfilled and not everything can be achieved mostly because we have less time to do it.
For instance, many of us have quit our co corricular activities like dancing, sketching, writing, exploring etc because we feel we don't have time for it or they are not producing anything though it was fun doing it.
</h5></p>
<br>
<p><h5>
There is a divinity in the action and the achievement of the life one ever dreamed about. It is possible to manage one-self to achieve much more than what we thought we ever could. With mere concentration we can burn as many things as 
</h5>
</p>
<br>
<h3><b>Time Management Factors</b></h3>
<br>
<p><h5>
Managing ourselves is thus important when time is constraint. Time does not stop for anyone; we have to match our pace with time. Future may show us the miracles of slow aging and prolonged life but it is a fairy tale for now. Being in stipulated time span and fast lifestyle we need to find our existence.  Our daily activities must be managed on daily basis provoking a healthy and stress free being.
Factors to enhance time management:
</h5></p>

<p><h5>
<br> <b>1.	Focus:</b>
<br>According to study, out of 100% of our work only 20% generates result whereas 80% is impact less. This is called as 80:20 rule described by Vilfredo Pareto. According to Pereto Principle, 80% of unfocussed effort generates 20% of the results. The remaining 80% of results are achieved with only 20% of the Focused effort.
In all day activities hardly few activities could get our attention, for most of the activities we either delay or just complete it selflessly. Honesty is key to achieve the concentration. Though it is difficult to be focused all the time but we can give ourselves more than we do now. Concentration and focusing can surely produce surprising results.<br>  
When it is needed to accomplish certain task, make sure that there is minimum disturbance. Switching off Phone, Internet can be a great help for the particular time. 
<br>
<br>
<b>2.	Planning/Scheduling:</b>
<br>Unplanned work is stressful and depressing, where as a planned activity brings joy and satisfaction. Hence it is essential to plan every day activities either after waking up or while going to bed. Avoid micro management which complicates situations but daily to-do list accomplishes many things. 
A man can be categorized in quadrants of time according to his perspective towards work. First quadrant stands for the emergency or very important work which makes you closer to your goals. Second quadrant is for the important and essential work which can be delayed but can’t be discarded. Third quad contains work which has little to do with goal and could be delayed or discarded where as fourth quad is for work unimportant and eliminative. Those who dwell mostly in 3rd and 4th quad generally waste their time in useless and unproductive things. <br>
Things which fall in 1st and 2nd quad may be difficult but with good planning can be accomplished easily. All the dreams, success and goals come in action as we plan most of our day to fall in 1st and 2nd quad.   
<br>
<br>
<b>3.	Habit:</b>
<br>Success is a habit. Though it is any dream, it can be accessed through certain set of habits. Habit is something which we do on regular basis consciously or unconsciously. It is uncomfortable for us not to practice our daily routine. What could be more splendid than revising our habits to work for us and towards our targets? There are bad and good habits. If you need to change one of our habits we just need to practice something else for certain time that it is stored in our unconscious mind just like brushing the teeth or checking phone.  We can cast a habit or eradicate in simple practice and consistency. Creating habits like planning, reading, making time for self, and improving consciousness could result in better time management. 
Its a habit to be early or on time, to plan for things and to work for it. To dream or to be successful or be triamphous, all of it is a habit. 
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
</html>