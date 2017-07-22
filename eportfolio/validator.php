<?php
if($_SESSION['category']=='Seminar')
{
?>
<script>
$_SESSION['category']
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

function validate1(tag)
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

function numberValidator(tag)
{
	if(tag.value=="" || !isValidNumber(tag.value) || tag.value.length!=10)
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

function isValidNumber(e)
{
	return parseInt(e+"")==e;
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
	var p1=validate(document.getElementById('input-topicname'));
	var p2=validate1(document.getElementById('input-description'));
	var p3=validator(document.getElementById('input-members1'));
	var p4=numberValidator(document.getElementById('input-year1'));
	var p5=validFile(document.getElementById('input-file'));
	return p1&&p2&&p3&&p4&&p5;
	}
	catch(e){alert(e);}
}
</script>
<?php
}
?>