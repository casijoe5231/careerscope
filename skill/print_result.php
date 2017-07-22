<?php
    session_start();
	if(!isset($_SESSION['username']))
	{
		header('location:index.php');
		exit();
	}
?>
<?php
require('/plugins/fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',50,5,20);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Skill Assessment Result',0,0,'C');
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

// Colored table
function FancyTable($header,$data)
{
    // Colors, line width and bold font
    $this->SetFillColor(134,203,192);
    $this->SetTextColor(15);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(40, 35, 40);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;

        foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
//for($i=1;$i<=40;$i++)
//    $pdf->Cell(0,10,'Printing line number '.$i,0,1);



// Custom
include 'connection.php';
		$username=$_SESSION['username'][0];
	    $sql="SELECT fname, lname, email, class, branch, E, A, C, N,O, mod1 FROM user WHERE username='$username'";		
		
	    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
	    while($row = mysqli_fetch_array($res))
        {
		 $fname=$row['fname'];
		 $lname=$row['lname'];
		 $email=$row['email'];
		 $class=$row['class'];
		 $branch=$row['branch'];
		 $E= $row['E'];
		 $A= $row['A'];
		 $C= $row['C'];
		 $N= $row['N'];
		 $O= $row['O'];
		 $mod1=$row['mod1'];
        }

		
		
$pdf->SetFont('Arial','B',14);		
$pdf->Image('images/im-user_profile.png',10,31,7);	
	
$pdf->Cell(0,10,'      '.$fname.' '.$lname, 0,1);
$pdf->SetFont('Times','',12);

$pdf->Cell(0,10,''.$class.' '.$branch, 0,1);
$pdf->Cell(0,10,'email:'.$email, 0,1);
$pdf->Cell(0,10,'________________________________________________________', 0,1);

$pdf->Cell(0,20,'Self Perception Personality Test Result: ', 0,1);


$header = array('Skill', 'Percentage', 'Score'); 
$data = array
  (
  array("Extraversion",0,$E),
  array("Agreeableness",0,$A),
  array("Conscientiousness",0,$C),
  array("Neuroticism",0,$N),
  array("Openness",0,$O)
  );
$pdf->FancyTable($header,$data);


$pdf->Cell(0,10,'', 0,1);
$pdf->Cell(0,10,'', 0,1);
$pdf->Cell(0,10,'Observer Assessment Test Result: ', 0,1);
include 'settings.php';
		$requestor=$_SESSION['username'][0];	                                          // Define requestor , which is the current user                                                              
		$values_array=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);     // Define array to store skill values 
			// Get scores for each skill trait
	$query="SELECT reviewer, val FROM mod2 WHERE requestor='$requestor'";
	$result=mysqli_query($GLOBALS["___mysqli_ston"], $query);
	
	$num_rows = mysqli_num_rows($result);
	if( $num_rows==0)
	{
$pdf->Cell(0,10,'You do not seem to have received a review', 0,1);
	}
	
	else 
	{
	

	 // Get skill set
	 $query="SELECT id, skill FROM mod2_skills";  
     $res=mysqli_query($GLOBALS["___mysqli_ston"], $query);
	 $skill_array=array();
	 $skill_choices=mysqli_num_rows($res);                                 // Define total number of skill choice values
	 while($row_skill = mysqli_fetch_array($res))
        {
		   array_push($skill_array,$row_skill['skill']);                 // Create array and store skill names in array
		} 
		
		
    while($row = mysqli_fetch_array($result))
    {
		  $req=$row['reviewer'];
		  $data_array=$row['val'];
		  $unser_array= unserialize($data_array);                  // Unserialize Array
		  for($i=0; $i<$skill_choices; $i++)
     	 {
          $values_array[$i]=$values_array[$i] + $unser_array[$i];  // Add values from each reviewer to main array
	     }		  
    }  
    for($i=0; $i<$skill_choices; $i++)
    {
        $values_array[$i]=$values_array[$i] / $num_rows;          // Perform average
	}
	
// Grid 1	
$pdf->Cell(0,10,' ', 0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,10,'Your reviewers highly admire you for the following skills.(Your Strengths) ', 0,1);
$pdf->Cell(0,10,'The review says that you are ', 0,1);
$pdf->SetFont('Times','',12);
	for($i=0; $i<$skill_choices; $i++)     
	{
	if($values_array[$i]>=$high_order)  
	{

$pdf->Cell(0,10,' - '.$skill_array[$i], 0,1);
	}
	else
	{
	 // Do nothing
	}
	}
	
//Grid 2
$pdf->Cell(0,10,' ', 0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,10,'Your reviewers also suggest that you might also have the following skills.', 0,1);
$pdf->Cell(0,10,'The review says that you might be', 0,1);
$pdf->SetFont('Times','',12);
	for($i=0; $i<$skill_choices; $i++)
	{
	if($values_array[$i]<$high_order && $values_array[$i]>$low_order)  
	{

$pdf->Cell(0,10,' - '.$skill_array[$i], 0,1);
	}
	else
	{
	 // Do nothing
	}
	}
	
 }




$pdf->Output();
?>