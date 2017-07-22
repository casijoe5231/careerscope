<?php 

include("database.php");

$uploaded_file=$_POST['uploaded_file'];
$msg=$_POST['elm4'];


			//Settings 
			$max_allowed_file_size = 25600; // size in KB 
			$allowed_extensions = array("jpg", "jpeg", "gif", "bmp", "pdf", "doc", "txt", "rar");
			$upload_folder = './Upload/'; //<-- this folder must be writeable by the script
			$your_email = 'eportfoliomanagement1@gmail.com';//<<--  update this to your email address

			$errors ='';
			
	//Get the uploaded file information
	$name_of_uploaded_file =  basename($_FILES['uploaded_file']['name']);
	
	//get the file extension of the file
	$type_of_uploaded_file = substr($name_of_uploaded_file, 
							strrpos($name_of_uploaded_file, '.') + 1);
	
	$size_of_uploaded_file = $_FILES["uploaded_file"]["size"]/1024;
	
	///------------Do Validations-------------
	if($size_of_uploaded_file > $max_allowed_file_size ) 
	{
		$errors .= "\n Size of file should be less than $max_allowed_file_size";
	}
	
	//------ Validate the file extension -----
	$allowed_ext = false;
	for($i=0; $i<sizeof($allowed_extensions); $i++) 
	{ 
		if(strcasecmp($allowed_extensions[$i],$type_of_uploaded_file) == 0)
		{
			$allowed_ext = true;		
		}
	}
	
	if(!$allowed_ext)
	{
		$errors .= "\n The uploaded file is not supported file type. ".
		" Only the following file types are supported: ".implode(',',$allowed_extensions);
	}
	
	//send the email 
	if(empty($errors))
	{
		//copy the temp. uploaded file to uploads folder
		$path_of_uploaded_file = $upload_folder . $name_of_uploaded_file;
		$tmp_path = $_FILES["uploaded_file"]["tmp_name"];
		
		if(is_uploaded_file($tmp_path))
		{
		    if(!copy($tmp_path,$path_of_uploaded_file))
		    {
		    	$errors .= '\n error while copying the uploaded file';
		    }
		}	
	}


require("phpmailer/class.phpmailer.php");
		$mail = new PHPMailer();
		$mail->IsSMTP(); // send via SMTP
		$mail->SMTPDebug = 1;
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
		$mail->Username = "eportfoliomanagement1@gmail.com"; // SMTP username
		$mail->Password = "eportfolio"; // SMTP password
		$email=$_POST ['email']; // Recipients email ID
		$mail->FromName = $_POST ['name'];
		$mail->AddAddress($email);
		$mail->AddReplyTo($_POST ['name']);
		$mail->WordWrap = 50; // set word wrap
		$mail->IsHTML(true); // send as HTML
		$mail->Subject =$_POST ['subject'];
		$mail->addAttachment($path_of_uploaded_file);
		$mail->Body=$msg;

		if(!$mail->Send()){
			
			//SPECIFY THE DIRECTORY
			$dir = "./Upload/"; 
	
			// OPEN THE DIRECTORY
			$dirHandle = opendir($dir); 

			if(@unlink($path_of_uploaded_file )){ 
			}
			
			?><script type="text/javascript">
				alert("Cannot send e-Mail to specified e-mail address."); 
				window.location="student_email.php";
			  </script><?php
		}
		else{
			//SPECIFY THE DIRECTORY
			$dir = "./Upload/"; 
	
			// OPEN THE DIRECTORY
			$dirHandle = opendir($dir); 

			if(@unlink($path_of_uploaded_file )){ 
			}
		
			?><script type="text/javascript">
				alert(" Your e-Mail to specified address has been Sent."); 
				window.location="student_email.php";
			</script><?php
		}
		
?>