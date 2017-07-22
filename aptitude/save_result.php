<?php
$con=mysqli_connect("localhost","root","","careerscope");

    session_start();
	if(isset($_SESSION['user']))
	{
?>

<?php
require('plugins/fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('images/logo.png',55,7,15);
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
include '../includes/connection1.php';
		$username=$_SESSION['user'][1];
	    $sql="SELECT name, email FROM masteruser WHERE name='$username'";		
		
	    $res=mysqli_query($con, $sql);
	    while($row = mysqli_fetch_array($res))
        {
		 $fname=$row['name'];
		 $email=$row['email'];
        }
// Compute scores
$username=$_SESSION['user'][1];
$test_id=$_POST['test_id'];

//$sql="SELECT * FROM score INNER JOIN test ON score.t_id=test.id AND t_id='$test_id' username='$username' ";
$sql="SELECT * FROM  score  INNER JOIN test ON score.t_id=test.id AND t_id='$test_id' AND username='$username'";
$res=mysqli_query($con, $sql);
while($row=mysqli_fetch_array($res))
{
$score=$row['score'];
$total=$row['max_score'];
$correct=$row['correct'];
$incorrect= $row['max_score']-$row['score'];
$attempt=$row['attempt'];

$time = strtotime($row['timesql']);
$new_time = date('F j, Y, g:i a', $time);
$t_name=$row['t_name'];
$subject=$row['subject'];
$t_desc=$row['t_desc'];
$domain=$row['domain'];
}		
// Display HTML	
$text1="<b>Test Name: </b>".$t_name."<br>";
$text2="<b>Test Subject: </b>".$subject."<br>";
$text3="<b>Test domain: </b>".$domain."<br>";
$text4="<b>Correct: </b>".$score." answers<br>";
$text5="<b>Incorrect: </b>".$incorrect." answers<br>";	
$text6="<b>No. of attempts: </b>".$attempt."<br>";	

		
$pdf->SetFont('Arial','B',14);		
	
$pdf->Cell(0,10,'Name: '.$fname, 0,1);
$pdf->SetFont('Times','',12);

$pdf->Cell(0,10,'email: '.$email, 0,1);
$pdf->SetFont('Times','',12);
$pdf->Cell(180,10,'________________________________________________________', 0,1,'C');

$pdf->SetFont('Times','B',14);
$pdf->Cell(200,20,'Test Results ',0,1,'C');
$pdf->SetFont('Times','',14);
$pdf->WriteHTML($text1);
$pdf->WriteHTML($text2);
$pdf->WriteHTML($text3);


$pdf->SetFont('Times','B',18);
$pdf->Cell(0,10,'', 0,1);
$pdf->Cell(0,10,'Test score: '.$score.' / '.$total, 0,1,'C');


$pdf->Cell(0,10,'', 0,1);
$pdf->SetFont('Times','',14);
$pdf->WriteHTML($text4);
$pdf->WriteHTML($text5);
$pdf->WriteHTML($text6);
$pdf->Cell(0,10,'', 0,1);
$pdf->Cell(0,10,'Performed on: '.$new_time, 0,1);



$pdf->Cell(0,10,'', 0,1);
$pdf->Cell(0,10,'', 0,1);


$pdf->Output();
?>
<?php
}
elseif(isset($_SESSION['user2']))
{
?>
<?php
require('plugins/fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('images/logo.png',55,7,15);
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
include '../includes/connection1.php';
		$username=$_SESSION['user2'][1];
	    $sql="SELECT name, email FROM masteruser WHERE name='$username'";		
		
	    $res=mysqli_query($con, $sql);
	    while($row = mysqli_fetch_array($res))
        {
		 $fname=$row['name'];
		 $email=$row['email'];
        }
// Compute scores
$username=$_SESSION['user2'][1];
$test_id=$_POST['test_id'];

//$sql="SELECT * FROM score WHERE username='$username' AND t_id='$test_id' ";
$sql="SELECT * FROM score INNER JOIN test ON score.t_id=test.id AND t_id='$test_id' AND username='$username'";
$res=mysqli_query($con, $sql);
while($row=mysqli_fetch_array($res))
{
$score=$row['score'];
$total=$row['max_score'];
$correct=$row['correct'];
$incorrect= $row['total']-$row['correct'];
$attempt=$row['attempt'];

$time = strtotime($row['timesql']);
$new_time = date('F j, Y, g:i a', $time);
$t_name=$row['t_name'];
$subject=$row['subject'];
$t_desc=$row['t_desc'];
$domain=$row['domain'];
}		
// Display HTML	
$text1="<b>Test Name: </b>".$t_name."<br>";
$text2="<b>Test Subject: </b>".$subject."<br>";
$text3="<b>Test domain: </b>".$domain."<br>";
$text4="<b>Correct: </b>".$correct." answers<br>";
$text5="<b>Incorrect: </b>".$incorrect." answers<br>";	
$text6="<b>No. of attempts: </b>".$attempt."<br>";	

		
$pdf->SetFont('Arial','B',14);		

	
$pdf->Cell(0,10,'Name: '.$fname, 0,1);
$pdf->SetFont('Times','',12);

$pdf->Cell(0,10,'email: '.$email, 0,1);
$pdf->SetFont('Times','',12);
$pdf->Cell(180,10,'________________________________________________________', 0,1,'C');

$pdf->SetFont('Times','B',14);
$pdf->Cell(200,20,'Test Results ',0,1,'C');
$pdf->SetFont('Times','',14);
$pdf->WriteHTML($text1);
$pdf->WriteHTML($text2);
$pdf->WriteHTML($text3);


$pdf->SetFont('Times','B',18);
$pdf->Cell(0,10,'', 0,1);
$pdf->Cell(0,10,'Test score: '.$score.' / '.$total, 0,1,'C');


$pdf->Cell(0,10,'', 0,1);
$pdf->SetFont('Times','',14);
$pdf->WriteHTML($text4);
$pdf->WriteHTML($text5);
$pdf->WriteHTML($text6);
$pdf->Cell(0,10,'', 0,1);
$pdf->Cell(0,10,'Performed on: '.$new_time, 0,1);



$pdf->Cell(0,10,'', 0,1);
$pdf->Cell(0,10,'', 0,1);


$pdf->Output();
?>
<?php
}
else
{
include '../includes/connection1.php';
include 'styles/theme-master.php';
}
?>