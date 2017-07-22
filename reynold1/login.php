<?php
ob_start();
session_start();
		include 'connection1.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CareerScope Login</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<link rel="stylesheet" type="text/css" href="styles/tab_style.css">
<script type='text/javascript' src='plugins/jquery.min.js'></script>
<script  type="text/javascript" src="validator1.js" ></script>
<script language="Javascript">
function go()
{
document.getElementById("div1").style.display = 'block';
document.getElementById("div2").style.display = 'none';
document.getElementById("div3").style.display = 'none';
document.getElementById("div4").style.display = 'none';
document.getElementById("div5").style.display = 'none';
document.getElementById("div6").style.display = 'none';
}
function go1()
{
document.getElementById("div1").style.display = 'none';
document.getElementById("div2").style.display = 'block';
document.getElementById("div3").style.display = 'none';
document.getElementById("div4").style.display = 'none';
document.getElementById("div5").style.display = 'none';
document.getElementById("div6").style.display = 'none';
}
function go2()
{
document.getElementById("div1").style.display = 'none';
document.getElementById("div2").style.display = 'none';
document.getElementById("div3").style.display = 'block';
document.getElementById("div4").style.display = 'none';
document.getElementById("div5").style.display = 'none';
document.getElementById("div6").style.display = 'none';
}
function go3()
{
document.getElementById("div1").style.display = 'none';
document.getElementById("div2").style.display = 'none';
document.getElementById("div3").style.display = 'none';
document.getElementById("div4").style.display = 'block';
document.getElementById("div5").style.display = 'none';
document.getElementById("div6").style.display = 'none';
}
function go4()
{
document.getElementById("div1").style.display = 'none';
document.getElementById("div2").style.display = 'none';
document.getElementById("div3").style.display = 'none';
document.getElementById("div4").style.display = 'none';
document.getElementById("div5").style.display = 'block';
document.getElementById("div6").style.display = 'none';
}
function go5()
{
document.getElementById("div1").style.display = 'none';
document.getElementById("div2").style.display = 'none';
document.getElementById("div3").style.display = 'none';
document.getElementById("div4").style.display = 'none';
document.getElementById("div5").style.display = 'none';
document.getElementById("div6").style.display = 'block';
}

</script>
<script>
$('#webForm').validate({
    rules : {
        type: {
            required : true
        }
    },
    messages : {
        type: "Please select radio button"
    }
});
</script>
</head>
<body>
<div class="container">
<div class="header"><img src="images/byb.jpg" width="160" height="80" alt="CareerScope logo" align="left"/>
  <img src="images/dbit.png"  width="6%" alt="DBIT"  align="right"/> </div>
<div class="header-shadow"></div>
  
<div class="content">
 <br>
<div class="title">
<h3>&nbsp; Login</h3>
</div>
<br>
<br>
<br>
<div id="tab-one">
<div class="register" style="text-align:center;"><br>
			<img src="images/locked.png" width="100px">
			<h3>Login</h3>
			<form action="login.php" method="POST">
			<table align="center">
			<tr>
			<th>Email: </th>
			<th><input name="email" type="textbox" autofocus></th>
			</tr>
			<tr>
			<th>Password: </th>
			<th><input name="password" type="password"></th>
			</tr>
			<tr>
			<th></th>
			<th><input type="submit" value="Login"></th>
			</tr>
			</table>
			</form>
			<?php
			if(isset($_POST["email"]))
			{
				include 'connection1.php';
				$email = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['email']);
				$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
				$sql="SELECT name,role FROM masteruser WHERE email='$email' and password='$password'";
				$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
				while($row = mysqli_fetch_array($res))
				{
					$fname=$row['name'];
					$role=$row['role']; 
				}
				$num=mysqli_num_rows($res);
				if($num==1)
				{
				// Login check for students
				if($role=='Student')
				{
					$data=array($email,$fname,$role);
					$_SESSION['user']=$data;
					header("location:newindex.php");
				}
				// login check for recruiter
				elseif($role=='Recruiter')
				{
					$data=array($email,$fname,$role);
					$_SESSION['user3']=$data;
					header("location:reynold1/recindex.php");
				}
				// login check for staff members according to different roles
				elseif($role=='Staff')
				{
					$sql1="SELECT * FROM istaff WHERE email='$email'";
					$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
					while($row1 = mysqli_fetch_array($res1))
					{
					$sname=$row1['staff_name'];
					if($row1['is_hod']==1 && $row1['is_mentor']==1 && $row1['active_yn']==1)
						{
							$data=array($email,$sname,"HOD");
							$_SESSION['hod']=$data;
							header("location:hodindex.php");
						}
						else
						{
						echo "<html><head><script src='js/alertify.min.js'></script>
						<link rel='stylesheet' href='css/alertify.core.css' />
						<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
						echo "<SCRIPT LANGUAGE='JavaScript'>
						alertify.alert('Access Restriction. Inactive user!!', function (e) {
						window.location.href='login.php';
						});
						</SCRIPT>";
						}
					if($row1['is_tpo']==1 && $row1['active_yn']==1)
						{
							$data=array($email,$sname,"TPO");
							$_SESSION['user4']=$data;
							header("location:reynold1/tpoindex.php");
						}
						else
						{
						echo "<html><head><script src='js/alertify.min.js'></script>
						<link rel='stylesheet' href='css/alertify.core.css' />
						<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
						echo "<SCRIPT LANGUAGE='JavaScript'>
						alertify.alert('Access Restriction. Inactive user!!', function (e) {
						window.location.href='login.php';
						});
						</SCRIPT>";
						}
					if($row1['is_admin']==1 && $row1['active_yn']==1)
						{
							$data=array($email,$sname,"Admin");
							$_SESSION['admin']=$data;
							header("location:adminindex.php");
						}
						else
						{
						echo "<html><head><script src='js/alertify.min.js'></script>
						<link rel='stylesheet' href='css/alertify.core.css' />
						<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
						echo "<SCRIPT LANGUAGE='JavaScript'>
						alertify.alert('Access Restriction. Inactive user!!', function (e) {
						window.location.href='login.php';
						});
						</SCRIPT>";
						}
					if($row1['is_director']==1 && $row1['active_yn']==1)
						{
							$data=array($email,$sname,"Director");
							$_SESSION['director']=$data;
							header("location:directorindex.php");
						}
						else
						{
						echo "<html><head><script src='js/alertify.min.js'></script>
						<link rel='stylesheet' href='css/alertify.core.css' />
						<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
						echo "<SCRIPT LANGUAGE='JavaScript'>
						alertify.alert('Access Restriction. Inactive user!!', function (e) {
						window.location.href='login.php';
						});
						</SCRIPT>";
						}
					if($row1['is_principal']==1 && $row1['active_yn']==1)
						{
							$data=array($email,$sname,"Principal");
							$_SESSION['principal']=$data;
							header("location:principalindex.php");
						}
						else
						{
						echo "<html><head><script src='js/alertify.min.js'></script>
						<link rel='stylesheet' href='css/alertify.core.css' />
						<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
						echo "<SCRIPT LANGUAGE='JavaScript'>
						alertify.alert('Access Restriction. Inactive user!!', function (e) {
						window.location.href='login.php';
						});
						</SCRIPT>";
						}
					/*if($row1['is_hod']==1 && $row1['active_yn']==1)
						{
							$data=array($email,$sname,"Mentor");
							$_SESSION['mentor']=$data;
							header("location:hodmentorindex.php");
						}
						else
						{
						echo "<html><head><script src='js/alertify.min.js'></script>
						<link rel='stylesheet' href='css/alertify.core.css' />
						<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
						echo "<SCRIPT LANGUAGE='JavaScript'>
						alertify.alert('Access Restriction. Inactive user!!', function (e) {
						window.location.href='login.php';
						});
						</SCRIPT>";
						}*/
					if($row1['is_testmgr']==1 && $row1['active_yn']==1)
						{
							$data=array($email,$sname,"Test Manager");
							$_SESSION['testmgr']=$data;
							header("location:testmgrindex.php");
						}
						else
						{
						echo "<html><head><script src='js/alertify.min.js'></script>
						<link rel='stylesheet' href='css/alertify.core.css' />
						<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
						echo "<SCRIPT LANGUAGE='JavaScript'>
						alertify.alert('Access Restriction. Inactive user!!', function (e) {
						window.location.href='login.php';
						});
						</SCRIPT>";
						}
						
						if($row1['is_lecturer']==1 && $row1['is_testmgr']==1 && $row1['active_yn']==1)
						{
							$data=array($email,$sname,"Lecturer");
							$_SESSION['lecturer']=$data;
							header("location:lecturerindex.php");
						}
						else
						{
						echo "<html><head><script src='js/alertify.min.js'></script>
						<link rel='stylesheet' href='css/alertify.core.css' />
						<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
						echo "<SCRIPT LANGUAGE='JavaScript'>
						alertify.alert('Access Restriction. Inactive user!!', function (e) {
						window.location.href='login.php';
						});
						</SCRIPT>";
						}
						
						if($row1['is_lecturer']==1 && $row1['is_mentor']==1 && $row1['active_yn']==1)
						{
							$data=array($email,$sname,"LectMentor");
							$_SESSION['lectmentor']=$data;
							header("location:lectmentorindex.php");
						}
						else
						{
						echo "<html><head><script src='js/alertify.min.js'></script>
						<link rel='stylesheet' href='css/alertify.core.css' />
						<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
						echo "<SCRIPT LANGUAGE='JavaScript'>
						alertify.alert('Access Restriction. Inactive user!!', function (e) {
						window.location.href='login.php';
						});
						</SCRIPT>";
						}
						
					
					}
				}
				
				// login check for alumni
				elseif($role=='Alumni')
				{
					$data=array($email,$fname,$role);
					$_SESSION['user2']=$data;
					header("location:index.php");
				}
				else
				{
					$data=array($email,$fname,$role);
					$_SESSION['user5']=$data;
					header("location:index.php");
				}
				}
				else
				{
					echo "<html><head><script src='js/alertify.min.js'></script>
					<link rel='stylesheet' href='css/alertify.core.css' />
					<link rel='stylesheet' href='css/alertify.default.css' /></head></html>";
					echo "<SCRIPT LANGUAGE='JavaScript'>
					alertify.alert('Invalid Credentials. Please try again!!', function (e) {
					window.location.href='login.php';
					});
					</SCRIPT>";
				}

			}
			?>
			<br>
			<b>Not Registered ?</b><br>
            
            <table align="center">
			<tr>
			<th><span style='color:red;'>*</span>Select Role: </th>
			<th>
				<select name="role" id="input-role" temp="Please select the role" onblur="validator(this)">
				<option value="Select">Select</option>
				<option value="Student" id="Student" onclick="go()">Student</option>
				<option value="Alumni" id="Alumni" onclick="go2()">Alumni</option>
				<option value="Guest" id="Guest" onclick="go5()">Guest</option>
				<!--<option value="Staff" id="Staff" onclick="go1()">Staff</option>
				<option value="Recruiter" id="Recruiter" onclick="go3()">Recruiter</option>
				<option value="TPO" id="TPO" onclick="go4()">TPO</option>!-->
				</select><br>
				<span id="role" style="color:#C00;"></span></label>
			</th>
			</tr>
			</table>
			<div id="div1" style="display:none;">
			<form action="./register/sregister.php" onsubmit="return validateAll()" method="get">
			<table align="center">
			<tr>
			<th><span style='color:red;'>*</span>Select Discipline: </th>
			<th>
				<select name="discipline" id="input-discipline" temp="Please select the discipline" onblur="validator1(this)">
				<option value="Select">Select</option>
				<option value="Engineering">Engineering</option>
				<option value="Management">Management</option>
				<option value="Pharmacy">Pharmacy</option>
				</select><br>
				<span id="discipline" style="color:#C00;"></span></label>
			</th>
			</tr>
			<tr>
			<th><span style='color:red;'>*</span>Select Institute: </th>
			<th>
				<select name="institute" id="input-institute" temp="Please select the institute" onblur="validator2(this)">
				<option value="Select">Select</option>
				<option value="Don Bosco Institute of Technology">Don Bosco Institute of Technology</option>
				<option value="St. Johns institute of tech">St. Johns institute of tech</option>
				<option value="Father Agnel institute of Tech">Father Agnel institute of Tech</option>
				</select><br>
				<span id="institute" style="color:#C00;"></span></label>
			</th>
			</tr>
			</table>
			<br>
			   <input type="submit" value="Register" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;">
            </form>	
			</div>
			<div id="div2" style="display:none;">
			<form id="webForm" action="./register/staffregister.php" onsubmit="return validateAll1()" method="get">
			<table align="center">
			<tr>
			<th><span style='color:red;'>*</span>Select Discipline: </th>
			<th>
				<select name="discipline2" id="input-discipline2" temp="Please select the discipline" onblur="validator3(this)">
				<option value="Select">Select</option>
				<option value="Engineering">Engineering</option>
				<option value="Management">Management</option>
				<option value="Pharmacy">Pharmacy</option>
				<option value="Not Applicable">Not Applicable</option>
				</select><br>
				<span id="discipline2" style="color:#C00;"></span></label>
			</th>
			</tr>
			<tr>
			<th><span style='color:red;'>*</span>Select Institute: </th>
			<th>
				<select name="institute2" id="input-institute2" temp="Please select the institute" onblur="validator4(this)">
				<option value="Select">Select</option>
				<option value="Don Bosco Institute of Technology">Don Bosco Institute of Technology</option>
				<option value="St. Johns institute of tech">St. Johns institute of tech</option>
				<option value="Father Agnel institute of Tech">Father Agnel institute of Tech</option>
				<option value="Not Applicable">Not Applicable</option>
				</select><br>
				<span id="institute2" style="color:#C00;"></span></label>
			</th>
			</tr>
			<tr>
			<th><label><span style='color:red;'>*</span>Designation:</label></th>
			<th>
				<input type="radio" name="type" value="Director">Director
				<input type="radio" name="type" value="Principal">Principal
				<input type="radio" name="type" value="Admin">Admin
				<input type="radio" name="type" value="HOD">HOD
				<input type="radio" name="type" value="Lecturer">Lecturer
				<input type="radio" name="type" value="Test Manager">Test Manager
            </th>
			</tr>
			</table><br>
			   <input type="submit" value="Proceed" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;">
            </form>	
			</div>
			<div id="div3" style="display:none;">
			<form action="./register/stregister.php" onsubmit="return validateAll2()" method="get">
			<table align="center">
			<tr>
			<th><span style='color:red;'>*</span>Select Discipline: </th>
			<th>
				<select name="discipline1" id="input-discipline1" temp="Please select the discipline" onblur="validator6(this)">
				<option value="Select">Select</option>
				<option value="Engineering">Engineering</option>
				<option value="Management">Management</option>
				<option value="Pharmacy">Pharmacy</option>
				</select><br>
				<span id="discipline1" style="color:#C00;"></span></label>
			</th>
			</tr>
			<tr>
			<th><span style='color:red;'>*</span>Select Institute: </th>
			<th>
				<select name="institute1" id="input-institute1" temp="Please select the institute" onblur="validator7(this)">
				<option value="Select">Select</option>
				<option value="Don Bosco Institute of Technology">Don Bosco Institute of Technology</option>
				<option value="St. Johns institute of tech">St. Johns institute of tech</option>
				<option value="Father Agnel institute of Tech">Father Agnel institute of Tech</option>
				</select><br>
				<span id="institute1" style="color:#C00;"></span></label>
			</th>
			</tr>
			</table><br>
			   <input type="submit" value="Register" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;">
            </form>	
			</div>
			<div id="div4" style="display:none;">
			<form action="./register/recregister.php" onsubmit="return validateAll3()" method="get">
			<table align="center">
			<tr>
			<th><span style='color:red;'>*</span>Select Discipline: </th>
			<th>
				<select name="discipline3" id="input-discipline3" temp="Please select the discipline" onblur="validator8(this)">
				<option value="Select">Select</option>
				<option value="Engineering">Engineering</option>
				<option value="Management">Management</option>
				<option value="Pharmacy">Pharmacy</option>
				</select><br>
				<span id="discipline3" style="color:#C00;"></span></label>
			</th>
			</tr>
			<tr>
			<th><span style='color:red;'>*</span>Select Institute: </th>
			<th>
				<select name="institute3" id="input-institute3" temp="Please select the institute" onblur="validator9(this)">
				<option value="Select">Select</option>
				<option value="Don Bosco Institute of Technology">Don Bosco Institute of Technology</option>
				<option value="St. Johns institute of tech">St. Johns institute of tech</option>
				<option value="Father Agnel institute of Tech">Father Agnel institute of Tech</option>
				</select><br>
				<span id="institute3" style="color:#C00;"></span></label>
			</th>
			</tr>
			</table><br>
			   <input type="submit" value="Register" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;">
            </form>	
			</div>
			<div id="div5" style="display:none;">
			<form action="./register/tporegister.php" onsubmit="return validateAll4()" method="get">
			<table align="center">
			<tr>
			<th><span style='color:red;'>*</span>Select Discipline: </th>
			<th>
				<select name="discipline4" id="input-discipline4" temp="Please select the discipline" onblur="validator10(this)">
				<option value="Select">Select</option>
				<option value="Engineering">Engineering</option>
				<option value="Management">Management</option>
				<option value="Pharmacy">Pharmacy</option>
				</select><br>
				<span id="discipline4" style="color:#C00;"></span></label>
			</th>
			</tr>
			<tr>
			<th><span style='color:red;'>*</span>Select Institute: </th>
			<th>
				<select name="institute4" id="input-institute4" temp="Please select the institute" onblur="validator11(this)">
				<option value="Select">Select</option>
				<option value="Don Bosco Institute of Technology">Don Bosco Institute of Technology</option>
				<option value="St. Johns institute of tech">St. Johns institute of tech</option>
				<option value="Father Agnel institute of Tech">Father Agnel institute of Tech</option>
				</select><br>
				<span id="institute4" style="color:#C00;"></span></label>
			</th>
			</tr>
			</table><br>
			   <input type="submit" value="Register" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;">
            </form>	
			</div>
			<div id="div6" style="display:none;">
			<form action="./register/guestregister.php" onsubmit="return validateAll5()" method="get">
			<table align="center">
			<tr>
			<th><span style='color:red;'>*</span>Select Discipline: </th>
			<th>
				<select name="discipline5" id="input-discipline5" temp="Please select the discipline" onblur="validator12(this)">
				<option value="Select">Select</option>
				<option value="Engineering">Engineering</option>
				<option value="Management">Management</option>
				<option value="Pharmacy">Pharmacy</option>
				<option value="Not Applicable">Not Applicable</option>
				</select><br>
				<span id="discipline5" style="color:#C00;"></span></label>
			</th>
			</tr>
			</table><br>
			   <input type="submit" value="Register" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;">
            </form>	
			</div>
			<br>
			</div>

</div>

<br><br>
<a href="index.php" style="text-decoration:none;color:blue;">&lt;&lt;&nbsp;Previous</a>
<br><br>
</div>
<div class="footer">
  <div class="footer-link">
  <br><a href="index.php" style="text-decoration:none;color:white;">Home</a> | Privacy Policy | Terms of use | About
  <br /> www.dbit.in<br /><br />
  </div>
</div>

</div>
</body>
</html>
<?php
ob_flush();
?>