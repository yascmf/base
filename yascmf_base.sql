/*
 Navicat Premium Data Transfer

 Source Server         : homestead
 Source Server Type    : MySQL
 Source Server Version : 50716
 Source Host           : 127.0.0.1
 Source Database       : yascmf_base

 Target Server Type    : MySQL
 Target Server Version : 50716
 File Encoding         : utf-8

 Date: 12/28/2016 17:02:15 PM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `yascmf_articles`
-- ----------------------------
DROP TABLE IF EXISTS `yascmf_articles`;
CREATE TABLE `yascmf_articles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '标题',
  `flag` varchar(50) CHARACTER SET utf8 DEFAULT '' COMMENT '推荐位',
  `thumb` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '网址缩略名，文章、单页与碎片模型有缩略名',
  `cid` int(10) unsigned DEFAULT '0' COMMENT '分类id：文章分类id不为0，单页与碎片分类id默认为0',
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '内容摘要',
  `content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '文章正文',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `content_slug_unique` (`slug`),
  KEY `title` (`title`),
  KEY `flag` (`flag`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `yascmf_articles`
-- ----------------------------
BEGIN;
INSERT INTO `yascmf_articles` VALUES ('1', '你好，世界！', '', '', 'hello_world', '1', '你好，世界！\r\n\r\n芽丝CMF，欢迎您的使用！', '你好，世界！\r\n\r\n芽丝轻博客，基于 [`YASCMF`](http://www.yascmf.com) 构建，欢迎您的使用！', '2015-01-23 15:54:54', '2016-12-28 14:27:11'), ('2', '诗歌三首', '', '', 'poetry', '1', '以下摘录均为古诗歌，仅供轻博客演示使用。', '> 以下摘录均为古诗歌，仅供轻博客演示使用。\r\n\r\n\r\n**菩提偈（其三）**\r\n\r\n*[唐]慧能*\r\n\r\n菩提本无树，\r\n明镜亦非台。\r\n本来无一物，\r\n何处惹尘埃。\r\n\r\n**离思**\r\n\r\n*[唐]元稹*\r\n\r\n曾经沧海难为水，\r\n除却巫山不是云。\r\n取次花丛懒回顾，\r\n半缘修道半缘君。\r\n\r\n**国风·周南·关雎**\r\n\r\n*[周]无名氏*\r\n\r\n关关雎鸠，在河之洲。\r\n窈窕淑女，君子好逑。\r\n参差荇菜，左右流之。\r\n窈窕淑女，寤寐求之。\r\n求之不得，寤寐思服。\r\n悠哉悠哉，辗转反侧。\r\n参差荇菜，左右采之。\r\n窈窕淑女，琴瑟友之。\r\n参差荇菜，左右芼之。\r\n窈窕淑女，钟鼓乐之。\r\n', '2016-12-28 14:26:04', '2016-12-28 14:26:04'), ('3', '使用mac一个月之后感想', '', '', 'using_mac', '1', '使用新版 `macbook pro` 已一月有余，说说使用感想。', '>	本文原载于[豆芽丝博客](http://douyasi.com/mac/using_mac.html \"豆芽丝博客\")，在此仅供演示使用。\r\n\r\n使用新版 `macbook pro` 已一月有余，说说使用感想。\r\n\r\n1. 新版，带 `bar`，实用性并不是很足，我一般就是调整亮度和声音以及使用 `esc` 按键时用到。新款性价比不高，如果经济条件不允许，建议继续买旧版。\r\n\r\n2. 配置php相关运行环境折腾了不少时间，安装 `nginx` 和 `mysql` 建议使用 `homebrew` 套件，强烈建议开发还是使用 `homestead` 环境，可以节省不少时间。毕竟你的源码最终还是得运行在 `linux` 环境下而不是 `mac`。\r\n\r\n3. mac系统下，可以接触和使用到不少优秀软件，这些都是 `Windows` 系统下没有的，而且由于苹果系统的封闭性，极少有恶意、广告漫天飞的软件，再也不用担心 `BAT` “全家桶”了。\r\n\r\n4. 作为码农，使用 `mac` 不是为了装逼，而是为了提高生产力，更好更专注地学习与使用新技术。想想层出不穷的前后端各种工具，类 `unix` 系统的 `iOS` 有着天然的优势。\r\n\r\n5. mac系统优秀，设计前瞻：高清视网膜屏幕，让你不再留恋 `windows` 下渣画质；资源占用少、节电待机续航时间长，快速休眠与恢复等等。\r\n\r\n附带，目前已安装的一些软件。\r\n\r\n```\r\nzsh\r\nXcode\r\nSublime\r\nChrome\r\n坚果云\r\nPostman\r\nCharles\r\niTerm\r\nHomebrew\r\nVagrant\r\nVirtualBox\r\nBear\r\nXMid\r\nAfred\r\nShadowsocksX\r\n......\r\n```', '2016-12-28 14:34:17', '2016-12-28 14:34:17'), ('4', 'editor.md for Laravel', '', '', 'laravel_editor_md', '1', '`editor.md` 是一款高度可定制化的 `markdown` 编辑器，官方网站：https://pandao.github.io/editor.md/ 。', '> 本文来自 [laravel-editor-md](https://github.com/douyasi/laravel-editor-md) readme文件，仅供演示使用。\r\n\r\n>  `editor.md` 是一款高度可定制化的 `markdown` 编辑器，官方网站：https://pandao.github.io/editor.md/ 。\r\n\r\n## 兼容版本\r\n\r\n本扩展包经过测试，适配 `Laravel 5.1` 以上稳定版本（`5.0` 版本理论上也是可行的，但未经测试）。\r\n\r\n>   特别说明：\r\n>   `composer` 分析某些依赖时可能会出现问题：比如在 `Laravel 5.2` 主项目中，安装本扩展包，可能会装上 `5.3` 版本的 `illuminate/support` 与 `illuminate/contracts` 相关依赖包，这样可能会造成 `5.2` 主项目出现错误。为此，本包在 `composer.json` 特别移除对 `\"illuminate/support\": \"~5.1\"` 的依赖。\r\n\r\n## 安装与配置\r\n\r\n在 `composer.json` 新增 `\"douyasi/laravel-editor-md\": \"dev-master\"` 依赖，然后执行： `composer update` 操作。\r\n\r\n依赖安装完毕之后，在 `app.php` 中添加：\r\n\r\n```php\r\n\'providers\' => [\r\n        \'Douyasi\\Editor\\EditorServiceProvider\',\r\n],\r\n```\r\n\r\n然后，执行下面 `artisan` 命令，发布该扩展包配置等项。\r\n\r\n```bash\r\nphp artisan vendor:publish --force\r\n```\r\n\r\n现在您可以访问 `/laravel-editor-md/example` 路由，不出意外，您可以看到扩展包提供的示例页面。\r\n\r\n![](http://douyasi.com/usr/uploads/2016/08/2512199115.jpg)\r\n\r\n编辑器图片默认会上传到 `public/uploads/content` 目录下；编辑器相关功能配置位于 `config/editor.php` 文件中。\r\n\r\n## 使用说明\r\n\r\n在 `blade` 模版里面使用下面三个方法：`editor_css()` 、`editor_js()` 和 `editor_config()` 。\r\n\r\n```html\r\n<!DOCTYPE html>\r\n<html lang=\"en\">\r\n<head>\r\n    <meta charset=\"UTF-8\">\r\n    <title>editor.md example</title>\r\n    {!! editor_css() !!}\r\n</head>\r\n<body>\r\n<h2>editor.md example</h2>\r\n<div id=\"mdeditor\">\r\n  <textarea class=\"form-control\" name=\"content\" style=\"display:none;\">\r\n# editor.md for Laravel\r\n>   editor.md example\r\n  </textarea>\r\n</div>\r\n\r\n{!! editor_js() !!}\r\n{!! editor_config(\'mdeditor\') !!}\r\n</body>\r\n</html>\r\n```', '2016-12-28 14:37:40', '2016-12-28 14:37:40');
COMMIT;

-- ----------------------------
--  Table structure for `yascmf_categories`
-- ----------------------------
DROP TABLE IF EXISTS `yascmf_categories`;
CREATE TABLE `yascmf_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '分裂别名',
  `sort` int(3) DEFAULT '999' COMMENT '排序，序号越大越靠前',
  `slug` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '分类英文或拼音别名',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `yascmf_categories`
-- ----------------------------
BEGIN;
INSERT INTO `yascmf_categories` VALUES ('1', '默认', '999', 'default', '2016-08-24 18:54:59', '2016-09-14 17:24:40');
COMMIT;

-- ----------------------------
--  Table structure for `yascmf_password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `yascmf_password_resets`;
CREATE TABLE `yascmf_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `yascmf_permission_role`
-- ----------------------------
DROP TABLE IF EXISTS `yascmf_permission_role`;
CREATE TABLE `yascmf_permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `yascmf_permission_role`
-- ----------------------------
BEGIN;
INSERT INTO `yascmf_permission_role` VALUES ('1', '1'), ('2', '1'), ('3', '1'), ('4', '1'), ('5', '1'), ('6', '1'), ('7', '1'), ('8', '1'), ('9', '1'), ('10', '1'), ('11', '1'), ('12', '1'), ('13', '1'), ('14', '1'), ('17', '1'), ('19', '1'), ('20', '1'), ('22', '1'), ('23', '1'), ('24', '1'), ('1', '2'), ('2', '2'), ('3', '2'), ('4', '2'), ('5', '2'), ('6', '2'), ('7', '2'), ('8', '2'), ('9', '2'), ('10', '2'), ('11', '2'), ('12', '2'), ('13', '2'), ('14', '2'), ('15', '2'), ('16', '2'), ('17', '2'), ('18', '2'), ('19', '2'), ('20', '2'), ('21', '2'), ('22', '2'), ('23', '2'), ('24', '2'), ('1', '3'), ('2', '3'), ('3', '3'), ('5', '4'), ('6', '4'), ('7', '4'), ('8', '4'), ('9', '4'), ('10', '4'), ('11', '4'), ('12', '4'), ('13', '4'), ('1', '5'), ('5', '5'), ('9', '5'), ('12', '5'), ('14', '5'), ('17', '5'), ('19', '5'), ('20', '5'), ('22', '5');
COMMIT;

-- ----------------------------
--  Table structure for `yascmf_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `yascmf_permissions`;
CREATE TABLE `yascmf_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `yascmf_permissions`
-- ----------------------------
BEGIN;
INSERT INTO `yascmf_permissions` VALUES ('1', '@member', '会员', null, '2016-04-08 12:28:17', '2016-04-08 12:28:17'), ('2', 'member-show', '会员查看', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18'), ('3', 'member-block', '会员冻结', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18'), ('4', 'member-search', '会员搜索', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18'), ('5', '@article', '文章', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18'), ('6', 'article-show', '文章查看', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18'), ('7', 'article-write', '文章写入', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18'), ('8', 'article-search', '文章搜索', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18'), ('9', '@category', '分类', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18'), ('10', 'category-show', '分类查看', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18'), ('11', 'category-write', '分类写入', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18'), ('12', '@me', '个人资料', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18'), ('13', 'me-write', '个人资料写入', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19'), ('14', '@user', '用户', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19'), ('15', 'user-write', '用户写入', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19'), ('16', 'user-search', '用户搜索', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19'), ('17', '@role', '角色', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19'), ('18', 'role-write', '角色写入', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19'), ('19', '@permission', '权限', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19'), ('20', '@option', '系统配置', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19'), ('21', 'option-write', '系统配置写入', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19'), ('22', '@log', '系统日志', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19'), ('23', 'log-show', '系统日志查看', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19'), ('24', 'log-search', '系统日志搜索', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
COMMIT;

-- ----------------------------
--  Table structure for `yascmf_role_user`
-- ----------------------------
DROP TABLE IF EXISTS `yascmf_role_user`;
CREATE TABLE `yascmf_role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `yascmf_role_user`
-- ----------------------------
BEGIN;
INSERT INTO `yascmf_role_user` VALUES ('1', '2'), ('2', '5');
COMMIT;

-- ----------------------------
--  Table structure for `yascmf_roles`
-- ----------------------------
DROP TABLE IF EXISTS `yascmf_roles`;
CREATE TABLE `yascmf_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `yascmf_roles`
-- ----------------------------
BEGIN;
INSERT INTO `yascmf_roles` VALUES ('1', 'Admin', '普通管理员', '', '2016-03-03 17:05:04', '2016-03-11 11:51:31'), ('2', 'Founder', '创始人', '', '2016-03-08 17:05:52', '2016-03-10 11:26:44'), ('4', 'Editor', '编辑员', '', '2016-03-08 17:14:33', '2016-03-11 11:49:02'), ('5', 'Demo', '只读演示', '', '2016-03-08 17:38:11', '2016-03-11 11:54:23');
COMMIT;

-- ----------------------------
--  Table structure for `yascmf_system_logs`
-- ----------------------------
DROP TABLE IF EXISTS `yascmf_system_logs`;
CREATE TABLE `yascmf_system_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '系统日志id',
  `user_id` int(12) DEFAULT '0' COMMENT '用户id（为0表示系统级操作，其它一般为管理型用户操作）',
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'system' COMMENT '操作类型',
  `url` varchar(200) COLLATE utf8_unicode_ci DEFAULT '-' COMMENT '操作发起的url',
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '操作内容',
  `operator_ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '操作者ip',
  `created_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='系统日志表';

-- ----------------------------
--  Records of `yascmf_system_logs`
-- ----------------------------
BEGIN;
INSERT INTO `yascmf_system_logs` VALUES ('1', '1', 'session', '//www.yascmf.dev/admin/auth/login', '管理员：yascmf[admin@example.com] 登录系统。', '127.0.0.1', '2016-06-08 10:56:13', '2016-06-08 10:56:13'), ('2', '1', 'session', '//base.yascmf.app/admin/auth/login', '管理员：yascmf[admin@example.com] 登录系统。', '192.168.10.1', '2016-12-28 11:32:25', '2016-12-28 11:32:25');
COMMIT;

-- ----------------------------
--  Table structure for `yascmf_system_options`
-- ----------------------------
DROP TABLE IF EXISTS `yascmf_system_options`;
CREATE TABLE `yascmf_system_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '配置选项名',
  `value` text COLLATE utf8_unicode_ci COMMENT '配置选项值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `system_option_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='系统配置选项表';

-- ----------------------------
--  Records of `yascmf_system_options`
-- ----------------------------
BEGIN;
INSERT INTO `yascmf_system_options` VALUES ('1', 'website_keywords', '芽丝内容管理框架,基础开发版,芽丝网,YʌS Network'), ('2', 'company_address', ''), ('3', 'website_title', '芽丝内容管理框架 (YASCMF)'), ('4', 'company_telephone', '800-168-8888'), ('5', 'company_full_name', '芽丝网络科技有限公司'), ('6', 'website_icp', '鄂ICP备15014910号'), ('7', 'system_version', '5.2'), ('8', 'page_size', '15'), ('9', 'system_logo', '/assets/img/yas_logo.png'), ('10', 'picture_watermark', '/assets/img/yas_logo.png'), ('11', 'company_short_name', '芽丝网'), ('12', 'system_author', '豆芽丝'), ('13', 'system_author_website', 'http://douyasi.com'), ('14', 'is_watermark', '0');
COMMIT;

-- ----------------------------
--  Table structure for `yascmf_users`
-- ----------------------------
DROP TABLE IF EXISTS `yascmf_users`;
CREATE TABLE `yascmf_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `realname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `is_locked` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1锁定,0正常',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `yascmf_users`
-- ----------------------------
BEGIN;
INSERT INTO `yascmf_users` VALUES ('1', 'admin', 'admin@example.com', '$2y$10$J7LHukU1OvdKS0HjHyP67OckaKXwci9vV6iqOCpN65x8X7MDgMNlu', 'cxqI09Ez58Y9iV4Ovo5ZcnxnUMMBN1Cn3potR23dEy0ibZDPsf48HSjDgWA4', 'yascmf', '888888888888', '芽丝网', '0', '2016-03-03 17:05:45', '2016-04-08 12:29:02'), ('2', 'demo', 'demo@example.com', '$2y$10$lZLHABzllmB8.X8bflFHl./amaH1n2nqaYDlC52BIQCuTMLXowdyC', 'pOSVzUBYf4KDB0YtXPBKimEHUe8JcPnv2C55xnCtbJKh9L6bkcR2MbSnhW7T', 'demo', null, '演示', '0', '2016-03-10 16:37:01', '2016-04-08 12:33:21');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
