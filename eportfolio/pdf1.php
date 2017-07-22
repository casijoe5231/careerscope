<?php
    session_start();
	if(isset($_SESSION['user']))
	{
	include '../connection1.php';
?>

<?php
require('../plugins/fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../images/logo.png',55,7,15);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Technical Test Report',0,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}





// Write HTML
function PDF($orientation='P', $unit='mm', $size='A4')
{
    // Call parent constructor
    $this->FPDF($orientation,$unit,$size);
    // Initialization
    $this->B = 0;
    $this->I = 0;
    $this->U = 0;
    $this->HREF = '';
}

function WriteHTML($html)
{
    // HTML parser
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
            // Tag
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extract attributes
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Opening tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Closing tag
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modify style and select corresponding font
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}
function PutLink($URL, $txt)
{
    // Put a hyperlink
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}

//Close
}


// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
//for($i=1;$i<=40;$i++)
//    $pdf->Cell(0,10,'Printing line number '.$i,0,1);



// Custom


$email=$_GET['email'];
$name=$_GET['name'];





		
// Display HTML	
$text2="<b>Name: </b><b><i>".$name."</b></i><br>";
$text4="<br><b>Scores: </b><br>";		


$pdf->SetFont('Times','B',14);
$pdf->Cell(200,20,'Test Report ',0,1,'C');
$pdf->SetFont('Times','',14);
$pdf->WriteHTML($text2);
$pdf->WriteHTML($text4);

$pdf->SetFont('Times','B',14);
$pdf->Cell(25,5,'Test Name',1,0,'C',0);
$pdf->Cell(27,5,'Level',1,0,'C',0);
$pdf->Cell(22,5,'Attempts',1,0,'C',0);
$pdf->Cell(27,5,'Max. Score',1,0,'C',0);
$pdf->Cell(45,5,'First attempt date',1,0,'C',0);
$pdf->Cell(45,5,'Last attempt date',1,1,'C',0);

$pdf->SetFont('Times','',14);


$sql1="select distinct t_id from test_score where email='$_GET[email]'";
		$res1=mysqli_query($GLOBALS["___mysqli_ston"], $sql1);
		while($row1=mysqli_fetch_array($res1))
		{
		$index=1;
		$sql2="select distinct testname,level,tm_id,correct from techtest_master where tm_id='$row1[t_id]'";
		$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql2);
		while($row2=mysqli_fetch_array($res2))
		{
			$correct=$row2['correct'];
			
		$pdf->Cell(25,5,$row2['testname'],1,0,'C',0);	
			
		if($row2['level']==1)
 {
	$pdf->Cell(27,5,'Beginner',1,0,'C',0);
 }
 if($row2['level']==2)
 {
	$pdf->Cell(27,5,'Intermediate',1,0,'C',0);
 }
 if($row2['level']==3)
 {
	$pdf->Cell(27,5,'Expert',1,0,'C',0);
 }
 
 $sql3="select count(t_id) as t_id from test_score where email='$_GET[email]' and t_id='$row2[tm_id]'";
		$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql3);
		while($row3=mysqli_fetch_array($res3))
		{
		$pdf->Cell(22,5,$row3['t_id'],1,0,'C',0);
		}
		
		 $sql5="select q_id from techtest_questions where id='$row2[tm_id]'";
		$res5=mysqli_query($GLOBALS["___mysqli_ston"], $sql5);
        $q_total=mysqli_num_rows($res5);
		$max_score= $q_total * $correct;

$sql4="select max(score) as score from test_score where email='$_GET[email]' and t_id='$row2[tm_id]'";
		$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql4);
		while($row4=mysqli_fetch_array($res4))
		{
			$pdf->Cell(27,5,$row4['score']."/".$max_score,1,0,'C',0);
		}
		
		$sql6="select MIN(DATE_FORMAT(DATE(timesql), '%d-%m-%Y')) as date from test_score where t_id='$row2[tm_id]' and email='$_GET[email]'";
		$res6=mysqli_query($GLOBALS["___mysqli_ston"], $sql6);
		while($row6=mysqli_fetch_array($res6))
		{
			$pdf->Cell(45,5,$row6['date'],1,0,'C',0);
		}
		
		$sql7="select MAX(DATE_FORMAT(DATE(timesql), '%d-%m-%Y')) as date from test_score where t_id='$row2[tm_id]' and email='$_GET[email]'";
		$res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
		while($row7=mysqli_fetch_array($res7))
		{
			$pdf->Cell(45,5,$row7['date'],1,1,'C',0);
		}
 
		$index++;	
		}
		}

$pdf->Cell(0,10,'', 0,1);
$pdf->Cell(0,10,'', 0,1);


$pdf->Output();

}
?>
