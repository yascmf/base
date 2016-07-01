/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50704
Source Host           : localhost:3306
Source Database       : yascmf_base

Target Server Type    : MYSQL
Target Server Version : 50704
File Encoding         : 65001

Date: 2016-06-08 10:57:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yascmf_password_resets
-- ----------------------------
DROP TABLE IF EXISTS `yascmf_password_resets`;
CREATE TABLE `yascmf_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yascmf_password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for yascmf_permissions
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
-- Records of yascmf_permissions
-- ----------------------------
INSERT INTO `yascmf_permissions` VALUES ('1', '@member', '会员', null, '2016-04-08 12:28:17', '2016-04-08 12:28:17');
INSERT INTO `yascmf_permissions` VALUES ('2', 'member-show', '会员查看', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `yascmf_permissions` VALUES ('3', 'member-block', '会员冻结', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `yascmf_permissions` VALUES ('4', 'member-search', '会员搜索', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `yascmf_permissions` VALUES ('5', '@article', '文章', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `yascmf_permissions` VALUES ('6', 'article-show', '文章查看', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `yascmf_permissions` VALUES ('7', 'article-write', '文章写入', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `yascmf_permissions` VALUES ('8', 'article-search', '文章搜索', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `yascmf_permissions` VALUES ('9', '@category', '分类', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `yascmf_permissions` VALUES ('10', 'category-show', '分类查看', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `yascmf_permissions` VALUES ('11', 'category-write', '分类写入', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `yascmf_permissions` VALUES ('12', '@me', '个人资料', null, '2016-04-08 12:28:18', '2016-04-08 12:28:18');
INSERT INTO `yascmf_permissions` VALUES ('13', 'me-write', '个人资料写入', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `yascmf_permissions` VALUES ('14', '@user', '用户', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `yascmf_permissions` VALUES ('15', 'user-write', '用户写入', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `yascmf_permissions` VALUES ('16', 'user-search', '用户搜索', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `yascmf_permissions` VALUES ('17', '@role', '角色', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `yascmf_permissions` VALUES ('18', 'role-write', '角色写入', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `yascmf_permissions` VALUES ('19', '@permission', '权限', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `yascmf_permissions` VALUES ('20', '@option', '系统配置', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `yascmf_permissions` VALUES ('21', 'option-write', '系统配置写入', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `yascmf_permissions` VALUES ('22', '@log', '系统日志', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `yascmf_permissions` VALUES ('23', 'log-show', '系统日志查看', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');
INSERT INTO `yascmf_permissions` VALUES ('24', 'log-search', '系统日志搜索', null, '2016-04-08 12:28:19', '2016-04-08 12:28:19');

-- ----------------------------
-- Table structure for yascmf_permission_role
-- ----------------------------
DROP TABLE IF EXISTS `yascmf_permission_role`;
CREATE TABLE `yascmf_permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yascmf_permission_role
-- ----------------------------
INSERT INTO `yascmf_permission_role` VALUES ('1', '1');
INSERT INTO `yascmf_permission_role` VALUES ('2', '1');
INSERT INTO `yascmf_permission_role` VALUES ('3', '1');
INSERT INTO `yascmf_permission_role` VALUES ('4', '1');
INSERT INTO `yascmf_permission_role` VALUES ('5', '1');
INSERT INTO `yascmf_permission_role` VALUES ('6', '1');
INSERT INTO `yascmf_permission_role` VALUES ('9', '1');
INSERT INTO `yascmf_permission_role` VALUES ('10', '1');
INSERT INTO `yascmf_permission_role` VALUES ('12', '1');
INSERT INTO `yascmf_permission_role` VALUES ('13', '1');
INSERT INTO `yascmf_permission_role` VALUES ('14', '1');
INSERT INTO `yascmf_permission_role` VALUES ('17', '1');
INSERT INTO `yascmf_permission_role` VALUES ('19', '1');
INSERT INTO `yascmf_permission_role` VALUES ('20', '1');
INSERT INTO `yascmf_permission_role` VALUES ('22', '1');
INSERT INTO `yascmf_permission_role` VALUES ('23', '1');
INSERT INTO `yascmf_permission_role` VALUES ('24', '1');
INSERT INTO `yascmf_permission_role` VALUES ('12', '2');
INSERT INTO `yascmf_permission_role` VALUES ('13', '2');
INSERT INTO `yascmf_permission_role` VALUES ('14', '2');
INSERT INTO `yascmf_permission_role` VALUES ('15', '2');
INSERT INTO `yascmf_permission_role` VALUES ('16', '2');
INSERT INTO `yascmf_permission_role` VALUES ('17', '2');
INSERT INTO `yascmf_permission_role` VALUES ('18', '2');
INSERT INTO `yascmf_permission_role` VALUES ('19', '2');
INSERT INTO `yascmf_permission_role` VALUES ('20', '2');
INSERT INTO `yascmf_permission_role` VALUES ('21', '2');
INSERT INTO `yascmf_permission_role` VALUES ('22', '2');
INSERT INTO `yascmf_permission_role` VALUES ('23', '2');
INSERT INTO `yascmf_permission_role` VALUES ('24', '2');
INSERT INTO `yascmf_permission_role` VALUES ('1', '3');
INSERT INTO `yascmf_permission_role` VALUES ('2', '3');
INSERT INTO `yascmf_permission_role` VALUES ('3', '3');
INSERT INTO `yascmf_permission_role` VALUES ('5', '4');
INSERT INTO `yascmf_permission_role` VALUES ('6', '4');
INSERT INTO `yascmf_permission_role` VALUES ('7', '4');
INSERT INTO `yascmf_permission_role` VALUES ('8', '4');
INSERT INTO `yascmf_permission_role` VALUES ('9', '4');
INSERT INTO `yascmf_permission_role` VALUES ('10', '4');
INSERT INTO `yascmf_permission_role` VALUES ('11', '4');
INSERT INTO `yascmf_permission_role` VALUES ('12', '4');
INSERT INTO `yascmf_permission_role` VALUES ('13', '4');
INSERT INTO `yascmf_permission_role` VALUES ('1', '5');
INSERT INTO `yascmf_permission_role` VALUES ('5', '5');
INSERT INTO `yascmf_permission_role` VALUES ('9', '5');
INSERT INTO `yascmf_permission_role` VALUES ('12', '5');
INSERT INTO `yascmf_permission_role` VALUES ('14', '5');
INSERT INTO `yascmf_permission_role` VALUES ('17', '5');
INSERT INTO `yascmf_permission_role` VALUES ('19', '5');
INSERT INTO `yascmf_permission_role` VALUES ('20', '5');
INSERT INTO `yascmf_permission_role` VALUES ('22', '5');

-- ----------------------------
-- Table structure for yascmf_roles
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
-- Records of yascmf_roles
-- ----------------------------
INSERT INTO `yascmf_roles` VALUES ('1', 'Admin', '普通管理员', '', '2016-03-03 17:05:04', '2016-03-11 11:51:31');
INSERT INTO `yascmf_roles` VALUES ('2', 'Founder', '创始人', '', '2016-03-08 17:05:52', '2016-03-10 11:26:44');
INSERT INTO `yascmf_roles` VALUES ('4', 'Editor', '编辑员', '', '2016-03-08 17:14:33', '2016-03-11 11:49:02');
INSERT INTO `yascmf_roles` VALUES ('5', 'Demo', '只读演示', '', '2016-03-08 17:38:11', '2016-03-11 11:54:23');

-- ----------------------------
-- Table structure for yascmf_role_user
-- ----------------------------
DROP TABLE IF EXISTS `yascmf_role_user`;
CREATE TABLE `yascmf_role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of yascmf_role_user
-- ----------------------------
INSERT INTO `yascmf_role_user` VALUES ('1', '2');
INSERT INTO `yascmf_role_user` VALUES ('2', '5');

-- ----------------------------
-- Table structure for yascmf_system_logs
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='系统日志表';

-- ----------------------------
-- Records of yascmf_system_logs
-- ----------------------------
INSERT INTO `yascmf_system_logs` VALUES ('1', '1', 'session', '//www.yascmf.dev/admin/auth/login', '管理员：yascmf[admin@example.com] 登录系统。', '127.0.0.1', '2016-06-08 10:56:13', '2016-06-08 10:56:13');

-- ----------------------------
-- Table structure for yascmf_system_options
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
-- Records of yascmf_system_options
-- ----------------------------
INSERT INTO `yascmf_system_options` VALUES ('1', 'website_keywords', '芽丝内容管理框架,基础开发版,芽丝网,YʌS Network');
INSERT INTO `yascmf_system_options` VALUES ('2', 'company_address', '');
INSERT INTO `yascmf_system_options` VALUES ('3', 'website_title', '芽丝内容管理框架 (YASCMF)');
INSERT INTO `yascmf_system_options` VALUES ('4', 'company_telephone', '800-168-8888');
INSERT INTO `yascmf_system_options` VALUES ('5', 'company_full_name', '芽丝网络科技有限公司');
INSERT INTO `yascmf_system_options` VALUES ('6', 'website_icp', '鄂ICP备15014910号');
INSERT INTO `yascmf_system_options` VALUES ('7', 'system_version', '5.2');
INSERT INTO `yascmf_system_options` VALUES ('8', 'page_size', '15');
INSERT INTO `yascmf_system_options` VALUES ('9', 'system_logo', '/assets/img/yas_logo.png');
INSERT INTO `yascmf_system_options` VALUES ('10', 'picture_watermark', '/assets/img/yas_logo.png');
INSERT INTO `yascmf_system_options` VALUES ('11', 'company_short_name', '芽丝网');
INSERT INTO `yascmf_system_options` VALUES ('12', 'system_author', '豆芽丝');
INSERT INTO `yascmf_system_options` VALUES ('13', 'system_author_website', 'http://douyasi.com');
INSERT INTO `yascmf_system_options` VALUES ('14', 'is_watermark', '0');

-- ----------------------------
-- Table structure for yascmf_users
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
-- Records of yascmf_users
-- ----------------------------
INSERT INTO `yascmf_users` VALUES ('1', 'admin', 'admin@example.com', '$2y$10$J7LHukU1OvdKS0HjHyP67OckaKXwci9vV6iqOCpN65x8X7MDgMNlu', 'cxqI09Ez58Y9iV4Ovo5ZcnxnUMMBN1Cn3potR23dEy0ibZDPsf48HSjDgWA4', 'yascmf', '888888888888', '芽丝网', '0', '2016-03-03 17:05:45', '2016-04-08 12:29:02');
INSERT INTO `yascmf_users` VALUES ('2', 'demo', 'demo@example.com', '$2y$10$lZLHABzllmB8.X8bflFHl./amaH1n2nqaYDlC52BIQCuTMLXowdyC', 'pOSVzUBYf4KDB0YtXPBKimEHUe8JcPnv2C55xnCtbJKh9L6bkcR2MbSnhW7T', 'demo', null, '演示', '0', '2016-03-10 16:37:01', '2016-04-08 12:33:21');
