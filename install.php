<?php
header("Content-type: text/html; charset=utf-8");
error_reporting(0);
ob_start();
$magic_quotes_gpc = get_magic_quotes_gpc();
@extract(daddslashes($_POST));
@extract(daddslashes($_GET));

include_once('install/install.lang.php');
include_once("common.inc.php");

define("HR","<hr color='#D4D4D4' size='1' />");

if(file_exists("xink8Cache/install.lock") && $step != "toindex")
{
 
	echo_start();
	echo_msg("已经安装完成，如果您要重新安装，请先删除文件xink8Cache/install.lock。如果不重新安装，请删除安装文件install.php。");
	echo_end();
	exit;
	
}


	install_header();
$step = empty($_GET['step'])? 1 : intval($_GET['step']);
$setuppass = true;
$langstep = $lang['step_'.$step];

echo <<<END
	<div class="header">
		<h1>$lang[install_wizard]</h1>
		<div class="setup step$step">
			<h2>$langstep</h2>
		</div>

	</div>
	<div class="main">
END;


if($step)
{

 if($step == 1) {
	if(file_exists('install.lock')) {
		echo '<h4>'.$lang['all_install'].'<h4>';
		install_footer();
		exit;
	} 
	$phpos = PHP_OS;
	$result = array();
	if(function_exists('mysql_connect')) {
		$result['mysql'] = '<td class="w pdleft1">'.$lang['supportted'].'</td>';
	} else {
		$result['mysql'] = '<td class="nw pdleft1">'.$lang['unsupportted'].'</td>';
		$pass = FALSE;
	}
	if(PHP_VERSION > '4.3.0') {
		$result['phpversion'] = '<td class="w pdleft1">'.PHP_VERSION.'</td>';
	} else {
		$result['phpversion'] = '<td class="nw pdleft1">'.PHP_VERSION.'</td>';
		$pass = FALSE;
	}
	if(@ini_get(file_uploads)) {
		$max_size = @ini_get(upload_max_filesize);
		$result['upload'] = '<td class="w pdleft1">'.$lang['max_size'].$max_size.'</td>';
	} else {
		$result['upload'] = '<td class="nw pdleft1">'.$lang['unsupportted'].'</td>';
		$pass = FALSE;
	}
	$curr_disk_space = intval(diskfreespace('.') / (1024 * 1024)).'M';
	if($curr_disk_space > 10) {
		$result['diskfree'] = '<td class="w pdleft1">'.$curr_disk_space.'</td>';
	} else {
		$result['diskfree'] = '<td class="nw pdleft1">'.$curr_disk_space.'</td>';
		$pass = FALSE;
	}
	echo <<<END
	<div class="main">
		<h2 class="title">$lang[env_check]</h2>
		<table class="tb" style="margin:20px 0 20px 55px;">
			<tr>
				<th>$lang[project]</th>
				<th class="padleft">$lang[XINK8CMS_required]</th>
				<th class="padleft">$lang[XINK8CMS_best]</th>
				<th class="padleft">$lang[curr_server]</th>
			</tr>
			<tr>
				<td>$lang[os]</td>
				<td class="padleft">$lang[unlimit]</td>
				<td class="padleft">UNIX/Linux/FreeBSD</td>
				<td class="padleft">$phpos</td>
			</tr>
			<tr>
				<td>PHP $lang[version]</td>
				<td class="padleft">4.3.0+</td>
				<td class="padleft">5.0.0+</td>
				$result[phpversion]
			</tr>
			<tr>
				<td>$lang[attach_upload]</td>
				<td class="padleft">$lang[allow]</td>
				<td class="padleft">$lang[allow]</td>
				$result[upload]
			</tr>
			<tr>
				<td>MySQL $lang[supportted]</td>
				<td class="padleft">MySQL4.0+</td>
				<td class="padleft">MySQL5.0+</td>
				$result[mysql]
			</tr>
			<tr>
				<td>$lang[disk_free]</td>
				<td class="padleft">30M+</td>
				<td class="padleft">$lang[unlimit]</td>
				$result[diskfree]
			</tr>
		</table>
END;
	echo <<<END
	<h2 class="title">$lang[func_depend]</h2>
		<table class="tb" style="margin:20px 0 20px 55px;width:90%;">
			<tr>
				<th>$lang[func_name]</th>
				<th class="padleft">$lang[check_result]</th>
				<th class="padleft">$lang[suggestion]</th>
			</tr>
END;
	$functions = array('mysql_connect'=>FALSE, 'fsockopen'=>FALSE, 'gethostbyname'=>FALSE, 'file_get_contents'=>FALSE, 'xml_parser_create'=>FALSE);
	$advices = array(
		'mysql_connect' => $lang['advice_mysql'],
		'fsockopen' => $lang['advice_fopen'],
		'file_get_contents' => $lang['advice_file_get_contents'],
		'xml_parser_create' => $lang['advice_xml']
	);
	foreach($functions as $name=>$status) {
		$status = function_exists($name);
		echo '<tr><td>'.$name.'()</td>'.($status ? '<td class="w pdleft1">'.$lang['supportted'].'</td>' : '<td class="nw pdleft1">'.$lang['unsupportted'].'</td>').($status ? '<td class="padleft">'.$lang['none'].'</td>' : '<td><font color="red">'.$advices[$name].'</font></td>').'</tr>';
	}
	echo '</table>';
 
//系统安装检测
	$dirs = array('xink8Cache', 'template', 'xink8Cache/template_c');
	echo <<<END
		<h2 class="title">$lang[priv_check]</h2>
		<table class="tb" style="margin:20px 0 20px 55px;width:90%;">
			<tr>
				<th width="61%">$lang[step1_file]</th>
				<th class="padleft">$lang[step1_need_status]</th>
				<th class="padleft">$lang[step1_status]</th>
			</tr>
END;

	if(!checkfdperm('config.cfg.php',1)) {
		$setuppass = false;
		$checkok = false;
	} else {
		$checkok = true;
	}
	echo '<tr><td>config.cfg.php</td><td class="w pdleft1">'.$lang['writeable'].'</td><td'.($checkok ? ' class="w pdleft1">'.$lang['writeable'] : ' class="nw pdleft1">'.$lang['unwriteable']).'</td></tr>';

	foreach($dirs as $dir) {
		if(!check_write($dir)) {
			$setuppass = false;
			$checkok = false;
		} else {
			$checkok = true;
		}
		echo '<tr><td>./'.$dir.'</td><td class="w pdleft1">'.$lang['writeable'].'</td><td'.($checkok ? ' class="w pdleft1">'.$lang['writeable'] : ' class="nw pdleft1">'.$lang['unwriteable']).'</td></tr>';
	}
//系统信息检查

  
    
	echo '</table>';
	echo '<form action="?step=2" method="post">';
	if($setuppass) {
		$nextstep = ' <input type="button" onclick="history.back();" value="'.$lang['old_step'].'"><input type="submit" value="'.$lang['new_step'].'">';
	} else {
		$nextstep = ' <input type="button" disabled="disabled" value="'.$lang['step1_unwriteable'].'">';
	}
	echo_msg("欢迎您安装xink8CMS心宽新闻文章管理系统".HR);
	echo_msg(HR."<span style='color:red;'>友情提示：</span>程序检查可能不全面，建议手动检查".HR);
	//echo_msg(HR.button("setconfig"));
	echo_end();


	echo '<div class="btnbox marginbot"> '.$nextstep.'</div>';
	echo '</form>';
 

 } 

}

	


if($step == "2")
{
	 
	echo_start();
	echo_msg("配置config.cfg.php文件信息".HR);
	form_start("?step=3");
	echo_msg("服务器地址：","<input type='text' name='dbhost' value='localhost' style='float:left'>",true);
	echo_msg("数据库端口：","<input type='text' name='db_port' value='3306' style='width:45px;float:left'  >",true);
	echo_msg("数据库账号：","<input type='text' name='dbuser' value='root'  style='float:left'>",true);
	echo_msg("数据库名称：","<input type='text' name='dbname' style='float:left'> [请确保存在数据库]",true);
	echo_msg("数据库密码：","<input type='text' name='dbpw' style='float:left'>",true);

	echo_msg(HR);
	echo_msg("数据表前缀：","<input type='text' name='$xink8pre' value='xk_' style='float:left'>",true);
	 
	echo "<input type='hidden' name='urlrewrite' value='0'>";
	echo_msg(HR.button("","上一步")." ".button("submit","下一步"));
	echo_end();
	form_end();
 
}
elseif($step == "3")
{
	$dbhost = safe_html($_POST[dbhost]);
	$db_port = safe_html($db_port);
	if(!$db_port)
	{
		 $db_port = "3306";
	}
	if($db_port != "3306")
	{
		 $dbhost = $dbhost.":".$db_port;
	}
	$dbuser = safe_html($_POST[dbuser]);
	$dbpw = safe_html($_POST[dbpw]);
	$dbname = safe_html($_POST[dbname]);
	if(!$dbname)
	{
		error("数据库名称不允许为空","2");
		exit;
	}
	$xink8pre = safe_html($xink8pre) ? safe_html($xink8pre) : "xk_";
	if(substr($xink8pre,-1) != "_")
	{
		$xink8pre .= "_";
	}
	$ischeck = intval($ischeck) ? "true" : "false";

 

	#[检测数据库能否连接得上]
	$chk_conn = mysql_connect($dbhost,$dbuser,$dbpw);
	if(!$chk_conn)
	{
		error("无法连接到数据库上，请检查配置是否正确...","2");
		exit;
	}
	#[检测数据库是否存在]
	$chk_data = mysql_select_db($dbname);
	if(!$chk_data)
	{
		error("没有找到数据库，请检查该数据库是否存在...","2");
		exit;
	}
	#[写入信息]
	$msg = "<?"."php\n";
	$msg.= "#[数据库信息]\n";
	$msg.= "\$dbhost = \"".$dbhost."\";\n";
	$msg.= "\$dbuser = \"".$dbuser."\";\n";
	$msg.= "\$dbpw = \"".$dbpw."\";\n";
	$msg.= "\$dbname = \"".$dbname."\";\n";
	$msg.= "\n#[数据表前缀]\n";
	$msg.= "\$xink8pre = \"".$xink8pre."\";\n";
	$msg.= "\n#[是否启用调试]\n";
	$msg.="\$database = 'mysql';\n";
	$msg.= "\$xink8cfg['debug'] = 0;\n";
	$msg.="\$pconnect = 0;	\n";
	$msg.= "\$dbcharset = 'gbk';	\n";


	$msg.= "?>";

	if(!file_exists("config.cfg.php"))
	{
		error("config.cfg.php配置文件不存在，请返回修改","2","设置config.cfg.php文件");
		exit;
	}

	$handle = fopen("config.cfg.php","wb");
	fwrite($handle,trim($msg));
	fclose($handle);
	error("config.cfg.php信息已经配置成功！","4","下一步");
	echo_msg("<br />" );
 
 
}
elseif($step == "4")
{

	if(!file_exists("xink8.sql"))
	{
		error("xink8.sql 文件不存在，请上传...","2","下一步");
	}
	 
    $db = new MysqlDbQuery();


	 
	$sql = file_get_contents("xink8.sql");

	if($xink8pre != "xk_")
	{
		$sql = str_replace("xk_",$xink8pre,$sql);
	}

	format_sql($sql); 
 
	unset($sql);
 
	error("数据表信息已成功导入，下一步管理员设置","5","下一步");
}
elseif($step == "5")
{
	
	echo_start();
	echo_msg("设置管理员账号密码".HR);
	form_start("?step=6");
	echo_msg("管理员账号：","<input type='text' name='user' value='admin'>",true);
	echo_msg("管理员密码：","<input type='text' name='pass' value='admin'>",true);
	echo_msg("管理员邮箱：","<input type='text' name='email' value='admin@admin.com'>",true);
	echo_msg(HR);
	echo_msg(button("submit","下一步"));
	echo_end();
	form_end();

}
elseif($step == "6")
{
	$user = safe_html($user);
	$pass = safe_html($pass);
	$email = safe_html($email);
	if(!$user)
	{
		error("管理员账号不能为空","admin");
	}
	if(!$pass)
	{
		error("管理员密码不能为空","admin");
	}
	if(!file_exists("config.cfg.php"))
	{
		error("config.cfg.php配置文件不存在，请返回修改","setconfig","设置config.cfg.php文件");
	}
	if(!file_exists("xink8.sql"))
	{
		error("xink8.sql 文件不存在，请上传...","incsql","下一步");
	}
	 include_once("common.inc.php");
 
	$db->query("TRUNCATE TABLE `".$xink8pre."members");
	$sql = "INSERT INTO ".$xink8pre."members(username,password,powerid) VALUES('".$user."','".md5($pass)."','1')";
	$db->query($sql);
	error("管理员设置成功","7","下一步");
}
elseif($step == "7")
{
	@touch("xink8Cache/install.lock");
	error("恭喜您，xink8CMS心宽新闻文章管理程序已安装成功<br /><br />感谢您使用xink8CMS心宽新闻文章管理程序，请删除安装文件install.php和文件夹install。祝您身体健康！事业进步！万事如意！","toindex","进入首页");
}
elseif($step == "toindex")
{
	ob_end_clean();
	header("Location:index.php");
}
install_footer();






























function daddslashes($string, $force = 0)
{
	if(!$GLOBALS["magic_quotes_gpc"] || $force)
	{
		if(is_array($string))
		{
			foreach($string as $key => $val)
			{
				$string[$key] = daddslashes($val, $force);
			}
		}
		else
		{
			$string = addslashes($string);
		}
	}
	return $string;
}


function update_sql($file)
{
	global $db,$pre,$dbcharset;
	$readfiles=read_file($file);
	$detail=explode("\n",$readfiles);
	$count=count($detail);
	for($j=0;$j<$count;$j++){
		$ck=substr($detail[$j],0,4);
		if( ereg("#",$ck)||ereg("--",$ck) ){
			continue;
		}
		$array[]=$detail[$j];
	}
	$read=implode("\n",$array); 
	$sql=str_replace("\r",'',$read);
	$detail=explode(";\n",$sql);
	$count=count($detail);
	for($i=0;$i<$count;$i++){
		$sql=str_replace("\r",'',$detail[$i]);
		$sql=str_replace("\n",'',$sql);
		$sql=trim($sql);
		if($sql){
			$sql=str_replace("xk_",$xink8pre,$sql);
			if($dbcharset && mysql_get_server_info() >= '4.1' ){
				$sql=str_replace("TYPE=MyISAM","TYPE=MyISAM DEFAULT CHARSET=$dbcharset ",$sql);
			}
			$db->query($sql);
			$check++;
		}
	}
	return $check;
}



Function format_sql($sql)
{
	global $db;
	$sql = str_replace("\r","\n",$sql);
	$ret = array();
	$num = 0;
	foreach(explode(";\n", trim($sql)) as $query) {
		$queries = explode("\n", trim($query));
		foreach($queries as $query) {
			$ret[$num] .= $query[0] == '#' || $query[0].$query[1] == '--' ? '' : $query;
		}
		$num++;
	}
	unset($sql);

	foreach($ret as $query) {
		$query = trim($query);
		if($query) {
			if(substr($query, 0, 12) == 'CREATE TABLE') {
				$name = preg_replace("/CREATE TABLE ([a-z0-9_]+) .*/is", "\\1", $query);
				//echo '创建表：'.$name.' ... <font color="#0000EE">'.$lang['succeed'].'</font><br>';
				$db->query(create_table($query));
			} else {
				$db->query($query);
			}
		}
	}
}

function create_table($sql)
{
	return preg_replace("/^\s*(CREATE TABLE\s+.+\s+\(.+?\)).*$/isU", "\\1", $sql).(mysql_get_server_info() > '4.1' ? " ENGINE=MyISAM DEFAULT CHARSET=gbk" : " TYPE=MYISAM");
}

function install_header() {
	global $lang;
	$charset = CHARSET;
   	$uri = $_SERVER['REQUEST_URI']?$_SERVER['REQUEST_URI']:($_SERVER['PHP_SELF']?$_SERVER['PHP_SELF']:$_SERVER['SCRIPT_NAME']);
	$siteurl = strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, strpos($_SERVER['SERVER_PROTOCOL'], '/'))).'://'.$_SERVER['HTTP_HOST'].preg_replace("/\/*install$/i", '', substr($uri, 0, strrpos($uri, '/install')));
	echo <<<END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=$charset" />
<title>欢迎安装xink8CMS心宽文章系统</title>
<link rel="stylesheet" href="install/css/setup.css" type="text/css" media="all" />
<meta content="Comsenz Inc." name="Copyright" />
 


</head>
<body>
<div class="container">
END;
}
function install_footer() {

	echo <<<END
		<br /><br />
				<div class="footer"><br />&copy;2009-2010 <a href="http://www.xink8.com/" target="_blank">Xink8</a> Inc.</div>
			</div>
		</div>
	</body>
	</html>
END;
}


 

function echo_msg($left="",$right="",$mouse=false)
{
	$mouse = $mouse ? " onmouseover=\"this.style.backgroundColor='#EEEEEE'\" onmouseout=\"this.style.backgroundColor=''\"" : "";
	echo "<div".$mouse.">\n";
	echo "<table width='100%' cellpadding='0' cellspacing='0'>\n";
	echo "<tr>\n";
	if($right)
	{
		echo "<td width='220px' align='right' height='30px'>&nbsp;".$left."</td>\n";
		echo "<td>".$right."</td>";
	}
	else
	{
		echo "<td align='center'>".$left."</td>";
	}
	echo "</tr>";
	echo "</table>";
	echo "</div>";
}

function echo_start()
{
	echo "<div align='center'>";
	echo "<div style='border:1px #D4D4D4 solid;width:550px;padding:5px;'>";
}

function echo_end()
{
	echo "</div>";
}

function form_start($url="")
{
	echo "<script type='text/javascript'>\n";
	echo "function chkalert()\n{\n\tq=confirm('请检查信息是否填写正确，按“确定”继续，按“取消”返回');\n";
	echo "\tif(q == '0')\n\t{\n\t\treturn false;\n\t}\n}\n";
	echo "</script>\n";
	echo "<div style='display:none;'><form method='post' action='".$url."' onsubmit='return chkalert();'></div>";
}

function form_end()
{
	echo "<div style='display:none;'></form></div>";
}

function button($type="button",$value="下一步")
{
	if($type == "submit")
	{
		$button = "<input type='submit' value='".$value."'>";
	}
	else
	{
		$button = "<script type='text/javascript'>\nfunction tourl(id)\n{\nwindow.location.href='?step='+id;\n}\n</script>\n";
		$button .= "<input type='button' value='".$value."' onclick=\"tourl('".$type."')\">";
	}
	return $button;
}

function safe_html($msg = "")
{
	if(empty($msg))
	{
		return false;
	}
	$msg = str_replace('&amp;','&',$msg);
	$msg = str_replace('&nbsp;',' ',$msg);
	$msg = str_replace("'","&#39;",$msg);
	$msg = str_replace('"',"&quot;",$msg);
	$msg = str_replace("<","&lt;",$msg);
	$msg = str_replace(">","&gt;",$msg);
	$msg = str_replace("\t","&nbsp; &nbsp; ",$msg);
	$msg = str_replace("\r","",$msg);
	$msg = str_replace("   ","&nbsp; &nbsp;",$msg);
	return $msg;
}

function check_write($file)
{
	if(is_writeable($file))
	{
		return "<span style='color:darkgreen;font:bold 15px Tahoma,Arial;'>√</span>";
	}
	else
	{
		return "<span style='color:red;font:bold 15px Tahoma,Arial;'>×</span>";
	}
	return true;
}

function error($title,$return_act="?",$button_name="返回上一步")
{
	 
	echo_start();
	echo_msg("<br /><span style='font-size:17px;'>".$title."</span><br />");
	echo_msg(button($return_act,$button_name)."<br />");
	echo_msg("<br /><br /><br />");
	echo_end();
	 
}

function getip()
{
	if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown'))
	{
		$onlineip = getenv('HTTP_CLIENT_IP');
	}
	elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown'))
	{
		$onlineip = getenv('HTTP_X_FORWARDED_FOR');
	}
	elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown'))
	{
		$onlineip = getenv('REMOTE_ADDR');
	}
	elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown'))
	{
		$onlineip = $_SERVER['REMOTE_ADDR'];
	}
	return $onlineip;
}

function checkfdperm($path, $isfile=0) {
	if($isfile) {
		$file = $path;
		$mod = 'a';
	} else {
		$file = $path.'./install_tmptest.data';
		$mod = 'w';
	}
	if(!@$fp = fopen($file, $mod)) {
		return false;
	}
	if(!$isfile) {
		//是否可以删除
		fwrite($fp, ' ');
		fclose($fp);
		if(!@unlink($file)) {
			return false;
		}
		//检测是否可以创建子目录
		if(is_dir($path.'./install_tmpdir')) {
			if(!@rmdir($path.'./install_tmpdir')) {
				return false;
			}
		}
		if(!@mkdir($path.'./install_tmpdir')) {
			return false;
		}
		//是否可以删除
		if(!@rmdir($path.'./install_tmpdir')) {
			return false;
		}
	} else {
		fclose($fp);
	}
	return true;
}

//产生form防伪码
function formhash() {
	global $_SGLOBAL, $_SCONFIG;

	$mtime = explode(' ', microtime());
	$_SGLOBAL['timestamp'] = $mtime[1];

	if(empty($_SGLOBAL['formhash'])) {
		$hashadd = defined('IN_ADMINCP') ? 'Only For XINK8CMS AdminCP' : '';
		$_SGLOBAL['formhash'] = substr(md5(substr($_SGLOBAL['timestamp'], 0, -7).'|'.$_SGLOBAL['supe_uid'].'|'.md5($_SCONFIG['sitekey']).'|'.$hashadd), 8, 8);
	}

	return $_SGLOBAL['formhash'];
}

function getgpc($k, $var='G') {
	switch($var) {
		case 'G': $var = &$_GET; break;
		case 'P': $var = &$_POST; break;
		case 'C': $var = &$_COOKIE; break;
		case 'R': $var = &$_REQUEST; break;
	}
	return isset($var[$k]) ? $var[$k] : '';
}



?>