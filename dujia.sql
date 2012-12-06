/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50528
 Source Host           : localhost
 Source Database       : dujia

 Target Server Type    : MySQL
 Target Server Version : 50528
 File Encoding         : utf-8

 Date: 12/06/2012 19:01:43 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `dj_hotel_domestic`
-- ----------------------------
DROP TABLE IF EXISTS `dj_hotel_domestic`;
CREATE TABLE `dj_hotel_domestic` (
  `hid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '',
  `summary` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`hid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `dj_regular`
-- ----------------------------
DROP TABLE IF EXISTS `dj_regular`;
CREATE TABLE `dj_regular` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL DEFAULT '',
  `summary` varchar(1024) NOT NULL DEFAULT '',
  `price_primary` varchar(32) NOT NULL DEFAULT '',
  `price_secondary` varchar(32) NOT NULL DEFAULT '',
  `image_cover` varchar(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `usr_account`
-- ----------------------------
DROP TABLE IF EXISTS `usr_account`;
CREATE TABLE `usr_account` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(255) NOT NULL DEFAULT '',
  `mobile` varchar(16) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `email_verification` int(11) NOT NULL DEFAULT '0' COMMENT '0: Normal, 1: Need Verification, 2: Require Immediate Verification',
  PRIMARY KEY (`uid`),
  KEY `mobile` (`mobile`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `usr_captcha`
-- ----------------------------
DROP TABLE IF EXISTS `usr_captcha`;
CREATE TABLE `usr_captcha` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid_key` varchar(64) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `answer` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `create_time` (`create_time`),
  KEY `uuid_key` (`uuid_key`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `usr_mailcode`
-- ----------------------------
DROP TABLE IF EXISTS `usr_mailcode`;
CREATE TABLE `usr_mailcode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `code` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `usr_smscode`
-- ----------------------------
DROP TABLE IF EXISTS `usr_smscode`;
CREATE TABLE `usr_smscode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mobile` varchar(16) NOT NULL,
  `code` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mobile_create_time` (`mobile`,`create_time`),
  KEY `create_time` (`create_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
