<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="心宽咨询网站建设网络开发程序二次开发营销策划文案服务|心宽媒体管理系统|心宽文章发布系统 " />
<meta name="description" content="心宽咨询网站建设网络开发程序二次开发营销策划文案服务|心宽媒体管理系统|心宽文章发布系统 " />
<meta name="Author" content="www.xink8.com 铁是锅的QQ943606498"/>
<meta name="Robots" content="all"/>
 
<title>www.xink8.com心宽咨询网站建设网络开发程序二次开发营销策划文案服务|心宽媒体管理系统|心宽文章发布系统</title>
 </head>

<!--{ include file="head.tpl" }-->

<div  class="space_line"></div>


  <div  class="main">
		<div  class="b_left">
			<ul class="b_left_title">本站公告</ul>
			<ul><!--{ include file="left.tpl" }--></ul>
		</div>

		 

		<div  class="m_left">
			<ul class="m_left_title">资讯列表</ul>
			<ul>		
			 <!--{ foreach item=mloop from=$middle }--> 		 
             <a href="shownews.php?id=<!--{ $mloop.id }--> " target="_blank"> <!--{ $mloop.title }--> </a> <br />
			 <!--{ /foreach }--> 
			</ul>
		</div>


	  
		<div  class="b_left">
			<ul class="b_left_title">本站说明</ul>
			<ul><!--{ include file="right.tpl" }--></ul>
		</div>

	
 </div>
 <div  class="space_line"></div> <div  class="space_line"></div> <div  class="space_line"></div>

<!--{ include file="foot.tpl" }-->

  
 </body>
</html>