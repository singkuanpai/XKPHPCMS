<?php

/*
	[xink8] (C)2009-2012  
	author:心宽咨询 xink8.com   铁是锅的 QQ 943606498 email:249287090@qq.com  singkuanpai@msn.com
	@package 1.3
	Vision: 1.3  版权所有
	Date: 2009/12/28

	铁是锅的业务服务：企业咨询、文案策划、营销策划、网站建设、网络程序二次开发、心理咨询、国学教育(应用)、修心开智、英语笔译、网络秘书、风水（环境学）应用

*/

/*
	自动进入安装 
*/

if(file_exists("xink8Cache/install.lock") && $step != "toindex")
{
 
	 
	
}
else {
    $installdir='install.php';
	if (file_exists($installdir))
	{
		Header("Location: $installdir");  
		exit; 
	}
}




require('common.inc.php');

$middle= array();
$query=$db->query("SELECT * from {$xink8pre}xink8news_article limit 10"); 
        while ($row=$db->fetch_array($query)){
			array_push($middle,$row);
		}
$tpl->assign('middle',$middle);
$tpl->display('index.tpl');

?>