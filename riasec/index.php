<?php
    session_start();
$con=mysqli_connect("localhost","root","","careerscope");

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }

    if ($_SESSION['usertype']!=1) {
        if ($_SESSION['usertype']!=2) {
            header("location:../login.php");
        }
    }
    include "../includes/connection2.php";

    $emaill=$_SESSION['user'][0];
    
    date_default_timezone_set('Asia/Calcutta');
    $datetime = date("F j, Y, g:i a");
    $timesql = date("Y-m-d H:i:s"); 
    $sql1="insert into activity(email,menu_accessed,timesql) values('$emaill','Self Assessment','$timesql')";
    $res=mysqli_query($con,$sql1)or die("query not executed");
    $stmt = "SELECT * FROM riasec_qus;";
    $result = mysqli_query($con,$stmt);


?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <!-- Favicon -->
        <link href="../images/favicon.ico" rel="shortcut icon"/> 

        <title>BYB | Blank </title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
        <link rel='stylesheet' id='camera-css'  href='../css/camera.css' type='text/css' media='all'>

        <link rel="stylesheet" type="text/css" href="../css/slicknav.css">
        <link rel="stylesheet" href="../css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../css/style2.css">


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
        <!--script type="text/javascript" src="../js/jquery.nav.js"></script-->
        <!--required scripts and css-->
        <link rel="stylesheet" type="text/css" href="css/raisec.css" />
        <script type=text/javascript src="js/jQuery/jquery-2.1.1.min.js"></script>
        <script type=text/javascript >
        var clickarray = new Array();
        for(var i=0;i<9;i++)
        {
        clickarray[i]=new Array();
        }
        </script>
        <script type=text/javascript src="js/clicksense.js"></script>
        <script type=text/javascript src="js/presubmit.js"></script>
        <script type=text/javascript>
        $(document).ready(function(){
            var pos=1;
            var tmp,batch;
            //initializing display of every element to none
            for(var i=2;i<9;i++)
            {
                batch="#batch_"+i;
                $(batch).css({
                    display:"none"});
            }
            //animation on next button
            $("#btn-next").click(function(){
                if(pos<9){
                    tmp="#batch_"+(pos+1);
                    $(tmp).css({
                        display:"block"});
                    if(pos<8)
                    {
                    tmp="#batch_"+pos;
                    $(tmp).css({
                        display:"none"});
                    pos++;
                    }
                }
                //document.getElementById("demo3").innerHTML = pos;
            });
            //animation on back button
            $("#btn-prev").click(function(){
                if(pos>0){
                    tmp="#batch_"+(pos-1);
                    $(tmp).css({
                        display:"block"});
                    if(pos>1)
                    {
                    tmp="#batch_"+pos;
                    $(tmp).css({
                        display:"none"});
                    pos--;
                    }
                }
                //document.getElementById("demo3").innerHTML = pos;
            });
            //document.getElementById("demo3").innerHTML = pos;
        });
        </script>
        <!--/required script and css-->
        



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



        <!-- Main Content Here -->
        <div class="container">

        <div style="padding:10px;" class="panel panel-default">
            <div class="row">
                <div class="col-sm-2">
                    <h5>Welcome <?php echo $_SESSION['user'][1]; ?>,</h5>
                </div>
                <div class="col-sm-10">
                    <div class="col-sm-8"></div>

                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../login.php"><span class="glyphicon glyphicon-home"></span> </a></div>
                    <div class="col-sm-2">
                    <a class="btn btn-default btn-block" href="../logout.php">Logout</a></div>
                
                </div>
            </div>
        </div>
        <h1>Holland Test</h1>
        
        <div class="row">
            
            <div class="col-sm-12">
            <center>
                <!--content goes here-->
                <div class="row">
                	
                    <?php
                            for($i=1;$i<=8;$i++)
                            {
                            echo'<div class="container-holland" id="batch_'.$i.'">';
                            echo    '<div class="option-box" id="here'.$i.'">';
                                
                                for($j=1;$j<=6;$j++)
                                {
                                    $row=mysqli_fetch_array($result);
                                    echo '<div class="options" id="'.$i.$j.'" onclick="clicksense(this,'.$i.','.$j.');" style="background-image:url(imgop/img_'.$i.$j.'.jpg)">';
                                    echo '<div class="option-text" id="optext_'.$j.'"><p class="option-text-str">'.$row["Options"].'</p></div>';
                                    echo '</div>';
                                }
                                
                                

                            echo    '</div>';
                            echo    '<div class="option-box" id="there'.$i.'">';
                            echo    '</div>';
                            echo'</div>';
                            }
                            ?>
                            <div style="width:870px;margin-left:14px;" id="row">
                                <div id="nav-btn">
                                <button type="button" class="btn btn-default" id="btn-prev">&laquo; Back</button>
                                <button type="button" class="btn btn-default" id="btn-next">Next &raquo;</button>
                                </div>
                                <form action="holland_sub.php" id="form-send" method="post">
                                <input id="r" name="r" type="hidden" value="" />
                                <input id="i" name="i" type="hidden" value="" />
                                <input id="a" name="a" type="hidden" value="" />
                                <input id="s" name="s" type="hidden" value="" />
                                <input id="e" name="e" type="hidden" value="" />
                                <input id="c" name="c" type="hidden" value="" />
                                <button type="button" class="btn btn-primary" onclick="presubmit(clickarray)" id="btn-send" >Submit</button>
                                </form>
                            </div>


                </div>
            </center>
            </div>
        </div>














        </div>
        <!-- End of the main content -->
        
        

  <div class="lineBlack">
            <div class="container">
                <div class="row downLine">
                    <div class="col-md-12 text-right">
                        <!--input  id="searchPattern" type="search" name="pattern" value="Search the Site" onblur="if(this.value=='') {this.value='Search the Site'; }" onfocus="if(this.value =='Search the Site' ) this.value='';this.style.fontStyle='normal';" style="font-style: normal;"/-->
                        <!--    <input  id="searchPattern" type="search" placeholder="Search the Site"/><i class="glyphicon glyphicon-search" style="font-size: 13px; color:#a5a5a5;" id="iS"></i>
</div>-->
                        <div class="col-md-6 text-left copy">
                            <p>Copyright &copy; 2014 Build Your Brand. All Rights Reserved.</p>
                        </div>
                        <div class="col-md-6 text-right dm">
                            <ul id="downMenu">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>


