<html><head><title>Skill Assessment Home</title>
<link rel="icon" href="../images/favicon.png" type="image/png" sizes="16x16">
<link rel="stylesheet" type="text/css" href="../styles/style_staff.css">
<!-- Modal -->
<!-- Contact Form CSS files -->
<link type='text/css' href='css/basic.css' rel='stylesheet' media='screen' />
<!-- Load jQuery, SimpleModal and Basic JS files -->
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/basic.js'></script>
<script>
function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}

</script> 
<!-- Modal ends here -->

</head>
<body>
<?php
echo "<div id='basic-modal'> <a href='#' class='basic' style=\"border:1px solid #09F; background:#09F; padding:2px; color:#FFF;  border-radius:5px;\" onClick=\"setCookie('skill_username','admin',1)\">Detailed Report</a> </div>   </td></tr>";


?>
</body>