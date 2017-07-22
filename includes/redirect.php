<?php
function userredirect($usertype){
	if ($usertype==1 || $usertype==2) {
		header("location:newindex.php");
	}
	else if ($usertype==3) {
		header("location:reynold1/recindex.php");
	}
	else if ($usertype==4) {
		header("location:adminindex.php");
	}
	else if ($usertype==5 || $usertype==6) {
		header("location:directorindex.php");
	}
	else if ($usertype==7 || $usertype==8) {
		header("location:principalindex.php");
	}
	else if ($usertype >=9 && $usertype<=14) {
		header("location:hodindex.php");
	}
	else if ($usertype>=15 && $usertype<=18) {
		header("location:lecturerindex.php");
	}
	else if ($usertype==19) {
		header("location:mentorindex.php");
	}
	else if ($usertype==20) {
		header("location:testmgrindex.php");
	}
	else if ($usertype==21) {
		header("location:tpoindex.php");
	}
}
?>