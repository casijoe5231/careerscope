<?php
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
<script type="text/javascript" src="plugins/organictabs.jquery.js"></script>
<script type='text/javascript'>
    $(function() {

        $("#tab-one").organicTabs({
            "speed": 200
        });
        
        $("#tab-two").organicTabs({
            "speed": 200
        });
		
		$("#tab-three").organicTabs({
            "speed": 200
        });
		
		$("#tab-four").organicTabs({
            "speed": 200
        });
		
		$("#tab-five").organicTabs({
            "speed": 200
        });
		
		$("#tab-six").organicTabs({
            "speed": 200
        });

    });
</script>
<script  type="text/javascript" src="validator1.js" ></script>
</head>
<body>
<div class="container">
<div class="header"><img src="images/careerscope_banner.png" width="18%" alt="CareerScope logo" align="leftt"/>
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
<!--Organic Tabs -->
<div id="tab-one">
			<B>Select Role:</B>
 
	<ul class="nav">
                <li class="nav-one"><a href="#student" class="current">Student <br>Login</a></li>
                <li class="nav-two"><a href="#staff">Staff<br> Login</a></li>
				<li class="nav-three"><a href="#alumni">Alumni<br> Login</a></li>
				<li class="nav-four"><a href="#recruiter">Recruiter Login</a></li>
				<li class="nav-five"><a href="#TPO">TPO<br> Login</a></li>
				<li class="nav-six"><a href="#guest">Guest<br> Login</a></li>

    </ul>

    <div class="list-wrap">
	
		<ul id="student">
			<li> 
			
			<div class="register" style="text-align:center;">
			<img src="images/locked.png" width="100px">
			<h3>Student Login</h3>
			<form action="login.php" method="POST">
			<table align="center">
			<tr>
			<th>Email: </th>
			<th><input name="email1" type="textbox" autofocus></th>
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
			if(isset($_POST["email1"]))
			{
				include 'connection1.php';
				$email1 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['email1']);
				$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
				$sql="SELECT name,role FROM masteruser WHERE email='$email1' and password='$password' and role='Student'";
				$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
				while($row = mysqli_fetch_array($res))
				{
					$fname=$row['name'];
					$role=$row['role']; 
				}
				$num=mysqli_num_rows($res);
				if($num==1)
				{
			
					$data=array($email1,$fname,$role);
					$_SESSION['user']=$data;
					echo "<meta http-equiv='refresh' content='2;url=newindex.php'>";
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
			<b>Not Registered ?</b>
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
				<option value="Not Applicable">Not Applicable</option>
				</select><br>
				<span id="discipline" style="color:#C00;"></span></label>
			</th>
			</tr>
			<tr>
			<th><span style='color:red;'>*</span>Select Institute: </th>
			<th>
				<select name="institute" id="input-institute" temp="Please select the institute" onblur="validator(this)">
				<option value="Select">Select</option>
				<option value="Don Bosco Institute of Technology">Don Bosco Institute of Technology</option>
				<option value="St. Johns institute of tech">St. Johns institute of tech</option>
				<option value="Father Agnel institute of Tech">Father Agnel institute of Tech</option>
				<option value="Not Applicable">Not Applicable</option>
				</select><br>
				<span id="institute" style="color:#C00;"></span></label>
			</th>
			</tr>
			</table>
			   <input type="submit" value="Register" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;">
            </form>	
			<br>
			</div>
			
			
			
			</li>
		</ul>
		 
		 <ul id="staff" class="hide">
			<li>
			
			<div class="register" style="text-align:center;">
			<img src="images/locked.png" width="100px">
			<h3>Staff Login</h3>
			<form action="login.php" method="POST">
			<table align="center">
			
			<tr>
			<th>Email: </th>
			<th><input name="email2" type="textbox" autofocus></th>
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
			if(isset($_POST["email2"]))
			{
				include 'connection1.php';
				$email2 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['email2']);
				$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
				$sql1="SELECT name,role FROM masteruser WHERE email='$email2' and password='$password'";
				$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
				while($row = mysqli_fetch_array($res1))
				{
					$fname=$row['name'];
					if($row['role']=='Principal')
					{
					$role=$row['role']; 
					}
					if($row['role']=='Lecturer')
					{
					$role1=$row['role']; 
					}
					if($row['role']=='Director')
					{
					$role2=$row['role']; 
					}
					
					if($row['role']=='HOD')
					{
					$role3=$row['role']; 
					}
					
					if($row['role']=='Test Manager')
					{
					$role4=$row['role']; 
					}
					
				
				$num=mysqli_num_rows($res1);
				if($num==1)
				{
					if($row['role']=='Principal')
					{
					$data=array($email2,$fname,$role);
					$_SESSION['user1']=$data;
					}
					
					if($row['role']=='Lecturer')
					{
					$data=array($email2,$fname,$role1);
					$_SESSION['user1']=$data;
					}
					
					if($row['role']=='Director')
					{
					$data=array($email2,$fname,$role2);
					$_SESSION['user1']=$data;
					}
					
					if($row['role']=='HOD')
					{
					$data=array($email2,$fname,$role3);
					$_SESSION['user1']=$data;
					}
					
					if($row['role']=='Test Manager')
					{
					$data=array($email2,$fname,$role4);
					$_SESSION['user1']=$data;
					}
			
					echo "<meta http-equiv='refresh' content='2;url=index.php'>";
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
				
				

			}
			?>
						<br>
<b>Not Registered ?</b>
            <form action="./register/staffregister.php" onsubmit="return validateAll1()" method="get">
               <table align="center">
			<tr>
			<th><span style='color:red;'>*</span>Select Discipline: </th>
			<th>
				<select name="discipline2" id="input-discipline2" temp="Please select the discipline" onblur="validator1(this)">
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
				<select name="institute2" id="input-institute2" temp="Please select the institute" onblur="validator(this)">
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
				<select name="type" id="input-type" temp="Please select type" onblur="validator2(this)">
				<option value="Select">Select</option>
				<option value="Director">Director</option>
                <option value="Principal">Principal</option>
                <option value="HOD">HOD</option>
                <option value="Lecturer">Lecturer</option>
				<option value="Test Manager">Test Manager</option>
                </select><br>
				<label ><span id="type" style="color:#C00;"></span></label>
            </th>
			</tr>
			</table>
			   <input type="submit" value="Register" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;">
            </form>	
			<br>
			</div>			
			
			</li>
		 </ul>
		 
		 <ul id="alumni" class="hide">
			<li> 
			
			<div class="register" style="text-align:center;">
			<img src="images/locked.png" width="100px">
			<h3>Alumni Login</h3>
			<form action="login.php" method="POST">
			<table align="center">
			<tr>
			<th>Email: </th>
			<th><input name="email3" type="textbox" autofocus></th>
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
			if(isset($_POST["email3"]))
			{
				include 'connection1.php';
				$email3 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['email3']);
				$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
				$sql2="SELECT name,role FROM masteruser WHERE email='$email3' and password='$password' and role='Alumni'";
				$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
				while($row = mysqli_fetch_array($res2))
				{
					$fname=$row['name'];
					$role=$row['role']; 
				}
				$num=mysqli_num_rows($res2);
				if($num==1)
				{
			
					$data=array($email3,$fname,$role);
					$_SESSION['user2']=$data;
			
					echo "<meta http-equiv='refresh' content='2;url=index.php'>";
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
			<b>Not Registered ?</b>
            <form action="./register/stregister.php" onsubmit="return validateAll2()" method="get">
               <table align="center">
			<tr>
			<th><span style='color:red;'>*</span>Select Discipline: </th>
			<th>
				<select name="discipline1" id="input-discipline1" temp="Please select the discipline" onblur="validator1(this)">
				<option value="Select">Select</option>
				<option value="Engineering">Engineering</option>
				<option value="Management">Management</option>
				<option value="Pharmacy">Pharmacy</option>
				<option value="Not Applicable">Not Applicable</option>
				</select><br>
				<span id="discipline1" style="color:#C00;"></span></label>
			</th>
			</tr>
			<tr>
			<th><span style='color:red;'>*</span>Select Institute: </th>
			<th>
				<select name="institute1" id="input-institute1" temp="Please select the institute" onblur="validator(this)">
				<option value="Select">Select</option>
				<option value="Don Bosco Institute of Technology">Don Bosco Institute of Technology</option>
				<option value="St. Johns institute of tech">St. Johns institute of tech</option>
				<option value="Father Agnel institute of Tech">Father Agnel institute of Tech</option>
				</select><br>
				<span id="institute1" style="color:#C00;"></span></label>
			</th>
			</tr>
			</table>
			   <input type="submit" value="Register" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;">
            </form>	
			<br>
			</div>
			
			
			
			</li>
		</ul>
		
		<ul id="recruiter" class="hide">
			<li> 
			
			<div class="register" style="text-align:center;">
			<img src="images/locked.png" width="100px">
			<h3>Recruiter Login</h3>
			<form action="login.php" method="POST">
			<table align="center">
			<tr>
			<th>Email: </th>
			<th><input name="email4" type="textbox" autofocus></th>
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
			if(isset($_POST["email4"]))
			{
				include 'connection1.php';
				$email4 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['email4']);
				$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
				$sql3="SELECT name,role FROM masteruser WHERE email='$email4' and password='$password' and role='Recruiter'";
				$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
				while($row = mysqli_fetch_array($res3))
				{
					$fname=$row['name'];
					$role=$row['role']; 
				}
				$num=mysqli_num_rows($res3);
				if($num==1)
				{
			
					$data=array($email4,$fname,$role);
					$_SESSION['user3']=$data;
			
					echo "<meta http-equiv='refresh' content='2;url=index.php'>";
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
			<b>Not Registered ?</b>
            <form action="./register/recregister.php" onsubmit="return validateAll3()" method="get">
               <table align="center">
			<tr>
			<th><span style='color:red;'>*</span>Select Discipline: </th>
			<th>
				<select name="discipline3" id="input-discipline3" temp="Please select the discipline" onblur="validator1(this)">
				<option value="Select">Select</option>
				<option value="Engineering">Engineering</option>
				<option value="Management">Management</option>
				<option value="Pharmacy">Pharmacy</option>
				<option value="Not Applicable">Not Applicable</option>
				</select><br>
				<span id="discipline3" style="color:#C00;"></span></label>
			</th>
			</tr>
			<tr>
			<th><span style='color:red;'>*</span>Select Institute: </th>
			<th>
				<select name="institute3" id="input-institute3" temp="Please select the institute" onblur="validator(this)">
				<option value="Select">Select</option>
				<option value="Don Bosco Institute of Technology">Don Bosco Institute of Technology</option>
				<option value="St. Johns institute of tech">St. Johns institute of tech</option>
				<option value="Father Agnel institute of Tech">Father Agnel institute of Tech</option>
				</select><br>
				<span id="institute3" style="color:#C00;"></span></label>
			</th>
			</tr>
			</table>
			   <input type="submit" value="Register" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;">
            </form>	
			</div>
			
			
			
			</li>
		</ul>
		
		<ul id="TPO" class="hide">
			<li> 
			
			<div class="register" style="text-align:center;">
			<img src="images/locked.png" width="100px">
			<h3>TPO Login</h3>
			<form action="login.php" method="POST">
			<table align="center">
			<tr>
			<th>Email: </th>
			<th><input name="email5" type="textbox" autofocus></th>
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
			if(isset($_POST["email5"]))
			{
				include 'connection1.php';
				$email5 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['email5']);
				$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
				$sql4="SELECT name,role FROM masteruser WHERE email='$email5' and password='$password' and role='TPO'";
				$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);
				while($row = mysqli_fetch_array($res4))
				{
					$fname=$row['name'];
					$role=$row['role']; 
				}
				$num=mysqli_num_rows($res4);
				if($num==1)
				{
			
					$data=array($email5,$fname,$role);
					$_SESSION['user4']=$data;
			
					echo "<meta http-equiv='refresh' content='2;url=reynold1/tpoindex.php'>";
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
<b>Not Registered ?</b>
            <form action="./register/tporegister.php" onsubmit="return validateAll4()" method="get">
               <table align="center">
			<tr>
			<th><span style='color:red;'>*</span>Select Discipline: </th>
			<th>
				<select name="discipline4" id="input-discipline4" temp="Please select the discipline" onblur="validator1(this)">
				<option value="Select">Select</option>
				<option value="Engineering">Engineering</option>
				<option value="Management">Management</option>
				<option value="Pharmacy">Pharmacy</option>
				<option value="Not Applicable">Not Applicable</option>
				</select><br>
				<span id="discipline4" style="color:#C00;"></span></label>
			</th>
			</tr>
			<tr>
			<th><span style='color:red;'>*</span>Select Institute: </th>
			<th>
				<select name="institute4" id="input-institute4" temp="Please select the institute" onblur="validator(this)">
				<option value="Select">Select</option>
				<option value="Don Bosco Institute of Technology">Don Bosco Institute of Technology</option>
				<option value="St. Johns institute of tech">St. Johns institute of tech</option>
				<option value="Father Agnel institute of Tech">Father Agnel institute of Tech</option>
				</select><br>
				<span id="institute4" style="color:#C00;"></span></label>
			</th>
			</tr>
			</table>
			   <input type="submit" value="Register" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;">
            </form>
			<br>
			</div>
			
			
			
			</li>
		</ul>
		
		<ul id="guest" class="hide">
			<li> 
			
			<div class="register" style="text-align:center;">
			<img src="images/locked.png" width="100px">
			<h3>Guest Login</h3>
			<form action="login.php" method="POST">
			<table align="center">
			<tr>
			<th>Email: </th>
			<th><input name="email6" type="textbox" autofocus></th>
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
			if(isset($_POST["email6"]))
			{
				include 'connection1.php';
				$email6 = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['email6']);
				$password = mysqli_real_escape_string($GLOBALS["___mysqli_ston"], $_POST['password']);
				$sql5="SELECT name,role FROM masteruser WHERE email='$email6' and password='$password' and role='Guest'";
				$res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
				while($row = mysqli_fetch_array($res5))
				{
					$fname=$row['name'];
					$role=$row['role']; 
				}
				$num=mysqli_num_rows($res5);
				if($num==1)
				{
			
					$data=array($email6,$fname,$role);
					$_SESSION['user5']=$data;
			
					echo "<meta http-equiv='refresh' content='2;url=index.php'>";
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
<b>Not Registered ?</b>
            <form action="./register/guestregister.php" onsubmit="return validateAll5()" method="get">
               <table align="center">
			<tr>
			<th><span style='color:red;'>*</span>Select Discipline: </th>
			<th>
				<select name="discipline5" id="input-discipline5" temp="Please select the discipline" onblur="validator1(this)">
				<option value="Select">Select</option>
				<option value="Engineering">Engineering</option>
				<option value="Management">Management</option>
				<option value="Pharmacy">Pharmacy</option>
				<option value="Not Applicable">Not Applicable</option>
				</select><br>
				<span id="discipline5" style="color:#C00;"></span></label>
			</th>
			</tr>
			</table>
			   <input type="submit" value="Register" style="border:1px solid #09F; background:#09F; padding:5px; color:#FFF;  border-radius:5px;">
            </form>		
			<br>
			</div>
			
			
			
			</li>
		</ul>
		 
    </div> <!-- END List Wrap -->
 
 </div> <!-- END Organic Tabs -->

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
