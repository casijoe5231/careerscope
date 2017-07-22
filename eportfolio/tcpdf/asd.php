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

require_once('tcpdf\config\lang\eng');
require_once('tcpdf\tcpdf');
require_once('reextratable.php');
require_once('database.php');

    
// get data from users table

$result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM seminar_wp WHERE username = '{$_SESSION['username']}'");

while($row = mysqli_fetch_array($result))
  {
    $fname = $row['firstname'];
    $lname = $row['lastname'];
    $address = $row['address'];
    $country = $row['country'];
    $email = $row['email'];
  }
  
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 

$pdf->SetPrintHeader(false); $pdf->SetPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); 

//set some language-dependent strings
$pdf->setLanguageArray($l); 

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();
// create some HTML content
$htmlcontent = "<html>
                  <body>
                    <table width='500' border='0' align='center' cellpadding='5' cellspacing='0'>
                      <tr>
                        <td width='165'>Extreme Customs Pty. Ltd.</td>
                        <td width='165'>TAX INVOICE</td>";
        
$htmlcontent .= "<td width='165'>" . date('M-d-Y') . "</td></tr>";     

$htmlcontent .=  "<tr>
                    <td width='165'>Order No:</td>
                      <td width='335' colspan='2'>58972</td>
                    </tr>";

$htmlcontent .=  "<tr>
                    <td width='500' colspan='3'>&nbsp;</td>
                    </tr>";    

$htmlcontent .=  "<tr>
                    <td width='165'>CUSTOMER:</td>
                    <td width='335' colspan='2'>" . $fname . "</td>
                  </tr>";

$htmlcontent .= "</table></body></html>";

// output the HTML content
$pdf->writeHTML($htmlcontent, true, 0, true, 0);

$pdf->writeHTML($inlinecss, true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();

//Close and output PDF document
$pdf->Output('example_006.pdf', 'I');

//============================================================+
// END OF FILE                                                 
//============================================================+
?> 

line no: 22877 $cellid = array_push(array('startx' => $this->x,$dom[$trid]['cellpos']));
                        
line no: 21696 array_push($dom[($dom[$key]['parent'])]['trids'], $key);


<?php $dyn_table1 = '<table width="616" cellpadding="4" cellspacing="4" border="0">';
           
$dyn_table1 .= '<tr><th>Name : </th><td >'.$fname.'</td></tr>';
$dyn_table1 .= '<tr><td><img src="'.$pic.'"></td></tr>';							
$dyn_table1 .= '<tr><th>Address :</th><td>'.$address.'<br/>'. $city."-" .$zipcode.'</td></tr>';                             
$dyn_table1 .= '<tr><th>Contact No. : </th><td>'.$mobilenumber.'</td></tr><tr><th>E-mail ID : </th><td>'.$email.'</td></tr>';
$dyn_table1 .= '<tr><th>Branch : </th><td>'.$branch.'</td></tr>';
$dyn_table1 .= '</table>';



$username = mysqli_query($db, "SELECT  pFirstName,pMiddleName, pLastName, ppermAddress1, pMobilenumber, pEmail, ppermCity, ppermZipCode,dob,gender,pic FROM registration WHERE pUserName='{$_SESSION['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));
		
			
			$username= mysqli_fetch_assoc($username);
			$fname=$username['pFirstName'];
			$mname=$username['pMiddleName'];
			$lname=$username['pLastName'];
			$address=$username['ppermAddress1'];
			$mobilenumber=$username['pMobilenumber'];
			$email=$username['pEmail'];
			$city=$username['ppermCity'];
			$zipcode=$username['ppermZipCode'];
			$pic=$username['pic'];
			$dob=$username['dob'];
			$gender=$username['gender'];
			
$sql2 = mysqli_query($db, "SELECT  branch FROM instituteinfo WHERE username='{$_SESSION['username']}'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

			$branch= mysqli_fetch_assoc($sql2);
			$branch=$branch['branch'];


?>
