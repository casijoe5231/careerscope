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
function lengthValidate(tag,component,min,max)
{
	if(!(tag.value.length>=min && tag.value.length<=max))
	{
		document.getElementById(tag.name).innerHTML=component+" must be atleast of "+min+" characters and atmost "+max+" characters.<br>";
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
function emailValidator(tag)
{
	mail=tag.value;
	var atpos=mail.indexOf("@");
	var dotpos=mail.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=mail.length)
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
function passValidate(tag)
{
	if(document.getElementById('pass-one').value!=tag.value )
	{
		document.getElementById(tag.name).innerHTML="Password do not match.<br>";
		tag.value="";
		document.getElementById('pass-one').value="";
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
	var p1=validate(document.getElementById('input-fname'));
	var p2=validate(document.getElementById('input-lname'));
	var p4=emailValidator(document.getElementById('input-email'));
	var p8=validate(document.getElementById('input-username'));
	var p9=lengthValidate(document.getElementById('pass-one'),'Password',8,16);
	var p10=passValidate(document.getElementById('input-repassword'));
	var p11=callme(document.getElementById('input-username'));
	return p1&&p2&&p4&&p8&&p9&&p10&&avail;
	}
	catch(e){alert(e);}
}
function callme(tag)
	{
		document.getElementById("username").innerHTML="";
		try
		{
			var xmlhttp;
			var username=tag.value;
			if(username.length==0)
			{
				document.getElementById("username").innerHTML="Specify the Username.<br>";
				return false;
			}
			if(username.length<5 || username.length>12)
			{
				document.getElementById("username").innerHTML="Username must be atleast of 5 characters and atmost 12 characters.<br>";
				return false;
			}
			if(window.XMLHttpRequest)
				xmlhttp=new XMLHttpRequest();
			else
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			var url = "userNameChecker.php";
			var params="username="+username;
			xmlhttp.open("POST", url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

			xmlhttp.onreadystatechange = function() 
			{
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					document.getElementById("username").innerHTML=xmlhttp.responseText;
					if(xmlhttp.responseText.search(".*Available.*")!=-1)
						avail=true;
					else
						avail=false;
				}
			}
			xmlhttp.send(params);
		}
		catch(e)
		{
			alert(e+'alert me');
		}
	}
