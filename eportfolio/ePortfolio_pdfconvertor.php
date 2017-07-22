<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2009-09-30
// 
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
// 
// Author: Nicola Asuni
// 
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com s.r.l.
//               Via Della Pace, 11
//               09044 Quartucciu (CA)
//               ITALY
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @copyright 2004-2009 Nicola Asuni - Tecnick.com S.r.l (www.tecnick.com) Via Della Pace, 11 - 09044 - Quartucciu (CA) - ITALY - www.tecnick.com - info@tecnick.com
 * @link http://tcpdf.org
 * @license http://www.gnu.org/copyleft/lesser.html LGPL
 * @since 2008-03-04
 */

require_once('tcpdf\config\lang\eng.php');
require_once('tcpdf\tcpdf.php');
include("database.php");
$name=$_SESSION['user'][1];
// get data from users table

$sq1= mysqli_query($db, "SELECT category, topic, member, year, description,file FROM seminar_wp WHERE username='$name'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$sq2 = mysqli_query($db, "SELECT category,sportsname,position, year,file FROM sports WHERE username='$name'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$sq3 = mysqli_query($db, "SELECT category,cname,module,score,year,file,description FROM certification WHERE username='$name'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$sq4 = mysqli_query($db, "SELECT category,co_name,exp,designation,file FROM work_exp WHERE username='$name'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$sq5 = mysqli_query($db, "SELECT category,ename,award,year,file,description FROM technical_ds WHERE username='$name'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
$sq6 = mysqli_query($db, "SELECT category,papername,year,description,file FROM technical_paper WHERE username='$name'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
 
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 

$pdf->SetPrintHeader(true); 
$pdf->setHeaderMargin(5);
$pdf->SetPrintFooter(true);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 045', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP,PDF_MARGIN_RIGHT);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 

//set some language-dependent strings
$pdf->setLanguageArray($l); 

$pdf->setHeaderData('',0,'ePortfolio','');
$pdf->PageNo();

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'I', 9);

// add a page
$pdf->AddPage();
$head ='<h1 align="center">ePortfolio</h1><br/><br/>';

// create some HTML content

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------
// Table for Seminar/project/workshop

 $dyn_table  = '<table border="1"><td>';
 $dyn_table .= '<table border="0" cellpadding="6" >';

 $caption    ='<caption>Seminar/project/workshop</caption>';
 $dyn_table .= '<tr><td><h4>Category</h4></td><td><h4>Topic Name</h4></td><td><h4>Year</h4></td><td><h4>Description</h4></td></tr>';

while($row = mysqli_fetch_array($sq1)){ 
    
    $category = $row["category"];
    $topicname= $row["topic"];
	$year= $row["year"];
	$description= $row["description"];
	$file= $row["file"];
$dyn_table .= '<tr><td>' . $category . '</td><td>' . $topicname . '</td><td> ' . $year . '</td><td> ' . $description . '</td></tr>';
}
 $dyn_table .= '</table>';
 $dyn_table .= '</td></table>';

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------
// Table for Sports
 $dyn_table1  = '<table border="1"><td>';
 $dyn_table1 .= '<table border="0" cellpadding="6">';
 $caption1    ='<caption>Sports</caption>';
 $dyn_table1 .= '<tr><td><h4>Category</h4></td><td><h4>Sports Name</h4></td><td><h4>Year</h4></td><td><h4>Position</h4></td></tr>';

 while($row = mysqli_fetch_array($sq2)){
    
    $category = $row["category"];
    $sportsname= $row["sportsname"];
	$year= $row["year"];
	$position= $row["position"];
	$file= $row["file"];
    $dyn_table1 .= '<tr><td>'. $category .'</td><td>'. $sportsname .'</td><td>'. $year .'</td><td>'. $position .'</td></tr>';
    }
 $dyn_table1 .= '</table>';
 $dyn_table1 .= '</td></table>';

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------
// Table for Certification
 $dyn_table2 = '<table border="1"><td>';
 $dyn_table2 .= '<table border="0" cellpadding="6">';
 
 $caption2    = '<caption>Certification</caption>';
 $dyn_table2 .= '<tr><td><h4>Category</h4></td><td><h4>Course Name</h4></td><td><h4>Year</h4></td><td><h4>Module</h4></td><td><h4>Score</h4></td><td><h4>Description</h4></td></tr>';

while($row = mysqli_fetch_array($sq3)){ 
    
    $category = $row["category"];
    $cname= $row["cname"];
	$module= $row["module"];
	$year= $row["year"];
	$score= $row["score"];
	$description= $row["description"];
	$file=$row["file"];
	$dyn_table2 .= '<tr><td> ' . $category . '</td><td>' . $cname . '</td><td> ' . $year . '</td><td> ' . $module . '</td><td> ' . $score . '</td><td> ' . $description . '</td></tr>';
}
 $dyn_table2 .= '</table>';
 $dyn_table2 .= '</td></table>';
 
//-----------------------------------------------------------------------------------------------------------------------------------------------------------------
// Table for work experience

 $dyn_table3 = '<table border="1"><td>';
 $dyn_table3 .= '<table border="0" cellpadding="6">';
 $caption3   = '<caption>Work Experience</caption>';
 $dyn_table3 .= '<tr><td><h4>Category</h4></td><td><h4>Company Name</h4></td><td><h4>Experience(in months)</h4></td><td><h4>Designation</h4></td></tr>';

while($row = mysqli_fetch_array($sq4)){ 
    
    $category = $row["category"];
    $co_name= $row["co_name"];
	$exp= $row["exp"];
	$ds= $row["designation"];
	$file=$orw["file"];
	$dyn_table3 .= '<tr><td>' . $category . '</td><td>' . $co_name . '</td><td> ' . $exp . '</td><td> ' . $ds . '</td></tr>';
}
 $dyn_table3 .= '</table>';
 $dyn_table3 .= '</td></table>';

//-----------------------------------------------------------------------------------------------------------------------------------------------------------------
// Table for Technical Fest

 $dyn_table4  = '<table border="1"><td>';
 $dyn_table4 .= '<table border="0" cellpadding="6">';
 $caption4    ='<caption>Technical Fest</caption>';
 $dyn_table4 .= '<tr><td><h4>Category</h4></td><td><h4>Event Name</h4></td><td><h4>Year</h4></td><td><h4>Position</h4></td><td><h4>Description</h4></td></tr>';

while($row = mysqli_fetch_array($sq5)){ 
    
    $category = $row["category"];
    $ename= $row["ename"];
	$position= $row["award"];
	$year= $row["year"];
	$description= $row["description"];
	//$file=$row["file"];
	$dyn_table4 .= '<tr><td>' . $category . '</td><td>' . $ename . '</td><td> ' . $year . '</td><td> ' . $position . '</td><td> ' . $description . '</td></tr>';
}
 $dyn_table4 .= '</table>';
 $dyn_table4 .= '</td></table>';
 
 //-----------------------------------------------------------------------------------------------------------------------------------------------------------------
// Table for Technical Paper

 $dyn_table5  = '<table border="1"><td>';
 $dyn_table5 .= '<table border="0" cellpadding="6">';
 $caption5    ='<caption>Technical Paper</caption>';
 $dyn_table5 .= '<tr><td><h4>Category</h4></td><td><h4>Paper Name</h4></td><td><h4>Year</h4></td><td><h4>Description</h4></td></tr>';

while($row = mysqli_fetch_array($sq6)){ 
    
    $category = $row["category"];
    $papername= $row["papername"];
	$year= $row["year"];
	$description= $row["description"];
	//$file=$row["file"];
	$dyn_table5 .= '<tr><td>' . $category . '</td><td>' . $papername . '</td><td> ' . $year . '</td><td> ' . $description . '</td></tr>';
}
 $dyn_table5 .= '</table>';
 $dyn_table5 .= '</td></table>';

// output the HTML content
$pdf->writeHTML($head,  true, 0, true, 0);

$pdf->writeHTML($caption, true, 0, true, 0);
$pdf->writeHTML($dyn_table,  true, 0, true, 0);

$pdf->writeHTML($caption1, true, 0, true, 0);
$pdf->writeHTML($dyn_table1, true, 0, true, 0);

$pdf->writeHTML($caption3, true, 0, true, 0);
$pdf->writeHTML($dyn_table3, true, 0, true, 0);

$pdf->writeHTML($caption4, true, 0, true, 0);
$pdf->writeHTML($dyn_table4, true, 0, true, 0);

$pdf->writeHTML($caption2, true, 0, true, 0);
$pdf->writeHTML($dyn_table2, true, 0, true, 0);

$pdf->writeHTML($caption5, true, 0, true, 0);
$pdf->writeHTML($dyn_table5, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('example_006.pdf');

//============================================================+
// END OF FILE                                                 
//============================================================+
?>