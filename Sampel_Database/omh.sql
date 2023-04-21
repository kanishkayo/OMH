/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100410
 Source Host           : localhost:3306
 Source Schema         : omh

 Target Server Type    : MySQL
 Target Server Version : 100410
 File Encoding         : 65001

 Date: 30/03/2023 13:01:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for inventory_items
-- ----------------------------
DROP TABLE IF EXISTS `inventory_items`;
CREATE TABLE `inventory_items`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_category` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `item_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of inventory_items
-- ----------------------------
INSERT INTO `inventory_items` VALUES (1, 'test', 'test123', '2023-03-12 11:48:15', '2023-03-12 06:18:15', '2023-03-12 06:18:15');
INSERT INTO `inventory_items` VALUES (2, 'test', 'test123', '2023-03-12 04:17:24', '2023-03-12 04:17:24', NULL);
INSERT INTO `inventory_items` VALUES (3, 'test', 'test123', '2023-03-12 04:27:04', '2023-03-12 04:27:04', NULL);
INSERT INTO `inventory_items` VALUES (4, 'test', 'aaaaa', '2023-03-12 04:31:06', '2023-03-12 04:31:06', NULL);
INSERT INTO `inventory_items` VALUES (5, 'Drugs & Medications', 'abc', '2023-03-12 04:35:22', '2023-03-12 04:35:22', NULL);
INSERT INTO `inventory_items` VALUES (6, 'Drugs & Medications', 'abc', '2023-03-12 19:53:17', '2023-03-12 14:23:17', '2023-03-12 14:23:17');

-- ----------------------------
-- Table structure for oauth_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens`  (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `expires_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `oauth_access_tokens_user_id_index`(`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of oauth_access_tokens
-- ----------------------------
INSERT INTO `oauth_access_tokens` VALUES ('092b4df0259e5d01b78f8ad02ac7aa1c924f5936da554623446083c6f12c5de3dbc2dd664af14cf9', 1, 3, 'authToken', '[]', 0, '2022-10-22 06:13:40', '2022-10-22 06:13:40', '2022-10-23 06:13:40');
INSERT INTO `oauth_access_tokens` VALUES ('1a80b9168245c560ae192d2e93ecc810622dfeb2f3b71c16a6f0d9e44e2c5df04bd12f8b8f498ba9', 2, 1, 'authToken', '[]', 0, '2022-10-14 06:04:57', '2022-10-14 06:04:57', '2022-10-14 20:34:57');
INSERT INTO `oauth_access_tokens` VALUES ('2970b8a9554790b8ea41901697cfe8013bc0d526483400027b6a79f681a4e638ee22e6306ba14520', 10, 3, 'authToken', '[]', 0, '2022-12-18 06:17:52', '2022-12-18 06:17:52', '2022-12-19 06:17:52');
INSERT INTO `oauth_access_tokens` VALUES ('4320832f5e3c2926258b7403e6b9a18f87efe17b370407c433fb31669612d4dd3c4c5ba65a9b4f4e', 8, 1, 'authToken', '[]', 0, '2022-10-14 15:21:22', '2022-10-14 15:21:22', '2022-10-15 05:51:22');
INSERT INTO `oauth_access_tokens` VALUES ('48ae5c9832073a5392db452fbee073d4919dda0132f8df3d5c2730f77ee7a92b410a6b07eb440d32', 7, 3, 'authToken', '[]', 0, '2023-03-18 05:46:11', '2023-03-18 05:46:11', '2023-03-19 05:46:10');
INSERT INTO `oauth_access_tokens` VALUES ('4aa644ee3dce91213d1d2d9cf4b83ae7805d994c73ee52677aa02f702e8536ecd6b24b94eb5cd07e', 6, 1, 'authToken', '[]', 0, '2022-10-14 18:32:44', '2022-10-14 18:32:44', '2022-10-15 09:02:44');
INSERT INTO `oauth_access_tokens` VALUES ('4f5163db4c21e422fc653d2a7da409ec6c67c9969a32415cb2615de6c4d32015dd4aacb94ac54a11', 1, 1, 'authToken', '[]', 0, '2022-10-20 19:08:45', '2022-10-20 19:08:45', '2022-10-21 09:38:45');
INSERT INTO `oauth_access_tokens` VALUES ('590f8e498c51691d0c8a64ad0580b045620b6e44bf140c0d57766686d0e4968915d0c49a62d16e32', 3, 3, 'authToken', '[]', 0, '2022-10-22 03:40:39', '2022-10-22 03:40:39', '2022-10-23 03:40:38');
INSERT INTO `oauth_access_tokens` VALUES ('7455505155a1bd0ad1c96a0b3fb7c248e388e664ebaa8d7b31e6f2f64d89a5d3d037661136c15e87', 32, 3, 'authToken', '[]', 0, '2023-03-13 12:51:34', '2023-03-13 12:51:34', '2023-03-14 12:51:34');
INSERT INTO `oauth_access_tokens` VALUES ('8054fb5451a70994b71b5da59ab01e54e21fe6b13ae94899244e569e32766b73599eba66e50a623e', 4, 1, 'authToken', '[]', 0, '2022-10-14 15:18:07', '2022-10-14 15:18:07', '2022-10-15 05:48:07');
INSERT INTO `oauth_access_tokens` VALUES ('82135f227d79514c6b837ade2b6172acf961641091db2bfb21206a88b48dd548df89760d53f63dd0', 4, 1, 'authToken', '[]', 0, '2022-10-14 04:53:09', '2022-10-14 04:53:09', '2022-10-14 19:23:09');
INSERT INTO `oauth_access_tokens` VALUES ('8da2c67a38bf9a5bfe32b8e7df4443446b15b5a14011dc76388fac9cefbedd0eb502f43c11459154', 9, 3, 'authToken', '[]', 0, '2023-03-15 11:39:43', '2023-03-15 11:39:43', '2023-03-16 11:39:43');
INSERT INTO `oauth_access_tokens` VALUES ('92f821e63dd6f7b8e324d1416bae31b48e618bbeb490563d21ab77d7922ae3f14818c53bc32c2836', 1, 3, 'authToken', '[]', 0, '2022-10-22 12:12:03', '2022-10-22 12:12:03', '2022-10-23 12:12:02');
INSERT INTO `oauth_access_tokens` VALUES ('97597b635700b2c483fcbbea6f94c59cad63d2fa9fdb52b0f3961435608c29322225ac300749c83f', 3, 1, 'authToken', '[]', 0, '2022-10-14 04:37:25', '2022-10-14 04:37:25', '2022-10-14 19:07:24');
INSERT INTO `oauth_access_tokens` VALUES ('99bcf3b5fc4c35090766dfe9b04f57f1f628d7aa6cdd385257273d51db372179179b54f11e73d084', 5, 3, 'authToken', '[]', 0, '2022-10-22 06:36:18', '2022-10-22 06:36:18', '2022-10-23 06:36:18');
INSERT INTO `oauth_access_tokens` VALUES ('a8e0d0e106239784091dc2ae595cb9ef7eec529d87944c5ab403b8c6a56a061d9ecd0e8a52581ae7', 3, 1, 'authToken', '[]', 0, '2022-10-14 15:21:57', '2022-10-14 15:21:57', '2022-10-15 05:51:57');
INSERT INTO `oauth_access_tokens` VALUES ('aee96bb751d5beb71090efcf8b56263fee8402c31dce46ad989921aea4e9c6b3c8fb115d5e881bcb', 4, 3, 'authToken', '[]', 0, '2022-10-22 06:35:14', '2022-10-22 06:35:14', '2022-10-23 06:35:14');
INSERT INTO `oauth_access_tokens` VALUES ('c2c066e1e8b729eccf8ef20ad10226a46ceb4e5d445c721dcf5c834b6cbc9d20f33ceb385df519b6', 4, 1, 'authToken', '[]', 0, '2022-10-14 15:20:19', '2022-10-14 15:20:19', '2022-10-15 05:50:19');
INSERT INTO `oauth_access_tokens` VALUES ('cc9dfe2d17ca6eea6d0f858695d1f404d31735f6469b4d5586677bd03dcb59983764f7e586bb2dac', 3, 3, 'authToken', '[]', 0, '2022-10-21 07:41:38', '2022-10-21 07:41:38', '2022-10-22 07:41:38');
INSERT INTO `oauth_access_tokens` VALUES ('dcae567059fdc1685b451ac350c7c383a3d06dd49dd5f70a6f2967836bcea88d50f615f35d17dba6', 5, 1, 'authToken', '[]', 0, '2022-10-14 04:55:15', '2022-10-14 04:55:15', '2022-10-14 19:25:15');
INSERT INTO `oauth_access_tokens` VALUES ('e08f0a146261fb71b99960a11120b41d95a74693242c861dd2a32f9e7d0b32ccb7cdf88fd2612958', 4, 1, 'authToken', '[]', 0, '2022-10-14 04:54:14', '2022-10-14 04:54:14', '2022-10-14 19:24:14');
INSERT INTO `oauth_access_tokens` VALUES ('e753fcb3c4b1160e83bd8a5447ea4e1f0ebe51780abff5a8af84f798799bd7773de347a9d456d5cb', 3, 3, 'authToken', '[]', 0, '2022-10-21 08:23:44', '2022-10-21 08:23:44', '2022-10-22 08:23:43');

-- ----------------------------
-- Table structure for oauth_auth_codes
-- ----------------------------
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes`  (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `oauth_auth_codes_user_id_index`(`user_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for oauth_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `oauth_clients_user_id_index`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of oauth_clients
-- ----------------------------
INSERT INTO `oauth_clients` VALUES (1, NULL, 'CSIAP Personal Access Client', '3AzehRgL4qB6a8hSyzfKPIxp3JwQgk95qWl9zbcs', NULL, 'http://localhost', 1, 0, 0, '2022-10-05 14:48:09', '2022-10-05 14:48:09');
INSERT INTO `oauth_clients` VALUES (2, NULL, 'CSIAP Password Grant Client', '2XrmkTIjzTzQq3JcRueYtTEyUKevybfW3v2oeXMm', 'users', 'http://localhost', 0, 1, 0, '2022-10-05 14:48:09', '2022-10-05 14:48:09');
INSERT INTO `oauth_clients` VALUES (3, NULL, 'CSIAP Personal Access Client', 'QEFQWsYO9uYEYSYQ3d0z4PqXtSyIhyRjNbC6T9pj', NULL, 'http://localhost', 1, 0, 0, '2022-10-21 07:40:22', '2022-10-21 07:40:22');
INSERT INTO `oauth_clients` VALUES (4, NULL, 'CSIAP Password Grant Client', 'ibOfYirTMAO32c2KalzWZ4GW785g9lZXEsqQtALt', 'users', 'http://localhost', 0, 1, 0, '2022-10-21 07:40:22', '2022-10-21 07:40:22');

-- ----------------------------
-- Table structure for oauth_personal_access_clients
-- ----------------------------
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of oauth_personal_access_clients
-- ----------------------------
INSERT INTO `oauth_personal_access_clients` VALUES (1, 1, '2022-10-05 14:48:09', '2022-10-05 14:48:09');
INSERT INTO `oauth_personal_access_clients` VALUES (2, 3, '2022-10-21 07:40:22', '2022-10-21 07:40:22');

-- ----------------------------
-- Table structure for oauth_refresh_tokens
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens`  (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `oauth_refresh_tokens_access_token_id_index`(`access_token_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for patien_inventory_items
-- ----------------------------
DROP TABLE IF EXISTS `patien_inventory_items`;
CREATE TABLE `patien_inventory_items`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `item_id` int(11) NULL DEFAULT NULL,
  `qutty` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `total` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `invoice_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of patien_inventory_items
-- ----------------------------
INSERT INTO `patien_inventory_items` VALUES (1, 'test123', 1, '5', '450', '1', '2023-03-30 10:09:00', '2023-03-30 10:09:03', NULL, 1);

-- ----------------------------
-- Table structure for patient
-- ----------------------------
DROP TABLE IF EXISTS `patient`;
CREATE TABLE `patient`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `age` int(11) NULL DEFAULT NULL,
  `medical_history` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `user_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `birthday` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of patient
-- ----------------------------
INSERT INTO `patient` VALUES (1, 43, 'Test', '9', '2022-12-02 06:35:15', '2022-12-02 06:35:15', NULL, NULL);
INSERT INTO `patient` VALUES (2, 43, 'Test', '10', '2022-12-18 06:17:29', '2022-12-18 06:17:29', NULL, NULL);
INSERT INTO `patient` VALUES (12, 32, 'sss', '52', '2023-03-18 11:38:38', '2023-03-18 11:38:38', NULL, NULL);
INSERT INTO `patient` VALUES (11, 38, 'sss', '50', '2023-03-15 13:14:13', '2023-03-15 13:14:13', NULL, NULL);
INSERT INTO `patient` VALUES (10, 38, 'sss', '47', '2023-03-15 13:10:01', '2023-03-15 13:10:01', NULL, NULL);
INSERT INTO `patient` VALUES (9, 38, 'Testaaa', '46', '2023-03-15 13:08:19', '2023-03-15 13:08:19', NULL, NULL);
INSERT INTO `patient` VALUES (13, 32, 'sss', '53', '2023-03-18 11:54:09', '2023-03-18 11:54:09', NULL, '1991-03-17');
INSERT INTO `patient` VALUES (14, 32, 'sss', '54', '2023-03-18 13:52:05', '2023-03-18 13:52:05', NULL, '1991-03-17');

-- ----------------------------
-- Table structure for patient_invoice
-- ----------------------------
DROP TABLE IF EXISTS `patient_invoice`;
CREATE TABLE `patient_invoice`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pharmacy_id` int(11) NULL DEFAULT NULL,
  `patient_id` int(11) NULL DEFAULT NULL,
  `net_total` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `payment_status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `payment_method` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `patient_order_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of patient_invoice
-- ----------------------------
INSERT INTO `patient_invoice` VALUES (1, 1, 1, '450', 'done', 'online', '2023-03-30 09:22:46', '2023-03-30 06:52:40', NULL, 1);

-- ----------------------------
-- Table structure for patient_oder
-- ----------------------------
DROP TABLE IF EXISTS `patient_oder`;
CREATE TABLE `patient_oder`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pharmacy_id` int(11) NULL DEFAULT NULL,
  `patient_id` int(11) NULL DEFAULT NULL,
  `image_path` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_comment` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `net_amount` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `oder_status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  `lat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lng` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `payment_status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `payment_method` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of patient_oder
-- ----------------------------
INSERT INTO `patient_oder` VALUES (1, 1, 1, 'storage/receipt/1679124764.pdf', 'Test', '450', 'delivered', '2023-03-30 12:57:52', '2023-03-30 07:27:52', NULL, '6.1471140126414', '80.381417488467', 'done', 'online');
INSERT INTO `patient_oder` VALUES (2, 1, 1, 'storage/receipt/1679126095.pdf', 'Test', '0', 'request', '2023-03-30 10:07:19', '2023-03-18 07:54:55', NULL, '6.1471140126414', '80.381417488467', 'pending', 'online');
INSERT INTO `patient_oder` VALUES (3, 1, 1, 'storage/receipt/1679136575.pdf', 'Test', '0', 'request', '2023-03-30 10:07:20', '2023-03-18 10:49:35', NULL, '6.1471140126414', '80.381417488467', 'pending', 'online');
INSERT INTO `patient_oder` VALUES (4, 1, 1, 'storage/receipt/1679136641.pdf', 'Test', '0', 'request', '2023-03-30 10:07:21', '2023-03-18 10:50:41', NULL, '6.1471140126414', '80.381417488467', 'pending', 'online');
INSERT INTO `patient_oder` VALUES (5, 1, 1, 'storage/receipt/1679405571.jpeg', 'Test', '0', 'request', '2023-03-30 10:07:22', '2023-03-21 13:32:52', NULL, '6.1471140126414', '80.381417488467', 'pending', 'online');

-- ----------------------------
-- Table structure for phamarcy_stock
-- ----------------------------
DROP TABLE IF EXISTS `phamarcy_stock`;
CREATE TABLE `phamarcy_stock`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moh_inventory_id` int(11) NULL DEFAULT NULL,
  `inventory_item_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `stock` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pharmacy_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of phamarcy_stock
-- ----------------------------
INSERT INTO `phamarcy_stock` VALUES (1, 1, 'saaaaaaassssqwwa', '10', 7, '2023-03-13 10:50:30', NULL, NULL);
INSERT INTO `phamarcy_stock` VALUES (2, 2, 'bbb', '100', 7, '2023-03-13 10:50:34', NULL, NULL);

-- ----------------------------
-- Table structure for pharmacy
-- ----------------------------
DROP TABLE IF EXISTS `pharmacy`;
CREATE TABLE `pharmacy`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pharmacy_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pharmacy_reg_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gaverment_registration_id` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `proprietors_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pharmacy_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `contact_number` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mobile_number` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lng` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `google_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `province` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `district` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pharmacy
-- ----------------------------
INSERT INTO `pharmacy` VALUES (1, 'aa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaaa', 'aaaasssdd@gmail.com', '6.1471140126414', '80.381417488467', '49WJ+RH Nakiyadeniya, Sri Lanka', 'Southern Province', 'aaa', 28, '2023-03-30 09:21:41', '2023-03-07 15:35:06', NULL);
INSERT INTO `pharmacy` VALUES (2, 'bbbbb', 'bbbbb', 'bbbbb', 'bbbb', 'bbbbb', 'bbbb', 'bbbb', 'bbbbb123@gmail.com', '6.1471140126414', '80.324663004162', '48WF+RV Nakiyadeniya, Sri Lanka', 'Southern Province', 'bbbb', 29, '2023-03-30 09:21:44', '2023-03-07 15:47:22', NULL);
INSERT INTO `pharmacy` VALUES (3, 'aaaabbb', 'bbnsjjn', 'jjskksm', 'kjkskjkk', 'kskkk', 'jkjkjjk', 'jkjkjk', 'jkjkjk@gmail.com', '6.4103793316124', '80.213272475504', 'C667+2MC, Horawela - Pelawatte - Pitigala Rd, Meegahathenna, Sri Lanka', 'Southern Province', 'jkjk', 30, '2023-03-30 09:21:48', '2023-03-07 18:30:30', NULL);
INSERT INTO `pharmacy` VALUES (4, 'dafaff', 'jffksksk', 'kjkjdkdkj', 'jkdjdj', 'knnkdkdnn', 'nknksksmkm', 'kjkjkssjsj', 'jjjjssssdd@gmail.com', '6.2662267034513', '80.534881219899', '7G8M+FX Kotapola, Sri Lanka', 'Southern Province', 'knknknkd', 31, '2023-03-30 09:21:51', '2023-03-07 18:32:03', NULL);
INSERT INTO `pharmacy` VALUES (5, 'test', 'PID_12345', 'PGID_12345', 'test', 'test', '0710738728', '0715560369', 'inesh12345@gmail.com', '6.1389597528718', '81.118482175058', 'Arabokka Road, 44Q9+9G8, Hambantota, Sri Lanka', 'Southern Province', 'Hambantota', 32, '2023-03-30 09:21:54', '2023-03-08 03:01:35', NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `contact_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mobile_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lng` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `street_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `google_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `province` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT 'province',
  `district` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT 'district',
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (7, 'Asanka', 'asanka@gmail.com', '$2y$10$G8w0CktQOLHuESNoYxaZq.znvnUCQYgiMc8p7K00lD9ZN2vMN7NNi', 'ADMIN', 'storage/UserProfileImage/1676538263.png', NULL, '071523562', NULL, NULL, NULL, NULL, NULL, 'western province', 'Colombo', NULL, 'Active', '2022-10-14 05:48:53', '2022-10-14 05:48:53', NULL);
INSERT INTO `users` VALUES (9, 'test', 'test@gmail.com', '$2y$10$G8w0CktQOLHuESNoYxaZq.znvnUCQYgiMc8p7K00lD9ZN2vMN7NNi', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2022-10-22 14:01:43', '2022-10-22 14:01:43', NULL);
INSERT INTO `users` VALUES (10, NULL, 'inesh@gmail.com', '$2y$10$R4.4DxXTSDFs20iDA6ROFufpC6llvbO8NHqFvS1WxZUzb9qXO65cy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-15 19:42:15', '2023-02-15 19:42:15', NULL);
INSERT INTO `users` VALUES (11, NULL, 'inesh2@gmail.com', '$2y$10$5gaO2YfdGVfdZNBu0zXHheGRVOzGzdQnESbvjqiqxDfbzUJgJgJpa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-15 19:48:58', '2023-02-15 19:48:58', NULL);
INSERT INTO `users` VALUES (12, 'Inesh Madhushan', 'inesh3@gmail.com', '$2y$10$cpJ5t/29wZhaa1AhgfMSEOZEmwIG8ByD8B.Hp/q5GoCAI7lzxQd.O', 'ADMIN', NULL, '910771415V', '763325823', '0762358533', '6.9271', '79.8612', '261 R. A. De Mel Mawatha', '261 R. A. De Mel Mawatha', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-02-15 20:02:33', '2023-02-15 20:02:33', NULL);
INSERT INTO `users` VALUES (13, 'Inesh Madhushan', 'inesh38@gmail.com', '$2y$10$RGZV2Yz4Qokdza/ZdPdG7ezwCsujoWmBvUYXfpQkjBrBZZ0vPPIzy', 'ADMIN', NULL, '910771415V', '763325823', '0762358533', '6.9271', '79.8612', '261 R. A. De Mel Mawatha', '261 R. A. De Mel Mawatha', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-02-15 20:34:23', '2023-02-15 20:34:23', NULL);
INSERT INTO `users` VALUES (14, 'Inesh Madhushan', 'inesh383@gmail.com', '$2y$10$So8.34ROaBF4kr2N3I4.RuwFyaYU8AnsWz0/12FNyYG9Q5krg018u', 'ADMIN', NULL, '910771415V', '763325823', '0762358533', '6.9271', '79.8612', '261 R. A. De Mel Mawatha', '261 R. A. De Mel Mawatha', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-02-16 06:36:15', '2023-02-16 06:36:15', NULL);
INSERT INTO `users` VALUES (15, 'Inesh Madhushan', 'inesh382@gmail.com', '$2y$10$FMzEh9FuzHzLXOR.hVo6YOZcMNbnk9AUzugJm1aFoDVBuWOzBq7nG', 'ADMIN', NULL, '910771415V', '763325823', '0762358533', '6.9271', '79.8612', '261 R. A. De Mel Mawatha', '261 R. A. De Mel Mawatha', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-02-16 06:38:55', '2023-02-16 06:38:55', NULL);
INSERT INTO `users` VALUES (16, 'Inesh Madhushan', 'inesh2282@gmail.com', '$2y$10$FP7aAQVmnpl/axrjm/xezu3y.XqGlZuzxCQXPAHIax0/ceqlLc1x6', 'ADMIN', NULL, '910771415V', '763325823', '0762358533', '6.9271', '79.8612', '261 R. A. De Mel Mawatha', '261 R. A. De Mel Mawatha', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-02-16 06:40:35', '2023-02-16 06:40:35', NULL);
INSERT INTO `users` VALUES (17, 'Inesh Madhushan', 'inesh22822@gmail.com', '$2y$10$MuVPyoyqMaKuD8YA2x8YvOg4BdIpZZ0.Ik6w9umS/P2KOOS4RAn5S', 'ADMIN', '1676529910.png', '910771415V', '763325823', '0762358533', '6.9271', '79.8612', '261 R. A. De Mel Mawatha', '261 R. A. De Mel Mawatha', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-02-16 06:45:10', '2023-02-16 06:45:10', NULL);
INSERT INTO `users` VALUES (18, 'Inesh Madhushan', 'inesh2282332@gmail.com', '$2y$10$TyMrWiyPYSucOTie5EhWIOMX0w1gKdOJIatblz4omei2nG47MBYeW', 'ADMIN', '1676529969.png', '910771415V', '763325823', '0762358533', '6.9271', '79.8612', '261 R. A. De Mel Mawatha', '261 R. A. De Mel Mawatha', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-02-16 06:46:09', '2023-02-16 06:46:09', NULL);
INSERT INTO `users` VALUES (19, 'Inesh Madhushan', 'inesh22823332@gmail.com', '$2y$10$q7Ga9SVuRCN0AZOSqkdCmezRevmeOcMPyz.ZGmFWveNWLEBwG6cP2', 'ADMIN', '1676530037.png', '910771415V', '763325823', '0762358533', '6.9271', '79.8612', '261 R. A. De Mel Mawatha', '261 R. A. De Mel Mawatha', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-02-16 06:47:17', '2023-02-16 06:47:17', NULL);
INSERT INTO `users` VALUES (20, 'Inesh Madhushan', 'inesh382a@gmail.com', '$2y$10$s48cZSLpFhE2gaM4mtGR6ebgy1clGJK3gwDxOLBOXIdgZVxk.bJWq', 'ADMIN', '1676538161.png', '910771415V', '763325823', '0762358533', '6.9271', '79.8612', '261 R. A. De Mel Mawatha', '261 R. A. De Mel Mawatha', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-02-16 09:02:42', '2023-02-16 09:02:42', NULL);
INSERT INTO `users` VALUES (21, 'Inesh Madhushan', 'inesh382ab@gmail.com', '$2y$10$DJBAxz875zu2yWmgtjLsbusvyFZAkMgKa7vZZKpo6Uv4mwF6earoC', 'ADMIN', 'storage/UserProfileImage/1676538263.png', '910771415V', '763325823', '0762358533', '6.9271', '79.8612', '261 R. A. De Mel Mawatha', '261 R. A. De Mel Mawatha', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-02-16 09:04:23', '2023-02-16 09:04:23', NULL);
INSERT INTO `users` VALUES (22, 'Inesh Madhushan', 'inesh382qab@gmail.com', '$2y$10$6YuuQGuD9H33vpJDAvJxY.xmfMfLLsOaIQYCO3Crx0oOpA.ydjH.y', 'ADMIN', 'storage/UserProfileImage/1676544460.png', '910771415V', '763325823', '0762358533', '6.9271', '79.8612', '261 R. A. De Mel Mawatha', '261 R. A. De Mel Mawatha', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-02-16 10:47:41', '2023-02-16 10:47:41', NULL);
INSERT INTO `users` VALUES (23, 'Inesh Madhushan', 'inesh382aaqab@gmail.com', '$2y$10$uDwDXAkMgkNjvzweYUEj7.BIqW7/dyUDqYoD5H0m/dGFgD7k/XcSm', 'ADMIN', 'storage/UserProfileImage/1676568946.png', '910771415V', '763325823', '0762358533', '6.9271', '79.8612', '261 R. A. De Mel Mawatha', '261 R. A. De Mel Mawatha', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-02-16 17:35:46', '2023-02-16 17:35:46', NULL);
INSERT INTO `users` VALUES (24, NULL, 'ione@gmail.com', 'Abcdef@123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-07 13:16:36', '2023-03-07 13:16:36', NULL);
INSERT INTO `users` VALUES (25, NULL, 'ionqqqe@gmail.com', 'Abcdef@123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-07 13:18:15', '2023-03-07 13:18:15', NULL);
INSERT INTO `users` VALUES (26, NULL, 'ineshssss@gmail.com', '$2y$10$a33oqs.bLAbb1p5DKrB9ruELCVycODqMc0c2jBkEsGqeekmmJNRXW', 'pharmacy', NULL, NULL, NULL, NULL, '6.6421911783633', '80.066114797884', NULL, 'J3R8+VC Anguruwatota, Sri Lanka', 'Southern Province', NULL, NULL, 'ACTIVE', '2023-03-07 15:24:37', '2023-03-07 15:24:37', NULL);
INSERT INTO `users` VALUES (27, 'aaa', 'yyy@gmail.com', '$2y$10$twKvWZjt/Y0SHR1nbbdp5.sFrZF8ShW/CuMn7KGyX0UXTNhMJvfIi', 'pharmacy', NULL, 'aaa', 'aaa', 'aaaa', '6.0028893234007', '80.457090134207', 'a', '2F34+5R Udukawa, Sri Lanka', 'Southern Province', 'aaa', 'a', 'ACTIVE', '2023-03-07 15:29:43', '2023-03-07 15:29:43', NULL);
INSERT INTO `users` VALUES (28, 'aaa', 'aaaasssdd@gmail.com', '$2y$10$InpkllVR2bgEyAI67yk7JezKSRUL7hEck7Gq5.sEBvjt8G8tViwKi', 'pharmacy', NULL, 'aaaa', 'aaa', 'aaaa', '6.1471140126414', '80.381417488467', 'aaa', '49WJ+RH Nakiyadeniya, Sri Lanka', 'Southern Province', 'aaa', 'aaaa', 'ACTIVE', '2023-03-07 15:35:06', '2023-03-07 15:35:06', NULL);
INSERT INTO `users` VALUES (29, 'bbbb', 'bbbbb123@gmail.com', '$2y$10$QvExom3DnEfhM2uRedz.z.xxqWXh8IX..PRYIAY62WNm0HHfzfo0u', 'customer', NULL, 'bbbbb', 'bbbb', 'bbbb', '6.1471140126414', '80.324663004162', 'bbbbb', '48WF+RV Nakiyadeniya, Sri Lanka', 'Southern Province', 'bbbb', 'bbbb', 'ACTIVE', '2023-03-07 15:47:22', '2023-03-07 15:47:22', NULL);
INSERT INTO `users` VALUES (30, 'kjkskjkk', 'jkjkjk@gmail.com', '$2y$10$mlgWg0LYAjnLhST7TayZAehtb1rHLuacoxkDtJcBZ5megvQfxVMSK', 'pharmacy', NULL, 'jkjkj', 'jkjkjjk', 'jkjkjk', '6.4103793316124', '80.213272475504', 'kskkk', 'C667+2MC, Horawela - Pelawatte - Pitigala Rd, Meegahathenna, Sri Lanka', 'Southern Province', 'jkjk', 'jkjkjs', 'ACTIVE', '2023-03-07 18:30:29', '2023-03-07 18:30:29', NULL);
INSERT INTO `users` VALUES (31, 'jkdjdj', 'jjjjssssdd@gmail.com', '$2y$10$w04xt9lJaa/hMR5gvAz/nuO7VP.RqPzo/ChuXUhmXxWV/I9VIVkQ.', 'pharmacy', NULL, 'ssjjjndjnncndknk', 'nknksksmkm', 'kjkjkssjsj', '6.2662267034513', '80.534881219899', 'knnkdkdnn', '7G8M+FX Kotapola, Sri Lanka', 'Southern Province', 'knknknkd', 'nkknknks', 'ACTIVE', '2023-03-07 18:32:03', '2023-03-07 18:32:03', NULL);
INSERT INTO `users` VALUES (32, 'test', 'inesh12345@gmail.com', '$2y$10$KiBVyy9pAPpBF/x1A3wSF.r406K/O3Vs3WivNUlzs2aFu99eEI85i', 'pharmacy', 'storage/UserProfileImage/1676568946.png', '940141261V', '0710738728', '0715560369', '6.1389597528718', '81.118482175058', 'test', 'Arabokka Road, 44Q9+9G8, Hambantota, Sri Lanka', 'Southern Province', 'Hambantota', 'Hambantota', 'ACTIVE', '2023-03-08 03:01:35', '2023-03-08 03:01:35', NULL);
INSERT INTO `users` VALUES (33, 'test', 'testqqq@gmail.com', '$2y$10$DQQr9wDhTJ1klkbooXGXg.H/HFefVXCeA/daeKjq6qw8Qxf83Vcvm', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 12:24:21', '2023-03-15 12:24:21', NULL);
INSERT INTO `users` VALUES (34, 'test', 'testqqq@gmail.com', '$2y$10$p6e0tyZ6StATZSX0Q1ieG.qdazp9W82VeRQqMwetXxcEW4wiLKGvW', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 12:35:02', '2023-03-15 12:35:02', NULL);
INSERT INTO `users` VALUES (35, 'test', 'testqqq@gmail.com', '$2y$10$IUfX9GpG1hZi1VjpuVHeReU.IYGUqvSrr.K2V826arv3hRMw7XPta', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 12:35:29', '2023-03-15 12:35:29', NULL);
INSERT INTO `users` VALUES (36, 'test', 'testqqq@gmail.com', '$2y$10$sJuCUN4DRZ.4ciGg1GyxeuWdKOEnud5aF03xefliVr1jtFp7V6uCS', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 12:36:10', '2023-03-15 12:36:10', NULL);
INSERT INTO `users` VALUES (37, 'test', 'testqqq@gmail.com', '$2y$10$QfsIck7reE08lpfugO71MOjPYWsVCw1..jd5.SOcEIk5UBBaW9vea', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 12:41:56', '2023-03-15 12:41:56', NULL);
INSERT INTO `users` VALUES (38, 'test', 'testqqq@gmail.com', '$2y$10$6PqN3DncZYRP198p0axinOeNccG.A5NLk0UZfO252lNscKxsom3qu', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 12:59:01', '2023-03-15 12:59:01', NULL);
INSERT INTO `users` VALUES (39, 'test', 'testqqq@gmail.com', '$2y$10$IOIZU9KCBo8X6uLiKm6oA.yjtAviQC8EClHMUz.NkY3mxXMlEq.NO', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 13:04:11', '2023-03-15 13:04:11', NULL);
INSERT INTO `users` VALUES (40, 'test', 'testqqq@gmail.com', '$2y$10$IHcy/kG.AC1qtrvNJXGGNuLiwwoxzgBBtrzCQcSk/Y2KqCS35xT/S', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 13:04:43', '2023-03-15 13:04:43', NULL);
INSERT INTO `users` VALUES (41, 'test', 'testqqq@gmail.com', '$2y$10$SvzTo9mmczgYacj1UBp3juwOXKusAyopl2MH8.U2fesGothylmXaW', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 13:04:58', '2023-03-15 13:04:58', NULL);
INSERT INTO `users` VALUES (42, 'test', 'testqqq@gmail.com', '$2y$10$lAcoUtobxfuPUWOm72wgc.SzT9KgkVahPgJjANkeHt.KHDvSIWKYi', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 13:05:48', '2023-03-15 13:05:48', NULL);
INSERT INTO `users` VALUES (43, 'test', 'testqqq@gmail.com', '$2y$10$27SqpMjlhXq4obWLluOpTuolnQ6rY1K0HE5MVUuIJaiwe.MS27xL6', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 13:06:12', '2023-03-15 13:06:12', NULL);
INSERT INTO `users` VALUES (44, 'test', 'testqqq@gmail.com', '$2y$10$O4A0jKvsUTAFT57MV5DYSeKYC1m5qtI0rPxuoPKgsIv3m6m0cQHxK', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 13:07:31', '2023-03-15 13:07:31', NULL);
INSERT INTO `users` VALUES (45, 'test', 'testqqq@gmail.com', '$2y$10$zWGOAsztcZXBUp6ZfrGmAek8M6HyviD7Tt2CzoLSaEftTQJ0ATMGu', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 13:08:08', '2023-03-15 13:08:08', NULL);
INSERT INTO `users` VALUES (46, 'test', 'testqqq@gmail.com', '$2y$10$6jWVhYAY3anisU895sldhesycg.rd/j30EQOg0aC8MZVkfnLYgC12', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 13:08:19', '2023-03-15 13:08:19', NULL);
INSERT INTO `users` VALUES (47, 'test', 'testqqq122@gmail.com', '$2y$10$yYkQJxSIHYRXydWBMszM7.21zVlQ.molN417OzChGn..OShjUHYxy', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 13:10:01', '2023-03-15 13:10:01', NULL);
INSERT INTO `users` VALUES (48, 'test', 'testqqq122@gmail.com', '$2y$10$8l7MPcF3T/10CwrgtjcZ6.U8a.HHh7z5xzDRjKJ.6scBSwhQLSBUy', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 13:12:16', '2023-03-15 13:12:16', NULL);
INSERT INTO `users` VALUES (49, 'test', 'testqqq122wwww@gmail.com', '$2y$10$7eS6bOVgGi8COg.rsD4SAeRE4/dJdvXxGYroRkN3KX1ZgdWnuJoZG', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 13:12:33', '2023-03-15 13:12:33', NULL);
INSERT INTO `users` VALUES (50, 'test', 'testqqq122wwww@gmail.com', '$2y$10$FWzQwRtN1hjQ/GqnrWM/0eKk3afbUAxnu5Bb5l508FcUsgS3blnNm', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-15 13:14:13', '2023-03-15 13:14:13', NULL);
INSERT INTO `users` VALUES (51, 'test', 'testqqq122wwww@gmail.com', '$2y$10$doYBk3uASiwd7dmwb7j9PuuThRspPRwGmMzH3KxJmvwogF.czxnhC', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-18 11:36:40', '2023-03-18 11:36:40', NULL);
INSERT INTO `users` VALUES (52, 'test', 'testqqq122wwww@gmail.com', '$2y$10$kwbTQd7xsbnflzoUry8l4ORvvIatcY/qWNTgMmTcsUCBIVdMEeST.', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', 'J3R8+VC Anguruwatota, Sri Lanka', 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-18 11:38:38', '2023-03-18 11:38:38', NULL);
INSERT INTO `users` VALUES (53, 'test', 'testqqq122wwww@gmail.com', '$2y$10$EajjX6Vf3sVKNnAfS9HL4.iJ0R3iWKHFnmRnlFG.avziVCAtP1trC', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', NULL, 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-18 11:54:09', '2023-03-18 11:54:09', NULL);
INSERT INTO `users` VALUES (54, 'test', 'testqqq12222wwww@gmail.com', '$2y$10$olMGE8ijY7Is2xa8JYBofeWtpQ19qQZUP4QanH.blTgoCDl.kE4Qu', 'patient', 'storage/UserProfileImage/1676538263.png', '910771415V', '0715544123', '0762358533', '6.6421911783633', '80.066114797884', '261 R. A. De Mel Mawatha', NULL, 'western province', 'Colombo', 'Colombo', 'ACTIVE', '2023-03-18 13:52:05', '2023-03-18 13:52:05', NULL);

SET FOREIGN_KEY_CHECKS = 1;
