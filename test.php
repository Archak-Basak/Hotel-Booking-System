<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script>
function expand()
{
	document.getElementById('dv1').style.height="100px";
		document.getElementById('dv1').style.backgroundColor="green";
		
//	document.getElementById('div1').style.height="100px";	
}
</script>
<style>
	
	.td12
	{
		transition:.5s;
		background-color:#03C;
		}
		.div1
		{
			
			transition:1s;
		background-color:#0C9;
		height:0px;
		overflow:hidden;
		}
</style>
</head>


<body>
<table border>
<tr>
<td id="td1" onClick="expand()" class="td12" >
hello
<!--<div id="div1" class="div1">
this is some text
</div>-->
</td>
</tr>
</table>
<div class="div1" id="dv1">
hi
</div>
</body>
</html>