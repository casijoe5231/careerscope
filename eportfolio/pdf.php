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
    $this->Cell(30,10,'Aptitude Test Report',0,0,'C');
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
$pdf->Cell(60,5,'Domain',1,0,'C',0);
$pdf->Cell(55,5,'Test Name',1,0,'C',0);
$pdf->Cell(22,5,'Attempts',1,0,'C',0);
$pdf->Cell(27,5,'Max. Score',1,0,'C',0);
$pdf->Cell(27,5,'Date of test',1,1,'C',0);

$pdf->SetFont('Times','',14);


$sql="select distinct t_id from score where username='$name'";
		$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row=mysqli_fetch_array($res))
		{
		$sql="select distinct t_name,id,correct,subject,domain from test where id='$row[t_id]'";
		$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row2=mysqli_fetch_array($res2))
		{
		$index=1;
			$correct=$row2['correct'];
			if($row2['domain']=='compit' || $row2['domain']=='mech' || $row2['domain']=='extc')
			{
				$pdf->Cell(60,5,'General technical aptitude',1,0,'C',0);
			}
			if($row2['domain']=='quant')
			{
				$pdf->Cell(60,5,'Quantitative aptitude',1,0,'C',0);
			}
			if($row2['domain']=='logic')
			{
				$pdf->Cell(60,5,'Logical reasoning',1,0,'C',0);
			}	
			if($row2['domain']=='verbal')
			{
				$pdf->Cell(60,5,'Verbal reasoning',1,0,'C',0);
			}
			
			$pdf->Cell(55,5,$row2['t_name'],1,0,'C',0);
			
		$sql="select attempt from score where username='$name' and t_id='$row2[id]'";
		$res3=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row3=mysqli_fetch_array($res3))
		{
			$pdf->Cell(22,5,$row3['attempt'],1,0,'C',0);
		}
		
		$sql="select score,total from score where username='$name' and t_id='$row2[id]'";
		$res4=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row4=mysqli_fetch_array($res4))
		{
			$pdf->Cell(27,5,$row4['score']."/".$row4['total'],1,0,'C',0);
		}
		
		$sql7="select DATE_FORMAT(DATE(timesql), '%d-%m-%Y') as date from score where username='$name' and t_id='$row2[id]'";
		$res7=mysqli_query($GLOBALS["___mysqli_ston"], $sql7);
		while($row7=mysqli_fetch_array($res7))
		{
			$pdf->Cell(27,5,$row7['date'],1,1,'C',0);
		}
			
			$index++;
		}
		}

$pdf->Cell(0,10,'', 0,1);
$pdf->Cell(0,10,'', 0,1);


$pdf->Output();

}
?>
