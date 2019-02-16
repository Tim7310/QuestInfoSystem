-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2019 at 06:38 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbqis`
--

-- --------------------------------------------------------

--
-- Table structure for table `lab_chemistry`
--

CREATE TABLE `lab_chemistry` (
  `chemID` int(15) NOT NULL,
  `TransactionID` int(15) NOT NULL,
  `PatientID` int(15) NOT NULL,
  `FBS` varchar(255) NOT NULL,
  `FBScon` varchar(255) NOT NULL,
  `BUA` varchar(255) NOT NULL,
  `BUAcon` varchar(255) NOT NULL,
  `BUN` varchar(255) NOT NULL,
  `BUNcon` varchar(255) NOT NULL,
  `CREA` varchar(255) NOT NULL,
  `CREAcon` varchar(255) NOT NULL,
  `CHOL` varchar(255) NOT NULL,
  `CHOLcon` varchar(255) NOT NULL,
  `TRIG` varchar(255) NOT NULL,
  `TRIGcon` varchar(255) NOT NULL,
  `HDL` varchar(255) NOT NULL,
  `HDLcon` varchar(255) NOT NULL,
  `LDL` varchar(255) NOT NULL,
  `LDLcon` varchar(255) NOT NULL,
  `CH` varchar(255) NOT NULL,
  `VLDL` varchar(255) NOT NULL,
  `Na` varchar(255) NOT NULL,
  `K` varchar(255) NOT NULL,
  `Cl` varchar(255) NOT NULL,
  `ALT` varchar(255) NOT NULL,
  `AST` varchar(255) NOT NULL,
  `HB` varchar(255) NOT NULL,
  `PathID` int(15) NOT NULL,
  `MedID` int(15) NOT NULL,
  `QualityID` int(15) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_chemistry`
--

INSERT INTO `lab_chemistry` (`chemID`, `TransactionID`, `PatientID`, `FBS`, `FBScon`, `BUA`, `BUAcon`, `BUN`, `BUNcon`, `CREA`, `CREAcon`, `CHOL`, `CHOLcon`, `TRIG`, `TRIGcon`, `HDL`, `HDLcon`, `LDL`, `LDLcon`, `CH`, `VLDL`, `Na`, `K`, `Cl`, `ALT`, `AST`, `HB`, `PathID`, `MedID`, `QualityID`, `CreationDate`, `DateUpdate`) VALUES
(1, 21, 18, '6.26', '113.82', '', '', '', '', '', '', '5.39', '208.11', '0.92', '81.42', '2.36', '91.12', '2.61', '100.77', '2.28', '0.42', '137.5', '', '', '31.8', '', '', 5, 3, 2, '2019-02-09 10:26:40', '2019-02-09 10:34:20'),
(2, 28, 24, '11.49', '208.91', '', '', '', '', '75', '0.85', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', '', '', '9.10', 5, 3, 2, '2019-02-12 07:00:45', '2019-02-12 07:04:36'),
(3, 45, 41, '9.12', '165.82', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', '', '', '', 5, 3, 1, '2019-02-14 09:38:09', '2019-02-14 09:38:17'),
(4, 44, 40, '6.27', '114.00', '397', '6.67', '', '', '85', '0.96', '3.28', '126.64', '1.36', '120.35', '1.36', '52.51', '1.29', '49.81', '2.41', '0.63', '137.7', '4.30', '106.5', '22.0', '', '', 5, 3, 1, '2019-02-14 09:40:05', '0000-00-00 00:00:00'),
(5, 46, 42, '7.65', '139.09', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', '', '', '', '', '', '', 5, 3, 1, '2019-02-15 10:57:11', '0000-00-00 00:00:00'),
(6, 47, 43, '', '', '457', '7.68', '', '', '79', '0.89', '', '', '', '', '', '', '', '0.00', '', '', '132.2', '4.26', '', '76.8', '', '', 5, 1, 1, '2019-02-15 12:14:35', '2019-02-15 12:14:54');

-- --------------------------------------------------------

--
-- Table structure for table `lab_hematology`
--

CREATE TABLE `lab_hematology` (
  `hemaID` int(15) NOT NULL,
  `TransactionID` int(15) NOT NULL,
  `PatientID` int(15) NOT NULL,
  `WhiteBlood` varchar(255) NOT NULL,
  `Hemoglobin` varchar(255) NOT NULL,
  `HemoNR` varchar(255) NOT NULL,
  `Hematocrit` varchar(255) NOT NULL,
  `HemaNR` varchar(255) NOT NULL,
  `Neutrophils` varchar(255) NOT NULL,
  `Lymphocytes` varchar(255) NOT NULL,
  `Monocytes` varchar(255) NOT NULL,
  `CBCOt` varchar(255) NOT NULL,
  `EOS` varchar(255) NOT NULL,
  `BAS` varchar(255) NOT NULL,
  `CBCRBC` varchar(255) NOT NULL,
  `PLT` varchar(255) NOT NULL,
  `PathID` int(15) NOT NULL,
  `MedID` int(15) NOT NULL,
  `QualityID` int(15) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_hematology`
--

INSERT INTO `lab_hematology` (`hemaID`, `TransactionID`, `PatientID`, `WhiteBlood`, `Hemoglobin`, `HemoNR`, `Hematocrit`, `HemaNR`, `Neutrophils`, `Lymphocytes`, `Monocytes`, `CBCOt`, `EOS`, `BAS`, `CBCRBC`, `PLT`, `PathID`, `MedID`, `QualityID`, `CreationDate`, `DateUpdate`) VALUES
(1, 18, 15, '12.3', '124', '', '0.37', ' ', '46', '19', '5', '', '0', '0', '4.78', '365', 5, 3, 2, '2019-02-08 14:06:16', '0000-00-00 00:00:00'),
(2, 24, 21, '11.6', '120', '', '0.38', ' ', '88', '10', '2', '', '0', '0', '4.31', '296', 5, 3, 2, '2019-02-09 13:46:26', '0000-00-00 00:00:00'),
(3, 23, 20, '7.7', '118', '', '0.36', '', '67', '28', '5', '', '0', '0', '4.40', '341', 5, 3, 2, '2019-02-09 13:50:14', '0000-00-00 00:00:00'),
(4, 42, 38, '5.9', '121', '', '0.37', ' ', '68.0', '25.0', '7.0', '', '0.0', '0', '4.78', '176', 5, 1, 2, '2019-02-11 16:44:52', '0000-00-00 00:00:00'),
(5, 43, 39, '12.5', '87', '', '0.27', ' ', '76', '20', '4', 'TWICE DONE', '0', '0', '3.12', '376', 5, 3, 2, '2019-02-12 13:49:40', '0000-00-00 00:00:00'),
(6, 44, 40, '7.6', '113', '', '0.48', ' ', '66', '29', '5', 'TWICE DONE', '0', '0', '7.41', '401', 5, 3, 1, '2019-02-14 09:39:04', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lab_microscopy`
--

CREATE TABLE `lab_microscopy` (
  `microID` int(11) NOT NULL,
  `TransactionID` int(10) NOT NULL,
  `PatientID` int(10) NOT NULL,
  `FecColor` varchar(255) NOT NULL,
  `FecCon` varchar(255) NOT NULL,
  `FecMicro` varchar(255) NOT NULL,
  `FecOt` varchar(255) NOT NULL,
  `UriColor` varchar(255) NOT NULL,
  `UriTrans` varchar(255) NOT NULL,
  `UriPh` varchar(255) NOT NULL,
  `UriSp` varchar(255) NOT NULL,
  `UriPro` varchar(255) NOT NULL,
  `UriGlu` varchar(255) NOT NULL,
  `RBC` varchar(255) NOT NULL,
  `WBC` varchar(255) NOT NULL,
  `Bac` varchar(255) NOT NULL,
  `MThreads` varchar(255) NOT NULL,
  `ECells` varchar(255) NOT NULL,
  `Amorph` varchar(255) NOT NULL,
  `CoAx` varchar(255) NOT NULL,
  `UriOt` varchar(255) NOT NULL,
  `LE` varchar(255) NOT NULL,
  `NIT` varchar(255) NOT NULL,
  `URO` varchar(255) NOT NULL,
  `BLD` varchar(255) NOT NULL,
  `KET` varchar(255) NOT NULL,
  `BIL` varchar(255) NOT NULL,
  `PregTest` varchar(255) NOT NULL,
  `PathID` int(10) NOT NULL,
  `MedID` int(10) NOT NULL,
  `QualityID` int(10) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_microscopy`
--

INSERT INTO `lab_microscopy` (`microID`, `TransactionID`, `PatientID`, `FecColor`, `FecCon`, `FecMicro`, `FecOt`, `UriColor`, `UriTrans`, `UriPh`, `UriSp`, `UriPro`, `UriGlu`, `RBC`, `WBC`, `Bac`, `MThreads`, `ECells`, `Amorph`, `CoAx`, `UriOt`, `LE`, `NIT`, `URO`, `BLD`, `KET`, `BIL`, `PregTest`, `PathID`, `MedID`, `QualityID`, `CreationDate`, `DateUpdate`) VALUES
(1, 4, 1, '-', '-', '', 'NO SPX', 'YELLOW', 'TURBID', '6.0', '1.025', 'Negative', 'Negative', '0-3', '0-4', 'N/A', 'Moderate', 'Moderate', 'N/A', 'N/A', 'NORMAL', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 5, 2, 4, '2019-02-07 15:03:25', '2019-02-07 15:03:54'),
(2, 9, 6, 'DARK BROWN', 'SOFT', 'ASCARIS OVA: 0-1/ HPF', '', 'YELLOW', 'SL. TURBID', '5.0', '1.030', 'Trace', 'Negative', '0-2', '14-18', 'N/A', 'Moderate', 'Moderate', 'N/A', 'N/A', 'N/A', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', '', 5, 1, 2, '2019-02-07 15:36:29', '2019-02-07 15:41:45'),
(3, 13, 10, '-', '-', '', '', 'LIGHT YELLOW', 'CLEAR', '6.0', '1.015', 'Negative', 'Negative', '0-2', '2-3', 'N/A', 'Moderate', 'Few', 'N/A', 'N/A', 'N/A', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', '', 5, 3, 2, '2019-02-07 16:50:53', '0000-00-00 00:00:00'),
(4, 20, 17, '-', '-', '', '', 'YELLOW', 'CLEAR', '5.0', '1.020', 'Negative', 'Negative', '0-2', '0-3', 'N/A', 'Rare', 'Few', 'N/A', 'N/A', 'N/A', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', '', 5, 2, 3, '2019-02-09 08:27:27', '0000-00-00 00:00:00'),
(5, 24, 21, '-', '-', '', '', 'DARK YELLOW', 'TURBID', '6.0', '1.020', 'Trace', 'Negative', '0-2', '25-30', 'Few', 'Many', 'Many', 'N/A', 'N/A', 'Pus in clump/s: 0-2/HPF', '1+', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', '', 5, 3, 2, '2019-02-09 13:43:36', '0000-00-00 00:00:00'),
(6, 23, 20, '-', '-', '', '', 'LIGHT YELLOW', 'SL. TURBID', '6.0', '1.020', 'Negative', 'Negative', '0-1', '1-4', 'N/A', 'Moderate', 'Moderate', 'N/A', 'N/A', 'N/A', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', '', 5, 3, 2, '2019-02-09 13:45:46', '0000-00-00 00:00:00'),
(7, 26, 23, '-', '-', '', '', 'LIGHT YELLOW', 'TURBID', '7.0', '1.010', 'Trace', 'Negative', '0-3', '30-35', 'N/A', 'Many', 'Many', 'N/A', 'N/A', 'N/A', '2+', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', '', 5, 3, 1, '2019-02-11 07:18:29', '0000-00-00 00:00:00'),
(8, 42, 38, '-', '-', '', '', 'LIGHT YELLOW', 'CLEAR', '6.0', '1.010', 'Negative', 'Negative', '0-1', '1-3', 'N/A', 'Rare', 'Rare', 'N/A', 'N/A', 'N/A', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', '', 5, 3, 2, '2019-02-11 16:47:20', '0000-00-00 00:00:00'),
(9, 28, 24, '-', '-', '', '', 'LIGHT YELLOW', 'TURBID', '5.0', '1.020', 'Trace', '3+', '0-3', '2-6', 'N/A', 'Rare', 'Moderate', 'N/A', 'N/A', 'Yeast cells: Moderate/HPF', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', '', 5, 2, 3, '2019-02-12 07:02:01', '0000-00-00 00:00:00'),
(10, 46, 42, '-', '-', '', '', 'LIGHT YELLOW', 'CLEAR', '5.0', '1.015', 'Negative', 'Negative', '0-2', '0-2', 'N/A', 'Few', 'Rare', 'N/A', 'N/A', 'N/A', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', '', 5, 2, 1, '2019-02-15 10:56:51', '0000-00-00 00:00:00'),
(11, 47, 43, '-', '-', '', '', 'YELLOW', 'HAZY', '6.5', '1.015', 'Trace', 'Negative', '0-3', '0-3', 'N/A', 'Moderate', 'Rare', 'N/A', 'N/A', 'N/A', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', 'Negative', '', 5, 2, 1, '2019-02-15 12:13:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lab_personnel`
--

CREATE TABLE `lab_personnel` (
  `personnelID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `MiddleName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `LicenseNO` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `PositionEXT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_personnel`
--

INSERT INTO `lab_personnel` (`personnelID`, `FirstName`, `MiddleName`, `LastName`, `LicenseNO`, `Position`, `PositionEXT`) VALUES
(1, 'KYLE MARTIN', 'S.', 'CANLAS', '0090169', 'MEDICAL TECHNOLOGIST', 'RMT'),
(2, 'JUSTIN', 'C.', 'CALARA', '0090255', 'MEDICAL TECHNOLOGIST', 'RMT'),
(3, 'ELAIDGA VICTORIA', 'C.', 'PABALAN', '0090639', 'MEDICAL TECHNOLOGIST', 'RMT'),
(4, 'EDWARD', 'S.', 'AGUSTIN', '0748084', 'QUALITY CONTROL', 'RN'),
(5, 'EMILIANO', '', 'DELA CRUZ', '0073345', 'PATHOLOGIST', 'MD');

-- --------------------------------------------------------

--
-- Table structure for table `lab_serology`
--

CREATE TABLE `lab_serology` (
  `seroID` int(15) NOT NULL,
  `TransactionID` int(15) NOT NULL,
  `PatientID` int(15) NOT NULL,
  `HBsAG` varchar(255) NOT NULL,
  `AntiHav` varchar(255) NOT NULL,
  `SeroOt` varchar(255) NOT NULL,
  `PathID` int(15) NOT NULL,
  `MedID` int(15) NOT NULL,
  `QualityID` int(15) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lab_toxicology`
--

CREATE TABLE `lab_toxicology` (
  `toxicID` int(15) NOT NULL,
  `TransactionID` int(15) NOT NULL,
  `PatientID` int(15) NOT NULL,
  `Meth` varchar(255) NOT NULL,
  `Tetra` varchar(255) NOT NULL,
  `Drugtest` varchar(255) NOT NULL,
  `PathID` int(15) NOT NULL,
  `MedID` int(15) NOT NULL,
  `QualityID` int(15) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `print_count`
--

CREATE TABLE `print_count` (
  `PrintID` int(20) NOT NULL,
  `TransactionID` int(30) NOT NULL,
  `PatientID` int(30) NOT NULL,
  `PrintCount` int(30) NOT NULL DEFAULT '1',
  `Test` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `print_count`
--

INSERT INTO `print_count` (`PrintID`, `TransactionID`, `PatientID`, `PrintCount`, `Test`) VALUES
(1, 9, 6, 2, 'MICROSCOPY'),
(2, 13, 10, 1, 'MICROSCOPY'),
(3, 18, 15, 6, 'HEMATOLOGY'),
(4, 20, 17, 9, 'MICROSCOPY'),
(5, 21, 18, 15, 'CHEMISTRY'),
(6, 23, 20, 3, 'HEMATOLOGY'),
(7, 24, 21, 3, 'HEMATOLOGY'),
(8, 24, 21, 2, 'MICROSCOPY'),
(9, 23, 20, 2, 'MICROSCOPY'),
(10, 4, 1, 7, 'MICROSCOPY'),
(11, 26, 23, 1, 'MICROSCOPY'),
(12, 42, 38, 1, 'HEMATOLOGY'),
(13, 42, 38, 1, 'MICROSCOPY'),
(14, 28, 24, 1, 'MICROSCOPY'),
(15, 28, 24, 1, 'CHEMISTRY'),
(16, 43, 39, 1, 'HEMATOLOGY'),
(17, 44, 40, 1, 'HEMATOLOGY'),
(18, 45, 41, 1, 'CHEMISTRY'),
(19, 44, 40, 1, 'CHEMISTRY'),
(20, 46, 42, 1, 'MICROSCOPY'),
(21, 46, 42, 1, 'CHEMISTRY');

-- --------------------------------------------------------

--
-- Table structure for table `qpd_class`
--

CREATE TABLE `qpd_class` (
  `ClassID` int(13) NOT NULL,
  `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL,
  `PatientID` int(13) NOT NULL,
  `MedicalClass` varchar(255) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `QC` varchar(255) NOT NULL,
  `QCLicense` int(22) NOT NULL,
  `CreationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qpd_class`
--

INSERT INTO `qpd_class` (`ClassID`, `TransactionID`, `PatientID`, `MedicalClass`, `Notes`, `QC`, `QCLicense`, `CreationDate`) VALUES
(1, 0000000000008, 5, '', '', 'Edward S. Agustin, RN', 0, '2019-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `qpd_items`
--

CREATE TABLE `qpd_items` (
  `ItemID` int(13) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `ItemPrice` decimal(19,2) NOT NULL,
  `ItemDescription` varchar(255) NOT NULL,
  `ItemType` varchar(50) NOT NULL,
  `TestType` int(10) NOT NULL DEFAULT '0',
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `qpd_items`
--

INSERT INTO `qpd_items` (`ItemID`, `ItemName`, `ItemPrice`, `ItemDescription`, `ItemType`, `TestType`, `CreationDate`, `DateUpdate`) VALUES
(3, 'HOME SERVICE', '150.00', 'HOME SERVICE W/IN 5KM RADIUS', 'HOME SERVICE', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(4, 'HOME SEVICE', '250.00', 'HOME SEVICE', 'HOME SERVICE', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(5, 'Mobilization', '2.00', 'Mobilization 120KM', 'HOME SERVICE', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(6, '2PI BASIC 5', '300.00', '2PI BASIC 5', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(7, '3C ETCI (FEMALE)', '540.00', '3C ETCI BASIC4+HBSAG+DT+PT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(8, '3C ETCI (MALE)', '500.00', '3C ETCI BASIC4+HBSAG+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(9, '3C N/Y BASIC 4+HBSAG+DT+PT/F', '540.00', 'BASIC 4+HBSAG+DT+PT/NANOX(FEMALE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(10, '3C NANOX BASIC 4+HBSAG+DT/MALE', '500.00', 'BASIC 4+HBSAG+DT/NANOX(MALE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(11, '3C SAMBON(FEMALE)', '540.00', 'SAMBON BASIC 4+HBsAg+DT+PT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(12, '3C SAMBON(MALE)', '500.00', 'SAMBON BASIC 4+HBsAg+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(13, '3C SHOWA(FEMALE)', '540.00', 'SHOWA BASIC 4+HBsAg+DT+PT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(14, '3C SHOWA(MALE)', '500.00', 'SHOWA BASIC 4+HBsAg+DT', 'INDUSTRIAL', 1, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(15, '3C SMK (BASIC 5+DT+HBSAG)', '540.00', 'BASIC 5+ DT+ HBSAG / MALE', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(16, '3C SMK(BASIC 5+PT+DT+HBSAG)', '580.00', 'BASIC 5+PT+DT+HBSAG/FEMALE', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(17, 'ABC HOTEL APE B4 WALK IN', '300.00', 'ABC HOTEL APE B4 WALK IN(CXR,PE,UA,CBC', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(18, 'ABC Hotel Basic 3', '300.00', 'Basic 4:  CBC, U/A, XRAY 11x14', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(19, 'ABS BASIC 5+HBsAg+DT+PT', '600.00', 'ABS BASIC 5+HBsAg+DT+PT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(20, 'ACAD (APE)BASIC 5', '350.00', 'ACAD (APE)BASIC 5 (CXR,F/A,UA,CBC,PE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(21, 'ACAD BASIC 5 + DT + HBSAG', '600.00', 'ACAD BASIC 5 + DT + HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(22, 'ACCOUNTANT DESK B5+HBSAG', '450.00', 'ADI BASIC 5 + HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(23, 'ACCURATE TELESERVICES (B5+DT)M', '500.00', 'ACCURATE TELESERVICES BASIC 5(CXR,CBC,UA,FA,PE)+ DT MALE', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(24, 'ACCURATE TELESERVICES(B5+DT+PT)', '520.00', 'ACCURATE TELESERVICES (BASIC 5) CXR,CBC,UA,FA,PE + DT + PT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(25, 'ADDITIONAL X-RAY FILM', '50.00', 'ADDITIONAL X-RAY FILM', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(26, 'AILA BASIC 5', '350.00', 'AILA BASIC 5', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(27, 'ALORICA BASIC 5', '300.00', 'ALORICA BASIC 5(CXR,FA,UA,CBC,P.E)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(28, 'AMSTERDAM APE(BASIC 3)', '180.00', 'AMSTERDAM APE(BASIC 3)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(29, 'ANGEL APE B5 + HBSAG', '430.00', 'ANGEL FAMOUS GOURMENT FOOD CORP.', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(30, 'APE TALLSHIPS B5+DT+HBSAG', '550.00', 'APE TALLSHIPS B5+DT+HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(31, 'APMAC BASIC 5+DT+HBsAg', '600.00', 'APMAC BASIC 5+DT+HBsAg(MALE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(32, 'APMAC BASIC 5+DT+PT+HBsAg', '700.00', 'APMAC BASIC 5+DT+PT+HBsAg(FEMALE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(33, 'ASIAN APPAREL FEMALE', '540.00', 'BASIC 4 + DT + PT + HBSAG (FEMALE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(34, 'ASIAN APPAREL MALE', '500.00', 'BASIC 4 + DT + HBSAG ( MALE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(35, 'AZZURRO APE(B5+HBSAG)', '450.00', 'AZZURRO APE(B5+HBSAG)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(36, 'AZZURRO BASIC 5+HBSAG+DT', '600.00', 'AZZURRO BASIC 5+HBSAG+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(37, 'B5+HBSAG+DT', '550.00', '', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(38, 'BAKERS PACKAGE', '770.00', 'BASIC 5 + DT+ HEPA A (ANTI HAV) CBC, FA,UA,PE,DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(39, 'Basic 3 (CXR PA, U/A, F/A)', '275.00', 'Basic 3 (CXR PA, U/A, F/A)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(40, 'BASIC 5 + DRUG TEST', '500.00', 'BASIC 5 (CXR 11x14, CBC, U/A, FA, PE) + DRUG TEST', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(41, 'BASIC 5 + DT + ECG', '650.00', 'BASIC 5 (CXR 11x14, CBC, U/A, FA, PE) + DRUG TEST + ECG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(42, 'BASIC 5 + HBSAG', '450.00', 'BASIC 5 (CXR 11x14, CBC, U/A, FA, PE) + HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(43, 'BASIC 5 + HBsAG + PT', '550.00', 'BASIC 5 (CXR 11x14, CBC, U/A, FA, PE) + HBSag + PT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(44, 'BASIC 5 + PT', '450.00', 'BASIC 5 (CXR 11x14, CBC, U/A, FA, PE) + PT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(45, 'Basic 5 Walk In', '350.00', 'Basic 5 Walk In (CBC, U/A, F/A, CXR PA, PE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(46, 'BASIC 5+DT+ PSYCH TEST', '900.00', 'BASIC 5+DRUG TEST+ PSYCH TEST', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(47, 'BASIC 5+DT+HBsAG', '600.00', 'BASIC 5 (CXR 11x14, CBC, U/A, FA, PE) + DT + HBSag (MALE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(48, 'BASIC 5+DT+PT+HBsAG', '700.00', 'BASIC 5 (CXR 11x14, CBC, U/A, FA, PE) +DT+PT+HBSag (FEMALE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(49, 'BEEPO (B5 + DT)', '500.00', 'BEEPO BASIC 5 (CXR 11x14, CBC, U/A, FA, PE) + DRUG TEST', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(50, 'Blank Ink Basic 5 + HBSag + DT', '600.00', 'Basic 5 (CBC, U/A, F/A, CXR & PE) + HBSag + Drug Testing', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(51, 'CALFURN APE WALK IN(BASIC 3+DT)', '300.00', 'CALFURN APE WALK IN(BASIC 3+DT)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(52, 'Calfurn Basic 3 APE', '150.00', 'Calfurn Basic 3 APE (XRAY, U?A, FA)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(53, 'CALFURN CHEST PA, DRUGTEST', '350.00', 'CHEST PA, DRUGTEST', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(54, 'CENTURY HOTEL (Basic 5 + DT )', '500.00', 'CENTURY HOTEL ( Basic 5 + DT )', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(55, 'CHEST (PORAC)', '150.00', 'CHEST (PORAC)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(56, 'CHEST PA XRAY Industrial', '150.00', 'CXR PA XRAY Industrial 11 X 14', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(57, 'CHUA EYE CLINIC APE', '200.00', 'CHUA EYE CLINIC APE(BASIC 3)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(58, 'CITY COLLEGE MALE', '600.00', 'CITY COLLEGE MALE                                (CXR,CBC,UA,FA,DT,HBSAG,P.E)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(59, 'CITY COLLEGE(B5+PT+DT+HBSAG)F', '650.00', 'CITY COLLEGE(B5+PT+DT+HBSAG)FEMALE', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(60, 'CLOUDSTAFF', '500.00', 'BASIC 5 + DRUG TEST', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(61, 'CLUB ZOO', '150.00', 'CHEST PA  ( CLUB ZOO)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(62, 'Confirmatory Drug Testing', '2.00', 'Drug testing with Biometrics', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(63, 'CORNERSTONE PRE EMP (B5+DT)', '500.00', 'CORNERSTONE PRE EMP (B5+DT)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(64, 'DBC BASIC 5', '300.00', 'DBC BASIC 5', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(65, 'Demand Science B5+DT+HBSag', '600.00', 'Demand Science B5+DT+HBSag', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(66, 'Dep Ed (BLOOD CHEM W/ECG &CXR)', '1.00', 'DEP ED(CXR,CBC,U/A,FBS,BUA,CREA,BUN,LIP,SGPT,ECG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(67, 'DNATA FEMALE', '520.00', 'BASIC 5 + PT + DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(68, 'DNATA MALE', '450.00', 'BASIC 5 + DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(69, 'DOG XRAY', '200.00', 'DOG XRAY', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(70, 'DRAGONFRUIT PHIL PE, DT + Xray', '499.00', 'PE, DT + Xray', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(71, 'DREAMBOY (XRAY)', '120.00', 'DREAMBOY (XRAY)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(72, 'EAGLE SKY(B5+DT+HBSAG)', '600.00', 'EAGLE SKY(B5+DT+HBSAG)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(73, 'ECG INDUSTRIAL', '150.00', '', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(74, 'EGS  (CXR,PE)', '150.00', 'EGS BASIC 2 ( XRAY/P.E.)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(75, 'EGS BASIC 5', '260.00', 'BASIC 5 (CXR, CBC, U/A, F/A, PE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(76, 'EGS COMPLETE PRE- EMP. (FEMALE)', '1.00', '(BASIC 5 + HBSAG + DT + PT + HIV)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(77, 'EGS COMPLETE PRE-EMP. ( MALE)', '925.00', '(BASIC 5 + HBSAG + DT+ HIV)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(78, 'ENVY BISTRO Htl Pre Emp Female', '700.00', 'Stadium Htl Pre Emp Female Basic 5 + HBSag + DT + PT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(79, 'ENVY BISTRO Htl Pre Emp Male', '600.00', 'Stadium Htl Pre Emp Male Basic 5 + HBSag + DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(80, 'Express Gifts Phil. Pre-Emp', '600.00', 'Express Gifts Phil. Basic 5 + HBsAg+Drug Test', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(81, 'EXTREMELY EXPRESSO (CXR,UA,FA)', '200.00', 'EXPRESSO (CXR,UA,FA)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(82, 'FONTANA', '600.00', 'FONTANA BASIC 5 + DT + HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(83, 'FOTON BASIC 5 + DT', '500.00', 'FOTON BASIC 5 + DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(84, 'GANGNAM B3 + DT', '350.00', 'B3 + DT (U/A, F/A, XRAY, D/T)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(85, 'GOOKJE IBAL MASSAGE APE', '500.00', 'GOOKJE IBAL MASSAGE APE(BASIC 5)+drug test', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(86, 'HAU CHTM (FEMALE)', '870.00', 'CBC,U/A,F/A,PT,HEPA A,HBSAG,DT,CHESTPA', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(87, 'HAU CHTM (MALE)', '770.00', 'CBC,U/A,FA, CXR PA, HEPA A,HBSAG,DT, PE', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(88, 'HAU CNAMS B5+DT+HBSaG+AntiHBSag', '810.00', 'HAU CNAMS Basic 5 (CBC, UA,FA, XRAY, PE) + DrugTest + HBSaG+ Anti-HBSag', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(89, 'HAU ENGINEERING FEMALE', '600.00', 'HAU ENGINEERING FEMALE\r\nBASIC 5+DT+PT+HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(90, 'HAU ENGRINEERING MALE', '500.00', 'HAU ENGR MALE\n(BASIC 5+HBSAG+DT)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(91, 'HAU IT Female (B5+DT+PT+HBSAG)', '600.00', 'HAU IT Female (B5+DT+PT+HBSAG)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(92, 'HAU IT Male (B5+DT+HBSAG)', '500.00', 'HAU IT Male (B5+DT+HBSAG)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(93, 'HAU SBA (Female)', '600.00', 'BASIC 5 + PT + DT + HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(94, 'HAU SBA (Male)', '500.00', 'HAU BASIC 5 + DT+ HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(95, 'HAU SED(B5+PT+DT+HBSAG)', '600.00', 'HAU SED (B5+PT+DT+HBSAG)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(96, 'HAU TOUR (FEMALE)', '600.00', 'HAU TOUR (FEMALE) B5+HBSAG+PT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(97, 'HAU TOUR (MALE)', '500.00', 'HAU TOUR (MALE) B5+HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(98, 'HAU TOURISM (FEMALE)', '870.00', 'CBC,U/A,FA,PT,HEPA A,DT,HBSAG,CHESTPA', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(99, 'HAU TOURISM (MALE)', '770.00', 'CBC,U/A,FA,HEPA A,DT,CHESTPA,HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(100, 'Hausland Basic 5+HBSag+DT', '600.00', 'Hausland Basic 5+HBSag+Drug Testing (Male)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(101, 'Hausland Basic 5+HBSag+PT (F)', '600.00', 'Hausland Basic 5+HBSag+PT (Female)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(102, 'HAWAII FAMILY  CENTER BPO B5+DT', '500.00', 'HAWAII FAMILY  CENTER BPO B5+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(103, 'HBsAg SCREENING', '149.00', 'HBsAg SCREENING INDUSTRIAL', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(104, 'HEINIMEX BASIC 5 + DRUG TEST', '600.00', 'BASIC 5 + DRUG TEST', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(105, 'HELLO PISTON NEBULIZER MINI', '2.00', 'HELLO PISTON NEBULIZER MINI', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(106, 'HEXUS APE WALK IN', '350.00', 'HEXUS APE WALK IN(BASIC 5)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(107, 'Hexus Pre Emp Basic 5+DT+HBSag', '600.00', 'Basic 5 + DT + HBSag (Male)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(108, 'Hexus PreEmp Basic5+DT+PT+HBSag', '700.00', 'Hexus Pre Emp Basic 5+DT+PT+HBSag (Female)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(109, 'IBEA BASIC 5 + BLD. TYPING', '450.00', 'IBEA BASIC 5 + BLD. TYPING ( IBEA TRADING AND MANPOWER SERVICES)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(110, 'IBOSS PRE EMPLOYMENT', '350.00', 'IBOSS    (BASIC 5)(CXR,CBC,FA,UA,PE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(111, 'IBS ESL Education, Inc.', '630.00', '', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(112, 'Ikabud BASIC 5+DT+HBsAg+PT', '700.00', 'Ikabud BASIC 5+DT+HBsAg+PT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(113, 'INSURANCE DESK INC.', '450.00', 'INSURANCE DESK INC. BASIC 5 + HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(114, 'IQOR Basic 5 + Drug Test', '500.00', 'Basic 5 (CBC, U/A, FA, CXR, PE) + Drug Test', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(115, 'JOHN-JEFF DRESSING PLANT', '550.00', 'BASIC 5 + HBSag + DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(116, 'JOLLIBEE B5+HBSAG+DT', '600.00', 'JOLLIBEE B5+HBSAG+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(117, 'KFC BASIC 5+HBSAG+DT', '600.00', 'BASIC 5+HBSAG+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(118, 'KOKOMOS APE WALK IN(B3)', '200.00', 'KOKOMOS APE WALK IN(B3)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(119, 'KOREGON (B5+DT)PACKAGE C', '500.00', 'KOREGON (B5+DT)PACKAGE C', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(120, 'KOREGON (B5+HBSAG)PACKAGE B', '400.00', 'KOREGON (B5+HBSAG)PACKAGE B', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(121, 'KOREGON(B5)PACKAGE A', '350.00', 'KOREGON(B5)PACKAGE A', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(122, 'KOREGON(B5+HBSAG+PT)PACKAGE D', '550.00', 'KOREGON(B5+HBSAG+PT)PACKAGE D', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(123, 'KOREGON(PACKAGE E)B5+DT+HBSAG', '600.00', 'KOREGON(PACKAGE E)B5+DT+HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(124, 'L&T BASIC 5 + DT + HBSAG', '600.00', 'BASIC 5 + DT + HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(125, 'LA FURGE PRE EMP.', '500.00', 'BASIC 5 + DRUG TEST', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(126, 'LAROSE BASIC 5 +DT+ANTI-HAV IgM', '670.00', 'BASIC 5 +DT+ANTI-HAV IgM (LA ROSE NOIRE INC.)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(127, 'LAS PALMAS (CHEST PA)INDUSTRIAL', '160.00', 'LAS PALMAS (CHEST PA)INDUSTRIAL', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(128, 'Le Roux Culinary Academy', '385.00', 'Basic 5', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(129, 'LEWIS GRAND MALE(PRE EMPLOYMENT', '600.00', 'LEWIS GRAND MALE(PRE EMPLOYMENT(BASIC 5+DT+HBSAG)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(130, 'LEWIS GRAND PRE EMP FEMALE', '700.00', 'LEWIS GRAND PRE EMPLOYMENT FEMALE(BASIC 5+DT+PT+HBSAG)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(131, 'Lots a Pizza Basic 3', '250.00', 'ua, fe, cxr', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(132, 'Madapdap HS Basic 3', '250.00', 'Madapdap HS Basic 3 (XRAY, U/A, F/A)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(133, 'MAGNAPEAK (HBsAg+DT+PE)', '400.00', 'MAGNAPEAK (HBsAg+DT+PE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(134, 'MAGNAPEAK APE', '765.00', 'PACKAGE B: BASIC 5 + LP', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(135, 'MAGNAPEAK APE PC', '915.00', 'PACKAGE C: BASIC 5 + ECG + LP', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(136, 'MAGNAPEAK APE PD', '415.00', 'PACKAGE D: LIPID PROFILE', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(137, 'MAGNAPEAK PRE-EMP.', '350.00', 'CXR + DRUG TEST + P.E', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(138, 'MARRIOTT HOTEL', '600.00', 'MARRIOTT HOTEL (CBC, PE,CHEST PA, U/A,FE, HBSAG+DRUGTEST)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(139, 'MAXIM (FRP)FEMALE', '580.00', 'MAXIM (FRP) FEMALE\nB5+PT+DT+HBSAG)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(140, 'MAXIM APMAC(FEMALE)', '650.00', 'BASIC 5+PT+DT+HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(141, 'MAXIM APMAC(MALE)', '600.00', 'BASIC 5+DT+HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(142, 'MAXIM BASIC 4 + DT+PT+HBSAG', '450.00', 'MAXIM BASIC 4 + DT+PT+HBSAG (FEMALE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(143, 'MAXIM BASIC 4+DT+HBSAG', '400.00', 'MAXIM BASIC 4+DT+HBSAG (MALE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(144, 'MAXIM ELEMATIC', '600.00', 'MAXIM ELEMATIC(FEMALE)BASIC4+HBsAG+DT+PT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(145, 'MAXIM ELEMATIC(MALE)', '550.00', 'MAXIM ELEMATIC(MALE)BASIC4+HBsAG+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(146, 'Maxim FRP (Male)', '530.00', 'BASIC 5+DT+HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(147, 'MAXIM SMK (MALE)', '530.00', 'BASIC 5+DT+HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(148, 'MAXIM SMK(FEMALE)', '580.00', 'BASIC 5+PT+DT+HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(149, 'MAXIM TANITECH(FEMALE)', '600.00', 'TANITECH(FEMALE)BASIC4+DT+PT+HBsAg', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(150, 'MAXIM TANITECH(MALE)', '550.00', 'TANITECH(MALE)BASIC4+DT+HBsAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(151, 'MAXIM TOKYO BASIC 4+HBSAG+DT', '450.00', 'MAXIM TOKYO BASIC 4(CBC,CXR,U/A,PE)+HBSAG+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(152, 'MAXIM TOKYO BASIC 4+HBSAG+PT+DT', '480.00', 'MAXIM TOKYO BASIC 4(CBC,CXR,U/A,PE)+HBSAG+PT+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(153, 'MCP (CXR,CBC,UA,FA,PE)', '290.00', 'MY CLOUD PEOPLE BASIC 5 (CXR PA, CBC, U/A, S/A, PE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(154, 'MDM SYSTEMS', '280.00', 'BASIC 5 (MDM SYSTEMS)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(155, 'MEATPLUS (SDF) Basic 5+HBSag+DT', '600.00', 'MEATPLUS (SDF) Basic 5 CXR11X14, U/A, F/A, CBC, PE + HBSag+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(156, 'MEDICAL CERTIFICATE', '200.00', 'FIT TO WORK', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(157, 'MEDICAL EXAM', '50.00', '(PEME) PRE- EMPLOYMENT MEDICAL EXAM', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(158, 'Metro Gaisano Marquee PEME', '550.00', 'Metro Gaisano Marquee PEME Basic 5 + HBSaG + Blood Type only', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(159, 'MIDORI BASIC 5+DT+HBsAg', '600.00', 'BASIC 5+DT+HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(160, 'MIMOSA CADDY BASIC 5 + DT', '500.00', 'MIMOSA CADDY BASIC 5 + DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(161, 'MISTER DONUT (CXR,UA,SA,)', '250.00', 'BASIC 3 Xray, U/A, F/A', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(162, 'Mister Frost BASIC5+DT+HBsAg+PT', '700.00', 'Mister Frost BASIC 5 + DT+ HBsAg + PT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(163, 'MISTER FROSTY PD', '350.00', 'Basic 5', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(164, 'Most Institute BASIC 5+HBsAg+DT', '600.00', 'Most Institute BASIC 5+HBsAg+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(165, 'NCR B5+DT', '500.00', 'NCR B5+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(166, 'NEO BASIC 5+HBSAG+ DT +PT', '700.00', 'NEO BASIC 5+ HBSAG +DT+PT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(167, 'NEO BASIC 5+HBSAG+DT', '600.00', 'NEO BASIC 5+HBSAG+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(168, 'NEOART APE', '1.00', 'CBC, FBS, LIPID PROFILE, SODIUM, POTASIUM, URIC ACID, BUN, CREATININE, SGPT, SGOT, U/A, CXR PA (INDUSTRIAL)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(169, 'NVR B5, DT, HBSAG', '765.00', 'B5, DT, HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(170, 'NVR BASIC 5 + DRUG TEST', '600.00', 'PHYSICAL EXAM, CBC, U/A, F/A, CHEST PA, DRUG TEST', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(171, 'OFFSURE', '350.00', 'OFFSURE BASIC 5', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(172, 'OI BASIC 5', '350.00', 'OI BASIC 5 INTELLICARE', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(173, 'OI BASIC 5+ECG', '650.00', 'OI BASIC 5+ECG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(174, 'OI BASIC 5+ECG+PAPS(FEMALE)', '975.00', 'OI BASIC 5+ECG+PAPS(FEMALE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(175, 'OPTIMAL (BASIC 5)', '280.00', 'OPTIMAL (BASIC 5)  UA/FA/CBC/CXR/PE', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(176, 'OPTIMAL OUTSOURCING', '280.00', 'BASIC 5 (CXR, CBC, U/A, F/A, PE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(177, 'ORIGO BPO B5+DT', '500.00', 'ORIGO BPO(BASIC 5 +DT)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(178, 'Owens APE Walk In B5', '350.00', 'Owens APE Walk In Basic 5 (CBC, UA, FA, XRAY, PE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(179, 'Owens APE Walk In B5+ECG+PAPs', '950.00', 'Owens APE Walk In B5+ECG+PAPs', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(180, 'Owens APE Walk In Basic 5 + ECG', '650.00', 'Owens APE Walk In Basic 5 + ECG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(181, 'OWEN\'S BASIC 5 + DRUG TEST', '500.00', 'BASIC 5 + DRUG TEST', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(182, 'PACKAGE C', '350.00', 'PACKAGE C (HbsAg, urinalysis, fecalysis, chest xray, physical exam)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(183, 'Penthouse Basic 5+HBSag+DT', '600.00', 'Penthouse APE Basic 5+HBSag+DT (CBC, U/A, F/A, HBsag, DT, Xray, PE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(184, 'Penthouse Basic 5+HBSag+DT+AHAV', '870.00', 'Penthouse Basic 5+HBSag+DT+Anti HAV for the Kitchen staff', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(185, 'PF P.E', '50.00', 'PF P.E', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(186, 'PHILLIES PRE EMPLOYMENT', '550.00', 'BASIC 5 + HBsAg + DRUG TEST', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(187, 'PHILLIES SPORTS APE', '370.00', 'BASIC 5 (CXR, CBC, U/A, F/A, PE) + HbSag', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(188, 'PRA CHEST PA+VDRL+UA+FA+PE', '1.00', 'Philippine Retirement Authority Package: Chest PA 14x17/ VDRL/ Complete Urinalysis/ Fecalysis/ PE', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(189, 'PROFIT MASTER BASIC 5 + DT', '500.00', 'PROFIT MASTER BASIC 5 + DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(190, 'PRUDENCE APE', '250.00', 'BASIC 5 (CXR, CBC, U/A, F/A, PE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(191, 'PRUDENCE PRE EMP', '550.00', 'BASIC 5  + DT + HEPA B', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(192, 'PUREGOLD', '850.00', 'B5 + DT+HBSAG+PREG TEST+BLOOD TYPING', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(193, 'QARAH SERVICES(B5+DT+HBSAG)', '550.00', 'QARAH SERVICES(B5+DT+HBSAG)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(194, 'QUEENS APE BASIC 3', '250.00', 'QUEENS APE BASIC 3', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(195, 'QUEENS HOTEL STAFF APE', '150.00', 'QUEENS HOTEL STAFF APE\r\nXRAY ONLY', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(196, 'RCI BASIC 5 + HBsAg + DT (MALE)', '650.00', 'RCI BASIC 5+HBSag+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(197, 'RCI BASIC 5+HBSag+PT+DT(FEMALE)', '700.00', 'RCI BASIC 5+HBSag+PT+DT(female)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(198, 'RCI DRUG TEST', '100.00', 'RCI DRUG TEST', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(199, 'ROMAC BASIC 5 + DT + HBsAg', '550.00', 'BASIC 5+DRUG TEST + HBsAg', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(200, 'SARGAS PRE-EMP FEMALE', '700.00', 'SARGAS PRE-EMP FEMALE (CBC, U/A, F/A, DT, PT, HBSAG, XRAY, PE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(201, 'SARGAS PRE-EMP MALE', '600.00', 'SARGAS PRE-EMP FEMALE (CBC, U/A, F/A, DT, HBSAG, XRAY, PE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(202, 'SHORE 360(B5+DT)', '500.00', 'SHORE 360(B5+DT)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(203, 'SKYCALL BASIC 5 + DT', '500.00', 'SKYCALL BASIC 5 + DT [cbc, u/a, f/a, XRAY, PE + DT]', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(204, 'SNIPER(DT+PSYCHE TEST)', '500.00', 'SNIPER(DT+PSYCHE TEST)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(205, 'SRCI BASIC 5+HBSAG+DT', '600.00', 'SRCI BASIC 5+HBSAG+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(206, 'STARTEK BASIC 4 + DT (Male)', '500.00', 'STARTEK BASIC 4 CBC, U/A, CXR, PE+ DT (Male)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(207, 'STARTEK Basic 4+DT+PT (Female)', '575.00', 'STARTEK BASIC 4 (CBC, U/A, CXR, PE)+ DT + PT (FEMALE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(208, 'STI Basic 5', '300.00', 'STI/Syllabus Basic 5 (CBC, U/A. F/A, XRAY, PE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(209, 'STI PHYSICAL EXAM', '100.00', 'STI PHYSICAL EXAM', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(210, 'STI(BASIC 5 + DT + HBSAG)', '600.00', 'STI(BASIC 5 + DT + HBSAG)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(211, 'STOTS BASIC 5+DT+HBSAG', '600.00', 'STOTS BASIC 5+DT+HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(212, 'Support Ninja Basic 5 + DT', '500.00', 'Support Ninja Basic 5 + DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(213, 'SUSIE\'S', '450.00', 'SUSIE\'S(BASIC 5+HBSAG)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(214, 'SWAGMAN HOTEL APE (BASIC 2)', '200.00', 'SWAGMAN HOTEL (BASIC 2)XRAY&UA', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(215, 'SWEET OPTION APE(B5)', '350.00', 'SWEET OPTION APE(BASIC 5 CXR,FA,UA,CBC,PE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(216, 'Systems APE non Avega', '350.00', 'System Plus College APE AVEGA Basic 5 (CBC, U/A, F/A, XRay, PE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(217, 'SYSTEMS OJT', '280.00', 'System Plus College OJT BASIC 5 (CXR, CBC, U/A, F/A, PE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(218, 'TALLSHIP PRE-EMP B5+DT', '500.00', 'BASIC 5(CBC,UA,CXR,FA,PE) + DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(219, 'TANIKA BASIC 5 +HBsAg+DT (MALE)', '730.00', 'TANIKA BASIC 5 +HBsAg+DT+BT (MALE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(220, 'TANIKA BASIC 5 +HBsAg+DT+PT+BT', '730.00', 'TANIKA BASIC 5 +HBsAg+DT+PT+BT (FEMALE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(221, 'TECHNO GLOBAL (B3+DT+PE+HBSAG)', '530.00', 'TECHNO GLOBAL INFINITY (B3+DT+PE+HBSAG)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(222, 'ThemeBuilders PreEMP (Female)', '849.00', 'Basic 5 (CBC, FA, UA, PE, CXR PA) + HBSaG, Drug Testing, Blood typing (no RH factor), Pregnancy Testing (Female)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(223, 'ThemeBuilders PreEMP (Male)', '749.00', 'Basic 5 (CBC, FA, UA, PE, CXR PA), HBSaG, Drug Testing, Blood typing (no RH Factor)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(224, 'Universal Glasses (Aguila)', '500.00', 'Universal Glasses (Aguila) Basic 5 + Drug Testing', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(225, 'VENCIO\'S LOMI HOUSE', '200.00', 'VENCIO\'S LOMI HOUSE(BASIC 3)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(226, 'Vitual Business Assistance, Inc', '350.00', 'BASIC 5 (CBC, U/A,F/A CXR, P.E)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(227, 'VMG BASIC 5+HBSAG+DT', '600.00', 'VISONDYNA BASIC 5+HBSAG+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(228, 'WELLFORM BASIC 5+DT+HBSAG', '550.00', 'WELLFORM BASIC 5+DT+HBSAG', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(229, 'WESTFIELD BASIC 5', '300.00', 'WESTFIELD BASIC 5', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(230, 'WITHCENTER(BASIC 5)', '350.00', 'WITHCENTER(BASIC 5) CXR,FA,UA,P.E,CBC', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(231, 'WONTECH APE(BASIC 5)', '350.00', 'WONTECH APE(BASIC 5)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(232, 'WONTECH BASIC 5+ DT (MALE)', '400.00', 'WONTECH BASIC 5+ DT (MALE)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(233, 'WONTECH BASIC 5+PT+DT', '450.00', 'BASIC 5+PT+DT', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(234, 'Yami Bulgogi Basic 3', '250.00', 'Yami Bulgogi Basic 3  Xray U/A F/A', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(235, 'YI SAN KOREAN RESTAURANT (B3)', '250.00', 'YI SAN B3 (UA, FA, CXR)', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(236, 'YOSHIOKA Basic 5', '350.00', 'Basic 5:  CBC, U/A, FA, CXR PA, PE', 'INDUSTRIAL', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(237, 'FWD PD 1 FULL MED. EXAM', '500.00', 'PD 1\r\n P.E - 500', 'INSURANCE', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(238, 'FWD PD 2 FULL MED. EXAM', '635.00', 'PD 2\r\nP.E -500\r\nUA-135', 'INSURANCE', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(239, 'FWD PD 3 FULL MED. EXAM', '1.00', 'PD 3\r\n U/A- 135, \r\nECG- 720, \r\nCXR PA - 324, \r\nP.E - 500', 'INSURANCE', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(240, 'FWD PD 4 FULL MED. EXAM.', '4.00', 'PD 4 \r\nP.E- 500\r\nU/A - 135\r\nECG- 720\r\nCXR PA - 324\r\nCBC- 225\r\nFBS - 144\r\nBUN - 171\r\nBUA - 378\r\nCREA - 171\r\nTOTAL CHOLESTEROL- 171\r\nSGPT - 198\r\nSGOT- 198\r\nHBAIC- 900\r\nNOTE: IF SGOT OR SGPT IS 2 X NORMAL, REQUIRES ALKALINE PHOSPHATASE AND GGTP\r\nADD. EXAM:\r\n', 'INSURANCE', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(241, 'FWD PD 5 FULL MED. EXAM', '4.00', 'PD 5\r\nP.E - 500\r\nU/A- 135\r\nECG- 720\r\nCXR PA- 324\r\nCBC - 225\r\nFBS - 144\r\nBUN- 171\r\nBUA- 378\r\nCREA- 171\r\nTOTAL CHOLESTEROL- 171\r\nSGPT- 198\r\nSGOT- 198\r\nHBAIC- 900\r\nHIV- 675\r\nNOTE: IF SGOT OR SGPT IS 2 X NORMAL REQUIRES ALKALINE PHOSPATASE AND GGTP\r\nADD. EXAM', 'INSURANCE', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(242, 'FWD PD 6 FULL MED. EXAM.', '5.00', 'PD 6\r\nP.E  - 500\r\nU/A- 135\r\nECG- 720\r\nCXR PA- 324\r\nCBC - 225\r\nFBS - 144\r\nBUN- 171\r\nBUA- 378\r\nCREA- 171\r\nTOTAL CHOLESTEROL- 171\r\nSGPT-198\r\nSGOT-198\r\nHBAIC- 900\r\nHIV- 675\r\nHBSAG- 297\r\nNOTE: IF SGOT OR SGPT IS 2 X NORMAL , REQUIRES ALKALINE PHOSPHATASE AND G', 'INSURANCE', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(243, 'KNEED A FOLD', '200.00', 'KNEED N FOLD(BASIC 3)', 'INSURANCE', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(244, 'WARTS REMOVAL 1000', '1.00', 'WARTS REMOVAL 1000', 'INSURANCE', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(245, 'WARTS REMOVAL 200', '200.00', 'WARTS REMOVAL 200', 'INSURANCE', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(246, 'WARTS REMOVAL 300', '300.00', 'WARTS REMOVAL 300', 'INSURANCE', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(247, 'WARTS REMOVAL 500', '500.00', 'WARTS REMOVAL 500', 'INSURANCE', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(248, 'WARTS REMOVAL 700', '700.00', 'WARTS REMOVAL 700', 'INSURANCE', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(249, 'ABG', '650.00', 'ABG', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(250, 'ABX MICROS CLEANER', '0.00', 'ABX MICROS CLEANER', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(251, 'ABX MINIDIL LMG', '0.00', 'ABX MINIDIL LMG', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(252, 'ABX MINILYSE', '0.00', '', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(253, 'AFB STAIN', '185.00', 'AFB STAIN', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(254, 'AFP  (Liver CA)', '750.00', 'AFP  (Liver CA)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(255, 'AFP  (Liver CA) (w/ Dilution)', '975.00', 'AFP  (Liver CA) (w/ Dilution)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(256, 'ALBUMIN SERUM', '250.00', '24 HR URINE ALBUMIN', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(257, 'ALBUMIN SERUM', '125.00', 'ALBUMIN SERUM', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(258, 'ALKALINE PHOSPHATASE (ALP)', '120.00', 'ALKALINE PHOSPHATASE (ALP)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(259, 'ALT', '2.00', 'ALT', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(260, 'AMMONIA (NH3)', '1.00', 'AMMONIA (NH3)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(261, 'AMOEBA CONC. TECHNIQUE', '175.00', 'AMOEBA CONC. TECHNIQUE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(262, 'AMYLASE SERUM', '520.00', 'AMYLASE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(263, 'AMYLASE SERUM', '600.00', '24 HR URINE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(264, 'ANA', '640.00', 'ANA', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(265, 'ANA (w/ Dilution)', '1.00', 'ANA (w/ Dilution)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(266, 'ANTI HAV IGM', '270.00', 'INDUSTRIAL(HAV IGM)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(267, 'ANTI-HAV IgG', '395.00', 'ANTI-HAV IgG', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(268, 'ANTI-HAV IgM', '370.00', 'ANTI-HAV IgM', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(269, 'ANTI-HBc IgG', '340.00', 'ANTI-HBc IgG', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(270, 'ANTI-HBc IgM', '340.00', 'ANTI-HBc IgM', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(271, 'ANTI-HBE', '330.00', 'ANTI-HBE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(272, 'ANTI-HBs', '210.00', 'ANTI-HBs', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(273, 'ANTI-HCV', '600.00', 'ANTI-HCV', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(274, 'ARSENIC ( TOXICOLOGY )', '871.00', 'ARSENIC ( TOXICOLOGY )', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(275, 'ASO', '270.00', 'ASO', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(276, 'ASO (w/ Dilution)', '450.00', 'ASO (w/ Dilution)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(277, 'AST', '0.00', 'AST', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(278, 'BARBITURATES (Quali)', '300.00', 'BARBITURATES (Quali)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(279, 'BENZODIAZEPINE (Quali)', '300.00', 'BENZODIAZEPINE (Quali)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(280, 'Beta Serum HCG (Quantitative)', '950.00', 'Beta Serum HCG (Quantitative)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(281, 'B-HCG  (H Mole)', '850.00', 'B-HCG  (H Mole)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(282, 'B-HCG  (H Mole) (w/ Dilution)', '1.00', 'B-HCG  (H Mole) (w/ Dilution)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(283, 'BILIRUBIN (B1B2)', '195.00', 'BILIRUBIN (B1B2)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(284, 'BLEEDING TIME', '70.00', 'BLEEDING TIME', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(285, 'BLOOD C/S ( THIO )', '950.00', 'BLOOD C/S ( THIO )', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(286, 'BLOOD C/S (OXOID)', '950.00', 'BLOOD C/S (OXOID)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(287, 'BLOOD C/S WITH ARD', '1.00', 'BLOOD C/S WITH ARD', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(288, 'BLOOD TYPE / RH FACTOR', '150.00', 'BLOOD TYPE / RH FACTOR', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(289, 'BLOOD TYPING', '75.00', 'BLOOD TYPING', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(290, 'BUN', '95.00', 'BUN', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(291, 'C3 (COMPLIMENT 3)', '525.00', 'C3 (COMPLIMENT 3)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(292, 'CA 125  (Ovarian CA)', '1.00', 'CA 125  (Ovarian CA)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(293, 'CA 125  (Ovarian CA) (w/ Diluti', '1.00', 'CA 125  (Ovarian CA) (w/ Dilution)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(294, 'CA 15-3  (Breast CA)', '1.00', 'CA 15-3  (Breast CA)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(295, 'CA 15-3  (Breast CA) (w/ Diluti', '1.00', 'CA 15-3  (Breast CA) (w/ Dilution)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(296, 'CA 19-9  (Pancreatic CA)', '1.00', 'CA 19-9  (Pancreatic CA)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(297, 'CA 19-9  (Pancreatic CA) (w/ Di', '2.00', 'CA 19-9  (Pancreatic CA) (w/ Dilution)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(298, 'CA 72-4 (GI CA)', '3.00', 'CA 72-4 (GI CA)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(299, 'CA 72-4 (GI CA) w/ Titer', '3.00', 'CA 72-4 (GI CA) w/ Titer', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(300, 'CADNIUM ( TOXICOLOGY )', '416.00', 'CADNIUM ( TOXICOLOGY )', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(301, 'CALCIUM', '600.00', '24 HR URINE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(302, 'CANNABINOIDS / METHAMPHETAMINE', '300.00', 'CANNABINOIDS / METHAMPHETAMINE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(303, 'CARBON DIOXIDE (CO2)', '300.00', 'CARBON DIOXIDE (CO2)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(304, 'CBC', '125.00', 'CBC', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(305, 'CEA  (Colorectal CA)', '750.00', 'CEA  (Colorectal CA)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(306, 'CEA  (Colorectal CA) (w/ Diluti', '950.00', 'CEA  (Colorectal CA) (w/ Dilution)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(307, 'CELL BLOCK & Slide Deposit', '600.00', 'CELL BLOCK & Slide Deposit for patient retrieval', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(308, 'CHLAMYDIA', '1.00', 'LAB TEST on sterile swab sample fr cervix. SO', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(309, 'CHLORIDE', '600.00', '24 HR URINE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(310, 'CHLORIDE', '120.00', 'CHLORIDE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(311, 'CHOLESTEROL', '95.00', 'CHOLESTEROL', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(312, 'CLOTTING TIME', '70.00', 'CLOTTING TIME', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(313, 'CMV Screening', '800.00', 'CMV Screening', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(314, 'COCAINE', '300.00', 'COCAINE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(315, 'Collection [Papsmear/Chlamidia]', '500.00', 'Collection [Papsmear/Chlamidia] by Midwife', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(316, 'COMPLETE URINALYSIS', '75.00', 'COMPLETE URINALYSIS', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(317, 'CONFIRMATORY TEST (Marijuana)', '1.00', 'CONFIRMATORY TEST (Marijuana)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(318, 'CONFIRMATORY TEST (Shabu)', '1.00', 'CONFIRMATORY TEST (Shabu)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(319, 'COOMB\'S TEST (RH CFM)', '175.00', 'COOMB\'S TEST (RH CFM)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(320, 'CORTISOL', '600.00', 'CORTISOL', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(321, 'COTININE (Nicotine Test)', '300.00', 'COTININE (Nicotine Test)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(322, 'CPK', '330.00', 'CPK', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(323, 'CPK MB', '450.00', 'CPK MB', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(324, 'CPK MM', '750.00', 'CPK MM', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(325, 'CREATININE', '95.00', 'Creatinine', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(326, 'CREATININE', '600.00', '24 HR URINE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(327, 'CREATININE CLEARANCE', '210.00', 'CREATININE CLEARANCE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(328, 'CRP', '220.00', 'CRP', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(329, 'CRP (w/ Dilution)', '450.00', 'CRP (w/ Dilution)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(330, 'CRT', '100.00', 'CRT', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(331, 'CULTURE & SENSITIVITY (BREAST)', '425.00', 'CULTURE & SENSITIVITY (BREAST)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(332, 'CULTURE & SENSITIVITY (GENITAL', '425.00', 'CULTURE & SENSITIVITY (GENITAL FLUID)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(333, 'CULTURE & SENSITIVITY (NASAL, E', '425.00', 'CULTURE & SENSITIVITY (NASAL, EAR, EYE EACH)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(334, 'CULTURE & SENSITIVITY (SPUTUM)', '425.00', 'CULTURE & SENSITIVITY (SPUTUM)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(335, 'CULTURE & SENSITIVITY (TISSUE,', '425.00', 'CULTURE & SENSITIVITY (TISSUE, SKIN, WOUND EACH)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(336, 'CULTURE & SENSITIVITY (VAGINAL)', '425.00', 'CULTURE & SENSITIVITY (VAGINAL)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(337, 'CULTURE AND SENSITIVITY (STOOL)', '520.00', 'CULTURE AND SENSITIVITY (STOOL)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(338, 'CULTURE ONLY', '350.00', 'CULTURE ONLY', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(339, 'CYANIDE ( TOXICOLOGY )', '1.00', 'CYANIDE ( TOXICOLOGY )', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(340, 'D-DIMER', '3.00', 'D-DIMER', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(341, 'DENGUE NSI (QUALI)', '1.00', 'DENGUE NSI (QUALI)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(342, 'DENGUE TEST IgM / IgG', '950.00', 'DENGUE TEST IgM / IgG', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(343, 'DGBH Complete Blood Count', '125.00', 'Divine Grace Birthing Home Complete Blood Count [RBC, WBC, Platelet]', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(344, 'DGBH HBsAg Screening', '145.00', 'Divine Grace Birthing Home HBsAg Screening', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(345, 'DGBH PAPSMEAR', '90.00', '', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(346, 'DGBH URINALYSIS', '45.00', 'Divine Grace Birthing Home Urinalysis 4 Parameter + Clinical Microscopy', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(347, 'DGBH VDRL/RPR', '90.00', 'DIVINE GRACE BIRTHING HOME VDRL/RPR', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(348, 'DIGOXIN', '720.00', 'DIGOXIN', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(349, 'DRUG TEST', '300.00', 'DRUG TEST', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(350, 'DU TEST', '200.00', 'DU TEST', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(351, 'EASYLYTE PACK SOLUTION', '0.00', 'NA/K/CL PACK SOLUTION', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(352, 'ECSTACY', '300.00', 'ECSTACY', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(353, 'Electrolites Na/K/CL', '11.00', 'Electrolites Na/K/CL Solution Pack', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(354, 'ENVIRONMENT ANALYSIS / AREA', '500.00', 'ENVIRONMENT ANALYSIS / AREA', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(355, 'ESR', '104.00', 'ESR', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(356, 'ESTRADIOL / ESTROGEN', '1.00', 'ESTRADIOL / ESTROGEN', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(357, 'ETHANOL (Serum)', '600.00', 'ETHANOL (Serum)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(358, 'Fasting Blood Sugar', '80.00', 'FBS', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(359, 'FECALYSIS', '65.00', 'FECALYSIS', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(360, 'FERRITIN', '1.00', 'FERRITIN', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(361, 'FERRITIN w/ Titer', '1.00', 'FERRITIN w/ Titer', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(362, 'FLUID ANALYSIS', '385.00', 'FLUID ANALYSIS', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(363, 'FNAB SMEAR (maximum 4 slides)', '375.00', 'FNAB SMEAR (maximum 4 slides)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(364, 'FREE PSA + TOTAL PSA', '1.00', 'FREE PSA + TOTAL PSA', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(365, 'FSH', '600.00', 'FSH', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(366, 'FT3 (ECLA)', '400.00', 'FT3 (ECLA)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(367, 'FT3, FT4 (RIA) (each)', '660.00', 'FT3, FT4 (RIA) (each)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(368, 'FT4 (ECLA)', '375.00', 'FT4 (ECLA)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(369, 'FUNGAL CULTURE', '275.00', 'FUNGAL CULTURE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(370, 'GASTRICBIOPSY FOR H.PYLORI', '1.00', 'GASTRICBIOPSY FOR H.PYLORI', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(371, 'GGTP', '275.00', 'GGTP', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(372, 'GLUCOSE', '600.00', '24 HR URINE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(373, 'GLUCOSE (each) PP 2HR', '85.00', 'GLUCOSE (each) PP 2HR', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(374, 'GLUCOSE PAP CP', '0.00', 'GLUCOSE PAP CP', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(375, 'GRAM STAIN', '110.00', 'GRAM STAIN', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(376, 'H. PYLORI (FECAL)', '370.00', 'QUALI', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(377, 'H. PYLORI (Quali)', '1.00', 'H. PYLORI (Quali)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(378, 'H. PYLORI IgG (QUANTI)', '3.00', 'H. PYLORI IgG (QUANTI)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00');
INSERT INTO `qpd_items` (`ItemID`, `ItemName`, `ItemPrice`, `ItemDescription`, `ItemType`, `TestType`, `CreationDate`, `DateUpdate`) VALUES
(379, 'H. PYLORI IgM (QUALI)', '3.00', 'H. PYLORI IgM (QUALI)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(380, 'H. PYLORI IgM (Quanti)', '3.00', 'H. PYLORI IgM (Quanti)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(381, 'HALOGEN LAMP', '30.00', '', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(382, 'HBA1-C', '500.00', 'HBA1-C', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(383, 'HBeAg', '330.00', 'HBeAg', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(384, 'HBsAg (Screening)', '165.00', 'HBsAg (Screening)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(385, 'HBsAg w/ Titer', '185.00', 'HBsAg w/ Titer', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(386, 'HBV-DNA (PCR Method)', '8.00', 'HBV-DNA (PCR Method) Discount P1,352.00', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(387, 'HCV-RNA', '8.00', 'HCV-RNA', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(388, 'HDL', '11.00', 'HDL DIRET CP', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(389, 'HDL CHOLE', '0.00', 'HDL CHOLE 3 X 10 ML', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(390, 'HDL, LDL-VLDL', '185.00', 'HDL, LDL-VLDL', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(391, 'hema', '0.00', 'HEMA CALIBRATOR ABX MICROS', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(392, 'HEMA CONTROLS', '0.00', 'HEMA CONTROLS for ABX Micros ES 60 Low, Normal, High', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(393, 'HEPA (A & B Profile) ( 2 to 5 +', '1.00', 'HEPA (A & B Profile) ( 2 to 5 +', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(394, 'HEPA (A B C Profile) ( 2 to 10', '3.00', 'HEPA (A B C Profile) ( 2 to 10 )', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(395, 'HEPA B 5TEST CONFIRMATORY', '1.00', 'HBSAG TITER, Anti HBc IgM\nAnti- HBe\nHBe Ag, SGPT', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(396, 'HEPA-B Full Panel ( 2 to 7 )', '1.00', 'HEPA-B Full Panel ( 2 to 7 )', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(397, 'HEPA-B Screening Test (2+3)', '395.00', 'HEPA-B Screening Test (2+3)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(398, 'HEPATITIS C PCR GENOTYPING', '21.00', '', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(399, 'HGB & HCT', '95.00', 'HGB & HCT', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(400, 'HIGH SENSITIVE CRP', '650.00', 'HIGH SENSITIVE CRP', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(401, 'HISTOPATH / CYTOLOGY EXTRA LARG', '2.00', 'HISTOPATH / CYTOLOGY EXTRA LARGE (16.1CM AND ABOVE )', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(402, 'HISTOPATH / CYTOLOGY LARGE (7.1', '1.00', 'HISTOPATH / CYTOLOGY LARGE (7.1CM - 16.0CM)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(403, 'HISTOPATH / CYTOLOGY MEDIUM (5C', '850.00', 'HISTOPATH / CYTOLOGY MEDIUM (5CM - 7CM)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(404, 'HISTOPATH / CYTOLOGY SMALL (<5C', '600.00', 'HISTOPATH / CYTOLOGY SMALL (<5CM)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(405, 'HIV (1 & 2)', '1.00', 'HIV (1 & 2) (Quanti)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(406, 'HIV SCREENING', '375.00', 'HIV (1 & 2) (Quali)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(407, 'HSV 2 IgM', '2.00', 'HSV 2 IgM', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(408, 'HSV Screening', '800.00', 'HSV Screening', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(409, 'INDIA INK', '200.00', 'INDIA INK', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(410, 'INORGANIC PHOSPHORUS', '175.00', 'INORGANIC PHOSPHORUS', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(411, 'IONIZED CALCIUM', '450.00', 'IONIZED CALCIUM', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(412, 'IRON (Fe)', '350.00', 'IRON (Fe)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(413, 'JOSE FELICIANO COLLEGE FOUNDATI', '650.00', 'JOSE FELICIANO COLLEGE FOUNDATION (B5+HBSAG+DT+ISHIHARA)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(414, 'K Electrode', '0.00', 'K Electrode for EasyLyte', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(415, 'KOH MOUNT', '130.00', 'KOH MOUNT', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(416, 'LDH', '180.00', 'LDH', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(417, 'LE PREP.', '200.00', 'LE PREP.', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(418, 'LEAD ( TOXICOLOGY )', '416.00', 'LEAD ( TOXICOLOGY )', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(419, 'LEAD (Pb)', '880.00', 'LEAD (Pb)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(420, 'LH', '600.00', 'LH', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(421, 'LIPASE', '780.00', 'LIPASE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(422, 'LIPID PROFILE', '415.00', 'LIPID PROFILE (Chole,Trigly,HDL,LDL-VLDL,Chole/HDL Ratio)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(423, 'MAGNESIUM', '600.00', '24 HR URINE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(424, 'MAGNESIUM (Mg) SERUM', '250.00', 'MAGNESIUM (Mg)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(425, 'MALARIAL SMEAR', '125.00', 'MALARIAL SMEAR', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(426, 'MERCURY ( TOXICOLOGY )', '871.00', 'MERCURY ( TOXICOLOGY )', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(427, 'METAL PREPARATION (TOXICOLOGY)', '325.00', 'METAL PREPARATION (TOXICOLOGY)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(428, 'MICRAL TEST', '250.00', 'MICRAL TEST', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(429, 'MICROALBUMIN/CREATININE RATIO', '1.00', 'MICROALBUMIN/CREATININE RATIO', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(430, 'MINOTROL NORMAL', '5.00', 'MINOTROL (NORMAL CONTROL)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(431, 'MOTOR, STEPPER MICROS/P60', '0.00', '', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(432, 'MULTICAL', '20.00', 'PENTRA MULTICAL', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(433, 'Na Electrode', '0.00', 'Na Electrode for EasyLyte', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(434, 'NITRATE ( TOXICOLOGY )', '585.00', 'NITRATE ( TOXICOLOGY )', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(435, 'OCCULT BLOOD', '200.00', 'OCCULT BLOOD', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(436, 'OGCT (FLAVORED) 50 GMS.', '250.00', 'OGCT (FLAVORED) 50 GMS.', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(437, 'OGTT (FLAVORED) 50, 75, 100 GMS', '675.00', 'OGTT (FLAVORED) 50, 75, 100 GMS.', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(438, 'OPIATES', '300.00', 'OPIATES', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(439, 'PAP\'S SMEAR  Walk In Package', '720.00', 'PAP\'S SMEAR  Walk In Package', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(440, 'PAP\'S SMEAR ( READING )', '120.00', 'PAP\'S SMEAR ( READING )', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(441, 'PAP\'S SMEAR HMO (Collection)', '250.00', 'PAP\'S SMEAR HMO (Collection)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(442, 'PAPSMEAR', '100.00', 'PAPSMEAR (MIDWIFE/OB)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(443, 'PARATHYROID HORMONE (PTH)', '1.00', 'PARATHYROID HORMONE (PTH)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(444, 'PATERNITY TESTING', '18.00', 'ALLEGED FATHER AND CHILD', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(445, 'PENTRA HALOGEN LAMP', '0.00', 'HALOGEN LAMP', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(446, 'PERIPHERAL SMEAR', '125.00', 'PERIPHERAL SMEAR', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(447, 'PHENCYCLIDINE  (PCP)', '300.00', 'PHENCYCLIDINE  (PCP)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(448, 'PHOSPHORUS', '120.00', 'PHOSPHORUS', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(449, 'PHOSPORUS', '600.00', '24 HR URINE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(450, 'PLATELET COUNT', '110.00', 'PLATELET COUNT', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(451, 'POTASIUM', '120.00', 'POTASIUM', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(452, 'POTASIUM', '600.00', '24 HR URINE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(453, 'PREGNANCY TEST', '175.00', 'STAT PACK (Monoclonal) URINE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(454, 'PREGNANCY TEST (INDUSTRIAL)', '100.00', 'PREGNANCY TEST (INDUSTRIAL)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(455, 'PROGESTERONE', '1.00', 'PROGESTERONE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(456, 'PROLACTIN', '595.00', 'PROLACTIN', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(457, 'PROSTATIC ACID PHOS.(PACP) (Mal', '250.00', 'PROSTATIC ACID PHOS.(PACP) (Male)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(458, 'PROTEIN', '600.00', '24 HR URINE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(459, 'PROTHROMBIN TIME', '275.00', 'PROTHROMBIN TIME', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(460, 'PSA', '975.00', 'PSA', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(461, 'PSA (w/ Dilution)', '1.00', 'PSA (w/ Dilution)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(462, 'PTT  (APTT)', '325.00', 'PTT  (APTT)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(463, 'PURIFIED PROTIEN DERIVATIVE', '350.00', 'PURIFIED PROTEIN DERIVATIVE (PPD)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(464, 'RA / RF', '200.00', 'RA / RF', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(465, 'RA / RF (w/ Dilution)', '420.00', 'RA / RF (w/ Dilution)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(466, 'RBS', '80.00', 'RBS', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(467, 'RBS, 2HR. PP GLUCOSE (each', '80.00', 'RBS, 2HR. PP GLUCOSE (each)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(468, 'RBS/2HR PPBS', '80.00', 'RBS /2 HR PPBS', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(469, 'Reference Electrode for EasyLyte', '0.00', 'EasyLyte Machine Part', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(470, 'RETICULOCYTES COUNT', '125.00', 'RETICULOCYTES COUNT', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(471, 'RH TYPING', '75.00', 'RH TYPING', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(472, 'RUBELLA  IgG', '750.00', 'RUBELLA  IgG', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(473, 'RUBELLA  IgM', '1.00', 'RUBELLA  IgM', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(474, 'Rubella Screening', '800.00', 'Rubella Screening', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(475, 'SEMEN ANALYSIS', '240.00', 'SEMEN ANALYSIS', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(476, 'SERUM INSULIN', '960.00', 'INSULIN', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(477, 'SGOT (AST)', '110.00', 'SGOT (AST)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(478, 'SGPT (ALT)', '110.00', 'SGPT (ALT)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(479, 'SODIUM SERUM', '120.00', 'SODIUM', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(480, 'SODIUM SERUM', '600.00', '24 HR URINE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(481, 'Solution Valve for EasyLyte', '0.00', 'EasyLyte Machine Part', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(482, 'SPECIMEN FOR C/S WITH ARD', '1.00', 'SPECIMEN FOR C/S WITH ARD', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(483, 'Standard Package 1', '905.00', 'Standard Package:  FBS, BUN, CREA, Uric Acid, Lipid Profile, SGOT, SGPT', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(484, 'STONE ANALYSIS', '950.00', 'STONE ANALYSIS', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(485, 'STOOL PH', '60.00', 'STOOL PH', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(486, 'T3 (ECLA)', '275.00', 'T3 (ECLA)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(487, 'T3, T4 (RIA) (each)', '550.00', 'T3, T4 (RIA) (each)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(488, 'T4 (ECLA)', '275.00', 'T4 (ECLA)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(489, 'TESTOSTERONE', '1.00', 'TESTOSTERONE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(490, 'THYROGLOBULIN (ECLA)', '1.00', 'THYROGLOBULIN (ECLA)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(491, 'THYROGLOBULIN (IRMA)', '1.00', 'THYROGLOBULIN (IRMA)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(492, 'TIBC + IRON', '700.00', 'TIBC + IRON', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(493, 'TORCH TEST 4 parameter Screenin', '2.00', 'TORCH TEST 4 parameter Screening', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(494, 'TOTAL ACID PHOSPHATASE (ACP)', '220.00', 'TOTAL ACID PHOSPHATASE (ACP)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(495, 'TOTAL CALCIUM (TCa)', '156.00', 'TOTAL CALCIUM (TCa)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(496, 'TOTAL IgE', '950.00', 'TOTAL IgE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(497, 'TOTAL PROTEIN', '105.00', 'TOTAL PROTEIN', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(498, 'TOTAL PROTEIN A/G RATIO', '175.00', 'TOTAL PROTEIN A/G RATIO', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(499, 'Toxoplasma Screening', '800.00', 'Toxoplasma Screening', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(500, 'TPHA TITER', '1.00', 'TPHA TITER', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(501, 'TP-PA (Quali)', '360.00', 'TP-PA (Quali)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(502, 'TP-PA (w/ Dilution)', '1.00', 'TP-PA (w/ Dilution)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(503, 'TRIGLYCERIDE', '135.00', 'TRIGLYCERIDE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(504, 'TROPONIN  I (Quali)', '990.00', 'TROPONIN  I (Quali)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(505, 'TROPONIN T (Quali)', '990.00', 'TROPONIN T (Quali)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(506, 'TROPONIN T (Quanti)', '2.00', 'TROPONIN T (Quanti)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(507, 'TSH (ECLA)', '475.00', 'TSH (ECLA)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(508, 'TSH (IRMA)', '800.00', 'TSH (IRMA)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(509, 'Tubing Kit', '0.00', 'EasyLyte Machine Part', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(510, 'TYPHIDOT', '975.00', 'TYPHIDOT', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(511, 'UREA', '3.00', 'UREA', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(512, 'URIC ACID / BUA', '95.00', 'URIC ACID', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(513, 'URIC ACID / BUA', '600.00', '24 HR URINE', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(514, 'URINALYSIS', '75.00', 'COMPLETE URINALYSIS', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(515, 'URINE C/S', '455.00', 'CULTURE & SENSITIVITY (URINE)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(516, 'VALPROIC ACID', '720.00', 'VALPROIC ACID', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(517, 'VDRL / RPR', '90.00', 'VDRL / RPR', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(518, 'VDRL / RPR (w/ Dilution)', '300.00', 'VDRL / RPR (w/ Dilution)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(519, 'VITAMIN D ASSAY', '3.00', 'VITAMIN D ASSAY', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(520, 'WATER ANALYSIS', '650.00', '(2 parameters)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(521, 'WATER ANALYSIS (3- PARAMETER)', '850.00', '(3 - PARAMETER)', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(522, 'WBC & DIFF. COUNT', '105.00', 'WBC & DIFF. COUNT', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(523, 'WEIL FELIX TEST', '220.00', 'WEIL FELIX TEST', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(524, 'WIDAL TEST', '240.00', 'WIDAL TEST', 'CashLab', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(525, 'CALFURN PRE EMP. (CXR+DT)', '350.00', 'CXR+DT', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(526, 'CLARKTON HOTEL (BASIC3+HBSAG)', '415.00', 'BASIC3 + HBSAG', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(527, 'CONSULT AVEGA FCANLAS,MD', '300.00', 'CONSULT AVEGA FCANLAS,MD', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(528, 'CONSULT EASTWEST FACANLAS,MD', '300.00', 'CONSULT EASTWEST FACANLAS,MD', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(529, 'CONSULT INTELLICARE FACANLAS,MD', '300.00', 'CONSULT INTELLICARE FACANLAS,MD', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(530, 'CONSULT VALUCARE FACANLAS,MD', '300.00', 'CONSULT VALUCARE FACANLAS,MD', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(531, 'CONSULTATION FEE', '300.00', 'SPECIALIST MEDICAL CONSULTATION', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(532, 'Doctor\'s Surgery Fee', '2.00', '', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(533, 'DRUG TEST +P.E ONLY', '500.00', '', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(534, 'FACILITY FEE', '1.00', '', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(535, 'FIRSTCORE MULTI COOP', '600.00', 'BASIC5+DT+HBSAG', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(536, 'ISHIHARA TEST ( COLOR BLIND )', '150.00', 'ISHIHARA TEST ( COLOR BLIND )', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(537, 'J. ALCABASA ENT. & GEN. SVC INC', '700.00', 'BASIC 5+DT+HBSAG', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(538, 'Major operating room fee Proced', '5.00', 'Major operating room fee Proced within 2 hours', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(539, 'Minor operating rm fee Procedur', '2.00', 'Minor Operating Room Fee within 2 hours for  Ambulatory Surgery', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(540, 'OUR LADY OF FATIMA (FEMALE)', '550.00', 'BASIC 5 +DT+PT', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(541, 'OUR LADY OF FATIMA (MALE)', '470.00', 'BASIC 5+DT', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(542, 'PENTHOUSE HOTEL(B5+DT+HBSAG+PT)', '700.00', 'B5+DT+PT+HBSAG', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(543, 'PHYSICAL EXAM', '200.00', '', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(544, 'PROFESSIONAL FEE', '1.00', 'DUPLEX PROCEDURE', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(545, 'PSYCH TEST', '500.00', 'PSYCH TEST', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(546, 'SCREENING TEST FOR STD', '990.00', 'HBSAG, RPR, HIV SCREENING', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(547, 'VACCINE HEPATITIS B', '1.00', 'VACCINE HEPATITIS B  RECOMBINANT AMVAX', 'MEDICAL SERVICES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(548, 'BASIC HEALTH CHECK UP', '4.00', 'BASIC CHECK UP(CBC,FBS,BUN,CREA,BUA,CHOLE,TRI,HDL/LDL,SGPT,SGOT,ALK PHOS,NA,K,UA,CHEST PA,ECG,WHOLE AB.UTZ,)', 'PACKAGES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(549, 'CONVERGYS PRE EMP.(B5+DT)', '500.00', 'CONVERGYS PRE EMP.(B5+DT)', 'PACKAGES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(550, 'FIRE FIGHTER CBC,CXR,UA,ECG', '500.00', 'FIREFIGHTER CBC,CXR,UA,ECG (MALE)', 'PACKAGES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(551, 'FIRE FIGHTER(CBC,UA,CXR,ECG,PT)', '675.00', 'FIRE FIGHTER(CBC,UA,CXR,ECG,PT SERUM) FEMALE', 'PACKAGES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(552, 'FWD PD 7 FULL MED. EXAM', '1.00', 'PD 7\r\nP.E- 500\r\nFBS- 144\r\nBUN- 171\r\nCREA- 171\r\nCBC- 225\r\nTOTAL CHOLESTEROL- 171', 'PACKAGES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(553, 'GENERAL HEALTH CARE PROGRAM', '6.00', 'GENERAL HEALTH CARE PROGRAM(CBC,ESR,FBS,HBAIC,BUN,CREA,BUA,CHOLE,TRI,HDL/LDL,SGPT,SGOT,ALK PO4,TPAG,BILI(B1B2)GGT,NA,K,CL,TCA,CEA,UA,FA,OCCULT BLOOD,CHEST PA,ECG,WHOLE AB.UTZ.)', 'PACKAGES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(554, 'GOLD TREE(BASIC 5)', '350.00', 'GOLD TREE(BASIC 5)', 'PACKAGES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(555, 'HAU SED(B5+HBSAG+DT)', '500.00', 'HAU SED(B5+HBSAG+DT)', 'PACKAGES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(556, 'PRE NATAL PACKAGE', '920.00', 'BLOOD TYPING,CBC,URINALYSIS,HBSAG,RPR,HIV', 'PACKAGES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(557, 'PRIME HEALTH CARE PROGRAM(MALE)', '5.00', 'PRIME HEALTH CARE PROGRAM(MALE) CBC,ESR,FBS,BUN,CREA,URIC ACID,LIPID PROF,SGPT,SGOT,ALK PO4,TPAG,BILI,(B1,B2)GGT,NA,K,CHLORIDE,TOTAL CALCIUM,HBAIC,PSA,CEA,TSH,UA,FA,OCCULT BLOOD', 'PACKAGES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(558, 'ROUTINE CHECK UP PACKAGE', '1.00', 'ROUTINE CHECK UP PACKAGE(CBC,FBS,BUN,CREA,BUA,LIPID,SGPT,SGOT,ALK PHOS,U/A,CHEST PA,ECG', 'PACKAGES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(559, 'SHANGHAI', '600.00', 'BASIC 5 +DT+HBSAG', 'PACKAGES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(560, 'SHANGHAI APE B5+HBSAG', '450.00', 'SHANGHAI APE B5+HBSAG', 'PACKAGES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(561, 'WONTECH/KHM(BASIC 5+ISHIHARA)', '350.00', 'WONTECH/KHM(BASIC 5+ISHIHARA)', 'PACKAGES', 0, '2019-01-16 15:21:03', '0000-00-00 00:00:00'),
(562, 'STERILE CUP', '25.00', ' ', 'CashLab', 0, '2019-02-07 15:12:39', '0000-00-00 00:00:00'),
(563, 'X-RAY ( CHEST PA )', '200.00', 'CHEST PA', 'CashImaging', 0, '2019-02-09 12:21:54', '0000-00-00 00:00:00'),
(564, 'DOG X-RAY', '200.00', 'DOG X-RAY', 'CashImaging', 0, '2019-02-09 13:00:58', '0000-00-00 00:00:00'),
(565, 'DOG X-RAY', '200.00', 'DOG X-RAY', 'CashImaging', 0, '2019-02-09 13:00:58', '0000-00-00 00:00:00'),
(566, 'ECG', '300.00', '12 LEADS', 'CashImaging', 0, '2019-02-15 09:01:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `qpd_labresult`
--

CREATE TABLE `qpd_labresult` (
  `LabID` int(13) NOT NULL,
  `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL,
  `PatientID` int(13) NOT NULL,
  `WhiteBlood` varchar(255) NOT NULL,
  `Hemoglobin` varchar(255) NOT NULL,
  `HemoNR` varchar(255) NOT NULL,
  `Hematocrit` varchar(255) NOT NULL,
  `HemaNR` varchar(255) NOT NULL,
  `Neutrophils` varchar(255) NOT NULL,
  `Lymphocytes` varchar(255) NOT NULL,
  `Monocytes` varchar(255) NOT NULL,
  `CBCOt` varchar(255) NOT NULL,
  `EOS` varchar(10) NOT NULL,
  `BAS` varchar(10) NOT NULL,
  `CBCRBC` varchar(10) NOT NULL,
  `PLT` varchar(10) NOT NULL,
  `FBS` varchar(10) NOT NULL,
  `FBScon` varchar(10) NOT NULL,
  `BUA` varchar(10) NOT NULL,
  `BUAcon` varchar(10) NOT NULL,
  `BUN` varchar(10) NOT NULL,
  `BUNcon` varchar(10) NOT NULL,
  `CREA` varchar(10) NOT NULL,
  `CREAcon` varchar(10) NOT NULL,
  `CHOL` varchar(10) NOT NULL,
  `CHOLcon` varchar(10) NOT NULL,
  `TRIG` varchar(10) NOT NULL,
  `TRIGcon` varchar(10) NOT NULL,
  `HDL` varchar(10) NOT NULL,
  `HDLcon` varchar(10) NOT NULL,
  `LDL` varchar(10) NOT NULL,
  `LDLcon` varchar(10) NOT NULL,
  `CH` varchar(10) NOT NULL,
  `VLDL` varchar(10) NOT NULL,
  `Na` varchar(10) NOT NULL,
  `K` varchar(10) NOT NULL,
  `Cl` varchar(10) NOT NULL,
  `ALT` varchar(10) NOT NULL,
  `AST` varchar(10) NOT NULL,
  `HB` varchar(10) NOT NULL,
  `Meth` varchar(255) NOT NULL,
  `Tetra` varchar(255) NOT NULL,
  `DT` varchar(255) NOT NULL,
  `HBsAg` varchar(255) NOT NULL,
  `PregTest` varchar(255) NOT NULL,
  `SeroOt` varchar(255) NOT NULL,
  `FecColor` varchar(255) NOT NULL,
  `FecCon` varchar(255) NOT NULL,
  `FecMicro` varchar(255) NOT NULL,
  `FecOt` varchar(255) NOT NULL,
  `UriColor` varchar(255) NOT NULL,
  `UriTrans` varchar(255) NOT NULL,
  `UriPh` varchar(255) NOT NULL,
  `UriSp` varchar(255) NOT NULL,
  `UriPro` varchar(255) NOT NULL,
  `UriGlu` varchar(255) NOT NULL,
  `RBC` varchar(255) NOT NULL,
  `WBC` varchar(255) NOT NULL,
  `Bac` varchar(255) NOT NULL,
  `MThreads` varchar(255) NOT NULL,
  `ECells` varchar(255) NOT NULL,
  `Amorph` varchar(255) NOT NULL,
  `CoAx` varchar(255) NOT NULL,
  `UriOt` varchar(255) NOT NULL DEFAULT 'N/A',
  `LE` varchar(10) NOT NULL,
  `NIT` varchar(10) NOT NULL,
  `URO` varchar(10) NOT NULL,
  `BLD` varchar(10) NOT NULL,
  `KET` varchar(10) NOT NULL,
  `BIL` varchar(10) NOT NULL,
  `Received` varchar(255) NOT NULL,
  `Printed` varchar(255) NOT NULL,
  `QC` varchar(255) NOT NULL,
  `Clinician` varchar(255) NOT NULL,
  `QCLIC` varchar(25) NOT NULL,
  `RMTLIC` varchar(10) NOT NULL,
  `PATHLIC` varchar(10) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qpd_labresult`
--

INSERT INTO `qpd_labresult` (`LabID`, `TransactionID`, `PatientID`, `WhiteBlood`, `Hemoglobin`, `HemoNR`, `Hematocrit`, `HemaNR`, `Neutrophils`, `Lymphocytes`, `Monocytes`, `CBCOt`, `EOS`, `BAS`, `CBCRBC`, `PLT`, `FBS`, `FBScon`, `BUA`, `BUAcon`, `BUN`, `BUNcon`, `CREA`, `CREAcon`, `CHOL`, `CHOLcon`, `TRIG`, `TRIGcon`, `HDL`, `HDLcon`, `LDL`, `LDLcon`, `CH`, `VLDL`, `Na`, `K`, `Cl`, `ALT`, `AST`, `HB`, `Meth`, `Tetra`, `DT`, `HBsAg`, `PregTest`, `SeroOt`, `FecColor`, `FecCon`, `FecMicro`, `FecOt`, `UriColor`, `UriTrans`, `UriPh`, `UriSp`, `UriPro`, `UriGlu`, `RBC`, `WBC`, `Bac`, `MThreads`, `ECells`, `Amorph`, `CoAx`, `UriOt`, `LE`, `NIT`, `URO`, `BLD`, `KET`, `BIL`, `Received`, `Printed`, `QC`, `Clinician`, `QCLIC`, `RMTLIC`, `PATHLIC`, `CreationDate`, `DateUpdate`) VALUES
(1, 0000000000008, 5, '7.6', '152', 'F:112-157', '0.48', 'F:0.34-0.45', '61', '29', '10', 'NORMAL', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'NEGATIVE', 'NEGATIVE', 'NEGATIVE', 'N/A', 'N/A', '', 'N/A', 'N/A', 'N/A', 'NO SPX ', 'DARK YELLOW', 'HAZY', '6.0', '1.025', 'Negative', 'Negative', '0-2', '0-3', 'NONE', 'Moderate', 'Few', 'NONE', 'NONE', 'NORMAL', '', '', '', '', '', '', 'Justin C. Calara, RMT', 'Emiliano Dela Cruz,MD', '', '', '', '', '', '2019-02-07 15:57:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `qpd_medhis`
--

CREATE TABLE `qpd_medhis` (
  `MedHisID` int(13) NOT NULL,
  `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL,
  `PatientID` int(13) NOT NULL,
  `asth` varchar(5) NOT NULL DEFAULT 'NO',
  `tb` varchar(5) NOT NULL DEFAULT 'NO',
  `dia` varchar(5) NOT NULL DEFAULT 'NO',
  `hb` varchar(5) NOT NULL DEFAULT 'NO',
  `hp` varchar(5) NOT NULL DEFAULT 'NO',
  `kp` varchar(5) NOT NULL DEFAULT 'NO',
  `ab` varchar(5) NOT NULL DEFAULT 'NO',
  `jbs` varchar(5) NOT NULL DEFAULT 'NO',
  `pp` varchar(5) NOT NULL DEFAULT 'NO',
  `mh` varchar(5) NOT NULL DEFAULT 'NO',
  `fs` varchar(5) NOT NULL DEFAULT 'NO',
  `alle` varchar(5) NOT NULL DEFAULT 'NO',
  `ct` varchar(5) NOT NULL DEFAULT 'NO',
  `hep` varchar(5) NOT NULL DEFAULT 'NO',
  `std` varchar(5) NOT NULL DEFAULT 'NO',
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qpd_patient`
--

CREATE TABLE `qpd_patient` (
  `PatientID` int(13) NOT NULL,
  `PatientRef` varchar(50) NOT NULL,
  `PatientType` varchar(50) NOT NULL,
  `CompanyName` varchar(100) NOT NULL,
  `Position` varchar(75) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `MiddleName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Birthdate` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `PatientBiller` varchar(255) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `SID` varchar(50) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `qpd_patient`
--

INSERT INTO `qpd_patient` (`PatientID`, `PatientRef`, `PatientType`, `CompanyName`, `Position`, `FirstName`, `MiddleName`, `LastName`, `Address`, `Birthdate`, `Email`, `Age`, `Gender`, `ContactNo`, `PatientBiller`, `Notes`, `SID`, `CreationDate`, `DateUpdate`) VALUES
(1, '43982061', ' ', 'BICYCLE POKER', 'POKER DEALER', 'RENETTE', 'SIGUA', 'MENDOZA', 'FATINA VILL. STA CRUZ', 'FEB 07, 2019', '', 30, 'FEMALE', '09054668961', 'BICYCLE POKER', '', '', '2019-02-07 13:55:45', '0000-00-00 00:00:00'),
(2, '24895310', ' ', 'KFC', '', 'JHUN', '', 'DAMASCO', 'BALIBAGO ANGELES CITY', 'JULY 16 1998', '', 20, 'MALE', '09168484209', 'WALK-IN', '', '', '2019-02-07 14:10:13', '0000-00-00 00:00:00'),
(3, '36729805', ' ', 'WALK-IN', '', 'ALVIN', 'TOLEDO', 'SANTOS', 'MADAPDAP', 'OCT 22, 1984', '', 34, 'MALE', '', 'WALK-IN', '', '', '2019-02-07 14:16:51', '0000-00-00 00:00:00'),
(4, '21460578', ' ', 'WALK-IN', '', 'MERCY LEAH GRACE', 'RAMOS', 'LAMORENA', 'TARLAC', '9-13-1990', '', 28, 'FEMALE', '09165492614', 'WALK-IN', '', '', '2019-02-07 14:22:45', '0000-00-00 00:00:00'),
(5, '56789120', ' ', 'BOOMERING INC.', 'MARKETING MANAGER', 'REIGNA AUDA', 'BEJAR', 'VALENCIA', 'CLARK PAMPANGA', '04-07-1979', '', 39, 'FEMALE', '09667252175', 'WALKIN', '', '', '2019-02-07 14:30:10', '0000-00-00 00:00:00'),
(6, '46713820', ' ', 'MELINDA TOLENTINO', '', 'ALTHEA', 'GATBONTON', 'VARGAS', 'MALABANAZ', '12-18-2002', '', 16, 'FEMALE', '09553623917', 'MELINDA TOLENTINO', '', '', '2019-02-07 14:41:58', '0000-00-00 00:00:00'),
(7, '30426857', ' ', 'WLAK-IN', '', 'ROSEMARIE', '', 'LABINA', '', '08-04-1989', '', 29, 'FEMALE', '09772630512', 'WALK-IN', '', '', '2019-02-07 15:11:36', '0000-00-00 00:00:00'),
(8, '42590876', ' ', 'COFFEEBEAN AND TEA LEFT', 'BARISTA', 'MICO PHILIP', 'DEL ROSARIO', 'DIMALANTA', 'ESSEL LPARK', '01-18-1997', '', 22, 'MALE', '09553425172', 'WALK-IN', '', '', '2019-02-07 15:20:44', '0000-00-00 00:00:00'),
(9, '49768213', ' ', 'ENVY BISTRO SPORT SNITES', 'UTILITY', 'CHRISTIAN CLARK', '', 'GARCIA', 'ANGELES PAMPANGA', '07-18-94', '', 24, 'MALE', '09218322371', 'ENVY BISTRO SPORT SNITES', '', '', '2019-02-07 15:29:30', '0000-00-00 00:00:00'),
(10, '93047821', ' ', 'DR. FROILAN CANLAS, M.D.', '', 'HAVERLEY', '', 'JOHN', '', '17-09-35', '', 84, 'MALE', '09278971633', 'DR. FROILAN CANLAS, M.D.', '', '', '2019-02-07 16:03:56', '0000-00-00 00:00:00'),
(11, '89162743', ' ', 'ANN MITZEL G. MATA OCAMPO, MD, DPDS', '', 'WILFREDO', 'LACSON', 'DIZON', 'BALIBAGI ANGELES', '', '', 65, 'MALE', '', 'ANN MITZEL G. MATA OCAMPO, MD, DPDS', '', '', '2019-02-08 09:28:16', '0000-00-00 00:00:00'),
(12, '02349156', ' ', 'METRO MALL', '', 'DANIEL', 'LAMSEN', 'DE VERA', 'ABACAN ANGELES CITY', '02-25-2001', '', 17, 'MALE', '09754162216', 'METRO MALL', '', '', '2019-02-08 12:33:42', '0000-00-00 00:00:00'),
(13, '24719380', ' ', 'WALK-IN', '', 'BRIAN', '', 'BALANGUE', '', '01-17-91', '', 28, 'MALE', '09198817579', 'WALK-IN', '', '', '2019-02-08 13:03:10', '0000-00-00 00:00:00'),
(14, '53672891', ' ', 'GOOKJE', '', 'ALMA', 'JAWALI', 'TUMUTONG', 'ANGELES CITY', '09-16-86', '', 32, 'FEMALE', '09168473791', 'GOOKJE', '', '', '2019-02-08 13:35:50', '0000-00-00 00:00:00'),
(15, '93106872', ' ', 'WALK-IN', '', 'MARK RAVEN', '', 'MOSCOSA', '', '04-07-2007', '', 11, 'MALE', '09398694278', 'WALK-IN', '', '', '2019-02-08 13:43:06', '0000-00-00 00:00:00'),
(16, '27485069', ' ', 'QUICK MINDS', 'CRO OFFICER', 'CAMILLE', 'CATABAN', 'PACPACO', 'ABACAN MALABANAS', '9-15-97', '', 21, 'FEMALE', '09362460800', 'QUICK MINDS', '', '', '2019-02-08 14:01:07', '0000-00-00 00:00:00'),
(17, '12804379', ' ', 'DR. FROILAN CANLAS, M.D.', '', 'VELIA', '', 'LOPEZ', '', '10-21-39', '', 78, 'FEMALE', '', 'DR. FROILAN CANLAS, M.D.', '', '', '2019-02-09 07:05:22', '0000-00-00 00:00:00'),
(18, '48072695', ' ', 'DR. R. NUDO, M.D.', '', 'EMIRITA MANIO', '', 'BACULI', '', '09-27-73', '', 45, 'FEMALE', '09328691350', 'DR. R. NUDO, M.D.', '', '', '2019-02-09 07:25:00', '0000-00-00 00:00:00'),
(19, '29607514', ' ', 'YOKOHAMA', '-', 'JUDY', 'RODRIGUEZ', 'DESALIZA', 'ANGELES CITY', '11-22-1991', '', 28, 'FEMALE', '09158194110', 'YOKOHAMA', '', '', '2019-02-09 09:15:35', '0000-00-00 00:00:00'),
(20, '69257813', ' ', 'WALK-IN', '', 'KAYLA', '', 'CANASA', '', '', '', 20, 'FEMALE', '09553586953', 'WALK-IN', '', '', '2019-02-09 12:25:34', '0000-00-00 00:00:00'),
(21, '17492085', ' ', 'WALK-IN', '', 'AIRA', '', 'CASTRO', 'BALETE SAN FERNANDO', '10-24-1999', '', 19, 'FEMALE', '', 'WALK-IN', '', '', '2019-02-09 12:35:40', '0000-00-00 00:00:00'),
(22, '06573294', ' ', 'WALK-IN', '', 'DOLLY', '', 'DE LEON', '', 'JULY 2017', '', 0, '', '', 'WALK-IN', '', '', '2019-02-09 13:02:15', '0000-00-00 00:00:00'),
(23, '38579104', ' ', 'WALK-IN', '', 'KAREN', '', 'SOLEDAD', 'NARCISO ST.', '05-07-1993', '', 25, 'FEMALE', '09462433637', 'WALK-IN', '', '', '2019-02-11 06:53:13', '0000-00-00 00:00:00'),
(24, '23941586', ' ', 'WALK-IN', '', 'LETICIA', 'P.', 'SABALBARO', 'ANGELES CITY', 'JUNE 29, 1941', '', 78, 'FEMALE', '', 'WALK-IN', '', '', '2019-02-11 07:22:20', '0000-00-00 00:00:00'),
(25, '36108927', ' ', 'WALK-IN', '', 'KARL LOU', 'GALMAN', 'TANEDO', 'DAU MABALACAT CITY', '05-02-1994', '', 24, 'MALE', '09156361854', 'WALK-IN', '', '', '2019-02-11 07:45:59', '0000-00-00 00:00:00'),
(26, '32816057', ' ', 'MIDORI', 'PRODUCTION SHUFFLER', 'EURICA', 'TORRES', 'PERALTA', 'DELA CRUZ ST. RIVERA, DAU MABALACAT', '09-24-95', '  ', 23, 'FEMALE', '09560877976', '  ', '', '', '2019-02-11 08:59:02', '0000-00-00 00:00:00'),
(27, '35279860', ' ', 'VUUZLE', 'MARKETING REP', 'JENNIFER', 'FORCADELA', 'RAZON', '0927 BURGOS ST. SAPANG BATO, ANGELES CITY', '07-07-87', ' ', 31, 'FEMALE', '09668097217', ' ', '', '', '2019-02-11 09:18:41', '0000-00-00 00:00:00'),
(28, '32975468', ' ', 'SM CLARK', '', 'MARVIN', 'DELA CRUZ', 'VIERNES', 'SALOME ST. ABACAN ROAD, ANGELES CITY', '08-11-75', ' ', 42, 'MALE', '09212656427', ' ', '', '', '2019-02-11 09:30:55', '0000-00-00 00:00:00'),
(29, '29756038', ' ', '  ', '  ', 'GLIZZLE', 'HERNANDEZ', 'LIWAG', '53 DEBRA ST. BALIBAGAO, ANGELES CITY', '06-18-87', '', 31, 'FEMALE', '09496384424', '', '', '', '2019-02-11 09:59:46', '0000-00-00 00:00:00'),
(30, '96783102', ' ', 'RL GAS STATION', '', 'ELEMAR', 'MANOLONG', 'DIAZ', 'PORAC PAMPANGA', '02-02-95', '', 24, 'MALE', '09224107108', '', '', '', '2019-02-11 10:10:13', '0000-00-00 00:00:00'),
(31, '27169340', ' ', 'PAMPANGA STATE AGRICULTURAL UNIVERSITY', '  ', 'GILLAN', 'GUEVARRA', 'SIMODIO', '177 MALIGAYA PULUNG MARAGUL, ANGELES CITY', '12-19-99', 'gillansimodio@gmail.com', 19, 'MALE', '09289409638', ' ', '', '', '2019-02-11 10:19:56', '0000-00-00 00:00:00'),
(32, '53640721', ' ', 'DAE CHANG', '', 'WILLIE', 'E.', 'GONZALES', 'DAU, MABALACAT CITY', '05-20-81', '', 38, 'MALE', '09215446499', 'DAE CHANG', '', '', '2019-02-11 10:32:29', '0000-00-00 00:00:00'),
(33, '07613259', ' ', 'DAE CHANG', '', 'REMWEL', 'F.', 'DELA CRUZ', 'DAU MABALACAT PAMPANGA', '12-07-79', '', 38, 'MALE', '09124023056', 'DAE CHANG', '', '', '2019-02-11 10:37:11', '0000-00-00 00:00:00'),
(34, '75246138', ' ', 'DAE CHANG', '', 'TEDDY', 'L.', 'PUGONG', 'DAU, MABALACAT', '04-22-92', '', 26, 'MALE', '09070205717', 'DAE CHANG', '', '', '2019-02-11 10:40:28', '0000-00-00 00:00:00'),
(35, '05498236', ' ', 'DAE CHANG', '', 'RETCHIE', 'ABOGADO', 'SANDULAN', 'DAU MABALACAT PAMPANGA', '10-12-97', '', 21, 'MALE', '09216768594', 'DAE CHANG', '', '', '2019-02-11 10:42:47', '0000-00-00 00:00:00'),
(36, '69320571', ' ', 'DAE CHANG', '', 'BRYAN', 'CRUZ', 'DEL MONTE', 'DAU MABALACAT, PAMPANGA', '09-13-93', '', 25, 'MALE', '09094524015', 'DAE CHANG', '', '', '2019-02-11 10:45:09', '0000-00-00 00:00:00'),
(37, '21097486', ' ', 'ENVY BISTRO SPORTS SUITES, INC.', 'WAITRESS', 'CHARLENE CARL', 'TANGLAO', 'BASILIO', 'MAGALANG, PAMPANGA', '11-24-95', 'zchabasilio@gmail.com', 23, 'FEMALE', '09750063973', ' ', '', '', '2019-02-11 10:54:07', '0000-00-00 00:00:00'),
(38, '02916375', ' ', 'WALK-IN', '', 'JEFFEN CLYDE', '', 'VISTO', 'STA. MARIA VILLAGE 2 ', '11-05-2006', '', 12, 'MALE', '', 'WALK-IN', '', '', '2019-02-11 15:54:40', '0000-00-00 00:00:00'),
(39, '90473518', ' ', 'DR. ROMA SHYKA VELASQUEZ, M.D', '', 'ANDREA ', '', 'SOMBILLO', '', '10-22-1986', '', 32, 'FEMALE', '', 'DR. ROMA SHYKA VELASQUEZ, M.D', '', '', '2019-02-12 13:26:48', '0000-00-00 00:00:00'),
(40, '46725038', ' ', 'DR. FROILAN CANLAS, M.D', '', 'PABLO', '', 'MALABANAN', 'STA. TERESITA ANGELES CITY', '01-15-1940', '', 79, 'MALE', '09271495967', 'DR. FROILAN CANLAS, M.D', '', '', '2019-02-14 06:42:56', '0000-00-00 00:00:00'),
(41, '63189207', ' ', 'WALK-IN', '', 'JENNIFER', 'A.', 'EPIL', 'SANTOS ST. ANGELES CITY', '10-21-1980', '', 38, 'FEMALE', '09508184780', 'WALK-IN', '', '', '2019-02-14 07:47:09', '0000-00-00 00:00:00'),
(42, '45809372', ' ', 'WALK-IN', '', 'RICARDO', 'S.', 'LAYUG', 'NARCISO ST. MALABANIAS ANGELES CITY', '', '', 62, 'MALE', '09172468559', 'WALK-IN', '', '', '2019-02-15 08:17:35', '0000-00-00 00:00:00'),
(43, '80417293', ' ', 'EUGENE A TONGOL,MD', '-', 'JOHNSON', 'PANGILINAN', 'REYES', 'LALAPAC,VICTORIA TARLAC', '11-04-1996', '', 22, 'MALE', '09309582950', '', '', '', '2019-02-15 09:05:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `qpd_pdfresult`
--

CREATE TABLE `qpd_pdfresult` (
  `id` int(11) NOT NULL,
  `Receipient` varchar(50) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `ResultFiles` varchar(100) NOT NULL,
  `SendDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qpd_pe`
--

CREATE TABLE `qpd_pe` (
  `PExamID` int(13) NOT NULL,
  `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL,
  `PatientID` int(13) NOT NULL,
  `skin` varchar(255) NOT NULL,
  `hn` varchar(255) NOT NULL,
  `cbl` varchar(255) NOT NULL,
  `ch` varchar(255) NOT NULL,
  `abdo` varchar(255) NOT NULL,
  `extre` varchar(255) NOT NULL,
  `ot` varchar(255) NOT NULL,
  `find` varchar(255) NOT NULL,
  `Doctor` varchar(255) NOT NULL,
  `License` int(22) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qpd_sendemail`
--

CREATE TABLE `qpd_sendemail` (
  `SendEmailID` int(11) NOT NULL,
  `PatientID` int(11) NOT NULL,
  `TransactionID` int(11) NOT NULL,
  `RecipientsEmail` varchar(255) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `CreatedOn` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` varchar(50) NOT NULL,
  `ModifiedOn` datetime NOT NULL,
  `ModifiedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qpd_trans`
--

CREATE TABLE `qpd_trans` (
  `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL,
  `TransactionRef` varchar(50) NOT NULL,
  `PatientID` int(13) NOT NULL,
  `TransactionType` varchar(50) NOT NULL,
  `Cashier` varchar(50) NOT NULL,
  `ItemID` varchar(100) NOT NULL,
  `ItemQTY` varchar(50) NOT NULL,
  `Biller` varchar(50) NOT NULL,
  `TotalPrice` varchar(50) NOT NULL,
  `PaidIn` varchar(50) NOT NULL,
  `Discount` varchar(50) NOT NULL,
  `PaidOut` varchar(50) NOT NULL,
  `GrandTotal` varchar(50) NOT NULL,
  `TransactionDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0',
  `SalesType` varchar(100) NOT NULL DEFAULT 'sales'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `qpd_trans`
--

INSERT INTO `qpd_trans` (`TransactionID`, `TransactionRef`, `PatientID`, `TransactionType`, `Cashier`, `ItemID`, `ItemQTY`, `Biller`, `TotalPrice`, `PaidIn`, `Discount`, `PaidOut`, `GrandTotal`, `TransactionDate`, `status`, `SalesType`) VALUES
(0000000000001, '48927513', 1, 'ACCOUNT', 'CashCashier', '41', '1', 'DR. FROILAN CANLAS, M.D', '650', '', '0', '', '650', '2019-02-04 08:02:47', 1, 'sales'),
(0000000000002, '59243710', 2, 'CASH', 'ITDev', '304,316', '1,1', '', '200', '200', '0,0', '0', '200', '2019-02-05 09:41:20', 1, 'sales'),
(0000000000003, '07491538', 3, 'CASH', 'ITDev', '304', '1', 'DR. FROILAN CANLAS, M.D.', '125', '200', '0', '75', '125', '2019-02-05 09:57:11', 1, 'sales'),
(0000000000004, '95623810', 1, 'CASH', 'Timothy', '45', '1', 'BICYCLE POKER', '350', '500', '0', '150', '350', '2019-02-07 13:55:54', 1, 'sales'),
(0000000000005, '73516482', 2, 'CASH', 'Timothy', '117', '1', 'WALK-IN', '600', '600', '0', '0', '600', '2019-02-07 14:11:23', 1, 'sales'),
(0000000000006, '65423809', 3, 'CASH', 'Timothy', '349', '1', 'WALK-IN', '300', '300', '0', '0', '300', '2019-02-07 14:17:40', 1, 'sales'),
(0000000000007, '45839016', 4, 'CASH', 'Timothy', '349', '1', 'WALK-IN', '300', '300', '0', '0', '300', '2019-02-07 14:22:53', 1, 'sales'),
(0000000000008, '59326041', 5, 'CASH', 'Timothy', '40', '1', 'WALKIN', '500', '1000', '0', '500', '500', '2019-02-07 14:30:54', 1, 'sales'),
(0000000000009, '09845132', 6, 'CASH', 'Timothy', '514,359', '1,1', 'MELINDA TOLENTINO', '140', '200', '0,0', '60', '140', '2019-02-07 14:42:01', 1, 'sales'),
(0000000000010, '26437850', 7, 'CASH', 'Timothy', '562,253', '2,2', 'WALK-IN', '420', '1000', '0,0', '580', '420', '2019-02-07 15:13:14', 1, 'sales'),
(0000000000011, '14695802', 8, 'CASH', 'Timothy', '47', '1', 'WALK-IN', '600', '600', '0', '0', '600', '2019-02-07 15:21:36', 1, 'sales'),
(0000000000012, '92560817', 9, 'CASH', 'Timothy', '79', '1', 'ENVY BISTRO SPORT SNITES', '600', '1000', '0', '400', '600', '2019-02-07 15:30:20', 1, 'sales'),
(0000000000013, '61789504', 10, 'CASH', 'Timothy', '316', '1', 'DR. FROILAN CANLAS, M.D.', '75', '75', '0', '0', '75', '2019-02-07 16:04:15', 1, 'sales'),
(0000000000015, '81734256', 12, 'CASH', 'Timothy', '39', '1', 'METRO MALL', '275', '500', '0', '225', '275', '2019-02-08 12:46:36', 1, 'sales'),
(0000000000016, '12456780', 13, 'CASH', 'Timothy', '349', '1', 'WALK-IN', '300', '500', '0', '200', '300', '2019-02-08 13:03:26', 1, 'sales'),
(0000000000017, '70148365', 14, 'CASH', 'Timothy', '40,517', '1,1', 'GOOKJE', '590', '600', '0,0', '10', '590', '2019-02-08 13:36:42', 1, 'sales'),
(0000000000018, '64397125', 15, 'CASH', 'Timothy', '304', '1', 'WALK-IN', '125', '1000', '0', '875', '125', '2019-02-08 13:43:32', 1, 'sales'),
(0000000000019, '71638295', 16, 'CASH', 'Timothy', '40', '1', 'QUICK MINDS', '500', '500', '0', '0', '500', '2019-02-08 14:01:29', 1, 'sales'),
(0000000000020, '62071358', 17, 'CASH', 'Timothy', '316', '1', 'DR. FROILAN CANLAS, M.D.', '60', '60', '20', '0', '60', '2019-02-09 07:05:57', 1, 'sales'),
(0000000000021, '53278904', 18, 'CASH', 'Timothy', '479,478,422,358', '1,1,1,1', 'DR. R. NUDO, M.D.', '725', '1000', '0,0,0,0', '275', '725', '2019-02-09 07:25:07', 1, 'sales'),
(0000000000023, '65042387', 20, 'CASH', 'Timothy', '304,563,316', '1,1,1', 'WALK-IN', '400', '500', '0,0,0', '100', '400', '2019-02-09 12:29:59', 1, 'sales'),
(0000000000024, '63492071', 21, 'CASH', 'Timothy', '514,304', '1,1', 'WALK-IN', '200', '200', '0,0', '0', '200', '2019-02-09 12:37:38', 1, 'sales'),
(0000000000025, '04851263', 22, 'CASH', 'Timothy', '565', '1', 'WALK-IN', '200', '500', '0', '300', '200', '2019-02-09 13:02:23', 1, 'sales'),
(0000000000026, '90861534', 23, 'CASH', 'Timothy', '316', '1', 'WALK-IN', '75', '75', '0', '0', '75', '2019-02-11 06:55:12', 1, 'sales'),
(0000000000027, '90861534', 23, 'CASH', 'Timothy', '316', '1', 'WALK-IN', '75', '75', '0', '0', '75', '2019-02-11 06:55:12', 1, 'sales'),
(0000000000028, '97236140', 24, 'CASH', 'Timothy', '382,316,325,358', '1,1,1,1', 'WALK-IN', '700', '700', '0,20,20,20', '0', '700', '2019-02-11 07:22:29', 1, 'sales'),
(0000000000029, '02634571', 25, 'CASH', 'Timothy', '288', '1', 'WALK-IN', '150', '500', '0', '350', '150', '2019-02-11 07:46:08', 1, 'sales'),
(0000000000030, '62930875', 26, 'CASH', 'Timothy', '32', '1', '  ', '700', '700', '0', '0', '700', '2019-02-11 08:59:40', 1, 'sales'),
(0000000000031, '50684291', 27, 'CASH', 'Timothy', '45', '1', ' ', '350', '1000', '0', '650', '350', '2019-02-11 09:19:07', 1, 'sales'),
(0000000000032, '79682310', 28, 'CASH', 'Timothy', '39', '1', ' ', '275', '500', '0', '225', '275', '2019-02-11 09:32:25', 1, 'sales'),
(0000000000033, '65217930', 29, 'CASH', 'Timothy', '39', '1', '', '275', '300', '0', '25', '275', '2019-02-11 10:00:16', 1, 'sales'),
(0000000000034, '04139578', 30, 'CASH', 'Timothy', '39', '1', '', '275', '275', '0', '0', '275', '2019-02-11 10:11:37', 1, 'sales'),
(0000000000035, '87405913', 31, 'CASH', 'Timothy', '45', '1', ' ', '350', '350', '0', '0', '350', '2019-02-11 10:21:03', 1, 'sales'),
(0000000000036, '96523481', 32, 'CASH', 'Timothy', '349', '1', 'DAE CHANG', '300', '300', '0', '0', '300', '2019-02-11 10:33:05', 1, 'sales'),
(0000000000037, '18249756', 33, 'CASH', 'Timothy', '349', '1', 'DAE CHANG', '300', '300', '0', '0', '300', '2019-02-11 10:37:21', 1, 'sales'),
(0000000000038, '01524678', 34, 'CASH', 'Timothy', '349', '1', 'DAE CHANG', '300', '300', '0', '0', '300', '2019-02-11 10:40:37', 1, 'sales'),
(0000000000039, '91270854', 35, 'CASH', 'Timothy', '349', '1', 'DAE CHANG', '300', '300', '0', '0', '300', '2019-02-11 10:42:54', 1, 'sales'),
(0000000000040, '62384597', 36, 'CASH', 'Timothy', '349', '1', 'DAE CHANG', '300', '300', '0', '0', '300', '2019-02-11 10:45:16', 1, 'sales'),
(0000000000041, '03956174', 37, 'CASH', 'Timothy', '78', '1', ' ', '700', '1000', '0', '300', '700', '2019-02-11 10:54:22', 1, 'sales'),
(0000000000042, '47206813', 38, 'CASH', 'Timothy', '316,563,304', '1,1,1', 'WALK-IN', '400', '500', '0,0,0', '100', '400', '2019-02-11 15:55:55', 1, 'sales'),
(0000000000043, '35468029', 39, 'CASH', 'Timothy', '304', '1', 'DR. ROMA SHYKA VELASQUEZ, M.D', '125', '1000', '0', '875', '125', '2019-02-12 13:27:37', 1, 'sales'),
(0000000000044, '80354796', 40, 'CASH', 'Timothy', '304,310,451,479,478,325,422,512,358', '1,1,1,1,1,1,1,1,1', 'DR. FROILAN CANLAS, M.D', '1096', '1100', '20,0,0,0,20,20,20,20,20', '4', '1096', '2019-02-14 06:46:09', 1, 'sales'),
(0000000000045, '64380192', 41, 'CASH', 'Timothy', '358', '1', 'WALK-IN', '80', '100', '0', '20', '80', '2019-02-14 07:49:10', 1, 'sales'),
(0000000000046, '57126839', 42, 'CASH', 'CashCashier', '316,358', '1,1', 'WALK-IN', '124', '200', '20,20', '76', '124', '2019-02-15 08:17:54', 1, 'sales'),
(0000000000047, '72480695', 43, 'CASH', 'CashCashier', '316,304,325,479,451,512,478,422,358,566', '1,1,1,1,1,1,1,1,1,1', '', '1535', '2000', '0,0,0,0,0,0,0,0,0,0', '465', '1535', '2019-02-15 09:06:12', 1, 'sales');

-- --------------------------------------------------------

--
-- Table structure for table `qpd_vital`
--

CREATE TABLE `qpd_vital` (
  `VitalsID` int(13) NOT NULL,
  `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL,
  `PatientID` int(13) NOT NULL,
  `height` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `bmi` varchar(255) NOT NULL,
  `bp` varchar(255) NOT NULL,
  `pr` varchar(255) NOT NULL,
  `rr` varchar(255) NOT NULL,
  `uod` varchar(255) NOT NULL,
  `uos` varchar(255) NOT NULL,
  `cod` varchar(255) NOT NULL,
  `cos` varchar(255) NOT NULL,
  `cv` varchar(255) NOT NULL,
  `hearing` varchar(255) NOT NULL,
  `hosp` varchar(255) NOT NULL,
  `opr` varchar(255) NOT NULL,
  `pm` varchar(255) NOT NULL,
  `smoker` varchar(255) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `lmp` varchar(255) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qpd_xray`
--

CREATE TABLE `qpd_xray` (
  `XrayID` int(13) NOT NULL,
  `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL,
  `PatientID` int(13) NOT NULL,
  `Comment` text NOT NULL,
  `Impression` varchar(255) NOT NULL,
  `Radiologist` varchar(255) NOT NULL,
  `QA` varchar(255) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qpd_xray`
--

INSERT INTO `qpd_xray` (`XrayID`, `TransactionID`, `PatientID`, `Comment`, `Impression`, `Radiologist`, `QA`, `CreationDate`, `DateUpdate`) VALUES
(2, 0000000000001, 1, 'No abnormal densities seen in both lung parenchyma. The heart is normal in size and configuration. Aorta is unremarkable. The diaphragms, costrophrenic sulci and bony thorax are intact.', 'NORMAL CHEST FINDINGS', 'Salvador Ramirez,MD.DPBR', 'GEORGE SAPNU', '2019-02-04 12:33:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL,
  `class` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userName`, `userEmail`, `userPass`, `userStatus`, `tokenCode`, `class`) VALUES
(2, 'HCAVillegas', 'questphil.it@gmail.com', 'fc964f6a31b852efce2086f2cf1c22f4', 'Y', '043667ec0b15bc6cfd95a99952195a3f', 'Doctor'),
(3, 'AccountCashier', 'questphil.info@gmail.com', '5d95ff5c587a28300fb70d87f2a2e5f7', 'Y', 'e8f0686061140ad8d2fcb3f0332a3975', 'CashierACCOUNT'),
(4, 'CashCashier', 'questphil.billing@gmail.com', '5d95ff5c587a28300fb70d87f2a2e5f7', 'Y', 'c06692ac60a67a5de3b9ad6150f79e91', 'CashierCASH'),
(5, 'RecepMain', 'questphil.recep@gmail.com', '5d95ff5c587a28300fb70d87f2a2e5f7', 'Y', '8738ae11525f8bb95fdc41f8dbec9ed6', 'Medical Services'),
(6, 'LabMain', 'questphil.lab@gmail.com', '5d95ff5c587a28300fb70d87f2a2e5f7', 'Y', '0687572fe80c920600e417b8aa9f4454', 'Laboratory'),
(7, 'Imaging', 'questphil.imaging@gmail.com', '5d95ff5c587a28300fb70d87f2a2e5f7', 'Y', '5072b2507e9857083567d2f8d49d8a31', 'Imaging'),
(8, 'QCMain', 'questphil.qc@gmail.com', '5d95ff5c587a28300fb70d87f2a2e5f7', 'Y', 'a5cee71eee7ef6bec4d199a48c47d7db', 'Accounting'),
(12, 'ITDev', 'questphil.itinterns@gmail.com', '61edfe58cad9c86908713fb8725e3d12', 'Y', '381c1dca89321e6b10191e9945075275', 'Admin'),
(13, 'Timothy', 'questphil.tim@gmail.com', '61edfe58cad9c86908713fb8725e3d12', 'Y', '381c1dca89321e6b10191e9945075275', 'Cashier');

-- --------------------------------------------------------

--
-- Table structure for table `temp_patient`
--

CREATE TABLE `temp_patient` (
  `PatientID` int(13) NOT NULL,
  `PatientRef` varchar(50) NOT NULL,
  `PatientType` varchar(50) NOT NULL,
  `CompanyName` varchar(100) NOT NULL,
  `Position` varchar(75) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `MiddleName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Birthdate` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `SID` varchar(50) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `temp_trans`
--

CREATE TABLE `temp_trans` (
  `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL,
  `TransactionRef` varchar(50) NOT NULL,
  `PatientID` int(13) NOT NULL,
  `TransactionType` varchar(50) NOT NULL,
  `Cashier` varchar(255) NOT NULL,
  `ItemID` varchar(255) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `ItemDescription` varchar(255) NOT NULL,
  `ItemQTY` varchar(255) NOT NULL,
  `ItemPrice` varchar(255) NOT NULL,
  `Biller` varchar(50) NOT NULL,
  `LOE` int(13) NOT NULL,
  `AN` varchar(50) NOT NULL,
  `AC` varchar(50) NOT NULL,
  `Referral` varchar(50) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `SID` varchar(50) NOT NULL,
  `TotalPrice` decimal(19,2) NOT NULL,
  `GrandTotal` decimal(19,2) NOT NULL,
  `PaidIn` decimal(19,2) NOT NULL,
  `Discount` decimal(19,2) NOT NULL,
  `DiscountPer` int(11) NOT NULL,
  `PaidOut` decimal(19,2) NOT NULL,
  `PatientRef` varchar(50) NOT NULL,
  `CompanyName` varchar(100) NOT NULL,
  `Position` varchar(75) NOT NULL,
  `FirstName` varchar(40) NOT NULL,
  `MiddleName` varchar(40) NOT NULL,
  `LastName` varchar(40) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Birthdate` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `TransactionDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `user_privilege`
--

CREATE TABLE `user_privilege` (
  `privID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Doctor` int(11) NOT NULL DEFAULT '0',
  `CashierAccount` int(11) NOT NULL DEFAULT '0',
  `CashierCash` int(11) NOT NULL DEFAULT '0',
  `Medical` int(11) NOT NULL DEFAULT '0',
  `Laboratory` int(11) NOT NULL DEFAULT '0',
  `Imaging` int(11) NOT NULL DEFAULT '0',
  `QualityControl` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_privilege`
--

INSERT INTO `user_privilege` (`privID`, `UserID`, `Doctor`, `CashierAccount`, `CashierCash`, `Medical`, `Laboratory`, `Imaging`, `QualityControl`) VALUES
(1, 4, 0, 0, 1, 0, 0, 0, 0),
(2, 2, 2, 2, 2, 2, 2, 2, 2),
(3, 3, 0, 1, 0, 0, 0, 0, 0),
(4, 6, 0, 0, 0, 0, 1, 0, 0),
(5, 7, 0, 0, 0, 0, 0, 1, 0),
(6, 8, 0, 0, 0, 0, 0, 0, 1),
(7, 12, 2, 2, 2, 2, 2, 2, 2),
(8, 13, 0, 2, 2, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `xray_markers`
--

CREATE TABLE `xray_markers` (
  `markerID` int(10) NOT NULL,
  `PatientID` int(10) NOT NULL,
  `TransactionID` int(10) NOT NULL,
  `xrayFilm` varchar(100) NOT NULL,
  `xrayType` varchar(50) NOT NULL,
  `radTech` varchar(50) NOT NULL,
  `totalCount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `xray_markers`
--

INSERT INTO `xray_markers` (`markerID`, `PatientID`, `TransactionID`, `xrayFilm`, `xrayType`, `radTech`, `totalCount`) VALUES
(5, 9, 43, '11x14', 'CHEST PA', 'JORGE', 0),
(6, 39, 43, '11x14', 'CHEST PA', 'JORGE', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lab_chemistry`
--
ALTER TABLE `lab_chemistry`
  ADD PRIMARY KEY (`chemID`);

--
-- Indexes for table `lab_hematology`
--
ALTER TABLE `lab_hematology`
  ADD PRIMARY KEY (`hemaID`);

--
-- Indexes for table `lab_microscopy`
--
ALTER TABLE `lab_microscopy`
  ADD PRIMARY KEY (`microID`);

--
-- Indexes for table `lab_personnel`
--
ALTER TABLE `lab_personnel`
  ADD PRIMARY KEY (`personnelID`);

--
-- Indexes for table `lab_serology`
--
ALTER TABLE `lab_serology`
  ADD PRIMARY KEY (`seroID`);

--
-- Indexes for table `lab_toxicology`
--
ALTER TABLE `lab_toxicology`
  ADD PRIMARY KEY (`toxicID`);

--
-- Indexes for table `print_count`
--
ALTER TABLE `print_count`
  ADD PRIMARY KEY (`PrintID`);

--
-- Indexes for table `qpd_class`
--
ALTER TABLE `qpd_class`
  ADD PRIMARY KEY (`ClassID`);

--
-- Indexes for table `qpd_items`
--
ALTER TABLE `qpd_items`
  ADD PRIMARY KEY (`ItemID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `qpd_labresult`
--
ALTER TABLE `qpd_labresult`
  ADD PRIMARY KEY (`LabID`);

--
-- Indexes for table `qpd_medhis`
--
ALTER TABLE `qpd_medhis`
  ADD PRIMARY KEY (`MedHisID`),
  ADD UNIQUE KEY `MedHisRef` (`TransactionID`),
  ADD KEY `MedHisRef_2` (`TransactionID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `qpd_patient`
--
ALTER TABLE `qpd_patient`
  ADD PRIMARY KEY (`PatientID`),
  ADD UNIQUE KEY `id` (`PatientID`),
  ADD UNIQUE KEY `PatientRef` (`PatientRef`),
  ADD KEY `id_2` (`PatientID`),
  ADD KEY `id_3` (`PatientID`);

--
-- Indexes for table `qpd_pdfresult`
--
ALTER TABLE `qpd_pdfresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qpd_pe`
--
ALTER TABLE `qpd_pe`
  ADD PRIMARY KEY (`PExamID`),
  ADD UNIQUE KEY `PExamRef` (`TransactionID`),
  ADD KEY `PExamRef_2` (`TransactionID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `qpd_sendemail`
--
ALTER TABLE `qpd_sendemail`
  ADD PRIMARY KEY (`SendEmailID`);

--
-- Indexes for table `qpd_trans`
--
ALTER TABLE `qpd_trans`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `TransactionRef` (`TransactionRef`),
  ADD KEY `PatientID` (`PatientID`),
  ADD KEY `ItemID` (`ItemID`);

--
-- Indexes for table `qpd_vital`
--
ALTER TABLE `qpd_vital`
  ADD PRIMARY KEY (`VitalsID`),
  ADD UNIQUE KEY `VitalsRef` (`TransactionID`),
  ADD KEY `VitalsRef_2` (`TransactionID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `qpd_xray`
--
ALTER TABLE `qpd_xray`
  ADD PRIMARY KEY (`XrayID`),
  ADD UNIQUE KEY `XrayRef` (`TransactionID`),
  ADD KEY `XrayRef_2` (`TransactionID`),
  ADD KEY `PatientID` (`PatientID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- Indexes for table `temp_patient`
--
ALTER TABLE `temp_patient`
  ADD PRIMARY KEY (`PatientID`),
  ADD UNIQUE KEY `id` (`PatientID`),
  ADD KEY `id_2` (`PatientID`),
  ADD KEY `id_3` (`PatientID`);

--
-- Indexes for table `temp_trans`
--
ALTER TABLE `temp_trans`
  ADD PRIMARY KEY (`TransactionID`);

--
-- Indexes for table `user_privilege`
--
ALTER TABLE `user_privilege`
  ADD PRIMARY KEY (`privID`);

--
-- Indexes for table `xray_markers`
--
ALTER TABLE `xray_markers`
  ADD PRIMARY KEY (`markerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lab_chemistry`
--
ALTER TABLE `lab_chemistry`
  MODIFY `chemID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lab_hematology`
--
ALTER TABLE `lab_hematology`
  MODIFY `hemaID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lab_microscopy`
--
ALTER TABLE `lab_microscopy`
  MODIFY `microID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lab_personnel`
--
ALTER TABLE `lab_personnel`
  MODIFY `personnelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lab_serology`
--
ALTER TABLE `lab_serology`
  MODIFY `seroID` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `print_count`
--
ALTER TABLE `print_count`
  MODIFY `PrintID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `qpd_class`
--
ALTER TABLE `qpd_class`
  MODIFY `ClassID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qpd_items`
--
ALTER TABLE `qpd_items`
  MODIFY `ItemID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=567;

--
-- AUTO_INCREMENT for table `qpd_labresult`
--
ALTER TABLE `qpd_labresult`
  MODIFY `LabID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qpd_medhis`
--
ALTER TABLE `qpd_medhis`
  MODIFY `MedHisID` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qpd_patient`
--
ALTER TABLE `qpd_patient`
  MODIFY `PatientID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `qpd_pdfresult`
--
ALTER TABLE `qpd_pdfresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qpd_pe`
--
ALTER TABLE `qpd_pe`
  MODIFY `PExamID` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qpd_sendemail`
--
ALTER TABLE `qpd_sendemail`
  MODIFY `SendEmailID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qpd_trans`
--
ALTER TABLE `qpd_trans`
  MODIFY `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `qpd_vital`
--
ALTER TABLE `qpd_vital`
  MODIFY `VitalsID` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qpd_xray`
--
ALTER TABLE `qpd_xray`
  MODIFY `XrayID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `temp_patient`
--
ALTER TABLE `temp_patient`
  MODIFY `PatientID` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_privilege`
--
ALTER TABLE `user_privilege`
  MODIFY `privID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `xray_markers`
--
ALTER TABLE `xray_markers`
  MODIFY `markerID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
