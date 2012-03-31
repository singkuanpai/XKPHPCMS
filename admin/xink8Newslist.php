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

 

if( isset($_GET['fid']) ){
   $fid = intval( $_GET['fid'] );
   }else{
   $fid = 0;
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
                 <td height="28" class="TabHead"><strong>文章管理 </strong></td>
               </tr>
               <tr>
                 <td class="TabBody"><table width="100%"  border="0" cellpadding="2" cellspacing="0">
                   <tr align="center" bgcolor="#ffffd9">
                     <td width="80" bgcolor="#ffffd9"><font color="#92a05a"> </font></td>
                     <td width="300"><font color="#92a05a">标题</font></td>
                  
                     <td width="200"><font color="#92a05a">提交时间</font></td>
                     <td><font color="#92a05a">操作</font></td>
                   </tr>
                   <?php   
			$result=$db->query("SELECT id,title,fid,fname,posttime  from {$xink8pre}xink8news_article order by id desc"); 
            while ($row=$db->fetch_array($result)){
		?>
                   <form name="formn" method="post" action="page_exec.php">
				   <tr bgcolor="#dedeb8" height="1">
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
				   </tr>
                     <tr>
                       <td align="center"></td>
                       <td><input name="title" type="text" class="InputBox" id="title" value="<?php   echo   str_replace('"','&quot;',$row[title]);?>" size="50" maxlength="100"></td>
                     
                       <td><input name="posttime" type="text" class="InputBox" id="fname" value="<?php   echo   getPostTimeXink8($row[posttime]);?>" size="24" maxlength="15"></td>
                       <td> 
                           <a href="xink8NewsManage.php?id=<?php   echo   $row[id];?>&action=edit&fid=<?php   echo   $row[fid];?>">查看/修改</a>  &nbsp;&nbsp;<input name="btn_Del" type="submit" class="button" value="删除">
                           <input name="id" type="hidden" value="<?php   echo   $row[id];?>">
                           <input name="fid" type="hidden" value="<?php   echo   $row[fid];?>">
                           
                     </tr>
                   </form>
                   <?php   } ?>
				   <tr bgcolor="#00CC66" height="1">
        <td colspan="5"></td>
      </tr>
                   <tr height="10">
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                   </tr>
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