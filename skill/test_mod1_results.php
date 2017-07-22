
<?php
    session_start();

	if(!isset($_SESSION['user']))
		{
			header('location:../login.php');
			exit();
		}

		if($_SESSION['usertype']!=1){
			if ($_SESSION['usertype']!=2 ) {
				
			header("location: home.php?error=0");
			}
		}
	include '../includes/connection2.php';
	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to mysql: " . mysqli_connect_error();
	}

	for ($i=1; $i < 52 ; $i++) { 
		$_POST['option'.$i]=6-$_POST['option'.$i];
	}

		$email=$_SESSION['user'][0];
		//$email="lol@lola.com";
		$E= 20 + $_POST['option1']-$_POST['option6']+$_POST['option11']-$_POST['option16']+$_POST['option21']-$_POST['option26']+$_POST['option31']-$_POST['option36']+$_POST['option41']-$_POST['option46'];
		$A= 14 - $_POST['option2']+$_POST['option7']-$_POST['option12']+$_POST['option17']-$_POST['option22']+$_POST['option27']-$_POST['option32']+$_POST['option37']+$_POST['option42']+$_POST['option47'];
		$C= 14 + $_POST['option3']-$_POST['option8']+$_POST['option13']-$_POST['option18']+$_POST['option23']-$_POST['option28']+$_POST['option33']-$_POST['option38']+$_POST['option43']+$_POST['option48'];
	    $N= 38 - $_POST['option4']+$_POST['option9']-$_POST['option14']+$_POST['option19']-$_POST['option24']-$_POST['option29']-$_POST['option34']-$_POST['option39']-$_POST['option44']-$_POST['option49'];
		$O=  8 + $_POST['option5']-$_POST['option10']+$_POST['option15']-$_POST['option20']+$_POST['option25']-$_POST['option30']+$_POST['option35']+$_POST['option40']+$_POST['option45']+$_POST['option50'];

		$sql="INSERT INTO skillresult(email,mod1,E,A,C,N,O)
		VALUES ('$email',1,'$E','$A','$C','$N','$O')";

		if (!mysqli_query($con,$sql)) {
		  echo 'Error: ' . mysqli_error($con);
		}
		echo "1 record added";

		mysqli_close($con);
		header('location:test_mod1_report.php');

?>