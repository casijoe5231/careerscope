<html>
<head>
<title>Sending attachment using PHP</title>
</head>
<body>
<?php
//define the receiver of the email
$to = 'priyankamalekar9@gmail.com';
//define the subject of the email
$subject = 'Id proof for verification';
//create a boundary string. It must be unique
//so we use the MD5 algorithm to generate a random hash
$random_hash = md5(date('r', time()));
//define the headers we want passed. Note that they are separated with \r\n
$headers = "From: ojaskarandikar3191@gmail.com\r\nReply-To:priyankamalekar9@gmail.com@";
//add boundary string and mime type specification
$headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\"";
//read the atachment file contents into a string,
//encode it with MIME base64,
//and split it into smaller chunks
$attachment = chunk_split(base64_encode(file_get_contents('../uploads/akshu@gmail.com/InterviewSkills.pdf')));
//define the body of the message.
ob_start(); //Turn on output buffering
?>
--PHP-mixed-<?php echo $random_hash; ?> 
Content-Type: multipart/alternative; boundary="PHP-alt-<?php echo $random_hash; ?>"

--PHP-alt-<?php echo $random_hash; ?> 
Content-Type: text/plain; charset="utf-8"
Content-Transfer-Encoding: 7bit

Hello World!!!
This is simple text email message.

--PHP-alt-<?php echo $random_hash; ?> 
Content-Type: text/html; charset="utf-8"
Content-Transfer-Encoding: 7bit

<h2>Hello World!</h2>
<p>This is something with <b>HTML</b> formatting.</p>

--PHP-alt-<?php echo $random_hash; ?>--

--PHP-mixed-<?php echo $random_hash; ?> 
Content-Type: application/zip; name="attachment.zip" 
Content-Transfer-Encoding: base64 
Content-Disposition: attachment 

<?php echo $attachment; ?>
--PHP-mixed-<?php echo $random_hash; ?>--

<?php
//copy current buffer contents into $message variable and delete current output buffer
$message = ob_get_clean();
//send the email
$mail_sent = @mail( $to, $subject, $message, $headers );
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed"
echo $mail_sent ? "Mail sent" : "Mail failed";
?> 
</body>
</html>

// create email headers
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    //Create a new PHPMailer instance
    $mail = new PHPMailer();
    //Tell PHPMailer to use SMTP
    $mail->IsSMTP();
    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug  = 2;
    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';
    //Set the hostname of the mail server
    $mail->Host       = "hostname";
    //Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Port       = 465;
    //Whether to use SMTP authentication
    $mail->SMTPAuth   = true;
    //Username to use for SMTP authentication
    $mail->Username   = "email";
    //Password to use for SMTP authentication
    $mail->Password   = "password";
    //Set who the message is to be sent from
    $mail->SetFrom($email_from, 'First Last');
    //Set an alternative reply-to address
    //$mail->AddReplyTo('replyto@example.com','First Last');
    //Set who the message is to be sent to
    $mail->AddAddress('email', 'name');
    //Set the subject line
    $mail->Subject = 'Request for Profile Check up';
    //Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
    $mail->MsgHTML($email_message);
    //Replace the plain text body with one created manually
    $mail->AltBody = 'This is a plain-text message body';
    //Attach an image file
    $mail->AddAttachment($file);
    
    //Send the message, check for errors
    if(!$mail->Send()) {
      echo "<script>alert('Mailer Error: " . $mail->ErrorInfo."')</script>";
    } else {
      echo "<script>alert('Your request has been submitted. We will contact you soon.')</script>";
    }
	
	 // Obtain file upload variables:
    $attachment = $_FILES['attachment']['tmp_name']; 
    $attachment_type = $_FILES['attachment']['type']; 
    $attachment_name = $_FILES['attachment']['name'];

    if (file($attachment)) { 
    // Read the file to be attached ('rb' = read binary):
    $file = fopen($attachment,'rb'); 
    $data = fread($file,filesize($attachment)); 
    fclose($file);

    // Generate a boundary string:
    $semi_rand = md5(time()); 
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 

    // Add the headers for a file attachment:
    $headers = "\nMIME-Version: 1.0\n" . 
    "Content-Type: multipart/mixed;\n" . 
    " boundary=\"{$mime_boundary}\"";

    // Add a multipart boundary above the plain message:
    $message = "This is a multi-part message in MIME format.\n\n" . 
    "--{$mime_boundary}\n" . 
    "Content-Type: text/plain; charset=\"iso-8859-1\"\n" . 
    "Content-Transfer-Encoding: 7bit\n\n" . 
    $message . "\n\n";

    // Base64 encode the file data:
    $data = chunk_split(base64_encode($data));  

    // Add file attachment to the message:
    $message .= "--{$mime_boundary}\n" . 
    "Content-Type: {$attachment_type};\n" . 
    " name=\"{$attachment_name}\"\n" . 
    //"Content-Disposition: attachment;\n" . 
    //" filename=\"{$attachment_name}\"\n" . 
    "Content-Transfer-Encoding: base64\n\n" . 
    $data . "\n\n" . 
    "--{$mime_boundary}--\n"; 
    }  

    $body = "$name\n$phone\n$email\n\n$message";
    mail("*@*.com", "Starcrest Escrow, Inc. Website - Real Property Sale", $body, $headers);
    header("Location: confirm.html");