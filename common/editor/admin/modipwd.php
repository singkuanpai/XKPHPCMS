<?php  



require("private.php");

$sPosition = $sPosition."�޸��û���������";

editor_Header();
editor_Content();
editor_Footer();


function editor_Content(){
	switch ($GLOBALS["sAction"]){
	case "MODI":
		DoModi();
		break;
	default:
		ShowForm();
		break;
	}
}


function ShowForm(){
	?>
	<script language=javascript>
	function checklogin() {
		var obj;
		obj=document.myform.newusr;
		obj.value=BaseTrim(obj.value);
		if (obj.value=="") {
			BaseAlert(obj, "���û�������Ϊ�գ�");
			return false;
		}
		obj=document.myform.newpwd1;
		obj.value=BaseTrim(obj.value);
		if (obj.value=="") {
			BaseAlert(obj, "�����벻��Ϊ�գ�");
			return false;
		}
		if (document.myform.newpwd1.value!=document.myform.newpwd2.value){
			BaseAlert(document.myform.newpwd1, "�������ȷ�����벻��ͬ��");
			return false;
		}
		return true;
	}
	</script>

	<table border=0 cellspacing=1 align=center class=navi>
	<tr><th><?php   echo  $GLOBALS["sPosition"]?></th></tr>
	</table>

	<br>

	<table border=0 cellspacing=1 align=center class=form>
	<form action='?action=modi' method=post name=myform onsubmit="return checklogin()">
	<tr>
		<th>��������</th>
		<th>������������</th>
		<th>����˵��</th>
	</tr>
	<tr>
		<td width="15%">���û�����</td>
		<td width="55%"><input type=text class=input size=20 name=newusr value="<?php   echo  htmlspecialchars($_SESSION["editor_User"])?>"></td>
		<td width="30%"><span class=red>*</span>&nbsp;&nbsp;���û�����<span class=blue><?php   echo  htmlspecialchars($_SESSION["editor_User"])?></span></td>
	</tr>
	<tr>
		<td width="15%">�� �� �룺</td>
		<td width="55%"><input type=password class=input size=20 name=newpwd1 maxlength=30></td>
		<td width="30%"><span class=red>*</span></td>
	</tr>
	<tr>
		<td width="15%">ȷ�����룺</td>
		<td width="55%"><input type=password class=input size=20 name=newpwd2 maxlength=30></td>
		<td width="30%"><span class=red>*</span></td>
	</tr>
	<tr><td align=center colspan=3><input type=submit name=bSubmit value="  �ύ  "></a>&nbsp;<input type=reset name=bReset value="  ����  "></td></tr>
	</form>
	</table>

	<?php  
}

function DoModi(){

	$sNewUsr = toTrim("newusr");
	$sNewPwd1 = toTrim("newpwd1");
	$sNewPwd2 = toTrim("newpwd2");

	if ($sNewUsr == ""){
		GoError("���û�������Ϊ�գ�");
	}
	if ($sNewPwd1 == ""){
		GoError("�����벻��Ϊ�գ�");
	}
	if ($sNewPwd1 != $sNewPwd2){
		GoError("�������ȷ�����벻��ͬ��");
	}

	$GLOBALS["sUsername"] = $sNewUsr;
	$GLOBALS["sPassword"] = $sNewPwd1;

	WriteConfig();

	?>
	<table border=0 cellspacing=1 align=center class=navi>
	<tr><th><?php   echo  $GLOBALS["sPosition"]?></th></tr>
	</table>

	<br>

	<table border=0 cellspacing=1 align=center class=list>
	<tr>
		<td>��¼�û����������޸ĳɹ���</td>
	</tr>
	</table>
	<?php  
}

?>