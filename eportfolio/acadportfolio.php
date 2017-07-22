<?php
include '../connection1.php';
session_start();
$email=$_SESSION['user'][0];

$objective = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['objective']);
$skills = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['skills']);
$special = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['special']);
$location = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['location']);
$remuneration = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['remuneration']);
$period = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['period']);
$company = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['company']);
$title = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['title']);
$area = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['area']);
$cskills = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['cskills']);
$industry = implode(",",$_POST['industry']);
$certifications = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['certifications']);
$achievements = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['achievements']);
$language = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['language']);
$hobbies = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['hobbies']);
$school1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school1']);
$board1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board1']);
$stream1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['stream1']);
$total1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total1']);
$outof1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof1']);
$percent1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent1']);
$pass1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass1']);

$allowedExts = array("pdf","jpg","png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (($_FILES["file"]["size"] < 5000000)
&& in_array($extension, $allowedExts))
{
	  mkdir("../photo/$email");
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $img="../photo/$email/" . $_FILES["file"]["name"]);
}

$sql="insert into acadportfolio(email,objective,skills,special,location,remuneration,period,company,title,area,cskills,industry,certifications,achievements,language,hobbies,file,status) values('$email','$objective','$skills','$special','$location','$remuneration','$period','$company','$title','$area','$cskills','$industry','$certifications','$achievements','$language','$hobbies','$img',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="insert into qualification_master(email,ssc_hsc_diploma,institute,board,stream,total,outof,percent,yearofpassing,status) values('$email','SSC','$school1','$board1','$stream1','$total1','$outof1','$percent1','$pass1',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="update istudent set status=1 where email='$email'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

if($_POST['diploma']=='No')
{
$school2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school2']);
$board2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board2']);
$stream2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['stream2']);
$total2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total2']);
$outof2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof2']);
$percent2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent2']);
$pass2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass2']);
$cet = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['cet']);

$sql="insert into qualification_master(email,ssc_hsc_diploma,institute,board,stream,total,outof,percent,yearofpassing,cet_score,status) values('$email','HSC','$school2','$board2','$stream2','$total2','$outof2','$percent2','$pass2','$cet',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
}

if($_POST['diploma']=='Yes')
{
$school3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school3']);
$board3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board3']);
$stream3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['stream3']);
$total3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total3']);
$outof3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof3']);
$percent3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent3']);
$pass3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass3']);

$sql="insert into qualification_master(email,ssc_hsc_diploma,institute,board,stream,total,outof,percent,yearofpassing,cet_score,status) values('$email','Diploma','$school3','$board3','$stream3','$total3','$outof3','$percent3','$pass3',0,0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
}

if($_POST['graduation']=='First year')
{
$school4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school4']);
$board4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board4']);
$specialisation4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['specialisation4']);
$oddmarks4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddmarks4']);
$oddoutof4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddoutof4']);
$evenmarks4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenmarks4']);
$evenoutof4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenoutof4']);
$total4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total4']);
$outof4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof4']);
$percent4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent4']);
$pass4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass4']);

$sql="insert into graduation_master(year,email,academicyear,institute,university,specialisation,oddsem,outof1,evensem,outof2,totalmarks,totaloutof,percent,yearofpassing,status) values('1','$email','First year','$school4','$board4','$specialisation4','$oddmarks4','$oddoutof4','$evenmarks4','$evenoutof4','$total4','$outof4','$percent4','$pass4',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
}

if($_POST['graduation']=='Second year')
{
$school5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school5']);
$board5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board5']);
$specialisation5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['specialisation5']);
$oddmarks5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddmarks5']);
$oddoutof5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddoutof5']);
$evenmarks5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenmarks5']);
$evenoutof5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenoutof5']);
$total5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total5']);
$outof5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof5']);
$percent5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent5']);
$pass5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass5']);

$school6 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school6']);
$board6 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board6']);
$specialisation6 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['specialisation6']);
$oddmarks6 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddmarks6']);
$oddoutof6 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddoutof6']);
$evenmarks6 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenmarks6']);
$evenoutof6 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenoutof6']);
$total6 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total6']);
$outof6 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof6']);
$percent6 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent6']);
$pass6 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass6']);

$sql="insert into graduation_master(year,email,academicyear,institute,university,specialisation,oddsem,outof1,evensem,outof2,totalmarks,totaloutof,percent,yearofpassing,status) values('2','$email','Second year','$school5','$board5','$specialisation5','$oddmarks5','$oddoutof5','$evenmarks5','$evenoutof5','$total5','$outof5','$percent5','$pass5',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="insert into graduation_master(year,email,academicyear,institute,university,specialisation,oddsem,outof1,evensem,outof2,totalmarks,totaloutof,percent,yearofpassing,status) values('1','$email','First year','$school6','$board6','$specialisation6','$oddmarks6','$oddoutof6','$evenmarks6','$evenoutof6','$total6','$outof6','$percent6','$pass6',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
}

if($_POST['graduation']=='Third year')
{
$school7 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school7']);
$board7 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board7']);
$specialisation7 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['specialisation7']);
$oddmarks7 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddmarks7']);
$oddoutof7 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddoutof7']);
$evenmarks7 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenmarks7']);
$evenoutof7 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenoutof7']);
$total7 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total7']);
$outof7 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof7']);
$percent7 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent7']);
$pass7 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass7']);

$school8 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school8']);
$board8 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board8']);
$specialisation8 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['specialisation8']);
$oddmarks8 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddmarks8']);
$oddoutof8 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddoutof8']);
$evenmarks8 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenmarks8']);
$evenoutof8 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenoutof8']);
$total8 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total8']);
$outof8 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof8']);
$percent8 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent8']);
$pass8 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass8']);

$school9 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school9']);
$board9 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board9']);
$specialisation9 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['specialisation9']);
$oddmarks9 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddmarks9']);
$oddoutof9 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddoutof9']);
$evenmarks9 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenmarks9']);
$evenoutof9 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenoutof9']);
$total9 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total9']);
$outof9 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof9']);
$percent9 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent9']);
$pass9 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass9']);

$sql="insert into graduation_master(year,email,academicyear,institute,university,specialisation,oddsem,outof1,evensem,outof2,totalmarks,totaloutof,percent,yearofpassing,status) values('3','$email','Third year','$school7','$board7','$specialisation7','$oddmarks7','$oddoutof7','$evenmarks7','$evenoutof7','$total7','$outof7','$percent7','$pass7',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="insert into graduation_master(year,email,academicyear,institute,university,specialisation,oddsem,outof1,evensem,outof2,totalmarks,totaloutof,percent,yearofpassing,status) values('2','$email','Second year','$school8','$board8','$specialisation8','$oddmarks8','$oddoutof8','$evenmarks8','$evenoutof8','$total8','$outof8','$percent8','$pass8',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="insert into graduation_master(year,email,academicyear,institute,university,specialisation,oddsem,outof1,evensem,outof2,totalmarks,totaloutof,percent,yearofpassing,status) values('1','$email','First year','$school9','$board9','$specialisation9','$oddmarks9','$oddoutof9','$evenmarks9','$evenoutof9','$total9','$outof9','$percent9','$pass9',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
}

if($_POST['graduation']=='Fourth year')
{
$school0 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school0']);
$board0 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board0']);
$specialisation0 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['specialisation0']);
$oddmarks0 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddmarks0']);
$oddoutof0 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddoutof0']);
$evenmarks0 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenmarks0']);
$evenoutof0 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenoutof0']);
$total0 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total0']);
$outof0 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof0']);
$percent0 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent0']);
$pass0 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass0']);

$school11 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school11']);
$board11 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board11']);
$specialisation11 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['specialisation11']);
$oddmarks11 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddmarks11']);
$oddoutof11 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddoutof11']);
$evenmarks11 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenmarks11']);
$evenoutof11 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenoutof11']);
$total11 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total11']);
$outof11 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof11']);
$percent11 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent11']);
$pass11 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass11']);

$school12 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school12']);
$board12 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board12']);
$specialisation12 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['specialisation12']);
$oddmarks12 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddmarks12']);
$oddoutof12 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddoutof12']);
$evenmarks12 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenmarks12']);
$evenoutof12 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenoutof12']);
$total12 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total12']);
$outof12 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof12']);
$percent12 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent12']);
$pass12 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass12']);

$school22 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school22']);
$board22 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board22']);
$specialisation22 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['specialisation22']);
$oddmarks22 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddmarks22']);
$oddoutof22 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddoutof22']);
$evenmarks22 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenmarks22']);
$evenoutof22 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenoutof22']);
$total22 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total22']);
$outof22 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof22']);
$percent22 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent22']);
$pass22 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass22']);

$sql="insert into graduation_master(year,email,academicyear,institute,university,specialisation,oddsem,outof1,evensem,outof2,totalmarks,totaloutof,percent,yearofpassing,status) values('4','$email','Fourth year','$school0','$board0','$specialisation0','$oddmarks0','$oddoutof0','$evenmarks0','$evenoutof0','$total0','$outof0','$percent0','$pass0',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="insert into graduation_master(year,email,academicyear,institute,university,specialisation,oddsem,outof1,evensem,outof2,totalmarks,totaloutof,percent,yearofpassing,status) values('3','$email','Third year','$school11','$board11','$specialisation11','$oddmarks11','$oddoutof11','$evenmarks11','$evenoutof11','$total11','$outof11','$percent11','$pass11',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="insert into graduation_master(year,email,academicyear,institute,university,specialisation,oddsem,outof1,evensem,outof2,totalmarks,totaloutof,percent,yearofpassing,status) values('2','$email','Second year','$school12','$board12','$specialisation12','$oddmarks12','$oddoutof12','$evenmarks12','$evenoutof12','$total12','$outof12','$percent12','$pass12',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="insert into graduation_master(year,email,academicyear,institute,university,specialisation,oddsem,outof1,evensem,outof2,totalmarks,totaloutof,percent,yearofpassing,status) values('1','$email','First year','$school22','$board22','$specialisation22','$oddmarks22','$oddoutof22','$evenmarks22','$evenoutof22','$total22','$outof22','$percent22','$pass22',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
}

if($_POST['graduation']=='Fifth year')
{
$school33 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school33']);
$board33 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board33']);
$specialisation33 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['specialisation33']);
$oddmarks33 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddmarks33']);
$oddoutof33 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddoutof33']);
$evenmarks33 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenmarks33']);
$evenoutof33 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenoutof33']);
$total33 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total33']);
$outof33 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof33']);
$percent33 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent33']);
$pass33 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass33']);

$school43 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school43']);
$board43 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board43']);
$specialisation43 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['specialisation43']);
$oddmarks43 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddmarks43']);
$oddoutof43 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddoutof43']);
$evenmarks43 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenmarks43']);
$evenoutof43 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenoutof43']);
$total43 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total43']);
$outof43 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof43']);
$percent43 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent43']);
$pass43 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass43']);

$school44 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school44']);
$board44 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board44']);
$specialisation44 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['specialisation44']);
$oddmarks44 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddmarks44']);
$oddoutof44 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddoutof44']);
$evenmarks44 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenmarks44']);
$evenoutof44 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenoutof44']);
$total44 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total44']);
$outof44 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof44']);
$percent44 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent44']);
$pass44 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass44']);

$school45 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school']);
$board45 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board']);
$specialisation45 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['specialisation']);
$oddmarks45 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddmarks45']);
$oddoutof45 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddoutof45']);
$evenmarks45 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenmarks45']);
$evenoutof45 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenoutof45']);
$total45 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total45']);
$outof45 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof45']);
$percent45 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent45']);
$pass45 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass45']);

$school55 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['school55']);
$board55 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['board55']);
$specialisation55 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['specialisation55']);
$oddmarks55 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddmarks55']);
$oddoutof55 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['oddoutof55']);
$evenmarks55 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenmarks55']);
$evenoutof55 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['evenoutof55']);
$total55 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['total55']);
$outof55 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['outof55']);
$percent55 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['percent55']);
$pass55 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['pass55']);

$sql="insert into graduation_master(year,email,academicyear,institute,university,specialisation,oddsem,outof1,evensem,outof2,totalmarks,totaloutof,percent,yearofpassing,status) values('5','$email','Fifth year','$school33','$board33','$specialisation33','$oddmarks33','$oddoutof33','$evenmarks33','$evenoutof33','$total33','$outof33','$percent33','$pass33',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="insert into graduation_master(year,email,academicyear,institute,university,specialisation,oddsem,outof1,evensem,outof2,totalmarks,totaloutof,percent,yearofpassing,status) values('4','$email','Fourth year','$school43','$board43','$specialisation43','$oddmarks43','$oddoutof43','$evenmarks43','$evenoutof43','$total43','$outof43','$percent43','$pass43',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="insert into graduation_master(year,email,academicyear,institute,university,specialisation,oddsem,outof1,evensem,outof2,totalmarks,totaloutof,percent,yearofpassing,status) values('3','$email','Third year','$school44','$board44','$specialisation44','$oddmarks44','$oddoutof44','$evenmarks44','$evenoutof44','$total44','$outof44','$percent44','$pass44',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="insert into graduation_master(year,email,academicyear,institute,university,specialisation,oddsem,outof1,evensem,outof2,totalmarks,totaloutof,percent,yearofpassing,status) values('2','$email','Second year','$school45','$board45','$specialisation45','$oddmarks45','$oddoutof45','$evenmarks45','$evenoutof45','$total45','$outof45','$percent45','$pass45',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");

$sql="insert into graduation_master(year,email,academicyear,institute,university,specialisation,oddsem,outof1,evensem,outof2,totalmarks,totaloutof,percent,yearofpassing,status) values('1','$email','First year','$school55','$board55','$specialisation55','$oddmarks55','$oddoutof55','$evenmarks55','$evenoutof55','$total55','$outof55','$percent55','$pass55',0)";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql)or die("query not executed");
}


if($res)
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('You have registered successfully.', function (e) {
		window.location.href='newindex.php';
		});</SCRIPT>";
	}
	else
	{
		echo "<html><head><script src='../js/alertify.min.js'></script>
		<link rel='stylesheet' href='../css/alertify.core.css' />
		<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
		echo "<SCRIPT LANGUAGE='JavaScript'>
		alertify.alert('Error occured. Being redirected to form.', function (e) {
		window.location.href='register.php';
		});</SCRIPT>";
	}
?>