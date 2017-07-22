<html>
<body>

<?php
//Testing
$string1= "What if it is = other but not = to the one which i am saying is =";
$string1 = str_replace ("=","",$string1);
echo $string1."<br><br>";

//Testing ends here
$c=0;
$file = fopen("types/quiz-e-commerce_12-13-default_for_e-commerce_12-13-20130828-1647.txt", "r") or exit("Unable to open file!");
//Get a line of the file until the end is reached
while(!feof($file))
  {
  
  $text = fgets($file). "<br>";
  //echo $text;
  //$string=strip_tags($text);
  $string=$text;
  //echo $string."<br>";
  $found=strip("<b>","{",$string); // Check Question

  
  if($c>0 && $c<=4) // Check Options
  {
   
   if($string[1]=="~")
   {
    $string = preg_replace ("/~/","",$string, 1);
    echo "Option ".$c.". ".$string;
   }
   else if($string[1]=="=")
   {
    $string = preg_replace ("/=/","",$string, 1);
    echo "<i style =\"color:green; \">Option ".$c.". ".$string."</i>";
   }
   $c++;
  }
  if($c>4)
  {
   $c=0;
  }
  
  
  if($found!="") // Check Question
  {
  $c=1;
  $found=nl2br($found);
  $found=preg_replace('/\n/', '', $found, -1);
  $found = str_replace("\n","<br>",$found);        // Remove \n and replace with <br>
  $found=strip_tags($found);
  echo "<br><b>Question: </b>".$found."<br>";
  }
  
  
}  
fclose($file);

// Function to find Question
function strip($startTag,$endTag,$text,$pos=0){
  if(!is_integer($pos)){
    $pos = false;
    return false;
  }
  $pos1 = strpos($text,$startTag,$pos);
  if(!is_integer($pos1)){
    $pos = false;
    return false;
  }
  $pos1 += strlen($startTag);
  $pos2 = strpos($text,$endTag,$pos1);
  if(!is_integer($pos2)){
    $pos = false;return false;
  }
  $res = substr($text,$pos1,$pos2-$pos1);
  $pos = $pos2 + strlen($endTag);
  return $res;
}
?>
</body>
</html>

