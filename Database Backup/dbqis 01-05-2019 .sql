-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 01:27 AM
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
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `qpd_items`
--

INSERT INTO `qpd_items` (`ItemID`, `ItemName`, `ItemPrice`, `ItemDescription`, `ItemType`, `CreationDate`, `DateUpdate`) VALUES
(12, 'St. Catherine Realty Corp [ Chest Pa, HBSAG, PE ]', '365.00', '', 'AccountIndustrial', '2018-11-23 08:12:03', '0000-00-00 00:00:00'),
(13, 'ALORICA [ BASIC 5 ]', '300.00', '', 'AccountIndustrial', '2018-11-23 08:16:03', '0000-00-00 00:00:00'),
(15, 'DNATA(MALE) [ BASIC 5 + DT ]', '450.00', '', 'AccountIndustrial', '2018-11-23 08:17:52', '0000-00-00 00:00:00'),
(16, 'DNATA(FEMALE) [ BASIC 5 + PT + DT ]', '520.00', '', 'AccountIndustrial', '2018-11-23 08:18:45', '0000-00-00 00:00:00'),
(17, 'MY CLOUD PEOPLE [ BASIC 5 ]', '300.00', '', 'AccountIndustrial', '2018-11-23 08:27:17', '0000-00-00 00:00:00'),
(18, 'OWENS ASIA [ BASIC 5 + DRUGTEST SCREENING ] ', '500.00', '', 'AccountIndustrial', '2018-11-23 08:29:43', '0000-00-00 00:00:00'),
(19, 'SHORE360 INC. [ BASIC 5 + DRUGTEST SCREENING ] ', '500.00', '', 'AccountIndustrial', '2018-11-23 08:30:36', '0000-00-00 00:00:00'),
(20, 'VXI [ BASIC 4 + DRUGTEST SCREENING ] ', '500.00', '', 'AccountIndustrial', '2018-11-23 08:31:08', '0000-00-00 00:00:00'),
(21, 'ORIGO BPO [ BASCI 5 + DRUGTEST SCREENING ]', '500.00', '', 'AccountIndustrial', '2018-11-23 11:49:36', '0000-00-00 00:00:00'),
(22, 'OUTSOURCED HR SOLUTION CORP. [ BASIC 5 + DRUGTEST SCREENING & OTHERS ] ', '500.00', '', 'AccountIndustrial', '2018-11-23 11:50:30', '0000-00-00 00:00:00'),
(23, 'CBC', '225.00', '', 'AccountHMO', '2018-11-24 07:29:34', '0000-00-00 00:00:00'),
(24, 'CONSULTATION', '300.00', '', 'AccountHMO', '2018-11-24 07:49:40', '0000-00-00 00:00:00'),
(25, 'COCOLIFE [FBS, LIPID, BUA, NA, K , CL, CREA, BUN, SGPT, SGOT, CBC, ECG]', '4255.00', '', 'AccountHMO', '2018-11-24 09:10:41', '0000-00-00 00:00:00'),
(26, 'CASH POS', '0.00', '', 'AccountIndustrial', '2018-11-26 11:13:11', '0000-00-00 00:00:00'),
(27, 'URINALYSIS', '135.00', 'U/A', 'AccountHMO', '2018-11-27 15:25:20', '0000-00-00 00:00:00'),
(30, 'Complete Urinalysis', '75.00', '11 Parameters', 'CashLab', '2018-12-01 08:18:58', '0000-00-00 00:00:00'),
(31, 'Fecalysis', '65.00', ' ', 'CashLab', '2018-12-20 10:05:19', '0000-00-00 00:00:00'),
(32, 'CBC', '125.00', 'Complete Blood Count', 'CashLab', '2019-01-04 15:46:09', '0000-00-00 00:00:00'),
(33, 'Creatinine', '95.00', ' ', 'CashLab', '2019-01-04 15:47:57', '0000-00-00 00:00:00'),
(34, 'SGPT', '110.00', 'ALT', 'CashLab', '2019-01-04 15:49:55', '0000-00-00 00:00:00'),
(35, 'BUA', '95.00', 'Blood Uric Acid', 'CashLab', '2019-01-04 15:51:36', '0000-00-00 00:00:00'),
(36, 'Lipid Profile', '415.00', 'Chole, trigly, HDL, LDL, VLDL, Chole/HDL Ratio', 'CashLab', '2019-01-04 15:53:40', '0000-00-00 00:00:00'),
(37, 'Chest PA', '200.00', '(14x14) WALK IN', 'CashImaging', '2019-01-04 15:56:30', '0000-00-00 00:00:00'),
(38, 'Potassium', '120.00', ' ', 'CashLab', '2019-01-04 15:58:03', '0000-00-00 00:00:00'),
(39, 'SGOT', '110.00', 'AST', 'CashIndustrial', '2019-01-04 15:58:44', '0000-00-00 00:00:00'),
(40, 'Sodium', '120.00', 'Sodium Serum', 'CashLab', '2019-01-04 16:00:09', '0000-00-00 00:00:00'),
(41, 'Basic 5 + Drug Test', '500.00', 'CBC, U/A + DT, F/A, Chest PA, P.E', 'CashIndustrial', '2019-01-04 16:02:32', '0000-00-00 00:00:00'),
(42, 'BUN', '95.00', ' ', 'CashLab', '2019-01-04 16:04:00', '0000-00-00 00:00:00'),
(43, 'Basic 3', '275.00', '(CXR PA, U/A, F/A)', 'CashIndustrial', '2019-01-04 16:05:49', '0000-00-00 00:00:00'),
(44, 'Basic 5', '350.00', 'CBC, U/A, F/A, Chest PA, P.E', 'CashIndustrial', '2019-01-04 16:08:52', '0000-00-00 00:00:00'),
(45, 'HBsAg', '165.00', '(Screening)', 'CashLab', '2019-01-04 16:09:37', '0000-00-00 00:00:00');

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
  `QC` varchar(25) NOT NULL,
  `Clinician` varchar(60) NOT NULL,
  `QCLIC` varchar(25) NOT NULL,
  `RMTLIC` varchar(10) NOT NULL,
  `PATHLIC` varchar(10) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Notes` varchar(255) NOT NULL,
  `SID` varchar(50) NOT NULL,
  `CreationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DateUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

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

--
-- Dumping data for table `qpd_pdfresult`
--

INSERT INTO `qpd_pdfresult` (`id`, `Receipient`, `Title`, `ResultFiles`, `SendDate`) VALUES
(103, 'questphil.egs@gmail.com', 'Sample Sendin', 'RONQUILLO, EUNICE MEDICAL (1).pdf', '2018-11-23 02:00:29'),
(104, 'questphil.egs@gmail.com', 'CASTRO, MADELLE', 'CASTRO, MADELLE.xlsx', '2018-11-23 05:07:53'),
(105, 'questphil.egs@gmail.com', 'MANALO, JUDY ANN', 'MANALO, JUDY ANN MEDICAL.pdf', '2018-11-24 02:53:15'),
(106, 'questphil.egs@gmail.com', 'MANALO, JUDY ANN', 'MANALO, JUDY ANN MEDICAL.pdf', '2018-11-24 02:53:32'),
(107, 'questphil.egs@gmail.com', 'MANALO, JUDY ANN', 'MANALO, JUDY ANN MEDICAL.pdf', '2018-11-24 02:53:33'),
(108, 'questphil.itinterns@gmail.com', 'final run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 03:53:47'),
(109, 'questphil.itinterns@gmail.com', 'final run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 03:54:30'),
(110, 'questphil.itinterns@gmail.com', 'final run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 03:54:31'),
(111, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL.pdf', '2018-11-28 03:56:23'),
(112, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL.pdf', '2018-11-28 04:09:55'),
(113, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL.pdf', '2018-11-28 04:09:57'),
(114, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL.pdf', '2018-11-28 04:10:45'),
(115, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL.pdf', '2018-11-28 04:10:45'),
(116, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL.pdf', '2018-11-28 04:10:49'),
(117, 'questphil.itinterns@gmail.com', 'second final', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:13:09'),
(118, 'questphil.itinterns@gmail.com', 'second final', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:13:09'),
(119, 'questphil.itinterns@gmail.com', 'second final', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:16:04'),
(120, 'questphil.itinterns@gmail.com', 'second final', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:16:05'),
(121, 'questphil.itinterns@gmail.com', 'second final', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:16:08'),
(122, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:16:34'),
(123, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:17:36'),
(124, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:17:40'),
(125, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:17:53'),
(126, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:17:54'),
(127, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:17:55'),
(128, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:19:57'),
(129, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:19:57'),
(130, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:19:58'),
(131, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:19:58'),
(132, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:20:18'),
(133, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:20:30'),
(134, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 04:20:32'),
(135, 'questphil.itinterns@gmail.com', 'this is try run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 04:42:58'),
(136, 'questphil.itinterns@gmail.com', 'second final', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 04:43:49'),
(137, 'questphil.itinterns@gmail.com', 'second final', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 04:43:53'),
(138, 'questphil.itinterns@gmail.com', 'second final', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 04:47:25'),
(139, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 04:51:15'),
(140, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 04:52:33'),
(141, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 04:53:13'),
(142, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 04:53:17'),
(143, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 04:56:32'),
(144, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 04:56:33'),
(145, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 04:56:36'),
(146, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 04:59:01'),
(147, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 04:59:01'),
(148, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 04:59:02'),
(149, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 04:59:02'),
(150, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 05:05:25'),
(151, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 05:06:47'),
(152, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 05:06:48'),
(153, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 05:12:03'),
(154, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 05:12:23'),
(155, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 05:12:26'),
(156, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 05:21:03'),
(157, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 05:21:14'),
(158, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 05:21:15'),
(159, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 05:26:42'),
(160, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 05:26:45'),
(161, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 05:26:46'),
(162, 'questphil.itinterns@gmail.com', 'second final', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 05:33:19'),
(163, 'questphil.itinterns@gmail.com', 'second final', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 05:33:42'),
(164, 'questphil.itinterns@gmail.com', 'second final', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 05:33:42'),
(165, 'questphil.itinterns@gmail.com', 'second final', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 05:35:28'),
(166, 'questphil.itinterns@gmail.com', 'second final', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 05:35:28'),
(167, 'questphil.itinterns@gmail.com', 'second final', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 05:35:29'),
(168, 'questphil.itinterns@gmail.com', 'final run', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL (1).pdf', '2018-11-28 05:53:56'),
(169, 'questphil.itinterns@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 05:54:44'),
(170, 'questphil.itinterns@gmail.com', 'asdbhu v,jb', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 05:57:22'),
(171, 'questphil.itinterns@gmail.com', 'a;ldfjal;sk aslkdalv a', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf', '2018-11-28 06:02:45'),
(172, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Webslesson.pdf ,While.docx', '2018-11-28 06:39:09'),
(173, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Webslesson.pdf ,While.docx', '2018-11-28 06:41:02'),
(174, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Webslesson.pdf ,While.docx', '2018-11-28 06:45:50'),
(175, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Webslesson.pdf ,While.docx', '2018-11-28 06:54:08'),
(176, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Webslesson.pdf ,While.docx', '2018-11-28 06:54:34'),
(177, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Webslesson.pdf ,While.docx', '2018-11-28 06:55:33'),
(178, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Webslesson.pdf ,While.docx', '2018-11-28 06:58:38'),
(179, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Webslesson.pdf ,While.docx', '2018-11-28 06:59:11'),
(180, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Webslesson.pdf ,While.docx', '2018-11-28 07:00:40'),
(181, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Webslesson.pdf ,While.docx', '2018-11-28 07:00:48'),
(182, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Webslesson.pdf ,While.docx', '2018-11-28 07:00:49'),
(183, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing COCOLIFE  2018-10-06 -2018-10-12 170000.xlsx', '2018-11-28 07:08:45'),
(184, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing EASTWEST  2018-09-29 060000-2018-10-05 170000.xlsx', '2018-11-28 07:09:11'),
(185, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing EASTWEST  2018-09-01 060000-2018-09-07 200000.xlsx', '2018-11-28 07:10:51'),
(186, 'tiglaokenjie08@gmail.com', 'Results', 'BONDOC, KRISTINE JOY MEDICAL.pdf ,RIVERA, YAN MICHAEL MEDICAL.pdf', '2018-11-28 07:31:51'),
(187, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing AVEGA  2018-10-13 060000-2018-10-19 170000.xlsx', '2018-11-29 02:32:59'),
(188, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing COCOLIFE  2018-09-08 060000-2018-09-15 200000.xlsx', '2018-11-29 02:34:20'),
(189, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing EASTWEST  2018-09-01 060000-2018-09-07 200000.xlsx', '2018-11-29 02:37:41'),
(190, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing COCOLIFE  2018-10-06 -2018-10-12 170000.xlsx', '2018-11-29 02:38:49'),
(191, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing COCOLIFE  2018-09-17 060000-2018-09-22 170000.xlsx', '2018-11-29 02:40:08'),
(192, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing EASTWEST  2018-09-01 060000-2018-09-07 200000.xlsx', '2018-11-29 02:40:46'),
(193, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing COCOLIFE  2018-09-17 060000-2018-09-22 170000.xlsx', '2018-11-29 02:41:08'),
(194, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing EASTWEST  2018-09-01 060000-2018-09-07 200000.xlsx', '2018-11-29 02:42:37'),
(195, 'tiglaokenjie08@gmail.com', 'awdawd', 'Billing EASTWEST  2018-09-01 060000-2018-09-07 200000.xlsx', '2018-11-29 02:50:33'),
(196, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing EASTWEST  2018-09-08 060000-2018-09-15 200000.xlsx', '2018-11-29 02:51:11'),
(197, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing COCOLIFE  2018-10-06 -2018-10-12 170000.xlsx', '2018-11-29 02:51:36'),
(198, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing EASTWEST  2018-09-08 060000-2018-09-15 200000.xlsx', '2018-11-29 02:52:04'),
(199, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing COCOLIFE  2018-10-06 -2018-10-12 170000.xlsx', '2018-11-29 02:52:26'),
(200, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing COCOLIFE  2018-10-06 -2018-10-12 170000.xlsx', '2018-11-29 02:55:37'),
(201, 'tiglaokenjie08@gmail.com', 'Sample Sending Email', 'Billing COCOLIFE  2018-09-17 060000-2018-09-22 170000.xlsx', '2018-11-29 03:00:13'),
(202, 'questphil.it@gmail.com', 'qwe', 'RIVERA, YAN MICHAEL MEDICAL (2).pdf ,RIVERA, YAN MICHAEL MEDICAL.pdf', '2018-11-29 05:39:07'),
(203, 'questphil.it@gmail.com', 'final run', 'logo.png', '2018-12-05 02:58:04'),
(204, 'questphil.it@gmail.com', 'Results', 'TIGLAO, KENJIE MEDICAL.pdf', '2018-12-06 07:39:12');

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
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `qpd_trans`
--

INSERT INTO `qpd_trans` (`TransactionID`, `TransactionRef`, `PatientID`, `TransactionType`, `Cashier`, `ItemID`, `ItemQTY`, `Biller`, `TotalPrice`, `PaidIn`, `Discount`, `PaidOut`, `GrandTotal`, `TransactionDate`, `status`) VALUES
(0000000000376, 'Please Generate a random Number', 0, '2', 'PetraKabayo', '30', '1', ' Alorica', '75', '0', '0', '0', '75', '2018-12-07 07:52:44', 1),
(0000000000377, 'Please Generate a random Number', 0, '0', 'PetraKabayo', '30', '1', ' Alorica', '', '', '0', '', '', '2018-12-07 08:33:44', 1),
(0000000000379, 'Please Generate a random Number', 0, '0', 'PetraKabayo', '30,30', '1,1', ' Alorica', '', '', '0,0', '', '', '2018-12-07 09:05:35', 1),
(0000000000383, 'Please Generate a random Number', 0, '', 'PetraKabayo', '30,30', '1,1', ' Alorica', '', '', '0,0', '', '', '2018-12-07 09:37:37', 1),
(0000000000392, '83916205', 0, '', 'CashCashier', '30', '1', ' Alorica', '', '', '0', '', '', '2018-12-13 09:42:14', 0),
(0000000000394, '78129450', 0, '', 'CashCashier', '30', '10', ' Alorica', '', '', '0', '', '', '2018-12-14 10:22:55', 0),
(0000000000395, '06274895', 0, '', 'CashCashier', '30', '10', ' Alorica', '', '', '0', '', '', '2018-12-14 10:24:47', 0);

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
(23, 0000000000000, 0, '', '', '', '', '2018-10-24 14:42:58', '0000-00-00 00:00:00');

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
(8, 'QCMain', 'questphil.qc@gmail.com', '5d95ff5c587a28300fb70d87f2a2e5f7', 'Y', 'a5cee71eee7ef6bec4d199a48c47d7db', 'Accounting');

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

--
-- Dumping data for table `temp_trans`
--

INSERT INTO `temp_trans` (`TransactionID`, `TransactionRef`, `PatientID`, `TransactionType`, `Cashier`, `ItemID`, `ItemName`, `ItemDescription`, `ItemQTY`, `ItemPrice`, `Biller`, `LOE`, `AN`, `AC`, `Referral`, `Notes`, `SID`, `TotalPrice`, `GrandTotal`, `PaidIn`, `Discount`, `DiscountPer`, `PaidOut`, `PatientRef`, `CompanyName`, `Position`, `FirstName`, `MiddleName`, `LastName`, `Address`, `Birthdate`, `Email`, `Age`, `Gender`, `ContactNo`, `TransactionDate`) VALUES
(0000000000019, '41723698', 0, '', 'Imaging', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-10-24 11:23:15'),
(0000000000022, '', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', 'HAU SBA', 'INTERN', 'ELAINE GAIL', 'ARCEDERA', 'PEREZ', 'PORAC, PAMPANGA', '09-03-1998', '', 20, 'FEMALE', '09356132346', '2018-10-24 11:52:45'),
(0000000000024, '', 0, '', 'CashCashier', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '0.00', '0.00', 0, '0.00', '', 'HAU SBA', 'INTERN', 'ELAINE GAIL', 'ARCEDERA', 'PEREZ', 'PORAC, PAMPANGA', '09-03-1998', '', 20, 'FEMALE', '09356132346', '2018-10-24 11:55:09'),
(0000000000029, '72359180', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '600.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-10-24 12:35:23'),
(0000000000034, '', 0, '', 'CashCashier', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '0.00', '0.00', 0, '0.00', '', 'HAU SBA', 'INTERN', 'ELAINE GAIL', 'ARCEDERA', 'PEREZ', 'PORAC, PAMPANGA', '09-03-1998', '', 20, 'FEMALE', '09356132346', '2018-10-25 07:36:24'),
(0000000000038, '', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', 'HAU SBA', 'INTERN', 'ELAINE GAIL', 'ARCEDERA', 'PEREZ', 'PORAC, PAMPANGA', '09-03-1998', '', 20, 'FEMALE', '09356132346', '2018-10-25 08:50:56'),
(0000000000040, '', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', 'HAU SBA', 'INTERN', 'ELAINE GAIL', 'ARCEDERA', 'PEREZ', 'PORAC, PAMPANGA', '09-03-1998', '', 20, 'FEMALE', '09356132346', '2018-10-25 08:53:02'),
(0000000000042, '', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', 'HAU SBA', 'INTERN', 'ELAINE GAIL', 'ARCEDERA', 'PEREZ', 'PORAC, PAMPANGA', '09-03-1998', '', 20, 'FEMALE', '09356132346', '2018-10-25 08:55:28'),
(0000000000044, '', 0, '', 'CashCashier', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '0.00', '0.00', 0, '0.00', '', 'HAU SBA', 'INTERN', 'ELAINE GAIL', 'ARCEDERA', 'PEREZ', 'PORAC, PAMPANGA', '09-03-1998', '', 20, 'FEMALE', '09356132346', '2018-10-25 08:57:42'),
(0000000000058, '', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', 'HAU SBA', 'INTERN', 'ELAINE GAIL', 'ARCEDERA', 'PEREZ', 'PORAC, PAMPANGA', '09-03-1998', '', 20, 'FEMALE', '09356132346', '2018-10-26 11:07:26'),
(0000000000061, '', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', 'HAU SBA', 'INTERN', 'ELAINE GAIL', 'ARCEDERA', 'PEREZ', 'PORAC, PAMPANGA', '09-03-1998', '', 20, 'FEMALE', '09356132346', '2018-10-27 08:09:15'),
(0000000000069, '92061458', 0, '', 'RecepMain', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-10-27 12:00:29'),
(0000000000075, '', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-10-30 14:39:34'),
(0000000000078, '', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-05 09:35:45'),
(0000000000082, '', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-05 11:35:38'),
(0000000000083, '64170823', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '800.00', '0.00', 0, '200.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-06 10:45:16'),
(0000000000084, '64571028', 0, '', 'CashCashier', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '600.00', '0.00', 0, '100.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-06 10:54:24'),
(0000000000085, '42305618', 0, '', 'CashCashier', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '0.00', '0.00', 0, '-500.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-06 12:17:12'),
(0000000000086, '46185279', 0, '', 'CashCashier', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-06 13:27:18'),
(0000000000087, '54237819', 0, '', 'CashCashier', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-06 13:27:46'),
(0000000000088, '35024796', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '600.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-06 13:28:21'),
(0000000000089, '40831796', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '700.00', '0.00', 0, '100.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-06 13:30:21'),
(0000000000090, '12743806', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '1000.00', '0.00', 0, '400.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-06 13:50:55'),
(0000000000094, '', 0, '', 'CashCashier', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-07 11:39:55'),
(0000000000098, '05472386', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '600.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-07 12:15:34'),
(0000000000107, '', 0, '', 'CashCashier', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-09 11:07:34'),
(0000000000109, '', 0, '', 'RecepMain', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-09 13:11:45'),
(0000000000112, '37652148', 0, '', 'CashCashier', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '500.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-09 14:46:14'),
(0000000000113, '37652148', 0, '', 'CashCashier', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-09 14:46:26'),
(0000000000115, '', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-10 08:54:00'),
(0000000000119, '', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-10 10:11:25'),
(0000000000121, '', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-10 10:15:45'),
(0000000000123, '', 0, '', 'CashCashier', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-10 10:20:47'),
(0000000000125, '', 0, '', 'CashCashier', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-10 10:24:10'),
(0000000000127, '', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-10 10:29:01'),
(0000000000131, '', 0, '', 'CashCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-10 10:40:13'),
(0000000000133, '', 0, '', 'CashCashier', '4', 'HAU CHTM MALE', 'Basic 5 + DT + HBSAG + ANTI HAV', '1', '770.00', '', 0, '', '', '', '', '', '770.00', '770.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-10 10:44:50'),
(0000000000147, '93508261', 0, '', 'CashCashier', '3', 'HAU CHTM FEMALE', 'Basic 5 + DT + PT + HBSAG + ANTI HAV', '1', '870.00', '', 0, '', '', '', '', '', '870.00', '870.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-10 13:11:03'),
(0000000000156, '28490567', 0, '', 'CashCashier', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-10 14:12:35'),
(0000000000158, '15980764', 0, '', 'CashCashier', '5', 'HAU CCJEF (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '500.00', '0.00', 0, '0.00', '', 'HAU CCJEF', 'INTERN', 'RUEBEN JUSTICE', '', 'LACSON', 'MAGALANG PAMPANGA', '06-05-1998', '', 20, 'MALE', '09175026305', '2018-11-13 09:07:26'),
(0000000000165, '59314680', 0, '', 'CashCashier', '2', 'HAU SBA (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '0.00', '0.00', 0, '0.00', '', 'HAU CICT', 'INTERN', 'ARVIN', 'LAGMAN', 'MADALLADA', 'BLK 22 LOT 1 PAXTON STREET, LEONCIA VILLE ANGELES CITY', '07-01-98', 'sonicarvin@gmail.com', 20, 'MALE', '0935-323-6729', '2018-11-13 14:55:33'),
(0000000000170, '51726348', 0, '', '', '9', 'HAU SED (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-16 14:20:46'),
(0000000000172, '97614385', 0, '', 'AccountCashier', '1', 'HAU SBA (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-11-23 09:19:36'),
(0000000000176, '42360198', 0, '', 'CashCashier', '30', 'Complete Urinalysis', '11 Parameters', '1', '75.00', '', 0, '', '', '', '', '', '75.00', '75.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-12-01 08:19:09'),
(0000000000177, '42360198', 0, '', 'CashCashier', '5', 'HAU CCJEF (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-12-01 08:19:11'),
(0000000000178, '06589417', 0, '', 'CashCashier', '6', 'HAU CCJEF (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '2', '600.00', '', 0, '', '', '', '', '', '300.00', '600.00', '0.00', '300.00', 50, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-12-03 14:39:25'),
(0000000000179, '98653014', 0, '', 'CashCashier', '6', 'HAU CCJEF (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-12-04 12:50:26'),
(0000000000180, '62497081', 0, '', 'CashCashier', '30', 'Complete Urinalysis', '11 Parameters', '1', '75.00', '', 0, '', '', '', '', '', '75.00', '75.00', '100.00', '0.00', 0, '25.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-12-05 09:49:40'),
(0000000000181, '47612538', 0, '', 'CashCashier', '', '', '', '1', '', '', 0, '', '', '', '', '', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-12-08 14:40:09'),
(0000000000182, '12745638', 0, '', 'CashCashier', '5', 'HAU CCJEF (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '500.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-12-12 08:50:27'),
(0000000000183, '58134027', 0, '', 'CashCashier', '10', 'HAU SED (MALE)', 'Basic 5 + DT + HBSAG', '1', '500.00', '', 0, '', '', '', '', '', '500.00', '500.00', '500.00', '0.00', 0, '0.00', '', 'ESKINITA', 'PUSHER', 'JUAN', 'CARLOS', 'DELA CRUZ', 'SA ILALIM NG ILAW', '08-19-1999', 'JUANDELACRUZ@GMAIL.COM', 19, 'MALE', '0909090909', '2018-12-14 11:09:24'),
(0000000000184, '19780643', 0, '', 'CashCashier', '8', 'HAU CICT (FEMALE)', 'Basic 5 + DT + PT + HBSAG', '1', '600.00', '', 0, '', '', '', '', '', '600.00', '600.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-12-15 09:05:56'),
(0000000000185, '18649750', 0, '', 'CashCashier', '30', 'Complete Urinalysis', '11 Parameters', '1', '75.00', '', 0, '', '', '', '', '', '75.00', '75.00', '0.00', '0.00', 0, '0.00', '', '', '', '', '', '', '', '', '', 0, '', '', '2018-12-20 10:05:26');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qpd_class`
--
ALTER TABLE `qpd_class`
  MODIFY `ClassID` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qpd_items`
--
ALTER TABLE `qpd_items`
  MODIFY `ItemID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `qpd_labresult`
--
ALTER TABLE `qpd_labresult`
  MODIFY `LabID` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qpd_medhis`
--
ALTER TABLE `qpd_medhis`
  MODIFY `MedHisID` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qpd_patient`
--
ALTER TABLE `qpd_patient`
  MODIFY `PatientID` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qpd_pdfresult`
--
ALTER TABLE `qpd_pdfresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

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
  MODIFY `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=396;

--
-- AUTO_INCREMENT for table `qpd_vital`
--
ALTER TABLE `qpd_vital`
  MODIFY `VitalsID` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qpd_xray`
--
ALTER TABLE `qpd_xray`
  MODIFY `XrayID` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `temp_patient`
--
ALTER TABLE `temp_patient`
  MODIFY `PatientID` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `TransactionID` int(13) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
