<?php
    session_start();
		include '../connection1.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../styles/style-main.css">
<script  type="text/javascript" src="validator7.php" ></script>
<style>
#controlBoard
{
	margin-left:5%;
	width:90%;
}
</style>
<title>CareerScope Login</title>
</head>
<body>
<div class="container">
<div class="header"><img src="../images/careerscope_banner.png" width="18%" alt="CareerScope logo" align="leftt"/>
  <img src="../images/dbit.png"  width="6%" alt="DBIT"  align="right"/> </div>
<div class="header-shadow"></div>
  
<div class="content">
 
 <div class="register">

<div id="controlBoard">
<br />
<?php
if (isset($_SESSION['payment']))
{
?>
<form action="payment2.php" method="post" enctype="multipart/form-data">
			<fieldset  id="fieldset"style="border-radius:5px;" >
			<table cellpadding="12" border="0" width="auto">
				<legend>Payment Details:</legend>
<?php
if($_SESSION['payment']=='Credit Card')
{
?>
	<tr><b>Please enter your credit card details and click on submit below:</b><img src="images/mastercard.jpg" height="30px" width="50px" alt="Mastercard logo" align="leftt"/><img src="images/visa.jpg" height="30px" width="50px" alt="Visa logo" align="leftt"/></tr>
	
	<tr><td><label><span style='color:red;'>*</span><strong>Select card type:</strong></label></td>
	<td><select name="cardtype" id="input-cardtype" temp="Please select card type" onblur="validator(this)">
	<option value="Select">Select</option>
	<option value="VISA">VISA</option>
    <option value="MasterCard">MasterCard</option>
    </select>
	<label ><span id="cardtype" style="color:#C00;"></span></label>
    </td></tr>
	
	<tr><td><label><span style='color:red;'>*</span><strong>Credit card number:</strong></label></td>
	<td><input  type="text" class="text2" name="cardno" id="input-cardno" temp="Please enter credit card number." placeholder="Enter your 16 digit Visa or MasterCard number" style="width:300px" onblur="numberValidator(this)" />
	<label><span id="cardno" style="color:#C00;"></span></label>
	</td></tr>
	
	<tr><td><label><span style='color:red;'>*</span><strong>Card holder name:</strong></label></td>
	<td><input  type="text" class="text2" name="cardname" id="input-cardname" temp="Please enter card holder name." placeholder="Enter your name specified on the card" style="width:300px" onblur="validate(this)" />
	<label><span id="cardname" style="color:#C00;"></span></label>
	</td></tr>
	
	<tr><td><label><span style="color:red;">*</span><strong>Card expiry date:</strong></label></td>
	<td><select name="month" id="input-month" temp="Please select month of expiry" onblur="validator1(this)">
	<option value="MM">MM</option>
	<option value="01">01</option>
    <option value="02">02</option>
	<option value="03">03</option>
	<option value="04">04</option>
	<option value="05">05</option>
	<option value="06">06</option>
	<option value="07">07</option>
	<option value="08">08</option>
	<option value="09">09</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
    </select>
	<label ><span id="month" style="color:#C00;"></span></label>
    
	<select name="year" id="input-year" temp="Please select year of expiry" onblur="validator2(this)">
	<option value="YYYY">YYYY</option>
	<option value="2014">2014</option>
    <option value="2015">2015</option>
	<option value="2016">2016</option>
	<option value="2017">2017</option>
	<option value="2018">2018</option>
	<option value="2019">2019</option>
    </select>
	<label ><span id="month" style="color:#C00;"></span></label>
    </td>
	</tr>
	
	<tr><td><label><span style='color:red;'>*</span><strong>Security Code:</strong></label></td>
	<td><input  type="text" class="text2" name="code" id="input-code" temp="Please enter security code." placeholder="Enter last 3 digits displayed on back of your card" style="width:300px" onblur="numberValidator1(this)" />
	<label><span id="code" style="color:#C00;"></span></label>
	</td></tr>
	
	<tr><td><label><span style='color:red;'>*</span><strong>Amount of payment:</strong></label></td>
	<td>Rs.1000</td>
	</td></tr>
	
<?php
}
if($_SESSION['payment']=='Debit Card')
{
?>
<tr><b>Please enter your debit card details and click on submit below:</b><img src="images/mastercard.jpg" height="30px" width="50px" alt="Mastercard logo" align="leftt"/><img src="images/visa.jpg" height="30px" width="50px" alt="Visa logo" align="leftt"/><img src="images/maestro.jpg" height="30px" width="50px" alt="Maestro logo" align="leftt"/></tr>
	
	<tr><td><label><span style='color:red;'>*</span><strong>Select debit card:</strong></label></td>
	<td><select name="debitcard" id="input-debitcard" temp="Please select debit card" onblur="validator3(this)">
	<option value="Select">Select</option>
	<optgroup label="Debit Cards">
	<option value="HDFC Bank">HDFC Bank</option>
    <option value="ICICI Bank">ICICI Bank</option>
	<option value="Axis Bank">Axis Bank</option>
	<option value="SBI Debit Card">SBI Debit Card</option>
	</optgroup>
	<optgroup label="VISA Debit Cards">
	<option value="Axis Bank">Axis Bank</option>
    <option value="Bank of Maharashtra">Bank of Maharashtra</option>
	<option value="Dena Bank">Dena Bank</option>
	<option value="SBI Debit Card">SBI Debit Card</option>
	</optgroup>
	<optgroup label="Master Debit Cards">
	<option value="HDFC Bank">HDFC Bank</option>
    <option value="ICICI Bank">ICICI Bank</option>
	<option value="Axis Bank">Axis Bank</option>
	<option value="SBI Debit Card">SBI Debit Card</option>
	</optgroup>
    </select>
	<label ><span id="debitcard" style="color:#C00;"></span></label>
    </td></tr>
	
	<tr><td><label><span style='color:red;'>*</span><strong>Debit card number:</strong></label></td>
	<td><input  type="text" class="text2" name="dcardno" id="input-dcardno" temp="Please enter credit card number." placeholder="Enter your 16 digit Visa or MasterCard number" style="width:300px" onblur="numberValidator2(this)" />
	<label><span id="dcardno" style="color:#C00;"></span></label>
	</td></tr>
	
	<tr><td><label><span style='color:red;'>*</span><strong>Card holder name:</strong></label></td>
	<td><input  type="text" class="text2" name="dcardname" id="input-dcardname" temp="Please enter card holder name." placeholder="Enter your name specified on the card" style="width:300px" onblur="validate1(this)" />
	<label><span id="dcardname" style="color:#C00;"></span></label>
	</td></tr>
	
	<tr><td><label><span style="color:red;">*</span><strong>Card expiry date:</strong></label></td>
	<td><select name="dmonth" id="input-dmonth" temp="Please select month of expiry" onblur="validator4(this)">
	<option value="MM">MM</option>
	<option value="01">01</option>
    <option value="02">02</option>
	<option value="03">03</option>
	<option value="04">04</option>
	<option value="05">05</option>
	<option value="06">06</option>
	<option value="07">07</option>
	<option value="08">08</option>
	<option value="09">09</option>
	<option value="10">10</option>
	<option value="11">11</option>
	<option value="12">12</option>
    </select>
	<label ><span id="dmonth" style="color:#C00;"></span></label>
    
	<select name="dyear" id="input-dyear" temp="Please select year of expiry" onblur="validator5(this)">
	<option value="YYYY">YYYY</option>
	<option value="2014">2014</option>
    <option value="2015">2015</option>
	<option value="2016">2016</option>
	<option value="2017">2017</option>
	<option value="2018">2018</option>
	<option value="2019">2019</option>
    </select>
	<label ><span id="dyear" style="color:#C00;"></span></label>
    </td>
	</tr>
	
	<tr><td><label><span style='color:red;'>*</span><strong>Security Code:</strong></label></td>
	<td><input  type="text" class="text2" name="dcode" id="input-dcode" temp="Please enter security code." placeholder="Enter last 3 digits displayed on back of your card" style="width:300px" onblur="numberValidator3(this)" />
	<label><span id="dcode" style="color:#C00;"></span></label>
	</td></tr>
	
	<tr><td><label><span style='color:red;'>*</span><strong>Amount of payment:</strong></label></td>
	<td>Rs.1000</td>
	</td></tr>
<?php
}
if($_SESSION['payment']=='Internet Banking')
{
?>
<tr><b>Please select your internet bank and click on submit below:</b></tr>
<tr><td><label><span style='color:red;'>*</span><strong>Select bank:</strong></label></td>
	<td><select name="bank" id="input-bank" temp="Please select your bank" onblur="validator6(this)">
	<option value="Select">Select</option>
	<optgroup label="Select your bank">
	<option value="HDFC Bank">HDFC Bank</option>
    <option value="ICICI Bank">ICICI Bank</option>
	<option value="Axis Bank">Axis Bank</option>
	<option value="State Bank Of India">State Bank Of India</option>
	</optgroup>
	<optgroup label="Other">
	<option value="Allahbad Bank">Allahbad Bank</option>
    <option value="Bank of Maharashtra">Bank of Maharashtra</option>
	<option value="Dena Bank">Dena Bank</option>
	<option value="Vijaya Bank">Vijaya Bank</option>
	</optgroup>
    </select>
	<label ><span id="bank" style="color:#C00;"></span></label>
    </td></tr>
	
	<tr><td><label><span style='color:red;'>*</span><strong>Amount of payment:</strong></label></td>
	<td>Rs.1000</td>
	</td></tr>
<?php
}
?>
</table>   
		</fieldset>
		<p>Fields Marked with <span style='color:red'>*</span> are compulsory</p>

<br>

<input type="submit" alt="SUBMIT" value="Submit" class="button" align="center"/>

<br />
</form>
<br />	
<?php
}
?>
</div>
</div>

</div>
<div class="footer">
  <div class="footer-link">
  <br>Home | Privacy Policy | Terms of use | About
  <br /> www.dbit.in<br /><br />
  </div>
</div>

</div>
</body>
</html>
