<?php
$host="localhost"; // Host name
$username="root"; // mysql username
$password=""; // mysql password
$db_name="test"; // Database name
$tbl_name="forum_answer"; // Table name

// Connect to server and select databse.
($GLOBALS["___mysqli_ston"] = mysqli_connect("$host",  "$username",  "$password"))or die("cannot connect");
mysqli_select_db($GLOBALS["___mysqli_ston"], $db_name)or die("cannot select DB");

// Get value of id that sent from hidden field
$id=$_POST['id'];

// Find highest answer number.
$sql="SELECT MAX(a_id) AS Maxa_id FROM $tbl_name WHERE question_id='$id'";
$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$rows=mysqli_fetch_array($result);

// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1
if ($rows) {
$Max_id = $rows['Maxa_id']+1;
}
else {
$Max_id = 1;
}

// get values that sent from form
$a_name=$_POST['a_name'];
$a_email=$_POST['a_email'];
$a_answer=$_POST['a_answer'];

$datetime=date("d/m/y H:i:s"); // create date and time

// Insert answer
$sql2="INSERT INTO $tbl_name(question_id, a_id, a_name, a_email, a_answer, a_datetime)VALUES('$id', '$Max_id', '$a_name', '$a_email', '$a_answer', '$datetime')";
$result2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);

if($result2){
echo "<a href='view_topic.php?id=".$id."'>View your answer</a>";
// If added new answer, add value +1 in reply column
$tbl_name2="forum_question";
$sql3="UPDATE $tbl_name2 SET reply='$Max_id' WHERE id='$id'";
$result3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);

}
else {
echo "ERROR";
}

((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>
