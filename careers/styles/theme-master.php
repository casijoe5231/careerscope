<?php
// CareerScope Master theme 

// Header Function
function header_fn()
{
	echo "<div class='header'><a href='../'><img src='images/careerscope_banner.png' width='18%' alt='CareerScope logo' align='left'/></a>";
	echo "<img src='images/career.jpg'  width='6%' alt='DBIT'  align='right'/> </div>";
	echo "<div class='header-shadow'></div>";
}

// Footer Function
function footer_fn()
{
	echo "<div class='footer'>";
	echo "<div class='footer-link'>";
	echo "<br><a href='../' style=\"color:white;\">Home</a>"; 
	echo "| Privacy Policy | Terms of use | About";
	echo "<br /> www.dbit.in<br /><br />";
	echo "</div>";
	echo "</div>";
}
function header_admin_fn()
{
	echo "<div class='header'><img src='../images/careerscope_administration.png' width='16%' alt='CareerScope logo' align='left'/>";
	echo "<img src='../images/logo.png'  width='6%' alt='DBIT'  align='right'/> </div>";
	echo "<div class='header-shadow'></div>";
}

// Footer Function
function footer_admin_fn()
{
	echo "<div class='footer'>";
	echo "<div class='footer-link'>";
	echo "<br>Home | Privacy Policy | Terms of use | About";
	echo "<br /> www.dbit.in<br /><br />";
	echo "</div>";
	echo "</div>";
}


?>