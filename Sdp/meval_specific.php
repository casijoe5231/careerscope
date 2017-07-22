<?php
session_start();

    if(!isset($_SESSION['user'])){
        header("location:../login.php");
    }
	
//Connection Code
$db="careerscope";
$servername = "localhost";
$username = "root";
$password = "oracle";

// Create connection
$conn=($GLOBALS["___mysqli_ston"] = mysqli_connect($servername, $username, $password));  // Make Connection
	mysqli_select_db($GLOBALS["___mysqli_ston"], $db);                      // Select Database

// Check connection
if (!$conn) {
    die('Could not connect: ' . mysqli_error($GLOBALS["___mysqli_ston"]));
}
//echo "Connected successfully";

$goal_id=$_GET["id"];
$request_id=$_GET["request_id"];
$email=$_SESSION['user'][0];
$user=$_SESSION['user'][1];
$date = new DateTime();
$time_added = $date->format('Y-m-d H:i:s');

///values coming from form
$yesno=$_POST['yesno'];
$gap=$_POST['gap'];
$interest=$_POST['interest'];
$title=$_POST['title'];
$regular=$_POST['regular'];
$feedback=$_POST['feedback'];
///values coming from form ends

///Calculation for user entered data
if($yesno==='Yes')
{
	$value8=2;
}
elseif($yesno==='No')
{
	$value8=0;
}

if($gap==='Yes')
{
	$value9=2;
}
elseif($gap==='Some')
{
	$value9=1;
}
elseif($gap==='No')
{
	$value9=0;
}

if($interest==='High')
{
	$value10=2;
}
elseif($interest==='Little')
{
	$value10=1;
}
elseif($interest==='Not')
{
	$value10=0;
}

if($title==='Yes')
{
	$value11=2;
}
elseif($title==='No')
{
	$value11=1;
}

if($regular==='Yes')
{
	$value12=2;
}
elseif($regular==='Some')
{
	$value12=1;
}
elseif($regular==='No')
{
	$value12=0;
}
/////Calculation for user entered ends here
$mscore = $value8+$value9+$value10+$value11+$value12;
echo 'hi';
echo $goal_id;
echo $request_id;
////Insertion into database
$sql00="select * from goal_mentor_request where request_id IN('$request_id')";
$res00=mysqli_query($GLOBALS["___mysqli_ston"], $sql00);
$row00=mysqli_fetch_array($res00);

$sql1="select * from goals_completed where goal_id IN($goal_id)";
$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
$row1=mysqli_fetch_array($res1);

$sql2="update goal_hist SET mentor_name='$user', meval_date='$time_added', meval_score='$mscore' where goal_id IN('$goal_id')";
$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);

$sql3="update goals_completed SET mentor_eval='Yes' where goal_id IN('$goal_id')";
$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);

$sql4="insert into goalm_specific (goal_id,title,stud_email,stud_name,mentor_name,mentor_email,date_eval,yesno,syll_gap,interest,achieve,regular,feedback,m_score)values('$goal_id','$row1[title]','$row1[email]','$row00[stud_name]','$user','$email','$time_added','$value8','$value9','$value10','$value11','$value12','$feedback','$mscore')";
$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);

$sql5="update goal_mentor_request SET eval_stat='Yes' where request_id IN('$request_id')";
$res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);


if($res1 and $res2 and $res3 and $res4 and $res5)
{
	echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('$row1[title] Goal Successfully Evaluated');
    window.location.href='mentor_request.php';</SCRIPT>";
}
else
{
	echo "<SCRIPT LANGUAGE='JavaScript'>
    alert('$row1[title] Goal was not Evaluated');
    window.location.href='mentor_request.php';</SCRIPT>";
}
///Insertion into database ends here
?>