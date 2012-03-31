DROP TABLE IF EXISTS `xk_xink8news_sort`;
CREATE TABLE IF NOT EXISTS `xk_xink8news_sort` (
  `fid` mediumint(7) unsigned NOT NULL auto_increment,
  `fup` mediumint(7) unsigned NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  `class` smallint(4) NOT NULL default '0', 
  `type` tinyint(1) NOT NULL default '0', 
  `listorder` tinyint(2) NOT NULL default '0',  
  `description` text NOT NULL, 
  `metakeywords` varchar(255) NOT NULL default '',
  `metadescription` varchar(255) NOT NULL default '',  
  `forbidshow` tinyint(1) NOT NULL default '0', 
  `index_show` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf-8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `xk_xink8news_article`;
CREATE TABLE IF NOT EXISTS `xk_xink8news_article` (
  `id` mediumint(7) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL default '',
  `fid` mediumint(7) NOT NULL default '0',
  `fname` varchar(50) NOT NULL default '',
  `hits` mediumint(7) NOT NULL default '0',
  `comments` mediumint(7) NOT NULL default '0',
  `content` text NOT NULL,
  `posttime` int(10) NOT NULL default '0', 
  `uid` mediumint(7) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `titlecolor` varchar(15) NOT NULL default '',
  `keywords` varchar(100) NOT NULL default '',
  `isaudit` tinyint(1) NOT NULL default '1',
  `isrecommend` tinyint(1) NOT NULL default '0',
  `istop` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `fid` (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf-8 AUTO_INCREMENT=1 ;


 
DROP TABLE IF EXISTS `xk_members`;
CREATE TABLE IF NOT EXISTS `xk_members` (
  `uid` mediumint(7) unsigned NOT NULL auto_increment,
  `username` varchar(30) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `powerid` smallint(4) NOT NULL default '0',
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf-8 AUTO_INCREMENT=1 ;

 
DROP TABLE IF EXISTS `xk_sysconfig`;
CREATE TABLE IF NOT EXISTS `xk_sysconfig` (
  `xkc_key` varchar(50) NOT NULL default '',
  `xkc_value` text NOT NULL,
  `xkc_descrip` text NOT NULL,
  PRIMARY KEY  (`xkc_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf-8;
