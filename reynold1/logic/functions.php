<?php
	
	
	function news()
	{
	$sql=mysqli_query($GLOBALS["___mysqli_ston"], "select distinct cname,date,venue,aggregate,title from company");
	echo "<ul id='vertical-ticker'>";
	while($row=mysqli_fetch_array($sql))
	{
	echo "<li>".$row['cname']."&nbsp;placement drive&nbsp;";
	echo "&nbsp; on&nbsp;".$row['date']."";
	echo "&nbsp; at&nbsp;".$row['venue']."<br>";
	$q=urlencode($row['cname']);
	$p=urlencode($row['title']);
	echo "criteria&nbsp;".$row['aggregate']."%&nbsp;<a href='appeared.php?q=$q&p=$p' target='_blank'>Read More</a></li>";
	
	}
	echo "</ul>";
	}
	?>