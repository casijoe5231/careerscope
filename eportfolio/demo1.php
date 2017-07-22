<script type="text/javascript">
$(document).ready(function()
{
$(".chatbox").hide();

$(".chat").click(function()
{
$(".chatbox").show();
})

$(".submitmsg").click(function()
{
var value1=$("#receiverid").val();
var value2=$("#inputmsg").val();
			$.ajax(
			{
				type:"GET",
				url:"insertmessage.php",
				data:"data1="+value1+"&data2="+value2,
				success:function(response)
				{
				$('#chatbox1').html(response);
				}
			});

})
var t = setInterval(function(){get_chat_msg()},5000);

$(".logout").click(function()
{
$(".chatbox").hide();
})

})
</script>


function set_chat_msg()
{
    if(typeof XMLHttpRequest != "undefined")
    {
        oxmlHttpSend = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
       oxmlHttpSend = new ActiveXObject("Microsoft.XMLHttp");
    }
    if(xmlHttpSend == null)
    {
       alert("Browser does not support XML Http Request");
       return;
    }
    
    var url = "insertmessage.php";
    if (document.getElementById("inputmsg") != null)
    {
       var msg = document.getElementById("inputmsg").value;
       var id = document.getElementById("receiverid").value;
    }
	
    url += "?data1=" + id + "&data2=" + msg;
    oxmlHttpSend.open("GET",url,true);
    oxmlHttpSend.send(null);
}