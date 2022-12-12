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

 Date: 12/12/2022 05:54:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint UNSIGNED NOT NULL DEFAULT 3,
  `meberships_id` int NULL DEFAULT NULL,
  `customer_id` bigint UNSIGNED NULL DEFAULT NULL,
  `block` tinyint(1) NOT NULL DEFAULT 1,
  `first_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `last_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `group_type` tinyint(1) NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `edate` date NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE,
  INDEX `block`(`block` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 1, 1, NULL, 1, 'Hapi', 'OM', 'Super Admin', 'paul@creativelab.tv', '2022-02-23 02:22:18', '$2y$10$rlParW8u9504XRFIr6LXluJy4JiKnnGdRZ4G6Cos3Iz/QJPWuU9Bm', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-23 02:22:18', '2022-06-17 12:24:02');
INSERT INTO `users` VALUES (2, 2, 2, NULL, 1, 'Tester', 'Tester', 'Admin Tester', 'admintester@gmail.com', NULL, '$2y$10$rlParW8u9504XRFIr6LXluJy4JiKnnGdRZ4G6Cos3Iz/QJPWuU9Bm', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-19 08:11:10', '2022-06-19 08:11:10');
INSERT INTO `users` VALUES (3, 3, 4, NULL, 1, 'Tester', 'Tester', 'Client Tester', 'clienttester@gmail.com', NULL, '$2y$10$rlParW8u9504XRFIr6LXluJy4JiKnnGdRZ4G6Cos3Iz/QJPWuU9Bm', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-19 08:11:10', '2022-06-19 08:11:10');

SET FOREIGN_KEY_CHECKS = 1;
