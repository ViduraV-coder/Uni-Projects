/*
Navicat MySQL Data Transfer

Source Server         : Lionel Jr
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : hospital

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2019-01-02 17:17:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for details
-- ----------------------------
DROP TABLE IF EXISTS `details`;
CREATE TABLE `details` (
  `A_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(265) NOT NULL,
  `NIC` varchar(100) NOT NULL,
  `address` varchar(265) NOT NULL,
  `telephone` int(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `birthday` varchar(265) NOT NULL,
  `batch` varchar(200) NOT NULL,
  `studentID` varchar(200) NOT NULL,
  PRIMARY KEY (`A_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of details
-- ----------------------------

-- ----------------------------
-- Table structure for details_clinical
-- ----------------------------
DROP TABLE IF EXISTS `details_clinical`;
CREATE TABLE `details_clinical` (
  `A_id` int(100) NOT NULL AUTO_INCREMENT,
  `mobility` varchar(265) DEFAULT NULL,
  `communication` varchar(100) DEFAULT NULL,
  `vision` varchar(265) DEFAULT NULL,
  `details1` varchar(100) DEFAULT NULL,
  `chronic` varchar(200) DEFAULT NULL,
  `epilepsy` varchar(265) DEFAULT NULL,
  `aler` varchar(200) DEFAULT NULL,
  `chest` varchar(200) DEFAULT NULL,
  `asthma` varchar(200) DEFAULT NULL,
  `gastritis` varchar(200) DEFAULT NULL,
  `diabetes` varchar(200) DEFAULT NULL,
  `kidney` varchar(200) DEFAULT NULL,
  `mental` varchar(200) DEFAULT NULL,
  `backache` varchar(200) DEFAULT NULL,
  `recurrent` varchar(200) DEFAULT NULL,
  `migraine` varchar(200) DEFAULT NULL,
  `surgical` varchar(200) DEFAULT NULL,
  `gyna` varchar(200) DEFAULT NULL,
  `any` varchar(200) DEFAULT NULL,
  `details2` varchar(200) DEFAULT NULL,
  `NIC` varchar(200) NOT NULL,
  PRIMARY KEY (`A_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of details_clinical
-- ----------------------------

-- ----------------------------
-- Table structure for patient_signup
-- ----------------------------
DROP TABLE IF EXISTS `patient_signup`;
CREATE TABLE `patient_signup` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of patient_signup
-- ----------------------------

-- ----------------------------
-- Table structure for staff_login
-- ----------------------------
DROP TABLE IF EXISTS `staff_login`;
CREATE TABLE `staff_login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of staff_login
-- ----------------------------
INSERT INTO `staff_login` VALUES ('1', 'administrator', 'admin123');
