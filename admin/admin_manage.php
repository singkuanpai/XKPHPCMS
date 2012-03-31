<?php   

/*
	[xink8] (C)2009-2012  
	author:心宽咨询 xink8.com   铁是锅的 QQ 943606498 email:249287090@qq.com  singkuanpai@msn.com
	@package 1.1
	Vision: 1.1  版权所有
	Date: 2010/03/24

	铁是锅的业务服务：企业咨询、文案策划、营销策划、网站建设、网络程序二次开发、心理咨询、国学教育(应用)、修心开智、英语笔译、网络秘书、风水（环境学）应用

*/
require('../common.inc.php');
require_once './checkadmin.php';


// 增加管理员
if ($_POST["btnAdd"]<>""):
   $username=str_replace("'","",trim($_POST[username]));
   $password=md5(trim($_POST[password]));
   $powerid=trim($_POST[powerid]);
   
 
     $result=$db->getOneRs("select uid,username,password,powerid  from {$xink8pre}members where username='$username'");
	 
	 if ($result):
		   echo xink8ErrorShow("管理员名称重复！");
	 else: 
		$db->query("insert into {$xink8pre}members (username,password,powerid) values ('$username','$password','$powerid')");
		Header("Location: admin_manage.php"); 
	 endif;
	 
endif;

// 删除管理员
if ($_GET["action"]=="del"):
   $uid=str_replace("'","",trim($_GET[uid]));
   
		$db->query("delete from {$xink8pre}members where uid=$uid");
		Header("Location: admin_manage.php"); 
	 
endif;


// 修改管理员
if ($_POST["btnEdit"]<>""):
   $uid=str_replace("'","",trim($_POST[uid]));
   $password=md5(trim($_POST[password]));
   $powerid=trim($_POST[powerid]);
   
		$db->query("update {$xink8pre}members set password='$password',powerid='$powerid' where uid=$uid");
		Header("Location: admin_manage.php"); 
	 
endif;


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <title> 心宽文章管理系统后台 心宽咨询 xink8.com   铁是锅的 QQ 943606498 </title>
 
  <meta name="author" content="铁是锅的|QQ:943606498|email:249287090@qq.com" />
  <meta http-equiv="Content-Type" content="text/html; charset=gb2312">
  <meta name="keywords" content="心宽咨询网站后台管理系统登录心宽咨询 xink8.com" />
  <meta name="description" content="心宽咨询网站后台管理系统登录心宽咨询 xink8.com" />
  <link href="main.css" type="text/css" rel="stylesheet">

</head>

<script language="javascript">
function LgCheckForm()
{
if (document.form1.username.value == "")
{
alert("用户名不能为空,请您输入!");
return false;
}
 
 
if (document.form1.password.value == "")
{
alert("密码不能为空,请您输入!");
return false;
}
 
 
if (document.form1.cf_password.value == "")
{
alert("请您输入确认密码!");
return false;
}
 
 
if(document.form1.password.value!=document.form.cf_password.value)
{
alert("您输入的密码与确认密码不一致!")
password.value = "";
cf_password.value = "";
return false;
}
 // LgCheckForm = true 
}
</script>
 
 

<body>
  <div  class="space_line"></div><div  class="space_line"></div><div  class="space_line"></div>
 
  <?php 
  if ($_GET["action"]<>"edit")
  {
  ?>


  <div  class="box_admin">
	  <label>添加管理员</label> 
	   <br /> <br />
  
<form  method="post" action="?" name="form1" onSubmit="return LgCheckForm();">
<label for="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名：</label><input name="username" type="text" class="inputbox" id="username" size="15" maxlength="15"/> <br />
<label for="password">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</label><input name="password" type="password" class="inputbox" id="password" size="15" maxlength="12"/>  <br />
<label for="cf_password">确认密码：</label><input name="cf_password" type="password" class="inputbox" id="cf_password" size="15" maxlength="12"/><br />
<label for="powerid">权限：</label><select id="powerid" name="powerid">
			<option value="1" selected="selected">管理员</option>
			<option value="0">普通会员</option>
        </select>  <br /><br /> 
       <input type="submit" name="btnAdd" value=" 增加 " class="button"> <input type="reset" name="btnReset" value=" 重填 " class="button" >
		</form>
 
  </div>






 
  <?php 

  }
  if ($_GET["action"]=="edit")
  {
    $uid=str_replace("'","",trim($_GET["uid"]));
 
$result=$db->getOneRs("select uid,username,password,powerid  from {$xink8pre}members where uid=$uid") or die (执行登陆失败！);
	 
	 if ($result):
		$uid=trim($result[uid]);
	    $username=trim($result[username]);
	    $powerid=trim($result[powerid]);
	 else: 
		echo ErrWindow("用户不存在！");
	 endif;


  ?>

 
    <div  class="box_admin">
	 修改管理员  <br />
 
<form  method="post" action="?" name="form1" onSubmit="return LgCheckForm();">
<label for="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名：</label> <input name="username" type="text"  id="username" size="15" maxlength="15"  readonly value="<?php  echo $username;?>"/> <input type="hidden" name="uid" id="uid"  value="<?php  echo $uid;?>" /><br />
<label for="password">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：</label><input name="password" type="password" class="inputbox" id="password" size="15" maxlength="12"/>  <br />
<label for="cf_password">确认密码：</label><input name="cf_password" type="password" class="inputbox" id="cf_password" size="15" maxlength="12"/><br />
<label for="powerid">权限：</label><select id="powerid" name="powerid">
			<option value="1" <?php if($powerid=="1"){echo "selected=selected";}?>>管理员</option>
			<option value="0" <?php if($powerid=="0"){echo "selected='selected'";}?>>普通会员</option>
        </select>  <br /><br /> 
       <input type="submit" name="btnAdd" value=" 增加 " class="button"> <input type="reset" name="btnReset" value=" 重填 " class="button" >
		</form>
	
  </div>


 

  <?php 

  }
 
  ?>


    <br/>   <br/>   <br/>   <br/>


	<div  class="listadmin">


<ul>


    <table width="650" border="0" cellspacing="0" cellpadding="5">
 
       <tr bgcolor="#999999">
        <td>编号</td>
        <td>用户名</td>
		<td>操作</td>
		<td></td>
		<td></td>
      </tr>

	  <?php  
	  
	  
	  
	$query=$db->query("select uid,username,password from {$xink8pre}members  ");
	while( $rs=$db->fetch_array($query) ){
		 
	 
		$uid=$rs[uid];
		?>


      <tr>
        <td><?php   echo   $uid;?></td>
     <td><?php   echo   $rs[username];?></td>
         <td><?php   echo   "<a href=?uid=$uid&action=edit>修改</a>";
		       if ($uid!=1){
		       echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href=?uid=$uid&action=del>删除</a>";
			   }
			?></td>
      </tr>
	  <?php  }?>
	  <tr bgcolor="#999999" height="1">
        <td></td>
        <td></td>
		<td></td>
		<td></td>
		<td></td>
      </tr>
    </table> 


</ul>


	</div>


 
 
<?php  
require('foot.html');
$db->close();
?>
</body>
</html>