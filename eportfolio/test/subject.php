<?php
include("header.php");
?>

<script type="text/javascript">
function call(str)
{
getchapdata(str);
getsubjdata(str);
}
function getchapdata(str)
{
if (str=="" || str==-1)
  {
  document.getElementById("chapter").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp1=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp1=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp1.onreadystatechange=function()
  {
  if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
    {
    document.getElementById("chapter").innerHTML=xmlhttp1.responseText;
    }
  }
xmlhttp1.open("GET","getchapdata.php?q1="+str,true);
xmlhttp1.send();
}
function getsubjdata(str)
{
if (str=="" || str==-1)
  {
  document.getElementById("subject").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("subject").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getsubjdata.php?q="+str,true);
xmlhttp.send();
}
</script>

<?php
$sql="select * from subject where subj_user_id=".$_SESSION[userid];
$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql);
$options=""; 
while ($row=mysqli_fetch_array($result)) { 
    $id=$row['subj_id']; 
    $name=$row['subj_name']; 
	if($id==$_SESSION['subjid'])
	{
	$options.="<option value=\"".$_SESSION['subjid']."\" selected=\"selected\" >".$name."</option>";
	echo "<script type=\"text/javascript\">call(".$_SESSION['subjid'].");</script>";
	}
	else
    $options.="<option value=\"".$id."\">".$name."</option>";
} 
?>

<div id="dbimrcontent">
<!-- InstanceBeginEditable name="Content" -->
  <div class="dbimrcontentHolder">
    <div class="dbimrcontentPan">
      <div class="fleft width100">
        <div class="greyBand">
          <h4>SUBJECT PLAN</h4>
          <div class="innertext">
            <p class="fleft text"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;for Subject :</strong> </p>
            <select name="subj" style="width:97px;" onchange="call(this.value)">
              <option value="0">Select...</option>
			  <?php echo $options; ?>
            </select>
			
          </div><div id="subject"></div>
        </div>
      </div>
	  
	  <div class="fright mgnT10">
	  <a href="add_subject.php" onclick="NewWindow(this.href,'Add Subject','700','500','no','center');return false" onfocus="this.blur()"><img src="../images/icon_add.png" width="16" height="16" align="absmiddle" class="mgnR5" />Add Subject</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <a href="edit_subject.php" onclick="NewWindow(this.href,'Edit Subject','700','500','no','center');return false" onfocus="this.blur()"><img src="../images/icon_edit_entry.png" width="16" height="16" align="absmiddle" class="mgnR5" />Edit Subject</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <a href="delete_subject.php" onclick="NewWindow(this.href,'Delete Subject','700','500','no','center');return false" onfocus="this.blur()"><img src="../images/delete.png" width="16" height="16" align="absmiddle" class="mgnR5" />Delete Subject</a>
	  </div>
      <div id="chapter"></div>
	  </br></br></br></br></br></br></br></br></br></br></br></br></br></br></br>
  </div>
	</div><!-- InstanceEndEditable -->
      </div><!--end of dbimrcontent holder!-->

<?php	  
include("footer.php");	  
?>
