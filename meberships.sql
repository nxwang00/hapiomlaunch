/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100425
 Source Host           : localhost:3306
 Source Schema         : hapiomco_db

 Target Server Type    : MySQL
 Target Server Version : 100425
 File Encoding         : 65001

 Date: 12/12/2022 06:00:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for meberships
-- ----------------------------
DROP TABLE IF EXISTS `meberships`;
CREATE TABLE `meberships`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `levelstatus` tinyint(1) NOT NULL DEFAULT 1,
  `amount` float(10, 2) NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of meberships
-- ----------------------------
INSERT INTO `meberships` VALUES (1, 'Platinum', 1, 100.00, 'Purchase things in user store\r\nCharge members to join their groups\r\nCreate stores where can sell products and courses', '2022-06-29 11:47:29', '2022-11-21 01:41:39', NULL);
INSERT INTO `meberships` VALUES (2, 'Gold', 1, 75.00, 'Purchase things in user store\r\nCharge members to join their groups ( total people < 500 )\r\nCreate stores where can sell products and courses', '2022-06-29 11:47:54', '2022-11-21 01:42:03', NULL);
INSERT INTO `meberships` VALUES (3, 'Silver', 1, 50.00, 'Purchase things in user store\r\nCreate free groups', '2022-06-29 11:48:12', '2022-11-21 01:38:35', NULL);
INSERT INTO `meberships` VALUES (4, 'Free', 1, 0.00, 'Purchase things in user stores', '2022-06-29 11:48:31', '2022-11-21 01:31:49', NULL);

SET FOREIGN_KEY_CHECKS = 1;
