
<?php   

/*
	[xink8] (C)2009-2012  
	author:心宽咨询 xink8.com   铁是锅的 QQ 943606498 email:249287090@qq.com  singkuanpai@msn.com
	@package 1.0
	Vision: 1.0  版权所有
	Date: 2009/12/28

	铁是锅的业务服务：企业咨询、文案策划、营销策划、网站建设、网络程序二次开发、心理咨询、国学教育(应用)、修心开智、英语笔译、网络秘书、风水（环境学）应用

*/

 

if ($_POST["btnLogin"]<>"")
{


require('../common.inc.php');

     $result=$db->getOneRs("select uid,username,password from {$xink8pre}members where username='".trim($_POST[UserName])."'");
 
	 if ($result)
	{
	    if ((trim($result[username])==trim($_POST[UserName])) and trim($result[password])==md5(trim($_POST[PW])))
		{
			session_start(); 
		    $_SESSION["admin"]=True;
			$_SESSION["{$xink8pre}adminName"]=trim($_POST[UserName]);
			$_SESSION["{$xink8pre}adminID"]=trim($row[admin_id]);
		    //Header("Location: main.php"); 


			echo "<script language='javascript'>";
			echo " location='main.php';";
			echo "</script>";
		}
		else
	   {
		   echo ErrWindow("密码错误！");
	   }
	}	 
	else
	{
	 
		echo ErrWindow("无法登陆！");
	}
	  
 
}

?>
<HTML>
<HEAD>
<TITLE>心宽咨询网站后台管理系统登录</TITLE>
  <meta name="author" content="铁是锅的|QQ:943606498|email:249287090@qq.com" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="keywords" content="心宽咨询网站后台管理系统登录" />
  <meta name="description" content="心宽咨询网站后台管理系统登录" />
<style type="text/css">
<!--
body, td, th {
	font-size: 12px;
	color: #000;
	color:#fff; font-family:Verdana, Geneva, sans-serif;
}
body {
	margin:0 auto;
	text-align:center;
}
.bg1 { background:url(images/login_7.jpg) no-repeat; text-align:right; padding-right:32px; color:#ccc; height:61px; line-height:61px;}
-->
</style>
</HEAD>
<BODY >
<TABLE width="1002" border=0 align="center" cellPadding=0 cellSpacing=0>
  <TBODY>
    <TR>
      <TD height=522><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
          <TBODY>
         
            <TR>
              <TD height=88><TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                  <TBODY>
                    <TR>
                      <TD width="25%"></TD>
                      <TD vAlign=top width="75%"><TABLE cellSpacing=0 background=images/bejing.jpg cellPadding=0 width="100%" border=0>
                          <TBODY>
                            <TR>
                              <TD height="38" align="right" background="images/login_4.jpg"></TD>
                            </TR>
                            <TR>
                              <TD><IMG height=38 alt="" 
                        src="images/login_5.jpg" width=575></TD>
                            </TR>
                            <TR>
                              <TD vAlign=top background=images/login_6.jpg 
                      height=95><TABLE class=baise cellSpacing=0 cellPadding=0 
                        width="100%" border=0>
                        <form  method="post" action="login.php" name="form_login">
                                    <TBODY >
                                      <TR style="padding-left: 100">
                                        <TD style="LINE-HEIGHT: 210%" width=207 colSpan=2 
                            height=22>用户名：
                                          <input name="UserName" type="text" size="15" maxlength="15" class="inputbox"></TD>
                                        <TD style="LINE-HEIGHT: 210%" vAlign=bottom 
                            height=3>&nbsp;</TD>
                                      </TR>
                                      <TR style="padding-left: 100">
                                        <TD style="LINE-HEIGHT: 210%" width=207 colSpan=2 
                            height=22>密　码：
                                          <input name="PW" type="password" size="15" maxlength="12" class="inputbox"></TD>
                                        <TD style="LINE-HEIGHT: 210%" vAlign=bottom 
                            height=3>&nbsp;</TD>
                                      </TR>
                                      <TR style="padding: 10 140">
                                       
                                        <TD style="LINE-HEIGHT: 210%" vAlign=bottom 
                            height=22><input type="submit" name="btnLogin" value="登 入" class="button"></TD>
                                      </TR>
                           </form>

                                </TABLE></TD>
                            </TR>
                      </TABLE></TD>
                    </TR>
                    <TR>
                      <TD>&nbsp;</TD>
                      <TD vAlign=top>&nbsp;</TD>
                    </TR>
                    <TR>
                      <TD>&nbsp;</TD>
                      <TD vAlign=top>&nbsp;</TD>
                    </TR>
                    <TR>
                      <TD>&nbsp;</TD>
                      <TD vAlign=top>&nbsp;</TD>
                    </TR>
                </TABLE></TD>
            </TR>
            <TR>
              <TD class="bg1">Copyright  &copy; xink8.com 2009-2012 All rights reserved. Copyright </TD>
            </TR>
          </TBODY>
        </TABLE></TD>
    </TR>
  </TBODY>
</TABLE>
</BODY>
</HTML>
