<?php
 

$lang = array(

	'message_title' => '提示信息',
	'error_message' => '错误信息',
	'message_return' => '返回上一步',
	'return' => '返回',
	'install_wizard' => '安装向导',
	'config_nonexistence' => '配置文件不存在',
	'short_open_tag_invalid' => '对不起，请将 php.ini 中的 short_open_tag 设置为 On，否则无法继续安装。',
	'redirect' => '浏览器会自动跳转页面，无需人工干预。<br>除非当您的浏览器没有自动跳转时，请点击这里',
	'short_open_tag_invalid' => '对不起，请将 php.ini 中的 short_open_tag 设置为 On，否则无法继续安装。',

	'all_install' => '您已经成功安装过程序,请先删除install目录 install.lock 然后安装',

	'XINK8CMS_install' =>'已经安装过XINK8CMS 如果您想重新安装XINK8CMS，请删除 data/install.lock 文件，再次运行安装文件',
	
	'database_errno_2003' => '无法连接数据库，请检查数据库是否启动，数据库服务器地址是否正确',
	'database_errno_1044' => '无法创建新的数据库，请检查数据库名称填写是否正确',
	'database_errno_1045' => '无法连接数据库，请检查数据库用户名或者密码是否正确',
	'database_errno_1064' => 'SQL 语法错误',
	'database_create' => '数据库创建成功 ',

	'dbpriv_createtable' => '没有CREATE TABLE权限，无法继续安装',
	'dbpriv_insert' => '没有INSERT权限，无法继续安装',
	'dbpriv_select' => '没有SELECT权限，无法继续安装',
	'dbpriv_update' => '没有UPDATE权限，无法继续安装',
	'dbpriv_delete' => '没有DELETE权限，无法继续安装',
	'dbpriv_droptable' => '没有DROP TABLE权限，无法安装',

	'db_not_null' => '数据库中已经安装过 XINK8CMS, 继续安装会清空原有数据。',
	'db_drop_table_confirm' => '继续安装会清空全部原有数据，您确定要继续吗?',

	'writeable' => '可写',
	'unwriteable' => '不可写',
	'old_step' => '上一步',
	'new_step' => '下一步',

	'database_errno_2003' => '无法连接数据库，请检查数据库是否启动，数据库服务器地址是否正确',
	'database_errno_1044' => '无法创建新的数据库，请检查数据库名称填写是否正确',
	'database_errno_1045' => '无法连接数据库，请检查数据库用户名或者密码是否正确',

	'step_0' => '填写安装目录',
	'step_1' => '安装环境检测',
	'step_2' => '填写数据库相关信息',
	'step_3' => '表单检查',
	'step_4' => '初始化数据',
	'step_5' => '管理员帐号填写',
	'step_6' => '管理员帐号创建成功',
	'step_7' => '安装成功',
	'init_data' => '初始化数据完成',
	'step1_title' => '安装',
	'step1_desc' => 'XINK8CMS 文件目录权限检查',
	'step1_file' => '目录文件',
	'step1_need_status' => '所需状态',
	'step1_status' => '当前状态',
	'step1_unwriteable' => '请将以上目录权限全部设置为 777，然后进行下一步安装。',

	'step2_title' => '填写相关配置',
	'step2_desc' => 'XINK8CMS 数据库配置',
	'step2_dbhost' => '数据库服务器',
	'step2_dbuser' => '数据库用户名',
	'step2_dbpw' => '数据库密码',
	'step2_dbname' => '数据库名',
	'check_password' => '重复密码',
	'password_error' => '数据库配置信息错误',
	'create_databaase_error' => '数据库创建失败',

	'step3_error_dbname_empty' => '数据库名为空',
	'step3_title' => '填写相关配置',
	'step3_founder' => '创始人用户名',
	'step3_desc' => 'XINK8CMS 创始人密码',
	'step3_comment' => '<li>创始人用户名为系统内置，不可修改。</li><li>请牢记 XINK8CMS 创始人密码，凭该密码登陆 XINK8CMS。</li>',
	'step3_username' => '管理员帐号',
	'step3_password' => '管理员密码',
	'admin_url' => '管理员访问网址',

	'XINK8CMS_admin' => 'XINK8CMS管理员信息',

	'step4_error_password_invalid' => '两次输入密码不一致，请返回。',
	'step4_error_config_unwriteable1' => 'XINK8CMS 的配置文件 ',
	'step4_error_config_unwriteable2' => ' 不可写，请返回设置为可写状态。',
	'step4_title' => '最后一步',
	'step4_desc' => '创建数据库失败',
	'create_table' => '建立数据表',
	'create_db_tables_ok' => '建立数据表完成',



	'setting_index' => '使用默认导航页为首页',
	'install_dir' => '安装目录',
	'XINK8CMS_dir' => 'XINK8CMS的访问网址',




	'i_agree' => '我已仔细阅读，并同意上述条款中的所有内容',
	'supportted' => '支持',
	'unsupportted' => '不支持',
	'max_size' => '支持/最大尺寸',
	'project' => '项目',
	'XINK8CMS_required' => '程序所需配置',
	'XINK8CMS_best' => '程序安装最佳',
	'curr_server' => '当前服务器',
	'env_check' => '环境检查',
	'os' => '操作系统',
	'unlimit' => '不限制',
	'version' => '版本',
	'attach_upload' => '附件上传',
	'allow' => '允许 ',
	'disk_free' => '磁盘空间',
	'priv_check' => '目录、文件权限检查',
	'func_depend' => '函数依赖性检查',
	'func_name' => '函数名称',
	'check_result' => '检查结果',
	'admin_email' => '管理员 Email',
	'suggestion' => '建议',
	'advice_mysql' => '请检查 mysql 模块是否正确加载',
	'advice_fopen' => '该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_file_get_contents' => '该函数需要 php.ini 中 allow_url_fopen 选项开启。请联系空间商，确定开启了此项功能',
	'advice_xml' => '该函数需要 PHP 支持 XML。请联系空间商，确定开启了此项功能',
	'none' => '无',
	'save_setup_info' => '以下为XINK8CMS安装信息,请妥善保存,为了您的数据安全请尽快删除./install目录',
	'copy' => '复制',
	'go_home' =>'完成',
	'setup' => '安装'
);
?>