<?php
/**
 *  主包含页面

	[xink8] (C)2009-2012  
	author:心宽咨询 xink8.com   铁是锅的 QQ 943606498 email:249287090@qq.com  singkuanpai@msn.com
	@package 1.0
	Vision: 1.0  版权所有
	Date: 2009/12/28

	铁是锅的业务服务：企业咨询、文案策划、营销策划、网站建设、网络程序二次开发、心理咨询、国学教育(应用)、修心开智、英语笔译、网络秘书、风水（环境学）应用


 */

set_magic_quotes_runtime(0);

/*
* 路径
*/
require('config.cfg.php');


/* 
 * 文档根路径
 */
$xink8cfg['path_root']= dirname(__FILE__) . '/';
$xink8cfg['version'] = '0.1';
$xink8cfg['time'] = time();
$xink8time = time();


/* 
 * 站点信息
 */
$xink8cfg['charset']    	= 	'utf-8';
$xink8cfg['pageType']='html';
$xink8cfg['style']  		= 	'default';       // 主题
$xink8cfg['url']   		= 	'/';        // 站点URL

 

$xink8cfg['domain'] 		= 	'';   // 如域名 '.xink8.com'; 
$xink8cfg['debug']  		= 	1;               // 是否发布状态0为发布

$xink8cfg['path_common'] 	= $xink8cfg['path_root'] . 'common/';
$xink8cfg['path_common_classes'] 	= $xink8cfg['path_root'] . 'common/classes/';
$xink8cfg['path_template'] = $xink8cfg['path_root'] . 'template/';
$xink8cfg['path_Cache'] = $xink8cfg['path_root'] . 'xink8Cache/';
 
define('SYSTEM_ADMIN_ID', 1);
define('TABLEPREFIX','xink8_');//表前缀

/////////////////////////////////////////////
 
if ($xink8cfg['pageType']=='wap' ) {
	header('content-Type: text/html; charset=utf-8');
//}elseif($_REQUEST['request']=='ajax'){
	//header('content-Type: text/html; charset=utf-8');
} else {
	@header('content-Type: text/html; charset=' . $xink8cfg['charset']);
}

require($xink8cfg['path_common'] . 'classes/Util.inc.php');
$magic_quotes_gpc = get_magic_quotes_gpc();
$_COOKIE = c_addslashes($_COOKIE);
$_POST 	 = c_addslashes($_POST);
$_GET 	 = c_addslashes($_GET);
if(!$magic_quotes_gpc) {
	$_FILES = c_addslashes($_FILES);
}

if (!$xink8cfg['debug']) {
	error_reporting(0);
	ob_start('ob_gzhandler');
} else {
	error_reporting(E_ALL ^ E_NOTICE);
}


/*
* 数据库连接
*/
require_once($xink8cfg['path_common'] . 'commonFunction.php');
require_once($xink8cfg['path_common'] . 'classes/mysql_class.php');
require($xink8cfg['path_common']. 'smarty/libs/Smarty.class.php');

$db = new MysqlDbQuery();

/*
* 模版引擎
*/
$tpl = new Smarty();
$tpl->template_dir 		= $xink8cfg['path_template'].'default/';
$tpl->compile_dir  		= $xink8cfg['path_Cache'] . 'template_c/';

$tpl->compile_check  	= $xink8cfg['debug'];
$tpl->debugging 	    = false;
$tpl->caching 	    	= 0;
$tpl->cache_lifetime 	= 6000;

$tpl->left_delimiter 	= '<!--{';
$tpl->right_delimiter 	= '}-->';


/*
* 引用赋值
*/
$tpl->assign_by_ref('xink8cfg',$xink8cfg);



?>