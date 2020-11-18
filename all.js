// JavaScript Document
function get_chk_usr(str)
{
	if(str != "")
	{
		var url="chk_usr.php?R="+str;
		xmlHttp=GetXmlHttpObject1(showUsr)
		xmlHttp.open("GET", url , true)
		xmlHttp.send(null)
	}
}
function showUsr() 
{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{ 
		//alert(xmlHttp.responseText);
		if(xmlHttp.responseText > 0)
		{
			alert("Menu Already Exists.");
			document.getElementById("menu_name").select();
		}
		
	} 
} 
//######################################################################//
function GetXmlHttpObject1(handler)
{ 
var objXmlHttp=null

if (navigator.userAgent.indexOf("Opera")>=0)
{
alert("This example doesn't work in Opera") 
return 
}
if (navigator.userAgent.indexOf("MSIE")>=0)
{ 
var strName="Msxml2.XMLHTTP"
if (navigator.appVersion.indexOf("MSIE 5.5")>=0)
{
strName="Microsoft.XMLHTTP"
} 
try
{ 
objXmlHttp=new ActiveXObject(strName)
objXmlHttp.onreadystatechange=handler 
return objXmlHttp
} 
catch(e)
{ 
alert("Error. Scripting for ActiveX might be disabled") 
return 
} 
} 
if (navigator.userAgent.indexOf("Mozilla")>=0)
{
objXmlHttp=new XMLHttpRequest()
objXmlHttp.onload=handler
objXmlHttp.onerror=handler 
return objXmlHttp
}
} 
//#############################################################################//