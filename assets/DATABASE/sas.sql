/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : sas

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 27/02/2023 17:23:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_data_siswa
-- ----------------------------
DROP TABLE IF EXISTS `tb_data_siswa`;
CREATE TABLE `tb_data_siswa`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NIS` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `NAMA` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `JENIS_KELAMIN` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `TANGGAL_LAHIR` date NULL DEFAULT NULL,
  `ID_JURUSAN` int NULL DEFAULT NULL,
  `ID_KELAS` int NULL DEFAULT NULL,
  `NO_HP` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `FOTO_PROFILE` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `PASSWORD` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `EMAIL` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_data_siswa
-- ----------------------------
INSERT INTO `tb_data_siswa` VALUES (17, '111', 'muhmammad gilang ramdhan', NULL, '2023-02-15', 1, 1, NULL, NULL, '111', 'gilang@gmail.com');
INSERT INTO `tb_data_siswa` VALUES (18, '21237', 'adli ', NULL, NULL, 2, 13, NULL, NULL, '21237', NULL);
INSERT INTO `tb_data_siswa` VALUES (19, '555', 'jusahskdea', NULL, NULL, 3, 22, NULL, NULL, '555', NULL);
INSERT INTO `tb_data_siswa` VALUES (20, '123212', 'kulsaiwsasds', NULL, NULL, 4, 29, NULL, NULL, '123212', NULL);
INSERT INTO `tb_data_siswa` VALUES (21, '232156231', 'likasuahbiah', NULL, NULL, 5, 38, NULL, NULL, '232156231', NULL);
INSERT INTO `tb_data_siswa` VALUES (22, '2342', 'olakisuhya', NULL, NULL, 6, 44, NULL, NULL, '2342', NULL);
INSERT INTO `tb_data_siswa` VALUES (23, '8902', 'euytsahukija', NULL, NULL, 7, 56, NULL, NULL, '8902', NULL);
INSERT INTO `tb_data_siswa` VALUES (24, '6732', 'juancoki', NULL, NULL, 8, 66, NULL, NULL, '6732', NULL);
INSERT INTO `tb_data_siswa` VALUES (25, '9283', 'siapoiuhya', NULL, NULL, 9, 75, NULL, NULL, '9283', NULL);
INSERT INTO `tb_data_siswa` VALUES (26, '1212', 'testinghyus', NULL, NULL, 1, 2, NULL, NULL, '1212', NULL);
INSERT INTO `tb_data_siswa` VALUES (27, '5551', 'Coba Developer PMB', NULL, NULL, 1, 2, NULL, NULL, '555', NULL);

-- ----------------------------
-- Table structure for tb_feedback
-- ----------------------------
DROP TABLE IF EXISTS `tb_feedback`;
CREATE TABLE `tb_feedback`  (
  `NIS` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `EMAIL` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `FEEDBACK` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_feedback
-- ----------------------------
INSERT INTO `tb_feedback` VALUES ('555', 'gilang@email.com', 'lebih baik saya menjadi heacker');

-- ----------------------------
-- Table structure for tb_jurusan
-- ----------------------------
DROP TABLE IF EXISTS `tb_jurusan`;
CREATE TABLE `tb_jurusan`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `JURUSAN` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_jurusan
-- ----------------------------
INSERT INTO `tb_jurusan` VALUES (1, 'REKAYASA PERANGKAT LUNAK');
INSERT INTO `tb_jurusan` VALUES (2, 'MEKATRONIKA');
INSERT INTO `tb_jurusan` VALUES (3, 'PERHOTELAN');
INSERT INTO `tb_jurusan` VALUES (4, 'MULTIMEDIA');
INSERT INTO `tb_jurusan` VALUES (5, 'TEKNIK KOMPUTER JARINGAN');
INSERT INTO `tb_jurusan` VALUES (6, 'DESAIN GRAFIS');
INSERT INTO `tb_jurusan` VALUES (7, 'LOGISTIK');
INSERT INTO `tb_jurusan` VALUES (8, 'ANIMASI');
INSERT INTO `tb_jurusan` VALUES (9, 'PRODUKSI');

-- ----------------------------
-- Table structure for tb_kehadiran
-- ----------------------------
DROP TABLE IF EXISTS `tb_kehadiran`;
CREATE TABLE `tb_kehadiran`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NIS` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `WAKTU` datetime NULL DEFAULT NULL,
  `LOKASI` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `IMEI` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `STATUS` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ID_SURAT_IZIN` int NULL DEFAULT NULL,
  `FOTO_BUKTI_SELFIE` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ID_JURUSAN` int NULL DEFAULT NULL,
  `ID_KELAS` int NULL DEFAULT NULL,
  `PELANGGARAN` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `KETERANGAN` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_kehadiran
-- ----------------------------
INSERT INTO `tb_kehadiran` VALUES (1, '111', '2023-01-14 05:29:23', 'grfk', '212', 'L', NULL, 'pp', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (2, '21237', '2023-01-14 05:30:31', 'grfk', '2121', 'L', NULL, 'ppp', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (3, '21238', '2023-01-14 05:32:02', 'grfk', '212', 'P', NULL, 'ppp', NULL, NULL, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (4, '555', '2023-01-26 13:46:06', 'grfk', '212121212', 'H', NULL, 'ppppp', 1, 1, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (6, '555', '2023-02-02 08:38:45', 'grfk', '1123232', 'H', NULL, NULL, 1, 1, 'C35656', 'sakkslsldawds');
INSERT INTO `tb_kehadiran` VALUES (7, '111', '2023-02-03 08:39:08', 'grfk', '12312', 'S', NULL, NULL, 1, 2, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (8, '111', '2023-02-08 12:32:29', 'grfk', '1121', 'H', NULL, NULL, 1, 1, 'C6', 'Shess');
INSERT INTO `tb_kehadiran` VALUES (9, '555', '2023-02-08 12:36:00', 'grfk', '212', 'S', NULL, NULL, 2, 1, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (10, '555', '2023-02-14 11:26:00', 'grfk', '123', 'H', NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (11, '123212', '2023-02-02 11:32:11', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (12, '123212', '2023-02-03 13:00:15', NULL, NULL, 'IV', NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (13, '555', '2023-02-03 13:00:36', NULL, NULL, 'IV', NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (14, '111', '2023-02-03 13:00:54', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (15, '232156231', '2023-02-03 13:02:46', NULL, NULL, 'A', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (16, '555', '2023-02-02 13:55:22', NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (18, '555', '2023-02-17 14:00:48', NULL, NULL, 'P', NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (19, '555', '2023-02-21 15:36:14', NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (20, '555', '2023-02-21 10:36:15', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (21, '555', '2023-02-24 22:28:11', NULL, NULL, 'IV', NULL, NULL, 1, 1, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (22, '111', '2023-02-26 12:17:59', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (23, '555', '2023-02-26 12:41:43', NULL, NULL, 'H', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tb_kehadiran` VALUES (28, '555', '2023-02-26 12:47:21', NULL, NULL, 'P', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tb_kelas
-- ----------------------------
DROP TABLE IF EXISTS `tb_kelas`;
CREATE TABLE `tb_kelas`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `KELAS` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ID_JURUSAN` int NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 91 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_kelas
-- ----------------------------
INSERT INTO `tb_kelas` VALUES (1, 'X A', 1);
INSERT INTO `tb_kelas` VALUES (2, 'XI A', 1);
INSERT INTO `tb_kelas` VALUES (3, 'XII A', 1);
INSERT INTO `tb_kelas` VALUES (7, 'X B', 1);
INSERT INTO `tb_kelas` VALUES (8, 'XI B', 1);
INSERT INTO `tb_kelas` VALUES (9, 'XII B', 1);
INSERT INTO `tb_kelas` VALUES (10, 'X C', 1);
INSERT INTO `tb_kelas` VALUES (11, 'XI C', 1);
INSERT INTO `tb_kelas` VALUES (12, 'XII C', 1);
INSERT INTO `tb_kelas` VALUES (13, 'X A', 2);
INSERT INTO `tb_kelas` VALUES (14, 'XI A', 2);
INSERT INTO `tb_kelas` VALUES (15, 'XII A', 2);
INSERT INTO `tb_kelas` VALUES (16, 'X B', 2);
INSERT INTO `tb_kelas` VALUES (17, 'XI B', 2);
INSERT INTO `tb_kelas` VALUES (18, 'XII B', 2);
INSERT INTO `tb_kelas` VALUES (19, 'X C', 2);
INSERT INTO `tb_kelas` VALUES (20, 'XI C', 2);
INSERT INTO `tb_kelas` VALUES (21, 'XII C', 2);
INSERT INTO `tb_kelas` VALUES (22, 'X A', 3);
INSERT INTO `tb_kelas` VALUES (23, 'XI A', 3);
INSERT INTO `tb_kelas` VALUES (24, 'XII A', 3);
INSERT INTO `tb_kelas` VALUES (25, 'X B', 3);
INSERT INTO `tb_kelas` VALUES (26, 'XI B', 3);
INSERT INTO `tb_kelas` VALUES (27, 'XII B', 3);
INSERT INTO `tb_kelas` VALUES (29, 'X A', 4);
INSERT INTO `tb_kelas` VALUES (30, 'XI A', 4);
INSERT INTO `tb_kelas` VALUES (31, 'XII A', 4);
INSERT INTO `tb_kelas` VALUES (32, 'X B', 4);
INSERT INTO `tb_kelas` VALUES (33, 'XI B', 4);
INSERT INTO `tb_kelas` VALUES (34, 'XII B', 4);
INSERT INTO `tb_kelas` VALUES (35, 'X C', 4);
INSERT INTO `tb_kelas` VALUES (36, 'XI C', 4);
INSERT INTO `tb_kelas` VALUES (37, 'XII C', 4);
INSERT INTO `tb_kelas` VALUES (38, 'X A', 5);
INSERT INTO `tb_kelas` VALUES (39, 'XI A', 5);
INSERT INTO `tb_kelas` VALUES (40, 'XII A', 5);
INSERT INTO `tb_kelas` VALUES (41, 'X B', 5);
INSERT INTO `tb_kelas` VALUES (42, 'XI B', 5);
INSERT INTO `tb_kelas` VALUES (43, 'XII B', 5);
INSERT INTO `tb_kelas` VALUES (44, 'X A', 6);
INSERT INTO `tb_kelas` VALUES (45, 'XI A', 6);
INSERT INTO `tb_kelas` VALUES (46, 'XII A', 6);
INSERT INTO `tb_kelas` VALUES (47, 'X B', 6);
INSERT INTO `tb_kelas` VALUES (48, 'XI B', 6);
INSERT INTO `tb_kelas` VALUES (49, 'XII B', 6);
INSERT INTO `tb_kelas` VALUES (50, 'X C', 6);
INSERT INTO `tb_kelas` VALUES (51, 'XI C', 6);
INSERT INTO `tb_kelas` VALUES (52, 'XII C', 6);
INSERT INTO `tb_kelas` VALUES (53, 'X D', 6);
INSERT INTO `tb_kelas` VALUES (54, 'XI D', 6);
INSERT INTO `tb_kelas` VALUES (55, 'XII D', 6);
INSERT INTO `tb_kelas` VALUES (56, 'X A', 7);
INSERT INTO `tb_kelas` VALUES (57, 'XI A', 7);
INSERT INTO `tb_kelas` VALUES (58, 'XII A', 7);
INSERT INTO `tb_kelas` VALUES (59, 'X B', 7);
INSERT INTO `tb_kelas` VALUES (60, 'XI B', 7);
INSERT INTO `tb_kelas` VALUES (61, 'XII B', 7);
INSERT INTO `tb_kelas` VALUES (66, 'X A', 8);
INSERT INTO `tb_kelas` VALUES (67, 'XI A', 8);
INSERT INTO `tb_kelas` VALUES (68, 'XII A', 8);
INSERT INTO `tb_kelas` VALUES (69, 'X B', 8);
INSERT INTO `tb_kelas` VALUES (70, 'XI B', 8);
INSERT INTO `tb_kelas` VALUES (71, 'XII B', 8);
INSERT INTO `tb_kelas` VALUES (72, 'X C', 8);
INSERT INTO `tb_kelas` VALUES (73, 'XI C', 8);
INSERT INTO `tb_kelas` VALUES (74, 'XII C', 8);
INSERT INTO `tb_kelas` VALUES (75, 'X A', 9);
INSERT INTO `tb_kelas` VALUES (76, 'XI A', 9);
INSERT INTO `tb_kelas` VALUES (77, 'XII A', 9);
INSERT INTO `tb_kelas` VALUES (78, 'X B', 9);
INSERT INTO `tb_kelas` VALUES (79, 'XI B', 9);
INSERT INTO `tb_kelas` VALUES (80, 'XII B', 9);
INSERT INTO `tb_kelas` VALUES (81, 'X C', 9);
INSERT INTO `tb_kelas` VALUES (82, 'XI C', 9);
INSERT INTO `tb_kelas` VALUES (83, 'XII C', 9);
INSERT INTO `tb_kelas` VALUES (84, 'X D', 9);
INSERT INTO `tb_kelas` VALUES (85, 'XI D', 9);
INSERT INTO `tb_kelas` VALUES (86, 'XII D', 9);
INSERT INTO `tb_kelas` VALUES (87, 'X D', 1);
INSERT INTO `tb_kelas` VALUES (88, 'gg', 1);

-- ----------------------------
-- Table structure for tb_keterangan_izin
-- ----------------------------
DROP TABLE IF EXISTS `tb_keterangan_izin`;
CREATE TABLE `tb_keterangan_izin`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_KEHADIRAN` int NULL DEFAULT NULL,
  `KETERANGAN` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `STATUS` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_keterangan_izin
-- ----------------------------
INSERT INTO `tb_keterangan_izin` VALUES (1, 21, 'tes saja inimah', '01');
INSERT INTO `tb_keterangan_izin` VALUES (2, 12, 'we', '01');
INSERT INTO `tb_keterangan_izin` VALUES (3, 13, 'te', '01');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `ID` int NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `PASSWORD` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `LEVEL` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (9, 'walkel', '111', 'walkel');
INSERT INTO `tb_user` VALUES (11, 'admin', '111', 'admin');
INSERT INTO `tb_user` VALUES (12, 'gilang', '111', 'superadmin');
INSERT INTO `tb_user` VALUES (21, 'coba ai', '111', 'admin');
INSERT INTO `tb_user` VALUES (26, 'thetrister', '123', 'admin');

-- ----------------------------
-- View structure for view_perizinan
-- ----------------------------
DROP VIEW IF EXISTS `view_perizinan`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `view_perizinan` AS SELECT
	tb_kehadiran.ID, 
	tb_kehadiran.NIS, 
	tb_kehadiran.`STATUS`, 
	tb_keterangan_izin.KETERANGAN, 
	tb_keterangan_izin.STATUS_VALIDASI
FROM
	tb_kehadiran,
	tb_keterangan_izin ;

SET FOREIGN_KEY_CHECKS = 1;
