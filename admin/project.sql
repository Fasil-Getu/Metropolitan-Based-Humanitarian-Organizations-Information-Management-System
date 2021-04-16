-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 04:24 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `A_Id` char(10) NOT NULL,
  `passwordA` char(8) NOT NULL,
  `CNO` char(20) NOT NULL,
  `passwordO` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`A_Id`, `passwordA`, `CNO`, `passwordO`) VALUES
('a001', 'adm0001', 't5g', 'nknioi'),
('a001', 'adm0001', 't5g', 'nknioi'),
('a002', 'adm0002', 'org1002000', 'org0001'),
('a003', 'adm0003', 'nm jhb', 'bj'),
('a004', 'adm0004', 'org2001010', 'org0002'),
('a001', 'adm0001', 'nm jhb', 'bj'),
('a003', 'adm0003', 'org2001010', 'bj');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_Id` char(10) NOT NULL,
  `AF_Name` char(20) NOT NULL,
  `AL_Name` char(20) NOT NULL,
  `Sex` char(5) NOT NULL,
  `e_mail` varchar(35) NOT NULL,
  `Phone_N_O` char(20) NOT NULL,
  `passwordA` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_Id`, `AF_Name`, `AL_Name`, `Sex`, `e_mail`, `Phone_N_O`, `passwordA`) VALUES
('a001', 'Amanuel', 'Ashine', 'M', 'amanashine2013@gmail.com', '+251941936363', 'adm0001'),
('a002', 'Fasil', 'Getu', 'M', 'Fasilgetu@gmail.com', '+251906899142', 'adm0002'),
('a003', 'Andualem', 'Legesse', 'M', 'Andualem2010@gmail.com', '+251983070202', 'adm0003'),
('a004', 'Betelehem', 'Sisay', 'F', 'BetiSisay21@gmail.com', '+251934462687', 'adm0004');

-- --------------------------------------------------------

--
-- Table structure for table `adopte_user`
--

CREATE TABLE `adopte_user` (
  `AU_Id` char(5) NOT NULL,
  `AU_FN` char(20) NOT NULL,
  `AU_LN` char(20) NOT NULL,
  `email` char(20) NOT NULL,
  `passwordU` char(8) NOT NULL,
  `credit` char(20) NOT NULL,
  `U_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adopte_user`
--

INSERT INTO `adopte_user` (`AU_Id`, `AU_FN`, `AU_LN`, `email`, `passwordU`, `credit`, `U_Id`) VALUES
('unkno', 'ghost', 'raider', 'ghost@yahoo.com', '000000', '11113', 18),
('amanu', 'amanuel', 'ashene', 'amanuel23@yahoo.com', '00006', '11111', 15),
('getu', 'Fasil', 'getu', 'fasilgetu9@gmail.com', '0001', '1556444', 11),
('salil', 'getu', 'salilew', 'salilew@yahoo.com', '0006', '0002', 11);

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `App_Id` int(10) NOT NULL,
  `App_FName` char(20) NOT NULL,
  `App_LName` char(20) NOT NULL,
  `Sex` char(5) NOT NULL,
  `Age` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `From_where` text NOT NULL,
  `disablity` varchar(10) NOT NULL,
  `App_Phone_n_O` char(20) NOT NULL,
  `U_Id` int(10) NOT NULL,
  `Benfi_FN` char(20) NOT NULL,
  `Benfi_LN` char(20) NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`App_Id`, `App_FName`, `App_LName`, `Sex`, `Age`, `photo`, `From_where`, `disablity`, `App_Phone_n_O`, `U_Id`, `Benfi_FN`, `Benfi_LN`, `Status`) VALUES
(44, 'biruk', 'fasil', 'male', 14, 'images (5).jpeg', 'bole road, Addis Ababa', 'no', '+251906899142', 8, 'biruk', 'fasil', 'waiting'),
(45, 'hiwot', 'endale', 'femal', 11, 'images (4).jpeg', 'bole road, Addis Ababa', 'no', '+25100000011', 9, 'hiwot', 'endale', 'waiting'),
(46, 'matheos', 'ejigu', 'male', 13, 'images (6).jpeg', 'bole road, Addis Ababa', 'yes', '+2514568899', 10, 'matheos', 'ejigu', 'active'),
(47, 'alem', 'banchi', 'femal', 10, 'images (4).jpeg', 'bole road, Addis Ababa', 'yes', '+251877889', 11, 'alem', 'banchi', 'active'),
(48, 'andualem', 'adisu', 'male', 11, 'istockphoto-944987870-170667a.jpg', 'bole road, Addis Ababa', 'no', '+2510567898', 15, 'andualem', 'adisu', 'waiting'),
(49, 'Fasil', 'jebel', 'male', 30, 'download.jpg', 'bole road, Addis Ababa', 'yes', '+2517896542', 18, '', '', ''),
(50, 'sew', 'mehon', 'male', 11, 'images.jpeg', 'bole road, Addis Ababa', 'no', '+251896452', 19, 'sew', 'mehon', 'active'),
(51, 'sew', 'mehon', 'male', 11, 'images.jpeg', 'bole road, Addis Ababa', 'no', '+251896452', 20, '', '', ''),
(52, 'sew', 'mehon', 'male', 11, 'images.jpeg', 'bole road, Addis Ababa', 'no', '+251896452', 21, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `AU_Id` char(5) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `email` char(20) NOT NULL,
  `Benfi_fullname` char(20) NOT NULL,
  `App_Id` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AU_Id`, `fullname`, `email`, `Benfi_fullname`, `App_Id`, `date`) VALUES
('getu', 'Fasil getu', 'fasilgetu9@gmail.com', 'matheos ejigu', 46, '2020-12-29'),
('getu', 'Fasil getu', 'fasilgetu9@gmail.com', 'alem banchi', 47, '2020-12-08'),
('amanu', 'amanuel ashene', 'amanuel23@yahoo.com', 'matheos ejigu', 46, '2020-12-19'),
('amanu', 'amanuel ashene', 'amanuel23@yahoo.com', 'matheos ejigu', 46, '2020-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `hum_organization`
--

CREATE TABLE `hum_organization` (
  `Org_Name` char(25) NOT NULL,
  `Org_type` char(25) NOT NULL,
  `Office_addres` varchar(70) NOT NULL,
  `Region` char(30) NOT NULL,
  `Phone_N_O` char(20) NOT NULL,
  `purpose` text NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `CNO` char(20) NOT NULL,
  `passwordO` char(8) NOT NULL,
  `R_password` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hum_organization`
--

INSERT INTO `hum_organization` (`Org_Name`, `Org_type`, `Office_addres`, `Region`, `Phone_N_O`, `purpose`, `e_mail`, `CNO`, `passwordO`, `R_password`) VALUES
('fasilo', 'community based.', 'bole road, Addis Ababa', 'Addis Ababa', '+25156468', '  \r\nour purpose is too help .our purpose is too help .', 'kkul@gmil.com', 'org100', '123456', '123456'),
('mmaa', 'institution based', 'bole road, Addis Ababa', 'Amhara', '+251jknk', '  \r\nCharity under the legal supervision of the Ethiopian Federal Government Charities and Societies Agency and headquartered in Addis Ababa, Ethiopia.\r\nCurrently, MHA is providing the above services to seventy (70) disabled and destitute elderly people.\r\nOur beneficiary residents were homeless people picked up from different parts of the country such as\r\nHawassa, Debre Zeit, Debre Libanos, Addis Ababa and Guder.\r\n', 'kni', 'nm jhb', 'bj', 'b j'),
('mariamawit', 'institution based', 'gerji road,addis ababa', 'Addis Ababa', '+251906899142', 'Mariamawit Charity under the legal supervision of the Ethiopian Federal Government Charities and Societies Agency and headquartered in Addis Ababa, Ethiopia.\r\nCurrently, MHA is providing the above services to seventy (70) disabled and destitute elderly people.\r\nOur beneficiary residents were homeless people picked up from different parts of the country such as\r\nHawassa, Debre Zeit, Debre Libanos, Addis Ababa and Guder.\r\n', 'mariamawiteabay23@yahoo.com', 'org102', 'cfrth', '548488'),
('andualem', 'Type', 'bole road, Addis Ababa', 'Region', '+2514845959', 'Andualem Humanitarian Charity under the legal supervision of the Ethiopian Federal Government Charities and Societies Agency and headquartered in Addis Ababa, Ethiopia.\r\nCurrently, MHA is providing the above services to seventy (70) disabled and destitute elderly people.\r\nOur beneficiary residents were homeless people picked up from different parts of the country such as\r\nHawassa, Debre Zeit, Debre Libanos, Addis Ababa and Guder.\r\n', 'jnnkmk@gmail.com', 'org103', 'cfrth', '4449689'),
('Mary joy', 'institution based', 'kasanchis, Addis Ababa', 'Amhara', '+251 06899142', 'Mary Joy Aid Through Development (MJATD), established in 1994 is a Non governmental organization (NGO). It works to improve the health and living conditions of some of the poorest people in Ethiopia. Mary Joy works in an integrated urban development programs in collaboration with different international NGOs, GO’s and Community Based Organizations. Mary Joy works towards empowering children, women, families and other undeserved community groups through integrated development programs.', 'tesfayeabay23@yahoo.com', 't5g', 'nknioi', 'nknioi'),
('Mekadoniya', 'community based', 'Yeka abado ', 'Oromiya', '+251910225543', 'The Macedonians Humanitarian Association (MHA) is an indigenous non-governmental, not-profit and independent organization, founded on 07 January 2010. The purpose of MHA is to support\r\nelderly people and people with disabilities who otherwise have no means of survival by providing\r\nthem with shelter, clothing, food, and other basic services. The organization is an Ethiopian Resident\r\nCharity under the legal supervision of the Ethiopian Federal Government Charities and Societies Agency and headquartered in Addis Ababa, Ethiopia.\r\n', 'mekadoniya@gmail.com', 'org1002000', 'org0001', 'org0001'),
('Mudaye', 'institution based', 'Beside Nefaselk k/k,Amrol building 2nd floor.    ', 'Amahara', '+251920334255', 'Muday humantarian, established in 1994 is a Non governmental organization (NGO). It works to improve the health and living conditions of some of the poorest people in Ethiopia. Mary Joy works in an integrated urban development programs in collaboration with different international NGOs, GO’s and Community Based Organizations. Mary Joy works towards empowering children, women, families and other undeserved community groups through integrated development programs.', 'mudaye@gmail.com', 'org2001010', 'org0002', 'org0002'),
('test2', 'community based.', 'bole road, Addis Ababa', 'Benshangul', '+251888888', '  \r\nnone', 'junki@gmail.com', '56666', 'pass', 'pass'),
('test', 'Type', 'bole road, Addis Ababa', 'Afar', '+2516764666666', 'have nots', 'jnnkmk@klor.com', '5555', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `M_Id` int(10) NOT NULL,
  `MFN` char(20) NOT NULL,
  `MLN` char(20) NOT NULL,
  `Sex` char(5) NOT NULL,
  `City` varchar(25) NOT NULL,
  `Phone_N_O` char(20) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `Acc_N_O` char(25) NOT NULL,
  `dinterval` varchar(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `U_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`M_Id`, `MFN`, `MLN`, `Sex`, `City`, `Phone_N_O`, `e_mail`, `Acc_N_O`, `dinterval`, `amount`, `U_Id`) VALUES
(1, 'andu', 'tsegaye', 'male', 'Addis Ababa', '0906899142', 'andutsegaye@gmail.com', '10000200', 'WEEKLY', 500, 11),
(2, 'lulaw', 'wodajo', 'male', 'Addis Ababa', '0906964569', 'lulaw@gmail.com', '100000001', 'yearly', 9000, 12),
(15, 'lulaw', 'wodajo', 'male', 'Addis Ababa', '0911456932', 'lulawlulaw@gmail.com', '100000001', 'MONTHLY', 600, 12),
(37, 'lulaw', 'wodajo', 'male', 'Addis Ababa', '0911456932', 'lulawlulaw@gmail.com', '100000001', 'DAILY', 456, 12),
(38, 'aman', 'belew', 'male', 'Addis Ababa', '0911456932', 'amabelew@gmail.com', '100009', 'DAILY', 390, 16),
(39, 'aman', 'belew', 'male', 'Addis Ababa', '0911456932', 'amabelew@gmail.com', '100009', 'MONTHLY', 410, 16),
(40, 'aloo', 'ale', 'male', 'Addis Ababa', '0966963256', 'andutsegaye@gmail.com', '10000200', 'WEEKLY', 780, 17);

-- --------------------------------------------------------

--
-- Table structure for table `monetary_donator`
--

CREATE TABLE `monetary_donator` (
  `CNO` char(20) NOT NULL,
  `modality` char(20) NOT NULL,
  `accpass` int(10) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monetary_donator`
--

INSERT INTO `monetary_donator` (`CNO`, `modality`, `accpass`, `amount`) VALUES
('org1002000', 'Moneygram', 100009, 38),
('org2001010', 'wester-union', 100009, 7888),
('t5g', 'wester-union', 100009, 850),
('org1002000', 'paypal', 100009, 850),
('org1002000', 'wester-union', 100009, 850),
('org2001010', 'paypal', 100009, 850),
('org2001010', 'Master-card', 1006, 466);

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `S_Id` int(10) NOT NULL,
  `SFN` char(20) NOT NULL,
  `SLN` char(20) NOT NULL,
  `Sex` char(5) NOT NULL,
  `City` varchar(25) NOT NULL,
  `Phone_N_O` char(20) NOT NULL,
  `e_mail` char(30) NOT NULL,
  `acc_no` char(10) NOT NULL,
  `people_number` char(15) NOT NULL,
  `U_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`S_Id`, `SFN`, `SLN`, `Sex`, `City`, `Phone_N_O`, `e_mail`, `acc_no`, `people_number`, `U_Id`) VALUES
(3, 'abay', 'desta', 'male', 'Addis Ababa', '0911589632', 'abaya@gmail.com', '1555555', '3', 13),
(37, 'abay', 'desta', 'male', 'Addis Ababa', '0911589632', 'abaya@gmail.com', '1555555', '96', 13),
(38, 'abay', 'desta', 'male', 'Addis Ababa', '0911589632', 'abaya@gmail.com', '1555555', '3', 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `U_Id` int(10) NOT NULL,
  `UFN` char(20) NOT NULL,
  `ULN` char(20) NOT NULL,
  `CNO` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`U_Id`, `UFN`, `ULN`, `CNO`) VALUES
(8, 'biruk', 'fasil', 'org2001010'),
(9, 'hiwot', 'endale', 'org2001010'),
(10, 'matheos', 'ejigu', 'org2001010'),
(11, 'alem', 'banchi', 'org2001010'),
(12, 'lulaw', 'wodajo', 'org1002000'),
(13, 'abay', 'desta', 'org1002000'),
(14, '', '', 'org1002000'),
(15, 'andualem', 'adisu', 'org2001010'),
(16, 'aman', 'belew', 'org1002000'),
(17, 'aloo', 'ale', 't5g'),
(18, 'Fasil', 'jebel', 't5g'),
(19, 'sew', 'mehon', 'org1002000'),
(20, 'sew', 'mehon', 'org1002000'),
(21, 'sew', 'mehon', 'org1002000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD KEY `password_2` (`passwordA`),
  ADD KEY `passwordO` (`passwordO`) USING BTREE,
  ADD KEY `A_Id` (`A_Id`),
  ADD KEY `CNO` (`CNO`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`passwordA`,`A_Id`) USING BTREE,
  ADD UNIQUE KEY `A_Id` (`A_Id`);

--
-- Indexes for table `adopte_user`
--
ALTER TABLE `adopte_user`
  ADD PRIMARY KEY (`passwordU`,`AU_Id`) USING BTREE,
  ADD UNIQUE KEY `AU_Id` (`AU_Id`),
  ADD KEY `fk7` (`credit`) USING BTREE,
  ADD KEY `U_Id` (`U_Id`);

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`App_Id`),
  ADD KEY `fk6` (`U_Id`),
  ADD KEY `U_Id` (`U_Id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD KEY `App_Id` (`App_Id`),
  ADD KEY `AU_Id` (`AU_Id`);

--
-- Indexes for table `hum_organization`
--
ALTER TABLE `hum_organization`
  ADD PRIMARY KEY (`passwordO`,`CNO`) USING BTREE,
  ADD UNIQUE KEY `CNO` (`CNO`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`M_Id`),
  ADD KEY `fk5` (`U_Id`),
  ADD KEY `U_Id` (`U_Id`);

--
-- Indexes for table `monetary_donator`
--
ALTER TABLE `monetary_donator`
  ADD KEY `CNO` (`CNO`) USING BTREE;

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`S_Id`),
  ADD KEY `fk4` (`U_Id`),
  ADD KEY `U_Id` (`U_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`U_Id`),
  ADD KEY `ff3` (`CNO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `App_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `M_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `S_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `U_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`passwordO`) REFERENCES `hum_organization` (`passwordO`),
  ADD CONSTRAINT `account_ibfk_2` FOREIGN KEY (`CNO`) REFERENCES `hum_organization` (`CNO`),
  ADD CONSTRAINT `account_ibfk_3` FOREIGN KEY (`A_Id`) REFERENCES `admin` (`A_Id`),
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`passwordA`) REFERENCES `admin` (`passwordA`);

--
-- Constraints for table `adopte_user`
--
ALTER TABLE `adopte_user`
  ADD CONSTRAINT `adopte_user_ibfk_1` FOREIGN KEY (`U_Id`) REFERENCES `users` (`U_Id`);

--
-- Constraints for table `applicant`
--
ALTER TABLE `applicant`
  ADD CONSTRAINT `applicant_ibfk_1` FOREIGN KEY (`U_Id`) REFERENCES `users` (`U_Id`);

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`AU_Id`) REFERENCES `adopte_user` (`AU_Id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`App_Id`) REFERENCES `applicant` (`App_Id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`U_Id`) REFERENCES `users` (`U_Id`);

--
-- Constraints for table `monetary_donator`
--
ALTER TABLE `monetary_donator`
  ADD CONSTRAINT `monetary_donator_ibfk_1` FOREIGN KEY (`CNO`) REFERENCES `hum_organization` (`CNO`);

--
-- Constraints for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD CONSTRAINT `sponsor_ibfk_1` FOREIGN KEY (`U_Id`) REFERENCES `users` (`U_Id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`CNO`) REFERENCES `hum_organization` (`CNO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
