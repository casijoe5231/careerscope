<?php

//database connection
$connection = ($GLOBALS["___mysqli_ston"] = mysqli_connect("localhost", "root", ""));
if(!$connection){
	die("Database connection failed".mysqli_error($GLOBALS["___mysqli_ston"]));
}

//select db
$db_select = mysqli_select_db($connection, college_automation);

if(!$db_select){
	die("Connection to database failed".mysqli_error($GLOBALS["___mysqli_ston"]));
}

$join_yr=$_GET['join_yr'];
$stream=$_GET['stream'];
if($stream=='Computer_Engineering')
$stream1 = "COMP";
if($stream=='Information_Technology')
$stream1 = "IT";
if($stream=='Electronics_And_Telecommunication')
$stream1 = "EXTC";
if($stream=='Mechanical_Engineering')
$stream1 = "MECH";
if($stream=='Mechanical_Engineering_1')
$stream1 = "MECH";

$names=mysqli_query($GLOBALS["___mysqli_ston"], "select ldap_username,name from student_details where (stream LIKE '%$stream%' OR stream LIKE '%$stream1%') and SUBSTRING( Stud_Id, 1, 4 ) ='$join_yr'");

echo '<select name="UserName" id="username" size="0" >';
	while($line1=mysqli_fetch_array($names, MYSQLI_NUM))
	{
		$open_sc=mysqli_query($GLOBALS["___mysqli_ston"], "select Category from student_details where Stud_id=$line1[0]");
	        $open_sc_rs= mysqli_fetch_array($open_sc, MYSQLI_NUM);	
		if($open_sc_rs[0]=="Open")		
		echo "<option value='$line1[0]'>".$line1[1]."</option>";
		else
		echo "<option value='$line1[0]'>".$line1[1]."*</option>";
	}

echo'</select>';

?>