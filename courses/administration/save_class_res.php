<?php
    session_start();
	if(!isset($_SESSION['administration']))
	{
		header('location:index.php');
		exit();
	}
	include '../connection.php';
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
    $this->Cell(30,10,'Aptitude Result',0,0,'C');
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


$class=$_POST['class'];
$branch=$_POST['branch'];





		
// Display HTML	
$text2="<b>Class: </b>".$class."<br>";
$text3="<b>Branch </b>".$branch."<br>";
$text4="<br><b>Scores: </b><br>";		


$pdf->SetFont('Times','B',14);
$pdf->Cell(200,20,'Test Results ',0,1,'C');
$pdf->SetFont('Times','',14);
$pdf->WriteHTML($text2);
$pdf->WriteHTML($text3);
$pdf->WriteHTML($text4);

$pdf->SetFont('Times','B',14);
$pdf->Cell(10,5,'',1,0,'C',0);
$pdf->Cell(60,5,'',1,0,'C',0);
$pdf->Cell(120,5,'Test',1,1,'C',0);


$pdf->Cell(10,5,'No',1,0,'C',0);
$pdf->Cell(60,5,'Name',1,0,'C',0);
$pdf->Cell(40,5,'Test name',1,0,'C',0);
$pdf->Cell(40,5,'Score',1,0,'C',0);
$pdf->Cell(40,5,'Total',1,1,'C',0);

$pdf->SetFont('Times','',14);
$index=1;

$sql="SELECT * FROM score INNER JOIN user ON score.username=user.username AND class='$class' AND branch='$branch'";
$res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
while($row=mysqli_fetch_array($res))
	{
		$sql="SELECT t_name, subject FROM test WHERE id='$row[t_id]' ";
		$res2=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		while($row2=mysqli_fetch_array($res2))
		{
		$time = strtotime($row['timesql']);
		$new_time = date('F j, Y, g:i a', $time);
		//echo "<table><tr><td>".$index.".) </td><td>".$row['fname']." ".$row['lname']."</td><td>".$row2['t_name']."</td><td>".$row2['subject']."</td><td>".$row['score']." / ".$row['total']."</td><td>".$new_time."</td></tr></table>";
	    $pdf->Cell(10,5,$index,1,0,'C',0);
		$pdf->Cell(60,5,$row['fname']." ".$row['lname'],1,0,'C',0);
		$pdf->Cell(40,5,$row2['t_name'],1,0,'C',0);
		$pdf->Cell(40,5,$row['score'],1,0,'C',0);
		$pdf->Cell(40,5,$row['max_score'],1,1,'C',0);

		
		
		$index++;
		}
	}

$pdf->Cell(0,10,'', 0,1);
$pdf->Cell(0,10,'', 0,1);


$pdf->Output();
?>
