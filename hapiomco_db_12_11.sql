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

 Date: 11/12/2022 12:27:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_settings
-- ----------------------------
DROP TABLE IF EXISTS `admin_settings`;
CREATE TABLE `admin_settings`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `sname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `svalue` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of admin_settings
-- ----------------------------
INSERT INTO `admin_settings` VALUES (1, 'agreement', '<p><span style=\"font-size:12px\"><span style=\"line-height:1\"><span style=\"color:#3498db\"><strong>HapiOm is a social network for loving, playful, and sprititually-inclined people.</strong></span><span style=\"color:#9b59b6\"> </span>If you are seeking an uplifting commnunity, personal healing, or divine discussions, you will love HapiOm. If you are a spiritual seeker or teacher, healer, altruistic influencer, therapist, psychic, mystical person, or lover of all things divine, HapiOm is for you.</span></span></p>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"line-height:1\"><span style=\"color:#3498db\"><strong>HapiOmers love to engage and build community around their spiritual beliefs.</strong></span> If you&#39;re seeking a welcoming environment filled with kind, authentic, loving people, you&#39;ve come to the right place. If you want to explore your spirituality, learn and discuss beautiful, expansive ideas, and feel connected to the Universe, HapiOm is for you.</span></span></p>\r\n\r\n<p><span style=\"font-size:12px\"><strong><span style=\"color:#3498db\">On HapiOm.com, you can form spiritual groups,</span></strong> find support and encouragement, take lovely courses, make new friends, and potentially share and sell your books, courses, and products.</span></p>');
INSERT INTO `admin_settings` VALUES (2, 'privacy', '<p><span style=\"font-size:20px\"><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, s</strong></span>ed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<p><em>Amet facilisis magna etiam tempor. Consequat nisl vel pretium lectus quam id leo in vitae. Gravida dictum fusce ut placerat orci nulla pellentesque dignissim. Vestibulum rhoncus est pellentesque elit ullamcorper dignissim.</em></p>\r\n\r\n<p><strong>Sed sed risus pretium quam vulputate dignissim. In tellus integer feugiat scelerisque varius morbi enim nunc faucibus. Porta non pulvinar neque laoreet suspendisse interdum consectetur. Enim praesent elementum facilisis leo vel. Semper quis lectus nulla at volutpat diam. Cursus risus at ultrices mi tempus. Eu mi bibendum neque egestas congue quisque egestas diam in. Mauris pharetra e</strong></p>\r\n\r\n<p><s>t ultrices neque ornare aenean euismod elementum nisi. Massa ultricies mi quis hendrerit dolor magna. Sed pulvinar proin gravida hendrerit lectus. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat. Fermentum dui faucibus in ornare. Tellus orci ac auctor augue.</s></p>');
INSERT INTO `admin_settings` VALUES (3, 'termsofuse', '<p>Many of our components require the use of JavaScript to function. Specifically, they require&nbsp;<a href=\"https://jquery.com/\">jQuery</a>,&nbsp;<a href=\"https://popper.js.org/\">Popper</a>, and our own JavaScript plugins. We use&nbsp;<a href=\"https://blog.jquery.com/2016/06/09/jquery-3-0-final-released/\">jQuery&rsquo;s slim build</a>, but the full version is also supported.</p>\r\n\r\n<p>Place&nbsp;<strong>one of the following&nbsp;<code>&lt;script&gt;</code>s</strong>&nbsp;near the end of your pages, right before the closing&nbsp;<code>&lt;/body&gt;</code>&nbsp;tag, to enable them. jQuery must come first, then Popper, and then our JavaScript plugins.</p>');

-- ----------------------------
-- Table structure for blocklists
-- ----------------------------
DROP TABLE IF EXISTS `blocklists`;
CREATE TABLE `blocklists`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `block_id` bigint UNSIGNED NOT NULL,
  `blockstatus` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of blocklists
-- ----------------------------
INSERT INTO `blocklists` VALUES (1, 15, 19, 1, '2022-11-18 23:53:37', '2022-11-19 00:20:16', '2022-11-19 00:20:16');

-- ----------------------------
-- Table structure for carts
-- ----------------------------
DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `product_id` bigint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of carts
-- ----------------------------
INSERT INTO `carts` VALUES (1, 5, 1, '2022-06-29 13:00:39', '2022-06-29 13:08:19');
INSERT INTO `carts` VALUES (2, 5, 3, '2022-06-29 13:00:50', '2022-06-29 13:00:57');
INSERT INTO `carts` VALUES (3, 5, 2, '2022-09-30 08:06:46', '2022-09-30 08:06:46');
INSERT INTO `carts` VALUES (4, 26, 1, '2022-11-18 19:57:54', '2022-11-18 19:57:54');
INSERT INTO `carts` VALUES (5, 26, 1, '2022-11-18 19:57:56', '2022-11-18 19:58:06');
INSERT INTO `carts` VALUES (6, 15, 2, '2022-11-19 00:01:39', '2022-11-19 00:01:39');
INSERT INTO `carts` VALUES (7, 6, 4, '2022-12-06 20:42:42', '2022-12-06 20:42:42');
INSERT INTO `carts` VALUES (9, 6, 7, '2022-12-06 20:43:04', '2022-12-06 20:43:04');

-- ----------------------------
-- Table structure for courses
-- ----------------------------
DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `course` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `course_status` tinyint NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of courses
-- ----------------------------

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `customer_status` tinyint UNSIGNED NOT NULL DEFAULT 0 COMMENT '0:Inactive, 1:Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `company_status`(`customer_status` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of customers
-- ----------------------------

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `ename` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `group_id` int NOT NULL,
  `hoster_id` int NOT NULL,
  `creater_id` int NOT NULL,
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NULL DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint NOT NULL COMMENT '0: request, 1:approved, 2:rejected',
  `visible` tinyint NOT NULL COMMENT '0:public, 1:group',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO `events` VALUES (4, 'test event 1', 'carousel1_1670108491.jpg', 5, 6, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-12-05 15:00:00', NULL, 'london', 1, 0);
INSERT INTO `events` VALUES (5, 'test event 2', 'join_man4_1670110330.jpg', 1, 5, 5, 'this is the description for test event 2', '2022-12-03 15:32:00', NULL, 'california', 0, 0);
INSERT INTO `events` VALUES (6, 'yogeshi event', 'join_man3_1670159777.jpg', 5, 6, 6, 'this is test test test description for event ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2022-12-15 05:16:00', '2022-12-23 05:16:00', 'california', 1, 1);
INSERT INTO `events` VALUES (7, 'yogeshi event 2', 'join_man4_1670166538.jpg', 5, 5, 6, 'dfg dffsdg dfg dg sdsgf', '2022-12-10 10:13:00', '2022-12-21 09:13:00', 'Nairobi', 1, 0);
INSERT INTO `events` VALUES (8, 'yogeshi event 3', 'person2_1670166672.jpg', 5, 6, 6, 'sdfs gdsf gds gdfs gd  sdfg sdg sdg', '2022-12-12 11:10:00', NULL, 'Beijing', 1, 0);
INSERT INTO `events` VALUES (9, 'test event 3', 'b1_1670183119.jpg', 5, 6, 6, 'ssssssssss', '2022-12-08 14:48:00', NULL, 'dandong', 0, 0);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for frees
-- ----------------------------
DROP TABLE IF EXISTS `frees`;
CREATE TABLE `frees`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `free` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `free_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of frees
-- ----------------------------

-- ----------------------------
-- Table structure for friendlists
-- ----------------------------
DROP TABLE IF EXISTS `friendlists`;
CREATE TABLE `friendlists`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int UNSIGNED NOT NULL,
  `friend_id` int UNSIGNED NOT NULL,
  `friendstatus` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  INDEX `friend_id`(`friend_id` ASC) USING BTREE,
  INDEX `friendstatus`(`friendstatus` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of friendlists
-- ----------------------------
INSERT INTO `friendlists` VALUES (1, 6, 5, 1, '2022-06-19 08:19:53', '2022-06-19 08:19:53', NULL);
INSERT INTO `friendlists` VALUES (2, 5, 6, 1, '2022-06-19 08:19:53', '2022-06-19 08:19:53', NULL);
INSERT INTO `friendlists` VALUES (3, 6, 8, 1, '2022-06-29 14:30:51', '2022-06-29 14:30:51', NULL);
INSERT INTO `friendlists` VALUES (4, 8, 6, 1, '2022-06-29 14:30:51', '2022-06-29 14:30:51', NULL);
INSERT INTO `friendlists` VALUES (5, 17, 19, 1, '2022-06-30 06:50:34', '2022-06-30 06:50:34', NULL);
INSERT INTO `friendlists` VALUES (6, 19, 17, 1, '2022-06-30 06:50:34', '2022-06-30 06:50:34', NULL);
INSERT INTO `friendlists` VALUES (7, 16, 19, 1, '2022-06-30 06:51:18', '2022-06-30 06:51:18', NULL);
INSERT INTO `friendlists` VALUES (8, 19, 16, 1, '2022-06-30 06:51:18', '2022-06-30 06:51:18', NULL);
INSERT INTO `friendlists` VALUES (9, 16, 17, 1, '2022-06-30 06:51:21', '2022-06-30 06:51:21', NULL);
INSERT INTO `friendlists` VALUES (10, 17, 16, 1, '2022-06-30 06:51:21', '2022-06-30 06:51:21', NULL);
INSERT INTO `friendlists` VALUES (11, 15, 19, 1, '2022-06-30 07:14:27', '2022-11-19 00:23:10', NULL);
INSERT INTO `friendlists` VALUES (12, 19, 15, 1, '2022-06-30 07:14:27', '2022-06-30 07:14:27', NULL);
INSERT INTO `friendlists` VALUES (13, 15, 17, 1, '2022-06-30 07:14:31', '2022-06-30 07:14:31', NULL);
INSERT INTO `friendlists` VALUES (14, 17, 15, 1, '2022-06-30 07:14:31', '2022-06-30 07:14:31', NULL);
INSERT INTO `friendlists` VALUES (15, 15, 16, 1, '2022-06-30 07:14:33', '2022-06-30 07:14:33', NULL);
INSERT INTO `friendlists` VALUES (16, 16, 15, 1, '2022-06-30 07:14:33', '2022-06-30 07:14:33', NULL);
INSERT INTO `friendlists` VALUES (17, 14, 19, 1, '2022-06-30 07:30:39', '2022-06-30 07:30:39', NULL);
INSERT INTO `friendlists` VALUES (18, 19, 14, 1, '2022-06-30 07:30:39', '2022-06-30 07:30:39', NULL);
INSERT INTO `friendlists` VALUES (19, 14, 17, 1, '2022-06-30 07:30:50', '2022-06-30 07:30:50', NULL);
INSERT INTO `friendlists` VALUES (20, 17, 14, 1, '2022-06-30 07:30:50', '2022-06-30 07:30:50', NULL);
INSERT INTO `friendlists` VALUES (21, 14, 17, 1, '2022-06-30 07:30:50', '2022-06-30 07:30:50', NULL);
INSERT INTO `friendlists` VALUES (22, 17, 14, 1, '2022-06-30 07:30:50', '2022-06-30 07:30:50', NULL);
INSERT INTO `friendlists` VALUES (23, 14, 16, 1, '2022-06-30 07:31:06', '2022-06-30 07:31:06', NULL);
INSERT INTO `friendlists` VALUES (24, 16, 14, 1, '2022-06-30 07:31:06', '2022-06-30 07:31:06', NULL);
INSERT INTO `friendlists` VALUES (25, 14, 16, 1, '2022-06-30 07:31:06', '2022-06-30 07:31:06', NULL);
INSERT INTO `friendlists` VALUES (26, 16, 14, 1, '2022-06-30 07:31:06', '2022-06-30 07:31:06', NULL);
INSERT INTO `friendlists` VALUES (27, 14, 15, 1, '2022-06-30 07:33:06', '2022-06-30 07:33:06', NULL);
INSERT INTO `friendlists` VALUES (28, 15, 14, 1, '2022-06-30 07:33:06', '2022-06-30 07:33:06', NULL);
INSERT INTO `friendlists` VALUES (29, 13, 19, 1, '2022-06-30 08:38:14', '2022-06-30 08:38:14', NULL);
INSERT INTO `friendlists` VALUES (30, 19, 13, 1, '2022-06-30 08:38:14', '2022-06-30 08:38:14', NULL);
INSERT INTO `friendlists` VALUES (31, 13, 15, 1, '2022-06-30 08:38:16', '2022-06-30 08:38:16', NULL);
INSERT INTO `friendlists` VALUES (32, 15, 13, 1, '2022-06-30 08:38:16', '2022-06-30 08:38:16', NULL);
INSERT INTO `friendlists` VALUES (33, 13, 14, 1, '2022-06-30 08:38:17', '2022-06-30 08:38:17', NULL);
INSERT INTO `friendlists` VALUES (34, 14, 13, 1, '2022-06-30 08:38:17', '2022-06-30 08:38:17', NULL);
INSERT INTO `friendlists` VALUES (35, 11, 19, 1, '2022-09-14 06:21:47', '2022-09-14 06:21:47', NULL);
INSERT INTO `friendlists` VALUES (36, 19, 11, 1, '2022-09-14 06:21:47', '2022-09-14 06:21:47', NULL);
INSERT INTO `friendlists` VALUES (37, 11, 16, 1, '2022-09-14 06:21:49', '2022-09-14 06:21:49', NULL);
INSERT INTO `friendlists` VALUES (38, 16, 11, 1, '2022-09-14 06:21:49', '2022-09-14 06:21:49', NULL);
INSERT INTO `friendlists` VALUES (39, 11, 15, 1, '2022-09-14 06:21:51', '2022-09-14 06:21:51', NULL);
INSERT INTO `friendlists` VALUES (40, 15, 11, 1, '2022-09-14 06:21:51', '2022-09-14 06:21:51', NULL);
INSERT INTO `friendlists` VALUES (41, 11, 15, 1, '2022-09-14 06:21:52', '2022-09-14 06:21:52', NULL);
INSERT INTO `friendlists` VALUES (42, 15, 11, 1, '2022-09-14 06:21:52', '2022-09-14 06:21:52', NULL);
INSERT INTO `friendlists` VALUES (43, 11, 14, 1, '2022-09-14 06:21:57', '2022-09-14 06:21:57', NULL);
INSERT INTO `friendlists` VALUES (44, 14, 11, 1, '2022-09-14 06:21:57', '2022-09-14 06:21:57', NULL);
INSERT INTO `friendlists` VALUES (45, 11, 13, 1, '2022-09-14 06:21:59', '2022-09-14 06:21:59', NULL);
INSERT INTO `friendlists` VALUES (46, 13, 11, 1, '2022-09-14 06:21:59', '2022-09-14 06:21:59', NULL);
INSERT INTO `friendlists` VALUES (47, 8, 19, 1, '2022-10-10 11:32:12', '2022-10-10 11:32:12', NULL);
INSERT INTO `friendlists` VALUES (48, 19, 8, 1, '2022-10-10 11:32:12', '2022-10-10 11:32:12', NULL);
INSERT INTO `friendlists` VALUES (49, 8, 17, 1, '2022-10-10 11:32:21', '2022-10-10 11:32:21', NULL);
INSERT INTO `friendlists` VALUES (50, 17, 8, 1, '2022-10-10 11:32:21', '2022-10-10 11:32:21', NULL);
INSERT INTO `friendlists` VALUES (51, 8, 16, 1, '2022-10-10 11:32:23', '2022-10-10 11:32:23', NULL);
INSERT INTO `friendlists` VALUES (52, 16, 8, 1, '2022-10-10 11:32:23', '2022-10-10 11:32:23', NULL);
INSERT INTO `friendlists` VALUES (53, 8, 15, 1, '2022-10-10 11:32:25', '2022-10-10 11:32:25', NULL);
INSERT INTO `friendlists` VALUES (54, 15, 8, 1, '2022-10-10 11:32:25', '2022-10-10 11:32:25', NULL);
INSERT INTO `friendlists` VALUES (55, 8, 13, 1, '2022-10-10 11:32:26', '2022-10-10 11:32:26', NULL);
INSERT INTO `friendlists` VALUES (56, 13, 8, 1, '2022-10-10 11:32:26', '2022-10-10 11:32:26', NULL);
INSERT INTO `friendlists` VALUES (57, 15, 26, 1, '2022-11-19 00:17:57', '2022-11-19 00:17:57', NULL);
INSERT INTO `friendlists` VALUES (58, 26, 15, 1, '2022-11-19 00:17:57', '2022-11-19 00:17:57', NULL);
INSERT INTO `friendlists` VALUES (59, 6, 19, 1, '2022-11-27 02:49:28', '2022-11-27 02:49:28', NULL);
INSERT INTO `friendlists` VALUES (60, 19, 6, 1, '2022-11-27 02:49:28', '2022-11-27 02:49:28', NULL);
INSERT INTO `friendlists` VALUES (61, 5, 26, 1, '2022-12-05 14:25:54', '2022-12-05 14:25:54', NULL);
INSERT INTO `friendlists` VALUES (62, 26, 5, 1, '2022-12-05 14:25:54', '2022-12-05 14:25:54', NULL);

-- ----------------------------
-- Table structure for friendrequests
-- ----------------------------
DROP TABLE IF EXISTS `friendrequests`;
CREATE TABLE `friendrequests`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `request_from` bigint UNSIGNED NOT NULL,
  `request_to` bigint UNSIGNED NOT NULL,
  `friendrequesttatus` tinyint UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `from`(`request_from` ASC) USING BTREE,
  INDEX `request_to`(`request_to` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 100 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of friendrequests
-- ----------------------------
INSERT INTO `friendrequests` VALUES (96, 26, 5, 0, '2022-12-05 13:55:18', '2022-12-05 14:25:54', '2022-12-05 14:25:54');
INSERT INTO `friendrequests` VALUES (97, 26, 6, 0, '2022-12-05 14:19:47', '2022-12-05 14:19:47', NULL);
INSERT INTO `friendrequests` VALUES (98, 26, 9, 0, '2022-12-05 14:19:54', '2022-12-05 14:19:54', NULL);
INSERT INTO `friendrequests` VALUES (99, 26, 19, 0, '2022-12-05 14:20:04', '2022-12-05 14:20:04', NULL);

-- ----------------------------
-- Table structure for googleads
-- ----------------------------
DROP TABLE IF EXISTS `googleads`;
CREATE TABLE `googleads`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `direction` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `group_id` int NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of googleads
-- ----------------------------
INSERT INTO `googleads` VALUES (11, 'test', 'fff.png', '0', 1, 5, '2022-11-30 00:46:44', '2022-11-30 02:39:44', '2022-11-30 02:39:44');
INSERT INTO `googleads` VALUES (12, 'tesst2', 'Screenshot from 2022-11-30 20-33-49.png', '0', 0, 0, '2022-11-30 01:32:27', '2022-11-30 02:39:42', '2022-11-30 02:39:42');
INSERT INTO `googleads` VALUES (13, 'test3', 'Screenshot from 2022-11-30 15-01-20.png', '1', 0, 0, '2022-11-30 02:10:53', '2022-11-30 02:39:39', '2022-11-30 02:39:39');
INSERT INTO `googleads` VALUES (14, 'test1', 'Screenshot from 2022-11-30 15-50-26.png', '0', 0, 5, '2022-11-30 02:40:58', '2022-11-30 02:40:58', NULL);
INSERT INTO `googleads` VALUES (15, 'test2', 'Screenshot from 2022-11-30 15-50-26.png', '0', 0, 5, '2022-11-30 02:41:29', '2022-11-30 02:42:34', '2022-11-30 02:42:34');

-- ----------------------------
-- Table structure for group_master_admins
-- ----------------------------
DROP TABLE IF EXISTS `group_master_admins`;
CREATE TABLE `group_master_admins`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `groupmaster_id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of group_master_admins
-- ----------------------------
INSERT INTO `group_master_admins` VALUES (1, 1, 4, '2022-06-29 11:50:17', NULL, NULL);
INSERT INTO `group_master_admins` VALUES (2, 2, 4, '2022-06-29 11:51:17', NULL, NULL);
INSERT INTO `group_master_admins` VALUES (3, 3, 4, '2022-06-29 11:54:12', NULL, NULL);
INSERT INTO `group_master_admins` VALUES (4, 4, 4, '2022-06-29 11:57:19', NULL, NULL);
INSERT INTO `group_master_admins` VALUES (5, 5, 4, '2022-06-29 12:08:35', NULL, NULL);
INSERT INTO `group_master_admins` VALUES (8, 7, 4, '2022-11-18 11:35:25', NULL, NULL);

-- ----------------------------
-- Table structure for group_users
-- ----------------------------
DROP TABLE IF EXISTS `group_users`;
CREATE TABLE `group_users`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `group_id` int UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT 0 COMMENT '1=approved,2=Deny,3=Block',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of group_users
-- ----------------------------
INSERT INTO `group_users` VALUES (9, 1, 6, 0, '2022-12-01 11:36:07', '2022-12-01 11:36:07', NULL);
INSERT INTO `group_users` VALUES (10, 5, 6, 1, '2022-12-01 11:36:40', '2022-12-01 11:36:40', NULL);
INSERT INTO `group_users` VALUES (11, 5, 5, 1, '2022-12-03 13:29:37', '2022-12-03 13:29:40', NULL);
INSERT INTO `group_users` VALUES (12, 1, 5, 1, '2022-12-03 13:29:57', '2022-12-03 13:29:59', NULL);

-- ----------------------------
-- Table structure for groupmasters
-- ----------------------------
DROP TABLE IF EXISTS `groupmasters`;
CREATE TABLE `groupmasters`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `group_type` int NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT 0,
  `amount` float(10, 2) NULL DEFAULT NULL,
  `created_by` bigint NULL DEFAULT NULL,
  `terms_and_condition` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of groupmasters
-- ----------------------------
INSERT INTO `groupmasters` VALUES (1, 'Close Friends', 0, 'friend-group2.webp', 1, NULL, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2022-06-29 11:50:17', '2022-06-29 11:50:17', NULL);
INSERT INTO `groupmasters` VALUES (2, 'Daydreams Coworkers', 0, 'friend-group1.webp', 1, NULL, 1, NULL, '2022-06-29 11:51:17', '2022-06-29 11:51:17', NULL);
INSERT INTO `groupmasters` VALUES (3, 'Freelance Clients', 0, 'friend-group3 (1).webp', 1, NULL, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '2022-06-29 11:54:12', '2022-06-29 11:54:12', NULL);
INSERT INTO `groupmasters` VALUES (4, 'Running Buddies', 0, 'friend-group4.webp', 1, NULL, 1, 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2022-06-29 11:57:19', '2022-06-29 11:57:19', NULL);
INSERT INTO `groupmasters` VALUES (5, 'My Family', 1, 'avatar75-sm.jpg', 1, 10.00, 4, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2022-06-29 12:08:35', '2022-06-29 12:10:37', NULL);
INSERT INTO `groupmasters` VALUES (6, 'sdfsfsf fffff', 1, 'b1.jpg', 1, 111.00, 1, 'sdfsfsfs', '2022-11-18 09:56:30', '2022-11-18 09:58:49', '2022-11-18 09:58:49');
INSERT INTO `groupmasters` VALUES (7, 'test group store', 0, 'new-apk.jpg', 1, NULL, 1, 'sdfsfdsf', '2022-11-18 19:35:25', '2022-11-18 19:35:25', NULL);

-- ----------------------------
-- Table structure for invite_group_users
-- ----------------------------
DROP TABLE IF EXISTS `invite_group_users`;
CREATE TABLE `invite_group_users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `group_id` bigint UNSIGNED NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT 0 COMMENT '1 = join user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `token_UNIQUE`(`token` ASC) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of invite_group_users
-- ----------------------------

-- ----------------------------
-- Table structure for invite_users
-- ----------------------------
DROP TABLE IF EXISTS `invite_users`;
CREATE TABLE `invite_users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status` tinyint UNSIGNED NOT NULL DEFAULT 0 COMMENT '1 = join user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `token_UNIQUE`(`token` ASC) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of invite_users
-- ----------------------------

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED NULL DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `jobs_queue_index`(`queue` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of jobs
-- ----------------------------

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
INSERT INTO `meberships` VALUES (7, 'test membershipf dfd', 1, 123455.00, 'dsfdfsfsfsfdsfdsfsdf dddd', '2022-11-21 00:59:21', '2022-11-21 01:30:41', '2022-11-21 01:30:41');

-- ----------------------------
-- Table structure for messages
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `is_seen` tinyint NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of messages
-- ----------------------------
INSERT INTO `messages` VALUES (1, 6, 5, 'hii', 1, '2022-06-29 14:32:12', '2022-11-25 03:49:38');
INSERT INTO `messages` VALUES (2, 8, 6, 'test', 1, '2022-06-29 14:32:26', '2022-11-25 03:48:06');
INSERT INTO `messages` VALUES (3, 6, 8, 'tes', 1, '2022-06-29 14:32:56', '2022-11-25 04:38:18');
INSERT INTO `messages` VALUES (4, 8, 6, 'hello', 1, '2022-06-29 14:33:10', '2022-11-25 03:48:06');
INSERT INTO `messages` VALUES (5, 8, 6, 'how are you', 1, '2022-06-29 14:33:33', '2022-11-25 03:48:06');
INSERT INTO `messages` VALUES (6, 13, 19, 'hii', 0, '2022-06-30 08:48:28', '2022-06-30 08:48:28');
INSERT INTO `messages` VALUES (7, 19, 13, 'heloo', 0, '2022-06-30 08:50:04', '2022-06-30 08:50:04');
INSERT INTO `messages` VALUES (8, 13, 19, 'how are u', 0, '2022-06-30 08:50:23', '2022-06-30 08:50:23');
INSERT INTO `messages` VALUES (9, 19, 13, 'i am fine and u', 0, '2022-06-30 08:50:32', '2022-06-30 08:50:32');
INSERT INTO `messages` VALUES (10, 13, 19, 'i am also fine', 0, '2022-06-30 08:50:46', '2022-06-30 08:50:46');
INSERT INTO `messages` VALUES (11, 19, 13, 'good', 0, '2022-06-30 08:50:50', '2022-06-30 08:50:50');
INSERT INTO `messages` VALUES (12, 19, 13, 'what r doing', 0, '2022-06-30 08:50:58', '2022-06-30 08:50:58');
INSERT INTO `messages` VALUES (13, 13, 19, 'nothing', 0, '2022-06-30 08:51:07', '2022-06-30 08:51:07');
INSERT INTO `messages` VALUES (14, 19, 13, 'really', 0, '2022-06-30 08:51:15', '2022-06-30 08:51:15');
INSERT INTO `messages` VALUES (15, 13, 19, 'ya', 0, '2022-06-30 08:51:18', '2022-06-30 08:51:18');
INSERT INTO `messages` VALUES (16, 19, 13, 'so can we meet today at 5 pm', 0, '2022-06-30 08:51:33', '2022-06-30 08:51:33');
INSERT INTO `messages` VALUES (17, 13, 19, 'why', 0, '2022-06-30 08:51:37', '2022-06-30 08:51:37');
INSERT INTO `messages` VALUES (18, 19, 13, 'coffee', 0, '2022-06-30 08:51:43', '2022-06-30 08:51:43');
INSERT INTO `messages` VALUES (19, 19, 13, 'i like coffe', 0, '2022-06-30 08:51:50', '2022-06-30 08:51:50');
INSERT INTO `messages` VALUES (20, 13, 19, 'i don\'t like coffee\\', 0, '2022-06-30 08:52:01', '2022-06-30 08:52:01');
INSERT INTO `messages` VALUES (21, 13, 19, 'forgot your plan', 0, '2022-06-30 08:52:10', '2022-06-30 08:52:10');
INSERT INTO `messages` VALUES (22, 19, 13, 'okay cool', 0, '2022-06-30 08:52:20', '2022-06-30 08:52:20');
INSERT INTO `messages` VALUES (23, 13, 19, 'hmm', 0, '2022-06-30 08:52:26', '2022-06-30 08:52:26');
INSERT INTO `messages` VALUES (27, 6, 5, 'How are you doing today?', 1, '2022-11-26 17:12:02', '2022-11-27 01:12:02');
INSERT INTO `messages` VALUES (48, 5, 6, 'fine thank you', 1, '2022-11-24 20:43:11', '2022-11-27 00:39:09');
INSERT INTO `messages` VALUES (49, 5, 6, 'if you are performing queries which don\'t return data, then using a SELECT query will result in errors. For example, if you want to start the auto-increment ID of a MySQL table to something other than zero, we can use the', 1, '2022-11-24 20:43:42', '2022-11-27 00:39:09');
INSERT INTO `messages` VALUES (50, 8, 6, 'talkkkkk', 1, '2022-11-24 20:44:09', '2022-11-27 00:38:59');
INSERT INTO `messages` VALUES (56, 5, 6, 'I am good', 0, '2022-11-26 17:17:49', '2022-11-26 18:47:58');
INSERT INTO `messages` VALUES (57, 6, 5, 'What matter', 1, '2022-11-26 17:17:58', '2022-11-27 01:18:26');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for newsfeed_follows
-- ----------------------------
DROP TABLE IF EXISTS `newsfeed_follows`;
CREATE TABLE `newsfeed_follows`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `newsfeed_id` int NOT NULL,
  `user_id` int NOT NULL,
  `following_id` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of newsfeed_follows
-- ----------------------------

-- ----------------------------
-- Table structure for newsfeed_gallaries
-- ----------------------------
DROP TABLE IF EXISTS `newsfeed_gallaries`;
CREATE TABLE `newsfeed_gallaries`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `newsfeed_id` int NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of newsfeed_gallaries
-- ----------------------------
INSERT INTO `newsfeed_gallaries` VALUES (1, 1, '1655716501413a2NX6MXL.jpg', 1, '2022-06-19 08:15:01', '2022-06-19 08:15:01', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (2, 3, '1655716656guru-h.webp', 1, '2022-06-19 08:17:36', '2022-06-19 08:17:36', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (3, 5, '1656660847music-bottom.webp', 1, '2022-06-30 06:34:07', '2022-06-30 06:34:07', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (4, 7, '1656661478post1.webp', 1, '2022-06-30 06:44:38', '2022-06-30 06:44:38', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (5, 8, '1656661718post2.webp', 1, '2022-06-30 06:48:38', '2022-06-30 06:48:38', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (6, 9, '1656661743post3.webp', 1, '2022-06-30 06:49:03', '2022-06-30 06:49:03', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (7, 11, '1656661994post4.webp', 1, '2022-06-30 06:53:14', '2022-06-30 06:53:14', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (8, 12, '1656663418post6.webp', 1, '2022-06-30 07:16:58', '2022-06-30 07:16:58', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (9, 13, '1656663434post7.webp', 1, '2022-06-30 07:17:14', '2022-06-30 07:17:14', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (10, 15, '1656668095post8.webp', 1, '2022-06-30 08:34:55', '2022-06-30 08:34:55', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (11, 16, '1656668161post9.webp', 1, '2022-06-30 08:36:01', '2022-06-30 08:36:01', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (12, 17, '1656668439post-photo7.webp', 1, '2022-06-30 08:40:39', '2022-06-30 08:40:39', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (13, 18, '1656668496post-photo2.webp', 1, '2022-06-30 08:41:36', '2022-06-30 08:41:36', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (14, 19, '1657031260post-photo4.webp', 1, '2022-07-04 13:27:40', '2022-07-04 13:27:40', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (15, 20, '1661446884bluedemobutton.jpg', 1, '2022-08-24 16:01:24', '2022-08-24 16:01:24', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (16, 22, '1668828730pl-logo.png', 1, '2022-11-18 09:32:10', '2022-11-18 09:32:10', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (17, 23, '1668864739app_icon.png', 1, '2022-11-18 19:32:19', '2022-11-18 19:32:19', NULL);
INSERT INTO `newsfeed_gallaries` VALUES (18, 24, '1669037350WhatsApp Image 2022-10-18 at 18.53.39.jpg', 1, '2022-11-20 19:29:10', '2022-11-20 19:29:10', NULL);

-- ----------------------------
-- Table structure for newsfeedcommentlikes
-- ----------------------------
DROP TABLE IF EXISTS `newsfeedcommentlikes`;
CREATE TABLE `newsfeedcommentlikes`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `newsfeed_id` int NOT NULL,
  `comment_id` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of newsfeedcommentlikes
-- ----------------------------
INSERT INTO `newsfeedcommentlikes` VALUES (1, 1, 22, 2, 1, '2022-11-18 09:44:09', '2022-11-18 09:44:11', '2022-11-18 09:44:11');
INSERT INTO `newsfeedcommentlikes` VALUES (2, 1, 22, 2, 1, '2022-11-18 09:44:12', '2022-11-18 09:44:15', '2022-11-18 09:44:15');
INSERT INTO `newsfeedcommentlikes` VALUES (3, 1, 22, 2, 1, '2022-11-18 09:44:16', '2022-11-18 09:44:17', '2022-11-18 09:44:17');
INSERT INTO `newsfeedcommentlikes` VALUES (4, 1, 22, 2, 1, '2022-11-18 09:44:18', '2022-11-18 09:48:34', '2022-11-18 09:48:34');
INSERT INTO `newsfeedcommentlikes` VALUES (5, 1, 22, 2, 1, '2022-11-18 09:48:35', '2022-11-18 09:48:35', '2022-11-18 09:48:35');
INSERT INTO `newsfeedcommentlikes` VALUES (6, 1, 22, 2, 1, '2022-11-18 09:49:43', '2022-11-18 09:49:45', '2022-11-18 09:49:45');
INSERT INTO `newsfeedcommentlikes` VALUES (7, 1, 20, 1, 1, '2022-11-18 09:49:48', '2022-11-18 09:49:58', '2022-11-18 09:49:58');
INSERT INTO `newsfeedcommentlikes` VALUES (8, 1, 20, 1, 1, '2022-11-18 09:50:01', '2022-11-18 09:50:02', '2022-11-18 09:50:02');
INSERT INTO `newsfeedcommentlikes` VALUES (9, 1, 20, 1, 1, '2022-11-18 09:50:10', '2022-11-18 09:50:10', NULL);

-- ----------------------------
-- Table structure for newsfeedcommentreplies
-- ----------------------------
DROP TABLE IF EXISTS `newsfeedcommentreplies`;
CREATE TABLE `newsfeedcommentreplies`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `newsfeed_id` int NOT NULL,
  `comment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `reply_comment` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of newsfeedcommentreplies
-- ----------------------------
INSERT INTO `newsfeedcommentreplies` VALUES (1, 22, 2, 1, 'This si test reply', 1, '2022-11-18 09:44:48', '2022-11-18 09:44:48', NULL);

-- ----------------------------
-- Table structure for newsfeedcomments
-- ----------------------------
DROP TABLE IF EXISTS `newsfeedcomments`;
CREATE TABLE `newsfeedcomments`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `newsfeed_id` int NOT NULL,
  `comment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of newsfeedcomments
-- ----------------------------
INSERT INTO `newsfeedcomments` VALUES (1, 24, 20, 'Nice article', 1, '2022-08-24 16:01:41', '2022-08-24 16:01:41', NULL);
INSERT INTO `newsfeedcomments` VALUES (2, 1, 22, 'This is test comment', 1, '2022-11-18 09:42:20', '2022-11-18 09:42:20', NULL);
INSERT INTO `newsfeedcomments` VALUES (3, 26, 18, 'dsfsfdf', 1, '2022-11-18 17:55:58', '2022-11-18 17:55:58', NULL);
INSERT INTO `newsfeedcomments` VALUES (4, 26, 18, 'dsddd', 1, '2022-11-18 19:43:26', '2022-11-18 19:43:35', '2022-11-18 19:43:35');
INSERT INTO `newsfeedcomments` VALUES (5, 26, 17, 'qqqqqq', 1, '2022-11-18 19:43:55', '2022-11-18 19:43:55', NULL);
INSERT INTO `newsfeedcomments` VALUES (6, 26, 17, 'ioppp', 1, '2022-11-18 19:44:27', '2022-11-18 19:44:27', NULL);

-- ----------------------------
-- Table structure for newsfeedlikes
-- ----------------------------
DROP TABLE IF EXISTS `newsfeedlikes`;
CREATE TABLE `newsfeedlikes`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `newsfeed_id` int NOT NULL,
  `user_id` int NOT NULL,
  `likes_id` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 82 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of newsfeedlikes
-- ----------------------------
INSERT INTO `newsfeedlikes` VALUES (1, 3, 6, 6, 1, '2022-06-19 08:18:22', '2022-06-19 08:18:22', NULL);
INSERT INTO `newsfeedlikes` VALUES (2, 1, 5, 6, 1, '2022-06-19 08:20:09', '2022-12-07 18:45:08', '2022-12-07 18:45:08');
INSERT INTO `newsfeedlikes` VALUES (3, 1, 5, 4, 1, '2022-06-29 14:03:56', '2022-06-29 14:03:56', NULL);
INSERT INTO `newsfeedlikes` VALUES (4, 5, 19, 19, 1, '2022-06-30 06:34:23', '2022-06-30 06:34:23', NULL);
INSERT INTO `newsfeedlikes` VALUES (5, 4, 19, 19, 1, '2022-06-30 06:34:25', '2022-06-30 06:34:25', NULL);
INSERT INTO `newsfeedlikes` VALUES (6, 5, 19, 18, 1, '2022-06-30 06:36:22', '2022-06-30 06:36:22', NULL);
INSERT INTO `newsfeedlikes` VALUES (7, 4, 19, 18, 1, '2022-06-30 06:36:25', '2022-06-30 06:36:25', NULL);
INSERT INTO `newsfeedlikes` VALUES (8, 6, 18, 18, 1, '2022-06-30 06:36:59', '2022-06-30 06:36:59', NULL);
INSERT INTO `newsfeedlikes` VALUES (9, 7, 18, 18, 1, '2022-06-30 06:44:42', '2022-06-30 06:44:42', NULL);
INSERT INTO `newsfeedlikes` VALUES (10, 7, 18, 17, 1, '2022-06-30 06:45:37', '2022-06-30 06:47:39', '2022-06-30 06:47:39');
INSERT INTO `newsfeedlikes` VALUES (11, 6, 18, 17, 1, '2022-06-30 06:45:39', '2022-06-30 06:49:22', '2022-06-30 06:49:22');
INSERT INTO `newsfeedlikes` VALUES (12, 5, 19, 17, 1, '2022-06-30 06:45:41', '2022-06-30 06:45:41', NULL);
INSERT INTO `newsfeedlikes` VALUES (13, 4, 19, 17, 1, '2022-06-30 06:45:44', '2022-06-30 06:45:44', NULL);
INSERT INTO `newsfeedlikes` VALUES (14, 3, 6, 17, 1, '2022-06-30 06:45:46', '2022-06-30 06:45:46', NULL);
INSERT INTO `newsfeedlikes` VALUES (15, 2, 6, 17, 1, '2022-06-30 06:45:48', '2022-06-30 06:45:48', NULL);
INSERT INTO `newsfeedlikes` VALUES (16, 1, 5, 17, 1, '2022-06-30 06:45:50', '2022-06-30 06:45:50', NULL);
INSERT INTO `newsfeedlikes` VALUES (17, 7, 18, 17, 1, '2022-06-30 06:47:43', '2022-06-30 06:49:15', '2022-06-30 06:49:15');
INSERT INTO `newsfeedlikes` VALUES (18, 8, 17, 17, 1, '2022-06-30 06:48:42', '2022-06-30 06:48:42', NULL);
INSERT INTO `newsfeedlikes` VALUES (19, 9, 17, 17, 1, '2022-06-30 06:49:09', '2022-06-30 06:49:09', NULL);
INSERT INTO `newsfeedlikes` VALUES (20, 7, 18, 17, 1, '2022-06-30 06:49:20', '2022-06-30 06:49:20', NULL);
INSERT INTO `newsfeedlikes` VALUES (21, 6, 18, 17, 1, '2022-06-30 06:49:24', '2022-06-30 06:49:24', NULL);
INSERT INTO `newsfeedlikes` VALUES (22, 9, 17, 16, 1, '2022-06-30 06:51:48', '2022-06-30 06:51:48', NULL);
INSERT INTO `newsfeedlikes` VALUES (23, 8, 17, 16, 1, '2022-06-30 06:51:50', '2022-06-30 06:51:50', NULL);
INSERT INTO `newsfeedlikes` VALUES (24, 7, 18, 16, 1, '2022-06-30 06:51:52', '2022-06-30 06:51:52', NULL);
INSERT INTO `newsfeedlikes` VALUES (25, 6, 18, 16, 1, '2022-06-30 06:51:54', '2022-06-30 06:51:54', NULL);
INSERT INTO `newsfeedlikes` VALUES (26, 5, 19, 16, 1, '2022-06-30 06:51:57', '2022-06-30 06:51:57', NULL);
INSERT INTO `newsfeedlikes` VALUES (27, 4, 19, 16, 1, '2022-06-30 06:51:58', '2022-06-30 06:51:58', NULL);
INSERT INTO `newsfeedlikes` VALUES (28, 3, 6, 16, 1, '2022-06-30 06:52:02', '2022-06-30 06:52:02', NULL);
INSERT INTO `newsfeedlikes` VALUES (29, 1, 5, 16, 1, '2022-06-30 06:52:09', '2022-06-30 06:52:09', NULL);
INSERT INTO `newsfeedlikes` VALUES (30, 11, 16, 16, 1, '2022-06-30 06:53:19', '2022-06-30 06:53:19', NULL);
INSERT INTO `newsfeedlikes` VALUES (31, 10, 16, 16, 1, '2022-06-30 06:53:20', '2022-06-30 06:53:20', NULL);
INSERT INTO `newsfeedlikes` VALUES (32, 13, 15, 15, 1, '2022-06-30 07:17:22', '2022-06-30 07:17:22', NULL);
INSERT INTO `newsfeedlikes` VALUES (33, 12, 15, 15, 1, '2022-06-30 07:17:24', '2022-06-30 07:17:24', NULL);
INSERT INTO `newsfeedlikes` VALUES (34, 11, 16, 15, 1, '2022-06-30 07:17:26', '2022-06-30 07:17:26', NULL);
INSERT INTO `newsfeedlikes` VALUES (35, 10, 16, 15, 1, '2022-06-30 07:17:28', '2022-06-30 07:17:28', NULL);
INSERT INTO `newsfeedlikes` VALUES (36, 9, 17, 15, 1, '2022-06-30 07:17:30', '2022-06-30 07:17:30', NULL);
INSERT INTO `newsfeedlikes` VALUES (37, 8, 17, 15, 1, '2022-06-30 07:17:32', '2022-06-30 07:17:32', NULL);
INSERT INTO `newsfeedlikes` VALUES (38, 7, 18, 15, 1, '2022-06-30 07:17:34', '2022-06-30 07:17:34', NULL);
INSERT INTO `newsfeedlikes` VALUES (39, 6, 18, 15, 1, '2022-06-30 07:17:36', '2022-06-30 07:17:36', NULL);
INSERT INTO `newsfeedlikes` VALUES (40, 5, 19, 15, 1, '2022-06-30 07:17:38', '2022-06-30 07:17:38', NULL);
INSERT INTO `newsfeedlikes` VALUES (41, 3, 6, 15, 1, '2022-06-30 07:17:44', '2022-06-30 07:17:44', NULL);
INSERT INTO `newsfeedlikes` VALUES (42, 2, 6, 15, 1, '2022-06-30 07:17:46', '2022-06-30 07:17:46', NULL);
INSERT INTO `newsfeedlikes` VALUES (43, 1, 5, 15, 1, '2022-06-30 07:17:52', '2022-06-30 07:17:52', NULL);
INSERT INTO `newsfeedlikes` VALUES (44, 12, 15, 14, 1, '2022-06-30 08:35:05', '2022-06-30 08:35:05', NULL);
INSERT INTO `newsfeedlikes` VALUES (45, 13, 15, 14, 1, '2022-06-30 08:35:08', '2022-06-30 08:35:08', NULL);
INSERT INTO `newsfeedlikes` VALUES (46, 14, 14, 14, 1, '2022-06-30 08:35:10', '2022-06-30 08:35:10', NULL);
INSERT INTO `newsfeedlikes` VALUES (47, 11, 16, 14, 1, '2022-06-30 08:35:14', '2022-06-30 08:35:14', NULL);
INSERT INTO `newsfeedlikes` VALUES (48, 10, 16, 14, 1, '2022-06-30 08:35:16', '2022-06-30 08:35:16', NULL);
INSERT INTO `newsfeedlikes` VALUES (49, 9, 17, 14, 1, '2022-06-30 08:35:18', '2022-06-30 08:35:18', NULL);
INSERT INTO `newsfeedlikes` VALUES (50, 8, 17, 14, 1, '2022-06-30 08:35:20', '2022-06-30 08:35:20', NULL);
INSERT INTO `newsfeedlikes` VALUES (51, 7, 18, 14, 1, '2022-06-30 08:35:23', '2022-06-30 08:35:23', NULL);
INSERT INTO `newsfeedlikes` VALUES (52, 6, 18, 14, 1, '2022-06-30 08:35:26', '2022-06-30 08:35:26', NULL);
INSERT INTO `newsfeedlikes` VALUES (53, 5, 19, 14, 1, '2022-06-30 08:35:28', '2022-06-30 08:35:28', NULL);
INSERT INTO `newsfeedlikes` VALUES (54, 4, 19, 14, 1, '2022-06-30 08:35:30', '2022-06-30 08:35:30', NULL);
INSERT INTO `newsfeedlikes` VALUES (55, 3, 6, 14, 1, '2022-06-30 08:35:32', '2022-06-30 08:35:32', NULL);
INSERT INTO `newsfeedlikes` VALUES (56, 2, 6, 14, 1, '2022-06-30 08:35:34', '2022-06-30 08:35:34', NULL);
INSERT INTO `newsfeedlikes` VALUES (57, 1, 5, 14, 1, '2022-06-30 08:35:37', '2022-06-30 08:35:37', NULL);
INSERT INTO `newsfeedlikes` VALUES (58, 16, 14, 13, 1, '2022-06-30 08:39:00', '2022-06-30 08:39:00', NULL);
INSERT INTO `newsfeedlikes` VALUES (59, 15, 14, 13, 1, '2022-06-30 08:39:03', '2022-06-30 08:39:03', NULL);
INSERT INTO `newsfeedlikes` VALUES (60, 14, 14, 13, 1, '2022-06-30 08:39:13', '2022-06-30 08:39:13', NULL);
INSERT INTO `newsfeedlikes` VALUES (61, 13, 15, 13, 1, '2022-06-30 08:39:15', '2022-06-30 08:39:15', NULL);
INSERT INTO `newsfeedlikes` VALUES (62, 12, 15, 13, 1, '2022-06-30 08:39:17', '2022-06-30 08:39:17', NULL);
INSERT INTO `newsfeedlikes` VALUES (63, 11, 16, 13, 1, '2022-06-30 08:39:20', '2022-06-30 08:39:20', NULL);
INSERT INTO `newsfeedlikes` VALUES (64, 10, 16, 13, 1, '2022-06-30 08:39:22', '2022-06-30 08:39:22', NULL);
INSERT INTO `newsfeedlikes` VALUES (65, 9, 17, 13, 1, '2022-06-30 08:39:25', '2022-06-30 08:39:25', NULL);
INSERT INTO `newsfeedlikes` VALUES (66, 8, 17, 13, 1, '2022-06-30 08:39:27', '2022-06-30 08:39:27', NULL);
INSERT INTO `newsfeedlikes` VALUES (67, 7, 18, 13, 1, '2022-06-30 08:39:29', '2022-06-30 08:39:29', NULL);
INSERT INTO `newsfeedlikes` VALUES (68, 5, 19, 13, 1, '2022-06-30 08:39:32', '2022-06-30 08:39:32', NULL);
INSERT INTO `newsfeedlikes` VALUES (69, 4, 19, 13, 1, '2022-06-30 08:39:34', '2022-06-30 08:39:34', NULL);
INSERT INTO `newsfeedlikes` VALUES (70, 3, 6, 13, 1, '2022-06-30 08:39:36', '2022-06-30 08:39:36', NULL);
INSERT INTO `newsfeedlikes` VALUES (71, 2, 6, 13, 1, '2022-06-30 08:39:42', '2022-06-30 08:39:42', NULL);
INSERT INTO `newsfeedlikes` VALUES (72, 1, 5, 13, 1, '2022-06-30 08:39:52', '2022-06-30 08:39:52', NULL);
INSERT INTO `newsfeedlikes` VALUES (73, 17, 13, 13, 1, '2022-06-30 08:40:45', '2022-06-30 08:40:45', NULL);
INSERT INTO `newsfeedlikes` VALUES (74, 18, 13, 13, 1, '2022-06-30 08:41:41', '2022-06-30 08:41:41', NULL);
INSERT INTO `newsfeedlikes` VALUES (75, 14, 14, 4, 1, '2022-07-04 06:32:07', '2022-07-04 07:49:26', '2022-07-04 07:49:26');
INSERT INTO `newsfeedlikes` VALUES (76, 14, 14, 4, 1, '2022-07-04 07:49:28', '2022-07-04 07:49:28', NULL);
INSERT INTO `newsfeedlikes` VALUES (77, 19, 8, 8, 1, '2022-10-10 11:31:07', '2022-10-10 11:31:07', NULL);
INSERT INTO `newsfeedlikes` VALUES (78, 22, 1, 1, 1, '2022-11-18 09:41:36', '2022-11-18 09:41:36', NULL);
INSERT INTO `newsfeedlikes` VALUES (79, 24, 15, 6, 1, '2022-12-05 15:48:50', '2022-12-05 15:48:50', '2022-12-05 15:48:50');
INSERT INTO `newsfeedlikes` VALUES (80, 24, 15, 6, 1, '2022-12-05 15:48:52', '2022-12-05 15:48:53', '2022-12-05 15:48:53');
INSERT INTO `newsfeedlikes` VALUES (81, 24, 15, 6, 1, '2022-12-05 15:48:57', '2022-12-05 15:48:59', '2022-12-05 15:48:59');

-- ----------------------------
-- Table structure for newsfeedreplycommentlikes
-- ----------------------------
DROP TABLE IF EXISTS `newsfeedreplycommentlikes`;
CREATE TABLE `newsfeedreplycommentlikes`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `newsfeed_id` int NOT NULL,
  `comment_id` int NOT NULL,
  `replycomment_id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of newsfeedreplycommentlikes
-- ----------------------------

-- ----------------------------
-- Table structure for newsfeeds
-- ----------------------------
DROP TABLE IF EXISTS `newsfeeds`;
CREATE TABLE `newsfeeds`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `group_id` int NULL DEFAULT NULL,
  `text` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of newsfeeds
-- ----------------------------
INSERT INTO `newsfeeds` VALUES (1, 5, NULL, 'Consequat tincidunt voluptates occaecat, tincidunt corporis, error consequat totam illum pede consectetur, tempore molestias a non sit, quasi! Id beatae est non tortor! Aperiam magni phasellus, incididunt odio vestibulum consectetur, auctor natus, pulvinar neque wisi! Nisi nascetur aliquip quasi, diamlorem placerat facilisi ipsum aspernatur cras mollitia phasellus repudiandae, quod varius, eos harum diamlorem per voluptatum, ipsa dolorem corporis molestie pede, dolores debitis parturient, facilisi pharetra hic error natus! Volutpat laboriosam. Maecenas aliquid veniam id mollit sodales lorem dolor ipsam aperiam feugiat maiores ipsa ac? Montes, sit excepteur suscipit incidunt officia elementum! Lorem litora occaecat dignissimos repellendus, habitant tempus? Ratione tincidunt.', 1, '2022-06-19 08:15:01', '2022-06-19 08:15:01', NULL);
INSERT INTO `newsfeeds` VALUES (2, 6, NULL, 'Jayne Atkinson is on vacation — somewhere in Baltimore, she says — but her off-duty schedule still includes a phone call with her soul coach, an alternative healer named Denise Lynn. “Close your eyes for a minute, and I’m going to have you look in your body and find the space that doesn’t feel safe to live in that feels — well, it doesn’t feel safe to go,” Lynn, who is based in New York City, instructs Atkinson during the session. “And I want you to tell me what color it is there.”\r\n\r\n“It’s pretty black, honestly,” Atkinson says softly.\r\n\r\n“And how much water could it hold?” Lynn continues in a soothing, melodic voice.', 1, '2022-06-19 08:16:50', '2022-06-19 08:16:50', NULL);
INSERT INTO `newsfeeds` VALUES (3, 6, NULL, 'Jayne Atkinson is on vacation — somewhere in Baltimore, she says — but her off-duty schedule still includes a phone call with her soul coach, an alternative healer named Denise Lynn. “Close your eyes for a minute, and I’m going to have you look in your body and find the space that doesn’t feel safe to live in that feels — well, it doesn’t feel safe to go,” Lynn, who is based in New York City, instructs Atkinson during the session. “And I want you to tell me what color it is there.”\r\n\r\n“It’s pretty black, honestly,” Atkinson says softly.\r\n\r\n“And how much water could it hold?” Lynn continues in a soothing, melodic voice.', 1, '2022-06-19 08:17:36', '2022-06-19 08:17:36', NULL);
INSERT INTO `newsfeeds` VALUES (4, 19, NULL, 'Hey Cindi, you should really check out this new song by Iron Maid. The next time they come to the city we should totally go!', 1, '2022-06-30 06:30:36', '2022-06-30 06:30:36', NULL);
INSERT INTO `newsfeeds` VALUES (5, 19, NULL, 'Listen and Share Music!\r\nHere you’ll be able to manage your Spotify playlist widget and listen all the saved playlists from your friends! Friends playlists will update when they update their Olympus playlists, that way you can build awesome playlists to share with your friends every day and they will always be updated.', 1, '2022-06-30 06:34:07', '2022-06-30 06:34:07', NULL);
INSERT INTO `newsfeeds` VALUES (6, 18, NULL, 'Ratione voluptatem sequi en lod nesciunt. Neque porro quisquam est, quinder dolorem ipsum quia dolor sit amet, consectetur adipisci velit en lorem ipsum duis aute irure dolor in reprehenderit in voluptate velit esse cillum.', 1, '2022-06-30 06:36:55', '2022-06-30 06:36:55', NULL);
INSERT INTO `newsfeeds` VALUES (7, 18, NULL, 'Here’s the Featured Urban photo of August!\r\nHere’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.', 1, '2022-06-30 06:44:38', '2022-06-30 06:44:38', NULL);
INSERT INTO `newsfeeds` VALUES (8, 17, NULL, 'Olympus Network added new photo filters!\r\nHere’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.', 1, '2022-06-30 06:48:38', '2022-06-30 06:48:38', NULL);
INSERT INTO `newsfeeds` VALUES (9, 17, NULL, 'INSPIRATION\r\nTake a look at these truly awesome worspaces\r\nHere’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.', 1, '2022-06-30 06:49:03', '2022-06-30 06:49:03', NULL);
INSERT INTO `newsfeeds` VALUES (10, 16, NULL, 'Here’s the Featured Urban photo of July!\r\nHere’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.', 1, '2022-06-30 06:52:57', '2022-06-30 06:52:57', NULL);
INSERT INTO `newsfeeds` VALUES (11, 16, NULL, 'Olympus’s family picnic was a success!\r\nHere’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.', 1, '2022-06-30 06:53:14', '2022-06-30 06:53:14', NULL);
INSERT INTO `newsfeeds` VALUES (12, 15, NULL, 'Olympians: Journal of my backpacking days\r\nHere’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.', 1, '2022-06-30 07:16:58', '2022-06-30 07:16:58', NULL);
INSERT INTO `newsfeeds` VALUES (13, 15, NULL, 'Here are the best tattoos of our community\r\nHere’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.', 1, '2022-06-30 07:17:14', '2022-06-30 07:17:14', NULL);
INSERT INTO `newsfeeds` VALUES (14, 14, NULL, 'Take a look to the coolest beaches of the world\r\nHere’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.', 1, '2022-06-30 08:33:53', '2022-06-30 08:33:53', NULL);
INSERT INTO `newsfeeds` VALUES (15, 14, NULL, NULL, 1, '2022-06-30 08:34:55', '2022-06-30 08:34:55', NULL);
INSERT INTO `newsfeeds` VALUES (16, 14, NULL, 'Check out this 10 yummy breakfast recipes\r\nHere’s a photo from last month’s photoshoot. We got really awesome shots for the new catalog.', 1, '2022-06-30 08:36:01', '2022-06-30 08:36:01', NULL);
INSERT INTO `newsfeeds` VALUES (17, 13, NULL, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia erunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.', 1, '2022-06-30 08:40:39', '2022-06-30 08:40:39', NULL);
INSERT INTO `newsfeeds` VALUES (18, 13, NULL, 'Ratione voluptatem sequi en lod nesciunt. Neque porro quisquam est, quinder dolorem ipsum quia dolor sit amet, consectetur adipisci velit en lorem ipsum duis aute irure dolor in reprehenderit in voluptate velit esse cillum.', 1, '2022-06-30 08:41:36', '2022-06-30 08:41:36', NULL);
INSERT INTO `newsfeeds` VALUES (19, 8, NULL, 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia erunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.', 1, '2022-07-04 13:27:40', '2022-07-04 13:27:40', NULL);
INSERT INTO `newsfeeds` VALUES (20, 24, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, '2022-08-24 16:01:24', '2022-08-24 16:01:24', NULL);
INSERT INTO `newsfeeds` VALUES (21, 26, NULL, 'ljljlj l lj l', 1, '2022-11-18 01:53:21', '2022-11-18 01:53:21', NULL);
INSERT INTO `newsfeeds` VALUES (22, 1, NULL, 'This is the test post for creating', 1, '2022-11-18 09:32:10', '2022-11-18 09:32:10', NULL);
INSERT INTO `newsfeeds` VALUES (23, 26, NULL, 'hello world', 1, '2022-11-18 19:32:19', '2022-11-18 19:32:19', NULL);
INSERT INTO `newsfeeds` VALUES (24, 15, NULL, 'Global news feed posting', 1, '2022-11-20 19:29:10', '2022-11-20 19:29:10', NULL);

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `receiver_id` int NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `is_seen` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of notifications
-- ----------------------------
INSERT INTO `notifications` VALUES (1, 13, 6, 'In this final step, we will be creating the form that accepts the card details along with the some validation rules to validate the card information.', 0, '2022-11-26 17:55:15', '2022-11-26 17:55:15');
INSERT INTO `notifications` VALUES (2, 17, 6, 'Test notification 1', 0, '2022-11-26 17:55:55', '2022-11-26 17:55:55');
INSERT INTO `notifications` VALUES (3, 8, 6, 'Test test notifi', 1, '2022-11-26 17:56:44', '2022-12-06 21:11:40');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('nxwang00@gmail.com', 'xwv7AYWnT6aTrZ0eyqVsTRo35iUcLnrq4SgAgyImKfHan7aMlZEEx755v7mIp9FK', '2022-11-22 01:10:49');

-- ----------------------------
-- Table structure for payment_settings
-- ----------------------------
DROP TABLE IF EXISTS `payment_settings`;
CREATE TABLE `payment_settings`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `stripe_key` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stripe_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of payment_settings
-- ----------------------------
INSERT INTO `payment_settings` VALUES (1, 1, 'pk_test_51A04U6Kp4sYya5G5TaAKkvJxNgOhUEJLc2LhnPKTV9U18T22aexd8ABnCYfUyosUPXHcdRtyGPEOexqvDbmYnlrP00rVbHSjkS', 'sk_test_51A04U6Kp4sYya5G5ILp9L8DkBFBUBv6YJJsXw8AKOmeghcosAMlv6dMwKzsOvHfomPoADBDB06OdIYGMe7ODQc4s00ksxkMr7k', '2022-06-27 03:51:57', '2022-11-20 01:55:01', NULL);
INSERT INTO `payment_settings` VALUES (2, 6, 'pk_test_51A04U6Kp4sYya5G5TaAKkvJxNgOhUEJLc2LhnPKTV9U18T22aexd8ABnCYfUyosUPXHcdRtyGPEOexqvDbmYnlrP00rVbHSjkS', 'sk_test_51A04U6Kp4sYya5G5ILp9L8DkBFBUBv6YJJsXw8AKOmeghcosAMlv6dMwKzsOvHfomPoADBDB06OdIYGMe7ODQc4s00ksxkMr7k', '2022-06-27 03:59:53', '2022-06-27 04:01:17', NULL);
INSERT INTO `payment_settings` VALUES (3, 4, 'pk_test_51A04U6Kp4sYya5G5TaAKkvJxNgOhUEJLc2LhnPKTV9U18T22aexd8ABnCYfUyosUPXHcdRtyGPEOexqvDbmYnlrP00rVbHSjkS', 'sk_test_51A04U6Kp4sYya5G5ILp9L8DkBFBUBv6YJJsXw8AKOmeghcosAMlv6dMwKzsOvHfomPoADBDB06OdIYGMe7ODQc4s00ksxkMr7k', '2022-06-29 13:03:47', '2022-06-29 13:03:47', NULL);

-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NULL DEFAULT NULL,
  `email_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `token_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `charge_id` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `currency` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 1,
  `payment_method` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total` float(10, 2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of payments
-- ----------------------------
INSERT INTO `payments` VALUES (1, 5, NULL, 'tok_1LGO2XKp4sYya5G5ktuUQkYL', 'ch_3LGO2YKp4sYya5G50eLcXqqy', 'USD', 1, 'Stripe', 20.00, 1, '2022-06-29 13:08:19', '2022-06-29 13:08:19', NULL);
INSERT INTO `payments` VALUES (2, 26, NULL, 'tok_1M6yz6DKz5nUIJQwY5V1HSfw', 'ch_3M6yz8DKz5nUIJQw0sgPgJ8U', 'USD', 1, 'Stripe', 50.00, 1, '2022-11-21 22:06:10', '2022-11-21 22:06:10', NULL);
INSERT INTO `payments` VALUES (3, 26, NULL, 'tok_1M6z9vDKz5nUIJQw7PDiNIkU', 'ch_3M6z9xDKz5nUIJQw1MIuBvBV', 'USD', 1, 'Stripe', 75.00, 1, '2022-11-21 22:17:21', '2022-11-21 22:17:21', NULL);
INSERT INTO `payments` VALUES (4, 6, NULL, 'tok_1MAGtmDKz5nUIJQwuChW3lxa', 'ch_3MAGtnDKz5nUIJQw1CohnO72', 'USD', 1, 'Stripe', 10.00, 1, '2022-12-01 08:50:17', '2022-12-01 08:50:17', NULL);
INSERT INTO `payments` VALUES (5, 6, NULL, 'tok_1MAJUnDKz5nUIJQwTa6rsI1l', 'ch_3MAJUoDKz5nUIJQw2GeC5j1R', 'USD', 1, 'Stripe', 10.00, 1, '2022-12-01 11:36:40', '2022-12-01 11:36:40', NULL);
INSERT INTO `payments` VALUES (6, 7, NULL, 'tok_1MC1GPDKz5nUIJQwoSuao3Fz', 'ch_3MC1GSDKz5nUIJQw2LwdTFEE', 'USD', 1, 'Stripe', 100.00, 1, '2022-12-06 13:32:54', '2022-12-06 13:32:54', NULL);

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for photos
-- ----------------------------
DROP TABLE IF EXISTS `photos`;
CREATE TABLE `photos`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `group_id` int NOT NULL,
  `creater_id` int NOT NULL,
  `visible` tinyint NOT NULL COMMENT '0:public, 1:group',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of photos
-- ----------------------------
INSERT INTO `photos` VALUES (1, 'CloseFriends_1670179070.jpg', 5, 6, 0);
INSERT INTO `photos` VALUES (2, 'RunningBuddies_1670183145.jpg', 5, 6, 0);

-- ----------------------------
-- Table structure for polls
-- ----------------------------
DROP TABLE IF EXISTS `polls`;
CREATE TABLE `polls`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `question` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `option_a` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `option_b` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `option_c` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `option_d` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `polls_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of polls
-- ----------------------------

-- ----------------------------
-- Table structure for pollsresults
-- ----------------------------
DROP TABLE IF EXISTS `pollsresults`;
CREATE TABLE `pollsresults`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `polls_id` int NOT NULL,
  `polls_result` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pollsresults
-- ----------------------------

-- ----------------------------
-- Table structure for product_checkouts
-- ----------------------------
DROP TABLE IF EXISTS `product_checkouts`;
CREATE TABLE `product_checkouts`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_id` bigint NOT NULL,
  `payment_id` bigint NOT NULL,
  `product_id` bigint NOT NULL,
  `amount` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of product_checkouts
-- ----------------------------
INSERT INTO `product_checkouts` VALUES (1, 5, 1, 1, '20.00', 1, '2022-06-29 13:08:19', NULL, NULL);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` float(10, 2) NOT NULL,
  `image_video` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '1',
  `store_id` int NOT NULL,
  `status` tinyint NOT NULL COMMENT '0: inactive, 1:active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'pro-a', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with:\r\n\r\n“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”\r\nThe purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn\'t distract from the layout. A practice not without controversy, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.\r\n\r\nThe passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it\'s seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.', 'course', 20.00, 'https://player.vimeo.com/video/191777290', 4, 0, '2022-06-29 12:16:13', '2022-12-06 01:30:21');
INSERT INTO `products` VALUES (2, 'pro-b', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with:\r\n\r\n“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”\r\nThe purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn\'t distract from the layout. A practice not without controversy, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.\r\n\r\nThe passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it\'s seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.', 'good', 20.00, 'shop-product2.webp', 4, 1, '2022-06-29 12:16:59', '2022-12-05 13:03:10');
INSERT INTO `products` VALUES (3, 'pro-c', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with:\r\n\r\n“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”\r\nThe purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn\'t distract from the layout. A practice not without controversy, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.\r\n\r\nThe passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it\'s seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.', 'good', 16.00, 'shop-product3.webp', 4, 1, '2022-06-29 12:17:39', '2022-12-05 13:03:11');
INSERT INTO `products` VALUES (4, 'pro-d', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with:\r\n\r\n“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”\r\nThe purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn\'t distract from the layout. A practice not without controversy, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.\r\n\r\nThe passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it\'s seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.', 'good', 45.00, 'shop-product4.webp', 4, 1, '2022-06-29 12:18:24', '2022-12-07 09:21:27');
INSERT INTO `products` VALUES (5, 'pro-e', 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book. It usually begins with:\r\n\r\n“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.”\r\nThe purpose of lorem ipsum is to create a natural looking block of text (sentence, paragraph, page, etc.) that doesn\'t distract from the layout. A practice not without controversy, laying out pages with meaningless filler text can be very useful when the focus is meant to be on design, not content.\r\n\r\nThe passage experienced a surge in popularity during the 1960s when Letraset used it on their dry-transfer sheets, and again during the 90s as desktop publishers bundled the text with their software. Today it\'s seen all around the web; on templates, websites, and stock designs. Use our generator to get your own, or read on for the authoritative history of lorem ipsum.', 'good', 18.00, 'shop-product5.webp', 4, 1, '2022-06-29 12:19:12', '2022-12-05 13:03:12');
INSERT INTO `products` VALUES (6, 'pro-f', 'Do you want to become a programmer? Do you want to learn how to create games, automate your browser, visualize data, and much more?\r\n\r\nIf you’re looking to learn Python for the very first time or need a quick brush-up, this is the course for you!\r\n\r\nPython has rapidly become one of the most popular programming languages around the world. Compared to other languages such as Java or C++, Python consistently outranks and outperforms these languages in demand from businesses and job availability. The average Python developer makes over $100,000 - this number is only going to grow in the coming years.\r\n\r\nThe best part? Python is one of the easiest coding languages to learn right now. It doesn’t matter if you have no programming experience or are unfamiliar with the syntax of Python. By the time you finish this course, you\'ll be an absolute pro at programming!', 'service', 455.00, 'python.png', 4, 1, '2022-06-29 13:12:03', '2022-12-05 13:03:13');
INSERT INTO `products` VALUES (7, 'pro-g', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.', 'course', 250.00, 'https://player.vimeo.com/video/191777290', 4, 1, '2022-06-29 13:15:44', '2022-12-05 15:06:10');
INSERT INTO `products` VALUES (8, 'test pro1', 'this is test', 'good', 100.00, 'product-details-2_1670279973.jpg', 4, 1, '2022-12-05 22:39:33', '2022-12-05 22:39:33');
INSERT INTO `products` VALUES (9, 'test pro2', 'this is test pproduct', 'good', 123.00, 'product-details-1_1670280488.jpg', 4, 1, '2022-12-05 22:48:08', '2022-12-05 22:48:08');
INSERT INTO `products` VALUES (10, 'my course1', 'This is test course', 'course', 456.00, 'http://player.vimeo.com/video/28544156?api=1', 4, 1, '2022-12-05 22:50:33', '2022-12-05 15:05:45');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name` ASC, `guard_name` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Super Admin', 'web', '2021-12-27 04:47:34', '2022-02-13 10:20:32');
INSERT INTO `roles` VALUES (2, 'User Admin', 'web', '2021-12-29 02:08:21', '2022-02-13 10:20:50');
INSERT INTO `roles` VALUES (3, 'Customer', 'web', '2021-12-29 02:13:23', '2021-12-29 02:13:23');

-- ----------------------------
-- Table structure for session_details
-- ----------------------------
DROP TABLE IF EXISTS `session_details`;
CREATE TABLE `session_details`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `session` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `session_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of session_details
-- ----------------------------

-- ----------------------------
-- Table structure for storemasters
-- ----------------------------
DROP TABLE IF EXISTS `storemasters`;
CREATE TABLE `storemasters`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `storestatus` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of storemasters
-- ----------------------------
INSERT INTO `storemasters` VALUES (1, 'Products', 1, NULL, '', '2022-03-02 03:52:09', '2022-03-02 05:15:44');
INSERT INTO `storemasters` VALUES (2, 'Courses', 1, NULL, '', '2022-03-02 03:53:19', '2022-03-02 03:53:19');
INSERT INTO `storemasters` VALUES (3, 'Sessions', 1, NULL, '', '2022-03-02 03:53:41', '2022-03-02 03:53:41');
INSERT INTO `storemasters` VALUES (4, 'Free', 1, NULL, '', '2022-03-02 03:53:51', '2022-03-02 03:53:51');
INSERT INTO `storemasters` VALUES (5, 'Learning', 1, NULL, '', '2022-06-16 03:10:56', '2022-06-16 03:10:56');
INSERT INTO `storemasters` VALUES (7, 'Test store ddd', 0, NULL, '', '2022-11-18 09:55:08', '2022-11-18 09:55:28');

-- ----------------------------
-- Table structure for storepermisions
-- ----------------------------
DROP TABLE IF EXISTS `storepermisions`;
CREATE TABLE `storepermisions`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `meberships_id` int NOT NULL,
  `store_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `store id`(`store_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 41 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of storepermisions
-- ----------------------------
INSERT INTO `storepermisions` VALUES (1, 1, 1, '2022-06-29 11:47:29', '2022-11-21 01:41:39', '2022-11-21 01:41:39');
INSERT INTO `storepermisions` VALUES (2, 1, 2, '2022-06-29 11:47:29', '2022-11-21 01:41:39', '2022-11-21 01:41:39');
INSERT INTO `storepermisions` VALUES (3, 1, 3, '2022-06-29 11:47:29', '2022-11-21 01:41:39', '2022-11-21 01:41:39');
INSERT INTO `storepermisions` VALUES (4, 1, 4, '2022-06-29 11:47:29', '2022-11-21 01:41:39', '2022-11-21 01:41:39');
INSERT INTO `storepermisions` VALUES (5, 2, 2, '2022-06-29 11:47:54', '2022-11-21 01:40:33', '2022-11-21 01:40:33');
INSERT INTO `storepermisions` VALUES (6, 2, 3, '2022-06-29 11:47:54', '2022-11-21 01:40:33', '2022-11-21 01:40:33');
INSERT INTO `storepermisions` VALUES (7, 2, 4, '2022-06-29 11:47:54', '2022-11-21 01:40:33', '2022-11-21 01:40:33');
INSERT INTO `storepermisions` VALUES (8, 3, 1, '2022-06-29 11:48:12', '2022-11-21 01:38:35', '2022-11-21 01:38:35');
INSERT INTO `storepermisions` VALUES (9, 3, 4, '2022-06-29 11:48:12', '2022-11-21 01:38:35', '2022-11-21 01:38:35');
INSERT INTO `storepermisions` VALUES (10, 4, 4, '2022-06-29 11:48:31', '2022-11-21 01:31:49', '2022-11-21 01:31:49');
INSERT INTO `storepermisions` VALUES (11, 5, 1, '2022-11-18 01:53:02', '2022-11-18 09:53:16', '2022-11-18 09:53:16');
INSERT INTO `storepermisions` VALUES (12, 5, 2, '2022-11-18 01:53:02', '2022-11-18 09:53:16', '2022-11-18 09:53:16');
INSERT INTO `storepermisions` VALUES (13, 5, 3, '2022-11-18 01:53:02', '2022-11-18 09:53:16', '2022-11-18 09:53:16');
INSERT INTO `storepermisions` VALUES (14, 5, 4, '2022-11-18 01:53:02', '2022-11-18 09:53:16', '2022-11-18 09:53:16');
INSERT INTO `storepermisions` VALUES (15, 5, 5, '2022-11-18 01:53:02', '2022-11-18 09:53:16', '2022-11-18 09:53:16');
INSERT INTO `storepermisions` VALUES (16, 5, 1, '2022-11-18 01:53:16', NULL, NULL);
INSERT INTO `storepermisions` VALUES (17, 5, 2, '2022-11-18 01:53:16', NULL, NULL);
INSERT INTO `storepermisions` VALUES (18, 5, 3, '2022-11-18 01:53:16', NULL, NULL);
INSERT INTO `storepermisions` VALUES (19, 5, 4, '2022-11-18 01:53:16', NULL, NULL);
INSERT INTO `storepermisions` VALUES (20, 5, 5, '2022-11-18 01:53:16', NULL, NULL);
INSERT INTO `storepermisions` VALUES (21, 6, 1, '2022-11-20 16:49:22', NULL, NULL);
INSERT INTO `storepermisions` VALUES (22, 7, 1, '2022-11-20 16:59:21', '2022-11-21 01:26:52', '2022-11-21 01:26:52');
INSERT INTO `storepermisions` VALUES (23, 7, 1, '2022-11-20 17:26:52', '2022-11-21 01:27:23', '2022-11-21 01:27:23');
INSERT INTO `storepermisions` VALUES (24, 7, 1, '2022-11-20 17:27:23', '2022-11-21 01:27:34', '2022-11-21 01:27:34');
INSERT INTO `storepermisions` VALUES (25, 7, 1, '2022-11-20 17:27:34', '2022-11-21 01:27:39', '2022-11-21 01:27:39');
INSERT INTO `storepermisions` VALUES (26, 7, 1, '2022-11-20 17:27:39', '2022-11-21 01:29:33', '2022-11-21 01:29:33');
INSERT INTO `storepermisions` VALUES (27, 7, 1, '2022-11-20 17:29:33', NULL, NULL);
INSERT INTO `storepermisions` VALUES (28, 4, 4, '2022-11-20 17:31:49', NULL, NULL);
INSERT INTO `storepermisions` VALUES (29, 3, 1, '2022-11-20 17:38:35', NULL, NULL);
INSERT INTO `storepermisions` VALUES (30, 3, 4, '2022-11-20 17:38:35', NULL, NULL);
INSERT INTO `storepermisions` VALUES (31, 2, 2, '2022-11-20 17:40:33', '2022-11-21 01:42:03', '2022-11-21 01:42:03');
INSERT INTO `storepermisions` VALUES (32, 2, 3, '2022-11-20 17:40:33', '2022-11-21 01:42:03', '2022-11-21 01:42:03');
INSERT INTO `storepermisions` VALUES (33, 2, 4, '2022-11-20 17:40:33', '2022-11-21 01:42:03', '2022-11-21 01:42:03');
INSERT INTO `storepermisions` VALUES (34, 1, 1, '2022-11-20 17:41:39', NULL, NULL);
INSERT INTO `storepermisions` VALUES (35, 1, 2, '2022-11-20 17:41:39', NULL, NULL);
INSERT INTO `storepermisions` VALUES (36, 1, 3, '2022-11-20 17:41:39', NULL, NULL);
INSERT INTO `storepermisions` VALUES (37, 1, 4, '2022-11-20 17:41:39', NULL, NULL);
INSERT INTO `storepermisions` VALUES (38, 2, 2, '2022-11-20 17:42:03', NULL, NULL);
INSERT INTO `storepermisions` VALUES (39, 2, 3, '2022-11-20 17:42:03', NULL, NULL);
INSERT INTO `storepermisions` VALUES (40, 2, 4, '2022-11-20 17:42:03', NULL, NULL);

-- ----------------------------
-- Table structure for stores
-- ----------------------------
DROP TABLE IF EXISTS `stores`;
CREATE TABLE `stores`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `sname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of stores
-- ----------------------------
INSERT INTO `stores` VALUES (4, 'bhaskar store', 'product-2-min_1670272911.jpg', 'This is the test store.', 4, '2022-12-05 20:41:51', '2022-12-05 20:41:51');
INSERT INTO `stores` VALUES (5, 'Big Bash Personal Market', 'home-decor-2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt ornare massa eget egestas purus. Eget mauris pharetra et ultrices.', 7, '2022-12-06 13:35:18', '2022-12-06 06:24:49');

-- ----------------------------
-- Table structure for userinfos
-- ----------------------------
DROP TABLE IF EXISTS `userinfos`;
CREATE TABLE `userinfos`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `website` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dob` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone_number` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `country` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `state` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `city` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gender` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '1 : male, 0 : Female',
  `birth_place` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `occupation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `marriage_status` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '1 : Married, 0 : Not Married',
  `facebook_url` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `profile_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of userinfos
-- ----------------------------
INSERT INTO `userinfos` VALUES (1, 1, 'www.det.com', '01/03/2022', '1234567890', 'India', 'MP', 'Indore', 'Test User', '1', 'Indore', 'PHP Developer', '1', 'fb/user', 'gRF01j7Fm4jV9rHwTM71K3D83ZdEKLN3pKqAHItR.jpg', NULL, 1, '2022-03-27 05:30:06', '2022-06-17 12:24:02', NULL);
INSERT INTO `userinfos` VALUES (6, 6, 'test.com', '02/06/2022', '741852369', 'us', 'co', 'los vegas', 'tewt', '1', 'tes', 'test', '0', 'test', 'u69QaKPEOSF7llS59UpEkPJGlPk02sJO1XinHPdz.webp', NULL, 1, '2022-06-30 06:29:41', '2022-06-30 06:29:57', NULL);
INSERT INTO `userinfos` VALUES (7, 18, 'test.com', '02/06/2022', '12345678', 'USA', 'co', 'Test', 'test', '1', 'test', 'test', '0', 'test', 'OF3UT6sMXf52nkaSzCJfmld3Is3gg5PXea8TKFyq.jpg', NULL, 1, '2022-06-30 06:35:45', '2022-06-30 06:36:08', NULL);
INSERT INTO `userinfos` VALUES (8, 17, 'test.com', '02/06/2022', '12345678', 'United state', 'CO', 'Wasigton DC', 'test', '1', 'test', 'test', '0', 'test', '34UH0fd09cGDArgBanx0ol40c7o4QskuRVkJjlI5.jpg', NULL, 1, '2022-06-30 06:47:01', '2022-06-30 06:47:22', NULL);
INSERT INTO `userinfos` VALUES (9, 13, 'test.com', '02/06/2022', '12345678', 'USA', 'co', 'manchester', 'test', '0', 'test', 'test', '1', 'test', '10OXdCvRkj8zvgeFyKMqvJ0pcn7tOshljXc0UtDI.webp', NULL, 1, '2022-06-30 08:42:53', '2022-06-30 08:43:16', NULL);
INSERT INTO `userinfos` VALUES (10, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ksH17Iy4GunNT98JxDFvoWHOVC2pJAHqHylEdPbw.jpg', NULL, 1, '2022-11-23 07:32:46', NULL, NULL);
INSERT INTO `userinfos` VALUES (11, 7, 'https://my.com', '1993-02-06', '123456789', 'United State', 'New York', 'Calidonia', NULL, '0', NULL, NULL, '0', 'aadfdf', 'team-3.jpg', NULL, 1, '2022-12-06 13:59:38', '2022-12-06 13:59:38', NULL);

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
INSERT INTO `users` VALUES (1, 1, 2, NULL, 1, 'Hapi', 'OM', 'Super Admin', 'paul@hapiom.com', '2022-02-23 02:22:18', '$2y$10$rlParW8u9504XRFIr6LXluJy4JiKnnGdRZ4G6Cos3Iz/QJPWuU9Bm', NULL, NULL, NULL, NULL, NULL, 1, '2022-02-23 02:22:18', '2022-06-17 12:24:02');
INSERT INTO `users` VALUES (4, 2, 2, NULL, 1, 'Bhaskar', 'Dhote', 'Bhaskar Dhote', 'bhaskardhote7@gmail.com', NULL, '$2y$10$rlParW8u9504XRFIr6LXluJy4JiKnnGdRZ4G6Cos3Iz/QJPWuU9Bm', NULL, 'DET', 0, 'DET', '2022-12-20', 1, '2022-06-19 08:11:10', '2022-06-19 08:11:10');
INSERT INTO `users` VALUES (5, 3, 2, 4, 1, 'Hemant', 'Dhote', 'Hemant Dhote', 'hdhote7@gmail.com', NULL, '$2y$10$rlParW8u9504XRFIr6LXluJy4JiKnnGdRZ4G6Cos3Iz/QJPWuU9Bm', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-19 08:12:44', '2022-06-19 08:12:44');
INSERT INTO `users` VALUES (6, 3, 2, 4, 1, 'Yogesh', 'Deshmukh', 'Yogesh Deshmukh', 'yd@gmail.com', NULL, '$2y$10$rlParW8u9504XRFIr6LXluJy4JiKnnGdRZ4G6Cos3Iz/QJPWuU9Bm', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-19 08:15:55', '2022-06-19 08:15:55');
INSERT INTO `users` VALUES (7, 2, 1, NULL, 1, 'Big', 'bash', 'Big-bash', 'bigbash@example.com', NULL, '$2y$10$rlParW8u9504XRFIr6LXluJy4JiKnnGdRZ4G6Cos3Iz/QJPWuU9Bm', NULL, 'big bash', 0, 'big_bash', '2023-01-05', 1, '2022-06-29 13:47:50', '2022-12-06 13:59:38');
INSERT INTO `users` VALUES (8, 3, NULL, 4, 1, 'James', 'Spiegel', 'James Spiegel', 'jamesdpiegel@gmail.com', NULL, '$2y$10$rlParW8u9504XRFIr6LXluJy4JiKnnGdRZ4G6Cos3Iz/QJPWuU9Bm', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-29 14:07:55', '2022-06-29 14:07:55');
INSERT INTO `users` VALUES (9, 3, NULL, 4, 1, 'Marina', 'Valentine', 'Marina Valentine', 'marinavalentine@gmail.com', NULL, '$2y$10$4evHxqENlSxsodr8LT.TxuV4ymTD4qGei0QJFzBSyZs0mSRl2AzBy', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 05:52:25', '2022-06-30 05:52:25');
INSERT INTO `users` VALUES (10, 3, NULL, 4, 1, 'Elaine', 'Dreyfuss', 'Elaine Dreyfuss', 'elainedreyfuss@gmail.com', NULL, '$2y$10$a7PjO8WZA5yf5bYqBR4ta.s8Z/OOg.0sMB2ztv/asJbld32QGFvuq', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 05:53:27', '2022-06-30 05:53:27');
INSERT INTO `users` VALUES (11, 3, NULL, 4, 1, 'Mathilda', 'Brinker', 'Mathilda Brinker', 'mathildabrinker@gmail.com', NULL, '$2y$10$8LAOxCWIgc0vReKmu2y6/uBRSmmFLvYIAfJ0Hh7yDUtiUrelwPmla', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 05:54:16', '2022-06-30 05:54:16');
INSERT INTO `users` VALUES (12, 3, NULL, 4, 1, 'Green', 'Goo', 'Green Goo', 'greengoo@gmail.com', NULL, '$2y$10$9CmF/psX.fzPe6KxhwQ4cuoOq1lTMRVYhHYb5LD73/OZpnWnGWSsO', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 05:55:24', '2022-06-30 05:55:24');
INSERT INTO `users` VALUES (13, 3, NULL, 4, 1, 'Rock', 'March', 'Rock March', 'rockmarch@gmail.com', NULL, '$2y$10$4G86yxKEr4dpaY4mp6cRH.J.59J5g2GTdaS0ySTJXHIxlbGPwAFjS', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 05:55:54', '2022-06-30 08:43:16');
INSERT INTO `users` VALUES (14, 3, NULL, 4, 1, 'Sarah', 'Hetfield', 'Sarah Hetfield', 'sarahhetfield@gmail.com', NULL, '$2y$10$WHRUtR5BnSWvchDFJlitg.eEiYY8zHPpW5QufkkWv6O2DqpaOioIS', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 05:56:36', '2022-06-30 05:56:36');
INSERT INTO `users` VALUES (15, 3, NULL, 4, 1, 'Nicholas', 'Nicholas', 'Nicholas Nicholas', 'nicholasnicholas@gmail.com', NULL, '$2y$10$rlParW8u9504XRFIr6LXluJy4JiKnnGdRZ4G6Cos3Iz/QJPWuU9Bm', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 05:57:19', '2022-06-30 05:57:19');
INSERT INTO `users` VALUES (16, 3, NULL, 4, 1, 'Jimmy', 'dry', 'Jimmy dry', 'jimmydry@gmail.com', NULL, '$2y$10$E8LvidI2V37HzgAEWcGg1O8ydvd/TpLBQj1JULugMwZz47z9KLqiG', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 05:57:57', '2022-06-30 05:57:57');
INSERT INTO `users` VALUES (17, 3, NULL, 4, 1, 'Andrea', 'ponting', 'Andrea ponting', 'andreaponting@gmail.com', NULL, '$2y$10$Kwt/Yce8SLc4Z3LaoO2QLOFuFsO6XhJ3VzIX7ijVpN0bcSaY02f26', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 05:58:34', '2022-06-30 06:47:22');
INSERT INTO `users` VALUES (18, 3, NULL, 4, 1, 'Francine', 'Smith', 'Francine Smith', 'francinesmith@gmail.com', NULL, '$2y$10$ARjnbV7d1vvuEwZ/.98aN.xUfR19FOH9EtSCNF6vy.9fNKaK8pTEO', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 06:00:23', '2022-06-30 06:36:08');
INSERT INTO `users` VALUES (19, 3, NULL, 4, 1, 'Hugh', 'Wilson', 'Hugh Wilson', 'hughwilson@gmail.com', NULL, '$2y$10$7ddLLWWR2wx2FvolATba4e9qw7DnTxEi6Bj42tRVeWSs/BYT4xWH6', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 06:01:07', '2022-06-30 06:29:57');
INSERT INTO `users` VALUES (20, 3, NULL, 4, 1, 'Karen', 'Masters', 'Karen Masters', 'karenmasters@gmail.com', NULL, '$2y$10$LhxZ3hEmtPtjhATl88z7Q.G342xvkMADQsk8GUtEci/.NbmNEII3O', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 06:08:35', '2022-06-30 06:08:35');
INSERT INTO `users` VALUES (21, 3, NULL, 4, 1, 'Tapronus', 'Rock', 'Tapronus Rock', 'tapronusrock@gmail.com', NULL, '$2y$10$WC03hn1AarGfOomO1Zt/9ee73Jr9X4Yrc9fzf9oM8hYyF0ft/WD1a', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 06:09:30', '2022-06-30 06:09:30');
INSERT INTO `users` VALUES (22, 3, NULL, 4, 1, 'Mathilda', 'Mathilda', 'Mathilda Mathilda', 'mathildamathilda@gmail.com', NULL, '$2y$10$LTjRJwn8hl1CMJ9jjCU.GOxijnFdMxmAUWSUdvg5moLJQhBf7wNAi', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 06:11:37', '2022-06-30 06:11:37');
INSERT INTO `users` VALUES (23, 3, NULL, 4, 1, 'Blue', 'Whale Pizzas', 'Blue Whale Pizzas', 'BlueWhalePizzas@gmail.com', NULL, '$2y$10$39wndrAhtNxwrNkRhPw3m.y6b6xqXOHvscWUBlBH/I3uN4IU.a4IG', NULL, NULL, NULL, NULL, NULL, 1, '2022-06-30 06:13:08', '2022-06-30 06:13:08');
INSERT INTO `users` VALUES (24, 2, 4, NULL, 1, 'Bhaskar', 'Dhote', 'Bhaskar Dhote', 'bhaskardhote11@gmail.com', NULL, '$2y$10$i4GHibUchnzMKAlTnJTHiu0RDrxVYYgUoNbzCGmxg89NDJRnwxvd.', NULL, 'Test Company', 0, 'Test_Company', '2022-09-08', 1, '2022-08-24 16:00:19', '2022-08-24 16:00:19');
INSERT INTO `users` VALUES (25, 3, NULL, NULL, 1, 'Paul', 'Wagner', 'Paul Wagner', 'paul@paulwagner.com', NULL, '$2y$10$1RyXOQ.Nq4tAjoOVw5h6vO5cFuLYV5txTXXKs6LPsSQ8OgmTOZ8s2', NULL, NULL, NULL, NULL, NULL, 1, '2022-10-14 11:44:35', '2022-10-14 11:44:35');
INSERT INTO `users` VALUES (26, 3, 2, 4, 1, 'Naixu', 'Wang', 'Naixu Wang', 'nxwang00@gmail.com', NULL, '$2y$10$rlParW8u9504XRFIr6LXluJy4JiKnnGdRZ4G6Cos3Iz/QJPWuU9Bm', NULL, NULL, NULL, NULL, '2022-12-22', 1, '2022-11-18 01:09:58', '2022-11-21 22:17:21');
INSERT INTO `users` VALUES (28, 3, NULL, NULL, 1, 'Edward', 'Li', 'Edward Li', 'edwardli674@gmail.com', NULL, '$2y$10$rlParW8u9504XRFIr6LXluJy4JiKnnGdRZ4G6Cos3Iz/QJPWuU9Bm', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-20 19:10:35', '2022-11-20 19:10:35');
INSERT INTO `users` VALUES (30, 3, NULL, 4, 1, 'Mliki', 'Redouane', 'Mliki Redouane', 'mini.bear3294@gmail.com', NULL, '$2y$10$96.9rVFOxfQz8NJAnpjneuleo4WRQZrgCL4KY.pOZrnWv7jQP6MZ6', 'Pq2xF5C81Km83z08IJHKJb8qvz1rrqoUtRRL73MYujKHU0ZbEco7oa5D2OeG', NULL, NULL, NULL, NULL, 1, '2022-11-27 17:28:27', '2022-11-27 17:28:27');
INSERT INTO `users` VALUES (43, 1, NULL, NULL, 1, 'haitam', 'Falflaoui', 'haitam Falflaoui', 'gooddev598@gmail.com', NULL, '$2y$10$b2nhY6aigN7UsuHaqcQuu.sXtpjJ5OTL9evWYdO3UOOJWFdoivRcu', NULL, NULL, NULL, NULL, NULL, 1, '2022-11-29 02:27:50', '2022-11-29 02:27:50');
INSERT INTO `users` VALUES (44, 2, NULL, NULL, 1, 'germa', 'geus', 'germa geus', 'germa@gmail.com', NULL, '$2y$10$lnYHGd3XIVamrBKtIKssQea5WSKKg31Lv6GZ.7XSvI11y2JqkJkOO', NULL, NULL, NULL, NULL, NULL, 1, '2022-12-02 10:31:27', '2022-12-02 10:31:27');

SET FOREIGN_KEY_CHECKS = 1;
