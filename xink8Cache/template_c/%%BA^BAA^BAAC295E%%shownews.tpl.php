<?php /* Smarty version 2.6.26, created on 2012-03-31 02:33:15
         compiled from shownews.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'indent', 'shownews.tpl', 33, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta name="keywords" content=" www.xink8.com心宽咨询网站建设网络开发程序二次开发营销策划文案服务|心宽媒体管理系统|心宽文章发布系统" />
<meta name="description" content="www.xink8.com心宽咨询网站建设网络开发程序二次开发营销策划文案服务|心宽媒体管理系统|心宽文章发布系统 " />
<meta name="Author" content="www.xink8.com 铁是锅的QQ943606498"/>
<meta name="Robots" content="all"/>
 
<title> www.xink8.com心宽咨询网站建设网络开发程序二次开发营销策划文案服务|心宽媒体管理系统|心宽文章发布系统 </title>

</head>

<body>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "head.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

 <div  class="space_line"></div>


  <div  class="main">
		<div  class="b_left">
			<ul class="b_left_title">本站公告</ul>
			<ul><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "left.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></ul>
		</div>

	 

		<div  class="m_left">
			<ul class="m_left_title"><a href="catalist.php?xk_ColumnID=<?php echo $this->_tpl_vars['info']['fid']; ?>
 " target="_blank">  <?php echo $this->_tpl_vars['info']['fname']; ?>
 </a>- <?php echo $this->_tpl_vars['info']['title']; ?>
 -资讯正文</ul>
			<ul>标题：<?php echo $this->_tpl_vars['info']['title']; ?>
   
			</ul>
			<ul>  <?php echo ((is_array($_tmp=$this->_tpl_vars['info']['content'])) ? $this->_run_mod_handler('indent', true, $_tmp) : smarty_modifier_indent($_tmp)); ?>
 
 			</ul>
		</div>


	 
	 
		<div  class="b_left">
			<ul class="b_left_title">本站说明</ul>
			<ul><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "right.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></ul>
		</div>

	
 </div>
 <div  class="space_line"></div> <div  class="space_line"></div> <div  class="space_line"></div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "foot.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body> 
</html> 