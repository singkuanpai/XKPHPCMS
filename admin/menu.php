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
<base target="mainFrame">
</head>
<body topmargin="0" leftmargin="0">
     <table width="90%" border="0" cellpadding="0" cellspacing="1"  class="TabMain" align="center">
          <tr>
            <td height="25" class="TabHead"><strong>xink8.com</strong></td>
          </tr>
      
        </table>
		
		<br>
     <table width="90%" border="0" cellpadding="0" cellspacing="1"  class="TabMain" align="center">
          <tr>
            <td height="25" class="TabHead"><strong>基本设置</strong></td>
          </tr>
          <tr>
            <td class="TabBody">
			<table width="90%"  border="0" cellspacing="0" cellpadding="3" align="center">
             <tr>
             <td>&nbsp;&nbsp;<a href="siteinfo.php">站点信息</a></td>
             </tr>
             <tr>
               <td height="1" bgcolor="#bbe9ff"></td>
             </tr>
            <tr>
             <td>&nbsp;&nbsp;<a href="admin_manage.php">后台管理员管理</a></td>
             </tr>
			    <tr>
             <td>&nbsp;&nbsp;<a href="kind_manage.php">类别管理</a></td>
             </tr>

			    <tr>
             <td>&nbsp;&nbsp;<a href="xink8Newslist.php">文章管理</a>  </td>
             </tr>

			  <tr>
             <td>&nbsp;&nbsp;<a href="xink8NewsManage.php?action=addnews">文章添加</a>  </td>
             </tr>
	 
            </table>
			</td>
          </tr>
        </table>
		
		<br>
  

		<br>
		<table width="90%" border="0" cellpadding="0" cellspacing="1"  class="TabMain" align="center">
          <tr>
            <td height="25" class="TabHead"><strong><a href="logout.php">[<?php   echo  $_SESSION["{$xink8pre}adminName"]?>]退出</a></strong></td>
          </tr>
        </table>
</body>
</html>