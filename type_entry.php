<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>::Hotel Booking System::</title>
<?php
session_start();
if(!isset($_SESSION["user_name"]))
	{
		echo "<script>location.replace('index.php');</script>";
	}
?>
<script>
var toggle=false;
function validate_room_edit(e)
{
	if(document.getElementById('room_no_e').value=='')
		var r=0;
	else
		var r=parseInt(document.getElementById('room_no_e').value);
		if(isNaN(document.getElementById('room_no_e').value) || document.getElementById('room_no_e').value=='')
	{
			document.getElementsByClassName('e_d')[0].style.height="20px";
				
				document.getElementsByClassName('e_d')[0].style.padding="10px";
				document.getElementById('e_d').innerHTML="Invalid room number.";
				document.getElementById('submit_e').disabled=true;
	}
	
	else
	{
			
var f=document.getElementById('floor_e');
	var fl=parseInt(f.options[f.selectedIndex].value);
	var room=fl*100+r;
	
	//alert(room);
	
	var str="room_valid_e.php?room="+room+"&id="+e;
	var xmlHttp=new XMLHttpRequest();
	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4 || xmlHttp.readyState=='complete')
		{
			document.getElementById('e_d').innerHTML=this.responseText;
			//alert(this.responseText);
			if(document.getElementById('error_received_e').value==1)
			{
				document.getElementsByClassName('e_d')[0].style.height="20px";
				
				document.getElementsByClassName('e_d')[0].style.padding="10px";
					document.getElementById('submit_e').disabled=true;
			}
			else
			{
				
					document.getElementsByClassName('e_d')[0].style.height="0px";
					document.getElementsByClassName('e_d')[0].style.padding="0px";
						document.getElementById('submit_e').disabled=false;
			}
		}
	};
	
	xmlHttp.open("GET",str,true);
	xmlHttp.send();
	setActive();
	}
		
	
		
}
function e_d()
{
	document.getElementsByClassName('e_d')[0].style.height="40px";
	
	
}
 function submit_new_class()
 {
	
	if(document.getElementById('error_received').value==0)
		{
			// alert('ok');
		// hide_menu(0);
		 //hide_menu(1);
			// alert('ok');
		var class_name=document.getElementById('class_name').value;
		 document.getElementById('class_name').value='';
		
		
	
		
		var rate=document.getElementById('class_rate').value;
		
		
		var url="type_ex.php?submit=1&class_name="+class_name+"&rate="+rate;
		//alert(url);
		var xmlHttp= new XMLHttpRequest();
		xmlHttp.onreadystatechange=function()
		{
			if(xmlHttp.readyState==4 || xmlHttp.readyState=='complete')
			{
				document.getElementById('t_c').innerHTML=this.responseText;
				//alert(ok);
				
				//update_content();
				//alert('submitted');
				remove_added_highlight();
				document.getElementById('submit_class').disabled=true;
				//setActive();
				window.scroll(0,0);
				//document.getElementById('floor_no').focus();
				//document.getElementById('floor_alias').value='';
				//update_content();
			}
		
		};
		xmlHttp.open("GET",url,true);
		xmlHttp.send();
		
			
		}
		
		
	
		//alert(url);
		
 }
 
 
 function undo_d()
{
	var str='floor_ex.php?undo=1';
	if(document.getElementById('filter_state').value==1)
	{
		var f=document.getElementById('floor_h').value;
		var s=document.getElementById('status_h').value
		var a=document.getElementById('alias_h').value;
		
		str+="&filter_mode=1&floor_f="+f+"&status_f="+s+"&alias_f="+a;
		//alert(url);
	
	}
	
			
		var xmlHttp= new XMLHttpRequest();
		xmlHttp.onreadystatechange=function()
		{
			if(xmlHttp.readyState==4 || xmlHttp.readyState=='complete')
			{
				document.getElementById('t_c').innerHTML=this.responseText;
				//alert(ok);
				//update_content();
				//alert('submitted');
				remove_added_highlight();
				setActive();
				window.scroll(0,0);
			}
		
		};
		xmlHttp.open("GET",str,true);
		xmlHttp.send();
		}
		
	
 function remove_added_highlight()
 {
	var a=setTimeout(hl,1000);	
	var b=setTimeout(n,2000);
	
}
function hl()
{
	//alert('ok');
	var ab=document.getElementsByClassName('added');
	var i;
	for(i=0;i<ab.length;i++)
	{
		ab[i].className="ok";
	}
	
	
	
	//alert('ok');
}
function n()
{
	var ab=document.getElementsByClassName('added');
	var i;
	for(i=0;i<ab.length;i++)
	{
		ab[i].className="ok0";
	}
	update_content();
}
 function show_context()
{
	if(document.getElementById('context').value==0)
	{
		document.getElementById('user_name').style.display="block";
		document.getElementById('context').value=1;
	}
		else
		{
			document.getElementById('user_name').style.display="none";
			document.getElementById('context').value=0;
		
		}
		
}
 function update_class_info()
 
 {
	// hide_menu(0);
	 //hide_menu(1);
	  
		//var upgradable=up_a.options[up_a.selectedIndex].value;
		//var floor_no=document.getElementById('floor_no_e').value;
		// document.getElementById('floor_no').value='';
		
		//alert('ok');
	
		var class_nm=document.getElementById('type_name_e').value;
		
	var rate=document.getElementById('rate_e').value;
	var class_id=document.getElementById('type_id_e').value;
		var str='';
	if(document.getElementById('filter_state').value==1)
	{
		var f=document.getElementById('floor_h').value;
		var s=document.getElementById('status_h').value
		var a=document.getElementById('alias_h').value;
		
		str="&filter_mode=1&floor_f="+f+"&status_f="+s+"&alias_f="+a;
	
	
	}
		
		var url="type_ex.php?save=1&class_id="+class_id+"&class_name="+class_nm+"&rate="+rate+str;
	//alert(url);
		var xmlHttp= new XMLHttpRequest();
		xmlHttp.onreadystatechange=function()
		{
			if(xmlHttp.readyState==4 || xmlHttp.readyState=='complete')
			{
				document.getElementById('t_c').innerHTML=this.responseText;
				//alert(ok);
				//update_content();
				remove_added_highlight();
			}
		
		};
		xmlHttp.open("GET",url,true);
		xmlHttp.send();
			
}
 function highlight(e)
{
	
	document.getElementById(e).style.backgroundColor='#c7e0f4';
}
function remove_highlight(e)
{
	if(e%2==1)
		document.getElementById(e).style.backgroundColor='white';
	else
		document.getElementById(e).style.backgroundColor='white';
	
}
function update_content()
{

var str='';
	if(document.getElementById('filter_state').value==1)
	{
		var f=document.getElementById('floor_h').value;
		var s=document.getElementById('status_h').value
		var a=document.getElementById('alias_h').value;
		
		str="&filter_mode=1&floor_f="+f+"&status_f="+s+"&alias_f="+a;
	
	
	}
	var url="type_ex.php?update=1"+str;
	var xmlHttp=new XMLHttpRequest();
	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4 || xmlHttp.readyState=='complete')
		{
			document.getElementById('t_c').innerHTML=this.responseText;
		}
	};
	
	xmlHttp.open("GET",url,true);
	xmlHttp.send();
	hide_menu(0);
	hide_menu(1);
	 document.getElementById('floor_no').value='';
}
function delete_class(e)
{
	//document.getElementById('t_c').innerHTML='';
	open_modal();
	//hide_menu(0);
	//hide_menu(1);
	// document.getElementById('floor_no').value='';
	var str='';
	if(document.getElementById('filter_state').value==1)
	{
		var f=document.getElementById('floor_h').value;
		var s=document.getElementById('status_h').value
		var a=document.getElementById('alias_h').value;
		
		str="&filter_mode=1&floor_f="+f+"&status_f="+s+"&alias_f="+a;
	
	
	}
	var url="type_ex.php?delete="+e+str;
	var xmlHttp=new XMLHttpRequest();
	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4 || xmlHttp.readyState=='complete')
		{
			document.getElementById('t_c').innerHTML=this.responseText;
			//update_content();
			window.scroll(0,0);
			
		}
	};
	
	xmlHttp.open("GET",url,true);
	xmlHttp.send();
}
function edit_type(e)
{
	hide_menu(0);
	hide_menu(1);
	//alert('ok');
	// document.getElementById('floor_no').value='';
	var str='';
	if(document.getElementById('filter_state').value==1)
	{
		var f=document.getElementById('floor_h').value;
		var s=document.getElementById('status_h').value
		var a=document.getElementById('alias_h').value;
		
		str="&filter_mode=1&floor_f="+f+"&status_f="+s+"&alias_f="+a;
	
	
	}
var url="type_ex.php?edit_r="+e+str;
//alert(url);
//alert(url);
	var xmlHttp=new XMLHttpRequest();
	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4 || xmlHttp.readyState=='complete')
		{
			document.getElementById('t_c').innerHTML=this.responseText;
			//update_content();
			
		}
	};
	
	xmlHttp.open("GET",url,true);
	xmlHttp.send();
}

function expand()
{
	if(toggle)
	{
		document.getElementById('fx').style.width="0px";
		document.getElementById('fx').style.visibility="hidden";
		document.getElementById('side_m').style.marginLeft="120px";
		document.getElementById('add').value="Add New";
		document.getElementById('table_n').style.width="1100px";
		//document.getElementById('side_m').style.width="1024px";
		
		
		
	}
	else
	{
		document.getElementById('fx').style.width="250px";
		document.getElementById('fx').style.visibility="visible";
		document.getElementById('side_m').style.marginLeft="320px";
		document.getElementById('add').value="Hide";
		document.getElementById('table_n').style.width="900px";
		document.getElementById('table_w').value='900';
	}
	toggle=!toggle;
}
function check_box()
{
var cb=document.getElementsByClassName('poll');
	
	var i;
	
	
	for(i=0;i<cb.length;i++)
	{
		if(cb[i].checked)
		{
			
			document.getElementById('delete_menu').value=1;
			
			break;
		}
		else
		{
			document.getElementById('delete_menu').value=0;
			
		}
	}
}
function poll_check()
{
	/*var str="text"+e;
	document.getElementById(str).value=document.getElementById(e).value;
	*/
	var cb=document.getElementsByClassName('poll');
	var number_of_args=0;
	var i;
	var arg_value=new Array();
	var arg_name=new Array();
	var room_id;
	var str="type_ex.php";
	for(i=0;i<cb.length;i++)
	{
		if(cb[i].checked)
		{
			type_id="text"+cb[i].id;
			arg_name[number_of_args]="type_"+number_of_args;
			arg_value[number_of_args]=document.getElementById(type_id).value;
			//alert(arg_name[number_of_args]);
			//alert(arg_value[number_of_args]);
			if(number_of_args==0)
			str=str+"?"+arg_name[number_of_args]+"="+arg_value[number_of_args];
			else
			str=str+"&"+arg_name[number_of_args]+"="+arg_value[number_of_args]
			number_of_args+=1;
			document.getElementById('delete_menu').value=1;
		}
		else
		{
			document.getElementById('delete_menu').value=0;
		}
	}

	
	
	
	var str2='';
	if(document.getElementById('filter_state').value==1)
	{
		var f=document.getElementById('floor_h').value;
		var s=document.getElementById('status_h').value
		var a=document.getElementById('alias_h').value;
		
		str=str+"&filter_mode=1&floor_f="+f+"&status_f="+s+"&alias_f="+a;
	
	
	}
	//alert(str);
		str=str+"&ed_args="+number_of_args+str2;
		//alert(str);
	//var url="room_ex.php?edit_r="+e;
	if(number_of_args>0)
	{
		hide_menu(0);
		hide_menu(1);
		 //document.getElementById('floor_no').value='';
	var xmlHttp=new XMLHttpRequest();
	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4 || xmlHttp.readyState=='complete')
		{
			document.getElementById('t_c').innerHTML=this.responseText;
			//alert(this.responseText);
			
		}
	};
	
	xmlHttp.open("GET",str,true);
	xmlHttp.send();
	}
	
//	alert('ok');
}
function filter()
{
	hide_menu(0);
	hide_menu(1);
	 document.getElementById('floor_no').value='';
	var str="floor_ex.php?filter=1";
var xmlHttp=new XMLHttpRequest();
	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4 || xmlHttp.readyState=='complete')
		{
			document.getElementById('t_c').innerHTML=this.responseText;
			//alert(this.responseText);
			
		}
	};
	
	xmlHttp.open("GET",str,true);
	xmlHttp.send();
}
function filter_result()
{
		
		
		hide_menu(0);
		
		hide_menu(1);
		 document.getElementById('floor_no').value='';
		set_filter();
		var floor_a=document.getElementById('filter_floor');
		var floor_no=floor_a.options[floor_a.selectedIndex].value;	
		document.getElementById('floor_h').value=floor_no;
		
		var status_a=document.getElementById('filter_status');
		var status=status_a.options[status_a.selectedIndex].value;
		document.getElementById('status_h').value=status;
		var alias_a=document.getElementById('filter_alias');
		var alias=alias_a.options[alias_a.selectedIndex].value;
		document.getElementById('alias_h').value=alias;
		
		
		var url="floor_ex.php?filter_mode=1&floor_f="+floor_no+"&status_f="+status+"&alias_f="+alias;
		
		var xmlHttp=new XMLHttpRequest();
	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4 || xmlHttp.readyState=='complete')
		{
			document.getElementById('t_c').innerHTML=this.responseText;
			//alert(this.responseText);
			
		}
	};
	
	xmlHttp.open("GET",url,true);
	xmlHttp.send();
		
}
function set_filter()
{
	
	document.getElementById('filter_state').value=1;	
}

function unset_filter()
{
	hide_menu(0);
	hide_menu(1);
	 document.getElementById('floor_no').value='';
	document.getElementById('filter_state').value=0;	
	update_content();
}
function master_check_all()
{
	if(document.getElementById('master_check').checked)
	{
		var child=document.getElementsByClassName('poll');
		var i;
		for(i=0;i<child.length;i++)
		{
			child[i].checked=true;
		}
	}
	else
	{
	var child=document.getElementsByClassName('poll');
		var i;
		for(i=0;i<child.length;i++)
		{
			child[i].checked=false;
		}
	}
	try_menu();
}
function scr()
{

	window.scrollTo(0,0);
	
}
function show_menu(e)
{
	
	if(e==0)//delete
	{
		
		//display:block
		
		document.getElementById('ask_menu_w').style.display="block";
		document.getElementById('menu_delete').style.display="block";
		document.getElementById('delete_menu').value=1;
		//alert('ok');
		//make visible delete elements and then check whether validate is present. if yes, then divide 50 % of space else provide 100%
		if(document.getElementById('error_received').value==1)
		{
			//50% of space for both..
			
		}
		else
		{
			document.getElementById('e_p').style.display="none";
		}
		
	}
	else//error
	{
		
		document.getElementById('e_p').style.display="block";
		
		if(document.getElementById('delete_menu').value==1)
		{
			//50% of space for both..
			
		}
		else
		{
			document.getElementById('ask_menu_w').style.display="none";
			document.getElementById('menu_delete').style.display="none";
	//	document.getElementById('delete_menu').value=1;
		}
		
	
	}
	document.getElementById('c_nav').style.height="42px";
	document.getElementById('t_c').style.marginTop="50px";
	
	document.getElementById('table_n').style.marginTop="-40px";
	document.getElementById('table').style.marginTop="120px";
	
	
	//alert('ok');
}
function hide_menu(e)
{
	
	
	var flag=false;
	var error=false;
	var delete_n=false;
	if(e==0)//delete
	{
		
		//display:block
		
		delete_n=true
		
		//alert('ok');
		//make visible delete elements and then check whether validate is present. if yes, then divide 50 % of space else provide 100%
		if(document.getElementById('error_received').value==1)
		{
			//50% of space for both..
			flag=true;//dont hide
			
		}
		else
		{
			document.getElementById('e_p').style.display="none";
			
		}
		
	}
	else//error
	{
		
		error=true;
		
		
		if(document.getElementById('delete_menu').value==1)
		{
			//50% of space for both..
			flag=true;
			
		}
		else
		{
			document.getElementById('ask_menu_w').style.display="none";
			document.getElementById('menu_delete').style.display="none";
	//	document.getElementById('delete_menu').value=1;
		}
		
	
	}
	
	if(!flag)
	{
		
		//alert('hide');
		document.getElementById('c_nav').style.height="0px";
		document.getElementById('t_c').style.marginTop="0px";
		document.getElementById('table_n').style.marginTop="-45px";
		document.getElementById('table').style.marginTop="80px";
		
	}
	
	if(error)
		{
			document.getElementById('e_p').style.display="none";
		}
		if(delete_n)
		{
			document.getElementById('ask_menu_w').style.display="none";
			document.getElementById('menu_delete').style.display="none";
			document.getElementById('delete_menu').value=0;
		}
		//setActive();
	
}
function try_menu()
{
	cb=document.getElementsByClassName('poll');
	var flag=true;
	var i;
	for(i=0;i<cb.length;i++)
	{
		if(cb[i].checked==true)
		{
			flag=false;
			
			break;
		}
	}
	if(flag)
	{
		
			hide_menu(0);
		
	}
	else
	{
		show_menu(0);
		
	}
	
}
function open_modal()
{
	document.getElementById('modal').style.display="block";
	//document.getElementById('modal-content').style.height="800px"
}

function close_modal()
{
	document.getElementById('modal').style.display="none";
	//document.getElementById('modal-content').style.height="800px"
}
function delete_m()
{
	if(document.getElementById('delete_info').value==-1)
	{
		poll_check();
	}
	else
	{
		delete_class(document.getElementById('delete_info').value);
	}
	close_modal();
}
function cancel_delete()
{
document.getElementById('delete_info').value="";
close_modal();
}
function try_delete(e)
{
	open_modal();
	document.getElementById('delete_info').value=e;
	
	
}
function validate_NaN()
{
	/*if(isNaN(document.getElementById('floor_no').value))
	{
		document.getElementById('NaN').innerHTML="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-Invalid floor number";
		document.getElementById('floor_no').style.borderColor="#f44336";
	//	document.getElementById('submit_room').disabled=true;
	validate_room();
	}
	else
	{
		document.getElementById('NaN').innerHTML="&nbsp;";
		document.getElementById('floor_no').style.borderColor="#ccc";
		//document.getElementById('submit_room').disabled=false;
		//validate_rate();
		//validate_rate();

	}*/
	//alert(document.getElementById('room_no').value);
	setActive();
}

function validate_rate()
{
	if(document.getElementById('class_rate').value=='' || isNaN(document.getElementById('class_rate').value))
	{
		var r=0;
	//document.getElementById('floor_alias').value="";
	}
	
	var str="floor_valid.php?floor="+r;
	var xmlHttp=new XMLHttpRequest();
	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4 || xmlHttp.readyState=='complete')
		{
			document.getElementById('e_p').innerHTML=this.responseText;
			//alert(this.responseText);
			if(document.getElementById('error_received').value==1)
			{
				show_menu(1);
				//document.getElementById('submit_room').disabled=true;
				check_box();
				//alert(document.getElementById('ask_menu_w').innerHTML);
				
			}
			else
			{
				
					hide_menu(1);
					//document.getElementById('submit_room').disabled=false;
					//alert('hidden');	
			}
		}
	};
	
	xmlHttp.open("GET",str,true);
	xmlHttp.send();
	setActive();
}

function setActive()
{
	
	
	if(document.getElementById('class_name').value==''  || document.getElementById('class_rate').value=='' || isNaN(document.getElementById('class_rate').value))// || document.getElementById('error_received').value==1)
	{
		document.getElementById('submit_class').disabled=true;
		//alert('ok');
	}
	else
	{
		document.getElementById('submit_class').disabled=false;
	}
}


</script>
<style>

.txt
	{
		outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:5px 5px;
		width:240px;
		height:30px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		
	}
	.txt:focus
	{
		border: 1.5px solid #4a8bc1;
	}
	.td
	{
	 border-bottom: 1px solid #ddd;
	 transition:.5s;

	}
	.added
	{
	// border-bottom: 1px solid #ddd;
	 background-color:#53b567;
	 transition:1s;
	// color:white;

	}
	.ok
	{
	// border-bottom: 1px solid #ddd;
	 background-color:white;
	 transition:1s;
	 color:black;

	}
	
	.txt0
	{
		outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:5px 5px;
		width:220px;
		height:16px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		
	}
	.c_nav
	{
		position:fixed;
		top:38px;
		margin-left:10px;
		width:100%;
	//	background-color:#0078d7;
		height:0px;
		overflow:hidden;
		transition:.5s;
		z-index:0;
	}
	.txt0:focus
	{
		border: 1.5px solid #4a8bc1;
	}
	.ok0
	{
		//transition:,.001s;
	background-color:white;
	}
.txt2
	{
		outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:10px 10px;
		width:100px;
		height:20px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		
	}
	.e_d
	{
		overflow:hidden;
		transition:1s;
		background-color:#f44336;
		height:0px;
		color:white;
		//padding:5px;
		font-family:'Segoe UI Light';
		box-shadow:1px 1px 1px 1px #CCCCCC;
	}
	.d_u
	{
		background-color:#f44336;
		color:white;
		padding:10px;
	}
	.txt2:focus
	{
		border: 1.5px solid #4a8bc1;
	}
	
	.txt22
	{
		outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:5px 5px;
		//width:40px;
		height:10px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		text-align:center;
		
	}
	
	.txt220
	{
		outline:none;
		
		border: 1.5px solid #ccc;
		
		padding:5px 5px;
		width:80px;
		height:10px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		display:block;
		text-align:center;
	}
	
	
	.txt2:focus
	{
		border: 1.5px solid #4a8bc1;
	}
	.cmb
	{
	outline:none;
		
		border: 1.5px solid #ccc;
		
		//padding:10px 10px;
		width:100px;
		//height:20px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		//text-align:center;
		
		
		
	}
	.cmb:focus
	{
		border: 1.5px solid #4a8bc1;
	}
	
	.cmb2
	{
	outline:none;
		
		border: 1.5px solid #ccc;
		
		//padding:10px 10px;
		width:40px;
		//height:20px;
		transition:.5s;
		font-family:'Segoe UI';
		transition: .5s;
		
		
	}
	.cmb2:focus
	{
		border: 1.5px solid #4a8bc1;
	}
	body
	{
		font-family:'Segoe UI';
		font-size:14px;
		
	}
	.table
	{
	//border: 1.5px solid #4a8bc1;
	font-size: 14px;
	background-color: white;
	text-align: center;
	transition:.5s;
	margin-top:80px;
	z-index:-1;
	
	}
	.table_h
	{
	//border: 1.5px solid #4a8bc1;
	font-size: 14px;
	background-color: white;
	text-align: center;
	transition:.5s;
	position:fixed;
	//margin-left:10px;
	margin-top:-45px;
	box-shadow: .1px .1px .1px .1px #000000;
	//z-index:2;
	
	
	}

	.header
	{
		font-weight:200;
		color:white;
		
	}
	.header0
	{
		font-size:14px;
		color:#333;
		font-family:'Segoe UI';
	}
	.header1
	{
		font-size:22px;
		color:#333;
		font-family:'Segoe UI Light';
	}
	.button
	{
		
		border: 1.5px solid #4a8bc1;
		background-color:white;
		font-size:14px;
		padding:7px 14px;
		transition: .5s;
		
	}
	.button:hover
	{
		background-color:#4a8bc1;
		
	}
	.button:disabled
	{
		border: 1.5px solid #E0E0E0;
	}
	.button:disabled:hover
	{
		border: 1.5px solid #E0E0E0;
		background-color:white;
		
	}
	
	
	.button_r
	{
		
		border: 1.5px solid #F30;
		background-color:white;
		font-size:12px;
		padding:7px 14px;
		transition: .5s;
		
	}
	.button_r:hover
	{
		background-color:#F30;
		color:white;
		
	}
	
	.button_g
	{
		
		border: 1.5px solid #4a8bc1;
		background-color:white;
		font-size:12px;
		padding:7px 14px;
		transition: .5s;
		
		
	}
	
	.button_m
	{
		
		border: 1.5px solid #4a8bc1;
		background-color:#4a8bc1;
		font-size:12px;
		padding:7px 14px;
		transition: .5s;
		width:80px;
		color:white;
		
	}
	.button_m:hover
	{
		background-color:white;
		color:#4a8bc1;
	}
	.button_g:hover
	{
		background-color:#4a8bc1;
		color:white;
		
	}
	
	.button_r:disabled
	{
		
		border: 1.5px solid #ccc;
		background-color:white;
		font-size:12px;
		padding:7px 14px;
		transition: .5s;
		
	}
	.button_r:disabled:hover
	{
		
		
	}
	
	.button_g:disabled
	{
		
		border: 1.5px solid #ccc
		background-color:white;
		font-size:12px;
		padding:7px 14px;
		transition: .5s;
		
	}
	
	.button_g:disabled:hover
	{
		
		
	}
	.a
	{
		text-decoration:none;
	color:white;
	font-family:'Segoe UI';
	font-size:12px;
	}
	.main
	{
		font-size:18px;
	}
	.navigation
	{
		width:1800px;
		height:30px;
		position:fixed;
		background-color:white;
		box-shadow: 0.2px 0.2px 0.5px #000000;
	}
	body{

		margin:0;
	}
	.t_c
	{
		top:0px;
		transition:.5s;
		margin-left:10px;
	}
	.fx
	{
		
		transition: .5s;
		height:100%;
		background-color:white;
		//margin-left:0;
		width:250px;
		//width:0px;
		overflow:hidden;
		position:fixed;
		top:0;
	//	border: 1px solid #4a8bc1;
	border-right:1px solid #4a8bc1;
		padding:5px;
	//	box-shadow:1px 1px 1px #4a8bc1;
		
		
	}
	.fixed
	{
		/*position:fixed;
		box-shadow:1px 1px 1px #999999;*/
		
	}
	
	.fixed_up
	{
		/*position:fixed;
		background-color:white;
		width:100%;
		height:20px;*/
		
	}
	.side_m
	{
		margin-left:250px;
		margin-top:40px;
		transition:.5s;
		
	}
	
	.msg_box
	{
		width:250px;
		height:100px;
		background-color:#C30;	
	}
	.nav
	{
		background-color:#000;
		position:fixed;
		top:0px;
		width:100%;
		height:40px;
		z-index:1;
		//box-shadow: .1px .1px .1px .1px #000000;
	}
	.header_info
	{
		width:100px;
		background-color:#0078d7;
		color:white;
		height:40px;
		font-family:'Segoe UI Light';
		font-size:24px;
		
	}
	.menu_h_t
	{
		font-family:'Segoe UI Light';
		color:white;
		font-size:14px;
		
	}
	.ask
	{
		margin-left:0px;
	}
	.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: #FFF; /* Fallback color */
  background-color: rgba(0,0,0,0.5); /* Black w/ opacity */
  //opacity:0.5;
	transition:1s;
}

.modal-content {
    background-color: white;
    margin: auto;
    padding: 20px;
    border: 1px solid #0078d7;
    width: 400px;
	color:black
	//background-color:#4a8bc1;
	font-family:'Segoe UI Light';
	font-size:18px;
	height:200px;
	opacity:1;
	//margin-top:20px;
	//transition:1s;
	
}
.caption
{
	font-size:14px;
}

.lnk:hover
{
	//background-color:#f44336;
	background-color:#0078d7;
}
.user
{
	font-family:'Segoe UI';
	cursor:default;
	border:1px solid :#FFF;
	color:white;
	font-size:12px;
	
	
}
.user:hover
{
	color:black;
	background-color:white;
}
.user_name
{
	background-color:#F2F2F2;
	position:fixed;
	margin-top:0px;
	margin-left:1150px;
	padding:20px;
	box-shadow: 1px 1px 1px 1px #999999;
	width:170px;
	display:none;
	transition:.5s;
	z-index:7;
}
.circle
{
	border-radius:100%;
	background-color:#0078d7;
	height:82px;
	width:82px;
	font-size:35px;
	//padding:10px;
	font-family:'Segoe UI Light';
	color:white;
}
.g
{
	//font-size:60px;
}
.username
{
	font-family:'Segoe UI';
	font-size:12px;
	color:#666;
	
}
.NaN
{
	font-family:'Segoe UI';
	font-size:12px;
	color:red;
	//height:2px;
}
.logout
{
	font-family:'Segoe UI';
	font-size:12px;
	//color:#666;
	text-decoration:none;
	
}


.realname
{
	font-family:'Segoe UI';
	font-size:14px;
	
	
}

</style>
</head>

<body onload="update_content()">


<?php



 $conn=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($conn,"hotel_db");
	$un=str_split($_SESSION['user_name']);
   
    function show_floor_info_combo($conn,$db,$selected)
    {
        $query="select * from floor_info where floor_status=1";
        $result2=mysqli_query($conn,$query);
        
        while($data=mysqli_fetch_assoc($result2))
        {                        
           if($selected==-1)//when accessed through the new room entry section
           {
                echo "<option value=$data[floor_no]>$data[floor_name]</option>";//display floor name
           }
           else // when accessed through the edit section 
           {
               if ($selected==$data['floor_no'])
                    echo "<option value=$data[floor_no] selected >$data[floor_no]</option>";//the selected option will be the one currently assigned in the db.
                else
                    echo "<option value=$data[floor_no]>$data[floor_no]</option>";                      
            }
         }                            
    }
    
   function show_type_combo($conn,$db,$selected)
   {
        $query="select * from room_type";
        $result3=mysqli_query($conn,$query);
        while($data=mysqli_fetch_assoc($result3))
        {
               if ($selected==$data['type_id'])
                      echo "<option value= $data[type_id] selected>$data[type_name]</option>";//the selected option will be the one currently assigned in the db.         
               else
                      echo "<option value= $data[type_id]>$data[type_name]</option>";                        
        }                     
    }
   

?>

<div class="nav">
<?php
	if($_SESSION['user_type']==1)
	{
?>
<table width="1380px" cellpadding="0"  cellspacing="0" class="link_table"><tr>
<td width="100" class="header_info" align="center" valign="top">Innstay</td><td width="2"></td>

<td width="64" align="center" class="lnk" ><a href="booking_home.php" class="a">Home</a></td>
<td width="77" align="center" class="lnk"  ><a href="room_entry.php" class="a">Rooms</a></td>
<td width="66" align="center"  class="lnk"><a href="floor_entry.php" class="a">Floors</a></td>
<td width="84" align="center" class="lnk" bgcolor="#0078d7"><a href="type_entry.php" class="a">Classes</a></td>
<td width="116" align="center"  class="lnk"><a href="cancel.php" class="a">Cancel booking</a></td>
<td width="102" align="center"  class="lnk"><a href="services.php" class="a">Room Service</a></td>
<td width="83" align="center"  class="lnk"><a href="food_entry.php" class="a">Food Entry</a></td>
<td width="92" align="center"  class="lnk"><a href="item_entry.php" class="a">Item Entry</a></td>
<td width="82" align="center" class="lnk"><a href="timeline.php" class="a">Timeline</a></td>
<td width="79" align="center" class="lnk"><a href="booking.php "class="a">Booking</a></td>
<td width="74" align="center"class="lnk" ><a href="advance.php" class="a" >Payments</a></td>
<td width="72" align="center" class="lnk"><a href="bill.php" class="a">Billing</a></td>
<td width="86" align="center" class="lnk"><a href="dashboard.php" class="a">Dashboard</a></td>
<td width="88" align="center" class="lnk"><a href="check.php" class="a">Checkout</a></td>
<td width="111" align="center" class="user" onClick="show_context()" ><?php echo " ".$_SESSION['user_name'];?></td>

</tr></table>
<?php }
	?>

 <div class="user_name" id="user_name">
 <table align="center">
 <tr>
 <td class="circle"  valign="middle">&nbsp;&nbsp;&nbsp;<?php echo $un[0];?></td></tr></table>
  <p class="realname" align="center"><?php echo " ".$_SESSION['user_name'];?></p>
 <p class="username" align="center">Administrator</p>
  <p class="username" align="center">username: <?php echo " ".$_SESSION['login_name'];?></p>
  
   <hr>
   <p  align="center"><a href="logout.php" class="logout">logout</a></p>
   </div>

</div>
 <div class="fx" id="fx">
  <form name="f1" method="POST">
  
    <table  cellpadding="0"  cellspacing="0" >
    <tr><td><p class="header1">&nbsp;</p>
               <p class="header1">Create new Class</p></td></tr>
                  <tr>
                      <td ><table cellpadding="0"  cellspacing="0"><tr><td><p class="header0">Class Name</p></td><td ><p id="NaN" class="NaN"></p></td></tr></table></td>
                      </tr><tr> <td height="20"  align="center"> <input type="text" name="class_name" size="10" REQUIRED  class="txt0" id="class_name" onKeyUp="validate_NaN()"></td></tr>
                     
                          <td width="195">
              <p class="header0">   Rate</p>
                </td>
                </tr><tr>
                <td align="center">
                <input type="text" name="class_rate" size="10" REQUIRED  class="txt0" id="class_rate" onKeyUp="validate_NaN()">
                
                </td></tr>
                <tr>
             
            
            
              
            
                <td height="84" align="center" ><input type="button" value="submit" class="button" onClick="submit_new_class()" id="submit_class" disabled></td>
                    </tr>      
        </table>
     </form>
     
     </div>
    
     <div class="side_m" id="side_m">
     
     <p class="table_text" id="table_text"></p>
   <!-- <input type="button" onClick="expand()" class="button" value="Add New" id="add">-->
     
     <p class="t_c" id="t_c"></p>
   
    
     <input type="hidden" id="filter_state"  value="0">
     <input type="hidden" id="alias_h">
     <input type="hidden" id="floor_h">
     
     <input type="hidden" id="status_h">
  
      <input type="hidden" id="table_w">
        <input type="hidden" id="delete_info">
        <input type="hidden" id="delete_menu" value="0">
        <input type="hidden" id="error_menu" value="0">
        <div class="c_nav" id="c_nav">
      
     
     <table  cellspacing="0" cellpadding="0" class="ask" width="1100px">
     <tr><td bgcolor="#0078d7"  class='delete_td' align="center">
      <p class="menu_h_t" id="ask_menu_w" style="display:none">
      What would you like to do with the selected items?
      </p></td><td bgcolor="#0078d7">
      <input type="button" onClick="try_delete(-1)" class="button" value="delete" id="menu_delete" style="display:none"></td><td bgcolor="#f44336"   align="center" class="error_td"> <p class="menu_h_t" id="e_p" style="display:none"><input type='hidden' id='error_received' value='0'></p></td></tr></table>
      
      </div>
      
      
    </div>
    <div class="modal" id="modal">
<div class="modal-content" id="modal-content">
<br>

Do you really want to delete the selected item(s)?
<br>
<p class="caption">You can still undo this action once before any other action.</p>

<br>
<br>
<table cellspacing="20"><tr><td width="300px" ></td><td>
<input type="button" class="button_m" value="Yes" onClick="delete_m()"></td><td>

<input type="button" class="button_m" value="No" onClick="cancel_delete()"></td></tr></table>
</div>
</div>
   <input type="hidden" value="0" id="context">
   
   <input type="hidden" value="-1" id="delete_id">
</body>
</html>