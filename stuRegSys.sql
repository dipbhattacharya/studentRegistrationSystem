-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2022 at 09:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stuRegSys`
--

-- --------------------------------------------------------

--
-- Table structure for table `main`
--

CREATE TABLE `main` (
  `serial_no` int(225) NOT NULL,
  `fname` varchar(224) NOT NULL,
  `mname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `mob` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `board` varchar(225) NOT NULL,
  `roll` varchar(100) NOT NULL,
  `pdate` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `gen` varchar(100) NOT NULL,
  `reli` varchar(100) NOT NULL,
  `caste` varchar(100) NOT NULL,
  `addr` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pin` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `padd` varchar(225) NOT NULL,
  `paddno` varchar(100) NOT NULL,
  `phch` varchar(20) NOT NULL,
  `dis` varchar(100) NOT NULL,
  `marks` varchar(100) NOT NULL,
  `fmarks` varchar(100) NOT NULL,
  `gname` varchar(225) NOT NULL,
  `gmname` varchar(225) NOT NULL,
  `glname` varchar(225) NOT NULL,
  `gdob` varchar(100) NOT NULL,
  `ggen` varchar(100) NOT NULL,
  `rel` varchar(100) NOT NULL,
  `gmob` varchar(20) NOT NULL,
  `gemail` varchar(50) NOT NULL,
  `occu` varchar(100) NOT NULL,
  `gadd` varchar(225) NOT NULL,
  `gstate` varchar(100) NOT NULL,
  `gpin` varchar(50) NOT NULL,
  `gcity` varchar(100) NOT NULL,
  `gpadd` varchar(100) NOT NULL,
  `gpaddno` varchar(100) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `sign` varchar(225) NOT NULL,
  `gphoto` varchar(225) NOT NULL,
  `gsign` varchar(225) NOT NULL,
  `marksheet` varchar(225) NOT NULL,
  `pob` varchar(225) NOT NULL,
  `poa` varchar(225) NOT NULL,
  `poag` varchar(225) NOT NULL,
  `time` varchar(225) NOT NULL DEFAULT current_timestamp(),
  `submit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main`
--

INSERT INTO `main` (`serial_no`, `fname`, `mname`, `lname`, `dob`, `mob`, `email`, `board`, `roll`, `pdate`, `pass`, `gen`, `reli`, `caste`, `addr`, `state`, `pin`, `city`, `padd`, `paddno`, `phch`, `dis`, `marks`, `fmarks`, `gname`, `gmname`, `glname`, `gdob`, `ggen`, `rel`, `gmob`, `gemail`, `occu`, `gadd`, `gstate`, `gpin`, `gcity`, `gpadd`, `gpaddno`, `photo`, `sign`, `gphoto`, `gsign`, `marksheet`, `pob`, `poa`, `poag`, `time`, `submit`) VALUES
(4, 'Dip', '', 'Bhattacharya', '2022-09-14', '788', 'dipbhattacharya2@gmail.com', 'Indian Certificate of Secondary Education', '8900', '2022-09-14', '1234', 'Male', 'Hinduism', 'GEN', 'mordi', 'West Bengal', '567', '', 'Aadhaar card', '6789', 'no', '', '678', '723', 'Dip', '', 'Bhattacharya', '', 'Male', 'Brother', '23456', 'dipbhattacharya1@gmail.com', '', 'Mordecai Lane, Chatakol, South Dum Dum\r\n4/9, 2nd Floor', 'West Bengal', '1234', '', 'Pan Card', 'Mordecai Lane, Chatakol, South Dum Dum', '12358900wallpaperflare.com_wallpaper.jpg', '81558900wallpaperflare.com_wallpaper (5).jpg', '91148900wallpaperflare.com_wallpaper (1).jpg', '96928900Untitled.png', '24428900wallpaperflare.com_wallpaper (5).jpg', '69688900Untitled.png', '94748900wallpaperflare.com_wallpaper.jpg', '94588900wallpaperflare.com_wallpaper.jpg', '2022-09-22 02:55:38', 'approved'),
(894, 'Tui', '', 'Bhattacharya', '2022-09-23', '788', 'dipbhattacharya1@gmail.com', 'West Bengal Council of Higher Secondary Education', '66666', '2022-08-31', '1234', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-09-21 12:05:03', ''),
(895, 'Dip', '', 'Bhattacharya', '2022-09-16', '788', 'dipbhattacharya1@gmail.com', 'West Bengal Council of Higher Secondary Education', '123456', '2022-09-08', '1234', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-09-21 12:05:58', ''),
(896, 'Dip', '', 'Bhattacharya', '2022-09-03', '3456789876', 'dipbhattacharya2@gmail.com', 'Indian Certificate of Secondary Education', '123457', '2022-09-28', '1234', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2022-09-21 12:06:53', ''),
(901, 'Aheli', 'Das', 'Gupta', '2022-09-08', '123456789', 'ahelidasgupta2@gmail.com', 'West Bengal Council of Higher Secondary Education', '11223', '2022-09-07', '1234', 'Female', 'Atheism', 'GEN', '4/10, Near Dum Dum Vidya Mandir\r\nMardecal Lane, Chatakol, South Dum Dum', 'West Bengal', '700074', '', 'Pan Card', '12345', 'no', '', '345', '500', 'Saheli', 'Das', 'Gupta', '2022-09-09', 'Female', 'Sister', '11111111', 'ahelidasgupta@gmail.com', 'Mafia', 'Mordecai Lane, Chatakol, South Dum Dum\r\n4/9, 2nd Floor', 'West Bengal', '700074', '', 'Aadhaar card', '12345678', '636211223applicant.jpeg', '662311223E-signatures.png', '858011223gurdianpic.jpeg', '626311223E-signatures.png', '676511223Screenshot 2022-09-29 at 11.45.06 PM.png', '114711223Screenshot 2022-09-29 at 11.45.06 PM.png', '164711223Screenshot 2022-09-29 at 11.41.09 PM.png', '608811223Screenshot 2022-09-29 at 11.41.09 PM.png', '2022-09-30 00:32:11', 'rejected'),
(902, 'Sheldon', 'Lee', 'Cooper', '2022-09-22', '11222333454', 'sheldonlcop@gmail.com', 'Indian Certificate of Secondary Education', '11233', '2022-09-08', '1234', 'Male', 'christian', 'GEN', 'Mordecai Lane, Chatakol, South Dum Dum\r\n4/9, 2nd Floor', 'West Bengal', '700076', '', 'Pan Card', '675', 'no', '', '456', '500', 'Marry', 'Lee', 'Cooper', '2022-09-03', 'Female', 'Mother', '23456', '', 'Housewife', 'Mordecai Lane, Chatakol, South Dum Dum\r\n4/9, 2nd Floor', 'West Bengal', '700076', '', 'Pan Card', '6767', '510011233applicant.jpeg', '510211233E-signatures.png', '206111233gurdianpic.jpeg', '473611233E-signatures.png', '606811233Screenshot 2022-09-29 at 11.45.06 PM.png', '205711233Birth.jpeg', '374811233Screenshot 2022-09-29 at 11.41.09 PM.png', '852811233Screenshot 2022-09-29 at 11.41.09 PM.png', '2022-09-30 00:43:42', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `rejected`
--

CREATE TABLE `rejected` (
  `serial_no` varchar(225) NOT NULL,
  `roll` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rejected`
--

INSERT INTO `rejected` (`serial_no`, `roll`, `name`) VALUES
('891', '434321', 'Dip  Bhattacharya'),
('892', '4567', 'Anna  ');

-- --------------------------------------------------------

--
-- Table structure for table `statustable`
--

CREATE TABLE `statustable` (
  `roll` varchar(225) NOT NULL,
  `submit` varchar(225) NOT NULL,
  `time` varchar(225) NOT NULL DEFAULT current_timestamp(),
  `remark` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statustable`
--

INSERT INTO `statustable` (`roll`, `submit`, `time`, `remark`) VALUES
('test', 'test', 'current_timestamp()', 'test'),
('11223', 'submitted', '2022-09-29 23:46:48', ''),
('11233', 'submitted', '2022-09-29 23:55:32', ''),
('11223', 'return', '2022-09-30 00:02:59', 'Again please'),
('11223', 'return', '2022-09-30 00:04:16', 'Again\r\n'),
('11223', 'return', '2022-09-30 00:04:37', 'Again\r\n'),
('11233', 'return', '2022-09-30 00:04:54', 'no\r\n'),
('11233', 'submitted', '2022-09-30 00:11:32', ''),
('', 'return', '2022-09-30 00:17:29', ''),
('', 'return', '2022-09-30 00:17:45', ''),
('', 'return', '2022-09-30 00:17:46', ''),
('', 'return', '2022-09-30 00:17:47', ''),
('', 'return', '2022-09-30 00:17:49', ''),
('', 'return', '2022-09-30 00:18:29', ''),
('11233', 'submitted', '2022-09-30 00:19:00', ''),
('', 'return', '2022-09-30 00:19:03', ''),
('', 'return', '2022-09-30 00:19:06', ''),
('', 'return', '2022-09-30 00:19:08', ''),
('11233', 'submitted', '2022-09-30 00:21:24', ''),
('', 'return', '2022-09-30 00:21:36', ''),
('11233', 'return', '2022-09-30 00:21:51', 'Again'),
('', 'return', '2022-09-30 00:21:53', ''),
('', 'return', '2022-09-30 00:21:54', ''),
('11233', 'submitted', '2022-09-30 00:23:27', ''),
('', 'return', '2022-09-30 00:23:47', 'Again\r\n'),
('', 'return', '2022-09-30 00:23:52', 'Again'),
('11233', 'submitted', '2022-09-30 00:27:19', ''),
('11233', 'return', '2022-09-30 00:27:58', 'Again\r\n'),
('11223', 'submitted', '2022-09-30 00:31:54', ''),
('11223', 'rejected', '2022-09-30 00:32:11', ''),
('11233', 'submitted', '2022-09-30 00:34:06', ''),
('11233', 'approved', '2022-09-30 00:43:42', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`serial_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main`
--
ALTER TABLE `main`
  MODIFY `serial_no` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=903;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
