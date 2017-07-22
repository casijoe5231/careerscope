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
$challenge=$_POST['challenge'];
$box=$_POST['box'];
$place=$_POST['place'];
$help=$_POST['help'];
$skill=$_POST['skill'];
$study=$_POST['study'];
$feedback=$_POST['feedback'];
///values coming from form ends
$mscore=0;
///Calculation for user entered data
$mscore = $yesno+$challenge+$box+$place+$help+$skill+$study;
/////Calculation for user entered ends here

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

$sql4="insert into goalm_realistic (goal_id,title,stud_name,stud_email,mentor_name,mentor_email,date_eval,yesno,challenge,box,place,help,skill,study,feedback,mscore)values('$goal_id','$row1[title]','$row00[stud_name]','$row1[email]','$user','$email','$time_added','$yesno','$challenge','$box','$place','$help','$skill','$study','$feedback','$mscore')";
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