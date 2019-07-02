-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2019 at 05:38 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kazi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'Niyo', 'niyo'),
(2, 'Emmizo', 'Emmizo');

-- --------------------------------------------------------

--
-- Table structure for table `agreement`
--

CREATE TABLE `agreement` (
  `id` int(10) NOT NULL,
  `customer_id2` varchar(10) NOT NULL,
  `category_id` varchar(10) NOT NULL,
  `tec_id` varchar(10) DEFAULT NULL,
  `price` varchar(10) NOT NULL,
  `agree_date` varchar(20) NOT NULL,
  `isues` varchar(400) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agreement`
--

INSERT INTO `agreement` (`id`, `customer_id2`, `category_id`, `tec_id`, `price`, `agree_date`, `isues`, `status`) VALUES
(16, '53314', 'PC', '899120', '40000', '18/12/2019', 'OS crashed', 'Done'),
(17, '84817', 'PC', '899120', '1000', '18/13/2019', 'Blue Screen', 'Done'),
(18, '45628', 'TEL01', '526444', '12500', '18/23/2019', 'System charge', 'Not Done'),
(20, '53314', 'TV01', '005847', '500', '18/24/2019', 'Sound Problem', 'Pending'),
(25, '53314', 'R01', '005866', '12500', '02/05/2019', 'Crushed', 'Pending'),
(28, '63786', 'TEL01', NULL, '', '', 'Battery', 'Wait');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` varchar(10) NOT NULL,
  `category_name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
('FR01', 'Frigo'),
('PC', 'Computer(LapTop, DeskTop)'),
('R01', 'Radio'),
('TEL01', 'Telephone'),
('TV01', 'Television');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(10) NOT NULL,
  `customer_name` varchar(40) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `user_username` varchar(300) NOT NULL,
  `user_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `tel`, `user_username`, `user_password`) VALUES
('45628', 'Egide', '078110000', 'Egide', 'Egide'),
('53314', 'Alexandre Kazerwa', '07213333455', 'Kazerwa', 'Kazerwa'),
('63786', 'Murego Donat', '078110000', 'Donat', 'Donat'),
('84817', 'Kwizera Emmanuel', '0781167275', 'Emmizo', 'Emmizo');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `tec_id` varchar(10) NOT NULL,
  `tec_name` varchar(40) NOT NULL,
  `category_id2` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `statusTec` varchar(30) NOT NULL,
  `username` varchar(400) NOT NULL,
  `password` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`tec_id`, `tec_name`, `category_id2`, `email`, `tel`, `statusTec`, `username`, `password`) VALUES
('005847', 'Niyoyita Jean de dieu', 'R01', 'niyo@mail.com', '07895545565', 'Available', 'Niyo', 'niyo'),
('005866', 'Mumberi', 'R01', 'justinpower@gmail.com', '0873883993', 'Busy', 'Justin', 'Justin'),
('3971', 'Patr', 'TV01', 'patricishimwe@gmail.com', '0789636775', 'Busy', 'patrick', 'patrick'),
('526444', 'Cali', 'TEL01', 'caliros@gmail.com', '07811904049', 'Available', 'Kali', 'Kali'),
('557914', 'MAic', 'FR01', 'maic@gmail.com', '0781283833', 'Busy', 'maic', 'maic'),
('590533', 'KWIZ', 'PC', 'emmizokwizera@gmail.com', '0781167275', 'Busy', 'emmizo', 'emmizo'),
('72125', 'Cali', 'TEL01', 'caliros@gmail.com', '07811904049', 'Available', '9875cb', 'cce3ee39'),
('811207', 'Dama', 'PC', 'nyange@gmail.com', '0780999440', 'Available', 'Kwizera', 'Kwizera'),
('899120', 'Nyan', 'PC', 'nyange@gmail.com', '0780999440', 'Available', 'Titi', 'Titi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `agreement`
--
ALTER TABLE `agreement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id2`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `tec_id` (`tec_id`),
  ADD KEY `tec_id_2` (`tec_id`),
  ADD KEY `category_id_2` (`category_id`),
  ADD KEY `customer_id_2` (`customer_id2`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`tec_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `category_id` (`category_id2`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agreement`
--
ALTER TABLE `agreement`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agreement`
--
ALTER TABLE `agreement`
  ADD CONSTRAINT `agreement_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `agreement_ibfk_2` FOREIGN KEY (`customer_id2`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `agreement_ibfk_3` FOREIGN KEY (`tec_id`) REFERENCES `technician` (`tec_id`);

--
-- Constraints for table `technician`
--
ALTER TABLE `technician`
  ADD CONSTRAINT `technician_ibfk_1` FOREIGN KEY (`category_id2`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
