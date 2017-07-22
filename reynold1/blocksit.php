<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/test.css">
<link rel='stylesheet' href='css/blocksit.css' media='screen' />
<script src="js/jquery-1.9.1.js"></script>
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="js/blocksit.js"></script>
<script>
$(document).ready(function() {
	
	
	
	$('#content').BlocksIt({
		numOfCol: 4,
		offsetX: 8,
		offsetY: 8
	});
	
	console.log($('#content').height());
});
</script>

</head>
<body>



<!-- Content -->

<div id="container">
<div class='header'>
<img src='images/logo.png' height='80px' align='left'>
<h1>TRAINING & PLACEMENT PORTAL</h1>
</div>
<div id='content'>
	<div class="block description">
		<h3>Introduction</h3>
		<p><strong>BlocksIt.js</strong> is a jQuery plugin for creating dynamic grid layout. It manages to convert HTML elements into '<em>blocks</em>' and position them in well-arranged grid layout like <a href="http://www.pinterest.com">Pinterest</a>.</p>
	</div>
	
	<div class="block" data-size="2">
		<h3>How to Use?</h3>
		<p><pre>
$(document).ready(function() {
	$('#container').BlocksIt({
		numOfCol: 4,
		offsetX: 8,
		offsetY: 8,
		blockElement: '.grid'
	});
});</pre></p>
	</div>
	
	<div class="block" style="text-align:center">
		<p>Download <strong>BlocksIt.js</strong> at <br/>
		<a href="http://www.inwebson.com/jquery/blocksit-js-dynamic-grid-layout-jquery-plugin/">Plugin Article Page &raquo;</a></p> 
	</div>
	<div class="block log">
		<h3>Change Log</h3>
		<p>
			<strong>Version 1.0</strong> – First Release, 24th April 2012
		</p>
	</div>
	
	
	
	<div class="block options">
		<h3>Plugin Options</h3>
			
	</div>
	
	<div class="block">
		<h3>License</h3>
		<p><strong>BlocksIt.js</strong> is licensed under the GNU General Public License version 2 or later.</p>
	</div>
	
	<div class="block demo">
		<h3>Demo 1</h3>
		<p>
		<a class="imgholder" href="demo1/">
			<img src="http://www.inwebson.com/demo/blocksit-js/random-grid.jpg" width="210" height="150" alt="" />
		</a>
		Dynamic grid layout with random generated blocks. <strong>REFRESH</strong> the page and see different result!
		</p>
	</div>
	<div class="block demo">
		<h3>Demo 2</h3>
		
	</div>
	<div class="block demo">
		<h3>Buggy?</h3>
		
	</div>
</div>

	
<div class='footer'>
Privacy Policy | Terms of use | FAQ's
</div>	

</div>




</body>
</html>