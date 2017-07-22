 <?php
    session_start();
	include 'styles/theme-master.php';
	include '../connection.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Courses</title>
<link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="styles/theme-style.css">
<link rel="stylesheet" type="text/css" href="styles/theme-master.css">
<script src="plugins/ckeditor/ckeditor.js"></script>
</head>
<body>
<div class="bg">
<div class="container">
<?php
header_fn();
?>
<div class="content clearfix">

<!-- CK Editor -->
<div class="editor" style="width:90%;">
<form action="index.php" method="POST">
<h3>Add a course</h3>
<textarea name="editor1">&lt;p&gt;Course Description.&lt;/p&gt;</textarea>
<script>
CKEDITOR.replace( 'editor1', {
    filebrowserBrowseUrl: 'plugins/ckeditor/browser/browse.php?type=Images',
    filebrowserUploadUrl: 'plugins/ckeditor/uploader/upload.php?type=Files'
});
</script>
<br><input type="submit" value="Add Course" class="button">
</form>
</div>

<?php
	echo "<br>Note: Currently text will not be saved. It will be shown below";
	if(isset($_POST[ 'editor1' ]))
	{
    $editor_data = $_POST[ 'editor1' ];
	echo $editor_data;
	}
?>
<br><br><br>
</div>

<?php
footer_fn();
?>
</div>
</div>

</body>
</html>