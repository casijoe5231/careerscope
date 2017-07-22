<?php 
include("../connection1.php");	

$_SESSION['category']= $_POST['category'];
$_SESSION['update']= $_POST['update'];
$username = $_SESSION['username'];
$category=$_SESSION['category'];
$update=$_SESSION['update'];
$delete=$_POST['delete'];
$next=$_POST['next'];

if(isset($_SESSION['user']))
{
?>

<html>
<head>
<title>Home Page of Student e-Portfolio</title>
<link href="Image/icon1.ico" rel="shortcut icon"/>
<?php include("theme_set.php"); ?>
<script type="text/javascript">
function GetXmlHttpObject()
{ 
	var objXMLHttp=null
	if (window.XMLHttpRequest)
	{
		objXMLHttp=new XMLHttpRequest()
	}
	else if (window.ActiveXObject)
	{
		objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
	}
	return objXMLHttp
}

function getdata(page)
{

	function stateChanged1() 
	{	
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 
			document.getElementById("display").innerHTML=xmlHttp.responseText;
			//document.write(xmlHttp.responseText);   
		}
	}

	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	{	
		alert ("Browser does not support HTTP Request");
		return
	}

	var category = document.getElementById("category").value;
	var username = document.getElementById("username").value;
	var update = document.getElementById("update").value;
	var delete1 = document.getElementById("delete").value;
	
	var url="sachive1(inc).php?category="+category+"&username="+username+"&update="+update+"&page="+page+"&delete="+delete1;
	//alert(url);
	xmlHttp.onreadystatechange = stateChanged1;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	
}

function test(s)
{
  var iChars = "!@#$%^&*()+=-[]\;,/{}|\":<>?";

  for (var i = 0; i < s.length; i++) 
  {
  	if (iChars.indexOf(s.charAt(i)) != -1 ) 
  	{
  	return true;
  	}
  }
  return false;  
}

function isInteger(s)
{   var i;
    for (i = 0; i < s.length; i++)
    {   
        // Check that current character is number.
        var c = s.charAt(i);
        if ((c == "0")|| (c == "1")|| (c == "2")|| (c=="3")|| (c=="4")|| (c=="5")|| (c=="6")|| (c=="7")|| (c=="8") || (c == "9")) 
		return true;
	}
    // All characters are numbers.
    return false;
}

function isAlphabet(s)
{   var i;
    for (i = 0; i < s.length; i++)
    {   
        // Check that current character is alphabet.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return true;
    }
    // All characters are alphabet.
    return false;
}
</script>
<script type="text/javascript">
function validateForm1(){
if(document.getElementById('sportname').value=='' || test(document.getElementById('sportname').value)==true)
{
alert("Please enter a sport name.");
return false;
}
if(document.getElementById('syear').value=='' || isInteger(document.getElementById('syear').value)==false)
{
alert("Please enter the year.");
return false;
}
if(document.getElementById('sposition').value=='')
{
alert("Please select position.");
return false;
}
return true;
}
function validateForm2(){
if(document.getElementById('topic').value=='' || test(document.getElementById('topic').value)==true)
{
alert("Please enter topic.");
return false;
}
if(document.getElementById('seyear').value=='' || isInteger(document.getElementById('seyear').value)==false)
{
alert("Please enter year.");
return false;
}
if(document.getElementById('sedesc').value=='' || test(document.getElementById('sedesc').value)==true)
{
alert("Please enter description.");
return false;
}
return true;
}
function validateForm3(){
if(document.getElementById('wtopic').value=='' || test(document.getElementById('wtopic').value)==true)
{
alert("Please enter topic.");
return false;
}
if(document.getElementById('wyear').value=='' || isInteger(document.getElementById('wyear').value)==false)
{
alert("Please enter year.");
return false;
}
if(document.getElementById('wdesc').value=='' || test(document.getElementById('wdesc').value)==true)
{
alert("Please enter description.");
return false;
}
return true;
}
function validateForm4(){
if(document.getElementById('ptopic').value=='' || test(document.getElementById('ptopic').value)==true)
{
alert("Please enter topic.");
return false;
}
if(document.getElementById('pyear').value=='' || isInteger(document.getElementById('pyear').value)==false)
{
alert("Please enter year.");
return false;
}
if(document.getElementById('pdesc').value=='' || test(document.getElementById('pdesc').value)==true)
{
alert("Please enter description.");
return false;
}
return true;
}
function validateForm5(){
if(document.getElementById('ename').value=='' || test(document.getElementById('ename').value)==true)
{
alert("Please enter name.");
return false;
}
if(document.getElementById('tfyear').value=='' || isInteger(document.getElementById('tfyear').value)==false)
{
alert("Please enter year.");
return false;
}
if(document.getElementById('tfdesc').value=='' || test(document.getElementById('tfdesc').value)==true)
{
alert("Please enter description.");
return false;
}
if(document.getElementById('tfposition').value=='')
{
alert("Please select position.");
return false;
}
return true;
}
function validateForm6(){
if(document.getElementById('dename').value=='' || test(document.getElementById('dename').value)==true)
{
alert("Please enter name.");
return false;
}
if(document.getElementById('dyear').value=='' || isInteger(document.getElementById('dyear').value)==false)
{
alert("Please enter year.");
return false;
}
if(document.getElementById('ddesc').value=='' || test(document.getElementById('ddesc').value)==true)
{
alert("Please enter description.");
return false;
}
if(document.getElementById('daward').value=='')
{
alert("Please select position");
return false;
}
return true;
}
function validateForm7(){
if(document.getElementById('dsename').value=='' || test(document.getElementById('dsename').value)==true)
{
alert("Please enter name.");
return false;
}
if(document.getElementById('dsyear').value=='' || isInteger(document.getElementById('dsyear').value)==false)
{
alert("Please enter year.");
return false;
}
if(document.getElementById('dsdesc').value=='' || test(document.getElementById('dsdesc').value)==true)
{
alert("Please enter description.");
return false;
}
if(document.getElementById('dsaward').value=='')
{
alert("Please select position.");
return false;
}
return true;
}
function validateForm8(){
if(document.getElementById('ccname').value=='' || test(document.getElementById('ccname').value)==true)
{
alert("Please enter name.");
return false;
}
if(document.getElementById('ccmodule').value=='' || test(document.getElementById('ccmodule').value)==true)
{
alert("Please enter module.");
return false;
}
if(document.getElementById('ccyear').value=='' || isInteger(document.getElementById('ccyear').value)==false)
{
alert("Please enter year.");
return false;
}
if(document.getElementById('ccdesc').value=='' || test(document.getElementById('ccdesc').value)==true)
{
alert("Please enter description.");
return false;
}
if(document.getElementById('ccscore').value=='' || isInteger(document.getElementById('ccscore').value)==false)
{
alert("Please enter score.");
return false;
}
return true;
}
function validateForm9(){
if(document.getElementById('weco_name').value=='' || test(document.getElementById('weco_name').value)==true)
{
alert("Please enter name.");
return false;
}
if(document.getElementById('wee').value=='' || isInteger(document.getElementById('wee').value)==false)
{
alert("Please enter experience.");
return false;
}
if(document.getElementById('wedesc').value=='' || test(document.getElementById('wedesc').value)==true)
{
alert("Please enter description.");
return false;
}
return true;
}
function validateForm10(){
if(document.getElementById('tpname').value=='' || test(document.getElementById('sportname').value)==true)
{
alert("Please enter name.");
return false;
}
if(document.getElementById('tpyear').value=='' || isInteger(document.getElementById('tpyear').value)==false)
{
alert("Please enter year." );
return false;
}
if(document.getElementById('tpdesc').value=='' || test(document.getElementById('tpdesc').value)==true)
{
alert("Please enter description.");
return false;
}
if(document.getElementById('tpuploadpaper').value=='')
{
alert("Please select an Item.");
return false;
}
return true;
}
function validateForm11(){
if(document.getElementById('eqdegree').value=='')
{
alert("Please enter degree.");
return false;
}
if(document.getElementById('eqcolname').value=='')
{
alert("Please enter institute name.");
return false;
}
if(document.getElementById('eqboardname').value=='')
{
alert("Please enter board/university.");
return false;
}
if(document.getElementById('eqper').value=='')
{
alert("Please enter percentage.");
return false;
}
if(document.getElementById('eqyop').value=='' || isInteger(document.getElementById('eqyop').value)==false)
{
alert("Please enter year of passing.");
return false;
}
return true;
}
function validateForm12(){
var category=document.getElementById('category').value;
if(category == "Sports")
{
if(document.getElementById('spname').value=='' || test(document.getElementById('spname').value)==true)
{
alert("Please enter sport name.");
return false;
}
if(document.getElementById('syear').value=='' || isInteger(document.getElementById('syear').value)==false)
{
alert("Please enter year.");
return false;
}
if(document.getElementById('spo').value=='')
{
alert("Please select position.");
return false;
}
return true;
}
else if(category == "Seminar" || category == "Work Shop" || category == "Project")
{
if(document.getElementById('pname').value=='' || test(document.getElementById('pname').value)==true)
{
alert("Please enter name.");
return false;
}
if(document.getElementById('pyear').value=='' || isInteger(document.getElementById('pyear').value)==false)
{
alert("Please enter year.");
return false;
}
if(document.getElementById('pdesc').value=='' || test(document.getElementById('pdesc').value)==true)
{
alert("Please enter description.");
return false;
}
return true;
}
else if(category == "Certification Course")
{
if(document.getElementById('cname').value=='' || test(document.getElementById('cname').value)==true)
{
alert("Please enter name.");
return false;
}
if(document.getElementById('cmod').value=='' || test(document.getElementById('cmod').value)==true)
{
alert("Please enter module name.");
return false;
}
if(document.getElementById('csco').value=='' || isInteger(document.getElementById('csco').value)==false)
{
alert("Please enter score.");
return false;
}
if(document.getElementById('cyear').value=='' || isInteger(document.getElementById('cyear').value)==false)
{
alert("Please enter year.");
return false;
}
if(document.getElementById('cdesc').value=='' || test(document.getElementById('cdesc').value)==true)
{
alert("Please enter description.");
return false;
}
return true;
}
else if(category == "Techinal Fest" || category == "Drawing" || category == "Dancing/Singing" )
{
if(document.getElementById('ename').value=='' || test(document.getElementById('ename').value)==true)
{
alert("Please enter name.");
return false;
}
if(document.getElementById('tyear').value=='' || isInteger(document.getElementById('tyear').value)==false)
{
alert("Please enter year.");
return false;
}
if(document.getElementById('tdesc').value=='' || test(document.getElementById('tdesc').value)==true)
{
alert("Please enter description.");
return false;
}
if(document.getElementById('tpost').value=='')
{
alert("Please enter position.");
return false;
}
return true;
}
else if(category == "Work Experience")
{
if(document.getElementById('wename').value=='' || test(document.getElementById('wename').value)==true)
{
alert("Please enter name.");
return false;
}
if(document.getElementById('wexp').value=='' || isInteger(document.getElementById('wexp').value)==false)
{
alert("Please enter experience.");
return false;
}
if(document.getElementById('wdes').value=='' || test(document.getElementById('wdes').value)==true)
{
alert("Please enter designation.");
return false;
}
return true;
}
else if(category == "Technical Paper/Publication")
{
if(document.getElementById('tpname').value=='' || test(document.getElementById('tpname').value)==true)
{
alert("Please enter name.");
return false;
}
if(document.getElementById('tpyear').value=='' || isInteger(document.getElementById('tpyear').value)==false)
{
alert("Please enter year.");
return false;
}
if(document.getElementById('tdesc').value=='' || test(document.getElementById('tdesc').value)==true)
{
alert("Please enter description.");
return false;
}
return true;
}
}
</script>
</head>

<body>

<table align="center">  
<tr><td>
  <table border="0"> 
	<tr>  <td colspan="2"><?php include("header1.php"); ?></td>  </tr>
    <tr>  <td colspan="2"><?php include("menu.php"); ?>
    <tr>  <td colspan="2"><?php include("stopmenu.php"); ?>
	<input type="hidden" id="username" value="<?php echo $username; ?>">
	<input type="hidden" id="update" value="<?php echo $update; ?>">
    <input type="hidden" id="delete" value="<?php echo $delete; ?>">
	</td></tr>
	<tr>
    	<td  width="200"><?php include("smenu.php"); ?></td>

        <td><fieldset style="width:600">
        <legend class="student">ENTER ABOUT YOUR ACHIVEMENTS</legend>
        
        <table border="0"  align="center" cellpadding="4" cellspacing="4">
        <form name="create" method="post" action="sachieve(save).php" enctype="multipart/form-data" onsubmit='return validateForm12();'>			
                    <tr align='left'>
    						<th>Category:</th><td><?php echo $category; ?></td>
                            <input type="hidden" id="category" name="category" value="<?php echo $category; ?>">
  					</tr>
                    
                    <?php 
					$flag=1;
					
					if($category=='Sports')
					$table = "sports";
					if($category=='Seminar' || $category=='Work Shop' || $category=='Project')
					$table = "seminar_wp";
					if($category=='Certification Course')
					$table = "certification";
					if($category=='Techinal Fest')
					$table = "technical_ds";
					if($category=='Technical Paper/Publication')
					$table = "technical_paper";
					if($category=='Work Experience')
					$table = "work_exp";
					
					$number = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM $table WHERE username='".$_SESSION['username']."'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
					if(mysqli_num_rows($number)==0)
					{
						echo "<center><b>No records present</b></center>";
						$flag=0;
					}

					if($update == "UPDATE/DELETE"){
						if($flag==1)
						{
                    	echo '<tr><td colspan="4" id="display"></td></tr>';
					?><tr><td align="center" colspan="4"><input type="button" value="<<" onClick="getdata('previous_page')"/><input type="button" value=">>" onClick="getdata('next_page')"/></td></tr><?php
						}
                    } else if($next == "ADD RECORD"){?>
                    	<tr><td colspan="4"><?php include("sachive1(inc).php");?></td></tr>
						<input type="hidden" id="category" name="category" value="<?php echo $category; ?>">
                        <tr><td align="center" colspan="4"><input type="submit" name="save" value="SAVE"/></td></tr>
                    <?php }?>
</form>
</table>
    </fieldset></td>
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