<?php include("database.php");

if(isset($_SESSION['login']))
{
?>

<html>

<head>
	<title>E-mail</title>
	<link href="Image/icon1.ico" rel="shortcut icon"/>
</head>

<script type="text/javascript" src="email/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	
	// O2k7 skin (silver)
	tinyMCE.init({
		// General options
		mode : "exact",
		elements : "elm4",
		theme : "advanced",
		skin : "o2k7",
		skin_variant : "black",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "email/css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "email/lists/template_list.js",
		external_link_list_url : "email/lists/link_list.js",
		external_image_list_url : "email/lists/image_list.js",
		media_external_list_url : "email/lists/media_list.js",

	});
</script>

<body>

<table align="center">
<tr><td>
<table border="0">
	<tr>  <td colspan="2"><?php include("header.php"); ?></td>  </tr>
    <tr>  <td colspan="2"><?php include("admenu.php"); ?></td></tr>
	<tr>
    	<td width="200"><?php include("amenu.php"); ?></td>

        <td><fieldset style="width:650">
        <legend class="student">SEND EMAIL</legend>
        <table border="0"  align="center" cellpadding="4" cellspacing="4"><tr><td>&nbsp;</td></tr>
        	<form name="form1" action="admin_email.php" method="post" enctype="multipart/form-data">
  
					<tr><td><label>Subject:</label></td>
       				<td><input name="subject" type="text"/></td></tr>
					
					<tr>
						<td colspan="2"><textarea id="elm4" name="elm4" rows="25" cols="80" style="width: 80%"></textarea></td>
					</tr>
       
                    <tr><td colspan="2" align="center"><input type="submit" name="submit" value="Click to send ur comments"/></td></tr>
	 	 	</form>
			
       	</table>
    	</fieldset></td>
	</tr>
    <tr>  <td colspan="2"><?php include("footer.php"); ?></td></tr>
</table></td></tr>
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

