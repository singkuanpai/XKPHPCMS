<?php

/*
	[xink8] (C)2009-2012  
	author:心宽咨询 xink8.com   铁是锅的 QQ 943606498 email:249287090@qq.com  singkuanpai@msn.com
	@package 1.0
	Vision: 1.0  版权所有
	Date: 2009/12/28

	铁是锅的业务服务：企业咨询、文案策划、营销策划、网站建设、网络程序二次开发、心理咨询、国学教育(应用)、修心开智、英语笔译、网络秘书、风水（环境学）应用

*/


require('common.inc.php');
 

 
	$id = intval(trim($_GET['id']));

	global $rs;
	 
		$rs = $db->getOneRs("select * from {$xink8pre}xink8news_article where id=".$id);
		$rsf = $db->getOneRs("select name from `{$xink8pre}xink8news_sort` where fid=".$rs[fid]);
	 
		$rs[fname]=$rsf[name];
 

 
$tpl->assign('info',$rs);
 

$tpl->display('shownews.tpl');

	 
?>