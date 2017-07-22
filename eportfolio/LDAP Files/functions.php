<?php
session_start();
//include("config.php");
include("db.class.php");
include("../database.php");
include("dbit_ldap.php");

/**
 * function for user authtentication
 * sets the session variables username, name, branch and submit_time (if the student has already given the feedback).
 * @return user_type -- 'admin' if the user is admin, 'bad' if the username or password is bad, 'faculty' if the user is not a student, 'student' if the user is a student who is registered but has not given feedback, 'student_first_time' if the user is not registered (i.e. year and/or division of the student is not known), 'student_again' if the user has already given the feedback
 * @todo optimize this function
 */
 
function authenticate ($username, $password) {
	global $CFG;
	global $db;
	$db = new db_class();
	// check for admin user
	$radmins = $db->select('SELECT empid FROM staff_personal_details WHERE empid="'.$username.'" AND password=md5("'.$password.'");');
	
	if (!$radmins) {
			$db->print_last_error(false);
	}
	$admins = $db->get_row($radmins, 'MYSQL_ASSOC');

	if(isset($admins['id'])) {
		return 'admin';
	}

	// if user is not an admin, use LDAP authentication
	// if not authenticated we've a bad username or password error

 	if(!auth_auth($username, $password, $user)) {
		return 'bad';
	}

	// else we've got the LDAP data in $user variable
	session_start();

	$user_temp = explode(',', $user["fdn"]);
	$_SESSION['name'] = $user['name'];
	$_SESSION['username'] = $username;
	$_SESSION['branch'] = substr($user_temp[1], 3);

	// if username doesn't begin with a number, the user is not a student
	if(!ctype_digit($username[0])) {
		return 'faculty';
	}

	// if we are still here, then it's a student

	// is the user visiting us for the first time?
	$rstudent = $db->select('SELECT username, year, div_id, submitted, submit_time FROM student2 WHERE username=md5(\''.$username.'\');');
	if (!$rstudent) {
			$db->print_last_error(false);
	}
	$student = $db->get_row($rstudent, 'MYSQL_ASSOC');


	// if the student has visited us before
	if(isset($student['year'])) {
		$_SESSION['year'] = $student['year'];
		$_SESSION['division'] = $student['div_id'];
		// has the student already given the feedback?
		if($student['submitted'] == 1) {
			$SESSION['submit_time'] = $student['submit_time'];
			return 'student_again';
		}
		// the student has not given the feedback yet
		return 'student';
	} else {
		// the student is visiting us for the first time
		return 'student_first_time';
	}

	// if we reach here, there's some problem with our code
	return 'unknown';
}

/**
 * display a select menu with options as values from $min to $max
 */
function displaySelectMenu($parameter_id, $faculty_id) {
	$str = '';
//	for($i = 0; $i <= 1; $i++) {
		//$str = $str.'['.$i.']';
	//}
//$str = 'faculty'.$faculty_id.'['.$parameter_id.']';
	echo '<input type="text" ID="category'.$faculty_id.'['.$parameter_id.']" name="category'.$faculty_id.'['.$parameter_id.']" size="40">';
//	$str = 'faculty'.$faculty_id.'['.$parameter_id.']';
}

?>