<html>
<head>
<style>
body
{
font-family:Arial, Helvetica, sans-serif;

}
#modal-text
{
font-size:25px;
}
#option-radio
{
 color:black;
}
</style>
</head>
<body>

<?php
					
        include '../../connection.php';
	 		
		$q_id=$_COOKIE["question_id"];	
		$ref=$_SERVER['HTTP_REFERER'];
		$arr = explode('id=', $ref);
        $t_id = $arr[1];
        
		//Display Question
	    $sql="SELECT * FROM questions WHERE q_id='$q_id' AND t_id='$t_id'";
	    $res=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		echo "<form action='test_edit.php?id=".$t_id."' method='POST'>";
		while($row = mysqli_fetch_array($res))
		{

            $ans=$row['ans'];
			
			echo "<div class='question'><b style=\" color:white;\">Question Edit</b> ";
			echo "<br><br><textarea rows='10' cols='50' name='question' >".$row['question']."</textarea></div>";
			
			echo "<div class='option' style=\" color:white;\">";
			if($ans==1) 
			echo"<div class='option_green'>";
			else
			echo"<div class='option_red'>";
			echo "Option 1: &nbsp;";
			echo "</div><input type='textbox' name='choice1' value='".$row['opt1']."'><b id='option-radio'>Set as answer:</b><input type='radio' name='ans' value='1'></div>";
			
			echo "<div class='option' style=\" color:white;\">";
			if($ans==2) 
			echo"<div class='option_green'>";
			else
			echo"<div class='option_red'>";
			echo "Option 2: &nbsp;";
			echo "</div><input type='textbox' name='choice2' value='".$row['opt2']."'><b id='option-radio'>Set as answer:</b><input type='radio' name='ans' value='2'></div>";
			
			echo "<div class='option' style=\" color:white;\">";
			if($ans==3) 
			echo"<div class='option_green'>";
			else
			echo"<div class='option_red'>";
			echo "Option 3: &nbsp;";
			echo "</div><input type='textbox' name='choice3' value='".$row['opt3']."'><b id='option-radio'>Set as answer:</b><input type='radio' name='ans' value='3'></div>";

			echo "<div class='option' style=\" color:white;\">";
			if($ans==4) 
			echo"<div class='option_green'>";
			else
			echo"<div class='option_red'>";
			echo "Option 4: &nbsp;";
			echo "</div><input type='textbox' name='choice4' value='".$row['opt4']."'><b id='option-radio'>Set as answer:</b><input type='radio' name='ans' value='4'></div>";


			echo "<br><br>";
		}
		echo "<div style=\"text-align:center;\"><input type='submit' value='Update & Save' name='edit_question'></div>";
		echo "</form>";
?>
</body>
</html>