-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 08 月 17 日 10:26
-- 服务器版本: 5.0.90
-- PHP 版本: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `uztest`
--

-- --------------------------------------------------------

--
-- 表的结构 `art_visit_history`
--

CREATE TABLE IF NOT EXISTS `art_visit_history` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nick` varchar(60) NOT NULL,
  `art_id` int(10) unsigned NOT NULL,
  `visit_time` datetime NOT NULL,
  `ips` varchar(15) default NULL,
  PRIMARY KEY  (`id`),
  KEY `nick` (`nick`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `art_visit_history`
--


-- --------------------------------------------------------

--
-- 表的结构 `df_gg`
--

CREATE TABLE IF NOT EXISTS `df_gg` (
  `gg_id` int(11) NOT NULL auto_increment,
  `gg_type` int(10) NOT NULL default '0',
  `gg_url` varchar(255) default NULL,
  `gg_pic` varchar(255) default NULL,
  `gg_title` varchar(255) default NULL,
  `sort` int(11) NOT NULL default '0',
  `up_time` datetime default NULL,
  PRIMARY KEY  (`gg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `df_gg`
--

INSERT INTO `df_gg` (`gg_id`, `gg_type`, `gg_url`, `gg_pic`, `gg_title`, `sort`, `up_time`) VALUES
(7, 0, 'http://detail.tmall.com/item.htm?id=18712109769', 'http://img03.taobaocdn.com/imgextra/i3/725164861/T2xVgOXjlaXXXXXXXX_!!725164861.jpg', '推车', 11, '2013-08-17 11:18:00'),
(8, 0, 'http://detail.tmall.com/item.htm?id=19123598268', 'http://img01.taobaocdn.com/imgextra/i1/725164861/T2fnoKXnBaXXXXXXXX_!!725164861.jpg', '床铃', 8, '2013-08-17 11:40:34'),
(6, 0, 'http://detail.tmall.com/item.htm?id=20877419200', 'http://img03.taobaocdn.com/imgextra/i3/725164861/T27NwZXh8XXXXXXXXX_!!725164861.jpg', 'P8', 12, '2013-08-17 11:11:34');

-- --------------------------------------------------------

--
-- 表的结构 `df_link`
--

CREATE TABLE IF NOT EXISTS `df_link` (
  `link_id` int(10) NOT NULL auto_increment,
  `url` varchar(255) default NULL,
  `title` varchar(255) default NULL,
  `img_path` varchar(255) default NULL,
  `up_time` datetime default NULL,
  `sort` int(10) NOT NULL default '0',
  PRIMARY KEY  (`link_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `df_link`
--

INSERT INTO `df_link` (`link_id`, `url`, `title`, `img_path`, `up_time`, `sort`) VALUES
(6, 'http://webwle.taobao.com', '测试1', 'http://img02.taobaocdn.com/imgextra/i2/725164861/T2iQZVXXNXXXXXXXXX_!!725164861.jpg', '2013-08-12 14:14:45', 10);

-- --------------------------------------------------------

--
-- 表的结构 `df_shop`
--

CREATE TABLE IF NOT EXISTS `df_shop` (
  `shop_id` int(11) NOT NULL auto_increment,
  `url` varchar(255) default NULL,
  `title` varchar(255) default NULL,
  `nick` varchar(80) default NULL,
  `img_path` varchar(255) default NULL,
  `memo` text,
  `up_time` datetime default NULL,
  `sort` int(11) NOT NULL default '0',
  `class_id` int(11) NOT NULL default '0',
  `commission` double(10,2) NOT NULL default '0.00',
  PRIMARY KEY  (`shop_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `df_shop`
--

INSERT INTO `df_shop` (`shop_id`, `url`, `title`, `nick`, `img_path`, `memo`, `up_time`, `sort`, `class_id`, `commission`) VALUES
(1, 'http://item.taobao.com/item.htm?id=18046297160', 'QQ账号', '毛菇小象', 'http://img02.taobaocdn.com/imgextra/i2/725164861/T2iQZVXXNXXXXXXXXX_!!725164861.jpg', 'adsada', '2013-08-12 18:16:27', 10, 1, 9.90),
(3, 'aasdff', '淘宝返现图解教程', 'candy86911949818', 'http://img02.taobaocdn.com/imgextra/i2/725164861/T2iQZVXXNXXXXXXXXX_!!725164861.jpg', 'adffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', '2013-08-13 09:26:03', 100, 0, 4.90);

-- --------------------------------------------------------

--
-- 表的结构 `item_baoming`
--

CREATE TABLE IF NOT EXISTS `item_baoming` (
  `id` int(11) NOT NULL auto_increment,
  `num_iid` int(11) NOT NULL default '0',
  `detail_url` varchar(255) default NULL,
  `nick` varchar(50) default NULL,
  `title` varchar(255) default NULL,
  `pic_url` varchar(255) default NULL,
  `price` double(10,2) NOT NULL default '0.00',
  `price_xian` double(10,2) NOT NULL default '0.00',
  `beizhu` text,
  `up_time` datetime default NULL,
  `class_id` int(11) default '0',
  `status` int(2) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `item_baoming`
--


-- --------------------------------------------------------

--
-- 表的结构 `vg_ad`
--

CREATE TABLE IF NOT EXISTS `vg_ad` (
  `ad_id` smallint(6) unsigned NOT NULL auto_increment,
  `memo` varchar(100) default NULL,
  `type` tinyint(4) unsigned default '0',
  `config` text,
  PRIMARY KEY  (`ad_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `vg_ad`
--


-- --------------------------------------------------------

--
-- 表的结构 `vg_article`
--

CREATE TABLE IF NOT EXISTS `vg_article` (
  `art_id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(150) default NULL,
  `author` varchar(20) default NULL,
  `main_img` varchar(150) default NULL,
  `text` text,
  `jump_url` varchar(200) default NULL,
  `create_time` datetime default NULL,
  `sort` int(10) NOT NULL default '0',
  `is_top` tinyint(4) default NULL,
  `class_id` smallint(6) NOT NULL,
  `artpr_id` smallint(6) NOT NULL,
  PRIMARY KEY  (`art_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `vg_article`
--

INSERT INTO `vg_article` (`art_id`, `title`, `author`, `main_img`, `text`, `jump_url`, `create_time`, `sort`, `is_top`, `class_id`, `artpr_id`) VALUES
(1, '如何提高小孩的记忆力？', '为乐', 'http://img04.taobaocdn.com/imgextra/i4/725164861/T2ET9vXbNdXXXXXXXX_!!725164861.jpg', '<p><span style="color: rgb(51, 51, 51); font-family: arial, 宋体, sans-serif; line-height: 24px; text-align: justify">注意力集中。记忆时只有聚精会神，专心致志，排除杂念和外界干挠，大脑皮层就会留下深刻的记忆痕迹而不容易遗忘。如果精神涣散，一心二用，就会大大降低记忆效率</span></p>', '', '2013-08-16 16:42:31', 0, 0, 0, 12);

-- --------------------------------------------------------

--
-- 表的结构 `vg_art_property`
--

CREATE TABLE IF NOT EXISTS `vg_art_property` (
  `artpr_id` smallint(6) unsigned NOT NULL auto_increment,
  `name` varchar(20) default NULL,
  PRIMARY KEY  (`artpr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `vg_art_property`
--

INSERT INTO `vg_art_property` (`artpr_id`, `name`) VALUES
(8, '家庭教育'),
(9, '婴儿早教'),
(10, '才艺培养'),
(11, '幼儿心理'),
(12, '智力开发'),
(13, '吃块好长');

-- --------------------------------------------------------

--
-- 表的结构 `vg_class`
--

CREATE TABLE IF NOT EXISTS `vg_class` (
  `class_id` smallint(6) unsigned NOT NULL auto_increment,
  `parent_class_id` smallint(5) unsigned default '0',
  `name` varchar(100) default NULL,
  `img` varchar(300) default NULL,
  `memo` varchar(100) default NULL,
  `order` int(10) unsigned default '0',
  `click_num` bigint(20) unsigned default '0',
  PRIMARY KEY  (`class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=132 ;

--
-- 转存表中的数据 `vg_class`
--

INSERT INTO `vg_class` (`class_id`, `parent_class_id`, `name`, `img`, `memo`, `order`, `click_num`) VALUES
(54, 0, '玩好', '', '', 0, 0),
(58, 0, '用好', '', '', 0, 0),
(56, 0, '吃好', '', '', 0, 25),
(59, 0, '穿好', '', '', 0, 0),
(60, 0, '妈咪好', '', '', 0, 0),
(61, 54, '积木', '', '', 0, 0),
(62, 54, '童车', '', '', 0, 0),
(90, 58, '护臀', '', '', 0, 0),
(91, 58, '奶瓶', '', '', 0, 0),
(92, 58, '食饭兜', '', '', 0, 0),
(93, 58, '沐浴', '', '', 0, 0),
(94, 58, '睡袋', '', '', 0, 0),
(95, 58, '童床', '', '', 0, 0),
(96, 58, '推车', '', '', 0, 0),
(97, 58, '毛毯', '', '', 0, 0),
(98, 58, '座椅', '', '', 0, 0),
(99, 58, '奶嘴', '', '', 0, 0),
(100, 56, '奶粉', '', '', 0, 37),
(77, 54, '健身架', '', '', 0, 0),
(101, 56, '羊奶粉', '', '', 0, 4),
(78, 54, '摇铃', '', '', 0, 0),
(79, 54, '早教', '', '', 0, 0),
(80, 54, '爬行垫', '', '', 0, 0),
(81, 54, '音乐', '', '', 0, 0),
(82, 54, '拼图', '', '', 0, 0),
(83, 54, '过家家', '', '', 0, 0),
(89, 58, '纸尿裤', '', '', 0, 0),
(102, 56, '米粉', '', '', 0, 0),
(86, 54, '儿童包', '', '', 0, 0),
(87, 54, '学习绘画', '', '', 0, 0),
(88, 54, '玩具', '', '', 0, 2),
(103, 56, '面条', '', '', 0, 0),
(104, 56, '磨牙', '', '', 0, 0),
(105, 56, '鱼肝', '', '', 0, 0),
(106, 56, '油钙', '', '', 0, 0),
(107, 56, '铁锌', '', '', 0, 0),
(108, 56, '益生菌', '', '', 0, 0),
(109, 59, '连衣裙', '', '', 0, 0),
(110, 59, '儿童泳衣', '', '', 0, 0),
(111, 59, '外套', '', '', 0, 0),
(112, 59, '套装', '', '', 0, 0),
(113, 59, '马甲', '', '', 0, 0),
(114, 59, '衬衫', '', '', 0, 0),
(115, 59, '裤', '', '', 0, 0),
(116, 59, '童鞋', '', '', 0, 0),
(117, 59, '配饰', '', '', 0, 0),
(118, 59, '亲子装', '', '', 0, 0),
(119, 59, '新生儿礼盒', '', '', 0, 0),
(120, 60, '连衣裙', '', '', 0, 1),
(121, 60, '孕裤', '', '', 0, 0),
(122, 60, '卫衣', '', '', 0, 0),
(123, 60, '外套', '', '', 0, 0),
(124, 60, '叶酸', '', '', 0, 0),
(125, 60, '防辐射', '', '', 0, 0),
(126, 60, '哺乳服', '', '', 0, 0),
(127, 60, '文胸', '', '', 0, 0),
(128, 60, '妈咪包', '', '', 0, 0),
(129, 60, '防溢乳垫', '', '', 0, 0),
(130, 60, '洗护', '', '', 0, 0),
(131, 60, '束腹带', '', '', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `vg_member`
--

CREATE TABLE IF NOT EXISTS `vg_member` (
  `member_id` int(11) unsigned NOT NULL auto_increment,
  `realname` varchar(20) default NULL,
  `mobile_tel` varchar(15) default NULL,
  `wangwang` varchar(10) default NULL,
  `qq` varchar(15) default NULL,
  `email` varchar(50) default NULL,
  `uz_nick` varchar(10) default NULL,
  `create_time` datetime default NULL,
  `type` tinyint(4) unsigned default '0',
  PRIMARY KEY  (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `vg_member`
--


-- --------------------------------------------------------

--
-- 表的结构 `vg_oper_config`
--

CREATE TABLE IF NOT EXISTS `vg_oper_config` (
  `key` varchar(50) NOT NULL,
  `value` varchar(1000) default NULL,
  `type` varchar(10) default '0' COMMENT '0=text,1=integer,2=textarea',
  `memo` varchar(100) default NULL,
  PRIMARY KEY  (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `vg_oper_config`
--


-- --------------------------------------------------------

--
-- 表的结构 `vg_product`
--

CREATE TABLE IF NOT EXISTS `vg_product` (
  `prod_id` int(11) unsigned NOT NULL auto_increment,
  `class_id` smallint(5) unsigned default '0',
  `item_id` bigint(20) unsigned default '0',
  `title` varchar(150) default NULL,
  `feature` varchar(300) NOT NULL,
  `memo` text,
  `price` int(10) unsigned default NULL,
  `main_img` varchar(150) default NULL,
  `click_url` varchar(300) default NULL,
  `wangwang` varchar(40) default NULL,
  `order` int(10) unsigned default '0',
  `click_num` int(10) unsigned default '0',
  `like_num` int(10) unsigned default '0',
  `status` tinyint(3) unsigned default '0',
  PRIMARY KEY  (`prod_id`),
  UNIQUE KEY `item_id` (`item_id`),
  KEY `status` (`status`),
  KEY `class_id` (`class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `vg_product`
--

INSERT INTO `vg_product` (`prod_id`, `class_id`, `item_id`, `title`, `feature`, `memo`, `price`, `main_img`, `click_url`, `wangwang`, `order`, `click_num`, `like_num`, `status`) VALUES
(1, 100, 17427610335, '行货绝无污染原料Karicare可瑞康原装原罐进口金装奶粉3段奶粉', '', '<p>&nbsp;<img src=http://img03.taobaocdn.com/bao/uploaded/i3/11252038011108352/T1qzF5XvVaXXXXXXXX_!!0-item_pic.jpg alt="" /></p>', 190, 'http://img03.taobaocdn.com/bao/uploaded/i3/11252038011108352/T1qzF5XvVaXXXXXXXX_!!0-item_pic.jpg', 'http://detail.tmall.com/item.htm?id=17427610335', '奕朵母婴专营店', 10, 0, 0, 1),
(3, 109, 18402194719, '大童装2013新款夏装韩版 儿童女童裙子吊带雪纺碎花连衣裙背心裙', '', '<p>é&#235;</p>', 129, 'http://img02.taobaocdn.com/bao/uploaded/i2/10539025246966093/T1UEhGFjRdXXXXXXXX_!!0-item_pic.jpg', 'http://detail.tmall.com/item.htm?id=18402194719', '坤成母婴专营店', 10, 0, 0, 1),
(2, 100, 19081379787, '大促Nutrilon诺优婴儿配方奶粉1段  荷兰原装进口 非恒天然奶源', '', '<p>&nbsp;<img src=http://img01.taobaocdn.com/bao/uploaded/i1/14404026358281425/T17At_FidgXXXXXXXX_!!0-item_pic.jpg alt="" /></p>', 220, 'http://img01.taobaocdn.com/bao/uploaded/i1/14404026358281425/T17At_FidgXXXXXXXX_!!0-item_pic.jpg', 'http://detail.tmall.com/item.htm?id=19081379787', 'nutrilon官方旗舰店', 0, 0, 0, 1),
(4, 109, 16265868061, '特价2013夏装新款条纹女童童装宝宝儿童衣服无袖连衣裙子qz-0081', '', '<p>&nbsp;<span style="color: rgb(0, 0, 0); font-family: tahoma, arial, 宋体; font-weight: bold; line-height: 22px; text-indent: 5px; white-space: nowrap">裙子</span></p>', 30, 'http://img03.taobaocdn.com/bao/uploaded/i3/T1uDC1XjRvXXa1VjE3_050529.jpg', 'http://item.taobao.com/item.htm?id=16265868061', '海边的小贝壳', 10, 0, 0, 1),
(5, 100, 14078756690, '御宝金装幼儿配方羊奶粉小听180g克试用装3段', '', '<p>&nbsp;安全放心</p>', 68, 'http://img03.taobaocdn.com/bao/uploaded/i3/17703025871808588/T1KJX3FkBdXXXXXXXX_!!0-item_pic.jpg', 'http://detail.tmall.com/item.htm?id=14078756690', '御宝旗舰店', 10, 0, 0, 1),
(6, 100, 23474956841, 'Nestle/雀巢超级能恩德国进口3/三段 800g*2 送150券', '', '<p>雀巢，响响的一个品牌</p>', 596, 'http://img02.taobaocdn.com/bao/uploaded/i2/12566038359820011/T1oOiaFaVXXXXXXXXX_!!0-item_pic.jpg', 'http://detail.tmall.com/item.htm?id=23474956841', '雀巢母婴官方旗舰店', 12, 0, 0, 1),
(7, 101, 17652115597, '美可高特羊奶粉3段幼儿365g', '', '<p>&nbsp;美可高特羊奶粉质量保证，安全放心哦</p>', 129, 'http://img01.taobaocdn.com/bao/uploaded/i1/17358019559588857/T1gUo7XXpiXXXXXXXX_!!0-item_pic.jpg', 'http://detail.tmall.com/item.htm?id=17652115597', '美达鑫母婴专营店', 10, 0, 0, 1),
(8, 101, 12740671047, '纽贝斯特能素800克3段羊奶粉', '', '<div>羊奶有4大优势：</div><div>1.营养全面</div><div>&nbsp;羊奶的营养价值高于牛奶，羊奶中含有200多种营养物质和生物活性因子。其中含有多种乳酸、20种氨基酸和维生素，富含免疫球蛋白。</div><div>2.少过敏</div><div>经科学发现羊奶中β-乳求蛋白含量比牛奶低，且其氨基酸的排列顺序和牛奶不一样，较牛奶更容易被吸收。因此山羊奶可以解除大部分牛奶引起的过敏症。几乎所有人群都可以接受羊奶。</div><div>&nbsp;</div><div>3.易吸收</div><div>羊奶含有更多的α-乳清蛋白，其蛋白质在胃中形成细软，更易被吸收。且羊奶中的脂肪球只有牛奶的三分之一，又有更多不饱和脂肪酸，更易被小肠吸收。</div><div>&nbsp;</div><div>4.特有的健康因子</div><p><span style="line-height: 1.5">羊奶中含有和人乳相同的上皮细胞生长因子，有益于上皮细胞生长，增强人体抗病能力。</span>&nbsp;</p>', 318, 'http://img04.taobaocdn.com/bao/uploaded/i4/12772025637604863/T1hmdWFhXXXXXXXXXX_!!0-item_pic.jpg', 'http://detail.tmall.com/item.htm?id=12740671047', '矿娃母婴专营店', 11, 0, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `vg_tag`
--

CREATE TABLE IF NOT EXISTS `vg_tag` (
  `tag_id` smallint(6) unsigned NOT NULL auto_increment,
  `name` varchar(100) default NULL,
  `img` varchar(300) default NULL,
  `memo` varchar(100) default NULL,
  `class_id` smallint(6) unsigned NOT NULL,
  `tagpr_id` smallint(6) unsigned NOT NULL,
  `order` smallint(5) unsigned default '0',
  `click_num` bigint(20) unsigned default '0',
  PRIMARY KEY  (`tag_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `vg_tag`
--

INSERT INTO `vg_tag` (`tag_id`, `name`, `img`, `memo`, `class_id`, `tagpr_id`, `order`, `click_num`) VALUES
(1, '奶粉', NULL, NULL, 0, 0, 0, 0),
(2, '过家家', NULL, NULL, 0, 0, 11, 0),
(3, '育儿经', '', '', 0, 0, 0, 0),
(4, '纸尿裤', '', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `vg_tag_art_list`
--

CREATE TABLE IF NOT EXISTS `vg_tag_art_list` (
  `art_id` int(11) unsigned NOT NULL,
  `tag_id` smallint(6) unsigned NOT NULL,
  KEY `tag_id` (`tag_id`),
  KEY `art_id` (`art_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `vg_tag_art_list`
--


-- --------------------------------------------------------

--
-- 表的结构 `vg_tag_prod_list`
--

CREATE TABLE IF NOT EXISTS `vg_tag_prod_list` (
  `tag_id` smallint(6) unsigned NOT NULL,
  `prod_id` int(11) unsigned NOT NULL,
  KEY `tag_id` (`tag_id`),
  KEY `prod_id` (`prod_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

--
-- 转存表中的数据 `vg_tag_prod_list`
--

INSERT INTO `vg_tag_prod_list` (`tag_id`, `prod_id`) VALUES
(1, 2),
(1, 1),
(1, 3),
(1, 7),
(1, 8);

-- --------------------------------------------------------

--
-- 表的结构 `vg_tag_property`
--

CREATE TABLE IF NOT EXISTS `vg_tag_property` (
  `tagpr_id` smallint(6) unsigned NOT NULL auto_increment,
  `name` varchar(10) default NULL,
  PRIMARY KEY  (`tagpr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `vg_tag_property`
--


-- --------------------------------------------------------

--
-- 表的结构 `vg_visit_history`
--

CREATE TABLE IF NOT EXISTS `vg_visit_history` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nick` varchar(60) NOT NULL,
  `prod_id` int(10) unsigned NOT NULL,
  `visit_time` datetime NOT NULL,
  `ips` varchar(15) default NULL,
  PRIMARY KEY  (`id`),
  KEY `nick` (`nick`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `vg_visit_history`
--

INSERT INTO `vg_visit_history` (`id`, `nick`, `prod_id`, `visit_time`, `ips`) VALUES
(1, 'a***s', 267, '2013-08-01 11:26:08', '127.0.0.1'),
(2, 'a***s', 281, '2013-08-01 11:27:51', '127.0.0.1'),
(3, 'a***s', 283, '2013-08-03 17:49:18', '127.0.0.1'),
(4, 'a***s', 283, '2013-08-03 17:50:52', '127.0.0.1');
