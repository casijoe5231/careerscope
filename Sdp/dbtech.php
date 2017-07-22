<!DOCTYPE html>

<html lang="en">
<head>
 
<!-- <title>Author Registration</title>-->
<title>
Online Submission - DBITTECH Journal

</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://dbjse.dbit.in/css/bootstrap.min.css">
  <script src="http://dbjse.dbit.in/jquery/jquery-1.11.3.min.js"></script>
  <script src="http://dbjse.dbit.in/js/bootstrap.min.js"></script>
  <link rel="stylesheet" media="screen" href="http://dbjse.dbit.in/css/jquery-ui.min.css">
  
	<link href="http://dbjse.dbit.in/summernote/summernote.css" rel="stylesheet" />
	<script type="text/javascript" src="http://dbjse.dbit.in/summernote/summernote.js"></script>
	
	 
	 <link rel="icon" href="http://127.0.0.1/dbit_conf/new/image/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://127.0.0.1/dbit_conf/new/image/favicon.ico" type="image/x-icon">
</head>
	
    <table style="background-color:#aFFFFF;" width="100%" border="0">
    <tbody><tr>
		<td width="13%" height="80" align="center" valign="bottom">
			<a href="http://www.dbit.in" title="DBIT Tech Journal"><img src="image/newlogo.jpg"  style="width:210px;height:180px;" alt="DBITTECHJ" title="DBIT Tech Journal" border="0"  /></a>
		</td>
		<td colspan="3" background="image/background.jpg" valign="text-top" style="padding:0px;background-size: 100% 100%; background-repeat: no-repeat; background-position: center;">
		

 <br><h2 style="padding:35px;" align="center" class="fontface"><font style="font-size:50px">D</font>BIT <font style="font-size:50px">J</font>ournal of <font style="font-size:50px">S</font>cience and <font style="font-size:50px">E</font>ngineering</h2>
		</td>
		
		
    </tr>
    </tbody></table>

<body>

<nav class="navbar navbar-default" style="background-color: #DFF0D8">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
  <!--  <a class="navbar-brand" href="http://dbjse.dbit.in/">DBIT Tech Journal</a>-->
     <a class="navbar-brand" href="http://dbjse.dbit.in/index.php" style="color: #556B2F">DBIT Tech Journal</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav" style="background-color: #DFF0D8">
  	<!--<li ><a href="http://dbjse.dbit.in/">DBIT Tech Journal</a></li>-->
<!--		   <a class="navbar-brand" href="http://dbjse.dbit.in/">DBIT Tech Journal</a>-->
							<li ><a href="http://dbjse.dbit.in/homepage.php" style="color: #556B2F">Home <span class="sr-only" style="color: #556B2F">(current)</span></a></li>
					<li  class="active"><a href="http://dbjse.dbit.in/author_registration.php" style="color: #556B2F">Author Register</a></li>
				        
        
		
      </ul>
	  
	  <ul class="nav navbar-nav navbar-right" style="background-color: #DFF0D8">
			 <li ><a href="http://dbjse.dbit.in/login.php" style="color: #556B2F">Login/SignUp</a></li>	
	       
       
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<style>
#custom_col{
	margin:1% 0%;
}
#passwordTest {
	width: 400px;
	margin-left: auto;
	margin-right: auto;
	background: #F0F0F0;
	padding: 20px;
	border: 1px solid #DDD;
	border-radius: 4px;
}
#passwordTest input[type="password"]{
	width: 97.5%;
	height: 25px;
	margin-bottom: 5px;
	border: 1px solid #DDD;
	border-radius: 4px;
	line-height: 25px;
	padding-left: 5px;
	font-size: 25px;
	color: #829CBD;
}
#pass-info{
	width: 97.5%;
	height: 25px;
	border: 1px solid #DDD;
	border-radius: 4px;
	color: #829CBD;
	text-align: center;
	font: 12px/25px Arial, Helvetica, sans-serif;
}
#pass-info.weakpass{
	border: 1px solid #FF9191;
	background: #FFC7C7;
	color: #94546E;
	text-shadow: 1px 1px 1px #FFF;
}
#pass-info.stillweakpass {
	border: 1px solid #FBB;
	background: #FDD;
	color: #945870;
	text-shadow: 1px 1px 1px #FFF;
}
#pass-info.goodpass {
	border: 1px solid #C4EEC8;
	background: #E4FFE4;
	color: #51926E;
	text-shadow: 1px 1px 1px #FFF;
}
#pass-info.strongpass {
	border: 1px solid #6ED66E;
	background: #79F079;
	color: #348F34;
	text-shadow: 1px 1px 1px #FFF;
}
#pass-info.vrystrongpass {
	border: 1px solid #379137;
	background: #48B448;
	color: #CDFFCD;
	text-shadow: 1px 1px 1px #296429;
	
.input_fields_wrap .remove_field {
font-size: 0.80em;
}

a {
color: #428bca;
text-decoration: none;
}
	
</style>
<div class="container">
<div class="col-sm-9">

<style>
.error {color: #FF0000;}
</style>
<div class="panel panel-success" >
	<div class="panel-heading">
		<div class="panel-title"><h2> Author Registration	</h2></div>
	</div>   
	<p><span class="error">* required field</span></p>
	<div class="panel-body" >
	
<form action="" class="cmxform" role="form" id="signupForm" method="post">
		<div class="form-group">
			<label for="firstname">Name:</label>
			 <span class="error">* </span>
			<br>
			
			<div class="row">
				<div class="col-sm-2" id="custom_col">
							
			
<select name="title"><option selected value="">--select--</option>
<option value="Mr.">Mr.</option>
<option value="Miss">Miss</option>
<option value="Mrs.">Mrs.</option>
</select> 	
				
				
				</div>
				<div class="col-sm-3" id="custom_col">
					
					<input class="form-control"  id="firstname" name="firstname" type="text" placeholder="First name (required)">
				
				</div>
				
				
				<div class="col-sm-2" id="custom_col">
					
					<input class="form-control"  id="middlename" name="middlename" type="text" placeholder="Middle name">
				</div>
				<div class="col-sm-3" id="custom_col">
					<input class="form-control" id="lastname" name="lastname" type="text" placeholder="Last name (required)">
				</div>
				
			</div>
		</div>
		<div class="form-group">
			<label for="gender">Gender:</label><span class="error">* </span><br>
				</div>
			<label class="radio-nline">
				<input type="radio" id="gender" name="gender" value="male">&nbsp;Male
			</label>&nbsp;&nbsp;&nbsp;
			<label class="radio-nline">
				<input type="radio" id="gender" name="gender" value="female">&nbsp;Female
			</label>&nbsp;&nbsp;&nbsp;
			
	
	
			
		<br><br>	<label for="email">Email:</label><span class="error">* </span><br>

			<input class="form-control" id="email" name="email" type="email" placeholder="Enter your Email-ID ">
	
		<div class="form-group">
		<br>	<label for="mobileno">Mobile No.:</label><span class="error">* </span><br>
			<input class="form-control" id="mobileno" name="mobileno" type="text" placeholder="Enter your Mobile Number">
		</div>
		<div class="form-group">
			<label for="organization_name">Organization Name:</label><span class="error">* </span><br>
			<input class="form-control" id="organization_name" name="organization_name" type="text" placeholder="Enter your Organization name">
		</div>
		<div class="form-group">
			<label for="organization_add">Organization Address:</label><span class="error">* </span><br>
			<textarea class="form-control" id="organization_add" rows="5" name="organization_add" placeholder="Enter your Organization Address"></textarea>
		</div>
		<div class="form-group">
			<label for="password">Password</label><span class="error">* </span><br>
			<input class="form-control" id="password1" name="password" type="password" placeholder="Enter your Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" >
		</div>
		<div class="form-group">
			<label for="confirm_password">Confirm password</label><span class="error">* </span><br>
			<input class="form-control" id="password2" name="confirm_password" type="password" placeholder="Enter your Password again">
		</div>
			</div>


<div id="pass-info"></div>

		<div class="form-group">
			<table border="0">
				<tr>
					<td><br><input type="checkbox" class="checkbox" id="agree" name="agree" style="margin-top:10%;"><br></td>
					<td><label for="agree" style="margin-top:2%;"> &nbsp;&nbsp;&nbsp; <a href="#">Please agree to our policy</a></label></td>
				</tr>
			</table>
		</div>
		<div class="form-group">
			<table border="0">
				<tr>
					<td><br><input type="checkbox" class="checkbox" id="newsletter" name="newsletter" style="margin-top:10%;"><br></td>
					<td><label for="newsletter" style="margin-top:2%;"> &nbsp;&nbsp;&nbsp; I'd like to receive the newsletter</label></td>
				</tr>
			</table>
						
		</div>
		<div class="form-group">
			<button class="submit" type="submit" name="äuth_reg" >Submit</button>
		</div>
</form>

</div>
</div>

</div>
</div>
<script src="lib/jquery.js"></script>
<script src="dist/jquery.validate.js"></script>
<script src="jquery/jquery-ui.min.js"></script>
<script>
$.validator.setDefaults({
	submitHandler: function() {
		//alert("submitted!");
		return true;
	},
	showErrors: function(map, list) {
		// there's probably a way to simplify this
		var focussed = document.activeElement;
		if (focussed && $(focussed).is("input, textarea")) {
			$(this.currentForm).tooltip("close", {
				currentTarget: focussed
			}, true)
		}
		this.currentElements.removeAttr("title").removeClass("ui-state-highlight");
		$.each(list, function(index, error) {
			$(error.element).attr("title", error.message).addClass("ui-state-highlight");
		});
		if (focussed && $(focussed).is("input, textarea")) {
			$(this.currentForm).tooltip("open", {
				target: focussed
			});
		}
	}
});

(function() {
	// use custom tooltip; disable animations for now to work around lack of refresh method on tooltip
	$("#commentForm, #signupForm").tooltip({
		show: false,
		hide: false
	});

	// validate the comment form when it is submitted
	$("#commentForm").validate();

	// validate signup form on keyup and submit
	$("#signupForm").validate({
		rules: {
			title: "required",
			firstname: "required",
			gender: "required", 
			email:"required",
			lastname: "required",
			organization_name: "required",
			organization_add: "required",
			mobileno: {
				required: true,
				minlength: 10
			},
			password: {
				required: true,
 				minlength: 5,
 				maxlength:9
	         			
			},
			confirm_password: {
				
				required: true,
				minlength: 5,
				maxlength:9,
				equalTo: "#password1"

			},
			email: {
				required: true,
				email: true
			},
			topic: {
				required: "#newsletter:checked",
				minlength: 2
				
			},
			agree: "required"
		},
		messages: {
			paper_id: "Please enter your Paper Id",
			title: "Please enter your Title",
			firstname: "Please enter your firstname",
			lastname: "Please enter your lastname",
			mobileno: "Please enter your valid mobile number",
			organization_name: "Please enter your Organization name",
			organization_add: "Please enter your Organization Address",
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				maxlength: "Your password should not exceed 9 characters"
			},
			confirm_password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			},
			email: "Please enter a valid email address",
			agree: "Please accept our policy"	
		}
	});


	//code to hide topic selection, disable for demo
	var newsletter = $("#newsletter");
	// newsletter topics are optional, hide at first
	var inital = newsletter.is(":checked");
	var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
	var topicInputs = topics.find("input").attr("disabled", !inital);
	// show when newsletter is checked
	newsletter.click(function() {
		topics[this.checked ? "removeClass" : "addClass"]("gray");
		topicInputs.attr("disabled", !this.checked);
	});

	$("#signupForm input:not(:submit)").addClass("ui-widget-content");

	$(":submit").button();
})();
</script>




<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	var password1 		= $('#password1'); //id of first password field
	var password2		= $('#password2'); //id of second password field
	var passwordsInfo 	= $('#pass-info'); //id of indicator element
	
	passwordStrengthCheck(password1,password2,passwordsInfo); //call password check function
	
});

function passwordStrengthCheck(password1, password2, passwordsInfo)
{
	//Must contain 5 characters or more
	var WeakPass = /(?=.{5,}).*/; 
	//Must contain lower case letters and at least one digit.
	var MediumPass = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/; 
	//Must contain at least one upper case letter, one lower case letter and one digit.
	var StrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S{5,}$/; 
	//Must contain at least one upper case letter, one lower case letter and one digit.
	var VryStrongPass = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{5,}$/; 
	
	$(password1).on('keyup', function(e) {
		if(VryStrongPass.test(password1.val()))
		{
			passwordsInfo.removeClass().addClass('vrystrongpass').html("Very Strong! (Awesome, please don't forget your pass now!)");
		}	
		else if(StrongPass.test(password1.val()))
		{
			passwordsInfo.removeClass().addClass('strongpass').html("Strong! (Enter special chars to make even stronger");
		}	
		else if(MediumPass.test(password1.val()))
		{
			passwordsInfo.removeClass().addClass('goodpass').html("Good! (Enter uppercase letter to make strong)");
		}
		else if(WeakPass.test(password1.val()))
    	{
			passwordsInfo.removeClass().addClass('stillweakpass').html("Still Weak! (Enter digits to make good password)");
    	}
		else
		{
			passwordsInfo.removeClass().addClass('weakpass').html("Very Weak! (Must be 5 or more chars)");
		}
	});
	
	$(password2).on('keyup', function(e) {
		
		if(password1.val() !== password2.val())
		{
			passwordsInfo.removeClass().addClass('weakpass').html("Passwords do not match!");	
		}else{
			passwordsInfo.removeClass().addClass('goodpass').html("Passwords match!");	
		}
			
	});
}
</script>




<!--button id="print_my_page_btn" onclick="print_my_page()">Print this page</button>
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
</style>
<script>
function print_my_page() {
   document.getElementById("print_my_page_btn").style.display="none";
   window.print();
}
</script-->


<table  width="100%" style="font-size:8.0pt;font-family:Arial;height:80px;"   >
<tr>
<td colspan="2" background="image/background.jpg" valign="text-top" style="padding:0px;background-size: 100% 100%; background-repeat: no-repeat; background-position: center;">
		
		<div style="text-align:center;width:75%">
 		<a href='#'>Help</a> &nbsp;| &nbsp;

		<a href='dbitprivacypolicy.php'>Privacy Policy</a> &nbsp;| &nbsp;

		<a href='#'>Terms and Conditions</a> &nbsp;| &nbsp;

		<a href='http://www.dbit.in'>About Us</a>

		

		</div>	
		
	<div style="text-align:right;width:96%">
 		<a href="copy.php">Copyright &copy; 2016 <a href='javascript: openCopyright()'>DBIT</a>. All rights reserved.
		</div>
		</td>
</tr>


<tr width="100%"><td width=10%>
	</td><td >
	</td>
	<td><a><br></a></td>
</tr>

</table>

</body>
</html>
