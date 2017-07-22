<?php include("database.php");
include("myprofileconnect.php");
include("calendar.php");
if(isset($_SESSION['login']))
{
?>

<head>

<title>My Profile</title>
<?php include("theme_set.php"); ?>
<script type="text/javascript" src="validation/validation.js"></script>
<script type="text/javascript" src="calendar/calendar/calendar.js"></script>
<link href="Image/icon1.ico" rel="shortcut icon"/>
</head>

<body>


<table align="center">
<tr><td> 
<table border="0" align="center">

	<tr><td colspan="2"><?php include("header.php"); ?></td></tr>
	<tr><td colspan="2"><?php include("stopmenu.php"); ?></td></tr>
    <tr> 
    	 <td width="200"><?php include("smenu.php"); ?></td>
    	 <div id="account"><td> 
  <form name="form" method="post" action="updateprofilePI.php" onSubmit="return validateFormOnSubmit(this);">
  <fieldset style="width:600"> 
	<legend><b>Personal Information</b></legend>
   <table border="0" cellspacing="4" cellpadding="4" width="600" class="register" align="center">
	 <tr> 
       <td>  <label for="FirstName">Surname:</label></td>
       <td><input name="FirstName" type="text" id="FirstName" value="<?php echo $FirstName; ?>"></td>
     </tr>
	 
     <tr> 
       <td><label for="MiddleName">Your Name:</label></td>
       <td><input name="MiddleName" type="Text" id="MiddleName" value="<?php echo $MiddleName; ?>"></td>
         
     </tr>

     <tr> 
       <td><label for="LastName">Middle Name:</label></td>
       <td><input name="LastName" type="text" id="LastName" value="<?php echo $LastName; ?>"></td>   
     </tr>
	 
	 
	 <tr> 
       <td><label for="mobilenumber">Mobile Number:</label></td>
	   <td><input name="mobilenumber" type="text" id="mobilenumber"  value="<?php echo $mobilenumber; ?>"/></td>
     </tr>
	 
	 
     <tr> 
       <td><label for="permAddress1">Address Line:</label></td>
       <td><textarea name="permAddress1" id ="permAddress1" rows="2" cols="16"><?php echo $permAddress1; ?></textarea></td>   
     </tr>
	 
     <tr> 
       <td><label for="permCity">City:</label></td>
       <td><input name="permCity" type="text" id="permCity" value="<?php echo $permCity; ?>" /></td>
     </tr>	
	 
	 	 
     <tr> <td> <label for="permState">State:</label></td>

       <td><select name="permState" id="permState">
  <option value="<?php echo $permstate ;?>"><?php echo $permstate ;?></option>
  <option value="Andra Pradesh">Andra Pradesh</option>
  <option value="Arunachal Pradesh">Arunachal Pradesh</option>
  <option value="Assam">Assam</option>
  <option value="Bihar">Bihar</option>
  <option value="Chhattisgarh">Chhattisgarh</option>
  <option value="Goa">Goa</option>
  <option value="Gujarat">Gujarat</option>
  <option value="Haryana">Haryana</option>
  <option value="Himachal Pradesh">Himachal Pradesh</option>
  <option value="Jammu and Kashmir">Jammu and Kashmir</option>
  <option value="Jharkhand">Jharkhand</option>
  <option value="Karnataka">Karnataka</option>
  <option value="Kerala">Kerala</option> 
  <option value="Madya Pradesh">Madya Pradesh</option> 
  <option value="Maharashtra">Maharashtra</option> 
  <option value="Manipur">Manipur</option> 
  <option value="Meghalaya">Meghalaya</option> 
  <option value="Mizoram">Mizoram</option> 
  <option value="Nagaland">Nagaland</option> 
  <option value="Orissa">Orissa</option> 
  <option value="Punjab">Punjab</option> 
  <option value="Rajasthan">Rajasthan</option> 
  <option value="Sikkim">Sikkim</option> 
  <option value="Tamil Nadu">Tamil Nadu</option> 
  <option value="Tripura">Tripura</option> 
  <option value="Uttaranchal">Uttaranchal</option> 
  <option value="Uttar Pradesh">Uttar Pradesh</option>
  <option value="West Bengal">West Bengal</option>
  <option value="Andaman & Nicobar">Andaman & Nicobar</option> 
  <option value="Chandigarh">Chandigarh</option> 
  <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option> 
  <option value="Daman and Diu">Daman and Diu</option> 
  <option value="Delhi ">Delhi </option> 
  <option value="Lakshadeep">Lakshadeep</option> 
  <option value="Pondicherry">Pondicherry</option> 
</select> </td>
     </tr>
	 
     <tr> 
       <td> <label for="permZipCode">Zip Code:</label></td>
       <td><input name="permZipCode" type="text" id="permZipCode" value="<?php echo $permZipCode; ?>"  /></td>
     </tr>	
	 
     <tr> 
       <td> <label for="Email">Primary Email:</label></td>
       <td><input name="pEmail" type="text" id="pEmail" value="<?php echo $pEmail; ?>"/></td>
     </tr>
     
     <tr> 
       <td> <label>Date of Birth</label></td>
       <td><input type="text" name="date1" id="sel2" size="20" value="<?php echo $date1; ?>"><input type="reset" value="..." onClick="return showCalendar('sel2', '%Y/%m/%d');"><div id="display" style="float: right; clear: both;"></div> </td>
     </tr>
     
     <tr> 
       <td> <label>Gender</label></td>
       <?php if($gender == "Male"){
       			echo '<td><input type="radio" name="gender" checked value="Male">Male<br><input type="radio" name="gender" value="Female">Female</td>';
			} else if($gender == "Female"){
				echo '<td><input type="radio" name="gender"  value="Male">Male<br><input type="radio" name="gender" checked value="Female">Female</td>';
			} else {echo'<td><input type="radio" name="gender" value="Male">Male<br><input type="radio" name="gender" value="Female">Female</td>';}
	  ?>
			
     </tr>
     <tr> 
       <td align="right"><input name="update" type="submit" value="Update"  /></td>
     </tr>
     

     
</table>
</fieldset></form>
</td> </div>    
</tr> 
<tr>  <td colspan="2"><?php include("footer.php"); ?></td></tr>    
</table>
</td></tr>
</table>

</body>
</html>
<?php

}
else{
?><html>
		<head>
	<script type="text/javascript">
				window.location="index.php";
			</script></head>
		</html>
			<?php
}
?>

