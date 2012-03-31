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
//////////////////////
if ($_POST["btn_Add"]<>""){
  
   $fup=trim($_POST[fup]);
   $name=trim($_POST[name]);
   $listorder=trim($_POST[listorder]);
   $forbidshow=$_POST[forbidshow];

   if ($name==""){
     echo xink8ErrorShow("请填写分类名称！");
	 }else{

	 $db->query("INSERT INTO `{$xink8pre}xink8news_sort` (fup,name,listorder,forbidshow) VALUES ('$fup','$name','$listorder','$forbidshow')");
   }
   // Header("Location: $f_url"); 
}


if ($_POST["btn_Del"]<>""){
   $fid=$_POST[fid];
   $f_url=$_REQUEST[f_url];   
    $db->query("delete from `{$xink8pre}xink8news_sort` where `fid`=$fid or `fup`=$fid");
   Header("Location: $f_url"); 

}

if ($_POST["btn_Modi"]<>""){
   
   $fid=trim($_POST[fid]);
   $fup=trim($_POST[fup]);
   $name=trim($_POST[name]);
   $listorder=trim($_POST[listorder]);
   $forbidshow=$_POST[forbidshow];

   $f_url=$_REQUEST[f_url];
   if ($name==""){
     echo xink8ErrorShow("请填写分类名称");
	 }else{
	 $db->query("update `{$xink8pre}xink8news_sort` set name='$name',fup=$fup,forbidshow=$forbidshow,listorder=$listorder where fid=$fid");
   }
   
   Header("Location: $f_url"); 
}

//////////////////


if ($fup==""){
   $fup="0";
   $name="顶级分类";
}


$f_url=$_SERVER['SCRIPT_NAME'];
if ($_SERVER['QUERY_STRING']!="") {
$f_url=$f_url."?".$_SERVER['QUERY_STRING'];
}


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
      <table width="100%" border="0" cellpadding="0" cellspacing="1"  class="TabMain">
               <tr>
                 <td height="28" class="TabHead"><strong>分类管理 </strong></td>
               </tr>
               <tr>
                 <td class="TabBody"><table width="98%"  border="0" cellspacing="0" cellpadding="2">
                   <tr align="center" bgcolor="#ffffd9">
                     <td width="50" height="25"><font color="#92a05a"> </font></td>
                     <td width="120"><font color="#92a05a">上级分类</font></td>
                     <td width="110"><font color="#92a05a">分类名称</font></td>
                     <td width="60"><font color="#92a05a">排序</font></td>
                     <td width="120"><font color="#92a05a">状态</font></td>
                 
                     <td><font color="#92a05a">操作</font></td>
                   </tr>
				   <tr bgcolor="#dedeb8" height="1">
                     <td colspan="9"></td>
				   </tr>
                   <form name="formn" method="post" action="?">
                     <tr>
                       <td align="center"><font color="#FF0000"> </font></td>
                       <td>
<select id="fup" name="fup">
<option value="0" selected="selected">顶级分类</option>
<?php  
	$query=$db->query("select fid,fup,name,forbidshow from {$xink8pre}xink8news_sort order by fup desc  ");
	while( $rs=$db->fetch_array($query) ){
 echo "<option value=".$rs[fid].">".$rs[name]."</option>";

	}
		?>

</select>


					   </td>
                       <td><input name="name" type="text" class="InputBox" id="name"  value="" size="15" maxlength="30"></td>
                     
                       <td align="center"><input name="listorder" type="text" class="InputBox" id="listorder"  value="0" size="5" maxlength="5"></td>
                       <td><input type="radio" name="forbidshow" value="1" checked>
                         启用 &nbsp;&nbsp;
                         <input type="radio" name="forbidshow" value="0" >
                         停用 </td>
                     
                       <td align="center"><input name="btn_Add" type="submit" class="button" value="增加">
                       </td>
              
                     </tr>
                   </form>


        <?php   
		$query=$db->query("SELECT * from {$xink8pre}xink8news_sort "); 
        while ($row=$db->fetch_array($query)){
        ?>
                   <form name="formn" method="post" action="?">
				   <tr bgcolor="#dedeb8" height="1">
                     <td colspan="9"></td>
				   </tr>
                     <tr>
                       <td align="center">
					  <!--{  查看  }-->
					   </td>
                       <td><select name="fup" id="fup">
                <?php 
		 		$query1=$db->query("SELECT * from {$xink8pre}xink8news_sort "); 
				while ($fuprs=$db->fetch_array($query1)){

					echo "<option value=0>顶级分类</option>";

					echo "<option value='$fuprs[fid]' ";
					if($fuprs[fid]==$row[fup])
					{
						echo "selected=selected";
					}
					echo ">".$fuprs[name]."</option>";					 

				}							  
				?>
                       </select></td>
                       <td><input name="name" type="text" class="InputBox" id="name"  value="<?php   echo   $row[name];?>" size="15" maxlength="30"></td>

                       <td align="center"><input name="listorder" type="text" class="InputBox" id="listorder"  value="<?php   echo   $row[listorder];?>" size="5" maxlength="5"></td>
                       <td><input type="radio" name="forbidshow" value="1" <?php   if ($row[forbidshow]==0) {echo "checked";}?>>
                         启用 &nbsp;&nbsp;
                         <input type="radio" name="forbidshow" value="0" <?php   if ($row[forbidshow]==1) {echo "checked";}?>>
                         停用 </td>
                      
                       <td align="center"><input name="btn_Modi" type="submit" class="button" value="修改">
                           <input name="btn_Del" type="submit" class="button" value="删除">
                           <input name="fid" type="hidden" value="<?php   echo   $row[fid];?>">
                           <input name="f_url" type="hidden" value="<?php   echo   $f_url;?>"></td>
                     </tr>
                   </form>
                   <?php   } ?>
				   <tr bgcolor="#00CC66" height="1">
        <td colspan="9"></td>
      </tr>
				   <tr bgcolor="#00CC66" height="1">
        <td colspan="9"></td>
      </tr>
                   <tr height="10">
                     <td colspan="9"></td
                   ></tr>
                 </table></td>
               </tr>
      </table></td>
  </tr>
</table>
<br><br>

 
<?php  
require('foot.html');
$db->close();
?>
</body>
</html>