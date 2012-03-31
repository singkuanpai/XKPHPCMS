<?php   

/*
	[xink8] (C)2009-2012  
	author:心宽咨询 xink8.com   铁是锅的 QQ 943606498 email:249287090@qq.com  singkuanpai@msn.com
	@package 1.0
	Vision: 1.0  版权所有
	Date: 2009/12/28

	铁是锅的业务服务：企业咨询、文案策划、营销策划、网站建设、网络程序二次开发、心理咨询、国学教育(应用)、修心开智、英语笔译、网络秘书、风水（环境学）应用

*/

require('../common.inc.php');
require_once './checkadmin.php';
////////////////////////////////////



if ($_POST["btn_Add"]<>""){
   $title=str_replace("\&quot;","&quot;",xink8FiltrateStr($_POST[title]));
   $content=$_POST[content];
   $fid=$_REQUEST[fid];
   $posttime=time();

   if($fid==""){ echo xink8ErrorShow("请选择分类");}
   $db->query("INSERT INTO `{$xink8pre}xink8news_article` ( `title` , `content` , `fid`, `posttime`) VALUES ('$title', '$content', '$fid','$posttime')");
   Header("Location: xink8Newslist.php"); 
}

//if ($_POST["btn_Modi"]<>"" )

if ($_GET["job"]=="editnews" ){
   $title=str_replace('\"','&quot;',$_POST[title]);
   $content=$_POST[content];
   $id=$_POST[id];
   $fid=$_POST[fid];


   $db->query("update `{$xink8pre}xink8news_article` set `title`='$title', `fid`='$fid', `content`='$content'  where `id`='$id'");
   Header("Location: xink8Newslist.php"); 
} 

if ($_POST["btn_Del"]<>""){
   $id=str_replace("'","",$_REQUEST[id]);
   $db->query("delete from `{$xink8pre}xink8news_article` where `id`=$id");
   Header("Location: xink8Newslist.php"); 
 
}


/////////////////////////////////////
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
<body topmargin="0" leftmargin="0">
<table width="100%"  border="0" cellspacing="10" cellpadding="0">
  <tr>
    <td align="center" valign="top">
	
	<?php
if (trim($_GET['action'])=="addnews" )
{

?>
	
	<table width="100%" border="0" cellpadding="0" cellspacing="1"  class="TabMain">
      <tr>
        <td height="28" class="TabHead"><strong> 增加内容</strong></td>
      </tr>
      <tr>
        <td class="TabBody"><table width="98%"  border="0" cellspacing="0" cellpadding="2">
  <form name="form" method="post" action="?">
  
  <tr>
    <td width="85"><strong>标题：</strong></td>
    <td align="left"><input name="title" type="text" class="InputBox" id="title" size="100" maxlength="100"></td>
  </tr>

 <tr>
    <td width="85"><strong>类别：</strong></td>
    <td align="left">
	<select id="fid" name="fid">
	<option value='' selected="selected">请选择类别</option> 

                <?php 
		 		$query1=$db->query("SELECT * from {$xink8pre}xink8news_sort order by fid desc"); 
				while ($fuprs=$db->fetch_array($query1)){					
					echo "<option value='$fuprs[fid]' ";				
					echo ">".$fuprs[fid].$fuprs[name]."</option>";						
				}							  
				?>
	</select>
	
</tr>

  <tr> <td height="1" bgcolor="#bbe9ff" colspan="2"></td></tr>
  <tr>
    <td><strong>内容：</strong></td>
    <td align="left"><INPUT type="hidden" name="content" value="">
        <IFRAME ID="eWebEditor1" src="../common/editor/editor.htm?id=content&style=userstyle" frameborder="0" scrolling="no" width="650" height="430"></IFRAME></td>
  </tr>
  <tr><td height="1" bgcolor="#bbe9ff" colspan="2"></td> </tr>
  <tr><td height="1" bgcolor="#bbe9ff" colspan="2"></td> </tr>
  <tr>
    <td><strong>操作：</strong></td>
    <td align="left"><input name="btn_Add" type="submit" class="button" id="btn_Add" value="    增加    ">
       </td>
  </tr>
  <form>
  
        </table></td>
      </tr>
    </table>
	
	
<?php
}
if (trim($_GET['action'])=="edit" )
{

	
if( isset($_GET['id']) ){
   $id = intval( $_GET['id'] );
   } 

   $rs=$db->getOneRs("SELECT * from {$xink8pre}xink8news_article where id=$id"); 

?>		 
				 
	<table width="100%" border="0" cellpadding="0" cellspacing="1"  class="TabMain">
      <tr>
        <td height="28" class="TabHead"><strong>修改内容</strong></td>
      </tr>
      <tr>
        <td class="TabBody"><table width="98%"  border="0" cellspacing="0" cellpadding="2">
  <form name="form" method="post" action="?job=editnews">
  
  <tr>
    <td width="85"><strong>标题：</strong></td>
    <td align="left"><input name="title" type="text" value="<?php   echo   str_replace('"','&quot;',$rs[title]);?>" class="InputBox" id="title" size="100" maxlength="100"></td>
  </tr>

 <tr>
    <td width="85"><strong>类别：</strong></td>
    <td align="left">
	<select id="fid" name="fid">
	<option value='' selected="selected">请选择类别</option> 

                <?php 
		 		$query1=$db->query("SELECT * from {$xink8pre}xink8news_sort order by fid desc"); 
				while ($fuprs=$db->fetch_array($query1)){	
					
					echo "<option value='$fuprs[fid]' ";
					if($fuprs[fid]==$rs[fid])
					{
						echo "selected=selected";
					}
					echo ">".$fuprs[name]."</option>";	

 					
				}							  
				?>
	</select>
	
</tr>

  <tr> <td height="1" bgcolor="#bbe9ff" colspan="2"></td></tr>
  <tr>
    <td><strong>内容：</strong></td>
    <td><INPUT type="hidden" name="content" value="<?php   echo   str_replace('"','&quot;',$rs[content]);?>">
        <IFRAME ID="eWebEditor1" src="../common/editor/editor.htm?id=content&style=userstyle" frameborder="0" scrolling="no" width="650" height="430"></IFRAME></td>
  </tr>
  <tr><td height="1" bgcolor="#bbe9ff" colspan="2"></td> </tr>
  <tr><td height="1" bgcolor="#bbe9ff" colspan="2"></td> </tr>
  <tr>
    <td><strong>操作：</strong></td>
    <td>
	<input name="id" type="hidden" value="<?php   echo  $rs[id];?>">
	<input name="bbtn_Modi" type="submit" class="button" id="btn_Modi" value="   修改   ">
       </td>
  </tr>
  <form>
  
        </table></td>
      </tr>
    </table>
				 
				 
<?php
}
?>			 	
	
	
	
	
	
	
	</td>
  </tr>
</table>
<br><br>
<?php  
require('foot.html');
//$db->close();
?>
</body>
</html>