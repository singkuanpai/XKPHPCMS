

document.write ("<table border=0 cellpadding=0 cellspacing=0 width='100%' height='100%'>");
document.write ("<tr><td>");

showToolbar();

document.write ("</td></tr>");

if (config.StateFlag=="1"){
	document.write ("<tr><td height=35 valign=BOTTOM>");
	document.write ("	<TABLE border='0' cellPadding='0' cellSpacing='0' width='100%' class=StatusBar height=25>");
	document.write ("	<TR valign=middle>");
	document.write ("	<td>");
	document.write ("		<table border=0 cellpadding=0 cellspacing=0 height=20>");
	document.write ("		<tr>");
	document.write ("		<td width=10></td>");
	document.write ("		<td width=95 align=center class=StatusBarBtnOff id=editor_CODE onclick=\"setMode('CODE')\" unselectable=on>" + lang["StatusModeCode"] + "</td>");
	document.write ("		<td width=5></td>");
	document.write ("		<td width=95 align=center class=StatusBarBtnOff id=editor_EDIT onclick=\"setMode('EDIT')\" unselectable=on>" + lang["StatusModeEdit"] + "</td>");
	document.write ("		<td width=5></td>");
	document.write ("		<td width=95 align=center class=StatusBarBtnOff id=editor_TEXT onclick=\"setMode('TEXT')\" unselectable=on>" + lang["StatusModeText"] + "</td>");
	document.write ("		<td width=5></td>");
	document.write ("		<td width=95 align=center class=StatusBarBtnOff id=editor_VIEW onclick=\"setMode('VIEW')\" unselectable=on>" + lang["StatusModeView"] + "</td>");
	document.write ("		</tr>");
	document.write ("		</table>");
	document.write ("	</td>");
	document.write ("	<td align=right>");
	document.write ("		<table border=0 cellpadding=0 cellspacing=0 height=20>");
	document.write ("		<tr>");
	document.write ("		<td style='cursor:pointer;' onclick='sizeChange(300)'><img border=0 SRC='buttonimage/" + config.ButtonDir + "/sizeplus.gif' width=20 height=20 alt='" + lang["SizePlus"] + "'></td>");
	document.write ("		<td width=5></td>");
	document.write ("		<td style='cursor:pointer;' onclick='sizeChange(-300)'><img border=0 SRC='buttonimage/" + config.ButtonDir + "/sizeminus.gif' width=20 height=20 alt='" + lang["SizeMinus"] + "'></td>");
	document.write ("		<td width=40></td>");
	document.write ("		</tr>");
	document.write ("		</table>");
	document.write ("	</td>");
	document.write ("	</TR>");
	document.write ("	</Table>");
	document.write ("</td></tr>");
}

document.write ("<tr><td height='100%'>");

document.write ("	<table border=0 cellpadding=0 cellspacing=0 width='100%' height='100%'>");
document.write ("	<tr><td height='100%'>");
document.write ("	<input type='hidden' ID='ContentEdit' value=''>");
document.write ("	<input type='hidden' ID='ModeEdit' value=''>");
document.write ("	<input type='hidden' ID='ContentLoad' value=''>");
document.write ("	<input type='hidden' ID='ContentFlag' value='0'>");
document.write ("	<iframe class='Composition' ID='editor' MARGINHEIGHT='1' MARGINWIDTH='1' width='100%' height='100%' scrolling='auto' frameborder='0'> ");
document.write ("	</iframe>");
document.write ("	</td></tr>");
document.write ("	</table>");

document.write ("</td></tr>");


document.write ("</table>");

document.write ("<div id='editor_Temp_HTML' style='VISIBILITY: hidden; OVERFLOW: hidden; POSITION: absolute; WIDTH: 1px; HEIGHT: 1px'></div>");

document.write ("<form id='editor_UploadForm' action='" + config.ServerExt + "/upload." + config.ServerExt + "?action=remote&type=remote&style=" + config.StyleName + "&language=" + AvailableLangs["Active"] + "' method='post' target='editor_UploadTarget'>");
document.write ("<input type='hidden' name='editor_UploadText'>");
document.write ("</form>");
document.write ("<iframe name='editor_UploadTarget' width=0 height=0></iframe>");
document.write ("<div id=divProcessing style='width:200px;height:30px;position:absolute;display:none'>");
document.write ("<table border=0 cellpadding=0 cellspacing=1 bgcolor='#000000' width='100%' height='100%'><tr><td bgcolor=#3A6EA5><marquee align='middle' behavior='alternate' scrollamount='5' style='font-size:9pt'><font color=#FFFFFF>" + lang["MsgRemoteUploading"] + "</font></marquee></td></tr></table>");
document.write ("</div>");
