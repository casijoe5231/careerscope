<?sleep(1)?>

<p>
	<strong>Edited: Lorem ipsum dolor sit amet</strong>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. <em>Duis aute irure dolor in reprehenderit in voluptate velit</em> esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
</p>
<?php
if (isset($_COOKIE["username"]))
  echo "Welcome " . $_COOKIE["username"] . "!<br>";
else
  echo "Welcome guest!<br>";
?>