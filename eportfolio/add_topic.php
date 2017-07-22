<?php
$host="localhost"; // Host name
$username="root"; // mysql username
$password=""; // mysql password
$db_name="test"; // Database name
$tbl_name="forum_question"; // Table name

// Connect to server and select database.
($GLOBALS["___mysqli_ston"] = mysqli_connect("$host",  "$username",  "$password"))or die("cannot connect");
mysqli_select_db($GLOBALS["___mysqli_ston"], $db_name)or die("cannot select DB");

// get data that sent from form
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$name=$_POST['name'];
$email=$_POST['email'];

$datetime=date("d/m/y h:i:s"); //create date time

$sql="INSERT INTO $tbl_name(topic, detail, name, email, datetime)VALUES('$topic', '$detail', '$name', '$email', '$datetime')";
$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);

if($result){
?>
<script type="text/javascript">
		    alert("Successfully Topic uploaded");
			window.location="main_forum.php";
			
</script>
<?php
}
else {
?>
<script type="text/javascript">
		    alert("ERROR in adding Topic");
			window.location="main_forum.php";
			
</script>
<?php
}
((is_null($___mysqli_res = mysqli_close($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
?>