<?php 
include 'connect1.php';
include 'logic/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Newsfeeds</title>
	<link rel="stylesheet" type="text/css" href="css/news.css"/>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.totemticker.js"></script>
	<script type="text/javascript">
		$(function(){
			$('#vertical-ticker').totemticker({
				row_height	:	'50px',
				next		:	'#ticker-next',
				previous	:	'#ticker-previous',
				stop		:	'#stop',
				start		:	'#start',
				mousestop	:	true,
				interval    :   3000
			});
		});
	</script>
</head>
<body>
	
	
	
	<div id="wrapper">
	
		<h1 class="logo">Totem Ticker</h1>
	<?php news();?>
		<p><a href="#" id="ticker-previous">Previous</a> / <a href="#" id="ticker-next">Next</a> / <a id="stop" href="#">Stop</a> / <a id="start" href="#">Start</a></p>
		<p>Roll over the ticker to stop scrolling</p>
		
	</div>
	
	
	
</body>	
</html>