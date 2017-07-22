<?php
if($_SESSION['type']=="Staff")
{
?>
<script  type="text/javascript">
var avail=false;
var codeAvail=false;
function validate(tag)
{
	if(tag.value=="" || tag.value==null)
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validator(tag)
{
	if(tag.value=="Select")
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validator1(tag)
{
	if(tag.value=="Select")
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validator2(tag)
{
	if(tag.value=="Select")
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validator3(tag)
{
	if(tag.value=="Select")
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validator4(tag)
{
	if(tag.value=="Select")
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
}

function validFile(tag)
{
	files=tag.value;
	var m=files.split(".");
	if((files=="") || (files==null) || (!((m[1]== "doc") || (m[1]== "docx") || (m[1]== "pdf"))))
	{
		document.getElementById(tag.name).innerHTML=tag.getAttribute("temp")+"<br>";
		return false;
	}
	else
	{
		document.getElementById(tag.name).innerHTML="";
		return true;
	}
	
}

function validateAll()
{
	try
	{
	var p1=validate(document.getElementById('input-sid'));
	var p2=validator(document.getElementById('input-institute1'));
	var p3=validator1(document.getElementById('input-department'));
	var p4=validator2(document.getElementById('input-branch1'));
	var p5=validator3(document.getElementById('input-experience1'));
	var p6=validator4(document.getElementById('input-expertype1'));
	var p7=validFile(document.getElementById('input-file'));
	return p1&&p2&&p3&&p4&&p5&&p6&&p7;
	}
	catch(e){alert(e);}
}
</script>
<?php
}
?>