<?php
include("pdf2text.php");
$result = pdf2text ('309sujit2098.pdf');
echo $result;
// include('class.pdf2text.php');
// $a = new PDF2Text();
// $a->setFilename('309sujit2098.pdf'); 
// $a->decodePDF();
// echo $a->output("309sujit2098.txt"); 
//$file = '309sujit2098.pdf';
// Open the file to get existing content
//$current = file_get_contents($result);
// Write the contents back to the file
file_put_contents("309sujit2098.txt", $result);
?>