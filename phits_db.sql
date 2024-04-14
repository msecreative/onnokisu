/*
 Navicat Premium Data Transfer

 Source Server         : Wamp
 Source Server Type    : MySQL
 Source Server Version : 50740 (5.7.40)
 Source Host           : localhost:3306
 Source Schema         : phits_db

 Target Server Type    : MySQL
 Target Server Version : 50740 (5.7.40)
 File Encoding         : 65001

 Date: 14/04/2024 21:54:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for disease_t
-- ----------------------------
DROP TABLE IF EXISTS `disease_t`;
CREATE TABLE `disease_t`  (
  `diseaseID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `diseaseName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`diseaseID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of disease_t
-- ----------------------------
INSERT INTO `disease_t` VALUES ('D001', 'Dengue');
INSERT INTO `disease_t` VALUES ('D002', 'Chikungunya');
INSERT INTO `disease_t` VALUES ('D003', 'Malaria');
INSERT INTO `disease_t` VALUES ('D004', 'Tuberculosis');
INSERT INTO `disease_t` VALUES ('D005', 'Hepatitis');

-- ----------------------------
-- Table structure for governmentagencies_t
-- ----------------------------
DROP TABLE IF EXISTS `governmentagencies_t`;
CREATE TABLE `governmentagencies_t`  (
  `agencyID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `agencyName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agencyEmail` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agencyContact` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `city` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `area` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agencyGroup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`agencyID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of governmentagencies_t
-- ----------------------------
INSERT INTO `governmentagencies_t` VALUES ('GA001', 'Ministry of Health', 'info@mohfw.gov.bd', '8802-9542883', 'Dhaka', 'Tejgaon', 'Covid Vaccination', 'ageny', '123');
INSERT INTO `governmentagencies_t` VALUES ('GA002', 'Directorate General of Health ', 'dg@.gov.bd', '8802-9552054', 'Dhaka', 'Mohakhali', 'Polio Vaccination', 'ageny', '123');
INSERT INTO `governmentagencies_t` VALUES ('GA003', 'Bangladesh Medical Research Co', 'info@bmrcbd.org', '8802-58152221', 'Dhaka', 'Farmgate', 'Water and Sanitation Programs', 'ageny', '123');
INSERT INTO `governmentagencies_t` VALUES ('GA004', 'National Institute of Public H', 'info@niph.org.bd', '8802-58153920', 'Dhaka', 'Mirpur', 'Mental Health Program', 'ageny', '123');
INSERT INTO `governmentagencies_t` VALUES ('GA005', 'Bangladesh Public Health', 'info@bbs.gov.bd', '8802-9515452', 'Dhaka', 'Agargaon', 'Chicken pox Vaccination', 'ageny', '123');

-- ----------------------------
-- Table structure for intervention_t
-- ----------------------------
DROP TABLE IF EXISTS `intervention_t`;
CREATE TABLE `intervention_t`  (
  `interventionID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `interventionName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `startDate` date NULL DEFAULT NULL,
  `endDate` date NULL DEFAULT NULL,
  `targetPopulation` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`interventionID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of intervention_t
-- ----------------------------
INSERT INTO `intervention_t` VALUES ('IN001', 'Covid Vaccination ', '2024-01-01', '2024-12-31', 500);
INSERT INTO `intervention_t` VALUES ('IN002', 'Dengue Prevention Program', '2024-06-01', '2024-09-30', 1000000);
INSERT INTO `intervention_t` VALUES ('IN003', 'Nutrition Improvement Program', '2024-03-15', '2025-03-14', 200000);
INSERT INTO `intervention_t` VALUES ('IN004', 'Water Sanitation Initiative', '2024-04-01', '2025-03-31', 800000);
INSERT INTO `intervention_t` VALUES ('IN005', 'Maternal and Child Healthcare ', '2024-02-01', '2024-12-31', 300000);

-- ----------------------------
-- Table structure for interventioncentre_t
-- ----------------------------
DROP TABLE IF EXISTS `interventioncentre_t`;
CREATE TABLE `interventioncentre_t`  (
  `centerID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `centreName` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `centreEmail` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `centreContact` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `centreType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`centerID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of interventioncentre_t
-- ----------------------------
INSERT INTO `interventioncentre_t` VALUES ('IC001', 'Dhaka Health Center', 'dhakahealth@example.com', '8801712345678', 'Hospital', 'Gulshan', '123', 'intervention');
INSERT INTO `interventioncentre_t` VALUES ('IC002', 'Chittagong Medical Center', 'chittagongmed@example.com', '8801812345678', 'Hospital', 'Mohakhali', '123', 'intervention');
INSERT INTO `interventioncentre_t` VALUES ('IC003', 'Khulna Public Health Faci', 'khulnapublichealth@exampl', '8801912345678', 'Government Booth', 'Gulshan', NULL, 'intervention');
INSERT INTO `interventioncentre_t` VALUES ('IC004', 'Rajshahi Community Clinic', 'rajshahicommunity@example', '8801612345678', 'Government Booth', 'Banani', NULL, 'intervention');
INSERT INTO `interventioncentre_t` VALUES ('IC005', 'Sylhet Health and Wellnes', 'sylhethwc@example.com', '8801512345678', 'Hospital', 'Mohammadpur', NULL, 'intervention');
INSERT INTO `interventioncentre_t` VALUES ('IC006', 'Apollo Hospitals Dhaka', 'info@apollodhaka.com', '8801712345678', 'Hospital', 'Dhanmondi', NULL, 'intervention');
INSERT INTO `interventioncentre_t` VALUES ('IC007', 'Square Hospitals Dhaka', 'info@squarehospital.com', '8801812345678', 'Hospital', 'Uttara', NULL, 'intervention');
INSERT INTO `interventioncentre_t` VALUES ('IC008', 'Labaid Specialized Hospit', 'info@labaidgroup.com', '8801912345678', 'Hospital', 'Lalmatia', NULL, 'intervention');
INSERT INTO `interventioncentre_t` VALUES ('IC009', 'sdfsdf', 'asdfsd@gmail.com', '01914848896', '', 'Mohammadpur', '123', 'intervention');

-- ----------------------------
-- Table structure for interventioncentrecoordination_t
-- ----------------------------
DROP TABLE IF EXISTS `interventioncentrecoordination_t`;
CREATE TABLE `interventioncentrecoordination_t`  (
  `centerID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `interventionID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`centerID`, `interventionID`) USING BTREE,
  INDEX `InterventionCentreCoordination_FK2`(`interventionID`) USING BTREE,
  CONSTRAINT `interventioncentrecoordination_t_ibfk_1` FOREIGN KEY (`centerID`) REFERENCES `interventioncentre_t` (`centerID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `interventioncentrecoordination_t_ibfk_2` FOREIGN KEY (`interventionID`) REFERENCES `intervention_t` (`interventionID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of interventioncentrecoordination_t
-- ----------------------------
INSERT INTO `interventioncentrecoordination_t` VALUES ('IC001', 'IN001');
INSERT INTO `interventioncentrecoordination_t` VALUES ('IC003', 'IN001');
INSERT INTO `interventioncentrecoordination_t` VALUES ('IC002', 'IN002');
INSERT INTO `interventioncentrecoordination_t` VALUES ('IC004', 'IN003');
INSERT INTO `interventioncentrecoordination_t` VALUES ('IC005', 'IN004');

-- ----------------------------
-- Table structure for location_t
-- ----------------------------
DROP TABLE IF EXISTS `location_t`;
CREATE TABLE `location_t`  (
  `locationID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `area` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `population` int(11) NULL DEFAULT NULL,
  `centerID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`locationID`) USING BTREE,
  INDEX `Location_FK`(`centerID`) USING BTREE,
  CONSTRAINT `location_t_ibfk_1` FOREIGN KEY (`centerID`) REFERENCES `interventioncentre_t` (`centerID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of location_t
-- ----------------------------
INSERT INTO `location_t` VALUES ('LOC01', 'Dhaka', 'Gulshan', 2000, 'IC001');
INSERT INTO `location_t` VALUES ('LOC02', 'Dhaka', 'Mohakhali', 18000, 'IC006');
INSERT INTO `location_t` VALUES ('LOC03', 'Dhaka', 'Panthapath', 170, 'IC007');
INSERT INTO `location_t` VALUES ('LOC04', 'Dhaka', 'Dhanmondi', 1600, 'IC008');

-- ----------------------------
-- Table structure for policymakers_t
-- ----------------------------
DROP TABLE IF EXISTS `policymakers_t`;
CREATE TABLE `policymakers_t`  (
  `policymakerID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `policymakerName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `policymakerEmail` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `policymakerContact` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `policymakerGroup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `policymakerPassword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`policymakerID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of policymakers_t
-- ----------------------------
INSERT INTO `policymakers_t` VALUES ('PM006', 'Farhana Rahman', 'farhana.rahman@example.co', '8801712345678', 'Covid Vaccination', '123', 'policymaker');
INSERT INTO `policymakers_t` VALUES ('PM007', 'Rahim Khan', 'rahim.khan@example.com', '8801812345678', 'Dengue Prevention Program', NULL, NULL);
INSERT INTO `policymakers_t` VALUES ('PM008', 'Sadia Islam', 'sadia.islam@example.com', '8801912345678', 'Water and Sanitation Programs', NULL, NULL);
INSERT INTO `policymakers_t` VALUES ('PM009', 'Khaleda Akhter', 'khaleda.akhter@example.co', '8801612345678', 'Nutrition Improvement Program\r\n', NULL, NULL);
INSERT INTO `policymakers_t` VALUES ('PM010', 'Aminul Haque', 'aminul.haque@example.com', '8801512345678', 'Maternal and Child Healthcare \r\n\r\n', NULL, NULL);

-- ----------------------------
-- Table structure for public_t
-- ----------------------------
DROP TABLE IF EXISTS `public_t`;
CREATE TABLE `public_t`  (
  `NIDNumber` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `FullName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nationality` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bloodGroup` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `dateOfBirth` date NULL DEFAULT NULL,
  `locationID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `centerID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `interventionID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`NIDNumber`) USING BTREE,
  INDEX `Public_FK1`(`locationID`) USING BTREE,
  INDEX `Public_FK2`(`centerID`) USING BTREE,
  INDEX `Public_FK3`(`interventionID`) USING BTREE,
  CONSTRAINT `public_t_ibfk_1` FOREIGN KEY (`locationID`) REFERENCES `location_t` (`locationID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `public_t_ibfk_2` FOREIGN KEY (`centerID`) REFERENCES `interventioncentre_t` (`centerID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `public_t_ibfk_3` FOREIGN KEY (`interventionID`) REFERENCES `intervention_t` (`interventionID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of public_t
-- ----------------------------
INSERT INTO `public_t` VALUES ('1234567890', 'Rakib Hossain', 'Bangladeshi', 'Male', 'A+', '1980-05-15', 'LOC01', 'IC001', 'Done', 'Hospital', 'IN002');
INSERT INTO `public_t` VALUES ('2345678901', 'Shimu ', 'Bangladeshi', 'Female', 'B+', '1985-08-20', 'LOC02', 'IC006', 'Done', NULL, NULL);
INSERT INTO `public_t` VALUES ('3456789012', 'Sumaya', 'Bangladeshi', 'Female', 'O+', '1990-03-10', 'LOC01', 'IC001', 'Done', NULL, NULL);
INSERT INTO `public_t` VALUES ('4567890123', 'Aysha Khatun', 'Bangladeshi', 'Female', 'AB+', '1975-12-25', 'LOC04', 'IC008', 'Done', NULL, NULL);
INSERT INTO `public_t` VALUES ('5678901234', 'Fahim Fardin', 'Bangladeshi', 'Male', 'A-', '1988-11-30', 'LOC03', 'IC007', 'Done', NULL, NULL);

-- ----------------------------
-- Table structure for publicintervention_t
-- ----------------------------
DROP TABLE IF EXISTS `publicintervention_t`;
CREATE TABLE `publicintervention_t`  (
  `NIDNumber` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `interventionID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`NIDNumber`, `interventionID`) USING BTREE,
  INDEX `PublicIntervention_FK2`(`interventionID`) USING BTREE,
  CONSTRAINT `publicintervention_t_ibfk_1` FOREIGN KEY (`NIDNumber`) REFERENCES `public_t` (`NIDNumber`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `publicintervention_t_ibfk_2` FOREIGN KEY (`interventionID`) REFERENCES `intervention_t` (`interventionID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of publicintervention_t
-- ----------------------------

-- ----------------------------
-- Table structure for resourceallocation_t
-- ----------------------------
DROP TABLE IF EXISTS `resourceallocation_t`;
CREATE TABLE `resourceallocation_t`  (
  `resourceID` int(11) NOT NULL AUTO_INCREMENT,
  `resourceType` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `quantityNeeded` int(11) NULL DEFAULT NULL,
  `requestDate` date NULL DEFAULT NULL,
  `allocationDate` date NULL DEFAULT NULL,
  `approvalStatus` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `interventionID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `policymakerID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `agencyID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`resourceID`) USING BTREE,
  INDEX `ResourceAllocation_FK1`(`interventionID`) USING BTREE,
  INDEX `ResourceAllocation_FK2`(`policymakerID`) USING BTREE,
  INDEX `ResourceAllocation_FK3`(`agencyID`) USING BTREE,
  CONSTRAINT `resourceallocation_t_ibfk_1` FOREIGN KEY (`interventionID`) REFERENCES `intervention_t` (`interventionID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `resourceallocation_t_ibfk_2` FOREIGN KEY (`policymakerID`) REFERENCES `policymakers_t` (`policymakerID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `resourceallocation_t_ibfk_3` FOREIGN KEY (`agencyID`) REFERENCES `governmentagencies_t` (`agencyID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of resourceallocation_t
-- ----------------------------
INSERT INTO `resourceallocation_t` VALUES (36, 'Vaccines', 1000000, '2024-03-01', '2024-04-14', 'APP', 'IN001', 'PM006', 'GA001');
INSERT INTO `resourceallocation_t` VALUES (37, 'Educational Materials', 5000, '2024-04-15', '2024-05-01', 'PEN', 'IN005', 'PM010', 'GA002');
INSERT INTO `resourceallocation_t` VALUES (38, 'Food Supplements', 200000, '2024-02-20', '2024-03-05', 'PEN', 'IN003', 'PM009', 'GA003');
INSERT INTO `resourceallocation_t` VALUES (39, 'Water Filters', 1000, '2024-05-10', '2024-05-20', 'PEN', 'IN004', 'PM008', 'GA004');

-- ----------------------------
-- Table structure for teststat
-- ----------------------------
DROP TABLE IF EXISTS `teststat`;
CREATE TABLE `teststat`  (
  `centerID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `diseaseID` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `month` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `year` int(11) NOT NULL,
  `population_count` int(11) NOT NULL,
  PRIMARY KEY (`centerID`, `diseaseID`) USING BTREE,
  INDEX `stat_FK2`(`diseaseID`) USING BTREE,
  CONSTRAINT `teststat_ibfk_1` FOREIGN KEY (`centerID`) REFERENCES `interventioncentre_t` (`centerID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `teststat_ibfk_2` FOREIGN KEY (`diseaseID`) REFERENCES `disease_t` (`diseaseID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of teststat
-- ----------------------------
INSERT INTO `teststat` VALUES ('IC001', 'D001', 'January', 2024, 100);
INSERT INTO `teststat` VALUES ('IC002', 'D002', 'February', 2024, 150);
INSERT INTO `teststat` VALUES ('IC003', 'D003', 'March', 2024, 200);
INSERT INTO `teststat` VALUES ('IC004', 'D004', 'April', 2024, 250);
INSERT INTO `teststat` VALUES ('IC005', 'D005', 'May', 2024, 300);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`userId`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Sarmin Akter', 'sarmin', 'admin', '123', 'sarmin@gmail.com');

SET FOREIGN_KEY_CHECKS = 1;
