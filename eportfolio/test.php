<?php
ob_start();
session_start();
$email=$_SESSION['user'][0];
$name=$_SESSION['user'][1];
require_once('tcpdf\config\lang\eng.php');
require_once('tcpdf\tcpdf.php');
include("database.php");

$username = mysqli_query($db, "SELECT  * FROM acadportfolio WHERE email='$email'") or die(mysqli_error($GLOBALS["___mysqli_ston"]));

			$username= mysqli_fetch_assoc($username);
			$file=$username['file'];

	
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); 

// set footer fonts
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


// set font
$pdf->SetFont('times', '', 9);

// add a page
$pdf->AddPage();
$head1 ='<h1 align="center">RESUME</h1>';
// create some HTML content
$dyn_table1 = '<table align="left" border="0">';

$dyn_table1 .= '<tr align="left">
	 	  				<td style="font-family:Comic Sans">&nbsp;</td>
						<td rowspan="4" align="right"><img src="'.$file.'" width="140" height="160" border="1" align="right"></td>
					</tr>';
$dyn_table1 .= '<tr align="left">
	 	  				<td style="font-family:Comic Sans">&nbsp;</td>
	 	  				<td style="font-family:Comic Sans">&nbsp;</td>
					</tr>';
$dyn_table1 .= '<tr align="left">
	 	  				<td>&nbsp;</td>
	 	  				<td>&nbsp;</td>
					</tr>';
$dyn_table1 .= '<tr align="left">
						<td style="font-family:Comic Sans"><h3>'.$name.'<br>'.$email.'</h3></td>
						<td style="font-family:Comic Sans">&nbsp;</td>
					</tr>';
$dyn_table1 .= '<tr align="left">
						<td colspan="10"><p>--------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p></td>
						<td style="font-family:Comic Sans">&nbsp;</td>
					</tr>';
$dyn_table1 .= '</table>';


	
$hobbies = $_GET['hobbies'];
$languages = $_GET['languages'];
$objective = $_GET['objective'];
$reference = $_GET['reference'];
$wrk_exp=$_GET['wrk_exp'];
$ts_os=$_GET['ts_os'];
$ts_pl=$_GET['ts_pl'];
$ts_sl=$_GET['ts_sl'];
$ts_oth=$_GET['ts_oth'];
$skill1=$_GET['skill1'];
$skill2=$_GET['skill2'];

$dyn_table = '<table width="616" cellpadding="4" cellspacing="1">';

if($_GET['co']!='undefined')
$dyn_table .= '<tr align="left"><td width="25%"><h4>CAREER OBJECTIVES</h4></td><td>'.$objective.'</td></tr>';

if($_GET['ts']!='undefined')
$dyn_table .= '<tr><td align="left" width="25%"><h4>TECHNICAL SKILLS</h4></td>
					<td style="font-family:Comic Sans" align="left" width="75%">
						<table border="0" width="100%">';
if($_GET['hts_os']!='undefined')
$dyn_table .= '<tr>
				<td align="left" width="35%">Operating Systems: </td>
				<td style="font-family:Comic Sans">'.$ts_os.'</td>
			</tr>';
			
if($_GET['hts_pl']!='undefined')
$dyn_table .= '<tr>
								<td align="left" width="35%">Programming Languages: </td>
								<td style="font-family:Comic Sans">'.$ts_pl.'</td>
							</tr>';

if($_GET['hts_sl']!='undefined')
$dyn_table .= '<tr>
								<td align="left" width="35%">Scripting Languages: </td>
								<td style="font-family:Comic Sans">'.$ts_sl.'</td>
							</tr>';

if($_GET['hts_oth']!='undefined')
$dyn_table .= '<tr>
								<td align="left" width="35%">Others: </td>
								<td style="font-family:Comic Sans">'.$ts_oth.'</td>
							</tr>';
							
if($_GET['ts']!='undefined')
$dyn_table .= '</table>
					</td></tr>';
					
if($_GET['oth_skills']!='undefined')
$dyn_table .= '<tr><td align="left" width="25%"><h4>OTHER SKILLS</h4></td>
					<td style="font-family:Comic Sans" align="left" width="75%">
						<table border="0" width="100%">';
	
if($_GET['hskill1']!='undefined')
$dyn_table .= '<tr>
				<td align="left" width="35%">Skill 1: </td>
				<td style="font-family:Comic Sans">'.$skill1.'</td>
			</tr>';
			
if($_GET['hskill2']!='undefined')
$dyn_table .= '<tr>
								<td align="left" width="35%">Skill 2: </td>
								<td style="font-family:Comic Sans">'.$skill2.'</td>
							</tr>';
						
if($_GET['oth_skills']!='undefined')
$dyn_table .= '</table>
					</td></tr>';
					
if($_GET['ed']!='undefined')
$dyn_table .= '<tr><td style="font-family:Comic Sans"><h4>EDUCATION DETAILS</h4></td><td style="font-family:Comic Sans">&nbsp;</td></tr>
					<tr><td>
                       	<table border="0" width="620" cellspacing="6">
							<tr><th><b>Qualification</b></th><th width="100"><b>Institute Name</b></th><th width="100"><b>Board/ University</b></th><th width="100"><b>Specialization</b></th><th width="75"><b>Percentage</b></th><th width="50"><b>Yop</b></th></tr>
							<tr><td>BE</td><td>Don Bosco Institute of Technology</td>
							<td>Mumbai</td><td>'.$branch.'</td><td>'.$be_percent.'</td><td>'.$be_yop.'</td></tr>';
if($hsc_yop!="N/A" && $hsc_yop!='undefined')
{
$dyn_table .= '				<tr><td>HSC</td><td>'.$hsc_prev_inst.'</td>
							<td>'.$hsc_board.'</td><td>'.$hsc_spc.'</td><td>'.$hsc_percent.'</td><td>'.$hsc_yop.'</td></tr>';
}
if($dip_yop!="N/A" && $dip_yop!='undefined')
{
$dyn_table .= '				<tr><td>DIPLOMA</td><td>'.$dip_prev_inst.'</td>
							<td>'.$dip_board.'</td><td>'.$dip_spc.'</td><td>'.$dip_percent.'</td><td>'.$dip_yop.'</td></tr>';
}
if($ssc_yop!="N/A" && $ssc_yop!='undefined')
{
$dyn_table .= '				<tr><td>SSC</td><td>'.$ssc_ins_name.'</td>
							<td>'.$ssc_board.'</td><td>N/A</td><td>'.$ssc_percent.'</td><td>'.$ssc_yop.'</td></tr>';
}
if($_GET['ed']!='undefined')
$dyn_table .='</table>
						</td><td></td></tr>';

if($_GET['we']!='undefined')
$dyn_table .= 		'<tr><td style="font-family:Comic Sans">&nbsp;</td><td style="font-family:Comic Sans">&nbsp;</td></tr>
					<tr><td align="left"><h4>WORK EXPERIENCE</h4></td><td>'.$wrk_exp.'</td></tr>
					<tr><td>&nbsp;</td><td>&nbsp;</td></tr>';

if($_GET['pd']!='undefined')
$dyn_table .= 		'<tr><td align="left"><h4>PERSONAL DETAILS</h4></td><td>&nbsp;</td></tr>
					<tr><td align="left" colspan="20"><table border="0" width="100%">
 					<tr><th align="left" width="125px">Address :</th><td colspan="5" style="font-family:Comic Sans">'.$address.'</td></tr>
                    <tr><th align="left">Contact No. : </th><td style="font-family:Comic Sans">'.$mobilenumber.'</td></tr>
					<tr><th align="left">Category : </th><td style="font-family:Comic Sans">'.$category.'</td></tr>
					<tr><th align="left">Date Of Birth :</th><td colspan="2">'.$dob.'</td></tr>
					<tr><th align="left">Gender : </th><td colspan="2">'.$gender.'</td></tr>
					</table></td><td>&nbsp;</td></tr>
					</table>';

$dyn_table2 = '<table width="880" cellpadding="4" cellspacing="4" border="0">';    
if($_GET['ho']!='undefined')     
$dyn_table2 .= '<tr><td width="18%"><h4>HOBBIES</h4></td><td>'.$hobbies.'</td></tr>';
if($_GET['lk']!='undefined')
$dyn_table2 .= '<tr><td width="18%"><h4>LANGUAGES KNOWN</h4></td><td>'.$languages.'</td></tr>';
if($_GET['ref']!='undefined')
$dyn_table2 .= '<tr><td width="18%"><h4>REFERENCES</h4></td><td>'.$reference.'</td></tr>';
$dyn_table2 .= '<tr><td width="200">&nbsp;</td><td align="right">&nbsp;</td></tr>';
$dyn_table2 .= '<tr><td width="200">&nbsp;</td><td align="center"><b>Sign & Stamp:</b></td></tr>';
$dyn_table2 .= '</table>';


// output the HTML content
$pdf->writeHTML($head1,  true, 0, true, 0);
$pdf->writeHTML($dyn_table1,  true, 0, true, 0);
$pdf->writeHTML($head2,  true, 0, true, 0);
$pdf->writeHTML($dyn_table,  true, 0, true, 0);
$pdf->writeHTML($head3,  true, 0, true, 0);
$pdf->writeHTML($dyn_table2,  true, 0, true, 0);

// reset pointer to the last page
$pdf->lastPage();
//Close and output PDF document
$pdf->Output('example_007.pdf');

//Save pdf on the server
$dir = "/pdf/";
$content = $pdf->Output($ldap_username.'.pdf','F');
file_put_contents("$dir",$content);

include("pdf2text.php");
$result = pdf2text ($ldap_username.'.pdf');

file_put_contents($ldap_username.".txt", $result);
ob_flush();
?>