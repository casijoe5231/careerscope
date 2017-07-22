<?php
// CareerScope Master theme 
// Note: changes made in the functions below will be reflected across all pages using these functions.
// Header Function
function header_fn()
{
	echo "<div class='header'><img src='../images/careerscope_banner.png' width='18%' alt='CareerScope logo' align='left'/>";
	echo "<img src='../images/logo.png'  width='6%' alt='DBIT'  align='right'/> </div>";
	echo "<div class='header-shadow'></div>";
}

// Footer Function
function footer_fn()
{
	echo "<div class='footer'>";
	echo "<div class='footer-link'>";
	echo "<br>Home | Privacy Policy | Terms of use | About";
	echo "<br /> www.dbit.in<br /><br />";
	echo "</div>";
	echo "</div>";
}

//If admin page requires different header & footer styling
//Header Function
function header_fn1()
{
	echo "<div class='header'><img src='../images/careerscope_banner.png' width='16%' alt='CareerScope logo' align='left'/>";
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