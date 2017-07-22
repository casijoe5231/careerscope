<?php

include "../connect1.php";
function status($a,$b)
{
$list=mysqli_query($GLOBALS["___mysqli_ston"], "update users set status=".$a." where username='".$b."'");
echo "<html><head><script src='../js/alertify.min.js'></script>
<link rel='stylesheet' href='../css/alertify.core.css' />
<link rel='stylesheet' href='../css/alertify.default.css' /></head></html>";
echo "<SCRIPT LANGUAGE='JavaScript'>
    alertify.alert('You do not belong here!!', function (e) {
    window.location.href='./verify.php';
});</SCRIPT>";
}

//Form One Processing
function formOne(){

status(1,$_POST['username']);

}

//Form Two Processing
function formTwo(){

status(2,$_POST['username']);

}

//Stub function for processing Modal Form
function modalForm(){
	return null;
}

//Check the Post variable to verify which form should be processed.
if(in_array($_POST['function'], array('formOne','formTwo'))){
	//Call the appropriate function associated
	//with the form post
	$_POST['function']();
}else{
	echo '<strong>ERROR: The Form Post was not captured!</strong>';
}